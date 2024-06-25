<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
$customeraddress =  ((isset($quotedata['main_data']['lead']['address'])) && $quotedata['main_data']['lead']['address'] != '') ? $quotedata['main_data']['lead']['address'] : '';
$customercity =  ((isset($quotedata['main_data']['lead']['city'])) && $quotedata['main_data']['lead']['city'] != '') ? $quotedata['main_data']['lead']['city'] : '';
$customerstate =  ((isset($quotedata['main_data']['lead']['state'])) && $quotedata['main_data']['lead']['state'] != '') ? $quotedata['main_data']['lead']['state'] : '';
$customerzip =  ((isset($quotedata['main_data']['lead']['zip'])) && $quotedata['main_data']['lead']['zip'] != '') ? $quotedata['main_data']['lead']['zip'] : '';



$quotedate = ((isset($quotedata['main_data']['quote']['date'])) && $quotedata['main_data']['quote']['date'] != '') ? date("m-d-Y", strtotime($quotedata['main_data']['quote']['date'])) : '';
$qbalance = ((isset($quotedata['main_data']['custom_feilds']['proposal_balance'])) && $quotedata['main_data']['custom_feilds']['proposal_balance'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_balance'] : 0;
$qtradeinallowance = ((isset($quotedata['main_data']['custom_feilds']['proposal_tradein'])) && $quotedata['main_data']['custom_feilds']['proposal_tradein'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_tradein'] : 0;
$qdownpayment = ((isset($quotedata['main_data']['custom_feilds']['proposal_down_payment'])) && $quotedata['main_data']['custom_feilds']['proposal_down_payment'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_down_payment'] : 0;
$qbankpayoff = ((isset($quotedata['main_data']['custom_feilds']['proposal_due'])) && $quotedata['main_data']['custom_feilds']['proposal_due'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_due'] : 0;
$qcredit = ($qtradeinallowance - $qbankpayoff);
if ($qcredit > 0) {
    $qcreditnote = $qcredit - $qdownpayment;
} else {
    $qcreditnote = $qcredit + $qdownpayment;
}
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
$qpreciototal = $qitemprice + $qpowerpack + $qroadassist + $qdimondceramic;
$qapr = ((isset($quotedata['main_data']['custom_feilds']['proposal_apr'])) && $quotedata['main_data']['custom_feilds']['proposal_apr'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_apr'].'%' : '';
$qquotetype = ((isset($quotedata['main_data']['custom_feilds']['proposal_type'])) && $quotedata['main_data']['custom_feilds']['proposal_type'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_type'] : '';
$newvehicle = $usedvehicle = '';
if($qquotetype!=''){
    if($qquotetype=='Used Vehicle'){
        $usedvehicle = 'XXX';
    }elseif($qquotetype=='New Vehicle'){
        $newvehicle = 'XXX';
    }
}
$qstaffassignedfname = ((isset($quotedata['main_data']['quote']['assignedtofname'])) && $quotedata['main_data']['quote']['assignedtofname'] != '') ? $quotedata['main_data']['quote']['assignedtofname'] : '';
$qstaffassignedlname = ((isset($quotedata['main_data']['quote']['assignedtolname'])) && $quotedata['main_data']['quote']['assignedtolname'] != '') ? $quotedata['main_data']['quote']['assignedtolname'] : '';
$qstaff = $qstaffassignedlname.' '.$qstaffassignedfname;

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

$qaccountnumber = ((isset($quotedata['main_data']['custom_feilds']['proposal_account_number'])) && $quotedata['main_data']['custom_feilds']['proposal_account_number'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_account_number'] : '';
$qmarbetevence = ((isset($quotedata['main_data']['custom_feilds']['proposal_pending_balance_pay_off_balance'])) && $quotedata['main_data']['custom_feilds']['proposal_pending_balance_pay_off_balance'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_pending_balance_pay_off_balance'] : '';
$customerfulladdress = $customeraddress.' '.$customercity.' '.$customerstate.' '.$customerzip;

//ableittech need to create thisvin
$customermailbox = '';

$today = date('m-d-Y');
$todaytext = date('d F Y');
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
                            <div class="mb-5">
                                <div class="row ffblock">
                                    <!-- <div class="col-sm-12 col-xs-12 text-center">
                                        </div> -->
                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6 align-self-end text-center">
                                    <?php get_company_logo_forms('','','dark') ?>
                                        <h4 class="headtext"><strong>Anejo a Oerden De Compra</strong> </h4>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        <h4 class="headmiddle">STK # <?php echo $stocknumber; ?></h4>
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                       
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="row" style="align-items: end;">
                                    <p class="col-xs-12">El presente documento constituye, para todos los fines legales pertinentes, un anejo a la orden de compra de nuestros vehículos de motor y contiene, por escrito, las divulgaciones relacionadas con el vehículo objeto de la misma.</p>
                                    <h5 class="col-xs-12 text-center">INFORMACIÓN SOBRE VEHÍCULO DE MOTOR</h5>
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> Marca <input type="text" class="inputbox fr1i1" value="<?php echo $imake;?>"/></p>
                                            <p> Modelo <input type="text" class="inputbox fr1i1" value="<?php echo $imodel;?>"/></p>
                                            <p> Tablilla<input type="text" class="inputbox fr1i1" value="<?php echo $itablilla;?>"/></p>
                                        </div>

                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="flexdiv">
                                            <p> Numero de inventario <input type="text" class="inputbox fr1i1" value="<?php echo $iserie;?>"/></p>
                                            <p> Numero de serie <input type="text" class="inputbox fr1i1" value="<?php echo $iserie;?>"/></p>
                                            <p> Millaje <input type="text" class="inputbox fr1i1" value="<?php echo $imileage;?>"/></p>
                                        </div>

                                    </div>
                                </div>
                                <p class="text-center">Mediante la presente <input type="text" class="inputbox" value="<?php echo $today;?>"/> le NOTIFICA que el vehículo de referencia:</p>
                                <ol class="listdescimal">
                                    <li>
                                        <p> Fue utilizado como:</p>
                                        <ul class="listcircle">
                                            <li>
                                                Vehículo de demostración o uso gerencial. INICIALES <input type="text" class="inputbox" />
                                            </li>
                                            <li>Vehículo de arrendamiento diario (alquiler). INICIALES <input type="text" class="inputbox" /></li>
                                            <li>Taxi, vehículo de transporte público o escolar. INICIALES <input type="text" class="inputbox" /></li>
                                            <li>Alguna otra finalidad que conlleve uso irregular o excesivo. INICIALES <input type="text" class="inputbox" /></li>
                                        </ul>
                                    </li>
                                    <li>Fue impactado y reparado con anterioridad a la venta del mismo. INICIALES <input type="text" class="inputbox" /></li>

                                    <li>
                                        <p>Fue declarado como "vehículo afectado" debido a que sufrió daños, sea por accidente o fenómenos naturales, que llevaron a la cancelación total o parcial de la garantía de fábrica.
                                            INICIALES <input type="text" class="inputbox" />
                                        </p>
                                    </li>
                                    <li>
                                        <p>Goza de una___garantía de fábrica y/o ] garantía de vehículo usado con cubierta limitada de meses o millas, lo que ocurra primero. Los demás términos, condiciones y/o exclusiones están contenidas en el correspondiente documento de garantía.
                                            INICIALES <input type="text" class="inputbox" />
                                        </p>
                                    </li>
                                </ol>
                                <p>Yo/Nosotros, <input type="text" class="inputbox" value="<?php echo $customername; ?>"/> y <input type="text" class="inputbox" /> (el/los Comprador(es) CERTIFICO /RECONOZCO que:</p>
                                <ol class="listdescimal">
                                    <li>
                                        Se me/nos ha orientado sobre mi derecho a que un mecánico de mi confianza inspeccione el vehículo de motor usado ANTES de adquirir el mismo y que he optado por l ejercer X renunciar a
                                        dicho derecho de forma libre y voluntaria INICIALES <input type="text" class="inputbox" />
                                    </li>
                                    <li>
                                        Se me/nos ha orientado sobre los términos, condiciones y cubierta de la garantía aplicable al vehículo.
                                        INICIALES <input type="text" class="inputbox" />
                                    </li>
                                    <li>3. Que he/hemos inspeccionado el Vehículo y RECONOZCO/RECONOCEMOS que este contiene el/los sello(s) de identificación vehicular (labels) requerido(s) por el gobierno federal.
                                        INICIALES <input type="text" class="inputbox" />
                                    </li>
                                    <li>
                                        Que el marbete del vehículo vence el <input type="text" class="inputbox" value="<?php echo $qmarbetevence; ?>" /> , y ASUMO la obligación de renovar el mismo a su vencimiento.
                                        INICIALES <input type="text" class="inputbox" />
                                    </li>
                                    <li>
                                        Que al momento en que suscribí /suscribimos la orden de compra y el contrato financiamiento aplicable (sea contrato de venta condicional a plazas o arrendamiento financiero) estos estaban debidamente cumplimentados (llenos) e incluían todos los términos y condiciones del financiamiento.
                                        INICIALES <input type="text" class="inputbox" />
                                    </li>
                                    <li>Para que así conste, suscribimos el presente documento, de forma libre y voluntariamente, hoy
                                        <input type="text" class="inputbox" value="<?php echo $today;?>"/>
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">

                                            <input type="text" class="inputbox tr1i1" />
                                            <p>Auto Group</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">

                                            <input type="text" class="inputbox tr1i1" value="<?php echo $customername;?>"/>
                                            <p>Comprador</p>
                                        </div>
                                        <div class="tr1p3">

                                            <input type="text" class="inputbox tr1i1" value=""/>
                                            <p>Comprador</p>
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

    .text-center {
        text-align: center;
    }

    img {
        width: 300px;
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
    }

    .headmiddle {
        font-weight: 700;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    ol {
        list-style: upper-roman;
        margin-left: 20px;
        margin-bottom: 0;
    }

    ul.listcircle {
        list-style: disc;
        margin-left: 15px;
    }

    #print_block ul.listcircle li {
        padding-left: 10px;
    }

    #print_block .listdescimal {
        list-style: decimal;
    }

    #print_block .listdescimal li {
        padding-left: 10px;
    }

    .listalpha {
        list-style: upper-alpha;
        margin-left: 20px;
    }

    .listsmallalpha {
        list-style: lower-alpha;
        margin-left: 20px;
    }

    .listsmallalpha li {
        padding: 0 10px 10px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    #print_block li {
        padding: 0 50px 7px;

    }

    .li1i8 {
        width: 100%;
    }

    .flexdiv p {
        margin-bottom: 5px;
    }

    .showprintonly {
        display: none;
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
            font-size: 11px;
            font-family: "open sans";
            /* margin: 0 !important; */
        }


        .hide-print {
            display: none;
        }

        #wrapper {
            margin-left: 0;
            margin: 0 0;
        }

        input[type="text"],
        input[type="date"] {
            height: auto;
            min-height: 11px;
            padding: 3px;
            font-size: 14px;
            line-height: 10px;
            color: #555;
            /* background-color: #eceffa !important; */
            border: none;
            border-bottom: 1px solid #333;
            border-radius: 0px;
            margin-bottom: 0px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator{
            display: none;
            -webkit-appearance: none;
        }

        strong {
            font-weight: 700;
        }

        .br-0 {
            border-right: 0px !important;
        }

        .mb-0 {
            margin-bottom: 5px;
        }

        .showprintonly {
            display: block;
        }

        .listsmallalpha li {
            padding-bottom: 5px;
        }

        .desimallist li {
            padding-left: 20px;
        }

        #wrapper {
            overflow: hidden;
            min-height: unset !important;
        }


    }
</style>

</html>