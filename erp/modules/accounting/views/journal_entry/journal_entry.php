<?php init_head();?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="panel_s">
        <div class="panel-body">
          <?php $arrAtt = array();
                $arrAtt['data-type']='currency';
                ?>
          <?php echo form_open_multipart($this->uri->uri_string(),array('id'=>'journal-entry-form','autocomplete'=>'off')); ?>
          <h4 class="no-margin font-bold"><?php echo _l($title); ?></h4>
          <hr />
          <div class="row">
            <div class="col-md-6">
              <?php $value = (isset($journal_entry) ? _d($journal_entry->journal_date) : _d(date('Y-m-d'))); ?>
              <?php echo render_date_input('journal_date','journal_date',$value); ?>
            </div>
            <div class="col-md-6">
              <?php $value = (isset($journal_entry) ? $journal_entry->number : $next_number); ?>
              <?php echo render_input('number','number',$value,'number'); ?>
            </div>

            <div class="col-md-2">
              <?php $selected = (isset($journal_entry) ? $journal_entry->ableit_control_type : ''); ?>
              <?php echo render_select('ableit_control_type', $controltypes, ['id', 'name'], 'Control', $selected); ?>

            



            </div>

            <?php
              $repdiv='hidealljr-r';
              $customernamediv='hidealljr-r';
              $vindiv ='hidealljr-r';
              $othertypediv='hidealljr-r';
              if($journal_entry->ableit_control_type=='Vendedores'){
                  $repdiv = '';
              }
              if($journal_entry->ableit_control_type=='VIN de Carro'){
                  $vindiv = '';
              }
              if($journal_entry->ableit_control_type=='Customer Number'){
                  $customernamediv = '';
              }
              if($journal_entry->ableit_control_type=='Vendor Type'){
                  $othertypediv = '';
              }if($journal_entry->ableit_control_type=='Open Entry'){
                  $othertypediv = '';
              }

            ?>

            <!--<div class="col-md-3 hidealljr">
            <?php $value = (isset($journal_entry) ? $journal_entry->ableit_quote_id : 0); ?>
            <label for="ableit_quote_id"><?php echo _l('Select Quote'); ?></label>
              <select name="ableit_quote_id" id="ableit_quote_id"  class="selectpicker"  data-live-search="true" data-width="100%" >
                <option value=""></option>
                  <?php /*foreach($proposal_ids as $s) { 
                  $selected = '';
                  ($s['id']==$value)?$selected="selected" : '';  
                  ?>
                  <option <?php echo $selected; ?> value="<?php echo $s['id']; ?>"><?php echo format_proposal_number($s['id']).' ('.$s['proposal_to'].')'?></option>
                    <?php } */?>
              </select>
            </div>-->

            <div class="col-md-3 <?php echo $customernamediv; ?>" id="CustomerNumber">
              <?php $value = (isset($journal_entry) ? $journal_entry->ableit_lead_id : 0); ?>
              <?php // echo render_input('ableit_lead_id','Lead ID',$value,'number'); ?>

              <label for="ableit_lead_id"><?php echo _l('Customer'); ?></label>
              <select name="ableit_lead_id" id="ableit_lead_id" class="selectpicker"  data-live-search="true" data-width="100%"  >
                <option value=""></option>
                  <?php foreach($proposal_ids as $s) { 
                     $selected = '';
                     ($s['rel_id']==$value)?$selected="selected" : '';  
                    ?>
                  <option  <?php echo $selected; ?> value="<?php echo $s['rel_id']; ?>"><?php echo 'ID# '.$s['rel_id'].' ('.$s['proposal_to'].')'?></option>
                    <?php } ?>
              </select>  
            </div>



            <div class="col-md-3 <?php echo $repdiv; ?> SalesRep" id="Vendedores">
              <?php $value = (isset($journal_entry) ? $journal_entry->ableit_sales_rep_id : 0); ?>
              <?php // echo render_input('ableit_lead_id','Lead ID',$value,'number'); ?>

              <label for="ableit_sales_rep_id"><?php echo _l('Sales Rep'); ?></label>
              <select name="ableit_sales_rep_id" id="ableit_sales_rep_id" class="selectpicker"  data-live-search="true" data-width="100%">
                <option value=""></option>
                  <?php foreach($proposas_sales_reps as $s) { 
                     $selected = '';
                     ($s['assigned']==$value)?$selected="selected" : '';  
                    ?>
                  <option  <?php echo $selected; ?> value="<?php echo $s['assigned']; ?>"><?php echo $s['optionstring'];?></option>
                    <?php } ?>
              </select>  
            </div>


            
            <div class="col-md-2 <?php echo $vindiv; ?> Stock" id="VINdeCarro">
              <?php $value = (isset($journal_entry) ? $journal_entry->ableit_inv_id : 0); ?>
              <?php // echo render_input('ableit_lead_id','Lead ID',$value,'number'); ?>

              <label for="ableit_inv_id"><?php echo _l('VIN'); ?></label>
              <select name="ableit_inv_id" id="ableit_inv_id" class="selectpicker"  data-live-search="true" data-width="100%">
                <option value=""></option>
                  <?php foreach($proposas_stocks as $s) { 
                     $selected = '';
                     ($s['inv_id'].'#'.$s['vin']==$value)?$selected="selected" : '';  
                    ?>
                  <option  <?php echo $selected; ?> value="<?php echo $s['inv_id'].'#'.$s['vin']; ?>"><?php echo $s['vin'];?></option>
                    <?php } ?>
              </select>  
            </div>

            <div class="col-md-2 <?php echo $othertypediv; ?> inputforvtoe" id="inputforvtoe">
              <?php $value = (isset($journal_entry) ? $journal_entry->ableit_control_number : 0); ?>
              <?php // echo render_input('ableit_lead_id','Lead ID',$value,'number'); ?>

              <label for="ableit_control_number"><?php echo _l('Type'); ?></label>
              <input autocomplete="off" name="ableit_type" type="text" placeholder="Type" class="form-control" value="<?php echo $value; ?>"/> 
            </div>





          </div>
          <div id="journal_entry_container"></div>
          <div class="col-md-8 col-md-offset-4">
         <table class="table text-right">
            <tbody>
                <tr>
                  <td></td>
                  <td class="text-right bold"><?php echo _l('debit'); ?></td>
                  <td class="text-right bold"><?php echo _l('credit'); ?></td>
                </tr>
               <tr>
                  <td><span class="bold"><?php echo _l('invoice_total'); ?> :</span>
                  </td>
                  <td class="total_debit">
                    <?php $value = (isset($journal_entry) ? $journal_entry->amount : 0); ?>
                    <?php echo app_format_money($value, $currency->name); ?>
                  </td>
                  <td class="total_credit">
                    <?php $value = (isset($journal_entry) ? $journal_entry->amount : 0); ?>
                    <?php echo app_format_money($value, $currency->name); ?>
                  </td>
               </tr>
            </tbody>
         </table>
        </div>
          <?php echo form_hidden('journal_entry'); ?>
          <?php echo form_hidden('amount'); ?>
          <div class="row">
            <div class="col-md-12">
              <p class="bold"><?php echo _l('dt_expense_description'); ?></p>
              <?php $value = (isset($journal_entry) ? $journal_entry->description : ''); ?>
              <?php echo render_textarea('description','',$value,array(),array(),'','tinymce'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">    
              <div class="modal-footer">
                <button type="button" class="btn btn-info journal-entry-form-submiter"><?php echo _l('submit'); ?></button>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php init_tail(); ?>
</body>
</html>
<?php require 'modules/accounting/assets/js/journal_entry/journal_entry_js.php';?>