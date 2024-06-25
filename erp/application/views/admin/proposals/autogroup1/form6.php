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

$qmarbete = ((isset($quotedata['main_data']['custom_feilds']['proposal_marbete_2'])) && $quotedata['main_data']['custom_feilds']['proposal_marbete_2'] != '') ? $quotedata['main_data']['custom_feilds']['proposal_marbete_2'] : '';




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
                                    <!-- <div class="col-sm-12 col-xs-12 text-center">
                                        </div> -->
                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6  text-center">
                                    <?php get_company_logo_forms() ?>
                                        <p class="headtext">GARANTIA LIMITADA</p>
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
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> Marca <input type="text" class="inputbox fr1i1" value="<?php echo $imake;  ?>"/></p>
                                            <p> Modelo <input type="text" class="inputbox fr1i1" value="<?php echo $imodel;  ?>"/></p>
                                            <p> Núm. de Serie <input type="text" class="inputbox fr1i1" value="<?php echo $iserie;  ?>"/></p>
                                            <p> Millaje <input type="text" class="inputbox fr1i1" value="<?php echo $imileage;  ?>"/></p>
                                        </div>

                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="flexdiv">
                                            <p> Año <input type="text" class="inputbox fr1i1" value="<?php echo $iyear;  ?>"/></p>
                                            <p> Tablilla <input type="text" class="inputbox fr1i1" value="<?php echo $itablilla;  ?>"/></p>
                                            <p> No. de Marbete <input type="text" class="inputbox fr1i1" value="<?php echo $qmarbete;  ?>"/></p>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <ol>
                                    <li>
                                        <p>TERMINOS GENERALES DE LA GARANTIA LIMITADA</p>
                                        <p>
                                            AUTO GRUPO (el "Vendedor") provee una garantía limitada ("Garantía Limitada") a todo vehículo de motor usado que usted adquiera de nuestros concesionarios. La Garantía Limitada asumirá el costo de adquisición de cualquier componente o pieza cubierta (según establecida en el Articulo II de la presente) y el costo de la mano de obra requerida para reemplazar el componente o la pieza defectuosa.</p>
                                        <p> El componente o las piezas a ser adquiridas conforme a la presente Garantia Limitada no necesariamente tendrá que ser nuevas u originales y el Vendedor podrá, a su entera y única discreción, reemplazar cualesquier componente o pieza(s) cubierta(s) por piezas de reemplazo no originales (Piezas de Reemplazo) o por componentes o piezas reconstruidas (Piezas Remanufacturadas) y/o usadas.
                                        </p>
                                    </li>
                                    <li>
                                        <p>DURACION O TÉRMINO DE LA GARANTIA:</p>
                                        <p>La GARANTIA LIMITADA provista por el Vendedor a los vehículos de motor usados adquiridos en nuestros concesionarios tiene una duración de tiempo limitada. La duración de la garantía será determinada a base del millaje reflejado por el odómetro del vehículo al momento de la compraventa:</p>
                                        <ul class="listalpha">
                                            <li>Menos de 36,000 millas al momento de la venta- Cuatro (4) meses o cuatro mil (4,000) millas, lo que ocurra primero;</li>
                                            <li>Mas de 36,000, pero menos de 50,000 millas- Tres (3) meses o tres mil (3,000) millas, lo que ocurra primero;</li>
                                            <li>Mas de 50,000 millas basta 100,000 millas - Dos (2) meses o dos mil (2,000) millas, lo que ocurra primero.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <p>COMPONENTES O PIEZAS CUBIERTAS POR LA GARANΤΙΑ:</p>
                                        <p>El Vendedor garantiza a nuestros Clientes que todo vehículo de motor usado que sea adquirido de nuestras facilidades estará, al momento de la compraventa, libre de desperfectos mecánicos en los componentes o piezas enumerados a continuación (las "Piezas Cubiertas") y, de no estarlo, se compromete a reparar el componente o pieza defectuosa sin costo al Cliente:</p>
                                        <ul class="listalpha">
                                            <li>
                                                <strong>MOTOR -</strong> Incluye piezas internas del motor incluyendo bomba de agua, bomba de gasolina (mecánica o eléctrica), múltiple de admisión y escape, bloque y volanta. En motores rotativos incluye las cajas de los rotores.
                                            </li>
                                            <li>
                                                <strong>TRANSMISION -</strong> Incluye caja de transmisión, todas las piezas internas de la transmisión y el convertidor de torsión.
                                            </li>
                                            <li>
                                                <strong>EJE IMPULSOR-</strong> Caja de tracción trasera y/o delantera, según aplique, con sus partes internas, ejes impulsores, eje de cardan y uniones universales.
                                            </li>
                                        </ul>
                                    </li>
                                    <div class="showprintonly">
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                    </div>
                                    <li>
                                        <p>PROCEDIMIENTO PARA RECLAMAR LA GARANTIA DEL VENDEDOR:</p>
                                        <p>El cliente tendrá, como requisito indispensable para reclamar la garantía provista por el Vendedor, llevar el vehículo de motor al lugar donde adquirió el mismo para la celebración de una inspección. El Vendedor inspeccionara el Vehículo y determinara si la condición presentada por el mismo está o no cubierta por la presente Garantía Limitada. En la eventualidad de que la condición presentada por el Vehículo estuviese cubierta por la presente Garantía Limitada, el Vendedor reparara el Vehículo o le proveerá al Cliente el nombre y la dirección del centro de servicio donde deberá llevar el vehiculo para recibir el correspondiente servicio de reparación. El Cliente asumirá la responsabilidad y el costo, si alguno, de transportar el Vehículo al lugar donde adquirió el mismo y/o al centro de servicio designado por el Vendedor. Sera requisito indispensable para poder reclamar reparación con cargo a la presente Garantía Limitada que el Cliente produzca, previo requerimiento al efecto, evidencia de haber efectuado todos los servicios de mantenimiento requeridos para el adecuado y óptimo funcionamiento del Vehículo.</p>
                                        <p>Siempre y cuando el Cliente solicite, dentro del correspondiente periodo de la Garantía Limitada, la reparación de una Pieza Cubierta a un vehículo de motor usado, que no sea utilizado para la explotación comercial y/o la transportación colectiva, adquirido del Vendedor, y la reparación exceda un periodo mayor de cinco (5) días calendario, excluyendo el domingo; el Vendedor le proveerá al Cliente un vehículo de motor sustituto para su transportación personal. El vehículo de motor sustituto tendrá una transmisión similar (automática o manual) al vehículo dejado en reparación.</p>
                                    </li>
                                    <li>
                                        <p>OTRAS EXCLUSIONES A LA CUBIERTA DE LA GARANTIA LIMITADA</p>
                                        <ol class="desimallist">
                                            <li>
                                                La Garantía Limitada otorgadas por El Vendedor NO incluye el costo de la(s) pieza(s) y/o de mano de obra asociado con el reemplazo de algunas pieza(s) de uso y desgaste (Pieza de Uso y Desgaste). Será Pieza de Uso y Desgaste toda aquella(s) cuyo deterioro en funcionamiento sea una consecuencia normal del uso del vehículo y cuyo reemplazo sea requerido por motivo del desgaste normal de alguna pieza. Ejemplo de piezas de uso y desgaste incluyen, pero no se limitan a, las llantas, pastillas de frenos, bushings, puntos del motor, etc.
                                            </li>
                                            <li>Se excluye, además, de la cobertura de la Garantía Limitada el costo de la(s) pieza(s) o mano de obra asociada con la realización del mantenimiento requerido para el adecuado y óptimo funcionamiento del vehículo de motor.</li>
                                            <li>
                                                La cubierta provista por la Garantía Limitada NO incluye el costo de la(s) pieza(s) o mano de obra requerida para reparar alguna condición que surja como consecuencia, directa o indirecta, de:
                                                <ul class="listsmallalpha">
                                                    <li>Falta de mantenimiento del vehículo de motor;</li>
                                                    <li>Abuso del vehículo de motor;</li>
                                                    <li>Negligencia o descuido del vehículo de motor.</li>
                                                    <li>Accidentes de transito:</li>
                                                    <li>Intervenciones de terceras personas no autorizadas por El Vendedor, sean estos mecánicos licenciados o no;</li>
                                                    <li>Factores ambientales (como salitre, sal y/o contaminación ambiental) o naturales;</li>
                                                    <li>La explotación comercial del vehículo de motor,</li>
                                                    <li>La alteración o desviación de algún componente del Vehículo de Motor de los parámetros establecidos por el manufacturero del mismo;</li>
                                                    <li>La utilización del vehículo de motor en competencias automovilisticas, independientemente que sean celebras en las vias de rodaje publica o en pista habilitadas;</li>
                                                    <li>Las condiciones de las vías de rodaje públicas o privadas;</li>
                                                </ul>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <p>El Cliente: </p>
                                            <input type="text" class="inputbox tr1i1" />
                                            <p>(Customer Sign)</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">&nbsp;</div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <p>Fecha:</p>
                                            <input type="text" class="inputbox tr1i1" value="<?php echo $today; ?>"/>
                                            <p class="text-center">(Current Date)</p>
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
        list-style: upper-roman;
        margin-left: 20px;
        margin-bottom: 0;
    }

    .desimallist {
        list-style: decimal;
        /* margin-left: 20px; */
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
        padding: 0 50px 10px;

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

        .showprintonly {
            display: block;
        }
        .listsmallalpha li{
            padding-bottom: 5px;
        }
        .desimallist li{
            padding-left: 10px;
        }


    }
</style>

</html>