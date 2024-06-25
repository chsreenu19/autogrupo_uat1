<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inv extends ClientsController
{
    public function index($id, $hash)
    {
		//echo $id; exit;
        check_proposal_restrictions($id, $hash);
        $proposal = $this->proposals_model->get($id);
		//echo "<pre>"; print_r($proposal); exit;

        if ($proposal->rel_type == 'customer' && !is_client_logged_in()) {
            load_client_language($proposal->rel_id);
        } else if($proposal->rel_type == 'lead') {
            load_lead_language($proposal->rel_id);
        }
		
		$vas = array();
		
		$custom_fields_vas = $this->customfieldsdatabyquoteid($id);
		if(is_array($custom_fields_vas) && count($custom_fields_vas)>0){
			$proposal->total = $proposal->total + $custom_fields_vas[0]['vastotal'];
			
			$vas['id'] = $id;
			$vas['rel_id'] = $id;
			$vas['rel_type'] = '';
			$vas['description'] = 'VAS-Services';
			$vas['long_description'] = 'VAS-Services<br/>GAP, Double Insurance, Single Insurance';

			$vas['qty'] = 1;
			$vas['rate'] = $custom_fields_vas[0]['vastotal'];
			$vas['unit'] = 0;
			$vas['item_order'] =1;
			array_push($proposal->items,$vas);
		}
		
		
		
		
		
		
		
		
		

        $identity_confirmation_enabled = get_option('proposal_accept_identity_confirmation');
        if ($this->input->post()) {
            $action = $this->input->post('action');
            switch ($action) {
                case 'proposal_pdf':

                    $proposal_number = format_proposal_number($id);
                    $companyname     = get_option('invoice_company_name');
                    if ($companyname != '') {
                        $proposal_number .= '-' . mb_strtoupper(slug_it($companyname), 'UTF-8');
                    }

                    try {
                        $pdf = proposal_pdf($proposal);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        die;
                    }

                    $pdf->Output($proposal_number . '.pdf', 'D');

                    break;
                case 'proposal_comment':
                    // comment is blank
                    if (!$this->input->post('content')) {
                        redirect($this->uri->uri_string());
                    }
                    $data               = $this->input->post();
                    $data['proposalid'] = $id;
                    $this->proposals_model->add_comment($data, true);
                    redirect($this->uri->uri_string() . '?tab=discussion');

                    break;
                case 'accept_proposal':
                    $success = $this->proposals_model->mark_action_status(3, $id, true);
                    if ($success) {
                        process_digital_signature_image($this->input->post('signature', false), PROPOSAL_ATTACHMENTS_FOLDER . $id);

                        $this->db->where('id', $id);
                        $this->db->update(db_prefix().'proposals', get_acceptance_info_array());
                        redirect($this->uri->uri_string(), 'refresh');
                    }

                    break;
                case 'decline_proposal':
                    $success = $this->proposals_model->mark_action_status(2, $id, true);
                    if ($success) {
                        redirect($this->uri->uri_string(), 'refresh');
                    }

                    break;
            }
        }

        $number_word_lang_rel_id = 'unknown';
        if ($proposal->rel_type == 'customer') {
            $number_word_lang_rel_id = $proposal->rel_id;
        }
        $this->load->library('app_number_to_word', [
            'clientid' => $number_word_lang_rel_id,
        ],'numberword');

        $this->disableNavigation();
        $this->disableSubMenu();

        $data['title']     = $proposal->subject;
        $data['proposal']  = hooks()->apply_filters('proposal_html_pdf_data', $proposal);
        $data['bodyclass'] = 'proposal proposal-view';

        $data['identity_confirmation_enabled'] = $identity_confirmation_enabled;
        if ($identity_confirmation_enabled == '1') {
            $data['bodyclass'] .= ' identity-confirmation';
        }

        $this->app_scripts->theme('sticky-js','assets/plugins/sticky/sticky.js');

        $data['comments'] = $this->proposals_model->get_comments($id);
        add_views_tracking('proposal', $id);
        hooks()->do_action('proposal_html_viewed', $id);
        $this->app_css->remove('reset-css','customers-area-default');
        $data                      = hooks()->apply_filters('proposal_customers_area_view_data', $data);
        no_index_customers_area();
		
		if(is_array($custom_fields_vas) && count($custom_fields_vas)>0){
			//$data['proposal']->total = $data['proposal']->total + $custom_fields_vas[0]['vastotal'];
			//array_push($proposal->items,$vas);
		}
		
		//echo "<pre>"; print_r($data['proposal']->items); exit;
        $this->data($data);
        $this->view('viewproposal');
        $this->layout();
    }
	
	
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
	
	function customfieldsdatabyquoteid($cid){
		$cquery = "select * from tblcustomfields where fieldto ='proposal' ";			
		$ccheck = $this->queryvaidator($cquery);
		$carray =array();
		if(count($ccheck)>0){
			$carray =array();
			$k=0;
			/*foreach($ccheck as $ck){
				//echo "<pre>"; print_r($ck); exit;
				
				$ccvalues = $cquery = "select * from tblcustomfieldsvalues where fieldid ='".$ck['id']."' and relid= $cid";
				$ccvaluesresult = $this->queryvaidator($ccvalues);
				//echo "<pre>"; print_r($ccvaluesresult); exit;
				if(count($ccvaluesresult)>0){
					$carray[trim($ck['name'])]=$ccvaluesresult[0]['value'];					
				}
				//echo "<pre>"; print_r($ccvaluesresult); exit;
				
			}*/
			
			$ccvalues = "SELECT SUM(`value`) as vastotal FROM `tblcustomfieldsvalues` WHERE relid=$cid AND fieldid IN (63,64,65,66,67,68,69,70) AND fieldto='proposal' ";
			$carray = $this->queryvaidator($ccvalues);
		}
		return $carray;
	}
	
	//ableit
	/*public function warranty($id){
		$type = $_GET['type'];
		//echo $type; exit;
		//echo $id; exit;
		 $this->disableNavigation();
        $this->disableSubMenu();
		$this->app_scripts->theme('sticky-js','assets/plugins/sticky/sticky.js');
		$this->app_css->remove('reset-css','customers-area-default');
		no_index_customers_area();
		$itemdata = $this->get_item_by_id_test($id, $type);
		//exit;
		$data['title'] = $itemdata[0]['description']; 
		$data['itmdata'] = $itemdata[0]; 
		
		$this->data($data);
        $this->view('warranty');
        $this->layout();
	}*/
	public function mvsl($vin){
		
		//echo $type; exit;
		//echo $id; exit;
		 $this->disableNavigation();
        $this->disableSubMenu();
		$this->app_scripts->theme('sticky-js','assets/plugins/sticky/sticky.js');
		$this->app_css->remove('reset-css','customers-area-default');
		no_index_customers_area();
		$data = array(); 
		$data['title'] = 'APPLICATION FOR SUBMISSION OF MOTOR VEHICLE SECURITY LIEN'; 
		$this->data($data);
        $this->view('mvsl');
        $this->layout();
	}
	
	public function mvsl_es($vin){
		
		//echo $type; exit;
		//echo $id; exit;
		 $this->disableNavigation();
        $this->disableSubMenu();
		$this->app_scripts->theme('sticky-js','assets/plugins/sticky/sticky.js');
		$this->app_css->remove('reset-css','customers-area-default');
		no_index_customers_area();
		$data = array(); 
		$data['title'] = 'APPLICATION FOR SUBMISSION OF MOTOR VEHICLE SECURITY LIEN'; 
		$this->data($data);
        $this->view('mvsl_es');
        $this->layout();
	}
	
	public function rve($vin){
		
		//echo $type; exit;
		//echo $id; exit;
		 $this->disableNavigation();
        $this->disableSubMenu();
		$this->app_scripts->theme('sticky-js','assets/plugins/sticky/sticky.js');
		$this->app_css->remove('reset-css','customers-area-default');
		no_index_customers_area();
		$data = array(); 
		$data['title'] = 'Request for Registration of Vehicle of Engine'; 
		$this->data($data);
        $this->view('rve');
        $this->layout();
	}
	
	public function rve_es($vin){
		
		//echo $type; exit;
		//echo $id; exit;
		 $this->disableNavigation();
        $this->disableSubMenu();
		$this->app_scripts->theme('sticky-js','assets/plugins/sticky/sticky.js');
		$this->app_css->remove('reset-css','customers-area-default');
		no_index_customers_area();
		$data = array(); 
		$data['title'] = 'Request for Registration of Vehicle of Engine'; 
		$this->data($data);
        $this->view('rve_es');
        $this->layout();
	}
	
	public function get_item_by_id_ableit($vin){
		if($vin !=''){
			
			$getid = "SELECT a.relid,b.name, a.value 
					FROM `tblcustomfieldsvalues` a
					 JOIN `tblcustomfields` b ON b.id=a.fieldid
					 JOIN tblitems c ON c.id=a.relid
					WHERE b.name = 'VIN' AND a.value='".$vin."' AND a.fieldto ='items_pr' ORDER BY relid DESC LIMIT 1";
			$itemid = $this->db->query($getid);
			$itmdts = $itemid->result_array();
			//echo "<pre>"; print_r($getid); exit;
			if(count($itmdts)>0){
				$id = $itmdts[0]['relid'];
				$pitems = "select * from tblitems where id= $id";
				$item = $this->db->query($pitems);
				$pitemsresults = $item->result_array();
				//echo "<pre>"; print_r($pitemsresults); exit;
				if(count($pitemsresults)>0){
					$cid = $pitemsresults[0]['id'];
					$pitemscf = $cquery = "SELECT a.relid,b.name, a.value 
												FROM `tblcustomfieldsvalues` a
												 JOIN `tblcustomfields` b ON b.id=a.fieldid
												WHERE a.relid = $id AND a.fieldto ='items_pr'";
					$itemcf = $this->db->query($pitemscf);
					$pitemsresultscf = $itemcf->result_array();
					//echo "<pre>"; print_r($pitemsresultscf); exit;
					$j=0;
					if(count($pitemsresultscf)>0){
						unset($pitemsresultscf['Exteriors']);
						unset($pitemsresultscf['Interiors']);
						unset($pitemsresultscf['Security']);
						unset($pitemsresultscf['Mechanical']);
						unset($pitemsresultscf['Entertainment']);
						
						foreach($pitemsresultscf as $itm){
							$pitemsresults[0]['iattributes'][strip_tags(trim($itm['name']))]=strip_tags(trim($itm['value']));
							$j++;
						}
						if(isset($pitemsresults['iattributes']['VIN'])){
							$pitemsresults[0]['vinnumber']=$pitemsresults['iattributes']['VIN'];
						}else{
							$pitemsresults[0]['vinnumber']='';
						}
						$pitemsresults[0]['qty']=1;
						//echo "<pre>"; print_r($pitemsresults); exit;
						return $pitemsresults;
					}
				}
			}
		}
	}
	
	
	public function get_item_by_id($id, $type)
    {
		
			if(isset($type) && $type!=''){
				$pitems = "select * from tblitems where id= $id";
				$item = $this->db->query($pitems);
				$pitemsresults = $item->result_array();
				//echo "<pre>"; print_r($pitemsresults); exit;
				if(count($pitemsresults)>0){
					$pitemscf = $cquery = "SELECT a.relid,b.name, a.value 
												FROM `tblcustomfieldsvalues` a
												 JOIN `tblcustomfields` b ON b.id=a.fieldid
												WHERE a.relid = $id AND a.fieldto ='items_pr'";
					$itemcf = $this->db->query($pitemscf);
					$pitemsresultscf = $itemcf->result_array();
					//echo "<pre>"; print_r($pitemsresultscf); exit;
					$j=0;
					if(count($pitemsresultscf)>0){
						unset($pitemsresultscf['Exteriors']);
						unset($pitemsresultscf['Interiors']);
						unset($pitemsresultscf['Security']);
						unset($pitemsresultscf['Mechanical']);
						unset($pitemsresultscf['Entertainment']);
						
						foreach($pitemsresultscf as $itm){
							$pitemsresults[0]['iattributes'][strip_tags(trim($itm['name']))]=strip_tags(trim($itm['value']));
							$j++;
						}
						if(isset($pitemsresults['iattributes']['VIN'])){
							$pitemsresults[0]['vinnumber']=$pitemsresults['iattributes']['VIN'];
						}else{
							$pitemsresults[0]['vinnumber']='';
						}
						//echo "<pre>"; print_r($pitemsresults); exit;
						return $pitemsresults;
					}
				}
				
			}else{
				$pitems = $cquery = "select * from tblitemable where id= $id";
			
			
				$item = $this->db->query($pitems);
				$pitemsresults = $item->result_array();
				//echo "<pre>"; print_r($pitemsresults); exit;
				if(count($pitemsresults)>0){
					
					
					//echo $vin; exit;
					$i=0;
					foreach($pitemsresults as $itm){
						
						
						
						
						if (strpos($itm['long_description'], "\n") !== false) {
							$vinexplode = explode("\n", $itm['long_description']);
							//echo "<pre>ss"; print_r($vinexplode); exit;
							$vin = '';
							if(count($vinexplode)>0){
								$vin = $vinexplode[1];
								$pitemsresults[$i]['vinnumber']=$vin;
							}else{
								$pitemsresults[$i]['vinnumber']='';
							}
						}
						
						
						//echo $itm['long_description']; exit;
						$arr = explode("\n", $itm['long_description']);

						$dts = array();
						if(count($arr)>0){
							
							foreach($arr as $r){
								//echo "<pre>"; print_r($r); exit;
								$arr1 = explode(":", $r);
								
								if (strpos($r, " : ") !== false) {
									//echo strip_tags(trim($arr1[0])).'<br>';
									$pitemsresults[$i]['iattributes'][strip_tags(trim($arr1[0]))]=strip_tags(trim($arr1[1]));
								}
								
								
								
							}
						}
						//unset($pitemsresults[$i]['long_description']);
						$i++;
						echo "<pre>ss"; print_r($pitemsresults); exit;
					}	
					return $pitemsresults;
				}else{
					echo 'No matching record. Please contact administrator'; exit;
				}
			
			
			
			}
			
        
    }
}
