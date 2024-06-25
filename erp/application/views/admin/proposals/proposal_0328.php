<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); 
$userstaffid = $this->session->userdata('staff_user_id'); 
$vas_total = $vasTotal;
$vinitembyquote = $invoiceitemsbyquote;
$vincostprice = 0;
$vinpurchaseprice = 0;
$vinmargin = 0;
if(count($vinitembyquote)>0){
    $vincostprice = $vinitembyquote[0]['rate'];
    $vinpurchaseprice = $vinitembyquote[0]['purchase_price'];
    $vinmargin = $vinitembyquote[0]['margin'];
}
 $userroleid = get_staff_role_id_value();
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
<script>
var _rel_id = $('#rel_id'),
    _rel_type = $('#rel_type'),
    _rel_id_wrapper = $('#rel_id_wrapper'),
    _project_wrapper = $('.projects-wrapper'),
    data = {};

function format(a) {
   
    return parseFloat(a).toFixed(2).toLocaleString();
}


$(function() {
	var userroleidj = <?php echo $userroleid; ?>;
	//alert(userroleidj);
    //DEAL CALCULATOR MODAL WINDOW


    $("body").on("click",".dealcalculatorbtn",function(){

        //all inputs
        var dimondceramic = ($('input[name="custom_fields[proposal][71]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][71]"]').val()).toFixed(2) : 0;
        var roadassistance = ($('input[name="custom_fields[proposal][66]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][66]"]').val()).toFixed(2) : 0;
        var powerpack = ($('input[name="custom_fields[proposal][112]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][112]"]').val()).toFixed(2) : 0;
        var paymentprotection = ($('input[name="custom_fields[proposal][114]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][114]"]').val()).toFixed(2) : 0;
        var gapamount = ($('input[name="custom_fields[proposal][85]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][85]"]').val()).toFixed(2) : 0;
        var powertrain = ($('input[name="custom_fields[proposal][65]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][65]"]').val()).toFixed(2) : 0;
        var servicecontract = ($('input[name="custom_fields[proposal][86]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][86]"]').val()).toFixed(2) : 0;
        var tablillasamount = ($('input[name="custom_fields[proposal][67]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][67]"]').val()).toFixed(2) : 0;
        var downpayment = ($('input[name="custom_fields[proposal][45]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][45]"]').val()).toFixed(2) : 0;
        //all inputs
       
        //all dropdowns
        var powerpacktype = ($('select[name="custom_fields[proposal][111]"]').val()) ? $('select[name="custom_fields[proposal][111]"]').val() : '';
        var paymentprotectiontype = ($('select[name="custom_fields[proposal][113]"]').val()) ? $('select[name="custom_fields[proposal][113]"]').val() : '';
        var gaptype = ($('select[name="custom_fields[proposal][63]"]').val()) ? $('select[name="custom_fields[proposal][63]"]').val() : '';
        var financialinstitutionselected = ($('select[name="custom_fields[proposal][89]"]').val()) ? $('select[name="custom_fields[proposal][89]"]').val() : '';


        var vaptotalsaleamount = Number(dimondceramic) + Number(roadassistance) + Number(powerpack) + Number(paymentprotection) + Number(gapamount) + Number(powertrain) + Number(servicecontract) + Number(tablillasamount);
       
        //all dropdowns

  
        //vap cost price.
        var tablillascostamount = 0;
        //dimond ceramic
        var dimondceramiccostprice = 0;
        if(Number(dimondceramic)>0){
            if(financialinstitutionselected =='First Bank'){
                dimondceramiccostprice = <?php echo DIMOND_FIRST_BANK_COST_PRICE; ?>
            }else if(financialinstitutionselected =='Oriental Bank'){
                dimondceramiccostprice = <?php echo DIMOND_ORIENTAL_BANK_COST_PRICE; ?>
            }
            else if(financialinstitutionselected =='Banco Popular'){
                dimondceramiccostprice = <?php echo DIMOND_BANCO_POPULAR_COST_PRICE; ?>
            }else if(financialinstitutionselected == 'Cash'){
                dimondceramiccostprice = <?php echo DIMOND_CASH_COST_PRICE; ?>
            }else{
                dimondceramiccostprice = 0;
            }
           
        }
         //dimond ceramic
        
         //road assist
        var roadassistcostprice = 0 ;
        if(Number(roadassistance)>0){
            roadassistcostprice = <?php echo ROAD_ASSISTANCE_COST_PRICE; ?>
        }
        //alert(roadassistcostprice);
        //road assist


        var powerpackcostprice = 0;
        if(Number(powerpack)>0){
            powerpackcostprice = <?php echo POWER_PACK_COST_PRICE; ?>;
        }

        
        //payment protection plan
        var paymentprotectionplancostprice = 0;
        if(Number(paymentprotection)>0){
            if(paymentprotectiontype=='Plan 1'){
                paymentprotectionplancostprice = <?php echo PAYMENT_PROTECTION_PLAN_ONE_COST_PRICE; ?>
            }else if(paymentprotectiontype=='Plan 2'){
                paymentprotectionplancostprice = <?php echo PAYMENT_PROTECTION_PLAN_TWO_COST_PRICE; ?>
            }
        }
        //payment protection plan

        //gap
        var gapcostprice = 0;
        if(Number(gapamount)>0){
            if(gaptype== "<?php echo GAP_TYPE_SEVENTYTWO_0R_LESS ?>"){
                gapcostprice = <?php echo GAP_SEVENTYTWO_OR_LESS_COST_PRICE; ?>
            }else if(gaptype=="<?php echo GAP_TYPE_EIGHTYFOUR; ?>"){
                gapcostprice = <?php echo GAP_EIGHTYFOUR_COST_PRICE; ?>
            }else if(gaptype=="<?php echo GAP_TYPE_LEASING; ?>"){
                gapcostprice = <?php echo GAP_LEASING_COST_PRICE; ?>
            }
        }
        //gap

        var powertraincostprice = (powertrain>0)? (($('input[name="custom_fields[proposal][127]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][127]"]').val()).toFixed(2) : 0) : 0; 
        var servicecontractcostprice = (servicecontract) ? (($('input[name="custom_fields[proposal][128]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][128]"]').val()).toFixed(2) : 0) : 0;
        
        var vaptotalcostprice = 0 ;
        vaptotalcostprice = Number(dimondceramiccostprice) + Number(roadassistcostprice) + Number(powerpackcostprice) + Number(paymentprotectionplancostprice) + Number(gapcostprice) + Number(powertraincostprice) + Number(servicecontractcostprice) + Number(tablillascostamount) ;
        //alert("dimondceramiccostprice==="+dimondceramiccostprice+"==roadassistcostprice"+roadassistcostprice+'====powerpackcostprice==='+powerpackcostprice+'=====paymentprotectionplancostprice===='+paymentprotectionplancostprice+'===gapcostprice==='+gapcostprice+'===powertraincostprice==='+powertraincostprice+'====servicecontractcostprice==='+servicecontractcostprice+'===tablillascostamount==='+tablillascostamount);
        //alert(parseFloat(vaptotalcostprice)); 
        var vaptotalmargin = vaptotalsaleamount - vaptotalcostprice;

        //alert('Vaptotalsaleprice==='+vaptotalsaleamount+'===vaptotalcostprice=='+vaptotalcostprice+'===vasmargin==='+vaptotalmargin);      

        var tradeinallowance = ($('input[name="custom_fields[proposal][46]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][46]"]').val()).toFixed(2) : 0;
        var bankpayoff = ($('input[name="custom_fields[proposal][61]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][61]"]').val()).toFixed(2) : 0;
        var acvvalue = ($('input[name="custom_fields[proposal][126]"]').val()) ? parseFloat($('input[name="custom_fields[proposal][126]"]').val()).toFixed(2) : 0;
        
        var allowancediff = tradeinallowance - bankpayoff;
        
        var vinprice = 0;
        var vehiclemargin = 0 ;

        var vehiclepurchaseprice = <?php echo $vinpurchaseprice; ?>;
        $('.estimate-items-table').find('tbody').find('tr').each(function(index, tr){
            //console.log(index);

            if(index >0){			
                var td = $(this).find("td:eq(1)").text();
				if(userroleidj == <?php echo FI_ROLE_ID; ?>){
					var checkIfVin = $(this).find("td:eq(1)").text();
				}else{
					var checkIfVin = $(this).find("td:eq(1)").text();
				}
                var str2Check = '-vin-';	
                if(checkIfVin.indexOf(str2Check) != -1){
                    console.log('found');
                    vinprice = parseFloat($(this).find("td:eq(4)").find('input').val()).toFixed(2);
                    vehiclemargin = parseFloat(Number(vinprice) - Number(vehiclepurchaseprice)).toFixed(2);
                }else{
                    console.log('No');
                }		
            }			
        });
        
        //alert('====vehiclepurchaseprice=='+vehiclepurchaseprice+'===vinprice==='+vinprice+'===vehmargin==='+vehiclemargin)
        
        var balancetobefinanced = Number(vinprice) + Number(vaptotalsaleamount);
        if(allowancediff<0){
            balancetobefinanced = balancetobefinanced - (allowancediff);
        }
        var acvmargin = tradeinallowance - acvvalue;
        //alert(vinprice + '==='+ vaptotalsaleamount+ '==='+allowancediff+'==='+balancetobefinanced);
        var frontgrossvalue = Number(vehiclemargin) - Number(acvmargin);
        var frongrossvaluepercent = ((Number(vaptotalmargin) * 100)/Number(vinprice)).toFixed(2);
        //alert(vehiclemargin+'==='+tradeinallowance+'===='+acvvalue + '==='+acvmargin+"****"+frontgrossvalue+'&&&&&'+frongrossvaluepercent);
        var backgrossvalue = Number(vaptotalsaleamount) - Number(vaptotalcostprice);
        var backgrossvaluepercent = ((Number(backgrossvalue)*100)/Number(vaptotalsaleamount)).toFixed(2);
         //alert(backgrossvaluepercent);

        //alert('tradeinallowance=='+tradeinallowance+'===bankpayoff==='+bankpayoff+'===allowancediff=='+allowancediff);
        var totalgrossvalue = Number(frontgrossvalue) + Number(backgrossvalue);
        var totalgrossvaluepercent = ((Number(totalgrossvalue)*100)/Number(balancetobefinanced)).toFixed(2);
        //alert(totalgrossvaluemargin);




        $("#vin_value_price").text(vinprice);
        $("#vin_value_actual_price").text(vehiclepurchaseprice);
        $("#netprice_value_price").text(vinprice);
        $("#netprice_value_actual_price").text(vehiclepurchaseprice);
        
        
        $("#downpayment_value_price").text(downpayment);
        $("#tradeinallowance_value_price").text(tradeinallowance);
        $("#tradeinallowance_value_actual_price").text(acvvalue);
        $("#bankpayoff_value_price").text(bankpayoff);
        $("#nettrade_value_price").text(allowancediff);
        
        
        
        $("#backend_value_price").text(vaptotalsaleamount);
        $("#backend_value_actual_price").text(vaptotalcostprice);
        $("#balance_value_price").text(balancetobefinanced);
        
        
        $("#frontgross_value_price").text(frontgrossvalue.toFixed(2));
        $("#frontmargin_value_price").text(frongrossvaluepercent+'%');
        $("#backgross_value_price").text(backgrossvalue);
        $("#backmargin_value_price").text(backgrossvaluepercent+'%');
        $("#totalgross_value_price").text(totalgrossvalue);
        $("#totalmargin_value_price").text(totalgrossvaluepercent+'%');
        $("#totalmargin_value_price").text(totalgrossvaluepercent+'%');


        $('#deal_calculator_modal').modal("show");

    });



    /*$("body").on("click",".dealcalculatorbtn",function(){

        var vinprice = 0;
        var addons = 0;
        var discounts=0;
        var netprice = 0;

        var fees = 0;
        var rebate=0;
        var tradeinallowance = 0;
        
        if($('input[name="custom_fields[proposal][46]"]').val()>0){
            tradeinallowance = $('input[name="custom_fields[proposal][46]"]').val();
            $('#tradeinallowance_value_price').text(tradeinallowance);
        }
        var acv = 0;
        if($('input[name="custom_fields[proposal][126]"]').val()>0){
            acv = $('input[name="custom_fields[proposal][126]"]').val();
            $('#tradeinallowance_value_actual_price').text(acv);
        }

        var bankpayoff = 0;
        if($('input[name="custom_fields[proposal][61]"]').val()>0){
            bankpayoff = $('input[name="custom_fields[proposal][61]"]').val();
            $('#bankpayoff_value_price').text(bankpayoff);
        }
        var retainallow = 0;

        var nettrade = tradeinallowance - bankpayoff;
        $("#nettrade_value_price").text(nettrade);

        var backend=0;
        var salestax = 0;
        var balance = 0;

        var frontgross = 0;
        var backgross = 0;
        var totalgross = 0;
        var frontmargin = 0;
        var backmargin =0;
        var totalmargin =0;
        var vaptotal=0;
        var vapmargin = 0;
        var vehmargin = 0 ;

        $('.estimate-items-table').find('tbody').find('tr').each(function(index, tr){
            //console.log(index);

            if(index >0){			
                var td = $(this).find("td:eq(1)").text();
				//alert(td);
				if(userroleidj == <?php echo FI_ROLE_ID; ?>){
					//alert('fi');
					var checkIfVin = $(this).find("td:eq(1)").text();
				}else{
					var checkIfVin = $(this).find("td:eq(1)").text();
				}
				//alert(checkIfVin);
                console.log(checkIfVin);
                var str2Check = '-vin-';	
                if(checkIfVin.indexOf(str2Check) != -1){
                    console.log('found');
                    vinprice = parseFloat($(this).find("td:eq(4)").find('input').val());
					//alert(vinprice);
                    //vinprice = format(vinprice);
                    console.log(vinprice);
                    $("#vin_value_price").text(vinprice);
                    $("#vin_value_actual_price").text(<?php echo $vinpurchaseprice; ?>);
                    vehmargin = <?php echo $vinpurchaseprice; ?>;
                }else{
                    console.log('No');
                }		
            }			
        });
        $("#netprice_value_price").text(vinprice);
        $("#netprice_value_actual_price").text(<?php echo $vinpurchaseprice; ?>);
        

        if($('input[name="custom_fields[proposal][112]"]').val()>0){
            var pp = parseFloat($('input[name="custom_fields[proposal][112]"]').val());
            var ppb = 320;
            var ppp = 395;
            vaptotal = vaptotal + pp;
            
            if($('select[name="custom_fields[proposal][111]"]').val()=='Basic'){               
                vapmargin = vapmargin + ppb;
            }else if($('select[name="custom_fields[proposal][111]"]').val()=='Premium'){
                //alert(2);
                vapmargin = vapmargin + ppp;
            }
        }

        //paymentprotection
        if($('input[name="custom_fields[proposal][114]"]').val()>0){
            var ppv = parseFloat($('input[name="custom_fields[proposal][114]"]').val());
            var ppp1 = 334;
            var ppp2 = 334;
            vaptotal = vaptotal + ppv;
            
            if($('select[name="custom_fields[proposal][113]"]').val()=='Plan 1'){               
                vapmargin = vapmargin + ppp1;
            }else if($('select[name="custom_fields[proposal][113]"]').val()=='Plan 2'){
                
                vapmargin = vapmargin + ppp2;
            }
        }
        //paymentprotection


        //gap
        if($('input[name="custom_fields[proposal][85]"]').val()>0){
            var ppv = parseFloat($('input[name="custom_fields[proposal][85]"]').val());
            var seven = 399;
            var three = 349;
            var leasing = 549;
            vaptotal = vaptotal + ppv;
            
            if($('select[name="custom_fields[proposal][63]"]').val()=='GAP 3-6 Years (Premiere)'){               
                vapmargin = vapmargin + three;
            }else if($('select[name="custom_fields[proposal][63]"]').val()=='GAP 7 Years (Premiere)'){
                
                vapmargin = vapmargin + seven;
            }
            else if($('select[name="custom_fields[proposal][63]"]').val()=='Gap Leasing'){
                
                vapmargin = vapmargin + leasing;
            }
        }
        //gap

        //powertrain
        if($('input[name="custom_fields[proposal][65]"]').val()>0){
            var ppt = parseFloat($('input[name="custom_fields[proposal][65]"]').val());
            var pptcost = $('input[name="custom_fields[proposal][127]"]').val();
            if(pptcost==''){
                pptcost = 0;
            }else{
                pptcost = parseFloat(pptcost);
            }
            
            vaptotal = vaptotal + ppt;
            vapmargin = vapmargin + pptcost;            
        }
        //powertrain


        //road assistance
        if($('input[name="custom_fields[proposal][71]"]').val()>0){
            var rasp = parseFloat($('input[name="custom_fields[proposal][71]"]').val());
            var racp = 174;
            
            vaptotal = vaptotal + rasp;
            vapmargin = vapmargin + racp;            
        }
        //road assistance

        //service contract
        if($('input[name="custom_fields[proposal][86]"]').val()>0){
            var scsp = parseFloat($('input[name="custom_fields[proposal][86]"]').val());
            var sccp =  $('input[name="custom_fields[proposal][128]"]').val();
            if(sccp==''){
                sccp = 0;
            }else{
                sccp = parseFloat(sccp);
            }
            vaptotal = vaptotal + scsp;
            vapmargin = vapmargin + sccp;            
        }
        //service contract

        //costo tablillas
        if($('input[name="custom_fields[proposal][67]"]').val()>0){
            var cotsp = parseFloat($('input[name="custom_fields[proposal][67]"]').val());
            var cotcp = 0;
            
            vaptotal = vaptotal + cotsp;
            vapmargin = vapmargin + cotcp;            
        }
        //costo tablillas

         //dimond ceramic
         if($('input[name="custom_fields[proposal][71]"]').val()>0){
            var dcsp = parseFloat($('input[name="custom_fields[proposal][71]"]').val());
            var dccp = 205;
            
            vaptotal = vaptotal + dcsp;
            vapmargin = vapmargin + dccp;            
        }
        //dimond ceramic

        //alert(vinprice);
        var totalbalance = parseFloat(vinprice) + vaptotal;
        //alert(totalbalance);
        if(nettrade!='' && nettrade <0){
            totalbalance = totalbalance - (nettrade);
        } 

        $("#balance_value_price").text(totalbalance);

        
      


        //alert(parseFloat(vapmargin));
        $('#backend_value_price').text(parseFloat(vaptotal));
        $('#backend_value_actual_price').text(parseFloat(vapmargin));


        var vehmargins = parseFloat(vinprice) - parseFloat(vehmargin);
		
		var acvmargin = parseFloat(tradeinallowance) - parseFloat(acv);
        alert('acvmargin===='+acvmargin);
        if(acvmargin > vehmargins){
            var fmargin = parseFloat(acvmargin).toFixed(2) - parseFloat(vehmargins).toFixed(2) ;
        }else{
            var fmargin = parseFloat(vehmargins).toFixed(2)-parseFloat(acvmargin).toFixed(2) ;
            
        } 
		
       
		
        $('#frontgross_value_price').text(parseFloat(fmargin));
        
		//alert(vaptotal+'======'+vapmargin)
        var backgrossmargin = vaptotal - vapmargin;
        alert('backgrossmargin===='+backgrossmargin);
        $('#backgross_value_price').text(parseFloat(backgrossmargin));

        var tbackmargin = parseFloat(acvmargin) + parseFloat(backgrossmargin);
		alert(tbackmargin+'====='+fmargin+'========');
		var tgvp = parseFloat(fmargin) + parseFloat(backgrossmargin);
		//alert(tgvp);
		
        $('#totalgross_value_price').text(parseFloat(tgvp));

        var fronmargincalc = (parseFloat(tgvp) * 100 /parseFloat(vinprice)).toFixed(2);
        $("#frontmargin_value_price").text(fronmargincalc+'%');
        
        var backargincalc = (parseFloat(backgrossmargin) * 100 /parseFloat(vaptotal)).toFixed(2);
        $("#backmargin_value_price").text(backargincalc+'%');

        var ftotalmargin = (parseFloat(tgvp) * 100 /parseFloat(totalbalance)).toFixed(2);
        $("#totalmargin_value_price").text(ftotalmargin+'%');


        $('#deal_calculator_modal').modal("show");
    });
    */
     //DEAL CALCULATOR MODAL WINDOW
	
    <?php if (isset($proposal) && $proposal->rel_type === 'customer') { ?>
    init_proposal_project_select('select#project_id')
    <?php } ?>
    $('body').on('change', '#rel_type', function() {
        if (_rel_type.val() != 'customer') {
            _project_wrapper.addClass('hide')
        }
    });

    $('body').on('change', '#rel_id', function() {
        if (_rel_type.val() == 'customer') {
            console.log('working')
            var projectAjax = $('select#project_id');
            var clonedProjectsAjaxSearchSelect = projectAjax.html('').clone();
            projectAjax.selectpicker('destroy').remove();
            projectAjax = clonedProjectsAjaxSearchSelect;
            $('#project_ajax_search_wrapper').append(clonedProjectsAjaxSearchSelect);
            init_proposal_project_select(projectAjax);
            _project_wrapper.removeClass('hide')
        }
    });

    init_currency();
    // Maybe items ajax search
    init_ajax_search('items', '#item_select.ajax-search', undefined, admin_url + 'items/search');
    validate_proposal_form();
    $('body').on('change', '#rel_id', function() {
        if ($(this).val() != '') {
            $.get(admin_url + 'proposals/get_relation_data_values/' + $(this).val() + '/' + _rel_type
                .val(),
                function(response) {
                    $('input[name="proposal_to"]').val(response.to);
                    $('textarea[name="address"]').val(response.address);
                    $('input[name="email"]').val(response.email);
                    $('input[name="phone"]').val(response.phone);
                    $('input[name="city"]').val(response.city);
                    $('input[name="state"]').val(response.state);
                    $('input[name="zip"]').val(response.zip);
                    $('select[name="country"]').selectpicker('val', response.country);
                    var currency_selector = $('#currency');
                    if (_rel_type.val() == 'customer') {
                        if (typeof(currency_selector.attr('multi-currency')) == 'undefined') {
                            currency_selector.attr('disabled', true);
                        }

                    } else {
                        currency_selector.attr('disabled', false);
                    }
                    var proposal_to_wrapper = $('[app-field-wrapper="proposal_to"]');
                    if (response.is_using_company == false && !empty(response.company)) {
                        proposal_to_wrapper.find('#use_company_name').remove();
                        proposal_to_wrapper.find('#use_company_help').remove();
                        proposal_to_wrapper.append('<div id="use_company_help" class="hide">' +
                            response.company + '</div>');
                        proposal_to_wrapper.find('label')
                            .prepend(
                                "<a href=\"#\" id=\"use_company_name\" data-toggle=\"tooltip\" data-title=\"<?php echo _l('use_company_name_instead'); ?>\" onclick='document.getElementById(\"proposal_to\").value = document.getElementById(\"use_company_help\").innerHTML.trim(); this.remove();'><i class=\"fa fa-building-o\"></i></a> "
                            );
                    } else {
                        proposal_to_wrapper.find('label #use_company_name').remove();
                        proposal_to_wrapper.find('label #use_company_help').remove();
                    }
                    /* Check if customer default currency is passed */
                    if (response.currency) {
                        currency_selector.selectpicker('val', response.currency);
                    } else {
                        /* Revert back to base currency */
                        currency_selector.selectpicker('val', currency_selector.data('base'));
                    }
                    currency_selector.selectpicker('refresh');
                    currency_selector.change();
                }, 'json');
        }
    });
    $('.rel_id_label').html(_rel_type.find('option:selected').text());
    _rel_type.on('change', function() {
        var clonedSelect = _rel_id.html('').clone();
        _rel_id.selectpicker('destroy').remove();
        _rel_id = clonedSelect;
        $('#rel_id_select').append(clonedSelect);
        proposal_rel_id_select();
        if ($(this).val() != '') {
            _rel_id_wrapper.removeClass('hide');
        } else {
            _rel_id_wrapper.addClass('hide');
        }
        $('.rel_id_label').html(_rel_type.find('option:selected').text());
    });
    proposal_rel_id_select();
    <?php if (!isset($proposal) && $rel_id != '') { ?>
    _rel_id.change();
    <?php } ?>
	
	
	
	
	
	
	
	
});

