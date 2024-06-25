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
$tbankpayoff = ((isset($quotedata['main_data']['custom_feilds']['proposal_due'])) && $quotedata['main_data']['custom_feilds']['proposal_due'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_due'] : 0;
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
$tfinancialinstitution = ((isset($quotedata['main_data']['custom_feilds']['proposal_bank_financing_institution'])) && $quotedata['main_data']['custom_feilds']['proposal_bank_financing_institution'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_bank_financing_institution'] : '';

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
$taccountnumber = ((isset($quotedata['main_data']['custom_feilds']['proposal_financing_institution_account_no'])) && $quotedata['main_data']['custom_feilds']['proposal_financing_institution_account_no'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_financing_institution_account_no'] : '';


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

                                    <div class=" col-xs-6 align-self-end text-left">
                                    <?php get_company_logo_forms('','','dark') ?>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                    <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        <h4 class="headmiddle">STK # <?php echo $stocknumber; ?></h4>
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                        
                                    </div>
                                    <h4 class="headtext col-xs-12 text-center"><strong>ACUERDO SUMPLEMENTARIO SOBRE VEHICULO TOMADO COMO PRONTO PAGO (Trade-in)</strong> </h4>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="row" style="align-items: end;">
                                    <div class="col-xs-12">
                                        <div class="flexdiv">
                                            <p> Fecha: <input type="text" class="inputbox fr1i1" value="<?php echo $today; ?>"/></p>
                                        </div>

                                    </div>
                                </div>
                                <p>YO <input type="text" class="inputbox" value="<?php echo $customername; ?>"/> hago constar que he entregado a AutoGrupo, en calidad de pronto pago (trade-in), el vehículo de motor marca
                                    <input type="text" class="inputbox" value="<?php echo $tmake;?>" />
                                    modelo <input type="text" class="inputbox" value="<?php echo $tmodel;?>"/>
                                    con tabilla núm <input type="text" class="inputbox" value="<?php echo $ttablilla;?>"/>
                                    número de serie <input type="text" class="inputbox" value="<?php echo $tserie;?>"/>
                                    (el "Vehículo") y que autorizo a AutoGrupo a hacer el traspaso de la titularidad del mismo a nombre de cualesquiera de sus subsiguientes adquirientes sin necesidad de haberlo traspasado previamente a nombre de AutoGrupo y, por consiguiente, relevo a AutoGrupo de toda responsabilidad que pudiera surgir de no haber traspasado el Vehículo a nombre suyo antes
                                    de venderlo al adquiriente subsiguiente. INICIALES: <input type="text" class="inputbox" />
                                </p>
                                <p>Represento que la unidad arriba descrita no tiene gravamen de hipoteca, o algún otro gravamen, incluyendo multas administrativas o de Auto Expreso, que no sea el correspondiente a la cuenta #
                                    <input type="text" class="inputbox" value="<?php echo $taccountnumber;?>"/>mantenida con el banco
                                    <input type="text" class="inputbox" value="<?php echo $tfinancialinstitution;?>"/> (el "Financiamiento"). En la eventualidad de que esta representación resulte incorrecta, me comprometo a tomar, dentro de los diez (10) días de requerido, aquellas medidas necesarias para liberar el Vehículo de todos y cada uno de los gravámenes que tenga, con la única excepción del Financiamiento.
                                    INICIALES: <input type="text" class="inputbox" />
                                </p>
                                <p>
                                    Por este medio RECONOZCO y ACEPTO que AutoGrupo no procederá a liquidar el balance del Financiamiento Pendiente de pago en el trade in hasta que haya cumplido con todas las condiciones impuestas por el banco para extender el préstamo solicitado para la unidad que se está adquiriendo en esta misma fecha, si alguna, o hasta que dicho préstamo haya sido cobrado por AutoGrupo. Igualmente, RECONOZCO y ACEPTO que AutoGrupo no procederá a liquidar el balance del Financiamiento pendiente de pago en el trade in hasta que haga hecho entrega de una certificación del Departamento de Transportación y Obras Publicas y/o el Auto Expreso confirmando que el trade in no tiene multas administrativas pendientes de pago.
                                    INICIALES <input type="text" class="inputbox" />
                                </p>
                                <p>Por este medio RECONOZCO y ACEPTO que AutoGrupo no procederá a liquidar el balance del Financiamiento Pendiente de pago en el trade in hasta que haya cumplido con todas las condiciones impuestas por el banco para extender el préstamo solicitado para la unidad que se está adquiriendo en esta misma fecha, si alguna, o hasta que dicho préstamo haya sido cobrado por AutoGrupo. Igualmente, RECONOZCO y ACEPTO que AutoGrupo no procederá a liquidar el balance del Financiamiento pendiente de pago en el trade in hasta que haga hecho entrega de una certificación del Departamento de Transportación y Obras Publicas y/o el Auto Expreso confirmando que el trade in no tiene multas administrativas pendientes de pago.
                                    INICIALES: <input type="text" class="inputbox" /></p>
                                <p>Sujeto a lo antes indicado, por este medio, AUTORIZO a AutoGrupo a liquidar el balance pendiente de pago del Financiamiento, balance que represento asciende a$
                                    <input type="text" class="inputbox" value="<?php echo number_format($tbankpayoff,2); ?>"/>
                                    y CEDO a favor de este cualquier diferencial que pueda surgir por concepto de primas de seguro no devengados, importes de contratos de servicio no devengados y/o por concepto de un balance de cancelación inferior al aquí informado.
                                    INICIALES:<input type="text" class="inputbox" />
                                </p>
                                <p>Al momento de la transacción se ha estimado que el balance a pagar el saldo del Financiamiento del Vehículo es el arriba indicado; no obstante, si al momento de liquidar dicho Financiamiento se encuentra que el balance de saldo fuera mayor al aquí informado, o si el Vehículo tuviese otras deudas o gravámenes no informados al presente, o de estar alguna multa pendiente de pago o registro ante cualquier agencia pública de Puerto Rico o los Estados Unidos de América, me comprometo a subsanar dicha deficiencia y/o a pagar dichas cantidades dentro de diez (10) desde que se me notifique la existencia de las mismas. En todo caso, RELEVO a AutoGrupo de toda responsabilidad u obligación asociada con, y me comprometo a indemnizarle (reembolsarle), cualesquiera pagos que realice por dichos conceptos.
                                    <br>INICIALES: <input type="text" class="inputbox" />
                                </p>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">

                                            <input type="text" class="inputbox tr1i1" value="<?php echo $customername;?>"/>
                                            <p>Cliente</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">

                                            <input type="text" class="inputbox tr1i1" value=""/>
                                            <p>Cliente</p>
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

    .headmiddle {
        font-weight: 700;
        font-size: 15px;
        margin: 0 0 5px 0;
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
            font-size: 12px;
            font-family: "open sans";
            /* margin: 0 !important; */
        }

        .hide-print {
            display: none;
        }

        #wrapper,
        #setup-menu-wrapper {
            margin-left: 0;
            margin: 0 0;
            overflow: hidden;
            min-height: unset !important;
        }

        input[type="text"] {
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



    }
</style>

</html>