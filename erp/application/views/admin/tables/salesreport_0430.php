<?php

defined('BASEPATH') or exit('No direct script access allowed');

$baseCurrency = get_base_currency();
//print_r($baseCurrency); exit;
$project_id   = $this->ci->input->post('project_id');
$psearchStartDate =$this->ci->input->post('psearchstartdate');
//$psearchStartDate = "07-17-2023";
$backsalesids = implode(",",json_decode(BACKSALES_IDS,true));
$vapCostPrices = json_decode(VAP_PRODUCT_COST_PRICES,true);
//echo "<pre>"; print_r($vapCostPrices); exit;

$insuranceIds = implode(",", json_decode(INSURANCE_IDS,true));
if($psearchStartDate!=''){
    //echo 'From post. '.$psearchStartDate;
    $psearchStartDate = date("Y-m-d", strtotime($psearchStartDate));   
    //echo '<br/>Start date if: '.$psearchStartDate; exit;
}
$psearchToDate = $this->ci->input->post('psearchtodate');
if($psearchToDate!=''){
    //echo 'From post. '.$psearchStartDate;
    $psearchToDate = date("Y-m-d", strtotime($psearchToDate));   
    //echo '<br/>Start date if: '.$psearchStartDate; exit;
}
//echo 'Start date: '.$psearchStartDate; exit;

$aColumns = [
    db_prefix() . 'proposals.id',
	db_prefix() . 'customfields.name',
	db_prefix() . 'customfields.slug',
	db_prefix() . 'customfieldsvalues.value',
    'subject',
    'proposal_to',
    'total',
    'date',
    'open_till',
    '(SELECT GROUP_CONCAT(name SEPARATOR ",") FROM ' . db_prefix() . 'taggables JOIN ' . db_prefix() . 'tags ON ' . db_prefix() . 'taggables.tag_id = ' . db_prefix() . 'tags.id WHERE rel_id = ' . db_prefix() . 'proposals.id and rel_type="proposal" ORDER by tag_order ASC) as tags',
    'datecreated',
	'assigned',
    db_prefix() . 'proposals.status as proposal_status',
];

if (!$project_id) {
    $aColumns[] = 'project_id';
}

$sIndexColumn = 'id';
$sTable       = db_prefix() . 'proposals';

$where  = [];
$filter = [];

if ($this->ci->input->post('leads_related')) {
    array_push($filter, 'OR rel_type="lead"');
}
if ($this->ci->input->post('customers_related')) {
    array_push($filter, 'OR rel_type="customer"');
}
if ($this->ci->input->post('expired')) {
    array_push($filter, 'OR open_till IS NOT NULL AND open_till <"' . date('Y-m-d') . '" AND ' . db_prefix() . 'proposals.status NOT IN(2,3)');
}

$statuses  = $this->ci->proposals_model->get_statuses();
$statusIds = [];

foreach ($statuses as $status) {
    if ($this->ci->input->post('proposals_' . $status)) {
        array_push($statusIds, $status);
    }
}
if (count($statusIds) > 0) {
    array_push($filter, 'AND' . db_prefix() . 'proposals.status IN (' . implode(', ', $statusIds) . ')');
}

$agents    = $this->ci->proposals_model->get_sale_agents();
$agentsIds = [];
foreach ($agents as $agent) {
    if ($this->ci->input->post('sale_agent_' . $agent['sale_agent'])) {
        array_push($agentsIds, $agent['sale_agent']);
    }
}
$backsalesidsArr = json_decode(BACKSALES_IDS,true);

$vapIdsIds = [];
foreach ($backsalesidsArr as $bskarr) {
    if ($this->ci->input->post('vap_cat_' . $bskarr)) {
        array_push($vapIdsIds, $bskarr);
    }
}
//echo "<pre>"; print_r($this->ci->input->post()); exit;
if (count($agentsIds) > 0) {
    array_push($filter, 'AND assigned IN (' . implode(', ', $agentsIds) . ')');
}
//print_r($vapIdsIds); exit;
if (count($vapIdsIds) > 0) {
    array_push($filter, 'AND '.db_prefix().'customfieldsvalues.fieldid IN (' . implode(', ', $vapIdsIds) . ') and '.db_prefix().'customfieldsvalues.fieldto="proposal"');
}

