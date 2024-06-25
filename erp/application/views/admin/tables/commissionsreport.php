<?php

defined('BASEPATH') or exit('No direct script access allowed');

$baseCurrency = get_base_currency();

$project_id   = $this->ci->input->post('project_id');
$psearchStartDate =$this->ci->input->post('psearchstartdate');
//echo "<pre>"; print_r($this->ci->input->post()); exit;


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

    'subject',
    'proposal_to',
    'total',
    'date',
    db_prefix().'itemable.vin as vin',
    db_prefix().'itemable.inv_id as inv_id',
    db_prefix().'itemable.rate as salesprice',
    db_prefix().'items.purchase_price as purchase_price',
    '('.db_prefix().'itemable.rate - '.db_prefix().'items.purchase_price) as margin',
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
array_push($where, 'AND '.db_prefix().'itemable.vin is not null');

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


if (count($agentsIds) > 0) {
    array_push($filter, 'AND assigned IN (' . implode(', ', $agentsIds) . ')');
}

$month = date('m');
$months = [];
for($i=1; $i<=$month; $i++) {
    if($this->ci->input->post('sale_month_' . date("Y").sprintf('%02d', $i))){
        array_push($months, date("Y").sprintf('%02d', $i));
    }
}

if (count($months) > 0) {
    array_push($filter, 'AND DATE_FORMAT(datecreated,"%Y%m") IN (' . implode(', ', $months) . ')');
}

if(count($months)==0){
    array_push($where, 'AND DATE_FORMAT('.db_prefix().'proposals.datecreated,"%Y%m") = '.date("Ym"));
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
array_push($join, ' LEFT JOIN '.db_prefix().'itemable on '.db_prefix().'itemable.rel_id='.db_prefix().'proposals.id AND '.db_prefix().'itemable.rel_type="proposal"');

array_push($join, ' LEFT JOIN '.db_prefix().'items on '.db_prefix().'items.id='.db_prefix().'itemable.inv_id');

//array_push($where, 'AND '.db_prefix().'customfieldsvalues.fieldid IN ('.$backsalesids.') AND '.db_prefix().'customfieldsvalues.fieldto="proposal"');



$custom_fields = get_table_custom_fields('proposal');

$aColumns = hooks()->apply_filters('proposals_table_sql_columns', $aColumns);

// Fix for big queries. Some hosting have max_join_limit
if (count($custom_fields) > 4) {
    @$this->ci->db->query('SET SQL_BIG_SELECTS=1');
}

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [
    'currency',
    db_prefix().'proposals.rel_id as rel_id',
    db_prefix().'proposals.rel_type as rel_type',
    'invoice_id',
    'hash',
   // db_prefix() . 'projects.name as project_name',
]);

$output  = $result['output'];
$rResult = $result['rResult'];
//echo $this->ci->db->last_query(); 
//echo "<pre>"; print_r($filter); exit;

foreach ($rResult as $aRow) {
    $row = [];



	$row[] = _d($aRow['date']);
	$row[] = format_proposal_status($aRow['proposal_status']);
	
	$row[] = get_staff_full_name($aRow['assigned']);

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
	
    
    
    //vin
    if($aRow['vin']!=''){
        if($aRow['inv_id']!=''){
            $row[] = '<a target="blank" href="'.base_url().'admin/warehouse/view_commodity_detail/'.$aRow['inv_id']. '">'.$aRow['vin'].'</a>';
        }else{
            $row[] = '<a target="blank" href="'.base_url().'proposal/warranty/'.$aRow['vin']. '">'.$aRow['vin'].'</a>';
        }       
    }else{
        $row[] = '';
    }
    
   

    $row[] = app_format_money($aRow['salesprice'], ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency)); 

   
    $row[] = app_format_money($aRow['purchase_price'], ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency)); 
    $row[] = app_format_money($aRow['margin'], ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency)); 
    
    $row[] = app_format_money(get_commission_calculation('lesser',$aRow['salesprice'],$aRow['purchase_price'],$aRow['margin'],$aRow['assigned'],$months), ($aRow['currency'] != 0 ? get_currency(1) : $baseCurrency)); 
    
  
    $dd = date("d-m-Y",strtotime($aRow['datecreated']));
    

    $row['DT_RowClass'] = 'has-row-options';

    $row = hooks()->apply_filters('proposals_table_row_data', $row, $aRow);

    $output['aaData'][] = $row;
}