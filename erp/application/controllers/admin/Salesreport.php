<?php

use app\services\proposals\ProposalsPipeline;

defined('BASEPATH') or exit('No direct script access allowed');

class Salesreport extends AdminController
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
	
	
	
	
	
	
	
	//ableit
    public function list_proposals($proposal_id = '')
    {
        close_setup_menu();

        if (!has_permission('proposals', '', 'view') && !has_permission('proposals', '', 'view_own') && get_option('allow_staff_view_estimates_assigned') == 0) {
            access_denied('proposals');
        }

        $isPipeline = $this->session->userdata('proposals_pipeline') == 'true';
		
        if ($isPipeline && !$this->input->get('status')) {
            $data['title']           = 'VAP Sales Report';
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
			
			
			
			 //ableit
            $data['quotes_total'] = $this->proposals_model->getproposalcount();
            $data['frontsales_total'] = $this->proposals_model->getfrontsalestotal();
            $data['backsales_total'] = $this->proposals_model->getbacksalestotal();
            $data['invoiced_total'] = $this->proposals_model->getinvoicedtotal();
            //ableit

            $data['proposal_id']           = $proposal_id;
            $data['switch_pipeline']       = true;
            $data['title']                 = _l('VAP Sales Report');
            $data['proposal_statuses']     = $this->proposals_model->get_statuses();
            $data['proposals_sale_agents'] = $this->proposals_model->get_sale_agents();
            $data['years']                 = $this->proposals_model->get_proposals_years();
			
			
			
			$data['backsalescat'] = $this->getbacksalescats();
			
            $this->load->view('admin/salesreport/manage', $data);
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

        $this->app->get_table_data('salesreport');
    }

    public function getbacksalescats(){
		$backSalesIds = json_decode(BACKSALES_IDS,true);
        $bids = implode(",",$backSalesIds);
		$query = "SELECT 
					tblcustomfields.id,
					tblcustomfields.name,
					SUM(tblcustomfieldsvalues.value) as 'tot'
				FROM tblcustomfields
				LEFT JOIN tblcustomfieldsvalues ON tblcustomfieldsvalues.fieldid=tblcustomfields.id
				WHERE tblcustomfields.id IN (".$bids.") AND tblcustomfieldsvalues.fieldto ='proposal'
				GROUP BY tblcustomfields.name";
		//echo $query; exit;		
		$queryExe = $this->db->query($query);
		return $queryExe->result_array();	
	}

    

    

    
}