$years      = $this->ci->proposals_model->get_proposals_years();
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

if (!has_permission('proposals', '', 'view')) {
    array_push($where, 'AND ' . get_proposals_sql_where_staff(get_staff_user_id()));
}

if($psearchStartDate!='' && $psearchToDate==''){
   // echo 'here'; exit;
    array_push($where, 'AND DATE(datecreated)= "'.$psearchStartDate.'" ');
    //$where[] = ' AND DATE(datecreated)= ' . $psearchStartDate;
}

if($psearchStartDate!='' && $psearchToDate!=''){
    //echo 'here2'; exit;
    array_push($where, 'AND (DATE(datecreated) BETWEEN "'.$psearchStartDate.'" AND  "'.$psearchToDate.'")');
    //$where[] = ' AND DATE(datecreated)= ' . $psearchStartDate;
}

//echo "<pre>"; print_r($where); exit;

$join = [
    //'LEFT JOIN ' . db_prefix() . 'projects ON ' . db_prefix() . 'projects.id = ' . db_prefix() . 'proposals.project_id '
	
];
array_push($join, ' LEFT JOIN '.db_prefix().'customfieldsvalues on '.db_prefix().'customfieldsvalues.relid='.db_prefix().'proposals.id AND '.db_prefix().'customfieldsvalues.fieldto="proposal"');

array_push($join, ' LEFT JOIN '.db_prefix().'customfields on '.db_prefix().'customfields.id='.db_prefix().'customfieldsvalues.fieldid AND '.db_prefix().'customfieldsvalues.fieldto="proposal"');

array_push($where, 'AND '.db_prefix().'customfieldsvalues.fieldid IN ('.$backsalesids.') AND '.db_prefix().'customfieldsvalues.fieldto="proposal"');


//echo "<pre>"; print_r($join); exit;

$custom_fields = get_table_custom_fields('proposal');

/*foreach ($custom_fields as $key => $field) {
    $selectAs = (is_cf_date($field) ? 'date_picker_cvalue_' . $key : 'cvalue_' . $key);

    array_push($customFieldsColumns, $selectAs);
    array_push($aColumns, 'ctable_' . $key . '.value as ' . $selectAs);
    array_push($join, 'LEFT JOIN ' . db_prefix() . 'customfieldsvalues as ctable_' . $key . ' ON ' . db_prefix() . 'proposals.id = ctable_' . $key . '.relid AND ctable_' . $key . '.fieldto="' . $field['fieldto'] . '" AND ctable_' . $key . '.fieldid=' . $field['id']);
}*/

if ($project_id) {
    //$where[] = 'AND project_id=' . $this->ci->db->escape_str($project_id);
}

$aColumns = hooks()->apply_filters('proposals_table_sql_columns', $aColumns);

// Fix for big queries. Some hosting have max_join_limit
if (count($custom_fields) > 4) {
    @$this->ci->db->query('SET SQL_BIG_SELECTS=1');
}

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [
    'currency',
    'rel_id',
    'rel_type',
    'invoice_id',
    'hash',
   // db_prefix() . 'projects.name as project_name',
]);

$output  = $result['output'];
$rResult = $result['rResult'];

//echo "<pre>"; print_r($rResult); exit;

