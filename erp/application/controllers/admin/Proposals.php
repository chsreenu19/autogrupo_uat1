<?php

use app\services\proposals\ProposalsPipeline;

defined('BASEPATH') or exit('No direct script access allowed');

class Proposals extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proposals_model');
        $this->load->model('currencies_model');
		$this->rental = $this->load->database('rentals', TRUE);
    }

    public function index($proposal_id = '')
    {
        $this->list_proposals($proposal_id);
    }
	
	//ableit
	function queryvaidator($query){
		$this->db->db_debug = false;
		if(!@$this->db->query($query))
		{
			$error = $this->db->error();
			$this->response(array("Status" => "Error", "Result" => $error), 200);			
		}else{
			$query = $this->db->query($query);
			$res = $query->result_array();
			return $res;
			
		}
	}
	
	
	public function salesorder($id){
		
                $url = base_url().'admin/apiint/rve/'.$id;
                // echo $url; exit;
                $ch = curl_init();                
                $curlConfig = array(
                	CURLOPT_URL            => $url,
                    CURLOPT_HEADER         => 0,
                    CURLOPT_SSL_VERIFYPEER  => false,
                    CURLOPT_SSL_VERIFYHOST  => false,
                	// CURLOPT_POST           => true,
                   	CURLOPT_RETURNTRANSFER => true,
                );
                curl_setopt_array($ch, $curlConfig);
                $result = curl_exec($ch);    
                // echo $result;exit;
                // var_dump($result);exit;         
                 $quotedata['quotedata'] = json_decode($result,true);	
                   curl_close($ch);
                    
                // echo "<pre>"; print_r($quotedata); exit;
                $this->load->view('admin/proposals/salesorder', $quotedata);
        
	}
	
	
	public function salesorder_bkp($id){
		$id=$id;
		$pid = $id;
		//echo 'here'; exit;
		$leadquery = "SELECT * FROM tblproposals WHERE id =".$pid;
		$check = $this->queryvaidator($leadquery);
		$result = array();
		if(count($check)>0){
			unset($check[0]['content']);
			$leaddata = "SELECT * FROM tblleads WHERE id =".$check[0]['rel_id'];
			$checkLeads = $this->queryvaidator($leaddata);
			//echo "<pre>"; print_r($checkLeads); exit;
			$result['title'] = 'Sales order details';
			$result['quotedata']=$check[0];
			$leadid = '';
			if(count($checkLeads )>0){
				$leadid = $checkLeads[0]['id'];
				//echo $leadid; exit;
				unset($checkLeads[0]['hash']);
				unset($checkLeads[0]['is_imported_from_email_integration']);
				unset($checkLeads[0]['assigned']);
				unset($checkLeads[0]['status']);
				unset($checkLeads[0]['source']);
				unset($checkLeads[0]['leadorder']);
				unset($checkLeads[0]['email_integration_uid']);
				$result['leadData']=$checkLeads[0];
			}else{
				$result['leadData']=$checkLeads[0];
			}
			
			
			$cid = $check[0]['id'];
			$cquery = "select * from tblcustomfields where fieldto ='proposal' ";			
			$ccheck = $this->queryvaidator($cquery);
			
			
			$leadscfqry = "SELECT * FROM `tblcustomfields` WHERE fieldto = 'leads' ";
			$leadscfqryres = $this->queryvaidator($leadscfqry);
			
			if(count($leadscfqry)>0){
				$cfarray =array();
				foreach($leadscfqryres as $ck1){
					$cfquery = "select * from tblcustomfieldsvalues where fieldid ='".$ck1['id']."' and relid= $leadid";
					//echo $cfquery; exit;
					$cfcvaluesresult = $this->queryvaidator($cfquery);
					//echo "<pre>"; print_r($cfcvaluesresult); exit;
					
					if(count($cfcvaluesresult)>0){
						$cfarray[trim($ck1['name'])]=$cfcvaluesresult[0]['value'];					
					}
					
					
				}
			}
			
			
			//echo "<pre>"; print_r($cfarray); exit;
			if(count($ccheck)>0){
				$carray =array();
				$k=0;
				foreach($ccheck as $ck){
					//echo "<pre>"; print_r($ck); exit;
					
					$ccvalues = $cquery = "select * from tblcustomfieldsvalues where fieldid ='".$ck['id']."' and relid= $cid";
					$ccvaluesresult = $this->queryvaidator($ccvalues);
					//echo "<pre>"; print_r($ccvaluesresult); exit;
					if(count($ccvaluesresult)>0){
						$carray[trim($ck['name'])]=$ccvaluesresult[0]['value'];					
					}
					//echo "<pre>"; print_r($ccvaluesresult); exit;
					
				}
				$pitems = $cquery = "select * from tblitemable where rel_id= $cid";
				$pitemsresults = $this->queryvaidator($pitems);
				//echo "<pre>"; print_r($pitemsresults); exit;
				if(count($pitemsresults)>0){
					
					
					//echo $vin; exit;
					$i=0;
					foreach($pitemsresults as $itm){
						
						//echo "<pre>"; print_r($itm); exit;				
						if (strpos($itm['description'], "-vin-") !== false) {
							$arr = explode("-", $itm['description']);
							//echo "<pre>"; print_r($arr); exit;
							$dts = array();
							if(count($arr)>0){
								
									$pitemsresults['iattributes']['vin']= trim(end($arr));
								}
								
								/*foreach($arr as $r){
									
									//$arr1 = explode(":", $r);
									
									//if (strpos($r, ":") !== false) {
										$pitemsresults[$i]['iattributes'][strip_tags(trim($arr1[0]))]=strip_tags($arr1[1]);
									//}
									
									
									
								}*/
						}
						
						
						unset($pitemsresults[$i]['long_description']);
						$i++;
						
					}	
					//echo "<pre>"; print_r($pitemsresults); exit;
				}
				
				$result['quotecustomfields']=$carray;
				$result['quotecustomfields']['leads']=$cfarray;
				$result['quoteitems']=$pitemsresults;
				//echo "<pre>"; print_r($result); exit;
				$this->load->view('admin/proposals/salesorder', $result);
				
			}
			
		}else{
			$result['quotedata'] = array();
			$this->load->view('admin/proposals/salesorder', $result);
		}
		//echo "<pre>SS"; print_r($result); exit;
		
		//echo "<pre>SS"; print_r($result); exit;
		
		//print_r($_GET); exit;
	}
	//ableit
    public function list_proposals($proposal_id = '')
    {
        close_setup_menu();

        if (!has_permission('proposals', '', 'view') && !has_permission('proposals', '', 'view_own') && get_option('allow_staff_view_estimates_assigned') == 0) {
            access_denied('proposals');
        }

        $isPipeline = $this->session->userdata('proposals_pipeline') == 'true';

        if ($isPipeline && !$this->input->get('status')) {
            $data['title']           = _l('proposals_pipeline');
            $data['bodyclass']       = 'proposals-pipeline';
            $data['switch_pipeline'] = false;
            // Direct access
            if (is_numeric($proposal_id)) {
                $data['proposalid'] = $proposal_id;
            } else {
                $data['proposalid'] = $this->session->flashdata('proposalid');
            }

            $this->load->view('admin/proposals/pipeline/manage', $data);
        } else {

            // Pipeline was initiated but user click from home page and need to show table only to filter
            if ($this->input->get('status') && $isPipeline) {
                $this->pipeline(0, true);
            }
			
			 $data['quotes_total'] = $this->proposals_model->getproposalcount();
			$data['frontsales_total'] = $this->proposals_model->getfrontsalestotal();
            $data['backsales_total'] = $this->proposals_model->getbacksalestotal();
            $data['insurance_total'] = $this->proposals_model->getinsurancetotal();
            $data['invoiced_total'] = $this->proposals_model->getinvoicedtotal();
			
			//echo "<pre>"; print_r($data);exit;

            $data['proposal_id']           = $proposal_id;
            $data['switch_pipeline']       = true;
            $data['title']                 = _l('proposals');
            $data['proposal_statuses']     = $this->proposals_model->get_statuses();
            $data['proposals_sale_agents'] = $this->proposals_model->get_sale_agents();
            $data['years']                 = $this->proposals_model->get_proposals_years();
            $this->load->view('admin/proposals/manage', $data);
        }
    }

    public function table()
    {
        if (
            !has_permission('proposals', '', 'view')
            && !has_permission('proposals', '', 'view_own')
            && get_option('allow_staff_view_proposals_assigned') == 0
        ) {
            ajax_access_denied();
        }

        $this->app->get_table_data('proposals');
    }

    public function proposal_relations($rel_id, $rel_type)
    {
        $this->app->get_table_data('proposals_relations', [
            'rel_id'   => $rel_id,
            'rel_type' => $rel_type,
        ]);
    }

    public function delete_attachment($id)
    {
        $file = $this->misc_model->get_file($id);
        if ($file->staffid == get_staff_user_id() || is_admin()) {
            echo $this->proposals_model->delete_attachment($id);
        } else {
            ajax_access_denied();
        }
    }

    public function clear_signature($id)
    {
        if (has_permission('proposals', '', 'delete')) {
            $this->proposals_model->clear_signature($id);
        }

        redirect(admin_url('proposals/list_proposals/' . $id));
    }

    public function sync_data()
    {
        if (has_permission('proposals', '', 'create') || has_permission('proposals', '', 'edit')) {
            $has_permission_view = has_permission('proposals', '', 'view');

            $this->db->where('rel_id', $this->input->post('rel_id'));
            $this->db->where('rel_type', $this->input->post('rel_type'));

            if (!$has_permission_view) {
                $this->db->where('addedfrom', get_staff_user_id());
            }

            $address = trim($this->input->post('address'));
            $address = nl2br($address);
            $this->db->update(db_prefix() . 'proposals', [
                'phone'   => $this->input->post('phone'),
                'zip'     => $this->input->post('zip'),
                'country' => $this->input->post('country'),
                'state'   => $this->input->post('state'),
                'address' => $address,
                'city'    => $this->input->post('city'),
            ]);

            if ($this->db->affected_rows() > 0) {
                echo json_encode([
                    'message' => _l('all_data_synced_successfully'),
                ]);
            } else {
                echo json_encode([
                    'message' => _l('sync_proposals_up_to_date'),
                ]);
            }
        }
    }

    public function proposal($id = '')
    {   
        if ($this->input->post()) { 
            $proposal_data = $this->input->post();
            if ($id == '') {
                if (!has_permission('proposals', '', 'create')) {
                    access_denied('proposals');
                }
                $id = $this->proposals_model->add($proposal_data);
                if ($id) {
                    set_alert('success', _l('added_successfully', _l('proposal')));
                    if ($this->set_proposal_pipeline_autoload($id)) {
                        redirect(admin_url('proposals'));
                    } else {
                        redirect(admin_url('proposals/list_proposals/' . $id));
                    }
                }
            } else {
                if (!has_permission('proposals', '', 'edit')) {
                    access_denied('proposals');
                }
                $success = $this->proposals_model->update($proposal_data, $id);
                if ($success) {
                    set_alert('success', _l('updated_successfully', _l('proposal')));
                }
                if ($this->set_proposal_pipeline_autoload($id)) {
                    redirect(admin_url('proposals'));
                } else {
                    redirect(admin_url('proposals/list_proposals/' . $id));
                }
            }
        }
       
        if ($id == '') {
            $title = _l('add_new', _l('proposal_lowercase'));
        } else {
            $data['proposal'] = $this->proposals_model->get($id);
            
            if (!$data['proposal'] || !user_can_view_proposal($id)) {
                blank_page(_l('proposal_not_found'));
            }
           
            $data['estimate']    = $data['proposal'];
            $data['is_proposal'] = true;
            $title               = _l('edit', _l('proposal_lowercase'));


            //sum of VAS
            $vasIds = implode(",",json_decode(VAS_IDS,true));
            $vasQuery = "SELECT SUM(`value`) AS 'vasTotal' FROM `tblcustomfieldsvalues` WHERE fieldid IN(".$vasIds.") AND relid= ".$id." AND fieldto='proposal'  ";
            $vasQueryExe = $this->db->query($vasQuery);
            $vasTotal = $vasQueryExe->result_array();
            // echo "<pre>";print_r($vasTotal);exit;
            if(is_array($vasTotal) && count($vasTotal)>0){
                $data['vasTotal'] =  '$'.number_format($vasTotal[0]['vasTotal'],2);
                $data['vasTotalNoFormat'] =  $vasTotal[0]['vasTotal'];
            }else{
                $data['vasTotal'] = '$0.00';
                $data['vasTotalNoFormat'] =  0;
            }

            //DEAL CALCULATOR VAP
            $dvasIds = implode(",",json_decode(VAS_IDS_DEAL_CALCULATOR,true));
            //$dvasQuery = "SELECT * FROM `tblcustomfieldsvalues` WHERE fieldid IN(".$dvasIds.") AND relid= ".$id." AND fieldto='proposal'  ";
            $dvasQuery = "
            SELECT tblcustomfieldsvalues.*, tblcustomfields.name, tblcustomfields.slug FROM `tblcustomfieldsvalues` 
            LEFT JOIN `tblcustomfields` ON `tblcustomfields`.id=tblcustomfieldsvalues.fieldid
            WHERE tblcustomfieldsvalues.fieldid IN(".$dvasIds.") 
            AND tblcustomfieldsvalues.relid= ".$id." AND tblcustomfieldsvalues.fieldto='proposal'";
           
            $dvasQueryExe = $this->db->query($dvasQuery);
            $dvasTotal = $dvasQueryExe->result_array();
            if(is_array($dvasTotal) && count($dvasTotal)>0){

                $dcvapt = 0;
                $dcostprice =0;
                foreach($dvasTotal as $dcrow){
                   // echo "<pre>"; print_r($dcrow); exit;
                    if($dcrow['slug']=='proposal_power_pack' && $dcrow['value']=='Basic'){
                       
                        $dcostprice = $dcostprice + 320;                       
                        $dcvapt = $dcvapt + 895;

                    }else if($dcrow['slug']=='proposal_power_pack' && $dcrow['value']=='Premium'){
                        $dcostprice =$dcostprice + 395;
                        $dcvapt  =$dcvapt + 995;
                    }

                    if($dcrow['slug']=='proposal_payment_protection' && $dcrow['value']=='Plan 1'){
                        $dcostprice =$dcostprice + 334;
                        $dcvapt =$dcvapt + 799;
                    }else if($dcrow['slug']=='proposal_payment_protection' && $dcrow['value']=='Plan 2'){
                        $dcostprice =$dcostprice + 334;
                        $dcvapt = $dcvapt + 549;
                    }

                    //echo "<pre>"; print_r($dcrow); exit;
                }
                //echo $dcvapt.'========'.$dcostprice; exit;
                $data['dvasTotal'] =  $dvasTotal;
                $data['dvasTotalNoFormat'] =  $dvasTotal;
            }else{
                $data['dvasTotal'] = '$0.00';
                $data['dvasTotalNoFormat'] =  0;
            }
            //echo "<pre>"; print_r($data); exit;
            //DEAL CALCULATOR VAP

            $invpricequery = "SELECT 
                                    a.id,
                                    a.rel_type,
                                    a.inv_id,
                                    b.rate,
                                    b.purchase_price,
                                    (b.rate - b.purchase_price) as 'margin'
                                FROM tblitemable a 
                                LEFT JOIN tblitems b ON a.inv_id=b.id
                                WHERE a.rel_id=".$id." 
                                    AND a.rel_type='proposal' 
                                    AND a.description LIKE '%-vin-%' 
                                ORDER BY id ASC LIMIT 1";
            $invpricequeryexe = $this->db->query($invpricequery);
            $invprice = $invpricequeryexe->result_array();
            if(is_array($invprice) && count($invprice)>0){
                $data['invoiceitemsbyquote'] =  $invprice;
            }else{
                $data['invoiceitemsbyquote'] = array();
            }                 
            
            //sum of VAS
           
        }
        
        $this->load->model('taxes_model');
        $data['taxes'] = $this->taxes_model->get();
        $this->load->model('invoice_items_model');
        $data['ajaxItems'] = false;
        if (total_rows(db_prefix() . 'items') <= ajax_on_total_items()) {
            $data['items'] = $this->invoice_items_model->get_grouped_quote();
        } else {
            $data['items']     = [];
            $data['ajaxItems'] = true;
        }
        $data['items_groups'] = $this->invoice_items_model->get_groups();

        $data['statuses']      = $this->proposals_model->get_statuses();
        $data['staff']         = $this->staff_model->get('', ['active' => 1]);
        $data['currencies']    = $this->currencies_model->get();
        $data['base_currency'] = $this->currencies_model->get_base_currency();

        $data['title'] = $title;
        // echo "<pre>";print_r($data);exit;
        $this->load->view('admin/proposals/proposal', $data);
    }

    public function get_template()
    {
        $name = $this->input->get('name');
        echo $this->load->view('admin/proposals/templates/' . $name, [], true);
    }

    public function send_expiry_reminder($id)
    {
        $canView = user_can_view_proposal($id);
        if (!$canView) {
            access_denied('proposals');
        } else {
            if (!has_permission('proposals', '', 'view') && !has_permission('proposals', '', 'view_own') && $canView == false) {
                access_denied('proposals');
            }
        }

        $success = $this->proposals_model->send_expiry_reminder($id);
        if ($success) {
            set_alert('success', _l('sent_expiry_reminder_success'));
        } else {
            set_alert('danger', _l('sent_expiry_reminder_fail'));
        }
        if ($this->set_proposal_pipeline_autoload($id)) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect(admin_url('proposals/list_proposals/' . $id));
        }
    }

    public function clear_acceptance_info($id)
    {
        if (is_admin()) {
            $this->db->where('id', $id);
            $this->db->update(db_prefix() . 'proposals', get_acceptance_info_array(true));
        }

        redirect(admin_url('proposals/list_proposals/' . $id));
    }

    public function pdf($id)
    {
        if (!$id) {
            redirect(admin_url('proposals'));
        }

        $canView = user_can_view_proposal($id);
        if (!$canView) {
            access_denied('proposals');
        } else {
            if (!has_permission('proposals', '', 'view') && !has_permission('proposals', '', 'view_own') && $canView == false) {
                access_denied('proposals');
            }
        }

        $proposal = $this->proposals_model->get($id);

        try {
            $pdf = proposal_pdf($proposal);
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

        $proposal_number = format_proposal_number($id);
        $pdf->Output($proposal_number . '.pdf', $type);
    }

    public function get_proposal_data_ajax($id, $to_return = false)
    {
        if (!has_permission('proposals', '', 'view') && !has_permission('proposals', '', 'view_own') && get_option('allow_staff_view_proposals_assigned') == 0) {
            echo _l('access_denied');
            die;
        }

        $proposal = $this->proposals_model->get($id, [], true);

        if (!$proposal || !user_can_view_proposal($id)) {
            echo _l('proposal_not_found');
            die;
        }

        $this->app_mail_template->set_rel_id($proposal->id);
        $data = prepare_mail_preview_data('proposal_send_to_customer', $proposal->email);

        $merge_fields = [];

        $merge_fields[] = [
            [
                'name' => 'Items Table',
                'key'  => '{proposal_items}',
            ],
        ];

        $merge_fields = array_merge($merge_fields, $this->app_merge_fields->get_flat('proposals', 'other', '{email_signature}'));

        $data['proposal_statuses']     = $this->proposals_model->get_statuses();
        $data['members']               = $this->staff_model->get('', ['active' => 1]);
        $data['proposal_merge_fields'] = $merge_fields;
        $data['proposal']              = $proposal;
        $data['totalNotes']            = total_rows(db_prefix() . 'notes', ['rel_id' => $id, 'rel_type' => 'proposal']);
        if ($to_return == false) {
            $this->load->view('admin/proposals/proposals_preview_template', $data);
        } else {
            return $this->load->view('admin/proposals/proposals_preview_template', $data, true);
        }
    }

    public function add_note($rel_id)
    {
        if ($this->input->post() && user_can_view_proposal($rel_id)) {
            $this->misc_model->add_note($this->input->post(), 'proposal', $rel_id);
            echo $rel_id;
        }
    }

    public function get_notes($id)
    {
        if (user_can_view_proposal($id)) {
            $data['notes'] = $this->misc_model->get_notes($id, 'proposal');
            $this->load->view('admin/includes/sales_notes_template', $data);
        }
    }

    public function convert_to_estimate($id)
    {
        if (!has_permission('estimates', '', 'create')) {
            access_denied('estimates');
        }
        if ($this->input->post()) {
            $this->load->model('estimates_model');
            $estimate_id = $this->estimates_model->add($this->input->post());
            if ($estimate_id) {
                set_alert('success', _l('proposal_converted_to_estimate_success'));
                $this->db->where('id', $id);
                $this->db->update(db_prefix() . 'proposals', [
                    'estimate_id' => $estimate_id,
                    'status'      => 3,
                ]);
                log_activity('Proposal Converted to Estimate [EstimateID: ' . $estimate_id . ', ProposalID: ' . $id . ']');

                hooks()->do_action('proposal_converted_to_estimate', ['proposal_id' => $id, 'estimate_id' => $estimate_id]);

                redirect(admin_url('estimates/estimate/' . $estimate_id));
            } else {
                set_alert('danger', _l('proposal_converted_to_estimate_fail'));
            }
            if ($this->set_proposal_pipeline_autoload($id)) {
                redirect(admin_url('proposals'));
            } else {
                redirect(admin_url('proposals/list_proposals/' . $id));
            }
        }
    }

    public function convert_to_invoice($id)
    {
        if (!has_permission('invoices', '', 'create')) {
            access_denied('invoices');
        }
        if ($this->input->post()) {
            $this->load->model('invoices_model');
            $invoice_id = $this->invoices_model->add($this->input->post());
            if ($invoice_id) {
                set_alert('success', _l('proposal_converted_to_invoice_success'));
                $this->db->where('id', $id);
                $this->db->update(db_prefix() . 'proposals', [
                    'invoice_id' => $invoice_id,
                    'status'     => 3,
                ]);
                log_activity('Proposal Converted to Invoice [InvoiceID: ' . $invoice_id . ', ProposalID: ' . $id . ']');
                hooks()->do_action('proposal_converted_to_invoice', ['proposal_id' => $id, 'invoice_id' => $invoice_id]);
                redirect(admin_url('invoices/invoice/' . $invoice_id));
            } else {
                set_alert('danger', _l('proposal_converted_to_invoice_fail'));
            }
            if ($this->set_proposal_pipeline_autoload($id)) {
                redirect(admin_url('proposals'));
            } else {
                redirect(admin_url('proposals/list_proposals/' . $id));
            }
        }
    }

    public function get_invoice_convert_data($id)
    {
        $this->load->model('payment_modes_model');
        $data['payment_modes'] = $this->payment_modes_model->get('', [
            'expenses_only !=' => 1,
        ]);
        $this->load->model('taxes_model');
        $data['taxes']         = $this->taxes_model->get();
        $data['currencies']    = $this->currencies_model->get();
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

        $data['staff']          = $this->staff_model->get('', ['active' => 1]);
        $data['proposal']       = $this->proposals_model->get($id);
        $data['billable_tasks'] = [];
        $data['add_items']      = $this->_parse_items($data['proposal']);

        if ($data['proposal']->rel_type == 'lead') {
            $this->db->where('leadid', $data['proposal']->rel_id);
            $data['customer_id'] = $this->db->get(db_prefix() . 'clients')->row()->userid;
        } else {
            $data['customer_id'] = $data['proposal']->rel_id;
            $data['project_id'] = $data['proposal']->project_id;
        }
        $data['custom_fields_rel_transfer'] = [
            'belongs_to' => 'proposal',
            'rel_id'     => $id,
        ];
        $this->load->view('admin/proposals/invoice_convert_template', $data);
    }

    public function get_estimate_convert_data($id)
    {
        $this->load->model('taxes_model');
        $data['taxes']         = $this->taxes_model->get();
        $data['currencies']    = $this->currencies_model->get();
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

        $data['staff']     = $this->staff_model->get('', ['active' => 1]);
        $data['proposal']  = $this->proposals_model->get($id);
        $data['add_items'] = $this->_parse_items($data['proposal']);

        $this->load->model('estimates_model');
        $data['estimate_statuses'] = $this->estimates_model->get_statuses();
        if ($data['proposal']->rel_type == 'lead') {
            $this->db->where('leadid', $data['proposal']->rel_id);
            $data['customer_id'] = $this->db->get(db_prefix() . 'clients')->row()->userid;
        } else {
            $data['customer_id'] = $data['proposal']->rel_id;
            $data['project_id'] = $data['proposal']->project_id;
        }

        $data['custom_fields_rel_transfer'] = [
            'belongs_to' => 'proposal',
            'rel_id'     => $id,
        ];

        $this->load->view('admin/proposals/estimate_convert_template', $data);
    }

    private function _parse_items($proposal)
    {
        $items = [];
        foreach ($proposal->items as $item) {
            $taxnames = [];
            $taxes    = get_proposal_item_taxes($item['id']);
            foreach ($taxes as $tax) {
                array_push($taxnames, $tax['taxname']);
            }
            $item['taxname']        = $taxnames;
            $item['parent_item_id'] = $item['id'];
            $item['id']             = 0;
            $items[]                = $item;
        }

        return $items;
    }

    /* Send proposal to email */
    public function send_to_email($id)
    {
        $canView = user_can_view_proposal($id);
        if (!$canView) {
            access_denied('proposals');
        } else {
            if (!has_permission('proposals', '', 'view') && !has_permission('proposals', '', 'view_own') && $canView == false) {
                access_denied('proposals');
            }
        }

        if ($this->input->post()) {
            try {
                $success = $this->proposals_model->send_proposal_to_email(
                    $id,
                    $this->input->post('attach_pdf'),
                    $this->input->post('cc')
                );
            } catch (Exception $e) {
                $message = $e->getMessage();
                echo $message;
                if (strpos($message, 'Unable to get the size of the image') !== false) {
                    show_pdf_unable_to_get_image_size_error();
                }
                die;
            }

            if ($success) {
                set_alert('success', _l('proposal_sent_to_email_success'));
            } else {
                set_alert('danger', _l('proposal_sent_to_email_fail'));
            }

            if ($this->set_proposal_pipeline_autoload($id)) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect(admin_url('proposals/list_proposals/' . $id));
            }
        }
    }

    public function copy($id)
    {
        if (!has_permission('proposals', '', 'create')) {
            access_denied('proposals');
        }
        $new_id = $this->proposals_model->copy($id);
        if ($new_id) {
            set_alert('success', _l('proposal_copy_success'));
            $this->set_proposal_pipeline_autoload($new_id);
            redirect(admin_url('proposals/proposal/' . $new_id));
        } else {
            set_alert('success', _l('proposal_copy_fail'));
        }
        if ($this->set_proposal_pipeline_autoload($id)) {
            redirect(admin_url('proposals'));
        } else {
            redirect(admin_url('proposals/list_proposals/' . $id));
        }
    }

    public function mark_action_status($status, $id)
    {
        
        if (!has_permission('proposals', '', 'edit')) {
            access_denied('proposals');
        }
        
        $success = $this->proposals_model->mark_action_status($status, $id);
		
        //echo $id; exit;
		// $success = true;
        if ($success) {
			
            if($status==SOLD_INVOICE_PENDING_ID){
                
                $this->getallquotedetails($id);

            }
            set_alert('success', _l('proposal_status_changed_success'));
        } else {
            set_alert('danger', _l('proposal_status_changed_fail'));
        }
        if ($this->set_proposal_pipeline_autoload($id)) {
            redirect(admin_url('proposals'));
        } else {
            redirect(admin_url('proposals/list_proposals/' . $id));
        }
    }

    public function getallquotedetails($quoteId){

        
       
        $url = base_url().'admin/apiint/rve/'.$quoteId;
		//echo $url; 
		$ch = curl_init();
		$curlConfig = array(
			
           CURLOPT_URL            => $url,
            CURLOPT_HEADER         => 0,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_SSL_VERIFYHOST  => false,
			//CURLOPT_POST           => true,
			CURLOPT_RETURNTRANSFER => true,
			
		);
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
        // echo $result;
		$quotedata['quotedata'] = json_decode($result,true);
		curl_close($ch);
        // echo ".....";exit;
        // echo "///////<pre>"; print_r($quotedata); exit;
        if(isset($quotedata['quotedata']['main_data']['inventory']['invid']) && $quotedata['quotedata']['main_data']['inventory']['invid']!=''){
            $updateQuery = "UPDATE ".db_prefix()."customfieldsvalues SET `value`='Sold' WHERE relid=".$quotedata['quotedata']['main_data']['inventory']['invid']." and fieldid=".INV_AVAILABLE_STATUS_FIELD_ID;
            $this->db->query($updateQuery);
			
			$itmLeadId = $quotedata['quotedata']['main_data']['lead']['id'];
            $itmLeadName = $quotedata['quotedata']['main_data']['lead']['name'];
            $itmQuoteIdId = $quotedata['quotedata']['main_data']['quote']['id'];
            $updateItmQuery = "UPDATE ".db_prefix()."items SET sold_on ='".date("Y-m-d H:i:s")."', lead_id=". $itmLeadId.", lead_name='". $itmLeadName."',quote_id=".$itmQuoteIdId." WHERE id=".$quotedata['quotedata']['main_data']['inventory']['invid'];
            //$updateItmQuery = "UPDATE ".db_prefix()."items SET sold_on ='".date("Y-m-d H:i:s")."' WHERE id=".$quotedata['quotedata']['main_data']['inventory']['invid'];
            //echo $updateQuery; exit;
             $this->db->query($updateItmQuery);
			             
			 if(IS_TRADEIN_VIN_DYNAMIC_CREATION_ENABLED){
                $this->createitembytradeinvin($quotedata['quotedata']);
            }
          
            delete_item_from_ecommerce_by_id($quotedata['quotedata']['main_data']['inventory']['invid']);

        }
        return true;
    }
	
	
	public function createitembytradeinvin($rdata){
       
         //echo "<pre>gggg"; print_r($rdata); exit;
        
         $tradeinVin =  $rdata['main_data']['custom_feilds']['proposal_tradein_vin'];
         
         //from general helper
         //$vinData = vincheck_premium_plus($tradeinVin);
         
         if(strlen($tradeinVin)==17 || strlen($tradeinVin)=='17'){
             //purchase price
             $tradeinAllowance = $rdata['main_data']['custom_feilds']['proposal_tradein'];
             $vinData = vincheck_premium_plus($tradeinVin);
             
             
             $result = json_decode($vinData,true);
            //  echo "1111111111<pre>"; print_r($result); exit;
             if(is_array($result) && count($result)>0){
 
                 $sku_code = $tradeinVin;
                 $rel_id = $rdata['main_data']['inventory']['invid'];
                 //check for duplicate skucode.
                 $checkDupSku = "SELECT * FROM ".db_prefix()."items where sku_code='".$sku_code."' ";
                 $checkDupSkuExe = $this->db->query($checkDupSku);
                 $isDuplicate = $checkDupSkuExe->result_array();
                //  echo "<pre>dup"; print_r($isDuplicate); exit;
                 if(empty($isDuplicate)){
 
                     $description = $result['spec']['attributes']['Make'] . ' ' .$result['spec']['attributes']['Model'];
                     $commodity_code = $tradeinVin.'  '.$result['spec']['attributes']['Make'] . ' ' .$result['spec']['attributes']['Model'];
                     
                     $long_description = '';
                     $long_description = 'VIN : ' . $tradeinVin . '<br/>';
                     $long_description .= 'Brand : ' .$result['spec']['attributes']['Make']. '<br/>';
                     $long_description .= 'Model : ' .$result['spec']['attributes']['Model']. '<br/>';
                     $long_description .= 'Year : ' .$result['spec']['attributes']['Year']. '<br/>';
                     $long_description .= 'Transmission : ' .$result['spec']['attributes']['Transmission Type']. '<br/>';
                     $long_description .= 'Engine : ' .$result['spec']['attributes']['Engine']. '<br/>';
                     $long_description .= 'Fuel : ' .$result['spec']['attributes']['Fuel Type']. '<br/>';
                     $long_description .= 'Mileage : ' .$result['spec']['attributes']['City Mileage']. '<br/>';
                     
                     $commissionPack = (int)$tradeinAllowance + COMMISSION_PACK_PRICE;
                     //item object
                     $postArr['description']=$description;
                     $postArr['long_description']=$long_description;
                     $postArr['rate']=0;
                     $postArr['tax']=0;
                     $postArr['tax2']='(NULL)';
                     $postArr['unit']='(NULL)';
                     $postArr['group_id']=1;
                     $postArr['commodity_code']=$commodity_code;
                     $postArr['commodity_barcode']=$tradeinVin;
                     $postArr['unit_id']=1;
                     $postArr['sku_code']=$tradeinVin;
                     $postArr['sku_name']=$description;
                     $postArr['purchase_price']=$tradeinAllowance;
                     $postArr['sub_group']='';
                     $postArr['commodity_type']=1;
                     $postArr['warehouse_id']=1;
                     $postArr['origin']='';
                     $postArr['color_id']='(NULL)';
                     $postArr['style_id']=0;
                     $postArr['model_id']=0;
                     $postArr['size_id']=0;
                     $postArr['commodity_name']='';
                     $postArr['color']='';
                     $postArr['guarantee']='';
                     $postArr['profif_ratio']='';
                     $postArr['active']=1;
                     $postArr['long_descriptions']=$long_description;
                     $postArr['without_checking_warehouse']=0;
                     $postArr['series_id']='(NULL)';
                     $postArr['parent_id']=0;
                     $postArr['attributes']='(NULL)';
                     $postArr['parent_attributes']='[]';
                     $postArr['addexpense']='(NULL)';
                     $postArr['created_on']=date("Y-m-d H:i:s");
                     $postArr['can_be_sold']='can_be_sold';
                     $postArr['can_be_purchased']='can_be_purchased';
                     $postArr['can_be_manufacturing']='can_be_manufacturing';
                     $postArr['can_be_inventory']='can_be_inventory';
                     $postArr['from_vendor_item']='(NULL)';
                     $postArr['commission_pack']=$commissionPack;
 
                     //insert in to items table
                     $this->db->insert(db_prefix() . 'items', $postArr);
                     $insert_id = $this->db->insert_id();
                     log_activity('Created vehicle [VehicleID: ' . $insert_id . ', from Quote Trade-in: ('.$tradeinVin.') from quote id ('. $rdata['main_data']['quote']['id'].') by , ClientID: ' . get_staff_user_id() . ']');
 
                    //  echo $insert_id.'<pre>';print_r($postArr); exit;
                     //custom fields
                     if($insert_id){
                         $customFieldsQry = "SELECT id, fieldto, `name`, slug FROM ".db_prefix()."customfields WHERE fieldto = 'items' AND `active`=1";
                         $customFieldsQryExe = $this->db->query($customFieldsQry);
                         $customFields = $customFieldsQryExe->result_array();
                         //echo '<pre>';print_r($customFields); exit;
                        
                         foreach($customFields as $cF){
                             $itemCarray = array();
                             $itemCarray['relid'] = $insert_id;
                             $itemCarray['fieldto'] = 'items_pr';
                             if($cF['slug']=='items_vin'){
                                 $itemCarray['fieldid'] = $cF['id'];
                                 $itemCarray['value'] = $tradeinVin;
                             }
                             elseif($cF['slug']=='items_brand'){
                                 if(isset($result['spec']['attributes']['Make']) && $result['spec']['attributes']['Make']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Make'];
                                 }
                             }
                             elseif($cF['slug']=='items_model'){
                                 if(isset($result['spec']['attributes']['Model']) && $result['spec']['attributes']['Model']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] =$result['spec']['attributes']['Model'];
                                 }
                             }
                             elseif($cF['slug']=='items_body_type'){
                                 if(isset($result['spec']['attributes']['Vehicle Type']) && $result['spec']['attributes']['Vehicle Type']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Vehicle Type'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_transmission'){
                                 if(isset($result['spec']['attributes']['Transmission Type']) && $result['spec']['attributes']['Transmission Type']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Transmission Type'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_fuel_type'){
                                 if(isset($result['spec']['attributes']['Fuel Type']) && $result['spec']['attributes']['Fuel Type']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Fuel Type'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_engine'){
                                 if(isset($result['spec']['attributes']['Engine']) && $result['spec']['attributes']['Engine']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Engine'];
                                 }
                             }
                             elseif($cF['slug']=='items_year'){
                                 if(isset($result['spec']['attributes']['Year']) && $result['spec']['attributes']['Year']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Year'];
                                 }
                             }
                             elseif($cF['slug']=='items_engine_size'){
                                 if(isset($result['spec']['attributes']['Engine Size']) && $result['spec']['attributes']['Engine Size']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Engine Size'];
                                 }
                             }
                             elseif($cF['slug']=='items_seats'){
                                 if(isset($result['spec']['attributes']['Standard Seating']) && $result['spec']['attributes']['Standard Seating']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Standard Seating'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_mileage'){
                                 if(isset($result['spec']['attributes']['City Mileage']) && $result['spec']['attributes']['City Mileage']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['City Mileage'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_category'){
                                 if(isset($result['spec']['attributes']['Vehicle Category']) && $result['spec']['attributes']['Vehicle Category']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Vehicle Category'];
                                 }
                             }
                             elseif($cF['slug']=='items_interior_color'){
                                 if(isset($result['spec']['interiorcolor']) && $result['spec']['interiorcolor']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['interiorcolor'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_exterior_color'){
                                 if(isset($result['spec']['exteriorcolor']) && $result['spec']['exteriorcolor']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['exteriorcolor'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_warranty'){
                                 if(isset($result['spec']['warranty']) && $result['spec']['warranty']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['warranty'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_doors'){
                                 if(isset($result['spec']['attributes']['Doors']) && $result['spec']['attributes']['Doors']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Doors'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_trim'){
                                 if(isset($result['spec']['attributes']['Trim']) && $result['spec']['attributes']['Trim']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Trim'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_horsepower'){
                                 if(isset($result['spec']['attributes']['HorsePower']) && $result['spec']['attributes']['HorsePower']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['HorsePower'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_cylinders'){
                                 if(isset($result['spec']['attributes']['Engine Cylinders']) && $result['spec']['attributes']['Engine Cylinders']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['attributes']['Engine Cylinders'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_mechanical'){
                                 if(isset($result['spec']['vexterior']) && $result['spec']['vexterior']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['vexterior'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_interiors'){
                                 if(isset($result['spec']['vinteriors']) && $result['spec']['vinteriors']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['vinteriors'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_security'){
                                 if(isset($result['spec']['vsafety']) && $result['spec']['vsafety']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['vsafety'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_mechanical_2'){
                                 if(isset($result['spec']['mehcanical']) && $result['spec']['mehcanical']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['mehcanical'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_entertainment'){
                                 if(isset($result['spec']['ventertainment']) && $result['spec']['ventertainment']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['spec']['ventertainment'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_vehicle_source'){
                                 $itemCarray['fieldid'] = $cF['id'];
                                 $itemCarray['value'] = 'Trade-in ('.$rdata['main_data']['lead']['name'].')';
                             }
                             elseif($cF['slug']=='items_available_status'){
                                 
                                 $itemCarray['fieldid'] = $cF['id'];
                                 $itemCarray['value'] = 'For Sale';
 
                             }
                             elseif($cF['slug']=='items_commission_price'){
                                 $itemCarray['fieldid'] = $cF['id'];
                                 $itemCarray['value'] = 0;
                             }
                             elseif($cF['slug']=='items_boleta_price'){
                                 $itemCarray['fieldid'] = $cF['id'];
                                 $itemCarray['value'] = 0;
 
                             }
                             elseif($cF['slug']=='items_commission_price_2'){
                                 $itemCarray['fieldid'] = $cF['id'];
                                 $itemCarray['value'] = 0;
 
                             }
 
                             
                             /*elseif($cF['slug']=='items_kilometers'){
                                 if(isset($result['main_data']['inventory']['Kilometers']) && $result['main_data']['inventory']['Kilometers']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Kilometers'];
                                 }
 
                             }
                             
                             
                             
                             
                             elseif($cF['slug']=='items_top_speed'){
                                 if(isset($result['main_data']['inventory']['Top Speed']) && $result['main_data']['inventory']['Top Speed']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Top Speed'];
                                 }
 
                             }
                             
                             elseif($cF['slug']=='items_tablilla'){
                                 if(isset($result['main_data']['inventory']['Tablilla']) && $result['main_data']['inventory']['Tablilla']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Tablilla'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_marbete'){
                                 if(isset($result['main_data']['inventory']['Marbete']) && $result['main_data']['inventory']['Marbete']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Marbete'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_key_number'){
                                 if(isset($result['main_data']['inventory']['Key Number']) && $result['main_data']['inventory']['Key Number']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Key Number'];
                                 }
 
                             }
                             elseif($cF['slug']=='items_auto_expreso_id_number'){
                                 if(isset($result['main_data']['inventory']['Auto Expreso ID']) && $result['main_data']['inventory']['Auto Expreso ID']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Auto Expreso ID'];
                                 }
                             }
                             elseif($cF['slug']=='items_radio_code'){
                                 if(isset($result['main_data']['inventory']['Radio Code']) && $result['main_data']['inventory']['Radio Code']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Radio Code'];
                                 }
 
                             }
                             
                             
                             
                            
                             
                             
                             elseif($cF['slug']=='items_expires'){
                                 if(isset($result['main_data']['inventory']['Marbete Vence']) && $result['main_data']['inventory']['Marbete Vence']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Marbete Vence'];
                                 }
                             }
                             
                             
                             
                             
                             elseif($cF['slug']=='items_origin'){
                                 if(isset($result['main_data']['inventory']['Origin']) && $result['main_data']['inventory']['Origin']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Origin'];
                                 }
                             }
                             elseif($cF['slug']=='items_debt_type'){
                                 if(isset($result['main_data']['inventory']['Debt Type']) && $result['main_data']['inventory']['Debt Type']!=''){
                                     $itemCarray['fieldid'] = $cF['id'];
                                     $itemCarray['value'] = $result['main_data']['inventory']['Debt Type'];
                                 }
                             }*/
 
                             $this->db->insert(db_prefix() . 'customfieldsvalues', $itemCarray);
                             
                             
 
                         }

                         //creating po for items
                         $this->able_it_create_po_item($insert_id, $rdata);
                         
                         if(IS_DEAFAULT_EXPENSES_PACKAGE_ENABLED=='yes'){							
                            $this->defaultvehicleexpenses($insert_id);
                        }
                         
                     }
 
                 }
 
             }
         }
 
     }

    
	 
	 public function defaultvehicleexpenses($id){
		$this->load->model('defaultvehicleexpenses_model');
		$expenses = $this->defaultvehicleexpenses_model->get();
       // echo "<pre>"; print_r($expenses); exit;
		if(is_array($expenses) && count($expenses)>0){
			foreach($expenses as $row){
				
				$array = array();
				$array['vendor'] = '';
				$array['expense_name'] = $row['exp_name'];
				$array['note'] = $row['exp_name'];
				$array['item_select'] = $id;
				$array['category'] = $row['exp_type'];
				$array['date'] = date("Y-m-d");
				$array['amount'] = number_format($row['exp_amount'],2);
				//$array['clientid'] = '';
				//$array['project_id'] = 
				$array['currency'] = 1;
				$array['tax'] = 0;
				//$array['tax2'] = 
				//$array['paymentmode'] = '';
				//$array['reference_no'] = '';
				//$array['repeat_every'] = 
				//$array['billable'] = 
				$array['create_invoice_billable'] = 0;
				$array['send_invoice_to_customer'] = 0;
				$array['recurring'] = 0;
				$array['addedfrom'] = get_staff_user_id();
				$array['dateadded'] = date("Y-m-d H:i:s");

				//echo "<pre>"; print_r($array); exit;
				$this->db->insert(db_prefix() . 'expenses',$array);
				//echo $this->db->insert_id();
				log_activity('Created expenses for Tradein vehicle [VehicleID: ' . $id . ', ExpenseID: ' . $this->db->insert_id() . ', ClientID: ' . get_staff_user_id() . ']');
			}
		}
		
	}

    public function delete($id)
    {
        if (!has_permission('proposals', '', 'delete')) {
            access_denied('proposals');
        }
        $response = $this->proposals_model->delete($id);
        if ($response == true) {
            set_alert('success', _l('deleted', _l('proposal')));
        } else {
            set_alert('warning', _l('problem_deleting', _l('proposal_lowercase')));
        }
        redirect(admin_url('proposals'));
    }

    public function get_relation_data_values($rel_id, $rel_type)
    {
        echo json_encode($this->proposals_model->get_relation_data_values($rel_id, $rel_type));
    }

    public function add_proposal_comment()
    {
        if ($this->input->post()) {
            echo json_encode([
                'success' => $this->proposals_model->add_comment($this->input->post()),
            ]);
        }
    }

    public function edit_comment($id)
    {
        if ($this->input->post()) {
            echo json_encode([
                'success' => $this->proposals_model->edit_comment($this->input->post(), $id),
                'message' => _l('comment_updated_successfully'),
            ]);
        }
    }

    public function get_proposal_comments($id)
    {
        $data['comments'] = $this->proposals_model->get_comments($id);
        $this->load->view('admin/proposals/comments_template', $data);
    }

    public function remove_comment($id)
    {
        $this->db->where('id', $id);
        $comment = $this->db->get(db_prefix() . 'proposal_comments')->row();
        if ($comment) {
            if ($comment->staffid != get_staff_user_id() && !is_admin()) {
                echo json_encode([
                    'success' => false,
                ]);
                die;
            }
            echo json_encode([
                'success' => $this->proposals_model->remove_comment($id),
            ]);
        } else {
            echo json_encode([
                'success' => false,
            ]);
        }
    }

    public function save_proposal_data()
    {
        if (!has_permission('proposals', '', 'edit') && !has_permission('proposals', '', 'create')) {
            header('HTTP/1.0 400 Bad error');
            echo json_encode([
                'success' => false,
                'message' => _l('access_denied'),
            ]);
            die;
        }
        $success = false;
        $message = '';

        $this->db->where('id', $this->input->post('proposal_id'));
        $this->db->update(db_prefix() . 'proposals', [
            'content' => html_purify($this->input->post('content', false)),
        ]);

        $success = $this->db->affected_rows() > 0;
        $message = _l('updated_successfully', _l('proposal'));

        echo json_encode([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // Pipeline
    public function pipeline($set = 0, $manual = false)
    {
        if ($set == 1) {
            $set = 'true';
        } else {
            $set = 'false';
        }
        $this->session->set_userdata([
            'proposals_pipeline' => $set,
        ]);
        if ($manual == false) {
            redirect(admin_url('proposals'));
        }
    }

    public function pipeline_open($id)
    {
        if (has_permission('proposals', '', 'view') || has_permission('proposals', '', 'view_own') || get_option('allow_staff_view_proposals_assigned') == 1) {
            $data['proposal']      = $this->get_proposal_data_ajax($id, true);
            $data['proposal_data'] = $this->proposals_model->get($id);
            $this->load->view('admin/proposals/pipeline/proposal', $data);
        }
    }

    public function update_pipeline()
    {
        if (has_permission('proposals', '', 'edit')) {
            $this->proposals_model->update_pipeline($this->input->post());
        }
    }

    public function get_pipeline()
    {
        if (has_permission('proposals', '', 'view') || has_permission('proposals', '', 'view_own') || get_option('allow_staff_view_proposals_assigned') == 1) {
            $data['statuses'] = $this->proposals_model->get_statuses();
            $this->load->view('admin/proposals/pipeline/pipeline', $data);
        }
    }

    public function pipeline_load_more()
    {
        $status = $this->input->get('status');
        $page   = $this->input->get('page');

        $proposals = (new ProposalsPipeline($status))
        ->search($this->input->get('search'))
        ->sortBy(
            $this->input->get('sort_by'),
            $this->input->get('sort')
        )
        ->page($page)->get();

        foreach ($proposals as $proposal) {
            $this->load->view('admin/proposals/pipeline/_kanban_card', [
                'proposal' => $proposal,
                'status'   => $status,
            ]);
        }
    }

    public function set_proposal_pipeline_autoload($id)
    {
        if ($id == '') {
            return false;
        }

        if ($this->session->has_userdata('proposals_pipeline') && $this->session->userdata('proposals_pipeline') == 'true') {
            $this->session->set_flashdata('proposalid', $id);

            return true;
        }

        return false;
    }

    public function get_due_date()
    {
        if ($this->input->post()) {
            $date    = $this->input->post('date');
            $duedate = '';
            if (get_option('proposal_due_after') != 0) {
                $date    = to_sql_date($date);
                $d       = date('Y-m-d', strtotime('+' . get_option('proposal_due_after') . ' DAY', strtotime($date)));
                $duedate = _d($d);
                echo $duedate;
            }
        }
    }
	
	//volant forms
    public function aliquidateaccounts($quoteid=''){
      
        if($quoteid!=''){
           $datajson=get_quote_details_by_id($quoteid);
           $data['quotedata'] = json_decode($datajson,true);
        //echo "<pre>ccc"; print_r($data); exit;
        $data['title'] = 'A Liquidate Accounts';
            $this->load->view('admin/proposals/forms/aliquidateaccounts', $data);
        }else{
            
            exit('No records found.');
        }
        

    }


    public function tradeinatransferandcollection(){


        $data = array();
        $this->load->view('admin/proposals/forms/tradeinatransferandcollection', $data);

    }

    public function relayresponsibility($quoteid=''){

        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Relay Responsibility';
         $this->load->view('admin/proposals/forms/relayresponsibility', $data);
         }else{
             
             exit('No records found.');
         }

       
        

    }

    public function premiumreturnnotearned($quoteid=''){


        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Premium Return not earned';
         $this->load->view('admin/proposals/forms/premiumreturnnotearned', $data);
         }else{
             
             exit('No records found.');
         }
        

    }

    public function promissorysheet($quoteid=''){
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Promisory Sheet';
         $this->load->view('admin/proposals/forms/promissorysheet', $data);
         }else{
             
             exit('No records found.');
         }
        

    }

    public function tradeinsheet($quoteid=''){


        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Trade-in Sheet';
         $this->load->view('admin/proposals/forms/tradeinsheet', $data);
         }else{
             
             exit('No records found.');
         }
        

    }

    public function vehiclewarranties($quoteid=''){


        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Vehicle Warranties';
         $this->load->view('admin/proposals/forms/vehiclewarranties', $data);
         }else{
             
             exit('No records found.');
         }
        

    }

    public function salinas($quoteid=''){


        
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Salinas';
         $this->load->view('admin/proposals/forms/salinas', $data);
         }else{
             
             exit('No records found.');
         }
        
        

    }

    public function deliveryagreement($quoteid=''){


        
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Delivery Agreement';
         $this->load->view('admin/proposals/forms/deliveryagreement', $data);
         }else{
             
             exit('No records found.');
         }
        

    }

    public function annexpurchaseorder($quoteid=''){


        
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
         //echo "<pre>ccc"; print_r($data); exit;
         $data['title'] = 'Annex to Purchase Order';
         $this->load->view('admin/proposals/forms/annexpurchaseorder', $data);
         }else{
             
             exit('No records found.');
         }
       

    }
	
	
	//new forms as per requirement
	public function agsalesorder($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
        //    echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'CONTRATO DE COMPRA VENTA';
         $this->load->view('admin/proposals/autogroup1/form1', $data);
         }else{
             
             exit('No records found.');
         }
        //$data = array();
        

    }
    public function agweowe($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'We Owe';
             $this->load->view('admin/proposals/autogroup1/form2', $data);
         }else{
             
             exit('No records found.');
         }
       

    }
    public function agspotdelivery($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'ACUERDO PARA ENTREGA INMEDIATA';
             $this->load->view('admin/proposals/autogroup1/form3', $data);
         }else{
             
             exit('No records found.');
         }
        

    }
    public function agcivilcodegaurantee($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'CONTRATO DE RENUNCIA AL DERECHO DE';
             $this->load->view('admin/proposals/autogroup1/form4', $data);
         }else{
             
             exit('No records found.');
         }
       

    }
    public function autoform5(){
        get_staff_role_id_restrict_forms();
        $data = array();
        $this->load->view('admin/proposals/autogroup1/form5', $data);

    }
    public function aggarantia($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'GARANTIA LIMITADA';
             $this->load->view('admin/proposals/autogroup1/form6', $data);
         }else{
             
             exit('No records found.');
         }
       

    }
    public function agdtop770(){
        get_staff_role_id_restrict_forms();
        $data = array('title'=>'DTOP-770');
        $this->load->view('admin/proposals/autogroup1/form7', $data);

    }
	
	//02102024

    public function agacuerdosuplementario($quoteid)
    {
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'SUPPLEMENTARY AGREEMENT';
             $this->load->view('admin/proposals/autogroup1/form8', $data);
         }else{
             
             exit('No records found.');
         }
       
    }

    public function agesignconsent($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'eConsent Document';
             $this->load->view('admin/proposals/autogroup1/form9', $data);
         }else{
             
             exit('No records found.');
         }
        
    }

    public function agfinalsignaturedocument($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'Final Signature Document';
             $this->load->view('admin/proposals/autogroup1/form10', $data);
         }else{
             
             exit('No records found.');
         }
        
    }

    public function agconducedeentrega($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'Conduce De Entraga';
             $this->load->view('admin/proposals/autogroup1/form11', $data);
         }else{
             
             exit('No records found.');
         }
        
    }

    public function agannexpurchaseorder($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'Purchase Annexure';
             $this->load->view('admin/proposals/autogroup1/form12', $data);
         }else{
             
             exit('No records found.');
         }
       
    }

    public function agwarranty($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'Garantia';
             $this->load->view('admin/proposals/autogroup1/form13', $data);
         }else{
             
             exit('No records found.');
         }
        
    }
	
	public function irs($quoteid){
        get_staff_role_id_restrict_forms();
        if($quoteid!=''){
            $datajson=get_quote_details_by_id($quoteid);
            $data['quotedata'] = json_decode($datajson,true);
           //echo "<pre>ccc"; print_r($data); exit;
             $data['title'] = 'IRS';
             $this->load->view('admin/proposals/autogroup1/irs', $data);
         }else{
             
             exit('No records found.');
         }
        
    }

    public function able_it_create_po_item($id, $rdata) {

        // echo "<Pre>";print_r($rdata);exit;
    //checking vendor contact email is existed or not
        $this->db->where('email', $rdata['main_data']['lead']['email']);
        $checkemail = $this->db->get(db_prefix() . 'pur_contacts')->result_array();
        // echo "email <pre>";print_r($checkemail);
        
    if (count($checkemail) > 0) {
        // to read vendor id 
        $vendor_id = $checkemail[0]['userid'];
    } else {
        // insert vendor along with vendor contact           
        $data = array();
        $data['company'] = $rdata['main_data']['lead']['name'].' '.$rdata['main_data']['lead']['last_name'];
        $data['vat'] = $rdata['main_data']['lead']['vat'];
        $data['phonenumber'] = $rdata['main_data']['lead']['phonenumber'];
        $data['website'] = $rdata['main_data']['lead']['website'];       
        $data['address'] = $rdata['main_data']['lead']['address'];
        $data['state'] = $rdata['main_data']['lead']['state'];
        $data['zip'] = $rdata['main_data']['lead']['zip'];
        $data['country'] = $rdata['main_data']['lead']['country'];        
        $data['leadid'] = $rdata['main_data']['lead']['id'];
        $data['billing_street'] = $rdata['main_data']['customerData'][0]['billing_street'];
        $data['billing_city'] = $rdata['main_data']['customerData'][0]['billing_city'];
        $data['billing_state'] = $rdata['main_data']['customerData'][0]['billing_state'];
        $data['billing_zip'] = $rdata['main_data']['customerData'][0]['billing_zip'];
        $data['billing_country'] = $rdata['main_data']['customerData'][0]['billing_country'];
        $data['shipping_street'] = $rdata['main_data']['customerData'][0]['shipping_street'];
        $data['shipping_city'] = $rdata['main_data']['customerData'][0]['shipping_city'];
        $data['shipping_state'] = $rdata['main_data']['customerData'][0]['shipping_state'];
        $data['shipping_zip'] = $rdata['main_data']['customerData'][0]['shipping_zip'];
        $data['shipping_country'] = $rdata['main_data']['customerData'][0]['shipping_country'];
        $data['longitude'] = $rdata['main_data']['customerData'][0]['longitude'];
        $data['default_language'] = $rdata['main_data']['customerData'][0]['default_language'];
        $data['default_currency'] = isset($rdata['main_data']['customerData'][0]['default_currency']) ? $rdata['main_data']['customerData'][0]['default_currency'] : '0';
        $data['show_primary_contact'] = isset($rdata['main_data']['customerData'][0]['show_primary_contact']) ? $rdata['main_data']['customerData'][0]['show_primary_contact']: '0';
        $data['stripe_id'] = isset($rdata['main_data']['customerData'][0]['stripe_id']) ? $rdata['main_data']['customerData'][0]['stripe_id'] : '0';
        $data['registration_confirmed'] = isset($rdata['main_data']['customerData'][0]['registration_confirmed']) ? $rdata['main_data']['customerData'][0]['registration_confirmed'] :'0';
        $data['addedfrom'] = $rdata['main_data']['lead']['addedfrom'];
        $data['datecreated'] = date('Y-m-d H:i:s');
        
        // echo "vendor details <Pre>";print_r($data);exit;
        $this->db->insert(db_prefix() . 'pur_vendor', $data);
        $vendor_id = $this->db->insert_id();

        // creating vendor contact 
        $vendor_contact = array();
        $customer_id = $vendor_id;
        // $data['contactid'] = '';
        $vendor_contact['firstname'] = isset($rdata['main_data']['lead']['name'])? $rdata['main_data']['lead']['name'] : '';
        $vendor_contact['lastname'] = isset($rdata['main_data']['lead']['last_name']) ? $rdata['main_data']['lead']['last_name'] : '';
        $vendor_contact['title'] = $rdata['main_data']['lead']['title'];
        $vendor_contact['email'] = $rdata['main_data']['lead']['email'];        
        $vendor_contact['phonenumber'] = $rdata['main_data']['lead']['phonenumber'];    
        $vendor_contact['is_primary']   = 1;
        $vendor_contact['password']= '1111111111';

        // echo "<pre>";print_r($data);exit;
        $this->load->model('purchase/purchase_model');
        $vendor_contact_id      = $this->purchase_model->add_contact($vendor_contact, $customer_id); 
     }

        $this->able_it_to_get_id($id, $vendor_id);
        
     }
    
	/**
	 * abl_it_to_get_id
	 * @param  integer $id
	 * @return view
	 */
	public function able_it_to_get_id($id, $vendorid= false) {        
        //load the warehouse model        
		// echo $id;exit;
        $this->load->model('warehouse/warehouse_model');
        $data['newitems'] = $this->warehouse_model->able_it_get_commodity($id);
				
		// echo "able_it_to_get_id <pre>"; print_r($data['newitems']);exit;		

		$customs_item_details = get_custom_fields_by_item_id($id);
        // echo "<pre>";print_r($customs_item_details);exit;		
		if ($customs_item_details['items_vin']) {		
			// check pur_order id exist in pur_order_detial  throught commodity_id
			$pur_order_detail = $this->warehouse_model->abl_it_get_pur_order_details($id);	
			
			if(count($pur_order_detail) == 0){
				$prefix = get_purchase_option('pur_order_prefix');
				$next_number = get_purchase_option('next_po_number');        
				$pur_order_number = $prefix.'-'.str_pad($next_number,5,'0',STR_PAD_LEFT).'-'.date('M-Y');   
				$data['pur_order_name'] = isset($data['newitems'][0]['sku_code'])?$data['newitems'][0]['sku_code'] :'';     
				$data['pur_order_number'] = $pur_order_number;
				$data['number'] = $next_number;      // purchase order number increase  

				$data['vendor'] =  (isset($vendorid) ? $vendorid : '');
				// $data['vendor'] = 1;  // vendor				
				
				$data['pur_request'] = '';  // purchase request text box
				$data['department'] = 1;    // text box    
				$data['project'] = 1;    // project text box
				$data['type'] = 'opex';  // type values are (opex/cpex)
				$data['currency'] = 1;   // currency text box             
				$data['order_date'] = _d(date('Y-m-d')); // order date from text box
				$delivery_date = '' ;
				$data['delivery_date'] = $delivery_date;  // deliverydate text box
				$data['buyer'] = 1;   //  person in charge in text box
				$data['clients'] = null;  // client means here customer (optinal for this)
				$data['sale_invoice'] = '';  // sale invoices in text box
				$data['from_currency'] = 1;   
				$data['currency_rate']=1;
				$data['shipping_fee'] = 0;  // text box 
				$data['days_owed'] = 1; //
				$data['terms'] = null;  // terms and conditon
				$data['vendornote'] = null;  // text box
				$data['quantity'] = 1;

				$data['dc_total'] = $data['newitems'][0]['purchase_price'];
				$data['total_mn'] = $data['newitems'][0]['purchase_price'];
				$data['grand_total'] =  $data['newitems'][0]['purchase_price'];       
				$data['total_tax'] = $data['newitems'][0]['purchase_price'];
				
				$data['item_select'] = '';
				$data['item_name'] = '';
				$data['description'] = '';
				$data['total'] = '';
				$data['quantity'] = '';
				$data['unit_price'] = '';
				$data['unit_name'] = '';
				$data['item_code'] = '';
				$data['unit_id'] = '';
				$data['discount'] = '';
				$data['into_money'] = '';
				$data['tax_rate'] = '';
				$data['tax_name'] = '';
				$data['discount_money'] = '';
				$data['total_money'] = '';
				$data['additional_discount'] = '';
				$data['tax_value'] = '';                
				$this->load->model('purchase/purchase_model');
				$id = $this->purchase_model->abl_it_add_pur_order($data);        
				$this->abl_it_create_goods_receive($id);
			} else {
				//echo "Purchase order and purchase_order_details already found!";exit;
			}
		}else {
			//echo "Vehicle VIN Existed..";
		}
		
    } // end of able_it_to_get_id function


    public function abl_it_create_goods_receive($id){
        
		$this->load->model('purchase/purchase_model');       		
		$pur_order_detail = $this->purchase_model->get_pur_order_detail($id);
		$pur_order = $this->purchase_model->get_pur_order($id);
		// echo "<Pre>";print_r($pur_order);exit;
		// echo "<Pre>";print_r($pur_order_detail);exit;
		$data = [];
		// $data['id'] = 0;
		$data['save_and_send_request'] = false;
		// $data['date_c'] = $pur_order->datecreated;            
		$data['date_c'] = date('m/d/Y', strtotime($pur_order->datecreated));    //(date('m/d/Y'));                         
		$data['date_add'] = $pur_order->order_date;
		$data['pr_order_id'] = $pur_order->id;
		$data['supplier_code'] = '';
		$data['supplier_name'] = '';
		$data['buyer_id'] = $pur_order->buyer;
		$data['type'] = $pur_order->type;
		$data['department'] = $pur_order->department;
		$data['requester'] = '';
		$data['deliver_name'] = '';            
		$data['warehouse_id'] = 1;
		$data['expiry_date'] = _d(date('Y-m-d'));
		$data['invoice_no'] = '';
		$data['description'] = $pur_order_detail[0]['description']; 
		
		$lot_number = '';
		$manufacturedate = '';
		$expiredate = '';
		$note = '';
		
		$hot_purchase = '[["'.$pur_order_detail[0]['item_code'].'", "'.$data['warehouse_id'].'", "'.$pur_order_detail[0]['unit_id'].'", "'
						.$pur_order_detail[0]['quantity'].'", "'.$pur_order_detail[0]['unit_price'].'", "'.$pur_order_detail[0]['tax'].'", "'
						.$pur_order_detail[0]['total'].'", "'.$pur_order_detail[0]['tax_value'].'", "'.$pur_order_detail[0]['discount_%'].'", "'
						 .$pur_order_detail[0]['discount_money'].'", "'.$lot_number.'", "'.$manufacturedate.'", "'.$expiredate.'", "'.$note.'"]]';
	   
		$data['hot_purchase'] = $hot_purchase;
		$data['total_goods_money'] = $pur_order->total;
		$data['total_money'] = $pur_order->total;
		$data['total_tax_money'] = $pur_order->total_tax;
		$data['value_of_inventory']  = $pur_order->total;

		// echo "<Pre>";print_r($data);exit;
		$this->load->model('warehouse/warehouse_model');
		$mess = $this->warehouse_model->abl_it_add_goods_receipt($data);
		
	}

}
