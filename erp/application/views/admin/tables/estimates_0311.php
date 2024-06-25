<?php

defined('BASEPATH') or exit('No direct script access allowed');

$project_id = $this->ci->input->post('project_id');

$aColumns = [
    'number',
    'total',
    'total_tax',
    'YEAR(date) as year',
    get_sql_select_client_company(),
    db_prefix() . 'projects.name as project_name',
    '(SELECT GROUP_CONCAT(name SEPARATOR ",") FROM ' . db_prefix() . 'taggables JOIN ' . db_prefix() . 'tags ON ' . db_prefix() . 'taggables.tag_id = ' . db_prefix() . 'tags.id WHERE rel_id = ' . db_prefix() . 'estimates.id and rel_type="estimate" ORDER by tag_order ASC) as tags',
    'date',
    'expirydate',
    'reference_no',
    db_prefix() . 'estimates.status',
    ];

$join = [
    'LEFT JOIN ' . db_prefix() . 'clients ON ' . db_prefix() . 'clients.userid = ' . db_prefix() . 'estimates.clientid',
    'LEFT JOIN ' . db_prefix() . 'currencies ON ' . db_prefix() . 'currencies.id = ' . db_prefix() . 'estimates.currency',
    'LEFT JOIN ' . db_prefix() . 'projects ON ' . db_prefix() . 'projects.id = ' . db_prefix() . 'estimates.project_id',
];

$sIndexColumn = 'id';
$sTable       = db_prefix() . 'estimates';

$custom_fields = get_table_custom_fields('estimate');

foreach ($custom_fields as $key => $field) {
    $selectAs = (is_cf_date($field) ? 'date_picker_cvalue_' . $key : 'cvalue_' . $key);
    array_push($customFieldsColumns, $selectAs);
    array_push($aColumns, 'ctable_' . $key . '.value as ' . $selectAs);
    array_push($join, 'LEFT JOIN ' . db_prefix() . 'customfieldsvalues as ctable_' . $key . ' ON ' . db_prefix() . 'estimates.id = ctable_' . $key . '.relid AND ctable_' . $key . '.fieldto="' . $field['fieldto'] . '" AND ctable_' . $key . '.fieldid=' . $field['id']);
}

$where  = [];
$filter = [];

if ($this->ci->input->post('not_sent')) {
    array_push($filter, 'OR (sent= 0 AND ' . db_prefix() . 'estimates.status NOT IN (2,3,4))');
}
if ($this->ci->input->post('invoiced')) {
    array_push($filter, 'OR invoiceid IS NOT NULL');
}

if ($this->ci->input->post('not_invoiced')) {
    array_push($filter, 'OR invoiceid IS NULL');
}
$statuses  = $this->ci->estimates_model->get_statuses();
$statusIds = [];
foreach ($statuses as $status) {
    if ($this->ci->input->post('estimates_' . $status)) {
        array_push($statusIds, $status);
    }
}
if (count($statusIds) > 0) {
    array_push($filter, 'AND ' . db_prefix() . 'estimates.status IN (' . implode(', ', $statusIds) . ')');
}

$agents    = $this->ci->estimates_model->get_sale_agents();
$agentsIds = [];
foreach ($agents as $agent) {
    if ($this->ci->input->post('sale_agent_' . $agent['sale_agent'])) {
        array_push($agentsIds, $agent['sale_agent']);
    }
}
if (count($agentsIds) > 0) {
    array_push($filter, 'AND sale_agent IN (' . implode(', ', $agentsIds) . ')');
}

$years      = $this->ci->estimates_model->get_estimates_years();
$yearsArray = [];
foreach ($years as $year) {
    if ($this->ci->input->post('year_' . $year['year'])) {
        array_push($yearsArray, $year['year']);
    }
}
if (count($yearsArray) > 0) {
    array_push($filter, 'AND YEAR(date) IN (' . implode(', ', $yearsArray) . ')');
}

if (count($filter) > 0) {
    array_push($where, 'AND (' . prepare_dt_filter($filter) . ')');
}

if ($clientid != '') {
    array_push($where, 'AND ' . db_prefix() . 'estimates.clientid=' . $this->ci->db->escape_str($clientid));
}

if ($project_id) {
    array_push($where, 'AND project_id=' . $this->ci->db->escape_str($project_id));
}

