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




//ableittech need to create thisvin
$customermailbox = '';

$today = date('m-d-Y');

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
                                    <div class="col-sm-12 col-xs-12 text-center">
                                    <?php get_company_logo_forms() ?>
                                    </div>
                                    <div class="col-sm-4 col-xs-4 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class="col-sm-4 col-xs-4 align-self-end text-center">
                                        <p class="headtext">ACUERDO PARA ENTREGA INMEDIATA</p>
                                        <p class="subheadtext">(Spot Delivery Agreement)</p>
                                    </div>
                                    <div class="col-sm-4 col-xs-4  text-right">
                                    <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="fr1">
                                    <p class="flexdiv">
                                        FECHA: <input type="text" class="inputbox fr1i1" value="<?php echo $today; ?>"/>
                                    </p>
                                </div>
                                <div class="fr2">
                                    <p class="flexdiv">
                                        Yo <input type="text" class="inputbox fr2i1" value="<?php echo $customername; ?>"/> hago constar que, en la fecha arriba indicada, adquirí de AUTOGRUPO
                                    </p>
                                </div>
                                <div class="fr3">
                                    <p class="flexdiv">
                                        el vehículo de motor marca <input type="text" class="inputbox fr3i1" value="<?php echo $imake; ?>"/>
                                        modelo <input type="text" class="inputbox fr3i2" value="<?php echo $imodel; ?>"/>
                                        con tablilla <input type="text" class="inputbox fr3i3" value="<?php echo $itablilla; ?>"/>
                                    </p>
                                </div>
                                <div class="fr4">
                                    <p class="flexdiv">
                                        número de serie <input type="text" class="inputbox fr4i1" value="<?php echo $iserie; ?>"/>
                                        (el "Vehículo"). INICIALES: <input type="text" class="inputbox fr4i2" />
                                    </p>
                                </div>
                                <div class="fr5">
                                    <p>
                                        RECONOZCO que la compra del Vehículo esta sujeta a una condición de financiamiento mediante la otorgación de un contrato de venta al por menor a plazos y/o contrato de arrendamiento financiero (el "Financiamiento") entre el suscribiente y el banco 
                                        <input type="text" class="inputbox fr5i1" value="<?php echo $qfinancialinstitution; ?>"/>
                                        (de aquí en adelante el "Banco"). RECONOZCO que el financiamiento puede estar condicionado al pago, por concepto de pronto, de alguna cantidad de dinero y/o a la presentación de cierta evidencia y/o documentación. <strong>Me OBLIGO Y COMPROMETO a realizar el pago y/o a proveer la documentación requerida por el Banco dentro de los cinco (5) dias de requerida. INICIALES:
                                        <input type="text" class="inputbox fr5i2" /></strong>
                                    </p>
                                </div>
                                <div class="fir6">
                                    <p>
                                        RECONOZCO que, para mi beneficio, AUTOGRUPO accedió a entregarme el Vehículo antes de que el Banco realice el desembolso del balance a financiarse. En consideración a dicha cortesía, y en la eventualidad de que el Banco reconsidere su aprobación y/o no desembolse el importe del Financiamiento por cualquier razón (incluyendo alguna acción u omisión del suscribiente), <strong> le CONCEDO Y RECONOZOCO a AUTOGRUPO el derecho de reposeer el Vehículo sin necesidad de acudir previamente al tribunal (self-help). RENUNCIO a toda reclamación, incluyendo al resarcimiento de daños y perjuicios, motivados o causados por la reposesión del Vehículo. INICIALES: <input type="text" class="inputbox fir6i1" /></strong>
                                    </p>
                                </div>
                                <div class="sr7">
                                    <p>
                                        En la eventualidad de que el Banco reconsidere su aprobación o no desembolse el importe a financiarse por cualquier razón (incluyendo alguna acción u omisión del suscribiente) y, en la alternativa a la reposesión del Vehículo, <strong> me OBLIGO y COMPROMETO a pagarle a AUTOGRUPO la totalidad del precio pactado para la compraventa del Vehículo.</strong> Dicho importe devengará intereses a un por ciento (1%) por encima del tipo pactado en el Financiamiento.
                                        <strong>INICIALES:<input type="text" class="inputbox fir7i1" /></strong>
                                    </p>
                                </div>
                                <div class="ser8">
                                    <p>
                                        En la eventualidad de que AUTOGRUPO presente algun recurso legal ante los tribunales de justicia para obtener el cobro del precio de compraventa o la posesión del Vehículo o el cobro del precio de compraventa, y sus correspondientes intereses, me  <strong>OBLIGO y COMPROMETO</strong> a pagarle una partida adicional igual al diez por ciento (10%) del precio de compraventa para compensarle los daños, honorarios y/o gastos legales.
                                        <strong> INICIALES:<input type="text" class="inputbox fir8i1" /></strong>
                                    </p>
                                </div>

                                <div class="tr1">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="tr1p3">

                                                <input type="text" class="inputbox tr1i1" />
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
        width: 30%;
    }

    .headmiddle {
        font-weight: 600;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    .tr1i1 {
        text-align: center;
        width: 100%;
    }

    .tr1p3 {
        text-align: center;
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
            font-size: 9.5px;
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


    }
</style>

</html>