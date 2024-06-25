<?php

defined('BASEPATH') or exit('No direct script access allowed');

$project_id = $this->ci->input->post('project_id');

$aColumns = [
    db_prefix().'invoices.number as number',
    db_prefix().'invoices.total as invtotal',
    db_prefix().'invoices.total_tax as total_tax',
    db_prefix().'invoices.ableit_estimate_id as ableit_estimate_id',
    db_prefix().'invoices.ableit_proposal_id as ableit_proposal_id',
    'YEAR('.db_prefix().'invoices.date) as year',
    db_prefix() . 'invoices.date as date',
    get_sql_select_client_company(),
    //db_prefix() . 'projects.name as project_name',
    db_prefix() . 'itemable.inv_id as inv_id',
    db_prefix() . 'itemable.vin as VIN',
    db_prefix() . 'itemable.rel_id as relid',
    db_prefix() . 'itemable.rel_type as reltype',
    db_prefix() . 'estimates.id as estimateid',
    db_prefix() . 'proposals.id as proposalid',
    //'(SELECT GROUP_CONCAT(name SEPARATOR ",") FROM ' . db_prefix() . 'taggables JOIN ' . db_prefix() . 'tags ON ' . db_prefix() . 'taggables.tag_id = ' . db_prefix() . 'tags.id WHERE rel_id = ' . db_prefix() . 'invoices.id and rel_type="invoice" ORDER by tag_order ASC) as tags',
    '(SELECT SUM(amount) FROM '.db_prefix().'invoicepaymentrecords WHERE invoiceid='.db_prefix().'invoices.id) AS paymentstotal',
    '(tblinvoices.total - (SELECT COALESCE(SUM(amount),0) FROM '.db_prefix().'invoicepaymentrecords WHERE invoiceid='.db_prefix().'invoices.id)) as balanceamt',
    //'duedate',
    'DATEDIFF(CURDATE(), '.db_prefix().'invoices.date) AS days_difference',
    db_prefix() . 'invoices.status',
    ];

$sIndexColumn = 'id';
$sTable       = db_prefix() . 'invoices';

$join = [
    'LEFT JOIN ' . db_prefix() . 'clients ON ' . db_prefix() . 'clients.userid = ' . db_prefix() . 'invoices.clientid',
    'LEFT JOIN ' . db_prefix() . 'currencies ON ' . db_prefix() . 'currencies.id = ' . db_prefix() . 'invoices.currency',
    'LEFT JOIN ' . db_prefix() . 'projects ON ' . db_prefix() . 'projects.id = ' . db_prefix() . 'invoices.project_id',
    'LEFT JOIN ' . db_prefix() . 'itemable ON ' . db_prefix() . 'itemable.rel_id = ' . db_prefix() . 'invoices.id AND '.db_prefix().'itemable.rel_type="invoice" AND '.db_prefix().'itemable.inv_id!="" ',
    'LEFT JOIN ' . db_prefix() . 'estimates ON ' . db_prefix() . 'estimates.invoiceid = ' . db_prefix() . 'invoices.id',
    'LEFT JOIN ' . db_prefix() . 'proposals ON ' . db_prefix() . 'proposals.invoice_id = ' . db_prefix() . 'invoices.id',
    'LEFT JOIN ' . db_prefix() . 'expenses ON ' . db_prefix() . 'invoices.id = ' . db_prefix() . 'expenses.invoiceid',
];

$custom_fields = get_table_custom_fields('invoice');

foreach ($custom_fields as $key => $field) {
    $selectAs = (is_cf_date($field) ? 'date_picker_cvalue_' . $key : 'cvalue_' . $key);

    array_push($customFieldsColumns, $selectAs);
    array_push($aColumns, 'ctable_' . $key . '.value as ' . $selectAs);
    array_push($join, 'LEFT JOIN ' . db_prefix() . 'customfieldsvalues as ctable_' . $key . ' ON ' . db_prefix() . 'invoices.id = ctable_' . $key . '.relid AND ctable_' . $key . '.fieldto="' . $field['fieldto'] . '" AND ctable_' . $key . '.fieldid=' . $field['id']);
}

$where  = [];
$filter = [];