foreach ($rResult as $aRow) {
    $row = [];



	$row[] = _d($aRow['date']);
	$row[] = format_proposal_status($aRow['proposal_status']);
	$gapLabels = '';
	
	if($aRow['tblcustomfields.slug']=='proposal_gap_policy'){
		if($aRow['tblcustomfieldsvalues.value']==599){
			$gapLabels = 'GAP 3-6 Years (Premiere)';
			$row[] = 'GAP 3-6 Years (Premiere)';
		}else if($aRow['tblcustomfieldsvalues.value']==649){
			$gapLabels = 'GAP 7 Years (Premiere)';
			$row[] = 'GAP 7 Years (Premiere)';
		}else{
			$row[] = 'NA';
		}
	}else{
		$row[] = $aRow['tblcustomfields.name'];
	}
	
	//vap sale amount
	$vapamount = app_format_money($aRow['tblcustomfieldsvalues.value'], ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency));
	$row[] = $vapamount;
	
	
	//vap cost amount
	if($aRow['tblcustomfields.slug']=='proposal_gap_policy'){
		$row[] = app_format_money($vapCostPrices[$gapLabels], ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency));
	}else{
		$row[] = app_format_money($vapCostPrices[$aRow['tblcustomfields.slug']], ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency));
	}
	
	//vap margin
	if($aRow['tblcustomfields.slug']=='proposal_gap_policy'){
		$margin = $aRow['tblcustomfieldsvalues.value'] - $vapCostPrices[$gapLabels];
		$row[] = app_format_money($margin, ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency));
	}else{
		$margin = $aRow['tblcustomfieldsvalues.value'] - $vapCostPrices[$aRow['tblcustomfields.slug']];
		$row[] = app_format_money($margin, ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency));
	}
	
	

    $proposalId = $aRow[db_prefix() . 'proposals.id'];
    $numberOutput = '<a href="' . admin_url('proposals/list_proposals/' . $aRow[db_prefix() . 'proposals.id']) . '"' . ($project_id ? 'target="_blank"' : 'onclick="init_proposal(' . $aRow[db_prefix() . 'proposals.id'] . '); return false;"') . '>' . format_proposal_number($aRow[db_prefix() . 'proposals.id']) . '</a>';

    $numberOutput .= '<div class="row-options">';

    $numberOutput .= '<a href="' . site_url('proposal/' . $aRow[db_prefix() . 'proposals.id'] . '/' . $aRow['hash']) . '" target="_blank">' . _l('view') . '</a>';
    if (has_permission('proposals', '', 'edit')) {
        $numberOutput .= ' | <a href="' . admin_url('proposals/proposal/' . $aRow[db_prefix() . 'proposals.id']) . '"' . ($project_id ? 'target="_blank"': '') . '>' . _l('edit') . '</a>';
    }
    $numberOutput .= '</div>';

    $row[] = $numberOutput;

    //$row[] = '<a href="' . admin_url('proposals/list_proposals/' . $aRow[db_prefix() . 'proposals.id']) . '"' . ($project_id ? 'target="_blank"' : 'onclick="init_proposal(' . $aRow[db_prefix() . 'proposals.id'] . '); return false;"') . '>' . $aRow['subject'] . '</a>';

    if ($aRow['rel_type'] == 'lead') {
        $toOutput = '<a href="#" onclick="init_lead(' . $aRow['rel_id'] . ');return false;" target="_blank" data-toggle="tooltip" data-title="' . _l('lead') . '">' . $aRow['proposal_to'] . '</a>';
    } elseif ($aRow['rel_type'] == 'customer') {
        $toOutput = '<a href="' . admin_url('clients/client/' . $aRow['rel_id']) . '" target="_blank" data-toggle="tooltip" data-title="' . _l('client') . '">' . $aRow['proposal_to'] . '</a>';
    }
	
    $row[] = $toOutput;
	
	
    $amount = app_format_money($aRow['total'], ($aRow['currency'] != 0 ? get_currency($aRow['currency']) : $baseCurrency));

    if ($aRow['invoice_id']) {
        $amount .= '<br /> <span class="hide"> - </span><span class="text-success tw-text-sm">' . _l('estimate_invoiced') . '</span>';
    }

    //$row[] = $amount;
	
    
    $backsalesqry = "SELECT SUM(`value`) AS ttotal FROM `tblcustomfieldsvalues` WHERE
    fieldid IN ($backsalesids) AND fieldto ='proposal' AND  relid = ". $proposalId;
   
   
    $backsalesqryExe = $this->ci->db->query($backsalesqry);
    $backsalesresult = $backsalesqryExe->result_array();
    
    if(count($backsalesresult)>0){
        //$row[] =  '$'.number_format($backsalesresult[0]['ttotal']);
    }else{
        //$row[] = '';
    }

    

    $insuranceqry = "SELECT SUM(`value`) AS ttotal FROM `tblcustomfieldsvalues` WHERE
    fieldid IN ($insuranceIds) AND fieldto ='proposal' AND  relid = ". $proposalId;
   
   
    $insuranceqryExe = $this->ci->db->query($insuranceqry);
    $insuranceresult = $insuranceqryExe->result_array();
    
    if(count($insuranceresult)>0){
        //$row[] =  '$'.number_format($insuranceresult[0]['ttotal']);
    }else{
       // $row[] = '';
    }

    $pitems = "select * from tblitemable where rel_id= $proposalId AND rel_type='proposal' AND description LIKE '%-vin-%'";
    
    $pitemsr = $this->ci->db->query($pitems);
    $pitemsresults = $pitemsr->result_array();
    
    if(count($pitemsresults)>0){
        if(isset($pitemsresults[0]['vin']) && $pitemsresults[0]['vin']!=''){
            $row[] = '<a target="blank" href="'.base_url().'proposal/warranty/'.$pitemsresults[0]['vin']. '">'.$pitemsresults[0]['vin'].'</a>';
        }else{
            
            $explodeStr = explode(" ",$pitemsresults[0]['description']);
            if(is_array($explodeStr) && count($explodeStr)>0){
                $vin = trim(end($explodeStr));
                
                $pitemsqr = "select id,sku_code from tblitems where sku_code= '".$vin."'";
                
                $pitemsresultsqr = $this->ci->db->query($pitemsqr);
                $presultsqr = $pitemsresultsqr->result_array();  
               
                if(is_array($presultsqr) && count($presultsqr)>0){
                    $invId = $presultsqr[0]['id'];                
                    $vincode = $vin;                    
                    $updatequery = "UPDATE tblitemable SET vin='".$vincode."', inv_id= $invId where id=".$pitemsresults[0]['id'];
                    
                    $this->ci->db->query($updatequery);
                }
            }
            $row[] = '<a target="blank" href="'.base_url().'proposal/warranty/'.$vincode. '">'.$vincode.'</a>';
        }
        
    }else{
        $row[] = '';
    }

	 

   
    
    //echo "<pre>"; print_r($customFieldsColumns); exit;

    // Custom fields add values
    foreach ($customFieldsColumns as $customFieldColumn) {
        //echo "<pre>"; print_r($aRow);
        if(isset($aRow[$customFieldColumn]) && $aRow[$customFieldColumn] >0){
            if($customFieldColumn!='cvalue_4'){
                $row[] = '$'.number_format($aRow[$customFieldColumn]);
            }else{
                $row[] = $aRow[$customFieldColumn];
            }
        }else{
            $row[] = (strpos($customFieldColumn, 'date_picker_') !== false ? _d($aRow[$customFieldColumn]) : $aRow[$customFieldColumn]);
        }
    }




    

    //$row[] = _d($aRow['open_till']);

    if (!$project_id) {
        //$row[] = '<a href="' . admin_url('projects/view/' . $aRow['project_id']) . '" target="_blank">' . $aRow['project_name'] . '</a>';
    }

    //$row[] = render_tags($aRow['tags']);
    $dd = date("d-m-Y",strtotime($aRow['datecreated']));
    //$row[] = $dd;//_d($aRow['datecreated']);


     
	$row[] = get_staff_full_name($aRow['assigned']);


    

    
   

    $row['DT_RowClass'] = 'has-row-options';

    $row = hooks()->apply_filters('proposals_table_row_data', $row, $aRow);

    $output['aaData'][] = $row;
}