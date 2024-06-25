<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); 
$userstaffid = $this->session->userdata('staff_user_id'); 
// $vas_total = $vasTotal;
// $vinitembyquote = $invoiceitemsbyquote;
// $vincostprice = 0;
// $vinpurchaseprice = 0;
// $vinmargin = 0;
// if(count($vinitembyquote)>0){
//     $vincostprice = $vinitembyquote[0]['rate'];
//     $vinpurchaseprice = $vinitembyquote[0]['purchase_price'];
//     $vinmargin = $vinitembyquote[0]['margin'];
// }
 $userroleid = get_staff_role_id_value();
//  echo "lslkdks";exit;
?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <?php
         if (isset($proposal)) {
             echo form_hidden('isedit', $proposal->id);
         }
         $rel_type  = '';
            $rel_id = '';
            if (isset($proposal) || ($this->input->get('rel_id') && $this->input->get('rel_type'))) {
                if ($this->input->get('rel_id')) {
                    $rel_id   = $this->input->get('rel_id');
                    $rel_type = $this->input->get('rel_type');
                } else {
                    $rel_id   = $proposal->rel_id;
                    $rel_type = $proposal->rel_type;
                }
            }
            ?>
			<input type="hidden" value="" id="selvehicleprice" name="selvehicleprice"/>
            <input type="hidden" value="" id="invvin" name="invvin"/>
            <input type="hidden" value="<?php echo $vasTotalNoFormat; ?>" id="vaptotal" name="vaptotal"/>
            <?php
         echo form_open($this->uri->uri_string(), ['id' => 'proposal-form', 'class' => '_transaction_form proposal-form']);

         if ($this->input->get('estimate_request_id')) {
             echo form_hidden('estimate_request_id', $this->input->get('estimate_request_id'));
         }
         ?>

            <div class="col-md-12">
                <h4
                    class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        <?php echo isset($proposal) ? format_proposal_number($proposal->id) : _l('new_proposal'); ?>
                    </span>
                    <?php echo isset($proposal) ? format_proposal_status($proposal->status) : ''; ?>
                </h4>
                <div class="panel_s">
				
                    <?php 
                       
                        
                        $this->load->view('admin/estimates/_add_edit_items'); 
                    ?>
					<hr class="hr-panel-separator" />
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <?php $value = (isset($proposal) ? $proposal->subject : 'Quote#'.$rel_id.rand(pow(10, 4-1), pow(10, 4)-1)); ?>
                                <?php $attrs = (isset($proposal) ? [] : ['autofocus' => true]); ?>
                                <?php echo render_input('subject', 'proposal_subject', $value, 'text', $attrs); ?>
                                <div class="form-group select-placeholder">
                                    <label for="rel_type"
                                        class="control-label"><?php echo _l('proposal_related'); ?></label>
                                    <select name="rel_type" id="rel_type" class="selectpicker" data-width="100%"
                                        data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                                        <option value=""></option>
                                        <option value="lead" <?php if ((isset($proposal) && $proposal->rel_type == 'lead') || $this->input->get('rel_type')) {
             if ($rel_type == 'lead') {
                 echo 'selected';
             }
         } ?>><?php echo _l('proposal_for_lead'); ?></option>
                                        <option value="customer" <?php if ((isset($proposal) && $proposal->rel_type == 'customer') || $this->input->get('rel_type')) {
             if ($rel_type == 'customer') {
                 echo 'selected';
             }
         } ?>><?php echo _l('proposal_for_customer'); ?></option>
                                    </select>
                                </div>
                                <div class="form-group select-placeholder<?php if ($rel_id == '') {
             echo ' hide';
         } ?> " id="rel_id_wrapper">
                                    <label for="rel_id"><span class="rel_id_label"></span></label>
                                    <div id="rel_id_select">
                                        <select name="rel_id" id="rel_id" class="ajax-search" data-width="100%"
                                            data-live-search="true"
                                            data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                                            <?php if ($rel_id != '' && $rel_type != '') {
             $rel_data = get_relation_data($rel_type, $rel_id);
             $rel_val  = get_relation_values($rel_data, $rel_type);
             echo '<option value="' . $rel_val['id'] . '" selected>' . $rel_val['name'] . '</option>';
         } ?>
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="form-group select-placeholder projects-wrapper <?php echo ((!isset($proposal)) || (isset($proposal) && $proposal->rel_type !== 'customer')) ? 'hide' : '' ?>">
                                    <label for="project_id"><?php echo _l('project'); ?></label>
                                    <div id="project_ajax_search_wrapper">
                                        <select name="project_id" id="project_id" class="projects ajax-search"
                                            data-live-search="true" data-width="100%"
                                            data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                                            <?php

                                     if (isset($proposal) && $proposal->project_id != 0) {
                                         echo '<option value="' . $proposal->project_id . '" selected>' . get_project_name_by_id($proposal->project_id) . '</option>';
                                     }
                                     ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php $value = (isset($proposal) ? _d($proposal->date) : _d(date('Y-m-d'))) ?>
                                        <?php echo render_date_input('date', 'proposal_date', $value); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                        $value = '';
                        if (isset($proposal)) {
                            $value = _d($proposal->open_till);
                        } else {
                            if (get_option('proposal_due_after') != 0) {
                                $value = _d(date('Y-m-d', strtotime('+' . get_option('proposal_due_after') . ' DAY', strtotime(date('Y-m-d')))));
                            }
                        }
                        echo render_date_input('open_till', 'proposal_open_till', $value); ?>
                                    </div>
                                </div>
                                <?php
                           $selected      = '';
                           $currency_attr = ['data-show-subtext' => true];
                           foreach ($currencies as $currency) {
                               if ($currency['isdefault'] == 1) {
                                   $currency_attr['data-base'] = $currency['id'];
                               }
                               if (isset($proposal)) {
                                   if ($currency['id'] == $proposal->currency) {
                                       $selected = $currency['id'];
                                   }
                                   if ($proposal->rel_type == 'customer') {
                                       $currency_attr['disabled'] = true;
                                   }
                               } else {
                                   if ($rel_type == 'customer') {
                                       $customer_currency = $this->clients_model->get_customer_default_currency($rel_id);
                                       if ($customer_currency != 0) {
                                           $selected = $customer_currency;
                                       } else {
                                           if ($currency['isdefault'] == 1) {
                                               $selected = $currency['id'];
                                           }
                                       }
                                       $currency_attr['disabled'] = true;
                                   } else {
                                       if ($currency['isdefault'] == 1) {
                                           $selected = $currency['id'];
                                       }
                                   }
                               }
                           }
                           $currency_attr = apply_filters_deprecated('proposal_currency_disabled', [$currency_attr], '2.3.0', 'proposal_currency_attributes');
                           $currency_attr = hooks()->apply_filters('proposal_currency_attributes', $currency_attr);
                           ?>
                                <div class="row">
                                    <div class="col-md-6" style="display:none;">
                                        <?php
                                        echo render_select('currency', $currencies, ['id', 'name', 'symbol'], 'proposal_currency', $selected, $currency_attr);
                              ?>
                                    </div>
                                    <div class="col-md-6" style="display:none;">
                                        <div class="form-group select-placeholder">
                                            <label for="discount_type"
                                                class="control-label"><?php echo _l('discount_type'); ?></label>
                                            <select name="discount_type" class="selectpicker" data-width="100%"
                                                data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                                                <option value="" selected><?php echo _l('no_discount'); ?></option>
                                                <option value="before_tax" <?php
                                  if (isset($estimate)) {
                                      if ($estimate->discount_type == 'before_tax') {
                                          echo 'selected';
                                      }
                                  }?>><?php echo _l('discount_type_before_tax'); ?></option>
                                                <option value="after_tax" <?php if (isset($estimate)) {
                                      if ($estimate->discount_type == 'after_tax') {
                                          echo 'selected';
                                      }
                                  } ?>><?php echo _l('discount_type_after_tax'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php $fc_rel_id = (isset($proposal) ? $proposal->id : false); ?>
                                <?php //echo render_custom_fields('proposal', $fc_rel_id); ?>
                                <!--<div class="form-group no-mbot">
                                    <label for="tags" class="control-label"><i class="fa fa-tag" aria-hidden="true"></i>
                                        <?php echo _l('tags'); ?></label>
                                    <input type="text" class="tagsinput" id="tags" name="tags"
                                        value="<?php echo(isset($proposal) ? prep_tags_input(get_tags_in($proposal->id, 'proposal')) : ''); ?>"
                                        data-role="tagsinput">
                                </div>
                                <div class="form-group mtop10 no-mbot">
                                    <p><?php echo _l('proposal_allow_comments'); ?></p>
                                    <div class="onoffswitch">
                                        <input type="checkbox" id="allow_comments" class="onoffswitch-checkbox" <?php if ((isset($proposal) && $proposal->allow_comments == 1) || !isset($proposal)) {
                                      echo 'checked';
                                  }; ?> value="on" name="allow_comments">
                                        <label class="onoffswitch-label" for="allow_comments" data-toggle="tooltip"
                                            title="<?php echo _l('proposal_allow_comments_help'); ?>"></label>
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group select-placeholder">
                                            <label for="status"
                                                class="control-label"><?php echo _l('proposal_status'); ?></label>
                                            <?php
                                    $disabled = '';
                                    if (isset($proposal)) {
                                        if ($proposal->estimate_id != null || $proposal->invoice_id != null) {
                                            $disabled = 'disabled';
                                        }
                                    }
                                    ?>
                                            <select name="status" class="selectpicker" data-width="100%"
                                                <?php echo $disabled; ?>
                                                data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
                                                <?php foreach ($statuses as $status) { ?>
                                                <option value="<?php echo $status; ?>" <?php if ((isset($proposal) && $proposal->status == $status) || (!isset($proposal) && $status == 0)) {
                                        echo 'selected';
                                    }else if($status==1){ echo 'selected';} ?>><?php echo format_proposal_status($status, '', false); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                 $i        = 0;
                                 $selected = '';
                                 foreach ($staff as $member) {
                                     if (isset($proposal)) {
                                         if ($proposal->assigned == $member['staffid']) {
                                             $selected = $member['staffid'];
                                         }
                                     }else if($userstaffid == $member['staffid']){
                                        $selected = $member['staffid'];
                                     }
                                     $i++;
                                 }
                                 echo render_select('assigned', $staff, ['staffid', ['firstname', 'lastname']], 'proposal_assigned', $selected);
                                 ?>
                                    </div>
                                </div>
                                <?php $value = (isset($proposal) ? $proposal->proposal_to : ''); ?>
                                <?php echo render_input('proposal_to', 'proposal_to', $value); ?>
                                <?php $value = (isset($proposal) ? $proposal->address : ''); ?>
                                <?php echo render_textarea('address', 'proposal_address', $value); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php $value = (isset($proposal) ? $proposal->city : ''); ?>
                                        <?php echo render_input('city', 'billing_city', $value); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php $value = (isset($proposal) ? $proposal->state : ''); ?>
                                        <?php echo render_input('state', 'billing_state', $value); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php $countries = get_all_countries(); ?>
                                        <?php $selected  = (isset($proposal) ? $proposal->country : ''); ?>
                                        <?php echo render_select('country', $countries, ['country_id', ['short_name'], 'iso2'], 'billing_country', $selected); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php $value = (isset($proposal) ? $proposal->zip : ''); ?>
                                        <?php echo render_input('zip', 'billing_zip', $value); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php $value = (isset($proposal) ? $proposal->email : ''); ?>
                                        <?php echo render_input('email', 'proposal_email', $value); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php $value = (isset($proposal) ? $proposal->phone : ''); ?>
                                        <?php echo render_input('phone', 'proposal_phone', $value); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-12">
								<hr/>
								<div class="col-md-12 text-center"><h4>Purchasing Inventory</h4></div>
								<?php echo render_custom_fields('proposal', $fc_rel_id); ?>
							</div>
						</div>
                       
                        <div
                            class="btn-bottom-toolbar bottom-transaction text-right sm:tw-flex sm:tw-items-center sm:tw-justify-between">
                            <p class="no-mbot pull-left mtop5 btn-toolbar-notice tw-hidden sm:tw-block">
                                <?php //echo _l('include_proposal_items_merge_field_help', '<b>{proposal_items}</b>'); ?>
                                <?php 
                                    $userrole = get_staff_role_id();
                                    //echo "<pre>"; print_r($userrole); exit;
                                    //isset($proposal) ? format_proposal_number($proposal->id)
                                    if(isset($proposal) && ($userrole->role==SUPER_ADMIN_ROLE_ID || $userrole->role==FI_ROLE_ID || $userrole->role==SALES_MANAGER_ROLE_ID)){
                                    ?>    
                                    <button type="button"
                                        class="btn btn-warning mleft10 dealcalculatorbtn">
                                        <?php echo _l('Deal Calculator'); ?>
                                    </button>

                                    <?php } ?>
                            </p>
                            <div>
                                <button type="button"
                                    class="btn btn-default mleft10 proposal-form-submit save-and-send transaction-submit">
                                    <?php echo _l('save_and_send'); ?>
                                </button>
                                <button class="btn btn-primary mleft5 proposal-form-submit transaction-submit"
                                    type="button">
                                    <?php echo _l('submit'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php echo form_close(); ?>
            <?php $this->load->view('admin/invoice_items/item'); ?>
        </div>
        <div class="btn-bottom-pusher"></div>
    </div>
</div>




<div class="modal fade lead-deal_calculator_modal" id="deal_calculator_modal" tabindex="-1" role="dialog" aria-labelledby="Deal Calculator">
  <div class="modal-dialog <?php echo get_option('lead_modal_class'); ?>">
    <div class="modal-content data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Deal Calculator, <?php echo isset($proposal) ? format_proposal_number($proposal->id): '' ?>
                </h4>
            </div>

            <div style="padding: 10px;">
                <table class="table table-bordered table-hover table-sm table-responsive table-condensed">
                    <thead class="" style="background: #ccc; border: 3px solid #000000;">
                        <tr>
                        <th scope="col">Deal Items</th>
                        
                        <th scope="col">Values Price</th>
                        <th scope="col">Actual Cost</th>
                        </tr>
                    </thead>
                    <tbody style="border: 3px solid #000;">
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Vehicle</td>
                            
                            <td><span id="vin_value_price">00</span></td>
                            <td><span id="vin_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Add Ons</td>
                            
                            <td><span id="addons_value_price">00</span></td>
                            <td><span id="addons_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Discounts</td>
                        
                            <td><span id="discounts_value_price">00</span></td>
                            <td><span id="discounts_value_actual_price">00</span></td>
                        </tr>
                        <tr style="border-bottom: 3px solid #000;">
                            <td style="background: #f1f5f9;" scope="row">Net Price</td>
                            
                            <td><span id="netprice_value_price">00</span></td>
                            <td><span id="netprice_value_actual_price">00</span></td>
                        </tr>

                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Fees</td>
                            
                            <td><span id="fees_value_price">00</span></td>
                            <td><span id="fees_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Rebate</td>
                            
                            <td><span id="rebate_value_price">00</span></td>
                            <td><span id="rebate_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Downpayment</td>
                        
                            <td><span id="downpayment_value_price">00</span></td>
                            <td><span id="downpayment_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Trade Allowance</td>
                        
                            <td><span id="tradeinallowance_value_price">00</span></td>
                            <td><span id="tradeinallowance_value_actual_price">00</span>&nbsp;(ACV)</td>
                        </tr>
                        <tr>
                            <td  style="background: #f1f5f9;" scope="row">Pay Off</td>
                            
                            <td><span id="bankpayoff_value_price">00</span></td>
                            <td><span id="bankpayoff_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Retain Allow</td>
                        
                            <td><span id="retainallow_value_price">00</span></td>
                            <td><span id="retainallow_value_actual_price">00</span></td>
                        </tr>
                        <tr  style="border-bottom: 3px solid #000;">
                            <td style="background: #f1f5f9;" scope="row">Net Trade</td>
                            
                            <td><span id="nettrade_value_price">00</span></td>
                            <td><span id="nettrade_value_actual_price">00</span></td>
                        </tr>

                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Back End </td>
                            
                            <td><span id="backend_value_price">00</span></td>
                            <td><span id="backend_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Sales Tax</td>
                        
                            <td><span id="salestax_value_price">00</span></td>
                            <td><span id="salestax_value_actual_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Balance</td>
                            
                            <td><span id="balance_value_price">00</span></td>
                            <td><span id="balance_value_actual_price">00</span></td>
                        </tr>
                        
                    </tbody>
                </table>    
            </div>
            
            

            
            
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-8">

                                 <div style="padding:5px;">
                   <table class="table table-bordered table-hover table-sm table-responsive table-condensed">
                    
                    <tbody style="border: 3px solid #000;">
                        
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Front Gross</td>
                            
                            <td><span id="frontgross_value_price">00</span></td>
                           
                            <td style="background: #f1f5f9;">Front Margin</td>
                            <td><span id="frontmargin_value_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Back Gross</td>
                            
                            <td><span id="backgross_value_price">00</span></td>
                            <td style="background: #f1f5f9;">Back Margin</td>
                            <td><span id="backmargin_value_price">00</span></td>
                        </tr>
                        <tr>
                            <td style="background: #f1f5f9;" scope="row">Total Gross</td>
                            
                            <td><span id="totalgross_value_price">00</span></td>

                            <td style="background: #f1f5f9;">Total Margin</td>
                            <td><span id="totalmargin_value_price">00</span></td>

                        </tr>
                       
                        
                    </tbody>
                </table>
                                </div>
                </div>
            </div>                     



            
    </div>
  </div>
</div>


<?php init_tail(); ?>
<?php $this->load->view('admin/proposals/ableit_proposal_js.php'); ?>

</body>

</html>