if ($this->ci->input->post('not_sent')) {
    array_push($filter, 'AND sent = 0 AND ' . db_prefix() . 'invoices.status NOT IN(' . Invoices_model::STATUS_PAID . ',' . Invoices_model::STATUS_CANCELLED . ')');
}
if ($this->ci->input->post('not_have_payment')) {
    array_push($filter, 'AND ' . db_prefix() . 'invoices.id NOT IN(SELECT invoiceid FROM ' . db_prefix() . 'invoicepaymentrecords) AND ' . db_prefix() . 'invoices.status != ' . Invoices_model::STATUS_CANCELLED);
}
if ($this->ci->input->post('recurring')) {
    array_push($filter, 'AND recurring > 0');
}

$statuses  = $this->ci->invoices_model->get_statuses();
$statusIds = [];
foreach ($statuses as $status) {
    if ($this->ci->input->post('invoices_' . $status)) {
        array_push($statusIds, $status);
    }
}
if (count($statusIds) > 0) {
    array_push($filter, 'AND ' . db_prefix() . 'invoices.status IN (' . implode(', ', $statusIds) . ')');
}

$agents    = $this->ci->invoices_model->get_sale_agents();
$agentsIds = [];
foreach ($agents as $agent) {
    if ($this->ci->input->post('sale_agent_' . $agent['sale_agent'])) {
        array_push($agentsIds, $agent['sale_agent']);
    }
}
if (count($agentsIds) > 0) {
    array_push($filter, 'AND sale_agent IN (' . implode(', ', $agentsIds) . ')');
}

$modesIds = [];
foreach ($data['payment_modes'] as $mode) {
    if ($this->ci->input->post('invoice_payments_by_' . $mode['id'])) {
        array_push($modesIds, $mode['id']);
    }
}
if (count($modesIds) > 0) {
    array_push($where, 'AND ' . db_prefix() . 'invoices.id IN (SELECT invoiceid FROM ' . db_prefix() . 'invoicepaymentrecords WHERE paymentmode IN ("' . implode('", "', $modesIds) . '"))');
}

$years     = $this->ci->invoices_model->get_invoices_years();
$yearArray = [];
foreach ($years as $year) {
    if ($this->ci->input->post('year_' . $year['year'])) {
        array_push($yearArray, $year['year']);
    }
}
if (count($yearArray) > 0) {
    array_push($where, 'AND YEAR('.db_prefix().'invoices.date) IN (' . implode(', ', $yearArray) . ')');
}

if (count($filter) > 0) {
    array_push($where, 'AND (' . prepare_dt_filter($filter) . ')');
}

if ($clientid != '') {
    array_push($where, 'AND ' . db_prefix() . 'invoices.clientid=' . $this->ci->db->escape_str($clientid));
}

if ($project_id) {
    array_push($where, 'AND project_id=' . $this->ci->db->escape_str($project_id));
}

if (!has_permission('invoices', '', 'view')) {
    $userWhere = 'AND ' . get_invoices_where_sql_for_staff(get_staff_user_id());
    array_push($where, $userWhere);
}

$aColumns = hooks()->apply_filters('invoices_table_sql_columns', $aColumns);

// Fix for big queries. Some hosting have max_join_limit
if (count($custom_fields) > 4) {
    @$this->ci->db->query('SET SQL_BIG_SELECTS=1');
}

$result = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, $where, [
    db_prefix() . 'invoices.id',
    db_prefix() . 'invoices.clientid',
    db_prefix() . 'currencies.name as currency_name',
    db_prefix() . 'invoices.project_id',
    db_prefix() . 'invoices.hash',
    db_prefix() . 'invoices.recurring',
    db_prefix() . 'invoices.deleted_customer_name',
    ]);
