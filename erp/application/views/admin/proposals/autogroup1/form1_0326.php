<?php

use Twilio\TwiML\Voice\Number;

defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');
//echo "<pre>v"; print_r($quotedata); exit;
$salesordernumber = ((isset($quotedata['main_data']['quote']['id'])) && $quotedata['main_data']['quote']['id'] != '') ? $quotedata['main_data']['quote']['id'] : '';
$stocknumber = ((isset($quotedata['main_data']['inventory']['description'])) && $quotedata['main_data']['inventory']['description'] != '') ? $quotedata['main_data']['inventory']['description'] : '';
$customerid = ((isset($quotedata['main_data']['lead']['phonenumber'])) && $quotedata['main_data']['lead']['phonenumber'] != '') ? $quotedata['main_data']['lead']['phonenumber'] : '';

$customername = ((isset($quotedata['main_data']['lead']['name'])) && $quotedata['main_data']['lead']['name'] != '') ? strtoupper(strtolower($quotedata['main_data']['lead']['name'])) : '';
$customrpostaladdress = ((isset($quotedata['main_data']['lead']['Postal Address'])) && $quotedata['main_data']['lead']['Postal Address'] != '') ? $quotedata['main_data']['lead']['Postal Address'] : '';
$customerhomephone = $customerid;
$customermobilenumber = ((isset($quotedata['main_data']['lead']['Mobile No'])) && $quotedata['main_data']['lead']['Mobile No'] != '') ? $quotedata['main_data']['lead']['Mobile No'] : '';
$customerssn = ((isset($quotedata['main_data']['lead']['Social Security Number'])) && $quotedata['main_data']['lead']['Social Security Number'] != '') ? '###-##-' . substr($quotedata['main_data']['lead']['Social Security Number'], -4) : '';
$customrlicenceno = ((isset($quotedata['main_data']['lead']['License Number'])) && $quotedata['main_data']['lead']['License Number'] != '') ? $quotedata['main_data']['lead']['License Number'] : '';
$customeremail = ((isset($quotedata['main_data']['lead']['email'])) && $quotedata['main_data']['lead']['email'] != '') ? $quotedata['main_data']['lead']['email'] : '';


