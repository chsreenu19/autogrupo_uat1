<?php init_head(); ?>


<div id="wrapper">
   <div class="content">
      <div class="row">
         <div class="col-md-12" id="small-table">
            <div class="panel_s">
               <div class="panel-body">
                <?php echo form_hidden('proposal_id',$proposal_id); ?>
                  <div class="row">
                     <div class="col-md-12">
                      <h4 class="no-margin font-bold"><i class="fa fa-clone menu-icon menu-icon" aria-hidden="true"></i> <?php echo _l($title); ?> </h4>
					 
                      <br>

                    </div>
                  </div>

                  <div class="row row-margin-bottom">
                    
					
					
                    <div class=" col-md-2" style="display:none;">
                                <select name="item_group" id="item_group" class="selectpicker"  data-live-search="true" data-width="100%" data-none-selected-text="<?php echo _l('Groups'); ?>">
                                    <option value="0"></option>
                                    <?php foreach($item_groups as $item_f) { 
                                      $selected = '';
                                      if($item_f['id']==1 || $item_f['id'] =='1'){
                                        $selected = "selected='selected'";
                                      }
                        ?>
                            <option  <?php echo $selected; ?> value="<?php echo html_entity_decode($item_f['id']); ?>"><?php echo html_entity_decode($item_f['name']); ?></option>
                            <?php } ?>

                        </select>
                    </div>  
                    
					
					
					
                    <!--<div class=" col-md-2">
                      <select name="item_filter[]" id="item_filter" class="selectpicker" multiple="true"  data-live-search="true" data-width="100%" data-none-selected-text="<?php echo _l('tags'); ?>">

                           <?php foreach($item_tags as $item_f) { ?>
                            <option value="<?php echo html_entity_decode($item_f['rel_id']); ?>"><?php echo html_entity_decode($item_f['name']); ?></option>
                            <?php } ?>

                        </select>
                    </div>-->

                    <!--<div class=" col-md-2">
                      <select name="alert_filter" id="alert_filter" class="selectpicker"  data-live-search="true" data-width="100%" data-none-selected-text="<?php echo _l('alert_filter'); ?>">

                            <option value=""></option>
                            <option value="3"><?php echo _l('minimum_stock') ; ?></option>
                            <option value="4"><?php echo _l('maximum_stock') ; ?></option>
                            <option value="1"><?php echo _l('out_of_stock') ; ?></option>
                            <option value="2"><?php echo _l('1_month_before_expiration_date') ; ?></option>

                        </select>
                    </div>-->


                    <div class=" col-md-2" style="display:none;">
                        <select  name="available_item_statuses" id="available_item_statuses" class="selectpicker"  data-live-search="false" data-width="100%" data-none-selected-text="<?php echo _l('Status'); ?>">
                            <option value="0"></option>

                            <?php foreach($available_statuses as $as_f) { 
								
                              $selected = '';
							  if($as_f=='For Sale'){
								  $selected = "selected='selected'";
							  }
                              
                              ?>
                            <option  <?php echo $selected; ?> value="<?php echo $as_f; ?>"><?php echo $as_f; ?></option>
                            <?php } ?>

                        </select>
                    </div>         





                    <div class=" col-md-2" style="display:none;">
                      <select name="warehouse_filter[]" id="warehouse_filter" class="selectpicker" multiple="true" data-live-search="true" data-width="100%" data-none-selected-text="<?php echo _l('warehouse_filter'); ?>">

                          <?php foreach($warehouse_filter as $warehouse) { ?>
                            <option value="<?php echo html_entity_decode($warehouse['warehouse_id']); ?>"><?php echo html_entity_decode($warehouse['warehouse_name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class=" col-md-2">
                      <div class="form-group">
                        <select name="commodity_filter[]" id="commodity_filter" class="selectpicker" data-live-search="true" multiple="true" data-width="100%" data-none-selected-text="<?php echo _l('commodity_filter'); ?>">

                            <?php foreach($commodity_filter as $commodity) { ?>
                              <option value="<?php echo html_entity_decode($commodity['id']); ?>"><?php echo html_entity_decode($commodity['description']).'('.$commodity['sku_code'].')'; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                    </div>
					
					
					<div class="col-lg-4">
                        <div class="row">
                           <div class="col-md-6"><?php echo render_date_input('psearchstartdate','','',['placeholder' => _l('From')]); ?></div>
                           <div class="col-md-6"><?php echo render_date_input('psearchtodate','','',['placeholder' => _l('To')]); ?></div>
                        </div>
                     </div>
                    <div class="col-md-2" > 
                            <a class="btn btn-primary pull-left display-block new-proposal-btn" href="<?php echo base_url().'admin/warehouse/invforsale/commodity_list'; ?>">Reset</a>
                        </div>
                    
                   
                   
                    </div>

                    <div class="row">
                    <!-- view/manage -->            
                      <div class="modal bulk_actions" id="table_commodity_list_bulk_actions" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title"><?php echo _l('bulk_actions'); ?></h4>
                              </div>
                              <div class="modal-body">
                                 <?php if(has_permission('warehouse','','delete') || is_admin()){ ?>
                                 <div class="checkbox checkbox-danger">
                                    <input type="checkbox" name="mass_delete" id="mass_delete">
                                    <label for="mass_delete"><?php echo _l('mass_delete'); ?></label>
                                 </div>
                                
                                 <?php } ?>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>

                                 <?php if(has_permission('warehouse','','delete') || is_admin()){ ?>
                                 <a href="#" class="btn btn-info" onclick="warehouse_delete_bulk_action(this); return false;"><?php echo _l('confirm'); ?></a>
                                  <?php } ?>
                              </div>
                           </div>
                          
                        </div>
                        
                     </div>

                     <!-- update multiple item -->

                     <div class="modal export_item" id="table_commodity_list_export_item" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title"><?php echo _l('export_item'); ?></h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								 
                              </div>
                              <div class="modal-body">
                                 <?php if(has_permission('warehouse','','create') || is_admin()){ ?>
                                 <div class="checkbox checkbox-danger">
                                    <input type="checkbox" name="mass_delete" id="mass_delete">
                                    <label for="mass_delete"><?php echo _l('mass_delete'); ?></label>
                                 </div>
                                
                                 <?php } ?>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>

                                 <?php if(has_permission('warehouse','','create') || is_admin()){ ?>
                                 <a href="#" class="btn btn-info" onclick="warehouse_delete_bulk_action(this); return false;"><?php echo _l('confirm'); ?></a>
                                  <?php } ?>
                              </div>
                           </div>
                          
                        </div>
                        
                     </div>

                       <!-- print barcode -->      
                       <?php echo form_open_multipart(admin_url('warehouse/item_print_barcode'), array('id'=>'item_print_barcode')); ?>      
                      <div class="modal bulk_actions" id="table_commodity_list_print_barcode" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title"><?php echo _l('print_barcode'); ?></h4>
                              </div>
                              <div class="modal-body">
                                 <?php if(has_permission('warehouse','','create') || is_admin()){ ?>

                                 <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <div class="radio radio-primary radio-inline" >
                                              <input onchange="print_barcode_option(this); return false" type="radio" id="y_opt_1_" name="select_item" value="0" checked >
                                              <label for="y_opt_1_"><?php echo _l('select_all'); ?></label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="radio radio-primary radio-inline" >
                                              <input onchange="print_barcode_option(this); return false" type="radio" id="y_opt_2_" name="select_item" value="1" >
                                              <label for="y_opt_2_"><?php echo _l('select_item'); ?></label>
                                          </div>
                                    </div>
                                  </div>
                                 </div>     

                                 <div class="row display-select-item hide ">
                                  <div class=" col-md-12">
                                      <div class="form-group">
                                        <select name="item_select_print_barcode[]" id="item_select_print_barcode" class="selectpicker" data-live-search="true" multiple="true" data-width="100%" data-none-selected-text="<?php echo _l('select_item_print_barcode'); ?>">

                                            <?php foreach($commodity_filter as $commodity) { ?>
                                              <option value="<?php echo html_entity_decode($commodity['id']); ?>"><?php echo html_entity_decode($commodity['description']); ?></option>
                                              <?php } ?>
                                          </select>
                                        </div>
                                  </div>
                                  </div>
                                
                                 <?php } ?>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>

                                 <?php if(has_permission('warehouse','','create') || is_admin()){ ?>

                                 <button type="submit" class="btn btn-info" ><?php echo _l('confirm'); ?></button>
                                  <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php echo form_close(); ?>


                     <a href="#"  onclick="staff_bulk_actions(); return false;" data-toggle="modal" data-table=".table-table_commodity_list" data-target="#leads_bulk_actions" class=" hide bulk-actions-btn table-btn"><?php echo _l('bulk_actions'); ?></a>

                     <a href="#"  onclick="staff_export_item(); return false;" data-toggle="modal" data-table=".table-table_commodity_list" data-target="#leads_export_item" class=" hide bulk-actions-btn table-btn"><?php echo _l('export_item'); ?></a>
					 
					 

                     <a href="#"  onclick="print_barcode_bulk_actions(); return false;" data-toggle="modal" data-table=".table-table_commodity_list" data-target="#print_barcode_item" class=" hide print_barcode-bulk-actions-btn table-btn"><?php echo _l('print_barcode'); ?></a>
                     

                      <?php 
                      $table_data = array(
                                        '<span class="hide"> - </span><div class="checkbox mass_select_all_wrap"><input type="checkbox" id="mass_select_all" data-to-table="table_commodity_list"><label></label></div>',
                                          //_l('_images'),
                                          _l('commodity_code'),
                                          _l('commodity_name'),
                                          _l('sku_code'),
                                          _l('Date Created'),
										  _l('Aging'),	
										  //_l('Sold On'),	
                                          _l('group_name'),
                                          _l('warehouse_name'),
                                          _l('tags'),
                                          _l('inventory_number'),
                                          _l('unit_name'),
                                          _l('rate'),
                                          _l('purchase_price'),
                                          _l('Commission Pack'),
                                          _l('tax'),
                                          _l('status'),                         
                                          _l('minimum_stock'),                         
                                          _l('maximum_stock'), 
										  	
                                        );

                      $cf = get_custom_fields('items',array('show_on_table'=>1));
                      foreach($cf as $custom_field) {
                        array_push($table_data,$custom_field['name']);
                      }

                      render_datatable($table_data,'table_commodity_list',
                          array('customizable-table'),
                          array(
                            'proposal_sm' => 'proposal_sm',
                             'id'=>'table-table_commodity_list',
                             'data-last-order-identifier'=>'table_commodity_list',
                             'data-default-order'=>get_table_last_order('table_commodity_list'),
                           )); ?>


                      </div>


               </div>
            </div>
         </div>
         <div class="col-md-7 small-table-right-col">
            <div id="proposal_sm_view" class="hide">
            </div>
         </div>
      </div>
   </div>
   
</div>


    <div class="modal" id="warehouse_type" tabindex="-1" role="dialog">
    <div class="modal-dialog ht-dialog-width">

          <?php echo form_open_multipart(admin_url('warehouse/add_commodity_list'), array('id'=>'add_warehouse_type')); ?>
          <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                    <h4 class="modal-title">
                        <span class="add-title"><?php echo _l('add'); ?></span>
                    </h4>
                   
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                         <div id="warehouse_type_id">
                         </div>   
                     <div class="form"> 
                        <div class="col-md-12" id="add_handsontable">
                        </div>
                          <?php echo form_hidden('hot_warehouse_type'); ?>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button id="latch_assessor" type="button" class="btn btn-info intext-btn" onclick="add_warehouse_type(this); return false;" ><?php echo _l('submit'); ?></button>
                </div>
                <?php echo form_close(); ?>
              </div>
              </div>
          </div>


  <!-- add one commodity list sibar start-->       

    <div class="modal" id="commodity_list-add-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog ht-dialog-width">

        <?php echo form_open_multipart(admin_url('warehouse/commodity_list_add_edit'),array('class'=>'commodity_list-add-edit addinvformpopup','autocomplete'=>'off')); ?>

      <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">
                    <span class="edit-commodity-title"><?php echo _l('edit_item'); ?></span>
                    <span class="add-commodity-title"><?php echo _l('add_item'); ?></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="commodity_item_id"></div>


                <div class="horizontal-scrollable-tabs preview-tabs-top">
                  <div class="scroller arrow-left"><i class="fa fa-angleInterview-left"></i></div>
                  <div class="scroller arrow-right"><i class="fa fa-angle-right"></i></div>
                  <div class="horizontal-tabs">
                  <ul class="nav nav-tabs nav-tabs-horizontal mbot15" role="tablist">
                   <li role="presentation" class="active">
                       <a href="#interview_infor" aria-controls="interview_infor" role="tab" data-toggle="tab" aria-controls="interview_infor">
                       <span class="glyphicon glyphicon-align-justify"></span>&nbsp;<?php echo _l('general_infor'); ?>
                       </a>
                    </li>
                    <!--<li role="presentation">
                       <a href="#interview_evaluate" aria-controls="interview_evaluate" role="tab" data-toggle="tab" aria-controls="interview_evaluate">
                       <i class="fa fa-group"></i>&nbsp;<?php echo _l('properties'); ?>
                       </a>
                    </li>-->

                    <!-- TODO -->
                    <!-- <li role="presentation">
                       <a href="#variation" aria-controls="variation" role="tab" data-toggle="tab" aria-controls="variation">
                       <i class="fa fa-bars menu-icon"></i>&nbsp;<?php echo _l('variation'); ?>
                       </a>
                    </li> -->
                    
                    <li role="presentation">
                       <a href="#custom_fields" aria-controls="custom_fields" role="tab" data-toggle="tab" aria-controls="custom_fields">
                       <i class="fa fa-bars menu-icon"></i>&nbsp;<?php echo _l('custom_fields'); ?>
                       </a>
                    </li>
                    
                    
                   </ul>
                 </div>
               </div>

               <div class="tab-content">
              
                <!-- interview process start -->
                  <div role="tabpanel" class="tab-pane active" id="interview_infor">
                        <div class="row hide">
                          <div class=" col-md-12">
                            <div class="form-group">
                              <label for="parent_id" class="control-label"><?php echo _l('parent_item'); ?></label>
                              <select name="parent_id" id="parent_id" class="selectpicker" data-live-search="true" data-width="100%" data-none-selected-text="">
                                
                              </select>
                            </div>

                          </div>
                        </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <?php echo render_input('commodity_code', 'commodity_code'); ?>
                                </div>
                                <div class="col-md-6">
                                  <?php echo render_input('description', 'commodity_name'); ?>
                                </div>
                                
                            </div>

                            <div class="row">
                               <div class="col-md-4">
                                     <?php echo render_input('commodity_barcode', 'commodity_barcode','','text'); ?>
                                </div>
                              <div class="col-md-4">
                                <a href="#" class="pull-right display-block input_method"><i class="fa fa-question-circle skucode-tooltip"  data-toggle="tooltip" title="" data-original-title="<?php echo _l('commodity_sku_code_tooltip'); ?>"></i></a>
                                <?php echo render_input('sku_code', 'sku_code','',''); ?>
                              </div>
                              <div class="col-md-4">
                                <?php echo render_input('sku_name', 'sku_name'); ?>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group" id="tags_value">
                                    <div id="inputTagsWrapper">
                                       <label for="tags" class="control-label"><i class="fa fa-tag" aria-hidden="true"></i> <?php echo _l('tags'); ?></label>
                                       <input type="text" class="tagsinput" id="tags" name="tags" value="" data-role="tagsinput">
                                    </div>
                                 </div>

                              </div>
                            </div>  

                            <div class="row">
                              <div class="col-md-12">
                                    <?php echo render_textarea('long_description', 'description'); ?>
                              </div>
                            </div>

                            <!--  add warehouse for item-->
                            <div class="row">
                              <div class="col-md-12">
                                  <?php echo render_select('warehouse_id',$warehouses,array('warehouse_id',array('warehouse_code','warehouse_name')),'warehouse_name'); ?>
                              </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                     <?php echo render_select('commodity_type',$commodity_types,array('commodity_type_id','commondity_name'),'commodity_type'); ?>

                                </div>
                                 <div class="col-md-6">
                                     <?php echo render_select('unit_id',$units,array('unit_type_id','unit_name'),'units'); ?>
                                </div>
                            </div>


                             <div class="row">
                              
                                <div class="col-md-6">
                                     <?php echo render_select('group_id',$commodity_groups,array('id','name'),'commodity_group'); ?>
                                </div>
                                 <div class="col-md-6">
                                     <?php echo render_select('sub_group',$sub_groups,array('id','sub_group_name'),'sub_group'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                  <?php 
                                    $attr = array();
                                   
                                   ?>
                                     <?php echo render_input('profif_ratio','_profit_rate_p','','number',$attr); ?>
                                </div>
                                <div class="col-md-6">
                                     <?php echo render_select('tax',$taxes,array('id','name'),'taxes'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">

                                    <?php 
                                    $attr = array();
                                    $attr = ['data-type' => 'currency'];
                                     echo render_input('purchase_price', 'purchase_price','', 'text', $attr); ?>
                                  
                                </div>
                                <div class="col-md-4">

                                     <?php //$premium_rates = isset($premium_rates) ? $premium_rates : '' ?>
                                    <?php 
                                    $attr = array();
                                    $attr = ['data-type' => 'currency','readonly'=>'readonly'];
                                     echo render_input('commission_pack', 'Purchase + Commission Pack','', 'text', $attr); ?>


                                </div>
                                <div class="col-md-4">

                                     <?php $premium_rates = isset($premium_rates) ? $premium_rates : '' ?>
                                    <?php 
                                    $attr = array();
                                     $attr = ['data-type' => 'currency'];
                                     echo render_input('rate', 'rate','', 'text', $attr); ?>


                                </div>

                            </div>

                            <?php if(!isset($expense) || (isset($expense) && $expense->attachment == '')){ ?>
                            <div id="dropzoneDragArea" class="dz-default dz-message">
                               <span><?php echo _l('attach_images'); ?></span>
                            </div>
                            <div class="dropzone-previews"></div>
                            <?php } ?>

                            <div id="images_old_preview">
                              
                            </div>

                        
                  </div>
               
                  <div role="tabpanel" class="tab-pane" id="interview_evaluate">
                    <div class="row">
                    <div class="col-md-12">
                     <div id="additional_criteria"></div>   
                     <div class="form">

                        <div class="row">
                            <div class="col-md-6">
                                <?php echo render_input('origin', 'origin'); ?>
                            </div>
                            <div class="col-md-6">
                                 <?php echo render_select('style_id',$styles,array('style_type_id','style_name'),'styles'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                 <?php echo render_select('model_id',$models,array('body_type_id','body_name'),'model_id'); ?>
                            </div>
                            <div class="col-md-6">
                                 <?php echo render_select('size_id',$sizes,array('size_type_id','size_name'),'sizes'); ?>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <?php echo render_select('color',$colors,array('color_id',array('color_hex','color_name')),'_color'); ?>
                          </div>
                          <div class="col-md-6">
                            <?php $attr = array();
                                  $attr = ['min' => 0, 'step' => 1]; ?>

                            <?php echo render_input('guarantee','guarantee_month','', 'number', $attr); ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                  <input  type="checkbox" id="without_checking_warehouse" name="without_checking_warehouse" value="without_checking_warehouse">

                                  <label for="without_checking_warehouse"><?php echo _l('without_checking_warehouse'); ?><small ><?php echo _l('without_checking_warehouse_tooltip') ?> </small>
                                  </label>
                                </div>
                              </div>
                          </div>  
                        </div>  

                        

                        <div class="row">
                          <div class="col-md-12 ">
                              <p class="bold"><?php echo _l('long_description'); ?></p>
                              <?php echo render_textarea('long_descriptions','','',array(),array(),'','tinymce'); ?>
                                  
                          </div>
                        </div>
                       
                        

                    </div>
                    </div>
                    </div>

                  </div>

                  <!-- TODO -->
                  <!-- variation -->
                  <!-- <div role="tabpanel" class="tab-pane " id="variation">
                      <div class="list_approve">
                        <div id="item_approve">
                          <div class="col-md-11">

                            <div class="col-md-4">
                              <?php echo render_input('name[0]','variation_name','', 'text'); ?>
                           </div>
                           <div class="col-md-8">
                            <div class="options_wrapper">
                            <?php 
                              $variation_attr =[];
                              $variation_attr['row'] = '1';
                             ?>
                            <span class="pull-left fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="Populate the field by separating the options by coma. eq. apple,orange,banana"></span>
                            <?php echo render_textarea('options[0]', 'variation_options', '', $variation_attr); ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1 new_vendor_requests_button">
                          <span class="pull-bot">
                            <button name="add" class="btn new_wh_approval btn-success" data-ticket="true" type="button"><i class="fa fa-plus"></i></button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div> -->

                  <!-- custome fields -->
                  <div role="tabpanel" class="tab-pane" id="custom_fields">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form">

                          <div id="custom_fields_items">
                            <?php echo render_custom_fields('items'); ?>
                          </div>

                        </div>
                     </div>
                   </div>
                 </div>


              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close') ?></button>
                <button type="submit" class="btn btn-info addinvformpopup"><?php echo _l('save'); ?></button>
            </div>
          </div>

          </div>
        </div>
            <?php echo form_close(); ?>

<!-- add one commodity list sibar end -->  
<div class="modal fade" id="show_detail" tabindex="-1" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">
                      <span class="add-title"></span>
                  </h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                     <div class="horizontal-scrollable-tabs preview-tabs-top col-md-12">
                  <div class="scroller arrow-left"><i class="fa fa-angle-left"></i></div>
                  <div class="scroller arrow-right"><i class="fa fa-angle-right"></i></div>
                  <div class="horizontal-tabs">
                    <ul class="nav nav-tabs nav-tabs-horizontal mbot15" role="tablist">
                      <li role="presentation" class="active">
                           <a href="#out_of_stock" aria-controls="out_of_stock" role="tab" id="tab_out_of_stock" data-toggle="tab">
                              <?php echo _l('out_of_stock') ?>
                           </a>
                        </li>
                        <li role="presentation">
                           <a href="#expired" aria-controls="expired" role="tab" id="tab_expired" data-toggle="tab">
                              <?php echo _l('expired') ?>
                           </a>
                        </li>                      
                    </ul>
                    </div>
                </div>

                <div class="tab-content col-md-12">
                  <div role="tabpanel" class="tab-pane active row" id="out_of_stock">
                    <div class="col-md-12">
                      <?php render_datatable(array(
                          _l('id'),
                          _l('commodity_name'),
                          _l('expiry_date'),
                          _l('lot_number'),
                          _l('quantity'),


                          ),'table_out_of_stock'); ?>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane row" id="expired">
                    <div class="col-md-12">
                      <?php render_datatable(array(
                          _l('id'),
                          _l('commodity_name'),
                          _l('expiry_date'),
                          _l('lot_number'),
                          _l('quantity'),

                          ),'table_expired'); ?>
                    </div>
                  </div>                  
                </div>
                  </div>
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
                </div>
            </div>
          </div>
      </div>
       <?php echo form_hidden('warehouse_id'); ?>
       <?php echo form_hidden('commodity_id'); ?>
       <?php echo form_hidden('expiry_date'); ?>



<?php init_tail(); ?>
<?php //require 'modules/warehouse/assets/js/ablereports/commodity_list_js.php';?>
<?php //require 'modules/warehouse/assets/js/ablereports/able_js.php';?>
<script>
$(document).ready(function(){
  tinyMCE.remove();
  tinyMCE.init({
    selector: 'textarea',
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },
    plugins: [
				 " autolink link image preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons paste textcolor"
		   ]
    });
	
	
	
	var table_commodity_list = $('table.table-table_commodity_list');
	var ProposalServerParams = {
		"warehouse_ft": "[name='warehouse_filter[]']",
		"commodity_ft": "[name='commodity_filter[]']",
		"alert_filter": "[name='alert_filter']",
		"item_filter": "[name='item_filter[]']",
		"item_group": "[name='item_group']",
		"available_item_statuses": "[name='available_item_statuses']",
		"psearchstartdate": "[name='psearchstartdate']",
		"psearchtodate": "[name='psearchtodate']",
    };

	
    
    var _table_api = initDataTable(table_commodity_list, admin_url+'warehouse/invforsale/table_commodity_list', [0], [0], ProposalServerParams,  [1, 'desc']);
    $.each(ProposalServerParams, function(i, obj) {
      $('input,select' + obj).on('change', function() {  
        table_commodity_list.DataTable().ajax.reload()
        .columns.adjust()
        .responsive.recalc();
      });
    });


    
})

</script>
</body>
</html>
