<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="_filters _hidden_inputs">
    <?php
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
    if (isset($project)) {
        echo form_hidden('project_id', $project->id);
    }
    echo form_hidden('leads_related');
    echo form_hidden('customers_related');
    echo form_hidden('expired');
    ?>
</div>

<div class="col-md-12">



<div class="quick-stats-invoices col-xs-12 col-md-6 col-sm-6 col-lg-3">              
                <div class="top_stats_wrapper">                                  
                    <div class="tw-text-neutral-800 mtop5 tw-flex tw-items-center tw-justify-between">                      
                        <div class="tw-font-medium tw-inline-flex text-neutral-600 tw-items-center">                          
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-w-6 tw-h-6 tw-mr-3 rtl:tw-ml-3 tw-text-neutral-600">                              
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>                          
                            </svg>Total Quotes
                        </div>                      
                        <div class="tw-flex tw-items-baseline tw-text-base tw-font-semibold tw-text-primary-600">                      
                            <?php echo $quotes_total; ?>            
                        </div>                   
                    </div>                    
                </div>          
            </div> 
            
            <div class="quick-stats-invoices col-xs-12 col-md-6 col-sm-6 col-lg-3">              
                <div class="top_stats_wrapper">                                  
                    <div class="tw-text-neutral-800 mtop5 tw-flex tw-items-center tw-justify-between">                      
                        <div class="tw-font-medium tw-inline-flex text-neutral-600 tw-items-center">                          
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-w-6 tw-h-6 tw-mr-3 rtl:tw-ml-3 tw-text-neutral-600">                              
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>                          
                            </svg>Front Sales
                        </div>                      
                        <div class="tw-flex tw-items-baseline tw-text-base tw-font-semibold tw-text-primary-600">                      
                        <?php echo $frontsales_total; ?>            
                        </div>                 
                    </div>                    
                </div>          
            </div> 

            <div class="quick-stats-invoices col-xs-12 col-md-6 col-sm-6 col-lg-3">              
                <div class="top_stats_wrapper">                                  
                    <div class="tw-text-neutral-800 mtop5 tw-flex tw-items-center tw-justify-between">                      
                        <div class="tw-font-medium tw-inline-flex text-neutral-600 tw-items-center">                          
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-w-6 tw-h-6 tw-mr-3 rtl:tw-ml-3 tw-text-neutral-600">                              
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>                          
                            </svg>Back Sales
                        </div>
                        <div class="tw-flex tw-items-baseline tw-text-base tw-font-semibold tw-text-primary-600">                      
                        <?php echo $backsales_total; ?>            
                        </div>                      
                                       
                    </div>                    
                </div>          
            </div> 


            <div class="quick-stats-invoices col-xs-12 col-md-6 col-sm-6 col-lg-3">              
                <div class="top_stats_wrapper">                                  
                    <div class="tw-text-neutral-800 mtop5 tw-flex tw-items-center tw-justify-between">                      
                        <div class="tw-font-medium tw-inline-flex text-neutral-600 tw-items-center">                          
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-w-6 tw-h-6 tw-mr-3 rtl:tw-ml-3 tw-text-neutral-600">                              
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>                          
                            </svg>Invoiced
                        </div>
                        <div class="tw-flex tw-items-baseline tw-text-base tw-font-semibold tw-text-primary-600">                      
                        <?php echo $invoiced_total; ?>             
                        </div>                      
                                       
                    </div>                    
                </div>          
            </div> 



</div>
<div class="col-md-12">&nbsp;</div>                       
<div class="clearfix"></div> 


<div class="col-md-12">
    <div class="tw-mb-2 sm:tw-mb-4">
        <div class="_buttons">
            <?php if (has_permission('proposals', '', 'create')) { ?>
            <!--<a href="<?php echo admin_url('proposals/proposal'); ?>"
                class="btn btn-primary pull-left display-block new-proposal-btn">
                <i class="fa-regular fa-plus tw-mr-1"></i>
                <?php echo _l('new_proposal'); ?>
            </a>-->
            <?php } ?>
            <a href="<?php echo admin_url('proposals/pipeline/' . $switch_pipeline); ?>"
                class="btn btn-default mleft5 pull-left switch-pipeline hidden-xs" data-toggle="tooltip"
                data-placement="top" data-title="<?php echo _l('switch_to_pipeline'); ?>">
                <i class="fa-solid fa-grip-vertical"></i>
            </a>
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
        <div class="col-md-12" id="small-table">
            <div class="panel_s">
                <div class="panel-body">
				
				
				
					<div class="row" id="leads-table">
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
                </div> 
                <div class="col-md-12">&nbsp;</div>                       
                <div class="clearfix"></div>  
				
				
				
                    <!-- if invoiceid found in url -->
                    <?php echo form_hidden('proposal_id', $proposal_id); ?>
                    <?php
                    $table_data = [
                        _l('proposal') . ' #',
                        _l('proposal_subject'),
                        _l('proposal_to'),
                        //_l('proposal_total'),
                        'Front Sales',
						'Back Sales',
						 'Insurance',
                        _l('proposal_date'),
                        //_l('proposal_open_till'),
                        ];
                    if (!isset($project)) {
                        //$table_data[] = _l('project');
                    }
                    $table_data = array_merge($table_data, [
                       // _l('tags'),
                       // _l('proposal_date_created'),
                        _l('proposal_status'),
                    ]);

                    $custom_fields = get_custom_fields('proposal', ['show_on_table' => 1]);
                    foreach ($custom_fields as $field) {
                        array_push($table_data, [
                         'name'     => $field['name'],
                         'th_attrs' => ['data-type' => $field['type'], 'data-custom-field' => 1],
                     ]);
                    }

                    $table_data = hooks()->apply_filters('proposals_table_columns', $table_data);
                    render_datatable($table_data, isset($class) ? $class : 'proposals', [], [
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