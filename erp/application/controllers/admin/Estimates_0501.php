<?php

use app\services\estimates\EstimatesPipeline;

defined('BASEPATH') or exit('No direct script access allowed');

class Estimates extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('estimates_model');
    }

    /* Get all estimates in case user go on index page */
    public function index($id = '')
    {
        $this->list_estimates($id);
    }

    /* List all estimates datatables */
    public function list_estimates($id = '')
    {
        if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && get_option('allow_staff_view_estimates_assigned') == '0') {
            access_denied('estimates');
        }

        $isPipeline = $this->session->userdata('estimate_pipeline') == 'true';

        $data['estimate_statuses'] = $this->estimates_model->get_statuses();
        if ($isPipeline && !$this->input->get('status') && !$this->input->get('filter')) {
            $data['title']           = _l('estimates_pipeline');
            $data['bodyclass']       = 'estimates-pipeline estimates-total-manual';
            $data['switch_pipeline'] = false;

            if (is_numeric($id)) {
                $data['estimateid'] = $id;
            } else {
                $data['estimateid'] = $this->session->flashdata('estimateid');
            }

            $this->load->view('admin/estimates/pipeline/manage', $data);
        } else {

            // Pipeline was initiated but user click from home page and need to show table only to filter
            if ($this->input->get('status') || $this->input->get('filter') && $isPipeline) {
                $this->pipeline(0, true);
            }

            $data['estimateid']            = $id;
            $data['switch_pipeline']       = true;
            $data['title']                 = _l('estimates');
            $data['bodyclass']             = 'estimates-total-manual';
            $data['estimates_years']       = $this->estimates_model->get_estimates_years();
            $data['estimates_sale_agents'] = $this->estimates_model->get_sale_agents();
            $this->load->view('admin/estimates/manage', $data);
        }
    }

    public function table($clientid = '')
    {
        if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && get_option('allow_staff_view_estimates_assigned') == '0') {
            ajax_access_denied();
        }

        $this->app->get_table_data('estimates', [
            'clientid' => $clientid,
        ]);
    }

    /* Add new estimate or update existing */
    public function estimate($id = '')
    {
        $this->load->model('accounting/accounting_model');
        $accounts = $this->accounting_model->get_accounts();
        //echo "<pre>"; print_r(); exit;
        if ($this->input->post()) {
            $estimate_data = $this->input->post();

            $save_and_send_later = false;
            if (isset($estimate_data['save_and_send_later'])) {
                unset($estimate_data['save_and_send_later']);
                $save_and_send_later = true;
            }

            if ($id == '') {
                if (!has_permission('estimates', '', 'create')) {
                    access_denied('estimates');
                }
                $id = $this->estimates_model->add($estimate_data);

                if ($id) {
                    set_alert('success', _l('added_successfully', _l('estimate')));

                    $redUrl = admin_url('estimates/list_estimates/' . $id);

                    if ($save_and_send_later) {
                        $this->session->set_userdata('send_later', true);
                        // die(redirect($redUrl));
                    }

                    redirect(
                        !$this->set_estimate_pipeline_autoload($id) ? $redUrl : admin_url('estimates/list_estimates/')
                    );
                }
            } else {
                if (!has_permission('estimates', '', 'edit')) {
                    access_denied('estimates');
                }
                $success = $this->estimates_model->update($estimate_data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', _l('estimate')));
                }
                if ($this->set_estimate_pipeline_autoload($id)) {
                    redirect(admin_url('estimates/list_estimates/'));
                } else {
                    redirect(admin_url('estimates/list_estimates/' . $id));
                }
            }
        }
        if ($id == '') {
            $title = _l('create_new_estimate');
        } else {
            $estimate = $this->estimates_model->get($id);

            if (!$estimate || !user_can_view_estimate($id)) {
                blank_page(_l('estimate_not_found'));
            }

            $data['estimate'] = $estimate;

            $data['jnlsdetails'] = getdealrecapitemsforjournals($id,$estimate->clientid,$estimate->sale_agent);

            $data['jnlentries'] = $this->estimates_model->getjournalentriesbyestimateid($id);
          //echo "<pre>"; print_r($data['jnlentries']); exit;

            $data['edit']     = true;
            $title            = _l('edit', _l('estimate_lowercase'));
        }

        if ($this->input->get('customer_id')) {
            $data['customer_id'] = $this->input->get('customer_id');
        }

        if ($this->input->get('estimate_request_id')) {
            $data['estimate_request_id'] = $this->input->get('estimate_request_id');
        }

        $this->load->model('taxes_model');
        $data['taxes'] = $this->taxes_model->get();
        $this->load->model('currencies_model');
        $data['currencies'] = $this->currencies_model->get();

        $data['base_currency'] = $this->currencies_model->get_base_currency();

        $this->load->model('invoice_items_model');

        $data['ajaxItems'] = false;
        if (total_rows(db_prefix() . 'items') <= ajax_on_total_items()) {
            $data['items'] = $this->invoice_items_model->get_grouped();
        } else {
            $data['items']     = [];
            $data['ajaxItems'] = true;
        }
        $data['items_groups'] = $this->invoice_items_model->get_groups();

        $data['staff']             = $this->staff_model->get('', ['active' => 1]);
        //echo "<pre>"; print_r($estimate); exit;
        $data['estimate_statuses'] = $this->estimates_model->get_statuses();
        $data['title']             = $title;

        //ableit
        $data['able_coa_list'] = $accounts;
        $controltypes = json_decode(ACCOUNTING_CONTROL_TYPES,TRUE);
        $data['controltypes'] = $controltypes;
        //ableit 
        //echo "<pre>"; print_r($data); exit;
        $this->load->view('admin/estimates/estimate', $data);
    }

    public function clear_signature($id)
    {
        if (has_permission('estimates', '', 'delete')) {
            $this->estimates_model->clear_signature($id);
        }

        redirect(admin_url('estimates/list_estimates/' . $id));
    }

    public function update_number_settings($id)
    {
        $response = [
            'success' => false,
            'message' => '',
        ];
        if (has_permission('estimates', '', 'edit')) {
            $this->db->where('id', $id);
            $this->db->update(db_prefix() . 'estimates', [
                'prefix' => $this->input->post('prefix'),
            ]);
            if ($this->db->affected_rows() > 0) {
                $response['success'] = true;
                $response['message'] = _l('updated_successfully', _l('estimate'));
            }
        }

        echo json_encode($response);
        die;
    }

    public function validate_estimate_number()
    {
        $isedit          = $this->input->post('isedit');
        $number          = $this->input->post('number');
        $date            = $this->input->post('date');
        $original_number = $this->input->post('original_number');
        $number          = trim($number);
        $number          = ltrim($number, '0');

        if ($isedit == 'true') {
            if ($number == $original_number) {
                echo json_encode(true);
                die;
            }
        }

        if (total_rows(db_prefix() . 'estimates', [
            'YEAR(date)' => date('Y', strtotime(to_sql_date($date))),
            'number' => $number,
        ]) > 0) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function delete_attachment($id)
    {
        $file = $this->misc_model->get_file($id);
        if ($file->staffid == get_staff_user_id() || is_admin()) {
            echo $this->estimates_model->delete_attachment($id);
        } else {
            header('HTTP/1.0 400 Bad error');
            echo _l('access_denied');
            die;
        }
    }

    /* Get all estimate data used when user click on estimate number in a datatable left side*/
    public function get_estimate_data_ajax($id, $to_return = false)
    {
        if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && get_option('allow_staff_view_estimates_assigned') == '0') {
            echo _l('access_denied');
            die;
        }

        if (!$id) {
            die('No estimate found');
        }

        $estimate = $this->estimates_model->get($id);

        if (!$estimate || !user_can_view_estimate($id)) {
            echo _l('estimate_not_found');
            die;
        }

        $estimate->date       = _d($estimate->date);
        $estimate->expirydate = _d($estimate->expirydate);
        if ($estimate->invoiceid !== null) {
            $this->load->model('invoices_model');
            $estimate->invoice = $this->invoices_model->get($estimate->invoiceid);
        }

        if ($estimate->sent == 0) {
            $template_name = 'estimate_send_to_customer';
        } else {
            $template_name = 'estimate_send_to_customer_already_sent';
        }

        $data = prepare_mail_preview_data($template_name, $estimate->clientid);

        $data['activity']          = $this->estimates_model->get_estimate_activity($id);
        $data['estimate']          = $estimate;
        $data['members']           = $this->staff_model->get('', ['active' => 1]);
        $data['estimate_statuses'] = $this->estimates_model->get_statuses();
        $data['totalNotes']        = total_rows(db_prefix() . 'notes', ['rel_id' => $id, 'rel_type' => 'estimate']);

        $data['send_later'] = false;
        if ($this->session->has_userdata('send_later')) {
            $data['send_later'] = true;
            $this->session->unset_userdata('send_later');
        }

        if ($to_return == false) {
            $this->load->view('admin/estimates/estimate_preview_template', $data);
        } else {
            return $this->load->view('admin/estimates/estimate_preview_template', $data, true);
        }
    }

    public function get_estimates_total()
    {
        if ($this->input->post()) {
            $data['totals'] = $this->estimates_model->get_estimates_total($this->input->post());

            $this->load->model('currencies_model');

            if (!$this->input->post('customer_id')) {
                $multiple_currencies = call_user_func('is_using_multiple_currencies', db_prefix() . 'estimates');
            } else {
                $multiple_currencies = call_user_func('is_client_using_multiple_currencies', $this->input->post('customer_id'), db_prefix() . 'estimates');
            }

            if ($multiple_currencies) {
                $data['currencies'] = $this->currencies_model->get();
            }

            $data['estimates_years'] = $this->estimates_model->get_estimates_years();

            if (
                count($data['estimates_years']) >= 1
                && !\app\services\utilities\Arr::inMultidimensional($data['estimates_years'], 'year', date('Y'))
            ) {
                array_unshift($data['estimates_years'], ['year' => date('Y')]);
            }

            $data['_currency'] = $data['totals']['currencyid'];
            unset($data['totals']['currencyid']);
            $this->load->view('admin/estimates/estimates_total_template', $data);
        }
    }

    public function add_note($rel_id)
    {
        if ($this->input->post() && user_can_view_estimate($rel_id)) {
            $this->misc_model->add_note($this->input->post(), 'estimate', $rel_id);
            echo $rel_id;
        }
    }

    public function get_notes($id)
    {
        if (user_can_view_estimate($id)) {
            $data['notes'] = $this->misc_model->get_notes($id, 'estimate');
            $this->load->view('admin/includes/sales_notes_template', $data);
        }
    }

    public function mark_action_status($status, $id)
    {
        if (!has_permission('estimates', '', 'edit')) {
            access_denied('estimates');
        }
        $success = $this->estimates_model->mark_action_status($status, $id);
        if ($success) {
            set_alert('success', _l('estimate_status_changed_success'));
        } else {
            set_alert('danger', _l('estimate_status_changed_fail'));
        }
        if ($this->set_estimate_pipeline_autoload($id)) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(admin_url('estimates/list_estimates/' . $id));
        }
    }

    public function send_expiry_reminder($id)
    {
        $canView = user_can_view_estimate($id);
        if (!$canView) {
            access_denied('Estimates');
        } else {
            if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && $canView == false) {
                access_denied('Estimates');
            }
        }

        $success = $this->estimates_model->send_expiry_reminder($id);
        if ($success) {
            set_alert('success', _l('sent_expiry_reminder_success'));
        } else {
            set_alert('danger', _l('sent_expiry_reminder_fail'));
        }
        if ($this->set_estimate_pipeline_autoload($id)) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(admin_url('estimates/list_estimates/' . $id));
        }
    }

    /* Send estimate to email */
    public function send_to_email($id)
    {
        $canView = user_can_view_estimate($id);
        if (!$canView) {
            access_denied('estimates');
        } else {
            if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && $canView == false) {
                access_denied('estimates');
            }
        }

        try {
            $success = $this->estimates_model->send_estimate_to_client($id, '', $this->input->post('attach_pdf'), $this->input->post('cc'));
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo $message;
            if (strpos($message, 'Unable to get the size of the image') !== false) {
                show_pdf_unable_to_get_image_size_error();
            }
            die;
        }

        // In case client use another language
        load_admin_language();
        if ($success) {
            set_alert('success', _l('estimate_sent_to_client_success'));
        } else {
            set_alert('danger', _l('estimate_sent_to_client_fail'));
        }
        if ($this->set_estimate_pipeline_autoload($id)) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(admin_url('estimates/list_estimates/' . $id));
        }
    }

    /* Convert estimate to invoice */
    public function convert_to_invoice($id)
    {
        if (!has_permission('invoices', '', 'create')) {
            access_denied('invoices');
        }
        if (!$id) {
            die('No estimate found');
        }
        $draft_invoice = false;
        if ($this->input->get('save_as_draft')) {
            $draft_invoice = true;
        }
        $invoiceid = $this->estimates_model->convert_to_invoice($id, false, $draft_invoice);
        //$invoiceid =  22;
        if ($invoiceid) {

            //DEAL RECAP 
            if(DEAL_RECAP_JOURNAL_ENTRIES_ENABLED==true){
				$this->dealrecapjournalentries($id,$invoiceid);
			}
			
			//to add acv new journal entry
			if(IS_ACV_JOURNAL_ENTRY_ENABLED==true){
				$this->acvjournalentry($id);
			}
			
            set_alert('success', _l('estimate_convert_to_invoice_successfully'));
            redirect(admin_url('invoices/list_invoices/' . $invoiceid));
        } else {
            if ($this->session->has_userdata('estimate_pipeline') && $this->session->userdata('estimate_pipeline') == 'true') {
                $this->session->set_flashdata('estimateid', $id);
            }
            if ($this->set_estimate_pipeline_autoload($id)) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(admin_url('estimates/list_estimates/' . $id));
            }
        }
    }
	
    public function dealrecapjournalentries($id,$invoiceid){
        $journalentries = $this->estimates_model->getjournalentriesbyestimateidforinvoice($id);
        //echo "<pre>"; print_r($journalentries); exit;
        if(is_array($journalentries) && count($journalentries)>0){
            $getproposalid = $this->estimates_model->getproposalid($id);
            $currentdatetime = date("Y-m-d H:i:s");
            $currentdate = date("Y-m-d");
            $abltit_estimate_id = $id;
            foreach($journalentries as $je){
                $getjnextnumber = $this->estimates_model->get_journal_entry_next_number();

                $jeid = $je['id'];
                
                $jdata = array();
                $jdescription = (isset($je['attr_description']) && $je['attr_description']!='') ? $je['attr_description'] : '';
                $journalamount = (isset($je['attr_amount']) && $je['attr_amount'] > 0) ? $je['attr_amount'] : 0;
                $jdata['number'] = $getjnextnumber;
                $jdata['description'] = $jdescription;
                $jdata['journal_date'] = $currentdate;
                $jdata['amount'] = $journalamount;
                $jdata['datecreated'] =  $currentdatetime;
                $jdata['addedfrom'] = get_staff_user_id();
                $jdata['abltit_estimate_id'] = $abltit_estimate_id;
                $jdata['ableit_quote_id'] = $getproposalid['id']['0']['id'];



                
                $ableit_control_type = (isset($je['control_type']) && $je['control_type']!='') ? $je['control_type'] : '';
                $ableit_control_number = (isset($je['attr_control_number']) && $je['attr_control_number']!='') ? $je['attr_control_number'] : '';
                $ableit_lead_id = (isset($je['lead_id']) && $je['lead_id']!='') ? $je['lead_id'] : '';
                $ableit_sales_rep_id = (isset($je['attr_sales_rep_id']) && $je['attr_sales_rep_id']!='') ? $je['attr_sales_rep_id'] : '';
                $ableit_lead_id = (isset($je['attr_cust_lead_id']) && $je['attr_cust_lead_id']!='') ? $je['attr_cust_lead_id'] : '';
                $ableit_vin = (isset($je['attr_vin']) && $je['attr_vin']!='') ? $je['attr_vin'] : '';

                $ableit_inv_id = '';
                if($ableit_vin!=''){
                    $getvinid = $this->estimates_model->getcommodityidbyvin($je['attr_vin']);
                  //echo "<pre>"; print_r($getvinid); exit;
                  if(count($getvinid)>0){
                    $ableit_inv_id = $getvinid[0]['id'].'#'.$ableit_vin;
                  }else{
                    $ableit_inv_id = $ableit_vin;
                  }
                    //s$ableit_inv_id = (isset($je['attr_description']) && $je['attr_description']!='') ? $je['attr_description'] : '';
                }
               
                
                $ableit_vin = (isset($je['attr_vin']) && $je['attr_vin']!='') ? $je['attr_vin'] : '';
              

                $jdata['ableit_control_type'] = $ableit_control_type;
                $jdata['ableit_control_number'] = $ableit_control_number;
                $jdata['ableit_lead_id'] = $ableit_lead_id;
                $jdata['ableit_sales_rep_id'] = $ableit_sales_rep_id;
                $jdata['ableit_inv_id'] = $ableit_inv_id;
                $jdata['abltit_estimate_id'] = $abltit_estimate_id;
                $jdata['ableit_cust_lead_id'] = $ableit_lead_id;
                $jdata['ableit_vin'] = $ableit_vin;
                $jdata['ableit_invoice_id'] = $invoiceid;
               // echo "<pre>"; print_r($jdata); exit;
                $this->db->insert(db_prefix() . 'acc_journal_entries', $jdata);
                $insert_id = $this->db->insert_id();

                //echo $insert_id; exit;
                if($insert_id){
                    log_activity('Deal Recap: Journal Entries converted for  [Deal Recap ID: ' . $abltit_estimate_id . ', Created by : ' . get_staff_user_id() . ', on '.date("Y-m-d").']');
                    $debitcoa = (isset($je['attr_debit_coa']) && $je['attr_debit_coa']!='') ? $je['attr_debit_coa'] :0;
                    $creditcoa = (isset($je['attr_credit_coa']) && $je['attr_credit_coa']!='') ? $je['attr_credit_coa'] : 0;
                    $journalamount = (isset($je['attr_amount']) && $je['attr_amount']!='') ? $je['attr_amount'] : 0;
                    $this->db->insert(db_prefix() . 'acc_account_history', [
                        'account'   => $creditcoa,
                        'debit' => 0.00,
                        'credit' => $journalamount,
                        'description'   => $jdescription,
                        'rel_id'   =>  $insert_id,
                        'rel_type' => 'journal_entry',
                        'datecreated' => $currentdatetime,
                        'addedfrom'   => get_staff_user_id(),
                        'customer' => '(NULL)',
                        'reconcile' => 0,
                        'split'   => 0,
                        'item'   => '(NULL)',
                        'paid'   => 0,
                        'date'   => $currentdate,
                        'tax'   => '(NULL)',
                    ]);
    
    
    
                    $this->db->insert(db_prefix() . 'acc_account_history', [
                        'account'   => $debitcoa,
                        'debit' => $journalamount,
                        'credit' => 0.00,
                        'description'   => $jdescription,
                        'rel_id'   =>  $insert_id,
                        'rel_type' => 'journal_entry',
                        'datecreated' => $currentdatetime,
                        'addedfrom'   => get_staff_user_id(),
                        'customer' => '(NULL)',
                        'reconcile' => 0,
                        'split'   => 0,
                        'item'   => '(NULL)',
                        'paid'   => 0,
                        'date'   => $currentdate,
                        'tax'   => '(NULL)',
                    ]);


                  $this->db->query("UPDATE ".db_prefix()."ableit_jnl_automated SET is_jnl_posted=1,jnl_id=".$insert_id.",invoice_id=".$invoiceid." WHERE id=".$jeid);
                }


            }
        }
        
    }
	
	//acv journal entry
     public function acvjournalentry($estimate_id){
        //echo $estimate_id; exit;
        $getproposalid = $this->estimates_model->getproposalid($estimate_id);
        //echo "<pre>"; print_r($getproposalid); exit;
        $getjnextnumber = $this->estimates_model->get_journal_entry_next_number();
        $currentdatetime = date("Y-m-d H:i:s");
        $currentdate = date("Y-m-d");
        //print_r($getjnextnumber); exit;
        if(is_array($getproposalid) && count($getproposalid)>0){
            $tradeinval = (isset($getproposalid['acvdata']['46']) && $getproposalid['acvdata']['46']!='') ? $getproposalid['acvdata']['46'] : 0;
            $balancepayoff = (isset($getproposalid['acvdata']['61']) && $getproposalid['acvdata']['61']!='') ? $getproposalid['acvdata']['61'] : 0;
            $acvvalue = (isset($getproposalid['acvdata']['126']) && $getproposalid['acvdata']['126']!='') ? $getproposalid['acvdata']['126'] : 0;
            $jdescription = "ACV-Entry ".$getproposalid['id']['0']['proposal_to'].' - QuoteID#'. $getproposalid['id']['0']['id']. ' EstimateID#'.$estimate_id. ' Created on# '. date('m/d/Y');
            //$journalamount = $tradeinval - $balancepayoff;

            $journalamount = $acvvalue - $tradeinval; 
            //echo $journalamount; exit;
            //echo $tradeinval.'===='.$balancepayoff .'====='.$journalamount .'====='.$jdescription."   ".$getjnextnumber; //exit;
            
            $jdata = array();
            $jdata['number'] = $getjnextnumber;
            $jdata['description'] = $jdescription;
            $jdata['journal_date'] = $currentdate;
            $jdata['amount'] = $journalamount;
            $jdata['datecreated'] =  $currentdatetime;
            $jdata['addedfrom'] = get_staff_user_id();
            $jdata['estimate_id'] = $estimate_id;
            $jdata['quote_id'] = $getproposalid['id']['0']['id'];
            //echo "<pre>"; print_r($jdata); exit;
            $this->db->insert(db_prefix() . 'acc_journal_entries', $jdata);
            $insert_id = $this->db->insert_id();
            //echo $insert_id; exit;
            if($insert_id){
                $this->db->insert(db_prefix() . 'acc_account_history', [
                    'account'   => 70,
                    'debit' => 0.00,
                    'credit' => $journalamount,
                    'description'   => $jdescription,
                    'rel_id'   =>  $insert_id,
                    'rel_type' => 'journal_entry',
                    'datecreated' => $currentdatetime,
                    'addedfrom'   => get_staff_user_id(),
                    'customer' => '(NULL)',
                    'reconcile' => 0,
                    'split'   => 0,
                    'item'   => '(NULL)',
                    'paid'   => 0,
                    'date'   => $currentdate,
                    'tax'   => '(NULL)',
                ]);



                $this->db->insert(db_prefix() . 'acc_account_history', [
                    'account'   => 8,
                    'debit' => $journalamount,
                    'credit' => 0.00,
                    'description'   => $jdescription,
                    'rel_id'   =>  $insert_id,
                    'rel_type' => 'journal_entry',
                    'datecreated' => $currentdatetime,
                    'addedfrom'   => get_staff_user_id(),
                    'customer' => '(NULL)',
                    'reconcile' => 0,
                    'split'   => 0,
                    'item'   => '(NULL)',
                    'paid'   => 0,
                    'date'   => $currentdate,
                    'tax'   => '(NULL)',
                ]);
            }

           
        }
        //echo "<pre>"; print_r($getproposalid); exit;
    }

    public function copy($id)
    {
        if (!has_permission('estimates', '', 'create')) {
            access_denied('estimates');
        }
        if (!$id) {
            die('No estimate found');
        }
        $new_id = $this->estimates_model->copy($id);
        if ($new_id) {
            set_alert('success', _l('estimate_copied_successfully'));
            if ($this->set_estimate_pipeline_autoload($new_id)) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(admin_url('estimates/estimate/' . $new_id));
            }
        }
        set_alert('danger', _l('estimate_copied_fail'));
        if ($this->set_estimate_pipeline_autoload($id)) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(admin_url('estimates/estimate/' . $id));
        }
    }

    /* Delete estimate */
    public function delete($id)
    {
        if (!has_permission('estimates', '', 'delete')) {
            access_denied('estimates');
        }
        if (!$id) {
            redirect(admin_url('estimates/list_estimates'));
        }
        $success = $this->estimates_model->delete($id);
        if (is_array($success)) {
            set_alert('warning', _l('is_invoiced_estimate_delete_error'));
        } elseif ($success == true) {
            set_alert('success', _l('deleted', _l('estimate')));
        } else {
            set_alert('warning', _l('problem_deleting', _l('estimate_lowercase')));
        }
        redirect(admin_url('estimates/list_estimates'));
    }

    public function clear_acceptance_info($id)
    {
        if (is_admin()) {
            $this->db->where('id', $id);
            $this->db->update(db_prefix() . 'estimates', get_acceptance_info_array(true));
        }

        redirect(admin_url('estimates/list_estimates/' . $id));
    }

    /* Generates estimate PDF and senting to email  */
    public function pdf($id)
    {
        $canView = user_can_view_estimate($id);
        if (!$canView) {
            access_denied('Estimates');
        } else {
            if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && $canView == false) {
                access_denied('Estimates');
            }
        }
        if (!$id) {
            redirect(admin_url('estimates/list_estimates'));
        }
        $estimate        = $this->estimates_model->get($id);
        $estimate_number = format_estimate_number($estimate->id);

        try {
            $pdf = estimate_pdf($estimate);
        } catch (Exception $e) {
            $message = $e->getMessage();
            echo $message;
            if (strpos($message, 'Unable to get the size of the image') !== false) {
                show_pdf_unable_to_get_image_size_error();
            }
            die;
        }

        $type = 'D';

        if ($this->input->get('output_type')) {
            $type = $this->input->get('output_type');
        }

        if ($this->input->get('print')) {
            $type = 'I';
        }

        $fileNameHookData = hooks()->apply_filters('estimate_file_name_admin_area', [
                            'file_name' => mb_strtoupper(slug_it($estimate_number)) . '.pdf',
                            'estimate'  => $estimate,
                        ]);

        $pdf->Output($fileNameHookData['file_name'], $type);
    }

    // Pipeline
    public function get_pipeline()
    {
        if (has_permission('estimates', '', 'view') || has_permission('estimates', '', 'view_own') || get_option('allow_staff_view_estimates_assigned') == '1') {
            $data['estimate_statuses'] = $this->estimates_model->get_statuses();
            $this->load->view('admin/estimates/pipeline/pipeline', $data);
        }
    }

    public function pipeline_open($id)
    {
        $canView = user_can_view_estimate($id);
        if (!$canView) {
            access_denied('Estimates');
        } else {
            if (!has_permission('estimates', '', 'view') && !has_permission('estimates', '', 'view_own') && $canView == false) {
                access_denied('Estimates');
            }
        }

        $data['id']       = $id;
        $data['estimate'] = $this->get_estimate_data_ajax($id, true);
        $this->load->view('admin/estimates/pipeline/estimate', $data);
    }

    public function update_pipeline()
    {
        if (has_permission('estimates', '', 'edit')) {
            $this->estimates_model->update_pipeline($this->input->post());
        }
    }

    public function pipeline($set = 0, $manual = false)
    {
        if ($set == 1) {
            $set = 'true';
        } else {
            $set = 'false';
        }
        $this->session->set_userdata([
            'estimate_pipeline' => $set,
        ]);
        if ($manual == false) {
            redirect(admin_url('estimates/list_estimates'));
        }
    }

    public function pipeline_load_more()
    {
        $status = $this->input->get('status');
        $page   = $this->input->get('page');

        $estimates = (new EstimatesPipeline($status))
            ->search($this->input->get('search'))
            ->sortBy(
                $this->input->get('sort_by'),
                $this->input->get('sort')
            )
            ->page($page)->get();

        foreach ($estimates as $estimate) {
            $this->load->view('admin/estimates/pipeline/_kanban_card', [
                'estimate' => $estimate,
                'status'   => $status,
            ]);
        }
    }

    public function set_estimate_pipeline_autoload($id)
    {
        if ($id == '') {
            return false;
        }

        if ($this->session->has_userdata('estimate_pipeline')
                && $this->session->userdata('estimate_pipeline') == 'true') {
            $this->session->set_flashdata('estimateid', $id);

            return true;
        }

        return false;
    }

    public function get_due_date()
    {
        if ($this->input->post()) {
            $date    = $this->input->post('date');
            $duedate = '';
            if (get_option('estimate_due_after') != 0) {
                $date    = to_sql_date($date);
                $d       = date('Y-m-d', strtotime('+' . get_option('estimate_due_after') . ' DAY', strtotime($date)));
                $duedate = _d($d);
                echo $duedate;
            }
        }
    }

    //ableittech 0312
    public function ableitjnlpostings(){
        
        $formdata = $_REQUEST['control_types'];
        $rData = $_REQUEST;
        //echo "<pre>"; print_r($rData); exit;
        if(is_array($formdata) && count($formdata)>0){
            
            $leadid =$rData['able_lead_id'];
            $quoteId = $rData['able_quote_id'];
            $estimateId = $rData['able_estimate_id'];
            $loggedinuserid= get_staff_user_id();
            $estimate_id = $estimateId;
            $lead_id = $leadid;
            $quote_id = $quoteId;
            $currentdate = date("Y-m-d");
            $i=0;
            $deletequery = "DELETE FROM ".db_prefix()."ableit_jnl_automated WHERE estimate_id=".$estimate_id." AND is_jnl_posted=0";
            $this->db->query($deletequery);
     
            foreach($formdata as $key=>$row){
                if($row!=''){
                
                $queryCheck = "";
                $controlType = $row;                
                $controlNumber='';                
                $salesRepId =$rData['vendedores'][$i];
                $fniRepId = '';
                $vin =$rData['vindecarro'][$i];
                $customerNumber = $rData['customernumber'][$i];


                $description =$rData['description'][$i];
                $amount = $rData['amount'][$i];
                $creditcoa = $rData['credit_gl_account'][$i];
                $debitcoa =$rData['debit_gl_account'][$i];   
                $type =  $rData['type'][$i];               
                

                if($row == 'Vendedores' ){
                    $controlNumber= $rData['vendedores'][$i];
                    $queryCheck = "SELECT * FROM ".db_prefix()."ableit_jnl_automated WHERE
                                    control_type = '".$controlType."' 
                                    AND attr_control_number = $controlNumber
                                    AND attr_sales_rep_id = $salesRepId
                                    AND attr_cust_lead_id = $leadid
                                    AND attr_amount  = $amount
                                    AND attr_debit_coa = $debitcoa
                                    AND attr_credit_coa = $creditcoa
                                    AND estimate_id = $estimate_id
                                    AND quote_id = $quote_id
                                    AND lead_id = $lead_id
                                    AND is_jnl_posted = 0  
                                    ";
                    //$salesRepId =$controlNumber;
                }elseif($row=='VIN de Carro'){
                    $controlNumber= $rData['vindecarro'][$i];
                    //$vin =  $rData['vindecarro'][$i];
                    $queryCheck = "SELECT * FROM ".db_prefix()."ableit_jnl_automated WHERE
                                    control_type = '".$row."' 
                                    AND attr_control_number = '".$controlNumber."'
                                    AND attr_vin = '".$vin."'
                                    AND attr_cust_lead_id = $leadid
                                    AND attr_amount  = $amount
                                    AND attr_debit_coa = $debitcoa
                                    AND attr_credit_coa = $creditcoa
                                    AND estimate_id = $estimate_id
                                    AND quote_id = $quote_id
                                    AND lead_id = $lead_id
                                    AND is_jnl_posted = 0  
                                    ";
                }elseif($row=='Customer Number'){
                    $controlNumber= $rData['customernumber'][$i];
                    //$customerNumber =  $rData['customernumber'][$i];
                    $queryCheck = "SELECT * FROM ".db_prefix()."ableit_jnl_automated WHERE
                                    control_type = '".$row."' 
                                    AND attr_control_number = $controlNumber
                                    AND attr_cust_lead_id = $customerNumber
                                    AND attr_cust_lead_id = $leadid
                                    AND attr_amount  = $amount
                                    AND attr_debit_coa = $debitcoa
                                    AND attr_credit_coa = $creditcoa
                                    AND estimate_id = $estimate_id
                                    AND quote_id = $quote_id
                                    AND lead_id = $lead_id
                                    AND is_jnl_posted = 0  
                                    ";
                }elseif($row=='Vendor Type' || $row=='Open Entry'){
                    $controlNumber= $rData['type'][$i];
                    //$vin =  $rData['type'][$i];
                    $queryCheck = "SELECT * FROM ".db_prefix()."ableit_jnl_automated WHERE
                                    control_type = '".$row."' 
                                    AND attr_control_number = '".$controlNumber."'
                                    AND attr_cust_lead_id = $customerNumber
                                    AND attr_cust_lead_id = $leadid
                                    AND attr_amount  = $amount
                                    AND attr_debit_coa = $debitcoa
                                    AND attr_credit_coa = $creditcoa
                                    AND estimate_id = $estimate_id
                                    AND quote_id = $quote_id
                                    AND lead_id = $lead_id
                                    AND is_jnl_posted = 0  
                                    ";
                }
                
                $queryExe = $this->db->query($queryCheck);
                $dupResult = $queryExe->result_array();
                if(is_array($dupResult) && count($dupResult)==0){

                    $insetquery = "INSERT INTO ".db_prefix()."ableit_jnl_automated (
                                    control_type,
                                    attr_control_number,
                                    attr_sales_rep_id,
                                    attr_vin,
                                    attr_cust_lead_id,
                                    attr_description,
                                    attr_amount,
                                    attr_debit_coa,
                                    attr_credit_coa,
                                    estimate_id,
                                    quote_id,
                                    lead_id,
                                    created_by,
                                    created_date
                                ) VALUES(
                                        '".$row."',
                                        '".$controlNumber."',
                                        $salesRepId,
                                        '".$vin."',
                                        $customerNumber,
                                        '".$description."',
                                        '".$amount."',
                                        $debitcoa,
                                        $creditcoa,
                                        $estimate_id,
                                        $quote_id,
                                        $lead_id,
                                        $loggedinuserid,
                                        '".$currentdate."'                                    
                                        )";
                        $this->db->query($insetquery);   
                        log_activity('Deal Recap: Journal Entries created for  [Deal Recap ID: ' . $estimate_id . ', Created by : ' . get_staff_user_id() . ', on '.date("Y-m-d").']');

                }

             
            }            
               
                $i++;
            }
        }
        exit();
    }
	
	
	//ableit deal calculator
	public function dealcalculator_bkp_0402($id){
        //echo "<pre>"; print_r($_REQUEST); 


        $estimate = $this->estimates_model->get($id);
        $data = array();
        $data['estimate'] = $estimate;

        $data['jnlsdetails'] = getdealrecapitemsforjournals($id,$estimate->clientid,$estimate->sale_agent);

        $data['jnlentries'] = $this->estimates_model->getjournalentriesbyestimateid($id);

        $data['dcjournalentries'] = $this->estimates_model->dcjournalentries($id);
        $data['dcjournalentries']['total']= 0;
        
        $data['dcacv']['total']= 0;
        if(count($data['dcjournalentries'])>0){
            $data['dcjournalentries']['total'] = array_sum(array_column($data['dcjournalentries'], 'attr_amount'));
        }else{
			$data['dcjournalentries']['total'] = 0;
		}

        $data['dcacv'] = $this->estimates_model->dcavcentries(1);
        if(count($data['dcacv'])>0){
            $data['dcacv']['total']= array_sum(array_column($data['dcacv'], 'amount'));
        }else{
			$data['dcacv']['total'] = 0;
		}
       
        
        $data['dccustomfields'] = array();
        $data['dcexpenses'] = array();
        if(isset($data['jnlsdetails']['jnlproposal']) && count($data['jnlsdetails']['jnlproposal'])>0){
            $data['dccustomfields'] =   $this->estimates_model->dcproposalcustomfields($data['jnlsdetails']['jnlproposal'][0]['id']);
            
            
        }
        if(isset($data['jnlsdetails']['jnlvin']) && count($data['jnlsdetails']['jnlvin'])>0){
             $data['dcexpenses'] = $this->estimates_model->dcexpenses($data['jnlsdetails']['jnlvin'][0]['inv_id']);
             if(count($data['dcexpenses'])>0){
                $data['dcexpenses']['total'] = array_sum(array_column($data['dcexpenses'], 'amount'));
             }else{
				 $data['dcexpenses']['total'] = 0;
			 }
             
        }

        $formattedArray = array();

        if(isset($data['jnlsdetails']['jnlvin']) && count($data['jnlsdetails']['jnlvin'])>0){
            $formattedArray['vehiclesaleprice'] = (isset($data['jnlsdetails']['jnlvin'][0]['rate']) && $data['jnlsdetails']['jnlvin'][0]['rate']!='')? $data['jnlsdetails']['jnlvin'][0]['rate']:0;
            $inventorydetails = getinventorydetailsbyid($data['jnlsdetails']['jnlvin'][0]['inv_id']);
            if(count($inventorydetails)>0){
                $formattedArray['vehiclecostprice'] = (isset($inventorydetails[0]['purchase_price']) && $inventorydetails[0]['purchase_price']!='')? $inventorydetails[0]['purchase_price']:0;
            }
            $formattedArray['vehiclemargin'] = $formattedArray['vehiclesaleprice'] - $formattedArray['vehiclecostprice'];
            //echo "<pre>"; print_r($formattedArray); exit;
            //$formattedArray['vehiclescostprice'] = 
        }

        if(count($data['dccustomfields'])>0){
            $formattedArray['proposal_down_payment'] = (isset($data['dccustomfields']['proposal_down_payment']) && $data['dccustomfields']['proposal_down_payment']!='')? $data['dccustomfields']['proposal_down_payment']: 0;
            $formattedArray['proposal_tradein'] = (isset($data['dccustomfields']['proposal_tradein']) && $data['dccustomfields']['proposal_tradein']!='')? $data['dccustomfields']['proposal_tradein']: 0;
            $formattedArray['proposal_bank_pay_off'] = (isset($data['dccustomfields']['proposal_due']) && $data['dccustomfields']['proposal_due']!='')? $data['dccustomfields']['proposal_due']: 0;
            $formattedArray['proposal_acv'] = (isset($data['dccustomfields']['proposal_acv']) && $data['dccustomfields']['proposal_acv']!='')? $data['dccustomfields']['proposal_acv']: 0;
            $formattedArray['proposal_extended_warranty'] = (isset($data['dccustomfields']['proposal_service_contract_policy_number']) && $data['dccustomfields']['proposal_service_contract_policy_number']!='')? $data['dccustomfields']['proposal_service_contract_policy_number']: 0;
            


            $formattedArray['proposal_gap_policy'] = (isset($data['dccustomfields']['proposal_gap_policy']) && $data['dccustomfields']['proposal_gap_policy']!='')? $data['dccustomfields']['proposal_gap_policy']: 0;
            $formattedArray['proposal_gap'] = (isset($data['dccustomfields']['proposal_gap']) && $data['dccustomfields']['proposal_gap']!='')? $data['dccustomfields']['proposal_gap']: '';

            if($formattedArray['proposal_gap']!=''){
                if($formattedArray['proposal_gap']==GAP_TYPE_SEVENTYTWO_0R_LESS){
                    $formattedArray['proposal_gap_cost'] = GAP_SEVENTYTWO_OR_LESS_COST_PRICE;
                }elseif($formattedArray['proposal_gap']==GAP_TYPE_SEVENTYEIGHT_OR_MORE){
                    $formattedArray['proposal_gap_cost'] = GAP_TYPE_SEVENTYEIGHT_OR_MORE_COST_PRICE;
                }elseif($formattedArray['proposal_gap']==GAP_TYPE_LEASING){
                    $formattedArray['proposal_gap_cost'] = GAP_LEASING_COST_PRICE;
                }else{
                    $formattedArray['proposal_gap_cost'] = 0;
                }
            }else{
                $formattedArray['proposal_gap_cost'] = 0;
            }


            $total_credit_frontend = (($formattedArray['proposal_tradein'] - $formattedArray['proposal_bank_pay_off']) + $formattedArray['proposal_down_payment']);            
            $formattedArray['total_credit_frontend'] = $total_credit_frontend;            
        }

        $formattedArray['total_expenses'] = ($data['dcjournalentries']['total'] + $data['dcacv']['total'] + $data['dcexpenses']['total']);

        $frontcostprice = ($formattedArray['vehiclecostprice'] + $formattedArray['total_expenses']);
        $formattedArray['front_cost_price'] = $frontcostprice;
        $formattedArray['front_sale_price'] = $formattedArray['vehiclesaleprice'];
        $formattedArray['front_profit'] = ($formattedArray['front_sale_price'] - $formattedArray['front_cost_price']);
        

        $back_sale_price = ($formattedArray['proposal_extended_warranty'] + $formattedArray['proposal_gap_policy']);
        $back_cost_price = $formattedArray['proposal_gap_cost'];

        $balancetobefinanced = 0;
		
		$gappaidbycustomer = $formattedArray['proposal_gap_policy'];
        $servicecontractpaidbycustomer =$formattedArray['proposal_extended_warranty'];
        $gapcashicon ='';
        $servicecontracticon='';
        if($formattedArray['proposal_gap_policy']!=''){

            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
                if($data['dccustomfields']['proposal_vap_paid_by_customer']=='GAP'){
                    $gappaidbycustomer = 0;
                    $gapcashicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }elseif($data['dccustomfields']['proposal_vap_paid_by_customer']=='Service Contract'){
                    $servicecontractpaidbycustomer =0;
                    $servicecontracticon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }

        }
		
		
		
        $balancetobefinanced = (($formattedArray['vehiclesaleprice'] - $formattedArray['total_credit_frontend']) + $gappaidbycustomer);
        $formattedArray['balancetobefinanced'] = $balancetobefinanced;
        $formattedArray['back_cost_price'] = $back_cost_price;
        $formattedArray['back_sale_price'] = $back_sale_price;
        $formattedArray['back_profit'] = ($back_sale_price - $back_cost_price);
		$formattedArray['is_gap_paid_by_customer'] =$gapcashicon;
        $formattedArray['is_service_contract_paid_by_customer'] =$servicecontracticon;
        $formattedArray['acdata']= $data;

        // $data['dccustomfields'] = 
       // echo "<pre>"; print_r($formattedArray); exit; 
        //echo "<pre>"; print_r($data['dcacv']); exit;
        return  $this->load->view('admin/estimates/dealcalculator', $formattedArray);
        exit();
    }
	
	
	public function dealcalculator($id){
        //echo "<pre>"; print_r($_REQUEST); 


        $estimate = $this->estimates_model->get($id);
        $data = array();
        $data['estimate'] = $estimate;

        $data['jnlsdetails'] = getdealrecapitemsforjournals($id,$estimate->clientid,$estimate->sale_agent);

        $data['jnlentries'] = $this->estimates_model->getjournalentriesbyestimateid($id);

        $data['dcjournalentries'] = $this->estimates_model->dcjournalentries($id);
        $data['dcjournalentries']['total']= 0;
        $data['dcexpenses']['total']= 0;
        $data['dcacv']['total']= 0;
        if(count($data['dcjournalentries'])>0){
            $data['dcjournalentries']['total'] = array_sum(array_column($data['dcjournalentries'], 'attr_amount'));
        }else{
			$data['dcjournalentries']['total'] = 0;
		}

        $data['dcacv'] = $this->estimates_model->dcavcentries(1);
        if(count($data['dcacv'])>0){
            $data['dcacv']['total']= array_sum(array_column($data['dcacv'], 'amount'));
        }else{
			$data['dcacv']['total'] = 0;
		}
       
        
        $data['dccustomfields'] = array();
       // $data['dcexpenses'] = array();
        if(isset($data['jnlsdetails']['jnlproposal']) && count($data['jnlsdetails']['jnlproposal'])>0){
            $data['dccustomfields'] =   $this->estimates_model->dcproposalcustomfields($data['jnlsdetails']['jnlproposal'][0]['id']); 
        }
        if(isset($data['jnlsdetails']['jnlvin']) && count($data['jnlsdetails']['jnlvin'])>0){
             $data['dcexpenses'] = $this->estimates_model->dcexpenses($data['jnlsdetails']['jnlvin'][0]['inv_id']);
             if(count($data['dcexpenses'])>0){
                $data['dcexpenses']['total'] = array_sum(array_column($data['dcexpenses'], 'amount'));
             }else{
                $data['dcexpenses']['total'] = 0;
            }
             
        }

        $formattedArray = array();

        if(isset($data['jnlsdetails']['jnlvin']) && count($data['jnlsdetails']['jnlvin'])>0){
            $formattedArray['vehiclesaleprice'] = (isset($data['jnlsdetails']['jnlvin'][0]['rate']) && $data['jnlsdetails']['jnlvin'][0]['rate']!='')? $data['jnlsdetails']['jnlvin'][0]['rate']:0;
            $inventorydetails = getinventorydetailsbyid($data['jnlsdetails']['jnlvin'][0]['inv_id']);
            if(count($inventorydetails)>0){
                $formattedArray['vehiclecostprice'] = (isset($inventorydetails[0]['purchase_price']) && $inventorydetails[0]['purchase_price']!='')? $inventorydetails[0]['purchase_price']:0;
            }
            $formattedArray['vehiclemargin'] = $formattedArray['vehiclesaleprice'] - $formattedArray['vehiclecostprice'];
            //echo "<pre>"; print_r($formattedArray); exit;
            //$formattedArray['vehiclescostprice'] = 
        }

        if(count($data['dccustomfields'])>0){
            //echo "<pre>"; print_r($data['dccustomfields']); exit;
            $formattedArray['proposal_down_payment'] = (isset($data['dccustomfields']['proposal_down_payment']) && $data['dccustomfields']['proposal_down_payment']!='')? $data['dccustomfields']['proposal_down_payment']: 0;
            $formattedArray['proposal_tradein'] = (isset($data['dccustomfields']['proposal_tradein']) && $data['dccustomfields']['proposal_tradein']!='')? $data['dccustomfields']['proposal_tradein']: 0;
            $formattedArray['proposal_bank_pay_off'] = (isset($data['dccustomfields']['proposal_due']) && $data['dccustomfields']['proposal_due']!='')? $data['dccustomfields']['proposal_due']: 0;
            $formattedArray['proposal_acv'] = (isset($data['dccustomfields']['proposal_acv']) && $data['dccustomfields']['proposal_acv']!='')? $data['dccustomfields']['proposal_acv']: 0;
            $formattedArray['proposal_extended_warranty'] = (isset($data['dccustomfields']['proposal_service_contract_policy_number']) && $data['dccustomfields']['proposal_service_contract_policy_number']!='')? $data['dccustomfields']['proposal_service_contract_policy_number']: 0;
            
            //0402
            if($formattedArray['proposal_extended_warranty']!=''){
                $formattedArray['proposal_extended_warranty_cost_price'] = (isset($data['dccustomfields']['proposal_service_contract_cost']) && $data['dccustomfields']['proposal_service_contract_cost']!='')? $data['dccustomfields']['proposal_service_contract_cost']: 0;
            }else{
                $formattedArray['proposal_extended_warranty_cost_price'] = 0;
            }
            
            $formattedArray['proposal_power_pack_label'] = (isset($data['dccustomfields']['proposal_power_pack']) && $data['dccustomfields']['proposal_power_pack']!='')? $data['dccustomfields']['proposal_power_pack']: '';
            $formattedArray['proposal_power_pack_value'] = (isset($data['dccustomfields']['proposal_power_pack_2']) && $data['dccustomfields']['proposal_power_pack_2']!='')? $data['dccustomfields']['proposal_power_pack_2']: 0;
            if($formattedArray['proposal_power_pack_value']!=''){
                $formattedArray['proposal_power_pack_cost_price'] = POWER_PACK_COST_PRICE;
            }else{
                $formattedArray['proposal_power_pack_cost_price'] = 0;
            }
           
            
            $formattedArray['proposal_payment_protection_label'] = (isset($data['dccustomfields']['proposal_payment_protection']) && $data['dccustomfields']['proposal_payment_protection']!='')? $data['dccustomfields']['proposal_payment_protection']: '';
            $formattedArray['proposal_payment_plan_value'] = (isset($data['dccustomfields']['proposal_payment_plan']) && $data['dccustomfields']['proposal_payment_plan']!='')? $data['dccustomfields']['proposal_payment_plan']: 0;
            if($formattedArray['proposal_payment_plan_value']!=''){
                if($data['dccustomfields']['proposal_payment_protection']!=''){
                    if($data['dccustomfields']['proposal_payment_protection']=='Plan 1'){
                        $formattedArray['proposal_payment_plan_cost_value'] = PAYMENT_PROTECTION_PLAN_ONE_COST_PRICE; 
                    }else if($data['dccustomfields']['proposal_payment_protection']=='Plan 2'){
                        $formattedArray['proposal_payment_plan_cost_value'] = PAYMENT_PROTECTION_PLAN_TWO_COST_PRICE; 
                    }
                }else{
                    $formattedArray['proposal_payment_plan_cost_value'] = 0;
                }
            }else{
                $formattedArray['proposal_payment_plan_cost_value'] = 0;
            }


            $formattedArray['proposal_battery_guard_sale_price'] = (isset($data['dccustomfields']['proposal_life_insurance']) && $data['dccustomfields']['proposal_life_insurance']!='')? $data['dccustomfields']['proposal_life_insurance']: 0;
            if($formattedArray['proposal_battery_guard_sale_price']!=''){
                $formattedArray['proposal_battery_guard_cost_price'] = (isset($data['dccustomfields']['proposal_power_train_cost']) && $data['dccustomfields']['proposal_power_train_cost']!='')? $data['dccustomfields']['proposal_power_train_cost']: 0;
            
            }else{
                $formattedArray['proposal_battery_guard_cost_price'] = 0;
            
            }
           
            $formattedArray['proposal_road_assistance_sale_price'] = (isset($data['dccustomfields']['proposal_service_contract']) && $data['dccustomfields']['proposal_service_contract']!='')? $data['dccustomfields']['proposal_service_contract']: 0;
            if($formattedArray['proposal_road_assistance_sale_price']!=''){
                $formattedArray['proposal_road_assistance_cost_price']=ROAD_ASSISTANCE_COST_PRICE;
            }else{
                $formattedArray['proposal_road_assistance_cost_price'] = 0;
            }
            $formattedArray['proposal_tablillas_sale_price'] = (isset($data['dccustomfields']['proposal_tablillas']) && $data['dccustomfields']['proposal_tablillas']!='')? $data['dccustomfields']['proposal_tablillas']: 0;
            $formattedArray['proposal_tablillas_cost_price'] = 0;
            
            $formattedArray['proposal_dimond_ceramic_sale_price'] = (isset($data['dccustomfields']['proposal_credit_total_2']) && $data['dccustomfields']['proposal_credit_total_2']!='')? $data['dccustomfields']['proposal_credit_total_2']: 0;
            if($formattedArray['proposal_dimond_ceramic_sale_price']!=''){
                $fInstitution = (isset($data['dccustomfields']['proposal_financial_institution']) && $data['dccustomfields']['proposal_financial_institution']!='')? $data['dccustomfields']['proposal_financial_institution']: '';
                if($fInstitution=='First Bank'){
                    $formattedArray['proposal_dimond_ceramic_cost_price'] = DIMOND_FIRST_BANK_COST_PRICE;
                }elseif($fInstitution=='Banco Popular'){
                    $formattedArray['proposal_dimond_ceramic_cost_price'] = DIMOND_BANCO_POPULAR_COST_PRICE;
                }else if($fInstitution=='Oriental Bank'){
                    $formattedArray['proposal_dimond_ceramic_cost_price'] = DIMOND_ORIENTAL_BANK_COST_PRICE;
                }else{
                    $formattedArray['proposal_dimond_ceramic_cost_price'] = DIMOND_CASH_COST_PRICE;
                }
            
            }else{
                $formattedArray['proposal_dimond_ceramic_cost_price'] = 0;
            }
            



            $formattedArray['proposal_gap_policy'] = (isset($data['dccustomfields']['proposal_gap_policy']) && $data['dccustomfields']['proposal_gap_policy']!='')? $data['dccustomfields']['proposal_gap_policy']: 0;
            $formattedArray['proposal_gap'] = (isset($data['dccustomfields']['proposal_gap']) && $data['dccustomfields']['proposal_gap']!='')? $data['dccustomfields']['proposal_gap']: '';

            if($formattedArray['proposal_gap']!=''){
                if($formattedArray['proposal_gap']==GAP_TYPE_SEVENTYTWO_0R_LESS){
                    $formattedArray['proposal_gap_cost'] = GAP_SEVENTYTWO_OR_LESS_COST_PRICE;
                }elseif($formattedArray['proposal_gap']==GAP_TYPE_SEVENTYEIGHT_OR_MORE){
                    $formattedArray['proposal_gap_cost'] = GAP_TYPE_SEVENTYEIGHT_OR_MORE_COST_PRICE;
                }elseif($formattedArray['proposal_gap']==GAP_TYPE_LEASING){
                    $formattedArray['proposal_gap_cost'] = GAP_LEASING_COST_PRICE;
                }else{
                    $formattedArray['proposal_gap_cost'] = 0;
                }
            }else{
                $formattedArray['proposal_gap_cost'] = 0;
            }


            $total_credit_frontend = (($formattedArray['proposal_tradein'] - $formattedArray['proposal_bank_pay_off']) + $formattedArray['proposal_down_payment']);            
            $formattedArray['total_credit_frontend'] = $total_credit_frontend;            
        }

        $formattedArray['total_expenses'] = ($data['dcjournalentries']['total'] + $data['dcacv']['total'] + $data['dcexpenses']['total']);

        $frontcostprice = ($formattedArray['vehiclecostprice'] + $formattedArray['total_expenses']);
        $formattedArray['front_cost_price'] = $frontcostprice;
        $formattedArray['front_sale_price'] = $formattedArray['vehiclesaleprice'];
        $formattedArray['front_profit'] = ($formattedArray['front_sale_price'] - $formattedArray['front_cost_price']);
        
        
        
        

        $balancetobefinanced = 0;

        $gappaidbycustomer = $formattedArray['proposal_gap_policy'];
        $servicecontractpaidbycustomer =$formattedArray['proposal_extended_warranty'];
        
        
        $gapcashicon ='';
        $servicecontracticon='';

        $powerpackicon='';
        $powerpackpaidbycustomer = $formattedArray['proposal_power_pack_value'];

        $paymentproctectionicon='';
        $paymentproectionpaidbycustomer= $formattedArray['proposal_payment_plan_value'];

        $batteryguardicon='';
        $batteryguardpaidbycustomer =$formattedArray['proposal_battery_guard_sale_price'];

        $costotablillasicon ='';
        $costotablillaspaidbycustomer = $formattedArray['proposal_tablillas_sale_price'];

        $dimondceramicicon='';
        $dimondceramicpaidbycustomer =$formattedArray['proposal_dimond_ceramic_sale_price'];

        $roadassisticon = '';
        $roadassistpaidbycustomer = $formattedArray['proposal_road_assistance_sale_price'];
       
        if($formattedArray['proposal_gap_policy']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
                if(strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'GAP') !== false){
                    $gappaidbycustomer = 0;
                    $gapcashicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }



        if($formattedArray['proposal_power_pack_value']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Power Pack') !== false) {
                    $powerpackpaidbycustomer = 0;
                    $powerpackicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

        if($formattedArray['proposal_payment_plan_value']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Payment Protection') !== false) {
                    $paymentproectionpaidbycustomer = 0;
                    $paymentproctectionicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

        if($formattedArray['proposal_battery_guard_sale_price']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Battery Guard') !== false) {
                    $batteryguardpaidbycustomer = 0;
                    $batteryguardicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

        if($formattedArray['proposal_tablillas_sale_price']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Tablillas') !== false) {
                    $costotablillaspaidbycustomer = 0;
                    $costotablillasicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

        if($formattedArray['proposal_road_assistance_sale_price']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Asistencia a la Carretera') !== false) {
                    $roadassistpaidbycustomer = 0;
                    $roadassisticon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

        if($formattedArray['proposal_dimond_ceramic_sale_price']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Dimond Ceramic') !== false) {
                    $dimondceramicpaidbycustomer = 0;
                    $dimondceramicicon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

        if($formattedArray['proposal_extended_warranty']!=''){
            if(isset($data['dccustomfields']['proposal_vap_paid_by_customer']) && $data['dccustomfields']['proposal_vap_paid_by_customer']!=''){
               
                if (strpos($data['dccustomfields']['proposal_vap_paid_by_customer'], 'Service Contract') !== false) {
                    $servicecontractpaidbycustomer = 0;
                    $servicecontracticon = '<i class="fa-solid fa-money-bill" style="color:green;"></i>';
                }
            }
        }

















        $back_cost_price = ($formattedArray['proposal_gap_cost'] + $formattedArray['proposal_payment_plan_cost_value'] + $formattedArray['proposal_power_pack_cost_price'] + $formattedArray['proposal_battery_guard_cost_price'] + $formattedArray['proposal_road_assistance_cost_price'] + $formattedArray['proposal_tablillas_cost_price'] + $formattedArray['proposal_dimond_ceramic_cost_price'] + $formattedArray['proposal_extended_warranty_cost_price']);
        $back_sale_price = ($formattedArray['proposal_gap_policy'] + $formattedArray['proposal_payment_plan_value'] + $formattedArray['proposal_power_pack_value'] + $formattedArray['proposal_battery_guard_sale_price'] + $formattedArray['proposal_road_assistance_sale_price'] + $formattedArray['proposal_tablillas_sale_price'] + $formattedArray['proposal_dimond_ceramic_sale_price'] + $formattedArray['proposal_extended_warranty']);
        

        $balancetobefinanced = (($formattedArray['vehiclesaleprice'] - $formattedArray['total_credit_frontend']) + $gappaidbycustomer + $servicecontractpaidbycustomer + $powerpackpaidbycustomer + $paymentproectionpaidbycustomer + $batteryguardpaidbycustomer + $roadassistpaidbycustomer + $costotablillaspaidbycustomer + $dimondceramicpaidbycustomer);
        $formattedArray['balancetobefinanced'] = $balancetobefinanced;
        $formattedArray['back_cost_price'] = $back_cost_price;
        $formattedArray['back_sale_price'] = $back_sale_price;
        $formattedArray['back_profit'] = ($back_sale_price - $back_cost_price);
        $formattedArray['is_gap_paid_by_customer'] =$gapcashicon;
        $formattedArray['is_service_contract_paid_by_customer'] =$servicecontracticon;
        //0402
        $formattedArray['is_payment_protection_plan_paid_by_customer'] =$paymentproctectionicon;
        $formattedArray['is_power_pack_paid_by_customer'] =$powerpackicon;
        $formattedArray['is_battery_guard_paid_by_customer'] =$batteryguardicon;
        $formattedArray['is_road_assist_paid_by_customer'] =$roadassisticon;
        $formattedArray['is_tablilla_paid_by_customer'] =$costotablillasicon;
        $formattedArray['is_dimond_ceramic_paid_by_customer'] =$dimondceramicicon;
        
        $formattedArray['acdata']= $data;


        // $data['dccustomfields'] = 
        //echo "<pre>"; print_r($formattedArray); exit; 
        //echo "<pre>"; print_r($data['dcacv']); exit;
        return  $this->load->view('admin/estimates/dealcalculator', $formattedArray);
        exit();
    } 
	//deal calculator

}
