<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$dcjournalentries = $acdata['dcjournalentries'];
$acvjournalentries = $acdata['dcacv'];
$vehexpenses = $acdata['dcexpenses'];

?>

<div class="row" id="dealcalPrint">
    <div class="col-md-12 col-sm-12">
        <div class="front-margin">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="dscardsparent">
                        <div class="row">
                            <h4 class="col-sm-12 text-center panelheader">
                                Front
                            </h4>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <p>Cost</p>
                                    <h1 class="cost">$<?php echo number_format($front_cost_price,2) ?></h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <p>Sales Price</p>
                                    <h1 class="price">$<?php echo number_format($front_sale_price,2) ?></h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <p>Profit</p>
                                    <h1 class="profit">$<?php echo number_format($front_profit,2) ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="dscardsparent back">
                        <div class="row front-margin">
                            <h4 class="col-sm-12 text-center panelheader">
                                Back
                            </h4>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <p>Cost</p>
                                    <h1 class="cost">$<?php echo number_format($back_cost_price,2) ?></h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <p>Sales Price</p>
                                    <h1 class="price">$<?php echo number_format($back_sale_price,2) ?></h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="panel">
                                    <p>Profit</p>
                                    <h1 class="profit">$<?php echo number_format($back_profit,2) ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-6 col-sm-12">
        <div class="panel dealcalcard">
            <h4>Deal Calculator</h4>
            <div class="panel-body">
                <div class="row headertitles">
                    <div class="col-md-6">
                        <p><strong>Deal Type </strong></p>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="col-md-6 text-right">
                            <p> <strong> Cost</strong></p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p> <strong> Sales Price</strong></p>
                        </div>
                    </div>
                </div>

                <div class="row dealbody">
                    <div class="col-md-6">
                        <p>Vehicle Sales Prize (Front End)</p>
                        <p>Down Payment (Front End)</p>
                        <p>Allowance - Trade In (Front End)</p>
                        <p>Bank Pay-off (Front End)</p>
                        <p>Total Credit (Front End)</p>
                        <p>ACV (Not Visible to customer) </p>
                        <p>GAP (Back End)&nbsp; <?php echo $is_gap_paid_by_customer; ?></i></p>
                        <p>Payment Protection (Back End)&nbsp; <?php echo $is_payment_protection_plan_paid_by_customer; ?></i></p>
                        <p>Power Pack (Back End)&nbsp; <?php echo $is_power_pack_paid_by_customer; ?></i></p>
                        <p>Battery Guard (Back End)&nbsp; <?php echo $is_battery_guard_paid_by_customer; ?></i></p>
                        <p>Asistencia a la Carretera (Back End)&nbsp; <?php echo $is_road_assist_paid_by_customer; ?></i></p>
                        <p>Costo Tablillas (Back End)&nbsp; <?php echo $is_tablilla_paid_by_customer; ?></i></p>
                        <p>Dimond Ceramic (Back End)&nbsp; <?php echo $is_dimond_ceramic_paid_by_customer; ?></i></p>
                        
						
						
						
						
						<p>Extended Warranty (Back End) &nbsp; <?php echo $is_service_contract_paid_by_customer; ?></i></p>
                        <p>Balance to be Financed (Front & Back)</p>
						<?php 
                        if($is_gap_paid_by_customer!='' 
                            || $is_payment_protection_plan_paid_by_customer !='' 
                            || $is_power_pack_paid_by_customer !='' 
                            || $is_battery_guard_paid_by_customer !='' 
                            || $is_road_assist_paid_by_customer !=''
                            || $is_tablilla_paid_by_customer
                            || $is_dimond_ceramic_paid_by_customer){
                        ?>
                        </br>
                         <p class="text-center"><?php echo $is_gap_paid_by_customer; ?></i> - paid by customer</p>
                        <?php }   
                        ?>

                    </div>
                    <div class="col-md-6 ">
                        <div class="col-md-6 text-right">
                            <p>$<?php echo number_format($vehiclecostprice,2); ?></p>
                            <p>$0.00</p>
                            <p>$0.00</p>
                            <p>$0.00</p>
                            <p>$0.00</p>
                            <p>$0.00</p>
                            <p>$<?php echo number_format($proposal_gap_cost,2); ?></p>
							<p>$<?php echo number_format($proposal_payment_plan_cost_value,2); ?> </p>
                            <p>$<?php echo number_format($proposal_power_pack_cost_price,2); ?> </p>
                            <p>$<?php echo number_format($proposal_battery_guard_cost_price,2); ?> </p>
                            <p>$<?php echo number_format($proposal_road_assistance_cost_price,2); ?> </p>
                            <p>$<?php echo number_format($proposal_tablillas_cost_price,2); ?> </p>
                            <p>$<?php echo number_format($proposal_dimond_ceramic_cost_price,2); ?> </p>

							
							
							
                            <p>$<?php echo number_format($proposal_extended_warranty_cost_price,2); ?> </p>
                            <p>$0.00</p>
                        </div>
                        <div class="col-md-6 text-right">
							<p>$<?php echo number_format($vehiclesaleprice,2); ?></p>
							<p>$<?php echo number_format($proposal_down_payment,2); ?></p>
                            <p>$<?php echo number_format($proposal_tradein,2); ?></p>
                            <p>$<?php echo number_format($proposal_bank_pay_off,2); ?></p>
                            <p>$<?php echo number_format($total_credit_frontend,2); ?></p>
                            <p>$<?php echo number_format($proposal_acv,2); ?></p>
                            <p>$<?php echo number_format($proposal_gap_policy,2); ?></p>
							 <p>$<?php echo number_format($proposal_payment_plan_value,2); ?></p>
                            <p>$<?php echo number_format($proposal_power_pack_value,2); ?></p>
                            <p>$<?php echo number_format($proposal_battery_guard_sale_price,2); ?></p>
                            <p>$<?php echo number_format($proposal_road_assistance_sale_price,2); ?></p>
                            <p>$<?php echo number_format($proposal_tablillas_sale_price,2); ?></p>
                            <p>$<?php echo number_format($proposal_dimond_ceramic_sale_price,2); ?></p>
                            
							
							
                            <p>$<?php echo number_format($proposal_extended_warranty,2); ?></p>
                            <p>$<?php echo number_format($balancetobefinanced,2); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="panel Expensescard expenses_panel">
            <div class="totalprice">
               $<?php echo (isset($vehexpenses['total']) && $vehexpenses['total']!='') ? number_format($vehexpenses['total'],2):0.00 ?>
            </div>
            <h4>Expenses</h4>

            <div class="panel-body">
                <div class="row headertitles">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Date
                            </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Category
                            </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Name
                            </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Description </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Amount </strong></p>
                    </div>
                </div>

                <?php 
				unset($vehexpenses['total']);
                if(is_array($vehexpenses) && count($vehexpenses)>0){
                    unset($vehexpenses['total']);
                    foreach($vehexpenses as $ve){

               
                ?>
                <div class="row dealbody">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo date('m/d/Y',strtotime($ve['dateadded'])); ?></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo $ve['category'] ?> </p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                       <p><?php echo $ve['expense_name'] ?> </p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><?php echo $ve['note'] ?> </p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p>$<?php echo number_format($ve['amount'],2); ?> </p>
                    </div>
                </div>
                <?php 
                    }
                }else{
                ?>
				
				<div class="row dealbody text-center">
                    <div><strong>No expense entries found</strong></div>
                </div>


				<?php } ?>
            </div>
        </div>
    </div>
	
	
	
	
	<div class="col-md-6 col-sm-12">
        <div class="panel Expensescard expenses_panel">
            <div class="totalprice">
               $<?php echo (isset($podetails['total']) && $podetails['total']!='') ? number_format($podetails['total'],2):0.00 ?>
            </div>
            <h4>Purchase Orders</h4>

            <div class="panel-body">
                <div class="row headertitles">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Date
                            </strong></p>
                    </div>
                    
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <p><strong>PO Number
                            </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>VIN </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Amount </strong></p>
                    </div>
                </div>

                <?php 
                    if(isset($podetails)) {
                  unset($podetails['total']);
                if(count($podetails)>0){
                    unset($podetails['total']);
                    foreach($podetails as $po){

               
                ?>
                <div class="row dealbody">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo date('m/d/Y',strtotime($po['order_date'])); ?></p>
                    </div>
                   
                    <div class="col-md-5 col-sm-12 col-xs-12">
                       <p><?php echo $po['pur_order_number'] ?> </p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><?php echo $po['sku_code'] ?> </p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p>$<?php echo number_format($po['unit_price'],2); ?> </p>
                    </div>
                </div>
                <?php 
                    }
                }else{
                ?>
                <div class="row dealbody text-center">
                    <div><strong>No purchase orders found</strong></div>
                </div>
                <?php } } ?>

            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	
    <div class="col-md-12 col-sm-12">
        <div class="panel Expensescard">
            <div class="totalprice">
                $<?php echo (isset($dcjournalentries['total']) && $dcjournalentries['total']!='') ? number_format($dcjournalentries['total'],2):0.00 ?>
            </div>
            <h4>Journal Entries (Expenses Cost)</h4>

            <div class="panel-body">
                <div class="row headertitles">
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p><strong>Control </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Control Number </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Description </strong></p>
                    </div>
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p><strong>Amount </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Credit COA </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Debit COA </strong></p>
                    </div>
                </div>
                <?php 
                if(count($dcjournalentries)>0){
                    unset($dcjournalentries['total']);
                    foreach($dcjournalentries as $dce ){
                        
                        $controlnumber = '';
                        if($dce['control_type']=='Vendedores'){
                            $controlnumber = $dce['sales_rep_name'];
                        }elseif($dce['control_type']=='VIN de Carro'){
                            $controlnumber = $dce['attr_vin'];
                        }elseif($dce['control_type']=='Customer Number'){
                            $controlnumber = $dce['lead_name'];
                        }else{
                            $controlnumber = $dce['attr_control_number'];
                        }
                    
                ?>
                <div class="row dealbody">
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p><?php echo $dce['control_type'] ?></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo $controlnumber; ?></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo $dce['attr_description'] ?></p>
                    </div>
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p>$<?php echo (isset($dce['attr_amount']) && $dce['attr_amount']!='') ? number_format($dce['attr_amount'],2):0.00; ?></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                       <p><?php echo $dce['credit_coa_name'] ?></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                       <p><?php echo $dce['debit_coa_name'] ?></p>
                    </div>

                </div>
                <?php
                    }
                }else{

                ?>
                <div class="row dealbody text-center">
                    <div><strong>No Journal Entries found</strong></div>
                </div>
                <?php 
                }
                ?>

            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="panel Expensescard">
            <div class="totalprice">
                $<?php echo (isset($acvjournalentries['total']) && $acvjournalentries['total']!='') ? number_format($acvjournalentries['total'],2):0.00 ?>
            </div>
            <h4>ACV</h4>
            <div class="panel-body">
                <div class="row headertitles">
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p><strong>Control </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Control Number </strong></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><strong>Description </strong></p>
                    </div>
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p><strong>Amount </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Credit COA </strong></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p><strong>Debit COA </strong></p>
                    </div>
                </div>

                <?php 
                if(count($acvjournalentries)>0){
                    unset($acvjournalentries['total']);
                    foreach($acvjournalentries as $accv ){
                        
                        
                    
                ?>
                <div class="row dealbody">
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p><?php echo $accv['ableit_control_type'] ?></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo $accv['description']; ?></p>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <p><?php echo $accv['description'] ?></p>
                    </div>
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <p>$<?php echo (isset($accv['amount']) && $accv['amount']!='') ? number_format($accv['amount'],2):0.00; ?></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                       <p><?php echo $accv['creditcoa'] ?></p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                       <p><?php echo $accv['debitcoa'] ?></p>
                    </div>

                </div>
                <?php
                    }
                }else{

                ?>
                <div class="row dealbody text-center">
                    <div><strong>No ACV Journal Entries found</strong></div>
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .front-margin h1 {
        font-size: 25px;
        text-align: center;
        font-weight: 700;
        margin: 0;
    }

    h1.cost {
        color: #ee3e27
    }

    h1.price {
        color: #3357e1
    }

    h1.profit {
        color: #1ed731
    }

    #dealcalculatormodal .modal-dailog {
        width: 90%;
        margin: auto;
    }

    .front-margin .panel {
        border: none;
        box-shadow: 0px 0px 8px 0px #00000024;
        min-height: 83px;
        color: #535353;
        border-radius: 15px;
    }

    .panel {
        border: none;
        box-shadow: 0px 0px 8px 0px #00000024;
        min-height: 83px;
        border-radius: 15px;
        position: relative;
    }

    .dscardsparent {
        border-radius: 10px;
        background: #ffefc0;
        box-shadow: inset 0px 0px 18px -11px #acb3bc;
        margin-bottom: 15px;
        padding: 0 15px;
    }

    .dscardsparent.back {
        background: #7cd0ff;
    }

    .panel h4 {
        margin: 0;
        margin-bottom: 10px;
        text-align: center;
        font-weight: 600;
        border-bottom: 0.5px solid #cccccc7a;
        padding-bottom: 7px;
        background: #edf5ff;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding-top: 8px;
        color: #212a37;
    }

    .panelheader {
        color: #212a37;
        font-weight: 600;
        margin-bottom: 15px;
        margin-top: 14px;
        font-size: 22px;
        text-align: left;
    }

    .front-margin .panel.fronttext {
        min-height: 83px;
        box-shadow: none;
        /* border: 1px solid #a7a7a7; */
        background: #ffe27a;
        box-shadow: 0px 8px 27px -14px #00000094;
        border-radius: 10px;
        color: #535353;
    }

    p strong {
        font-weight: 700;
        border-bottom: 1px solid #d1d1d1;
        width: 100%;
        display: inline-block;
    }

    .front-margin .panel.fronttext h1 {
        color: #2e394a;
    }

    .fronttext {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .front-margin p {
        text-align: center;
        padding-top: 5px;
    }

    .totalprice {
        float: right;
        text-align: right;
        padding: 2px 15px;
        font-size: 22px;
        color: #212a37;
        font-weight: 700;
        letter-spacing: 1px;
        position: absolute;
        right: 0;
    }

    .expenses_panel [class *="col-md"] {
        padding: 0 5px;
    }

    .expenses_panel .dealbody p {
        word-wrap: break-word;
    }

    .expenses_panel .panel-body {
        max-height: 341px;
        overflow: auto;
    }

     .expenses_panel .panel-body::-webkit-scrollbar {
        width: 10px;
        border-radius: 10px;
    }

    /* Track */
     .expenses_panel .panel-body::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    /* Handle */
     .expenses_panel .panel-body::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    /* Handle on hover */
     .expenses_panel .panel-body::-webkit-scrollbar-thumb:hover {
        background: #555;
        border-radius: 10px;
    }
    .panel-body{
        padding-top: 10px;
    }
</style>