$quotedate = ((isset($quotedata['main_data']['quote']['date'])) && $quotedata['main_data']['quote']['date'] != '') ? date("m-d-Y", strtotime($quotedata['main_data']['quote']['date'])) : '';
$qbalance = ((isset($quotedata['main_data']['custom_feilds']['proposal_balance'])) && $quotedata['main_data']['custom_feilds']['proposal_balance'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_balance'] : 0;
$qtradeinallowance = ((isset($quotedata['main_data']['custom_feilds']['proposal_tradein'])) && $quotedata['main_data']['custom_feilds']['proposal_tradein'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_tradein'] : 0;
$qdownpayment = ((isset($quotedata['main_data']['custom_feilds']['proposal_down_payment'])) && $quotedata['main_data']['custom_feilds']['proposal_down_payment'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_down_payment'] : 0;
$qbankpayoff = ((isset($quotedata['main_data']['custom_feilds']['proposal_due'])) && $quotedata['main_data']['custom_feilds']['proposal_due'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_due'] : 0;
$qcredit = ($qtradeinallowance - $qbankpayoff);

/*if ($qcredit > 0) {
    //$qcreditnote = $qcredit - $qdownpayment;
    $qcreditnote = $qcredit ;
} else {
    $qcreditnote = $qcredit + $qdownpayment;
}*/
$qcreditnote = $qcredit;
$Creditoasufavor = $qcreditnote + $qdownpayment;

$credittotal = $Creditoasufavor;
$qitemprice = ((isset($quotedata['main_data']['inventory']['invqprice'])) && $quotedata['main_data']['inventory']['invqprice'] != '') ? $quotedata['main_data']['inventory']['invqprice'] : '';
$qpowerpack = ((isset($quotedata['main_data']['custom_feilds']['proposal_power_pack_2'])) && $quotedata['main_data']['custom_feilds']['proposal_power_pack_2'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_power_pack_2'] : 0;
$qroadassist = ((isset($quotedata['main_data']['custom_feilds']['proposal_service_contract'])) && $quotedata['main_data']['custom_feilds']['proposal_service_contract'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_service_contract'] : 0;
$qpaymentprotection = ((isset($quotedata['main_data']['custom_feilds']['proposal_payment_plan'])) && $quotedata['main_data']['custom_feilds']['proposal_payment_plan'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_payment_plan'] : 0;
$qdimondceramic = ((isset($quotedata['main_data']['custom_feilds']['proposal_credit_total_2'])) && $quotedata['main_data']['custom_feilds']['proposal_credit_total_2'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_credit_total_2'] : 0;
$qservicecontract = ((isset($quotedata['main_data']['custom_feilds']['proposal_service_contract_policy_number'])) && $quotedata['main_data']['custom_feilds']['proposal_service_contract_policy_number'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_service_contract_policy_number'] : 0;
$qgappolicy = ((isset($quotedata['main_data']['custom_feilds']['proposal_gap_policy'])) && $quotedata['main_data']['custom_feilds']['proposal_gap_policy'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_gap_policy'] : 0;
$qinsurancepolicy = ((isset($quotedata['main_data']['custom_feilds']['proposal_insurance_policy'])) && $quotedata['main_data']['custom_feilds']['proposal_insurance_policy'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_insurance_policy'] : 0;
$qcosttabillas = ((isset($quotedata['main_data']['custom_feilds']['proposal_tablillas'])) && $quotedata['main_data']['custom_feilds']['proposal_tablillas'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_tablillas'] : 0;
$qfinancialinstitution = ((isset($quotedata['main_data']['custom_feilds']['proposal_financial_institution'])) && $quotedata['main_data']['custom_feilds']['proposal_financial_institution'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_financial_institution'] : '';
$qreminderterm = ((isset($quotedata['main_data']['custom_feilds']['proposal_reminder_term'])) && $quotedata['main_data']['custom_feilds']['proposal_reminder_term'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_reminder_term'] : '';
$qfirstpayment = ((isset($quotedata['main_data']['custom_feilds']['proposal_amount'])) && $quotedata['main_data']['custom_feilds']['proposal_amount'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_amount'] : '';
$qreminderpayment = ((isset($quotedata['main_data']['custom_feilds']['proposal_amount_2'])) && $quotedata['main_data']['custom_feilds']['proposal_amount_2'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_amount_2'] : '';
$qpreciototal = $qitemprice + $qpowerpack + $qroadassist + $qdimondceramic + $qpaymentprotection;
$qbalanceapagartotal = ($qitemprice + $qpowerpack + $qroadassist + $qdimondceramic + $qpaymentprotection) - $credittotal;
$qapr = ((isset($quotedata['main_data']['custom_feilds']['proposal_apr'])) && $quotedata['main_data']['custom_feilds']['proposal_apr'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_apr'].'%' : '';



$imake = ((isset($quotedata['main_data']['inventory']['Brand'])) && $quotedata['main_data']['inventory']['Brand'] != '') ? $quotedata['main_data']['inventory']['Brand'] : '';
$iyear = ((isset($quotedata['main_data']['inventory']['Year'])) && $quotedata['main_data']['inventory']['Year'] != '') ? $quotedata['main_data']['inventory']['Year'] : '';
$icolor = ((isset($quotedata['main_data']['custom_feilds']['proposal_color'])) && $quotedata['main_data']['custom_feilds']['proposal_color'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_color'] : '';
$imodel = ((isset($quotedata['main_data']['inventory']['Model'])) && $quotedata['main_data']['inventory']['Model'] != '') ? $quotedata['main_data']['inventory']['Model'] : '';
$istock = $stocknumber;
$iserie = ((isset($quotedata['main_data']['inventory']['VIN'])) && $quotedata['main_data']['inventory']['VIN'] != '') ? $quotedata['main_data']['inventory']['VIN'] : '';
$imileage =  ((isset($quotedata['main_data']['custom_feilds']['proposal_mileage'])) && $quotedata['main_data']['custom_feilds']['proposal_mileage'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_mileage'] : '';
$itablilla = ((isset($quotedata['main_data']['inventory']['Tablilla'])) && $quotedata['main_data']['inventory']['Tablilla'] != '') ? $quotedata['main_data']['inventory']['Tablilla'] : '';

$tmake = ((isset($quotedata['main_data']['tradein']['make'])) && $quotedata['main_data']['tradein']['make'] != '') ? $quotedata['main_data']['tradein']['make'] : '';
$tmodel = ((isset($quotedata['main_data']['tradein']['model'])) && $quotedata['main_data']['tradein']['model'] != '') ? $quotedata['main_data']['tradein']['model'] : '';
$ttablilla = ((isset($quotedata['main_data']['tradein']['tablilla'])) && $quotedata['main_data']['tradein']['tablilla'] != '') ? $quotedata['main_data']['tradein']['tablilla'] : '';
$tcolor = ((isset($quotedata['main_data']['tradein']['color'])) && $quotedata['main_data']['tradein']['color'] != '') ? $quotedata['main_data']['tradein']['color'] : '';
$tmileage = ((isset($quotedata['main_data']['tradein']['millage'])) && $quotedata['main_data']['tradein']['millage'] != '') ? $quotedata['main_data']['tradein']['millage'] : '';
$tstockno = '';
$tserie = ((isset($quotedata['main_data']['tradein']['vin'])) && $quotedata['main_data']['tradein']['vin'] != '') ? $quotedata['main_data']['tradein']['vin'] : '';




//ableittech need to create thisvin
$customermailbox = '';



//0205
$gaplabel = 'GAP';




?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg hide-print tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                    <?php echo $title; ?>
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div>
                                <div class="text-center">
                                    CONTRATO DE COMPRA VENTA 
                                </div>
                                <div class="row ffblock">
                                    <div class="col-sm-6 col-xs-6">
                                        <?php get_company_logo_forms() ?>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 align-self-end">
                                        <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        <h4 class="headmiddle">STK # <?php echo $stocknumber; ?></h4>
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                        
                                    </div>
                                    <div class="col-sm-3 col-xs-3 align-self-end text-center">
                                        <p><?php echo get_option('invoice_company_city') . ', ' . get_option('company_state') . ', ' . get_option('invoice_company_country_code') . ', ' . get_option('invoice_company_postal_code') ?></br></p>
                                        <p>Tel: <?php echo get_option('invoice_company_phonenumber'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="firstblock">
                                    <div class="row">
                                        <div class="inputsecr1c1 col-md-8 col-sm-8 col-xs-8">
                                            <label>NOMBRE DEL COMPRADOR</label>
                                            <input type="text" class="inputbox " value="<?php echo $customername; ?>" />
                                        </div>
                                        <div class="inputsecr1c2 col-md-4 col-sm-4 col-xs-4 br-0">
                                            <label>FECHA DE CONTRATO</label>
                                            <input type="text" class="inputbox " value="<?php echo $quotedate; ?>" />
                                        </div>
                                        <div class="inputsecr2c1 col-md-12 col-sm-12 col-xs-12 br-0 col-xs-12">
                                            <label>DIRECCION DE COMPRADOR</label>
                                            <input type="text" class="inputbox " value="<?php echo $customrpostaladdress; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="inputsecr2c1 col-md-3 col-sm-3 col-xs-3">
                                            <label>TEL. RESIDENCIA</label>
                                            <input type="text" class="inputbox " value="<?php echo $customerid; ?>" />
                                        </div>
                                        <div class="inputsecr2c2 col-md-3 col-sm-3 col-xs-3">
                                            <label>TEL. NEGOCIO</label>
                                            <input type="text" class="inputbox " value="<?php echo $customermobilenumber; ?>" />
                                        </div>
                                        <div class="inputsecr2c3 col-md-3  col-sm-3 col-xs-3">
                                            <label>APARTADO</label>
                                            <input type="text" class="inputbox " value="<?php echo $customermailbox; ?>" />
                                        </div>
                                        <div class="inputsecr2c4 col-md-3  col-sm-3 col-xs-3 br-0">
                                            <label>FECHA DE ENTREGA</label>
                                            <input type="text" class="inputbox " value="<?php echo $quotedate; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="inputsecr3c1 col-md-3  col-sm-3 col-xs-3">
                                            <label>SIRVASE ENTRAR MI ORDEN POR UN VEHICULO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr3c2 col-md-2  col-sm-2 col-xs-2">
                                            <label>MARCA</label>
                                            <input type="text" class="inputbox " value="<?php echo $imake; ?>" />
                                        </div>
                                        <div class="inputsecr3c3 col-md-1  col-sm-1 col-xs-1">
                                            <label>AÑO</label>
                                            <input type="text" class="inputbox " value="<?php echo $iyear; ?>" />
                                        </div>
                                        <div class="inputsecr3c4 col-md-2  col-sm-2 col-xs-2">
                                            <label>COLOR</label>
                                            <input type="text" class="inputbox " value="<?php echo $icolor; ?>" />
                                        </div>
                                        <div class="inputsecr3c5 col-md-2  col-sm-2 col-xs-2">
                                            <label>CARROCERÍA Y MODELO</label>
                                            <input type="text" class="inputbox " value="<?php echo $imodel; ?>" />
                                        </div>
                                        <div class="inputsecr3c6 col-md-2  col-sm-2 col-xs-2 br-0">
                                            <label>STOCK</label>
                                            <input type="text" class="inputbox " value="<?php echo $istock; ?>" />
                                        </div>
                                        <div class="col-md-9  col-sm-9 col-xs-9 br-0 bm-0">
                                            <div class="row m-0">
                                                <div class="inputsecr4c1 col-md-6  col-sm-6 col-xs-6">
                                                    <label>SERIE</label>
                                                    <input type="text" class="inputbox " value="<?php echo $iserie; ?>" />
                                                </div>
                                                <div class="inputsecr4c2 col-md-3  col-sm-3 col-xs-3">
                                                    <label>MILLAJE</label>
                                                    <input type="text" class="inputbox " value="<?php echo $imileage; ?>" />
                                                </div>
                                                <div class="inputsecr4c3 col-md-3  col-sm-3 col-xs-3">
                                                    <label>#TABLILLA</label>
                                                    <input type="text" class="inputbox " value="<?php echo $itablilla; ?>" />
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="inputsecr4c1 col-md-3 bm-0 col-sm-3 col-xs-3">
                                                    <label># SEGURO SOCIAL</label>
                                                    <input type="text" class="inputbox " value="<?php echo $customerssn; ?>" />
                                                </div>
                                                <div class="inputsecr4c2 col-md-3  bm-0 col-sm-3 col-xs-3">
                                                    <label>#LICENCIA CONDUCIR</label>
                                                    <input type="text" class="inputbox " value="<?php echo $customrlicenceno; ?>" />
                                                </div>
                                                <div class="inputsecr4c3 col-md-6  bm-0 col-sm-6 col-xs-6">
                                                    <label>E-MAIL</label>
                                                    <input type="text" class="inputbox " value="<?php echo $customeremail; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3  col-sm-3 col-xs-3 br-0  bm-0">
                                            <div class="inputsecr4c1 col-md-12">
                                                <label>AUTOMÓVIL</label>
                                                <div class="form-inline">
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        TAXI/PÚBLICO
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        NUEVO
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        DEMOSTRADOR
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" checked />
                                                        USADO
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        ALQUILER
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="secondblock">
                                    <div class="row">
                                        <div class="col-sm-6  col-xs-6 col-md-6 px-0">
                                            <div class="row">
                                                <h4 class="col-sm-12 col-xs-12 text-center sbhead">
                                                    <strong> VENTA A LEASING CO.</strong>
                                                </h4>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>LEASE CO</label>
                                                    <input type="text" class="inputbox " value="N/A" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>P.O. #</label>
                                                    <input type="text" class="inputbox " value="N/A" />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>VENDEDOR</label>
                                                    <input type="text" class="inputbox " value="N/A" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CLIENTE</label>
                                                    <input type="text" class="inputbox " value="N/A" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>TEL</label>
                                                    <input type="text" class="inputbox " value="N/A" />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>DIRECCIÓN </label>
                                                    <input type="text" class="inputbox " value="N/A" />
                                                </div>
                                                <h4 class="col-sm-12 col-xs-12 text-center sbhead">
                                                    <strong> VEHÍCULO USADO TOMADO A CAMBIO</strong>
                                                </h4>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>MARCA</label>
                                                    <input type="text" class="inputbox " value="<?php echo $tmake; ?>" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>AÑO MODELO</label>
                                                    <input type="text" class="inputbox " value="<?php echo $tmodel; ?>" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>TABLILLA</label>
                                                    <input type="text" class="inputbox " value="<?php echo $ttablilla; ?>" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>COLOR</label>
                                                    <input type="text" class="inputbox " value="<?php echo $tcolor; ?>" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>MILLAJE</label>
                                                    <input type="text" class="inputbox " value="<?php echo $tmileage; ?>" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>STOCK NO</label>
                                                    <input type="text" class="inputbox " value="<?php echo $tstockno; ?>" />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>SERIE NO.</label>
                                                    <input type="text" class="inputbox " value="<?php echo $tserie; ?>" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>BALANCE ADEUDADO A</label>
                                                    <!--<input type="text" class="inputbox " value="<?php //echo number_format($qbalance, 2); ?>" />-->
                                                </div>
												<div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qbankpayoff, 2); ?>" />
                                                </div>
												
												
												
												
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO POR CARRO USADO</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qtradeinallowance, 2); ?>" />
                                                </div>
                                                <!-- <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO NETO</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qcreditnote, 2); ?>" />
                                                </div>
                                                <!-- <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>PRONTO</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qdownpayment, 2); ?>" />
                                                </div>
                                                <!-- <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO A SU FAVOR</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($Creditoasufavor, 2); ?>" />
                                                </div>
                                                <!-- <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>OTROS PAGOS</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <!-- <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <div class="col-sm-6 col-xs-9">
                                                    <label>CREDITO TOTAL</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($credittotal, 2); ?>" />
                                                </div>
                                                <!-- <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <h4 class="col-sm-12 col-xs-12 text-center sbhead">
                                                    <strong> BALANCE - CONTRATO A PAGARSE DE ACUERDO CON</strong>
                                                </h4>
                                                <div class="col-sm-6 col-xs-6">
                                                    HIPOTECA BIENES MUEBLES CONTRATO DE VENTA CONDICIONAL
                                                    <div class="row chpx-0">
                                                        <div class="col-xs-2 pl-unset">
                                                            EN
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="inputbox olinp" value="1"/>
                                                        </div>
                                                        <div class=" col-xs-7">
                                                            PLAZOS MENSUALES DE
                                                        </div>
                                                    </div>
                                                    <div class="row chpx-0">
                                                        <div class="col-xs-2 pl-unset">
                                                            EN
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input type="text" class="inputbox olinp" value="<?php echo $qreminderterm; ?>"/>
                                                        </div>
                                                        <div class=" col-xs-7">
                                                            PLAZOS MENSUALES DE
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    PARA SER SUSCRITO EN O ANTES DE LA ENTREGA

                                                    <div class="row chpx-0">
                                                        <!-- <div class="col-xs-2 pl-unset">
                                                            EN
                                                        </div> -->
                                                        <div class="col-xs-3">
                                                            <input type="text" class="inputbox olinp" value="<?php echo number_format($qfirstpayment,2); ?>"/>
                                                        </div>
                                                        <!-- <div class=" col-xs-7">
                                                            PLAZOS MENSUALES DE
                                                        </div> -->
                                                    </div>
                                                    <div class="row chpx-0">
                                                        <!-- <div class="col-xs-2 pl-unset">
                                                            EN
                                                        </div> -->
                                                        <div class="col-xs-3">
                                                            <input type="text" class="inputbox olinp" value="<?php echo number_format($qreminderpayment,2); ?>"/>
                                                        </div>
                                                        <!-- <div class=" col-xs-7">
                                                            PLAZOS MENSUALES DE
                                                        </div> -->
                                                    </div>
                                                </div>
                                               
                                                <div class="col-sm-12 col-xs-12 bm-0">
                                                    RESIDUAL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 secondright px-0 br-0">
                                            <div class="row">
                                                <div class="col-sm-8 col-xs-8 align-self-center">
                                                    PRECIO UNIDAD
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qitemprice, 2) ?>" />
                                                </div>
                                                <!-- <div class="col-sm-8 col-xs-8 align-self-center">
                                                    Down Payment
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qitemprice, 2) ?>" />
                                                </div> -->
                                                <!-- <div class="col-sm-8 col-xs-8 align-self-center">
                                                    TRADE IN
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qtradeinallowance, 2) ?>" />
                                                </div> -->
                                                <!-- <div class="col-sm-8 col-xs-8 align-self-center">
                                                    Total Credit
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qitemprice, 2) ?>" />
                                                </div> -->
                                                <div class="col-sm-8 col-xs-8 align-self-center">
                                                    POWER PACK
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qpowerpack, 2) ?>" />
                                                </div>
                                                <div class="col-sm-8 col-xs-8 align-self-center">
                                                    ROAD ASSISTANCE
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qroadassist, 2) ?>" />
                                                </div>

                                                <div class="col-sm-8 col-xs-8 align-self-center">
                                                    PAYMENT PROTECTION
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qpaymentprotection, 2) ?>" />
                                                </div>
                                                <div class="col-sm-8 col-xs-8 align-self-center">
                                                    DIMOND CERAMIC
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qdimondceramic, 2) ?>" />
                                                </div>
                                                <!-- <div class="col-sm-8 col-xs-8 align-self-center">
                                                    Total VAP
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qitemprice, 2) ?>" />
                                                </div> -->




                                                <!-- <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div> -->
                                                <!-- <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div> -->
                                                <!-- <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div> -->
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8  col-xs-8">
                                                    PRECIO TOTAL INCLUYENDO,ACCESORIOS ADICIONALES INSTALADOS
                                                </div>
                                                <div class="col-sm-4   col-xs-4 br-0">
                                                    <input type="number" id="acceesstotal" class="inputbox olinp" />
                                                </div>
                                                <!-- <div class="col-sm-8  col-xs-8">
                                                    ACCESORIOS ADICIONALES INSTALADOS
                                                </div>
                                                <div class="col-sm-4   col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8  col-xs-8">
                                                    TABLILLA Y ACAA
                                                </div>
                                                <div class="col-sm-4   col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo number_format($qcosttabillas,2); ?>"/>
                                                </div>
                                                <div class="col-sm-8  col-xs-8">
                                                    PRECIO TOTAL
                                                </div>
                                                <div class="col-sm-4    col-xs-4 br-0">
                                                    <input id="qpriceototal" type="text" class="inputbox olinp" value="<?php echo number_format($qpreciototal,2); ?>"/>
                                                </div>
                                                <!-- <div class="col-sm-8  col-xs-8">
                                                    CREDITO TOTAL
                                                </div>
                                                <div class="col-sm-4    col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div> -->
												
												
												<div class="col-sm-8 col-xs-8">
                                                   CREDITO TOTAL
                                                </div>
                                                <div class="col-sm-4 col-xs-4 br-0">
                                                    <input id="qbalancepagar" type="text" class="inputbox olinp" value="<?php echo number_format($credittotal, 2); ?>"/>
                                                </div>
												

                                                <div class="col-sm-8 col-xs-8">
                                                    BALANCE A PAGAR
                                                </div>
                                                <div class="col-sm-4 col-xs-4 br-0">
                                                    <input id="qbalancepagar" type="text" class="inputbox olinp" value="<?php echo number_format($qbalanceapagartotal, 2); ?>"/>
                                                </div>
                                                <div class="col-sm-4 col-xs-4">
                                                    FINANCIADO POR
                                                </div>
                                                <div class="col-sm-6 col-xs-6 ">
                                                    <input type="text" class="inputbox olinp" value="<?php echo $qfinancialinstitution; ?>"/>
                                                </div>
                                                <div class="col-sm-2 col-xs-2 br-0">
                                                    <input type="text" class="inputbox olinp" value="<?php echo $qapr; ?>"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="rbottom col-xs-12 br-0 px-0">
                                                    <h4 class="br-0"><strong>OBSERVACIONES:</strong></h4>
                                                    <div class="col-xs-8">MOBILITY COVERAGE</div>
                                                    <div class="col-xs-4 br-0">
                                                        <input type="text" class="inputbox olinp" value="<?php echo number_format($qinsurancepolicy,2); ?>"/>
                                                    </div>
                                                    <div class="col-xs-8"><?php echo $gaplabel; ?></div>
                                                    <div class="col-xs-4 br-0">
                                                        <input type="text" class="inputbox olinp" value="<?php echo number_format($qgappolicy,2); ?>"/>
                                                    </div>
                                                    <div class="col-xs-8">CONTRATO DE SERVICIO</div>
                                                    <div class="col-xs-4 br-0">
                                                        <input type="text" class="inputbox olinp" value="<?php echo number_format($qservicecontract,2); ?>"/>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="thirdblock">
                                    <h4><strong>NOTAS PARA EL PIE DEL CONTRATO DE </strong></h4>
                                    <p>"NOTA: El presente contrato de compra y venta dejará sin efecto cualquier otro acuerdo que las partes pudieron haber llegado anteriormente, si alguno. El comprador expresamente garantiza que el automóvil usado entregado a una cuenta (el "trade in"), si alguno, está libre de todo gravamen y/o deuda y que la licencia, debidamente endosada, será entregada a la vendedora con el vehiculo. En la eventualidad que el "trade in", su licencia y/o titulo tenga una deuda pendiente y/o un gravamen sobre el mismo, el comprador representa que la cantidad informada al vendedor como el balance de cancelación del mismo es correcto. Si el balance de cancelación resulta ser mayor que la cuantia informada al vendedor, el comprador se compromete y obliga a pagar y/o rembolsar la diferencia entre el balance de cancelación reportado y el balance de cancelación requerido subsiguientemente por la correspondiente institución financiera. Si el balance de cancela- ción del trade in resulte ser menor que la cuantia aqui informada, el comprador CEDE y TRASPASA la diferencia a favor del Vendedor. En la eventualidad de que el vehiculo de motor selec- cionado por el comprador sea entregado a éste y la compraventa sea subsiguientemente cancelada por acuerdo mutuo entre las partes contratantes y/o el préstamo solicitado para financiar la compra no quede debidamente perfeccionado por falta de desembolso o cualquier otra causa: el comprador expresamente autoriza al vendedor a reposeer el vehículo entregado, sin necesidad de notificación o intervención judicial previa y se obliga, además, a pagarle al vendedor y/o lo autoriza a retener de cualquier suma pagada o acreditada por concepto de "trade in", y/o entregada como pronto pago, la cuantia de noventa y cinco centavos [$0.95] por milla recorrida con el vehiculo. El comprador se obliga, además, a pagar al vendedor cualesquiera sumas de dinero re- queridas para reparar todo daño que haya sufrido el vehiculo desde la fecha en que el mismo le fue entregado hasta la fecha en que el mismo fue devuelto al vendedor. Se entiende que toda compra a plazos está condicionada a la aprobación y el desembolso del préstamo solicitado. El comprador representa a la vendedora ser mayor de edad. El comprador reconoce y acepta que está obligado a cumplir con los términos y condiciones establecidos en la garantia de fabrica y que las reparaciones bajo dicha garantia tienen que ser autorizadas por el manufacturero del vehiculo de motor. El comprador acepta y reconoce que los términos de la garantia de fabrica son de su conocimiento. Aunque esta orden de compra esté firmada por un vendedor, ésta no obligará en forma alguna a la vendedora hasta tanto haya sido aprobada y firmada por uno de los gerentes de la misma. Esta orden de compra y el contrato de venta condicional correspondiente, si la venta es a plazos, contienen por escrito todas las condiciones del negocio aqui establecido sin haberse hecho o extendido garantia y/o representación expresa o implicita alguna que no sean las aqui contenidas"</p>
                                </div>
                                <div class="fourthblock">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <textarea rows="5" class="col-xs-12" cols="30"></textarea>
                                            <p class="text-center">GERENCIA</p>
                                        </div>
                                        <div class="col-xs-6 px-0">
                                            <div class="inputsec4r2c1 text-center col-xs-12 br-0">
                                                <label>FIRMA DEL COMPRADOR</label>
                                                <input type="text" class="inputbox " />
                                            </div>
                                            <div class="inputsec4r2c2 text-center col-xs-6 br-0 bm-0">
                                                <label>FIRMA DEL VENDEDOR</label>
                                                <input type="text" class="inputbox " />
                                            </div>
                                            <div class="inputsec4r2c2 text-center col-xs-6 br-0 bm-0">
                                                <label>FACTURA NUM.</label>
                                                <input type="text" class="inputbox " value="<?php echo $salesordernumber; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php init_tail(); ?>

</body>
<style>
    body {
        color: #000;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .row div[class^="col-md"] {
        padding: 0 5px;
    }

    .align-self-end {
        align-self: end;
    }

    .m-0 {
        margin: 0;
    }

    .headmiddle {
        font-weight: 600;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    p {
        margin-bottom: 5px
    }

    input.inputbox {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
    }

    .olinp {
        margin: 5px 0;
    }

    img {
        width: 244px;
    }

    .secondright {
        display: flex;
        flex-wrap: wrap;
        align-content: space-between;
    }

    .secondright .row {
        width: 100%;
    }

    .align-self-center {
        align-self: center;
    }

    .row.chpx-0 div[class*="col-xs-"] {
        padding: 0 3px !important;
        align-self: center;
    }

    .row.chpx-0 {
        margin-left: 0px;
    }

    @media print {
        @page {
            size: A4;
            margin: 0;
        }

        #header {
            display: none;
        }

        html,
        body {
            height: 99%;
            page-break-after: avoid !important;
            page-break-before: avoid !important;
            /* overflow: hidden; */
        }

        body * {
            visibility: hidden;
        }

        #print_block {
            page-break-after: avoid !important;
        }

        #print_block,
        #print_block * {
            visibility: visible;
            font-size: 8.5px;
            font-family: "open sans";
            margin: 0 !important;
        }

        .hide-print {
            display: none;
        }

        /* #wrapper {
            margin-left: 0;
            margin: 0 0;
        } */

        #wrapper {
            margin-left: 0;
            margin: 0 0;
            visibility: hidden;
            min-height: unset !important;
        }

        input[type="text"] {
            height: auto;
            min-height: 11px;
            padding: 3px;
            font-size: 14px;
            line-height: 12px;
            color: #555;
            /* background-color: #eceffa !important; */
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        strong {
            font-weight: 700;
        }

        .row div.col-xs-2,
        div.col-xs-3,
        div.col-xs-4,
        div.col-xs-5,
        div.col-xs-6,
        div.col-xs-7,
        div.col-xs-8,
        div.col-xs-9,
        div.col-xs-10,
        div.col-xs-12 {
            padding: 0 2px !important;
        }

        .secondblock>.row>.col-sm-6 {
            padding: 0;
        }

        .secondblock>.row>.col-sm-6>.row>[class^="col-sm-"] {
            padding: 2px 2px !important;
        }


        .firstblock,
        .secondblock,
        .thirdblock,
        .fourthblock {
            border: 2px solid #000;
            border-bottom: 0;
            padding: 0px !important;
            margin-bottom: 5px;
        }

        #print_block .secondblock {
            margin-bottom: 5px !important;
            border: 2px solid #000 !important;
        }

        #print_block .thirdblock {
            padding: 3px !important;
            margin-bottom: 5px !important;
            border: 2px solid #000 !important;
        }

        #print_block .firstblock {
            border-radius: 13px;
            margin-bottom: 5px !important;
            padding-left: 4px !important;
        }

        .fourthblock,
        .firstblock {
            border-bottom: 2px solid #000;
        }

        .thirdblock p {
            font-size: 8px !important;
        }

        .form-inline {
            /* display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 0px;
            padding-top: 2px; */
        }

        div#print_block .firstblock .row>div input[type="checkbox"] {
            vertical-align: middle;
            height: 10px;
            width: 10px;
        }

        div#print_block .row>div input {
            border: none;
            padding: 0;
        }

        div#print_block .firstblock .row>div,
        div#print_block .secondblock .row>div,
        div#print_block .fourthblock .row .inputsec4r2c1,
        /* div#print_block .secondblock .rbottom>h4, */
        div#print_block .secondblock .row>h4 {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
        }

        .br-0 {
            border-right: 0px !important;
        }

        .pe-5p {
            padding-right: 5px;
        }

        .bm-0 {
            border-bottom: 0 !important;
        }

        div#print_block .secondblock .row>div.px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important;
            border-right: 0px;
        }


    }
</style>
<script>
$(document).ready(function(){
   /*var curraccval =  $("#acceesstotal").val();
    $("body").on("blur","#acceesstotal",function(){
        var acctotal = $(this).val();
        var qpricetotal = parseInt($("#").val());
        alert(qpricetotal);
        var qbalancep = parseInt("<?php echo $qbalance; ?>");
        if(curraccval != acctotal && acctotal >0){

            $("#qpriceototal").val(qpricetotal + acctotal);
            $("#qbalancepagar").val(qbalancep+acctotal);
        }
    }); */
});  
</script>

</html>