<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); 
$userrole = get_staff_role_id_value();
$hidecoa = '';
if($userrole==3){
    $hidecoa = 'style="display:none;"';
}
?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <?php
            echo form_open($this->uri->uri_string(), ['id' => 'estimate-form', 'class' => '_transaction_form estimate-form']);
            if (isset($estimate)) {
                echo form_hidden('isedit');
            }
            ?>
            <div class="col-md-12">
                <h4
                    class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        <?php echo isset($estimate) ? format_estimate_number($estimate) : _l('create_new_estimate'); ?>
                    </span>
                    <?php echo isset($estimate) ? format_estimate_status($estimate->status) : ''; ?>
                </h4>
                <?php $this->load->view('admin/estimates/estimate_template'); ?>
            </div>
            <?php echo form_close(); ?>
            <?php $this->load->view('admin/invoice_items/item'); ?>
        </div>
    </div>
</div>
</div>
<?php init_tail(); ?>
<?php $this->load->view('admin/estimates/ableit_estimate_js.php'); ?>

<div class="modal fade jr_modal" id="jr_modal" tabindex="-1" role="dialog" aria-labelledby="Journal Entries">
  <div class="modal-dialog modal-xxl">
    <div class="modal-content data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Manual Journal Entries
                </h4>
            </div>
           
            <div style="padding: 10px;">
            <div class="container-fluid">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-info">
 
                    <div class="panel-heading text-center">
                   
                        <h1 class="panel-title">Add Journal Entries</h1>
                        
                    </div>
                     <p class="text-center">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:orange;"></i>
                        <?php 
                        if($estimate->invoiceid ==''){                            
                        ?>
                        Only 10 Journal Entries allowed, The following journal entries will be posted to accounting after the invoice is generated.
                        <?php }else{ ?>
                            All Journal Entries posted to Accounting
                       <?php } ?>     
                    </p>
                    <div class="panel-body">
                        <form  method="post" action="<?php echo admin_url()?>estimates/ableitjnlpostings" id="jnlpostingform" class="jnlpostingform" enctype="multipart/form-data">
                            <input type="hidden" name="able_lead_id" value="<?php echo $estimate->clientid; ?>"/>
                            <input type="hidden" name="able_quote_id" value="<?php echo (isset($jnlsdetails['jnlproposal'][0]['id']) && $jnlsdetails['jnlproposal'][0]['id']!='') ? $jnlsdetails['jnlproposal'][0]['id'] : 0; ?>"/>
                            <input type="hidden" name="able_estimate_id" value="<?php echo $estimate->id; ?>"/>
                            <div class="list_wrapper">  

                            <?php 
                                if(is_array($jnlentries) && count($jnlentries)>0){
                                    $i=0;
                                    
                                    foreach($jnlentries as $je){
                                        $repdiv='hidecontrolelements';
                                        $customernamediv='hidecontrolelements';
                                        $vindiv ='hidecontrolelements';
                                        $othertypediv='hidecontrolelements';
                                        if($je['control_type']=='Vendedores'){
                                            $repdiv = '';
                                        }
                                        if($je['control_type']=='VIN de Carro'){
                                            $vindiv = '';
                                        }
                                        if($je['control_type']=='Customer Number'){
                                            $customernamediv = '';
                                        }
                                        if($je['control_type']=='Vendor Type'){
                                            $othertypediv = '';
                                        }if($je['control_type']=='Open Entry'){
                                            $othertypediv = '';
                                        }

                                        


                            ?>


                                <div class="row"> 
                                    <div class="col-xs-12 col-sm-6 col-md-2"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                $selected = $je['control_type'];
                                                if($i==0){
                                                    echo render_select('control_types[]',$controltypes,array('id','name',),'Control',$selected);
                                                }else{
                                                    echo render_select('control_types[]',$controltypes,array('id','name',),'',$selected);
                                                }
                                                
                                            ?>
                                        </div>
                                    </div> 

                                    <!-- -->
                                     
                                   

                                    <div class="col-xs-12 col-sm-6 col-md-2 <?php echo $repdiv; ?>" id="Vendedores"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                if(is_array($jnlsdetails['jnlstaff']) && count($jnlsdetails['jnlstaff'])>0){
                                                   $selected = $je['attr_sales_rep_id'];
                                                   if($i==0){
                                                    echo render_select('vendedores[]',$jnlsdetails['jnlstaff'],array('staffid','firstname'), 'Control Number', $selected);
                                                   }else{
                                                    echo render_select('vendedores[]',$jnlsdetails['jnlstaff'],array('staffid','firstname'), '', $selected);
                                                   }
                                                    
                                                }else{
                                                    
                                                    echo render_select('vendedores[]',array(),array(),'Vendedores');
                                                }
                                                
                                            ?>
                                        </div>
                                    </div> 
                                   
                                                

                                    <div class="col-xs-12 col-sm-6 col-md-2 <?php echo $vindiv; ?>" id="VINdeCarro"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                if(is_array($jnlsdetails['jnlvin']) && count($jnlsdetails['jnlvin'])>0){
                                                   $selected = $je['attr_vin'];
                                                   if($i==0){
                                                    echo render_select('vindecarro[]',$jnlsdetails['jnlvin'],array('vin','vin'), 'Control Number', $selected);
                                                   }else{
                                                    echo render_select('vindecarro[]',$jnlsdetails['jnlvin'],array('vin','vin'), '', $selected);
                                                   }
                                                   
                                                }else{
                                                    
                                                    echo render_select('vindecarro[]',array(),array(),'VIN de Carro');
                                                }
                                                
                                            ?>
                                        </div>
                                    </div>

                                    


                                   
                                    <div class="col-xs-12 col-sm-6 col-md-2 <?php echo $customernamediv; ?>" id="CustomerNumber"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                if(is_array($jnlsdetails['jnllead']) && count($jnlsdetails['jnllead'])>0){
                                                   $selected = $je['attr_cust_lead_id'];
                                                   if($i==0){
                                                    echo render_select('customernumber[]',$jnlsdetails['jnllead'],array('id','name','phonenumber'), 'Control Number', $selected);
                                                   }else{
                                                    echo render_select('customernumber[]',$jnlsdetails['jnllead'],array('id','name','phonenumber'), '', $selected);
                                                   }
                                                    
                                                }else{
                                                    
                                                    echo render_select('customernumber[]',array(),array(),'Customer Number');
                                                }                                                
                                            ?>
                                        </div>
                                    </div>
                                    


                                     
                                    <div class="col-xs-12 col-sm-6 col-md-2 <?php echo $othertypediv; ?>" id="inputforvtoe">
                                        <div class="form-group">
                                            <?php 
                                            if($i==0){echo 'Control Number';}
                                            ?>
                                            <input autocomplete="off" name="type[]" type="text" placeholder="Type" class="form-control" value="<?php echo $je['attr_control_number'] ?>"/>
                                        </div>
                                    </div>  
                                           
                                   
                                    <div class="col-xs-12 col-sm-6 col-md-2"> 
                                        <div class="form-group">
                                        <?php 
                                            if($i==0){echo 'Description';}
                                            ?>
                                            <input name="description[]" type="text" placeholder="Type Item Name" class="form-control" value="<?php echo $je['attr_description'] ?>"/>                                            
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-6 col-md-1"> 
                                        <div class="form-group">
                                        <?php 
                                            if($i==0){echo 'Amount';}
                                            ?>
                                            <input name="amount[]" type="number" placeholder="Amount" class="form-control" value="<?php echo $je['attr_amount'] ?>"/>                                            
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-6 col-md-2" <?php echo $hidecoa?>> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                $selected = $je['attr_credit_coa'];
                                                if($i==0){
                                                    echo render_select('credit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'Credit COA', $selected);                                        
                                                }else{
                                                    echo render_select('credit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'', $selected);                                        
                                                }
                                                
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-2" <?php echo $hidecoa?>> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                $selected = $je['attr_debit_coa'];
                                                if($i==0){
                                                echo render_select('debit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'Debit COA',$selected);                                        
                                                }else{
                                                    echo render_select('debit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'',$selected);
                                                }    
                                            ?>
                                        </div>
                                    </div>
                                    <?php 
                                    if($i==0){
                                    ?>
                                    <div class="col-xs-12 col-sm-1 col-md-1">
                                        <br>
                                       <button class="btn btn-primary col-xs-12 col-md-5 list_add_button" type="button">+</button>
                                    </div>
                                    <?php }else{ ?>

                                        <div class="col-xs-12 col-sm-1 col-md-1">
                                        <a href="javascript:void(0);" class="btn btn-primary col-xs-12 col-md-5 list_remove_button btn btn-danger">-</a>
                                        </div>
                                  <?php   } ?>   
                                    
                                    
                                </div>

                               <?php
                               $i++;

                                            }              




                                }else{
                                ?>            

<div class="row"> 
                                    <div class="col-xs-12 col-sm-6 col-md-2"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                echo render_select('control_types[]',$controltypes,array('id','name',),'Control');
                                            ?>
                                        </div>
                                    </div> 

                                    <!-- -->

                                    <div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="Vendedores"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                if(is_array($jnlsdetails['jnlstaff']) && count($jnlsdetails['jnlstaff'])>0){
                                                   $selected = $jnlsdetails['jnlstaff'][0]['staffid'];
                                                    echo render_select('vendedores[]',$jnlsdetails['jnlstaff'],array('staffid','firstname'), 'Control Number', $selected);
                                                }else{
                                                    
                                                    echo render_select('vendedores[]',array(),array(),'Vendedores');
                                                }
                                                
                                            ?>
                                        </div>
                                    </div> 

                                    <div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="VINdeCarro"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                if(is_array($jnlsdetails['jnlvin']) && count($jnlsdetails['jnlvin'])>0){
                                                   $selected = $jnlsdetails['jnlvin'][0]['vin'];
                                                    echo render_select('vindecarro[]',$jnlsdetails['jnlvin'],array('vin','vin'), 'Control Number', $selected);
                                                }else{
                                                    
                                                    echo render_select('vindecarro[]',array(),array(),'VIN de Carro');
                                                }
                                                
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="CustomerNumber"> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                if(is_array($jnlsdetails['jnllead']) && count($jnlsdetails['jnllead'])>0){
                                                   $selected = $jnlsdetails['jnllead'][0]['id'];
                                                    echo render_select('customernumber[]',$jnlsdetails['jnllead'],array('id','name','phonenumber'), 'Control Number', $selected);
                                                }else{
                                                    
                                                    echo render_select('customernumber[]',array(),array(),'Customer Number');
                                                }                                                
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="inputforvtoe">
                                        <div class="form-group">
                                            Control Number
                                            <input autocomplete="off" name="type[]" type="text" placeholder="Type" class="form-control"/>
                                        </div>
                                    </div>              
                                   
                                    <div class="col-xs-12 col-sm-6 col-md-2"> 
                                        <div class="form-group">
                                            Description
                                            <input name="description[]" type="text" placeholder="Type Item Name" class="form-control"/>                                            
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-6 col-md-1"> 
                                        <div class="form-group">
                                            Amount
                                            <input name="amount[]" type="number" placeholder="Amount" class="form-control"/>                                            
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-6 col-md-2" <?php echo $hidecoa?>> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                echo render_select('credit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'Credit COA');                                        
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-2" <?php echo $hidecoa?>> 
                                        <div class="form-group">
                                            <?php 
                                                $attr = array();
                                                echo render_select('debit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'Debit COA');                                        
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-1 col-md-1">
                                        <br>
                                       <button class="btn btn-primary col-xs-12 col-md-5 list_add_button" type="button">+</button>
                                    </div>
                                </div>

                               <?php } ?>     
                            </div>
							
							</br>
                            </br>
                            </br>
							<?php 
                            if($estimate->invoiceid ==''){                   
                            ?>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
                                <div class="col-xs-12 col-sm-4 col-md-4">

                                <input type="button" value="Submit" class="btn btn-info btn-block jnlsubmitbtn">
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>
                           

                            </div>
							<?php } ?>
                            <!--<input type="button" value="Submit" class="btn btn-info btn-block jnlsubmitbtn">-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
            

            
    </div>
  </div>
</div>


<!-- Deal Calculator Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="dealcalculatormodal">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content data dclmodalbody">
            <div class="modal-header">


                <div class="row">
                    <h4 class="modal-title col-sm-6 col-md-6 col-xs-12">Deal Calculator</h4>
                    <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body" id="dealcalculatormodal_body">
                <p>Please wait...</p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Deal Calculator Modal -->


<script>
$(function() {
    validate_estimate_form();
    // Init accountacy currency symbol
    init_currency();
    // Project ajax search
    init_ajax_project_search_by_customer_id();
    // Maybe items ajax search
    init_ajax_search('items', '#item_select.ajax-search', undefined, admin_url + 'items/search');
});
</script>


<script>

$(document).ready(function(){
    $("body").on("click",".jrbutton",function(){


        $('#jr_modal').modal("show");
    });


    var jnlcount = '<?php echo count($jnlentries);?>';
    var x = 0; //Initial field counter
    if(jnlcount>0){
        x= jnlcount;
    }
    //alert(jnlcount);
    
	var list_maxField = 10; //Input fields increment limitation
   
	
        //Once add button is clicked
	$('.list_add_button').click(function()
	    {
	    //Check maximum number of input fields
	    if(x < list_maxField){ 
	        x++; //Increment field counter
	       // var list_fieldHTML = '<div class="row"><div class="col-xs-2 col-sm-2 col-md-2">                                         <div class="form-group">                                            Type                                            <input name="list[0][]" type="text" placeholder="Type Item Name" class="form-control"/>                                                                                    </div>                                    </div>                                     <div class="col-xs-2 col-sm-2 col-md-2">                                        <div class="form-group">                                            Control Type                                            <input autocomplete="off" name="list[0][]" type="text" placeholder="Type Item Quantity" class="form-control"/>                                        </div>                                    </div>                                     <div class="col-xs-2 col-sm-2 col-md-2">                                         <div class="form-group">                                            Description                                            <input name="list[0][]" type="text" placeholder="Type Item Name" class="form-control"/>                                                                                    </div>                                    </div>                                                                        <div class="col-xs-1 col-sm-1 col-md-1">                                         <div class="form-group">                                           Amount                                            <input name="list[0][]" type="text" placeholder="Type Item Name" class="form-control"/>                                                                                    </div>                                    </div>                                                                         <div class="col-xs-2 col-sm-2 col-md-2">                                         <div class="form-group">                                            Credit COA                                            <input name="list[0][]" type="text" placeholder="Type Item Name" class="form-control"/>                                                                                    </div>                                    </div>                                                                         <div class="col-xs-2 col-sm-2 col-md-2">                                         <div class="form-group">                                            Debit COA                                            <input name="list[0][]" type="text" placeholder="Type Item Name" class="form-control"/>                                                                                    </div>                                    </div>                                      <div class="col-xs-1 col-sm-7 col-md-1"> <br><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div>                                </div>'; //New input field html 
	       var list_fieldHTML='';
           list_fieldHTML='<div class="row">';
           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2">';
           list_fieldHTML+='<div class="form-group">'; 
           list_fieldHTML+= '<?php 
                $attr = array();
                echo render_select('control_types[]',$controltypes,array('id','name',),'');
            ?>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';

          //hiddent items
          list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="Vendedores">';
           list_fieldHTML+='<div class="form-group">'; 
           list_fieldHTML+= '<?php 
               $attr = array();
               if(is_array($jnlsdetails['jnlstaff']) && count($jnlsdetails['jnlstaff'])>0){
                  $selected = $jnlsdetails['jnlstaff'][0]['staffid'];
                   echo render_select('vendedores[]',$jnlsdetails['jnlstaff'],array('staffid','full_name'), '', $selected);
               }else{                   
                   echo render_select('vendedores[]',array(),array(),'Vendedores');
               }
            ?>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';


           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="VINdeCarro">';
           list_fieldHTML+='<div class="form-group">'; 
           list_fieldHTML+= '<?php 
                $attr = array();
                if(is_array($jnlsdetails['jnlvin']) && count($jnlsdetails['jnlvin'])>0){
                   $selected = $jnlsdetails['jnlvin'][0]['vin'];
                    echo render_select('vindecarro[]',$jnlsdetails['jnlvin'],array('vin','vin'), '', $selected);
                }else{
                    
                    echo render_select('vindecarro[]',array(),array(),'');
                }
            ?>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';

           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="CustomerNumber">';
           list_fieldHTML+='<div class="form-group">'; 
           list_fieldHTML+= '<?php 
                $attr = array();
                if(is_array($jnlsdetails['jnllead']) && count($jnlsdetails['jnllead'])>0){
                   $selected = $jnlsdetails['jnllead'][0]['id'];
                    echo render_select('customernumber[]',$jnlsdetails['jnllead'],array('id','name','phonenumber'), '', $selected);
                }else{
                    
                    echo render_select('customernumber[]',array(),array(),'');
                }
            ?>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';




          //hidden items



           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2 hidecontrolelements" id="inputforvtoe">';
           list_fieldHTML+='<div class="form-group">  <input autocomplete="off" name="type[]" type="text" placeholder="Types" class="form-control" />';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2">';
           list_fieldHTML+='<div class="form-group">  <input name="description[]" type="text" placeholder="Description" class="form-control" />';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-1">';
           list_fieldHTML+='<div class="form-group">  <input name="amount[]" type="number" placeholder="Amount" class="form-control" />';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2" <?php echo $hidecoa?>>';
           list_fieldHTML+='<div class="form-group">'; 
           list_fieldHTML+= '<?php 
                $attr = array();
                echo render_select('credit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),'');
            ?>';
           
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='<div class="col-xs-12 col-sm-6 col-md-2" <?php echo $hidecoa?>>';
           list_fieldHTML+='<div class="form-group">';
           list_fieldHTML+= '<?php 
                $attr = array();
                echo render_select('debit_gl_account[]',$able_coa_list,array('id','name','account_type_name'),''); 
            ?>';            
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='<div class="col-xs-12  col-sm-7 col-md-1">';
           //slist_fieldHTML+='<br>';
           list_fieldHTML+='<a href="javascript:void(0);" class="col-xs-12 col-md-5 list_remove_button btn btn-danger">-</a>';
           list_fieldHTML+='</div>';
           list_fieldHTML+='</div>'; 
           
           $('.list_wrapper').append(list_fieldHTML); //Add field html
           $('.selectpicker').selectpicker('refresh');
	    }else{
            alert_float("danger", 'Only 10 Journal Entries allowed');
        }

        });
    
        //Once remove button is clicked
        $('.list_wrapper').on('click', '.list_remove_button', function()
        {
           $(this).closest('div.row').remove(); //Remove field html
           x--; //Decrement field counter
        });


        
})

</script>
<style>
.bootstrap-select .dropdown-menu li.active small{
    color: black !important;
}
.hidecontrolelements{display: none;}
</style>
</body>

</html>