//ableit
$(document).ready(function(){

      //VAS total
      var VasTotal = "<?php echo $vas_total; ?>";
      //$("span#vaptotal").text(VasTotal);
       //VAS total
       // alert("VIEW"+VasTotal);
    

    var reltype =  "<?php echo $rel_type; ?>";
	if(reltype == 'lead'){
		
		//$('select[name="rel_type"]').attr('disabled',true);
		//$('select[name="rel_id"]').attr('disabled',true);
	   
		//$('select[name="rel_type"],select[name="rel_id"]').selectpicker('refresh');
	}

    $('input[name="custom_fields[proposal][105]').attr('readonly',true);
	
		$('input[name="custom_fields[proposal][45]"]').blur(function(){
		  //emi_calculator();
	   });
	   
	   $('input[name="custom_fields[proposal][44]"]').blur(function(){
		  //emi_calculator();
	   });
	   
	   $('input[name="custom_fields[proposal][46]"]').blur(function(){
		  //emi_calculator();
	   });
	   
	   $('input[name="custom_fields[proposal][42]"]').blur(function(){
         var val = $(this).val();
         $('input[name="custom_fields[proposal][103]"]').val(val-1);
		  //emi_calculator();
	   });
	   
	    $('input[name="custom_fields[proposal][40]"]').blur(function(){
		  //emi_calculator();
	   });
	   
	   $("input[name='custom_fields[proposal][102]']").blur(function(){
        var selectedDate = new Date($("input[name='custom_fields[proposal][102]']").val());
        $("input[name='custom_fields[proposal][105]']").val('');
        var rDate = new Date(selectedDate);
        rDate.setMonth(selectedDate.getMonth() + 1);
        console.log(rDate);
        
        $("input[name='custom_fields[proposal][105]']").datepicker({
            dateFormat: 'mm/dd/yy'
        }).datepicker('setDate', rDate)



       })
	   
	    $("body").on("click",".additemtotable, .deleteitmtbl",function(){

		   $('input[name="fields[proposal][44]"]').val('');
		    setTimeout(function () {
		
				var tvalue = parseInt($(".total").find('input').val()) || 0;
				var dp = parseInt($('input[name="custom_fields[proposal][45]"]').val()) || 0;
				var ti = parseInt($('input[name="custom_fields[proposal][46]"]').val()) || 0;
				var ta = tvalue + dp + ti;
								
				$('input[name="custom_fields[proposal][44]"]').val(ta);
				
            }, 1000);	
		  
	   });
	   
	   
	   
	   /*$('input[name="custom_fields[proposal][45]"]').blur(function(){
		   var val = $(this).val();
		   if(val!=''){
			   $('textarea[name="description"]').val('Downpayment');
			    $('textarea[name="long_description"]').val('Downpayment');
			    $('input[name="rate"]').val('-'+val);				
				setTimeout(function () {
					$('textarea[name="description"]').closest('tr').find('button').click();
					$('.additemtotable').click();					
				}, 300);				
		   }else{
				var tvalue = $(".total").find('input').val();			   
		   }		   
	   });*/
	   
	   $('input[name="custom_fields[proposal][45]"]').blur(function(){
		   var val = $(this).val();
		  // alert(val);
		   if(val!=''){
			   
			   $('textarea[name="description"]').val('Downpayment');
			    $('textarea[name="long_description"]').val('Downpayment');
			    $('input[name="rate"]').val('-'+val);	
				var bal = $('input[name="custom_fields[proposal][44]"]').val();
				var acbal = $('input[name="selvehicleprice"]').val();
				var bankpayoff = $('input[name="custom_fields[proposal][61]"]').val();
				//alert(bal+"######"+acbal+"######"+bankpayoff);
				if(bankpayoff>0){
					$('input[name="custom_fields[proposal][44]"]').val(bal-val);
				}else{
					$('input[name="custom_fields[proposal][44]"]').val(acbal-val);
				}
				
				
				$('.estimate-items-table').find('tbody').find('tr').each(function(index, tr){
				if(index >0){			
					var td = $(this).find("td:eq(1)").text();
						if(td=='Downpayment'){
							$(this).find('td:eq(7)').find('a').click();						
							//$('input[name="custom_fields[proposal][45]"]').click().blur();	
						}				
					}			
				});
				setTimeout(function () {
					$('textarea[name="description"]').closest('tr').find('button').click();
					$('.additemtotable').click();					
				}, 300);				
		   }else{
				var tvalue = $(".total").find('input').val();			   
		   }		   
	   });
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   $('input[name="custom_fields[proposal][46]"]').blur(function(){
		   var val = $(this).val();
		   if(val!=''){
			   $('textarea[name="description"]').val('Tradein');
			    $('textarea[name="long_description"]').val('Tradein');
			    $('input[name="rate"]').val('-'+val);				
				setTimeout(function () {	
					$('textarea[name="description"]').closest('tr').find('button').click();
					$('.additemtotable').click();					
				}, 300);				
		   }else{
				var tvalue = $(".total").find('input').val();			   
		   }
		   
	   });

     
	
	
});
//ableit