if (!has_permission('estimates', '', 'view')) {
    $userWhere = 'AND ' . get_estimates_where_sql_for_staff(get_staff_user_id());
    array_push($where, $userWhere);
}

$aColumns = hooks()->apply_filters('estimates_table_sql_columns', $aColumns);

// Fix for big queries. Some hosting have max_join_limit
if (count($custom_fields) > 4) {
    @$this->ci->db->query('SET SQL_BIG_SELECTS=1');
}

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [
    db_prefix() . 'estimates.id',
    db_prefix() . 'estimates.clientid',
    db_prefix() . 'estimates.invoiceid',
    db_prefix() . 'currencies.name as currency_name',
    'project_id',
    'deleted_customer_name',
    'hash',
]);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];

    $numberOutput = '';
    // If is from client area table or projects area request
    if (is_numeric($clientid) || $project_id) {
        $numberOutput = '<a href="' . admin_url('estimates/list_estimates/' . $aRow['id']) . '" target="_blank">' . format_estimate_number($aRow['id']) . '</a>';
    } else {
        $numberOutput = '<a href="' . admin_url('estimates/list_estimates/' . $aRow['id']) . '" onclick="init_estimate(' . $aRow['id'] . '); return false;">' . format_estimate_number($aRow['id']) . '</a>';
    }

    $numberOutput .= '<div class="row-options">';

    $numberOutput .= '<a href="' . site_url('estimate/' . $aRow['id'] . '/' . $aRow['hash']) . '" target="_blank">' . _l('view') . '</a>';
    if (has_permission('estimates', '', 'edit')) {
        $numberOutput .= ' | <a href="' . admin_url('estimates/estimate/' . $aRow['id']) . '">' . _l('edit') . '</a>';
    }
	
	
		$getProposalIdByESTIDQry = "SELECT 
                                        a.id AS 'quoteId',
                                        b.description,
                                        b.long_description,
                                        b.qty,
                                        b.rate,
                                        b.vin,
                                        b.inv_id
                                    FROM tblproposals a
                                    LEFT JOIN tblitemable b ON b.rel_id=a.id AND b.rel_type='proposal'
                                    WHERE b.inv_id>0 and a.estimate_id=".$aRow['id'];
        //echo $getProposalIdByESTIDQry; exit;
        $getProposalIdByESTIDQryExe = $this->ci->db->query($getProposalIdByESTIDQry); 
        $getProposalIdByESTIDResult = $getProposalIdByESTIDQryExe->result_array();
	
	
	
	
	
	if(count($getProposalIdByESTIDResult)>0){
	
	
	
	
	
	$numberOutput .= '| <a target="_blank" href="' . admin_url('proposals/proposal/' . $getProposalIdByESTIDResult[0]['quoteId']) . '">' . _l('Quote') . '</a>';
	}
	
    $numberOutput .= '</div>';

    $row[] = $numberOutput;

    $amount = app_format_money($aRow['total'], $aRow['currency_name']);

    if ($aRow['invoiceid']) {
        $amount .= '<br /><span class="hide"> - </span><span class="text-success tw-text-sm">' . _l('estimate_invoiced') . '</span>';
    }

    $row[] = $amount;

   // $row[] = app_format_money($aRow['total_tax'], $aRow['currency_name']);

    $row[] = $aRow['year'];

    if (empty($aRow['deleted_customer_name'])) {
        $row[] = '<a href="' . admin_url('clients/client/' . $aRow['clientid']) . '">' . $aRow['company'] . '</a>';
    } else {
        $row[] = $aRow['deleted_customer_name'];
    }


    $getProposalIdByESTIDQry = "SELECT 
                                        a.id AS 'quoteId',
                                        b.description,
                                        b.long_description,
                                        b.qty,
                                        b.rate,
                                        b.vin,
                                        b.inv_id
                                    FROM tblproposals a
                                    LEFT JOIN tblitemable b ON b.rel_id=a.id 
                                    WHERE b.inv_id>0 and a.estimate_id=".$aRow['id']. " AND b.rel_type='proposal'";
        //echo $getProposalIdByESTIDQry; exit;
        $getProposalIdByESTIDQryExe = $this->ci->db->query($getProposalIdByESTIDQry); 
        $getProposalIdByESTIDResult = $getProposalIdByESTIDQryExe->result_array();
       // echo "<pre>"; print_r($getProposalIdByESTIDResult);
        $vin='';
        if(is_array($getProposalIdByESTIDResult) && count($getProposalIdByESTIDResult)>0){
            $itemQry = "select sku_code,purchase_price from tblitems where id = ".$getProposalIdByESTIDResult[0]['inv_id'];
            $itemQryExe = $this->ci->db->query($itemQry);
            $itemResult = $itemQryExe->result_array();
            //echo "<pre>"; print_r($itemResult);
            if(count($itemResult)>0){
				$vin = $itemResult[0]['sku_code'];
                if($itemResult[0]['purchase_price']>0){
                    $fCostPrice = app_format_money($itemResult[0]['purchase_price'], $aRow['currency_name']);
                    $fSalePrice = app_format_money($getProposalIdByESTIDResult[0]['rate'], $aRow['currency_name']);
                    $fMargin = $getProposalIdByESTIDResult[0]['rate'] - $itemResult[0]['purchase_price'];
                    $fMarginClass = $itemResult[0]['purchase_price'] - $getProposalIdByESTIDResult[0]['rate'];
                    $fMargin = app_format_money($fMargin, $aRow['currency_name']);
                    $class="";
					
                    if($getProposalIdByESTIDResult[0]['rate']<$itemResult[0]['purchase_price']){
                        $class = "style=color:red !important;";
                    }else if($getProposalIdByESTIDResult[0]['rate']==$itemResult[0]['purchase_price']){
                        $class = "style=color:orange !important;";
                    }else{
                        $class = "style=color:green !important;";
                    }
					
                    $row[] ="Price:".$fSalePrice."<br>Cost:".$fCostPrice."<br><span ".$class.">Margin:<span>".$fMargin."";
                    //echo $fMargin; exit;
                }else{
                   // echo 'else'; exit;
                    $row[] = "Price:".app_format_money($getProposalIdByESTIDResult[0]['rate'],$aRow['currency_name'])."<br>Cost:NA<br>Margin:NA";
                }
            }else{

                $row[] = "Price:".app_format_money($getProposalIdByESTIDResult[0]['rate'],$aRow['currency_name'])."<br>Cost:NA<br>Margin:NA";
            }

        }else{

            $row[] = "";
        }
		
		if(!empty($vin)){
		$row[] = 	'<span class="label label-tag tag-id-1"><span class="tag"><a target="blank" href="'.base_url('proposal/warranty/' . $vin).'" >' . $vin . '</a></span><span class="hide">, </span></span>&nbsp';
		}else{
			$row[]='';
		}
        if(is_array($getProposalIdByESTIDResult) && count($getProposalIdByESTIDResult)>0){

            $backSalesIds = json_decode(BACKSALES_IDS_FOR_DEALRECAP,true);
            $bids = implode(",",$backSalesIds);
            $bQuery = "SELECT a.id,
                            a.name,
                            a.slug,
                            b.value	
                        FROM `tblcustomfields` a 
                        LEFT JOIN `tblcustomfieldsvalues` b ON b.fieldid=a.id
                        WHERE a.id IN(". $bids.") AND relid=".$getProposalIdByESTIDResult[0]['quoteId']."  AND b.fieldto='proposal'";
						//echo $bQuery; exit;
           $bQueryExe = $this->ci->db->query($bQuery);
           $bQueryResult = $bQueryExe->result_array();
          // echo "<pre>"; print_r($bQueryResult); exit; 
           $bsPrice =0;
           $bsCost = 0;
           $bsMargin=0;
           if(is_array($bQueryResult) && count($bQueryResult)>0){

             foreach($bQueryResult as $bsRow){
                //echo "<pre>"; print_r($bsRow); //exit;
                if($bsRow['slug']=='proposal_gap'){
                    if($bsRow['value']=='GAP 3-6 Years (Premiere)'){
                        $bsPrice += 599;
                        $bsCost += 349;
                    }else if($bsRow['value']=='GAP 7 Years (Premiere)'){
                        $bsPrice += 699;
                        $bsCost += 399;                        
                    }else if($bsRow['value']=='Gap Leasing'){
                        $bsPrice += 799;
                        $bsCost += 549;                        
                    }                    
                }


                if($bsRow['slug']=='proposal_power_pack'){
                    if($bsRow['value']=='Basic'){
                        $bsPrice += 895;
                        $bsCost += 320;
                    }else if($bsRow['value']=='Premium'){
                        $bsPrice += 995;
                        $bsCost += 395;                        
                    }                   
                }


                if($bsRow['slug']=='proposal_payment_protection'){
                    if($bsRow['value']=='Plan 1'){
                        $bsPrice += 799;
                        $bsCost += 334;
                    }else if($bsRow['value']=='Plan 2'){
                        $bsPrice += 0;
                        $bsCost += 0;                        
                    }                   
                }



                if($bsRow['slug']=='proposal_auto_secure'){
                    if($bsRow['value']=='3 años'){
                        $bsPrice += 749;
                        $bsCost += 349;
                    }else if($bsRow['value']=='5 años'){
                        $bsPrice += 999;
                        $bsCost += 449;                        
                    }else if($bsRow['value']=='6 años'){
                        $bsPrice += 1299;
                        $bsCost += 549;                        
                    }                    
                }

                if($bsRow['slug']=='proposal_service_contract' && $bsRow['value']>0){                    
                    $bsPrice += 379;
                    $bsCost += 174;                                   
                }

                if($bsRow['slug']=='proposal_credit_total_2' && $bsRow['value']>0){                    
                    $bsPrice += 995;
                    $bsCost += 205;                                   
                }



             }

             $bsMargin = $bsPrice - $bsCost;


             if($bsPrice<$bsCost){
                $class = "style=color:red !important;";
            }else if($bsPrice==$bsCost){
                $class = "style=color:orange !important;";
            }else{
                $class = "style=color:green !important;";
            }


             $row[] = "Price:".app_format_money($bsPrice, $aRow['currency_name'])."<br>Cost:".app_format_money($bsCost, $aRow['currency_name'])."<br><span ".$class.">Margin:<span>".app_format_money($bsMargin, $aRow['currency_name'])."";

           }else{
            $row[] = "";
           } 
           


        }else{
            $row[] = "NA";
        }


    $row[] = "";


    if(is_array($getProposalIdByESTIDResult) && count($getProposalIdByESTIDResult)>0){
        $insuranceBackSalesIds = json_decode(INSURANCE_IDS_FOR_DEALRECAP,true);
        
        $Ibids = implode(",",$insuranceBackSalesIds);

        //echo "<pre>"; print_r($getProposalIdByESTIDResult); exit;    
        $insuranceQry = "select `value` from tblcustomfieldsvalues where fieldid IN( ".$Ibids. ") and relid=".$getProposalIdByESTIDResult[0]['quoteId']. " and fieldto='proposal'";
        //echo $insuranceQry; exit;
        $insuranceQryExe = $this->ci->db->query($insuranceQry);
        $insuranceResult = $insuranceQryExe->result_array();    
        //echo "<pre>"; print_r($insuranceResult); exit;    
        //

        if(count($insuranceResult)>0){
        //echo $insuranceResult[0]['value']; exit;
        $iP = app_format_money($insuranceResult[0]['value'], $aRow['currency_name']);
        $row[] = "Price:".$iP;
        }else{
            $row[] = "NA";
        }
    }else{
        $row[] = "NA";
    }

    //$row[] = '<a href="' . admin_url('projects/view/' . $aRow['project_id']) . '">' . $aRow['project_name'] . '</a>';

    //$row[] = render_tags($aRow['tags']);

    $row[] = _d($aRow['date']);

    $row[] = _d($aRow['expirydate']);

    $row[] = $aRow['reference_no'];

    $row[] = format_estimate_status($aRow[db_prefix() . 'estimates.status']);

    // Custom fields add values
    foreach ($customFieldsColumns as $customFieldColumn) {
        $row[] = (strpos($customFieldColumn, 'date_picker_') !== false ? _d($aRow[$customFieldColumn]) : $aRow[$customFieldColumn]);
    }

    $row['DT_RowClass'] = 'has-row-options';

    $row = hooks()->apply_filters('estimates_table_row_data', $row, $aRow);

    $output['aaData'][] = $row;
}

echo json_encode($output);
die();