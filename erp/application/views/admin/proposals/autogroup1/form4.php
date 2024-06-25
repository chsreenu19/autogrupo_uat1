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
                                    <div class="col-sm-12 col-xs-12 text-center">
                                    <?php get_company_logo_forms() ?>
                                    </div>
                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6 align-self-end text-center">
                                        <p class="headtext">CONTRATO DE RENUNCIA AL DERECHO DE <br>SANEAMIENTO (GARANTIA DEL CODIGO CIVIL 2020)</p>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        <h4 class="headmiddle">STK # <?php echo $stocknumber; ?></h4>
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                        
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <h4><strong>FAVOR LEER DETENIDAMENTE ANTES DE INICIAR y FIRMAR</strong></h4>
                                <ol>
                                    <li>
                                        Durante el día de hoy, <?php echo $todaytext;?> hemos seleccionado, de forma libre y voluntaria, el vehículo de motor (el "Vehículo") descrito en el correspondiente contrato de compraventa u orden de compra; Iniciales
                                        <input type="text" class="inputbox li1i1" />
                                    </li>
                                    <li>Que el ejecutivo de ventas nos divulgó nuestro derecho de traer un perito mecánico para que inspeccione el Vehículo antes de la comprar el mismo, derecho que hemos ejercido o renunciado de forma libre y voluntaria; Iniciales
                                        <input type="text" class="inputbox li1i2" />
                                    </li>
                                    <li>LOS SUSCRIBIENTES, LIBRE Y VOLUNTARIAMENTE, ACEPTAN Y ACUERDAN LA SUPRESIÓN (ENTIÉNDASE LA ELIMINACIÓN) DE LA OBLIGACIÓN DE SANEAMIENTO POR (ENTIENDASE GARANTÍA CONTRA) EVICCIÓN Y/O DEFECTOS OCULTOS IMPUESTA AL VENDEDOR POR EL CÓDIGO CIVIL DE PUERTO RICO Y, A TENOR CON ELLO, RELEVAMOS DE FORMA IRREVOCABLE AL VENDEDOR DE TODA OBLIGACIÓN DE SANEAMIENTO POR EVICCIÓN Y/O DEFECTOS OCULTOS IMPUESTA POR EL CÓDIGO CIVIL DE PUERTO RICO. Iniciales
                                        <input type="text" class="inputbox li1i3" />
                                    </li>
                                    <li>Damos fe de haber recibido y leído los Artículos 1261 al 1263 y 1267 del Código Civil de Puerto Rico, por lo que la presente renuncia y relevo de responsabilidad se hace con pleno conocimiento de sus implicaciones. Iniciales
                                        <input type="text" class="inputbox li1i4" />
                                    </li>
                                    <li>
                                        En la eventualidad de que el Vehículo tenga menos de 100,000 millas registradas en el odómetro, la compra del mismo incluye la protección conferida por los términos y condiciones de cierta otra garantía limitada provista, por escrito, por el Manufacturero y/o el Vendedor. Iniciales
                                        <input type="text" class="inputbox li1i5" />
                                    </li>
                                    <li>Que hemos examinado, inspeccionado y/o probado el Vehículo y lo aceptamos sin reserva de clase alguna por encontrarlo en condiciones satisfactorias. Iniciales
                                        <input type="text" class="inputbox li1i6" />
                                    </li>
                                    <li class="li7">
                                        Que durante la referida inspección nos percatamos y/o fuimos informados de los siguientes defectos, vicios y/o condiciones del Vehículo:
                                        <input type="text" class="inputbox li1i7" />
                                        <input type="text" class="inputbox li1i8" />
                                        <input type="text" class="inputbox li1i9" />.
                                        Iniciales
                                        <input type="text" class="inputbox li1i10" />
                                    </li>
                                    <li>
                                        Reconocemos que no hemos pactado con el Vendedor un uso particular para el Vehículo y que este será destinado para el uso ordinario y corriente brindado a vehículos de motor.
                                    </li>
                                    <li>
                                        Aceptamos que la adquisición de un vehículo de motor es un gasto, no una inversión, por lo que deprecia de valor desde el momento en que es sacados de las facilidades del Vendedor. Reconocemos que el Vehículo requiere mantenimiento preventivo y el cambio regular de ciertas piezas de uso y desgaste para mantenerlo en condiciones óptimas de funcionamiento.
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p>El Comprador #1</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">&nbsp;</div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p class="text-center">El Comprador #2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="showprintonly">
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                </div>

                                <ol>
                                    <div class="showprintonly">
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                    </div>


                                    <li>
                                        <p><strong>El Artículo 1261</strong> del Código Civil de 2020 dispone:<br></p>
                                        <p>"La persona que transmite un bien a título oneroso responde por evicción y por los defectos ocultos del bien aunque lo ignorase.<br></p>
                                        <p>Igual obligación se deben entre sí quienes dividen bienes comunes.<br></p>
                                        <p> La persona obligada responde ante el adquirente y quienes lo sucedan en el derecho por cualquier causa y título".</p>
                                    </li>
                                    <li>
                                        <p><strong>El Artículo </strong> del Código Civil de 2020 dispone:<br></p>
                                        <p>"El transmitente está obligado en los términos del artículo anterior, aunque nada se exprese en el acto de enajenación o división.<br></p>
                                        <p>Las partes pueden aumentar, disminuir o suprimir esta obligación. La disminución o supresión de la responsabilidad es inválida si la parte transmitente incurre en dolo."</p>
                                    </li>
                                    <li>
                                        <p><strong>El Artículo 1263</strong> del Código Civil de 2020 dispone:<br></p>
                                        <p>"El adquirente puede optar por reclamar la subsanación o reparación de los defectos, la entrega de un bien equivalente o resolver total o parcialmente el contrato.<br></p>
                                        <p>La resolución total solo procede si la evicción o el defecto recaen sobre un aspecto determinante para la adquisición del bien. La misma regla es de aplicación en caso de adquisición conjunta de varios bienes.<br></p>
                                        <p>En caso de evicción, el adquirente también tiene derecho al resarcimiento de los daños sufridos, salvo que haya actuado con negligencia.<br></p>
                                        <p>En caso de vicio redhibitorio, el adquirente solo tiene derecho al resarcimiento de los daños sufridos si el transmitente actuó con dolo.<br></p>
                                        <p> En ambos casos, si la adquisición se hizo a riesgo del adquirente o en subasta judicial o administrativa, no se responde por el resarcimiento de los daños sufridos y de los gastos que haya incurrido para sanear el título"</p>
                                    </li>
                                    <li>
                                        <p><strong>El Artículo </strong> del Código Civil de 2020 define como redhibitorio aquel defecto oculto en el
                                            bien transmitido a título oneroso, existente al tiempo de la adquisición, que hace impropio al
                                            bien para su destino o disminuye de tal modo su utilidad que, de haberlo conocido, el adquirente
                                            no lo habría adquirido o habría dado menos por él. También se considera vicio redhibitorio:</p>
                                        (a) aquel especialmente acordado como tal por las partes.<br>
                                        (b) aquel que el transmitente garantiza que no existe, y<br>
                                        (c) la ausencia de la calidad convenida.
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p>El Comprador #1</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">&nbsp;</div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p class="text-center">El Comprador #2</p>
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

    ol {
        list-style: decimal;
        margin-left: 20px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    #print_block li {
        padding: 0 40px 10px;

    }

    .li1i8 {
        width: 100%;
    }
    .showprintonly{
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
            font-size: 12.5px;
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

        ol input[type="text"] {
            margin-bottom: 10px;
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
        .showprintonly{
            display: block;
        }


    }
</style>

</html>