$output  = $result['output'];
$rResult = $result['rResult'];
// echo "<pre>"; print_r($rResult); exit;
foreach ($rResult as $aRow) {
    $row = [];
    $row[] = '<a target="blank" href="' . admin_url('warehouse/view_commodity_detail/' . $aRow['inv_id']) . '">' . $aRow['VIN'] . '</a>';
    $numberOutput = '';

    // If is from client area table
    if (is_numeric($clientid) || $project_id) {
        $numberOutput = '<a href="' . admin_url('invoices/list_invoices/' . $aRow['id']) . '" target="_blank">' . format_invoice_number($aRow['id']) . '</a>';
    } else {
        $numberOutput = '<a href="' . admin_url('invoices/list_invoices/' . $aRow['id']) . '" onclick="init_invoice(' . $aRow['id'] . '); return false;">' . format_invoice_number($aRow['id']) . '</a>';
    }

    if ($aRow['recurring'] > 0) {
        $numberOutput .= '<br /><span class="label label-primary inline-block tw-mt-1"> ' . _l('invoice_recurring_indicator') . '</span>';
    }

    $numberOutput .= '<div class="row-options">';

    $numberOutput .= '<a href="' . site_url('invoice/' . $aRow['id'] . '/' . $aRow['hash']) . '" target="_blank">' . _l('view') . '</a>';
    if (has_permission('invoices', '', 'edit')) {
        $numberOutput .= ' | <a href="' . admin_url('invoices/invoice/' . $aRow['id']) . '">' . _l('edit') . '</a>';
    }
    $numberOutput .= '</div>';

    $row[] = $numberOutput;

   

    //$row[] = app_format_money($aRow['total_tax'], $aRow['currency_name']);

    $row[] = $aRow['year'];

    

    if (empty($aRow['deleted_customer_name'])) {
        $row[] = '<a href="' . admin_url('clients/client/' . $aRow['clientid']) . '">' . $aRow['company'] . '</a>';
    } else {
        $row[] = $aRow['deleted_customer_name'];
    }

   // $row[] = '<a href="' . admin_url('projects/view/' . $aRow['project_id']) . '">' . $aRow['project_name'] . '</a>';
   if($aRow['proposalid']=='' || $aRow['proposalid']==null){
    $aRow['proposalid'] =$aRow['ableit_proposal_id'];
   }
    $row[] = '<a target="blank" href="' . admin_url('proposals/#/' . $aRow['proposalid']) . '">' . format_proposal_number($aRow['proposalid']) . '</a>';
    
    $row[] = app_format_money($aRow['invtotal'], $aRow['currency_name']);

    //$row[] = render_tags($aRow['tags']);
    $row[] = app_format_money($aRow['paymentstotal'], $aRow['currency_name']);

    
        if($aRow[db_prefix() . 'invoices.status']==2){
            $row[] = '<span class="label label-success">'.app_format_money($aRow['balanceamt'], $aRow['currency_name']).'</span>';
        }else{
            $row[] = '<span class="label label-danger">'.app_format_money($aRow['balanceamt'], $aRow['currency_name']).'</span>';
        }
        
   
    //$row[] = app_format_money($aRow['balanceamt'], $aRow['currency_name']);
    $row[] = _d($aRow['date']);
    //$row[] = _d($aRow['duedate']);

   
    if($aRow[db_prefix() . 'invoices.status']==2){
        $lastpaiddate = $this->ci->db->query('SELECT  DATE(daterecorded) AS paiddate FROM '.db_prefix().'invoicepaymentrecords WHERE invoiceid='.$aRow['id'].' ORDER BY id DESC LIMIT 1')->row_array();
        if(isset($lastpaiddate['paiddate']) && $lastpaiddate['paiddate']!=''){
            $now = strtotime($lastpaiddate['paiddate']); // or your date as well
            $your_date = strtotime($aRow['date']);
            $datediff = $now - $your_date;
            $daysDiff = round($datediff / (60 * 60 * 24));
            $row[] = '<span class="label label-success">'.$daysDiff.'</span>';
        }else{
            $row[] = ($aRow['days_difference'] >0 ) ? '<span class="label label-danger">'.$aRow['days_difference'].'</span>' : $aRow['days_difference'];
        }
    }else{
        $row[] = ($aRow['days_difference'] >0 ) ? '<span class="label label-danger">'.$aRow['days_difference'].'</span>' : $aRow['days_difference'];
    }

    
    $row[] = format_invoice_status($aRow[db_prefix() . 'invoices.status']);

    // Custom fields add values
    foreach ($customFieldsColumns as $customFieldColumn) {
        $row[] = (strpos($customFieldColumn, 'date_picker_') !== false ? _d($aRow[$customFieldColumn]) : $aRow[$customFieldColumn]);
    }

    $row['DT_RowClass'] = 'has-row-options';

    $row = hooks()->apply_filters('invoices_table_row_data', $row, $aRow);

    $output['aaData'][] = $row;
}