function init_proposal_project_select(selector) {
    init_ajax_search('project', selector, {
        customer_id: function() {
            return $('#rel_id').val();
        }
    })
}

function proposal_rel_id_select() {
    var serverData = {};
    serverData.rel_id = _rel_id.val();
    data.type = _rel_type.val();
    init_ajax_search(_rel_type.val(), _rel_id, serverData);
}

function validate_proposal_form() {
    appValidateForm($('#proposal-form'), {
        subject: 'required',
        proposal_to: 'required',
        rel_type: 'required',
        rel_id: 'required',
        date: 'required',
        email: {
            email: true,
            required: true
        },
        currency: 'required',
    });
}

//ableit 
/*function emi_calculator(){
	   //balance
	   var vcost = $('input[name="custom_fields[proposal][44]"]').val();
	   //down payment
	   var soon = $('input[name="custom_fields[proposal][45]"]').val();
	   var tradein = $('input[name="custom_fields[proposal][46]"]').val();
	   var t = $('input[name="custom_fields[proposal][42]"]').val();
	   var r = $('input[name="custom_fields[proposal][40]"]').val();
	   if(soon!='' && t!='' && r!=''){
		    //alert(9);
		    var p;
			if(vcost!=''){
				p = vcost - soon;
			}else{
				p = soon;
			}
			if(tradein !=''){
				p = p-tradein;
			}
			var emi;
			//alert(2);
			var r = r / (12 * 100);
			//var t = t * 12;
			
			emi = (p * r * Math.pow(1 + r, t)) / (Math.pow(1 + r, t) - 1);
			emi = Math.round(emi);
			//$('input[name="custom_fields[proposal][43]"]').val(emi);
		}
		
	}*/

//ableit 
</script>
</body>

</html>
