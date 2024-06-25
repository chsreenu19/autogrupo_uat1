<?php

use app\services\imap\Imap;
use app\services\imap\ConnectionErrorException;
use Ddeboer\Imap\Exception\MailboxDoesNotExistException;

header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', E_ALL);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);

class Apiint extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('leads_model');
    }


    /* Add or update lead */
    public function lead()
    {
		echo 'hre'; exit;
      //echo "<pre>"; print_r($this->input->post()); 
	  //echo "<pre>"; print_r(unserialize($this->input->post()['data'])); 
	  //exit;
	  
        if ($this->input->post()) {
			$array = array();
			
			$array['status'] = $this->input->post()['status'];
			$array['source'] = $this->input->post()['source'];
			$array['assigned'] = $this->input->post()['assigned'];;
			$array['name'] =$this->input->post()['name'];		
			$array['email'] = $this->input->post()['email'];
			$array['phonenumber'] =  $this->input->post()['phonenumber'];
			$array['lead_value'] = $this->input->post()['lead_value'];
			$array['lastcontact'] = date("Y-m-d H:i:s");
			$array['dateadded'] = date("Y-m-d H:i:s");
			$array['description'] =$this->input->post()['description'];
			$array['addedfrom'] = 1;
            //echo "<pre>"; print_r($array); exit;
			$id      = $this->leads_model->add($array);
			echo $id;
  
        }

        exit;
    }
	
	
	public function account()
    {
		//echo 'hre'; exit;
     // echo "<pre>"; print_r($this->input->post()); 
	  //echo "<pre>"; print_r(unserialize($this->input->post()['data'])); 
	  //exit;
	  
        if ($this->input->post()) {
			$array = array();
		
			$id = $this->input->post()['id'];
			
			$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://localhost/apis/node/services/call/convertcustomer',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('id' => $id),
		  CURLOPT_HTTPHEADER => array(
			'X-API-KEY: f10913997505573b2f34eb77aa479509',
			'Cookie: ci_session=jknvj5731r47ekte6se6pkierlp7mfsb'
		  ),
		));
  
        }

        exit;
    }
	
	
	
	
	public function rve($id){
		
		//$companyData =  format_organization_info_ableit();	
		//echo "<pre>"; print_r($this->getquoteandleaddetailsbyid($id)); exit;
		$result =  $this->getquoteandleaddetailsbyid($id);
		echo json_encode($result);
	}
	
	public function makerequesttoesignature($id){
		//echo $id; exit;
		$result['Token'] = $this->generateJWTToken();
		$result['Data'] = $this->getquoteandleaddetailsbyid($id);
		//echo "<pre>"; print_r($result); exit;
		echo json_encode($result);
	}
	
	public function generateJWTToken(){
			
			//echo base_url(); exit;
		$ch = curl_init();
		$curlConfig = array(
			CURLOPT_URL            => base_url().'/integrations-api/jwt-token/gettokendetails.php',
			//CURLOPT_POST           => true,
			CURLOPT_RETURNTRANSFER => true,
			
		);
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
		curl_close($ch);
		$data = json_decode($result,true);	
		//echo "<pre>"; print_r($data); exit;
		if(isset($data['TokenLength']) && $data['TokenLength']!=0){
			return $data['Token'];
		}else{
			return 'NoToken';
		}
		
	}
	
	public function creditapplicationdatabyquoteid($id){
		
		echo json_encode($this->getquoteandleaddetailsbyid($id)); exit;
		
	}
	
	public function getquoteandleaddetailsbyid($id){
		$id=$id;
		$pid = $id;
		//echo 'here'; exit;
		$leadquery = "SELECT * FROM tblproposals WHERE id =".$pid;
		$check = $this->queryvaidator($leadquery);
		//echo "<pre>"; print_r($check); exit;
		$result = array();
		$invoiceId ='';
		if(count($check)>0){
			if(isset($check[0]['assigned']) && $check[0]['assigned']!=''){
				$staffDts = get_staff($check[0]['assigned']);
				//echo "<pre>"; print_r($staffDts); exit;
				$check[0]['assignedtofname'] = $staffDts->firstname;
				$check[0]['assignedtolname'] = $staffDts->lastname;
				$check[0]['assignedtophonenumber'] = $staffDts->phonenumber;
			}
			
			$invoiceId = isset($check[0]['invoice_id']) ? $check[0]['invoice_id'] : '';
			
			//echo $invoiceId; exit;
			//echo "<pre>"; print_r($staffDts); exit;
			
			unset($check[0]['content']);			
			unset($check[0]['allow_comments']);			
			unset($check[0]['estimate_id']);			
			unset($check[0]['invoice_id']);			
			unset($check[0]['date_converted']);			
			unset($check[0]['pipeline_order']);			
			unset($check[0]['is_expiry_notified']);			
			unset($check[0]['acceptance_date']);			
			unset($check[0]['acceptance_ip']);			
			unset($check[0]['signature']);			
			unset($check[0]['open_till']);			
			unset($check[0]['rel_type']);			
			unset($check[0]['total_tax']);			
			$leadId = $check[0]['rel_id'];
			$leaddata = "SELECT * FROM tblleads WHERE id =".$leadId;
			$checkLeads = $this->queryvaidator($leaddata);
			//echo "<pre>"; print_r($checkLeads); exit;
			$result['quotedata']=$check[0];
			$leadid = '';
			if(count($checkLeads )>0){
				$leadid = $checkLeads[0]['id'];
				unset($checkLeads[0]['hash']);
				unset($checkLeads[0]['is_imported_from_email_integration']);
				unset($checkLeads[0]['assigned']);
				unset($checkLeads[0]['status']);
				unset($checkLeads[0]['source']);
				unset($checkLeads[0]['leadorder']);
				unset($checkLeads[0]['email_integration_uid']);

				$leadCustomFields = "select * from tblcustomfields where fieldto ='leads' and active =1";
				$lcf = $this->queryvaidator($leadCustomFields);
				if(count($lcf)>0){
					$carray =array();
					$k=0;
					foreach($lcf as $lcfr){
						$lcfrvalues = $cquery = "select * from tblcustomfieldsvalues where fieldid ='".$lcfr['id']."' and relid= $leadId";
						$lcfrresult = $this->queryvaidator($lcfrvalues);
						//echo "<pre>"; print_r($ccvaluesresult); exit;
						///if(count($lcfrresult)>0){
							$checkLeads[0][$lcfr['name']]=isset($lcfrresult[0]['value']) ? $lcfrresult[0]['value'] : '';					
						//}
						//echo "<pre>"; print_r($ccvaluesresult); exit;
						
					}
				}
				$result['leadData']=$checkLeads[0];
				//$result['leadData']['customfields']=$carray;
			}else{
				$result['leadData']=$checkLeads[0];
			}
			
			
			$cid = $check[0]['id'];
			//echo $cid; exit;
			$cquery = "select * from tblcustomfields where fieldto ='proposal' and active=1";			
			$ccheck = $this->queryvaidator($cquery);
			//echo "<pre>"; print_r($ccheck); exit;
			if(count($ccheck)>0){
				$carray =array();
				$k=0;
				foreach($ccheck as $ck){
					//echo "<pre>"; print_r($ck); exit;
					
					$ccvalues = $cquery = "select * from tblcustomfieldsvalues where fieldid ='".$ck['id']."' and relid= $cid";
					$ccvaluesresult = $this->queryvaidator($ccvalues);
					//echo "<pre>"; print_r($ccvaluesresult); exit;
					//if(count($ccvaluesresult)>0){
						$carray[$ck['slug']]=isset($ccvaluesresult[0]['value']) ? $ccvaluesresult[0]['value']:'';					
					//}
					//echo "<pre>"; print_r($ccvaluesresult); exit;
					
				}
				

				$pitems = $cquery = "select * from tblitemable where rel_id= $cid AND rel_type='proposal' AND description LIKE '%-vin-%'";
				$pitemsresults = $this->queryvaidator($pitems);
				//echo "<pre>"; print_r($pitemsresults); exit;
				if(count($pitemsresults)>0){
					
					
					//echo $vin; exit;
					$i=0;
					$invitemId= '';
					foreach($pitemsresults as $itm){
						//echo "<pre>"; print_r($itm); exit;
						if (strpos($itm['description'], " ") !== false) {
							$vinexplode = explode(" ", $itm['description']);
							//echo "<pre>"; print_r($vinexplode); exit;
							$vin = '';
							if(count($vinexplode)>0){
								//echo 'jer';
								$vin = end($vinexplode);
								$item = "select * from tblitems where sku_code='".$vin."' ";
								//echo $item; exit;
								$itemsresults = $this->queryvaidator($item);
								//echo "<pre>dd"; print_r($itemsresults); exit;
								//$pitemsresults[$i]['vinnumber']=$vin;
								if(count($itemsresults)>0){
									$invitemId = $itemsresults[0]['id'];
									$pitemsresults[$i] = $itemsresults[0];
									$itemcustomflds = "SELECT 
														b.name,a.value
														FROM `tblcustomfieldsvalues` a
														RIGHT JOIN tblcustomfields b ON a.fieldid=b.id
														WHERE
														a.relid=$invitemId
														AND a.fieldto='items_pr'";
									//echo $itemcustomflds;					
									$itemcustomfldsres = $this->queryvaidator($itemcustomflds);
									
									//echo "<pre>"; print_r($itemcustomfldsres); exit;
									
									foreach($itemcustomfldsres as $r){
										//echo "<pre>"; print_r($r); exit;
										//echo "<pre>"; print_r($itm['long_description']); //exit;
										$pitemsresults[$i]['iattributes'][$r['name']]=$r['value'];
									
										
									}
									
									//echo "<pre>"; print_r($pitemsresults); exit;
									
								}
									
							}
						}
						
						
						
						/*$arr = explode("\n", $itm['long_description']);
						//echo "<pre>"; print_r($arr); exit;
						$dts = array();
						if(count($arr)>0){
							
							foreach($arr as $r){
								//echo "<pre>"; print_r($r); exit;
								$arr1 = explode(":", $r);
								
								if (strpos($r, ":") !== false) {
									echo "<pre>"; print_r($itm['long_description']); //exit;
									$pitemsresults[$i]['iattributes'][$arr1[0]]=strip_tags($arr1[1]);
								}
								
								
								
							}
							$pitemsresults[$i]['iattributes']['vinnumber']=$pitemsresults[$i]['vinnumber'];
						}*/
						//unset($pitemsresults[$i]['long_description']);
						$i++;
						
					}	
					//echo "<pre>"; print_r($pitemsresults); exit;
				}

				$tradeIndetails = array();
				//echo "<pre>"; print_r($carray); exit;
				$tradeIndetails['make'] = $carray['proposal_make_2'];
				$tradeIndetails['model'] = $carray['proposal_model_2'];
				$tradeIndetails['year'] = $carray['proposal_year_2'];
				$tradeIndetails['vin'] = $carray['proposal_tradein_vin'];
				$tradeIndetails['tablilla'] = $carray['proposal_tablilla'];
				$tradeIndetails['millage'] = $carray['proposal_millage'];
				$tradeIndetails['color'] = $carray['proposal_color_2'];
				$tradeIndetails['proposal_marbete'] = $carray['proposal_marbete'];
				$tradeIndetails['proposal_vence'] = $carray['proposal_vence'];
				$tradeIndetails['proposal_due'] = $carray['proposal_due'];
				$tradeIndetails['proposal_serial_number'] = $carray['proposal_serial_number'];
				$tradeIndetails['proposal_financing_institution_account_no'] = $carray['proposal_financing_institution_account_no'];
				$tradeIndetails['proposal_bank_financing_institution'] = $carray['proposal_bank_financing_institution'];
				$tradeIndetails['proposal_pending_balance_pay_off_balance'] = $carray['proposal_pending_balance_pay_off_balance'];
				$tradeIndetails['proposal_policy_number'] = $carray['proposal_policy_number'];
				$tradeIndetails['proposal_service_contract_number'] = $carray['proposal_service_contract_number'];
				
				$quoteInv = array();
				foreach($pitemsresults as $inv){
					if(isset($inv['iattributes'])){
						$quoteInv = $inv['iattributes'];
						$quoteInv['rate'] = $inv['rate'];
						$quoteInv['description'] = $inv['description'];
					}
				}


				unset($carray['proposal_brand_2']);
				unset($carray['proposal_model_2']);
				unset($carray['proposal_ano']);
				unset($carray['proposal_vin']);
				unset($carray['proposal_tablilla']);
				unset($carray['proposal_millage']);
				//unset($carray['proposal_color']);
				
				
				
				
				$contacts = "SELECT b.* FROM tblclients a LEFT JOIN tblcontacts b ON b.userid=a.userid WHERE a.leadid=2292";
				$contactsData = $this->queryvaidator($contacts);
				
				
				$customerrecords = "SELECT  * FROM tblclients WHERE leadid=$leadid";
				$customerData = $this->queryvaidator($customerrecords);
				
				
				
				if($invoiceId!=''){
					$invoiceRecords = "SELECT  * FROM tblinvoices WHERE id=$invoiceId";
					$invoiceResults = $this->queryvaidator($invoiceRecords);
					
					if(is_array($invoiceResults) && count($invoiceResults)>0){
						$paymentModeId = unserialize($invoiceResults[0]['allowed_payment_modes']);
						//echo "<pre>"; print_r(unserialize($paymentModeId)); exit;
						if(is_array($paymentModeId) && count($paymentModeId)>0){
							$paymentModesArr = array();
							$pids = '';
							foreach($paymentModeId as $row){
								$pids .= $row.',';
								//$pmode = "SELECT  * FROM tblpayment_modes WHERE id=$row";
								//$pmodeResults = $this->queryvaidator($invoiceRecords);
							}
							$pids = rtrim($pids, ','); 
							$pmode = "SELECT id, name FROM tblpayment_modes WHERE id in ($pids)";
							//echo $pmode; exit;
							$pmodeResults = $this->queryvaidator($pmode);
							//echo "<pre>"; print_r($pmodeResults); exit;
							$paymentIdt = $pmodeResults[0]['id'];
							//echo $paymentIdt; exit;
							$paymentdts = "SELECT
												a.*,
												b.name
											FROM tblinvoicepaymentrecords a
											LEFT JOIN tblpayment_modes b ON a.paymentmode=b.id
											WHERE a.invoiceid=$paymentIdt";
											//echo $paymentdts; exit;
											
							$pmtResults = $this->queryvaidator($paymentdts);	
							
							//echo "<pre>s"; print_r($pmtResults); exit;		
							$result['invoices_payment'] = $pmtResults;
							$result['invoices_modes']=$pmodeResults[0]['name'];
						}
					}
					
					
					
					
					
					
					$result['invoices']=$carray;
				}
				//echo "<pre>ssss"; print_r($carray); exit;		
				$result['quoteitems']=$pitemsresults;
				$result['tradeindetails']=$tradeIndetails;
				$result['quoteinventory']=$quoteInv;
				$result['quotecustomfields']=$carray;
				//echo "<pre>"; print_r($result['quotecustomfields']); exit;
				$result['leadcontacts']=$contactsData;
				$result['customerData']=$customerData;
				
				//echo json_encode($result); exit;
				//echo "<pre>"; print_r($result); exit;
				return $this->esignature($result);
			}
			//$this->response(array("Status" => "Success", "Result" => $result), 200);
		}else{
			echo json_encode(array("Status" => "Error", "Result" => 'No records found')); exit;
			//$this->response(, 200);
			
		}
		//echo "<pre>"; print_r($result); exit;
		
	}
	
	function esignature($data){
		
		//echo "<pre>"; print_r($data); exit; 
		// isset($data['']['']) ? $data['']['']:''; 
		//echo $data['quotecustomfields']['proposal_financial_institution']; exit;
		$customerName = isset($data['leadData']['name']) ? $data['leadData']['name']:'';
		$array = array();
		
		$array['trade_in']['fecha'] = isset($data['quotedata']['date']) ? $data['quotedata']['date']:''; 
		$array['trade_in']['yo'] = $customerName;
		$array['trade_in']['marca'] = isset($data['tradeindetails']['make']) ? $data['tradeindetails']['model']:'';
		$array['trade_in']['modelo'] =  isset($data['tradeindetails']['model']) ? $data['tradeindetails']['make']:'';
		$array['trade_in']['tablilla'] =  isset($data['tradeindetails']['tablilla']) ? $data['tradeindetails']['tablilla']:'';
		$array['trade_in']['num_serie'] =  isset($data['tradeindetails']['proposal_serial_number']) ? $data['tradeindetails']['proposal_serial_number']:'';	
		$array['trade_in']['num_cuenta'] =  isset($data['tradeindetails']['proposal_financing_institution_account_no']) ? $data['tradeindetails']['proposal_financing_institution_account_no']:'';
		$array['trade_in']['banco'] =  isset($data['tradeindetails']['proposal_bank_financing_institution']) ? $data['tradeindetails']['proposal_bank_financing_institution']:'';	
		$array['trade_in']['balance_pendiente'] =  isset($data['tradeindetails']['proposal_pending_balance_pay_off_balance']) ? $data['tradeindetails']['proposal_pending_balance_pay_off_balance']:	
		$array['trade_in']['num_poliza'] =  isset($data['tradeindetails']['proposal_policy_number']) ? $data['tradeindetails']['proposal_policy_number']:'';	
		$array['trade_in']['contrato_servicio'] =  isset($data['tradeindetails']['proposal_service_contract_number']) ? $data['tradeindetails']['proposal_service_contract_number']:'';


		$array['factura_venta']['comprador_nombre'] = $customerName;	
		$array['factura_venta']['direccion_residencial'] = isset($data['leadData']['address']) ? $data['leadData']['address']:'';	
		$array['factura_venta']['direccion_postal'] = isset($data['leadData']['zip']) ? $data['leadData']['zip']:'';
		$array['factura_venta']['fecha_entrega'] = isset($data['quotedata']['date']) ? $data['quotedata']['date']:'';
		//$array['factura_venta']['seguro_social'] = isset($data['leadData']['Social Security Number']) ? $data['leadData']['Social Security Number']:'';
		$array['factura_venta']['seguro_social'] = isset($data['leadData']['Social Security Number']) ? '###-##-'.substr($data['leadData']['Social Security Number'], -4):'';
		$array['factura_venta']['fecha_nacimiento'] = isset($data['leadData']['Date of Birth']) ? $data['leadData']['Date of Birth']:'';	
		$array['factura_venta']['num_licencia'] = isset($data['leadData']['License Number']) ? $data['leadData']['License Number']:'';		
		$array['factura_venta']['telefono'] = isset($data['leadData']['phonenumber']) ? $data['leadData']['phonenumber']:'';	
		$array['factura_venta']['celular'] = isset($data['leadData']['Mobile No']) ? $data['leadData']['Mobile No']:'';	
		$array['factura_venta']['email'] = isset($data['leadData']['email']) ? $data['leadData']['email']:'';
		$array['factura_venta']['vehiculo_vendido_estado'] = isset($data['quotecustomfields']['proposal_type']) ? $data['quotecustomfields']['proposal_type']:'';	
		$array['factura_venta']['vehiculo_vendido_num_stock'] = isset($data['quoteinventory']['VIN']) ? $data['quoteinventory']['VIN']:'';
		$array['factura_venta']['vehiculo_vendido_anio'] = isset($data['quoteinventory']['Year']) ? $data['quoteinventory']['Year']:'';
		$array['factura_venta']['vehiculo_vendido_marca'] = isset($data['quoteinventory']['Brand']) ? $data['quoteinventory']['Brand']:'';
		$array['factura_venta']['vehiculo_vendido_modelo'] = isset($data['quoteinventory']['Model']) ? $data['quoteinventory']['Model']:'';	
		$array['factura_venta']['vehiculo_vendido_vin'] = isset($data['quoteinventory']['VIN']) ? $data['quoteinventory']['VIN']:'';	
		$array['factura_venta']['vehiculo_vendido_color'] = isset($data['quoteinventory']['Exterior Color']) ? $data['quoteinventory']['Exterior Color']:'';
		$array['factura_venta']['vehiculo_vendido_millaje'] = isset($data['quoteinventory']['Mileage']) ? $data['quoteinventory']['Mileage']:'';	
		$array['factura_venta']['vehiculo_vendido_tablilla'] = isset($data['quoteinventory']['Tablilla']) ? $data['quoteinventory']['Tablilla']:'';
		$array['factura_venta']['vehiculo_vendido_marbete'] = isset($data['quotecustomfields']['proposal_marbete']) ? $data['quoteinventory']['proposal_marbete']:'';	
		$array['factura_venta']['vehiculo_vendido_vence'] = isset($data['quotecustomfields']['proposal_vence']) ? $data['quoteinventory']['proposal_vence']:'';	
		$array['factura_venta']['precio_unidad'] = isset($data['quoteinventory']['rate']) ? $data['quoteinventory']['rate']:'';	
		
		if($data['quotedata']['date']!=''){
			$array['pago_vehiculo']['fecha_dia'] = date('d',strtotime($data['quotedata']['date']));
			$array['pago_vehiculo']['fecha_mes'] = date('m',strtotime($data['quotedata']['date']));
			$array['pago_vehiculo']['fecha_anio'] =  date('Y',strtotime($data['quotedata']['date']));
		}else{
			$array['pago_vehiculo']['fecha_dia'] = '';
			$array['pago_vehiculo']['fecha_mes'] ='';
			$array['pago_vehiculo']['fecha_anio'] =  '';
		}
		

	 
		
		$array['pago_vehiculo']['yo'] = $customerName;	
		$array['pago_vehiculo']['modelo'] = isset($data['quoteinventory']['Brand']) ? $data['quoteinventory']['Brand']:'';
		$array['pago_vehiculo']['anio'] = isset($data['quoteinventory']['Year']) ? $data['quoteinventory']['Year']:'';
		$array['pago_vehiculo']['num_cuenta'] = isset($data['quotecustomfields']['proposal_account_number']) ? $data['quotecustomfields']['proposal_account_number']:'';	
		$array['pago_vehiculo']['institucion_financiera'] = isset($data['quotecustomfields']['proposal_financial_institution']) ? $data['quotecustomfields']['proposal_financial_institution']:'';
		$array['pago_vehiculo']['compania_seguro'] =isset($data['quotecustomfields']['proposal_insurance_company']) ? $data['quotecustomfields']['proposal_insurance_company']:'';	
		$array['pago_vehiculo']['compania_seguro_poliza'] = isset($data['quotecustomfields']['proposal_service_contract']) ? $data['quotecustomfields']['proposal_service_contract']:'';	
		$array['pago_vehiculo']['contrato_servicio'] = isset($data['quotecustomfields']['proposal_insurance_policy']) ? $data['quotecustomfields']['proposal_insurance_policy']:'';	
		$array['pago_vehiculo']['contrato_servicio_poliza'] = isset($data['quotecustomfields']['proposal_service_contract_policy_number']) ? $data['quotecustomfields']['proposal_service_contract_policy_number']:'';	
		$array['pago_vehiculo']['gap'] = isset($data['quotecustomfields']['proposal_gap']) ? $data['quotecustomfields']['proposal_gap']:'';		
		$array['pago_vehiculo']['gap_poliza'] = isset($data['quotecustomfields']['proposal_gap_policy']) ? $data['quotecustomfields']['proposal_gap_policy']:'';	

			
		$array['estimado_quote']['estimado'] = isset($data['quotedata']['id']) ? $data['quotedata']['id']:'';
		$array['estimado_quote']['fecha_hora'] = isset($data['quotedata']['date']) ? $data['quotedata']['date']:'';
		$array['estimado_quote']['vendedor'] = isset($data['quotedata']['assignedtofname']) ? $data['quotedata']['assignedtofname']:'';
		$array['estimado_quote']['precio_venta'] = isset($data['quotedata']['total']) ? $data['quotedata']['total']:'';	
		$array['estimado_quote']['gastos_traspaso'] = '';	
		$array['estimado_quote']['total'] = isset($data['quotedata']['total']) ? $data['quotedata']['total']:'';	
		$array['estimado_quote']['pronto'] = isset($data['quotecustomfields']['proposal_down_payment']) ? $data['quotecustomfields']['proposal_down_payment']:'';	
		$array['estimado_quote']['balance_a_financiar']	= isset($data['quotecustomfields']['proposal_balance']) ? $data['quotecustomfields']['proposal_balance']:'';
		$array['estimado_quote']['trade_in']	= isset($data['quotecustomfields']['proposal_tradein']) ? $data['quotecustomfields']['proposal_tradein']:'';
		$array['estimado_quote']['entidad_financiera']	= isset($data['quotecustomfields']['proposal_financial_institution']) ? trim($data['quotecustomfields']['proposal_financial_institution']):'';	
		$array['estimado_quote']['termino']	= isset($data['quotecustomfields']['proposal_payment_term']) ? $data['quotecustomfields']['proposal_payment_term']:'';	
		$array['estimado_quote']['pago_mensual']	= isset($data['quotecustomfields']['proposal_monthly_payment']) ? $data['quotecustomfields']['proposal_monthly_payment']:'';	
		//vehicle detials
		$array['estimado_quote']['marca']	= isset($data['quoteinventory']['Brand']) ? $data['quoteinventory']['Brand']:'';	
		$array['estimado_quote']['modelo']	= isset($data['quoteinventory']['Model']) ? $data['quoteinventory']['Model']:'';	
		$array['estimado_quote']['version']	= isset($data['quoteinventory']['Trim']) ? $data['quoteinventory']['Trim']:'';	
		$array['estimado_quote']['anio'] = isset($data['quoteinventory']['Year']) ? $data['quoteinventory']['Year']:'';	
		$array['estimado_quote']['millaje'] = isset($data['quoteinventory']['Mileage']) ? $data['quoteinventory']['Mileage']:'';
		$array['estimado_quote']['tablilla'] = isset($data['quoteinventory']['Tablilla']) ? $data['quoteinventory']['Tablilla']:'';	


		$array['pago_multas']['yo'] = $customerName;	
		$array['pago_multas']['marca'] = isset($data['tradeindetails']['make']) ? $data['tradeindetails']['make']:'';	
		$array['pago_multas']['modelo'] = isset($data['tradeindetails']['model']) ? $data['tradeindetails']['make']:'';	
		$array['pago_multas']['anio'] = isset($data['tradeindetails']['year']) ? $data['tradeindetails']['year']:'';	
		$array['pago_multas']['tablilla'] = isset($data['tradeindetails']['tablilla']) ? $data['tradeindetails']['tablilla']:'';		
		$array['pago_multas']['num_serie'] = isset($data['tradeindetails']['proposal_serial_number']) ? $data['tradeindetails']['proposal_serial_number']:'';	
		$array['pago_multas']['dia_dejado'] = isset($data['quotedata']['date']) ? $data['quotedata']['date']:'';	


		$array['recibo_pago_pronto']['num_control'] = isset($data['quotedata']['id']) ? $data['quotedata']['id']:'';	
		$array['recibo_pago_pronto']['fecha'] = isset($data['quotedata']['date']) ? $data['quotedata']['date']:'';
		$array['recibo_pago_pronto']['num_stock'] = isset($data['quoteinventory']['VIN']) ? $data['quoteinventory']['VIN']:'';
		$array['recibo_pago_pronto']['vin'] = isset($data['quoteinventory']['VIN']) ? $data['quoteinventory']['VIN']:'';	
		$array['recibo_pago_pronto']['recibido_de'] = $customerName;	
		//$array['recibo_pago_pronto']['cantidad'] = (isset($data['quotecustomfields']['proposal_down_payment']) ? $data['quotecustomfields']['proposal_down_payment']:'') + (isset($data['quotecustomfields']['proposal_tablillas']) ? $data['quotecustomfields']['proposal_tablillas']:'');	
		$array['recibo_pago_pronto']['cantidad'] = (int) (isset($data['quotecustomfields']['proposal_down_payment']) ? $data['quotecustomfields']['proposal_down_payment']:0) + (int) (isset($data['quotecustomfields']['proposal_tablillas']) ? $data['quotecustomfields']['proposal_tablillas']:0);	
		$array['recibo_pago_pronto']['compra_del'] = $array['estimado_quote']['marca'].','.$array['estimado_quote']['modelo'].','.$array['estimado_quote']['anio'];	
		$array['recibo_pago_pronto']['concepto'] = $array['recibo_pago_pronto']['cantidad'];
		
		//echo "<pre>"; print_r($data['invoices_modes']); exit;
		if((isset($data['invoices_modes'])) && $data['invoices_modes']!=''){	
			$array['recibo_pago_pronto']['tipo_pago'] = $data['invoices_modes'];	
		}else{
			$array['recibo_pago_pronto']['tipo_pago'] = '';
		}
		$array['recibo_pago_pronto']['num_cheque'] = '';

		//echo "<pre>"; print_r($data['quoteinventory']); exit;

		$array['garantia']['marca'] = isset($data['quoteinventory']['Brand']) ? $data['quoteinventory']['Brand']:'';		
		$array['garantia']['modelo'] = isset($data['quoteinventory']['Model']) ? $data['quoteinventory']['Model']:'';	
		$array['garantia']['anio'] = isset($data['quoteinventory']['Year']) ? $data['quoteinventory']['Year']:'';	
		$array['garantia']['num_serie'] = isset($data['quoteinventory']['VIN']) ? $data['quoteinventory']['VIN']:'';	
		$array['garantia']['num_inventario'] = isset($data['quoteinventory']['VIN']) ? $data['quoteinventory']['VIN']:'';	
		$array['garantia']['millaje'] = isset($data['quoteinventory']['Mileage']) ? $data['quoteinventory']['Mileage']:'';
		$array['garantia']['tablilla'] = isset($data['quoteinventory']['Tablilla']) ? $data['quoteinventory']['Tablilla']:'';	
		$array['garantia']['precio'] = isset($data['quoteinventory']['Boleta Price']) ? $data['quoteinventory']['Boleta Price']:'';
		
		$var = intval(preg_replace('/[^\d.]/', '', $array['garantia']['millaje'].' Miles/gallon'));
		$int = (int)$var;
		//$mileage = $itmdata['iattributes']['Mileage'];
		//echo $int; exit;
		//$int= 100001;
		$mes = '';
		if($int >0 && $int<= 36000){
			$mes = '4 meses o cuatro mil millas, lo primero que ocurra.';
		}else if($int > 36000 && $int <= 50000){
			$mes = '3 meses o tres mil millas, Lo primero que ocurra';
		}else if($int>50000 && $int<=100000){
			$mes = '2 meses o dos mil millas, lo primero que ocurra';
		}else if($int>100000){
			$mes='100,000 mil millas en Adelante no tiene garantia';
		}
		$array['garantia']['tipo_garantia'] = $mes;	
		
		
		//consolidated data
		$array['main_data']['lead'] = $data['leadData']; 
		$array['main_data']['quote'] = $data['quotedata']; 
		$array['main_data']['tradein'] = $data['tradeindetails']; 
		$array['main_data']['inventory'] = $data['quoteinventory']; 
		$array['main_data']['custom_feilds'] = $data['quotecustomfields']; 
		
		
		$array['main_data']['VehicleInformation']['make'] = $array['garantia']['marca'];
		$array['main_data']['VehicleInformation']['model'] = $array['garantia']['modelo'];
		$array['main_data']['VehicleInformation']['year'] = $array['garantia']['anio'];
		$array['main_data']['VehicleInformation']['price'] = $array['garantia']['precio'];
		$array['main_data']['VehicleInformation']['term'] = $array['estimado_quote']['termino'];
		$array['main_data']['VehicleInformation']['millage'] = $array['garantia']['millaje'];
		$array['main_data']['VehicleInformation']['vin'] = $array['garantia']['num_serie'];
		$array['main_data']['VehicleInformation']['downpayment'] = $array['estimado_quote']['pronto'];
		$array['main_data']['VehicleInformation']['vechicleDesc'] = $array['garantia']['num_serie'];
		$array['main_data']['VehicleInformation']['tradein'] = $array['estimado_quote']['trade_in'];
		$array['main_data']['VehicleInformation']['balance'] = $array['estimado_quote']['balance_a_financiar'];
		
		//$array['main_data']['VehicleInformation']['insurance'] = 
		
		$array['main_data']['personalInformation']['name']= $customerName;
		$array['main_data']['personalInformation']['lastname']= '';
		$array['main_data']['personalInformation']['mothersmaiden']= '';
		$array['main_data']['personalInformation']['ssn']= $array['factura_venta']['seguro_social'];
		$array['main_data']['personalInformation']['dob']= $array['factura_venta']['fecha_nacimiento'];
		$array['main_data']['personalInformation']['resaddress']= $array['factura_venta']['direccion_residencial'];
		$array['main_data']['personalInformation']['reszip']= $array['factura_venta']['direccion_postal'];
		$array['main_data']['personalInformation']['mailaddress']= '';
		$array['main_data']['personalInformation']['timeinaddress']= '';
		$array['main_data']['personalInformation']['mailzip']= '';
		$array['main_data']['personalInformation']['email']= $array['factura_venta']['email'];
		$array['main_data']['personalInformation']['resstatus']= '';
		$array['main_data']['personalInformation']['telephone']= $array['factura_venta']['telefono'];
		$array['main_data']['personalInformation']['noofdependents']= '';
		$array['main_data']['personalInformation']['montly_payment']= $array['estimado_quote']['pago_mensual'];
		$array['main_data']['personalInformation']['mortgage']= '';
		$array['main_data']['personalInformation']['sourceofincome']= '';
		$array['main_data']['personalInformation']['otherincome']= '';
		
		$array['main_data']['personalInformation']['empyr_nameadd']= '';
		$array['main_data']['personalInformation']['empyr_zip']= '';
		$array['main_data']['personalInformation']['empyr_years']= '';
		$array['main_data']['personalInformation']['empyr_months']= '';
		$array['main_data']['personalInformation']['empyr_position']= '';
		$array['main_data']['personalInformation']['empyr_montlyincome']= '';
		$array['main_data']['personalInformation']['empyr_supervisorname']= '';
		$array['main_data']['personalInformation']['empyr_supervisorphone']= '';
		
		$array['main_data']['quotedate']['date'] = $array['factura_venta']['fecha_entrega'];
		$array['main_data']['quotedate']['Salesperson'] = $array['estimado_quote']['vendedor'];
		$array['main_data']['quotedate']['SalespersonPhone'] = isset($data['quotedata']['assignedtophonenumber']) ? $data['quotedata']['assignedtophonenumber']:'';;
		$array['main_data']['company_data'] = format_organization_info_ableit();	
		$array['main_data']['contacts'] = $data['leadcontacts'];	
		$array['main_data']['customerData'] = $data['customerData'];	
		$array['main_data']['invoices'] = $data['invoices'];	
		$array['main_data']['invoices_modes'] = $data['invoices_modes'];	
		$array['main_data']['invoices_payment'] = $data['invoices_payment'];	
		
		//echo "<pre>"; print_r($array); exit; 
		return $array;
		//echo json_encode($array); exit;
		//echo "<pre>"; print_r($array); exit; 
	}
	
	function queryvaidator($query){
		$this->db->db_debug = false;
		if(!@$this->db->query($query))
		{
			$error = $this->db->error();
			return array("Status" => "Error", "Result" => $error);			
		}else{
			$query = $this->db->query($query);
			$res = $query->result_array();
			return $res;
			
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
