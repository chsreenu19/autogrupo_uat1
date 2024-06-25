<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="_filters _hidden_inputs">
    <?php
	$baseCurrency = get_base_currency();
	
    foreach ($proposal_statuses as $_status) {
        $val = '';
        if ($_status == $this->input->get('status')) {
            $val = $_status;
        }
        echo form_hidden('proposals_' . $_status, $val);
    }
    
    foreach ($years as $year) {
        echo form_hidden('year_' . $year['year'], $year['year']);
    }
    foreach ($proposals_sale_agents as $agent) {
        echo form_hidden('sale_agent_' . $agent['sale_agent']);
    }


    $month = date('m');  
    for($i=1; $i<=$month; $i++) { 
        echo form_hidden('sale_month_' . date("Y").sprintf('%02d', $i));
    }




	foreach ($backsalescat as $bsk) {
        echo form_hidden('vap_cat_' . $bsk['id']);
    }
    if (isset($project)) {
        echo form_hidden('project_id', $project->id);
    }
    echo form_hidden('leads_related');
    echo form_hidden('customers_related');
    echo form_hidden('expired');
    ?>
</div>


<div class="col-md-12">



</div>  


<div class="col-md-12">
    
    <div class="tw-mb-2 sm:tw-mb-4">
        <div class="_buttons">

          <h3 class="pull-left display-block"> Commissions</h3> 

            <div class="display-block text-right">
                <div class="btn-group pull-right mleft4 btn-with-tooltip-group _filter_data" data-toggle="tooltip"
                    data-title="<?php echo _l('filter_by'); ?>">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu width300">
                        <li>
                            <a href="#" data-cview="all"
                                onclick="dt_custom_view('','.table-proposals',''); return false;">
                                <?php echo _l('proposals_list_all'); ?>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php foreach ($proposal_statuses as $status) { ?>
                        <li class="<?php if ($this->input->get('proposal_status') == $status) {
								echo 'active';
							} ?>">
                            <a href="#" data-cview="proposals_<?php echo $status; ?>"
                                onclick="dt_custom_view('proposals_<?php echo $status; ?>','.table-proposals','proposals_<?php echo $status; ?>'); return false;">
                                <?php echo format_proposal_status($status, '', false); ?>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (count($years) > 0) { ?>
                        <li class="divider"></li>
                        <?php foreach ($years as $year) { ?>
                        <li class="active">
                            <a href="#" data-cview="year_<?php echo $year['year']; ?>"
                                onclick="dt_custom_view(<?php echo $year['year']; ?>,'.table-proposals','year_<?php echo $year['year']; ?>'); return false;"><?php echo $year['year']; ?>
                            </a>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <?php if (count($proposals_sale_agents) > 0) { ?>
                        <div class="clearfix"></div>
                        <li class="divider"></li>
                        <li class="dropdown-submenu pull-left">
                            <a href="#" tabindex="-1"><?php echo _l('sale_agent_string'); ?></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <?php foreach ($proposals_sale_agents as $agent) { ?>
                                <li>
                                    <a href="#" data-cview="sale_agent_<?php echo $agent['sale_agent']; ?>"
                                        onclick="dt_custom_view('sale_agent_<?php echo $agent['sale_agent']; ?>','.table-proposals','sale_agent_<?php echo $agent['sale_agent']; ?>'); return false;"><?php echo get_staff_full_name($agent['sale_agent']); ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>


                      
                        <div class="clearfix"></div>
                        <li class="divider"></li>
                        <li class="dropdown-submenu pull-left">
                            <a href="#" tabindex="-1"><?php echo _l('Month'); ?></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <?php 
                                
                                $month = date('m');  
                                for($i=1; $i<=$month; $i++) { 
                                 
                                    
                                ?>
                                <li>
                                    <a href="#" data-cview="sale_month_<?php echo date("Y").sprintf("%02d", $i); ?>"
                                        onclick="dt_custom_view('sale_month_<?php echo date('Y').sprintf('%02d', $i); ?>','.table-proposals','sale_month_<?php echo date('Y').sprintf('%02d', $i); ?>'); return false;"><?php echo date('F', mktime(0, 0, 0, $i, 10));  ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                      

                       
						
						 <div class="clearfix"></div>
                        
						
						
						<!--
						 <?php if (count($backsalescat) > 0) { ?>
                        <div class="clearfix"></div>
                        <li class="divider"></li>
                        <li class="dropdown-submenu pull-left">
                            <a href="#" tabindex="-1"><?php echo 'VAP'; ?></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <?php foreach ($backsalescat as $cat) { ?>
                                <li>
                                    <a href="#" data-cview="vap_cat_<?php echo $cat['id']; ?>"
                                        onclick="dt_custom_view('vap_cat_<?php echo $cat['id']; ?>','.table-proposals','vap_cat_<?php echo $cat['id']; ?>'); return false;"><?php echo $cat['name']; ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?> -->
						
						
						
						
						
						
						
                        <div class="clearfix"></div>
                        <li class="divider"></li>
                        <li>
                            <a href="#" data-cview="expired"
                                onclick="dt_custom_view('expired','.table-proposals','expired'); return false;">
                                <?php echo _l('proposal_expired'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="leads-related" data-cview="leads_related"
                                onclick="dt_custom_view('leads_related','.table-proposals','leads_related'); return false;">
                                <?php echo _l('proposals_leads_related'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="customers-related" data-cview="customers_related"
                                onclick="dt_custom_view('customers_related','.table-proposals','customers_related'); return false;">
                                <?php echo _l('proposals_customers_related'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn btn-default btn-with-tooltip toggle-small-view hidden-xs"
                    onclick="toggle_small_view('.table-proposals','#proposal'); return false;" data-toggle="tooltip"
                    title="<?php echo _l('invoices_toggle_table_tooltip'); ?>"><i
                        class="fa fa-angle-double-left"></i></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row">






        <div class="col-md-12 tab-content" id="small-table">
            <div class="panel_s" id="">
                <div class="panel-body">
                

                <!--<div class="row" id="leads-table">
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-2">
                             <div class="col-md-12 leads-filter-column">
                                <?php echo render_date_input('psearchstartdate', 'From', '', ''); ?>
                            </div>
                        </div>
                        <div class="col-md-2"> 
                            <div class="col-md-12 leads-filter-column">
                                <?php echo render_date_input('psearchtodate', 'To', '', ''); ?>
                            </div>
                        </div>

                        <div class="col-md-2" style="margin-top:2%;"> 
                            <a class="btn btn-primary pull-left display-block new-proposal-btn" href="<?php echo base_url().'admin/proposals'; ?>">Reset</a>
                        </div>

                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">&nbsp;</div>   
                                    
                <div class="clearfix"></div>                    




                    <!-- if invoiceid found in url -->
                    <?php echo form_hidden('proposal_id', $proposal_id); ?>
                    <?php
					/*$table_data = array_merge($table_data, [
                        //_l('tags'),
                        //_l('proposal_date_created'),
                        _l('proposal_date'),
                    ]);	*/
                    $table_data = [
						_l('proposal_date'),
						_l('proposal_status'),
                        'Sales Rep',
											
                        _l('proposal') . ' #',
                       
                        _l('proposal_to'),
                       
                      
                        'Vin',
                        'Sales Cost',
						'Purchase Cost',
                        'Margin',
                        'Commission',
                        ];
					

                    if (!isset($project)) {
                        //$table_data[] = _l('project');
                    }
                    
                    

                    $table_data = hooks()->apply_filters('proposals_table_columns', $table_data);
                    render_datatable_commissionsreport($table_data, isset($class) ? $class : 'proposals', [], [
                        'data-last-order-identifier' => 'proposals',
                        'data-default-order'         => get_table_last_order('proposals'),
                    ]);
                    ?>
                </div>
            </div>

            
        </div>
        <div class="col-md-7 small-table-right-col">
            <div id="proposal" class="hide">
            </div>
        </div>
    </div>
</div>
<style>
.table-proposals thead th:nth-child(1){
    min-width: 50px !important;
}    
.table-proposals thead th:nth-child(2){
    min-width: 150px !important;
}
.table-proposals thead th:nth-child(7){
    min-width: 100px !important;
}
</style>
