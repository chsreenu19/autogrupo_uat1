<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');
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
                                    
                                        <h4 class="headtext"><strong>Garantia del tren Motriz Principal </strong> </h4>
                                        <p>Página de Información</p>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                    <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="firstblock">
                                    <div class="row">
                                        <div class="inputsecr1c1 col-xs-6">
                                            <label>Garantia Limitada Núm.</label>
                                            <input type="text" class="inputbox " />
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <p class="text-center middlehead">COMPRADOR ("USTED")</p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label> Nombre </label>
                                                    <input type="text" class="inputbox " value="<?php echo $customername;?>"/>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label> Teléfono </label>
                                                    <input type="text" class="inputbox " value="<?php echo $customerhomephone;?>"/>
                                                </div>
                                                <div class="col-xs-12">
                                                    <label> Dirección </label>
                                                    <input type="text" class="inputbox " value="<?php echo $customerfulladdress;?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inputsecr1c1 col-xs-6">
                                            <label>Fecha de Compra</label>
                                            <input type="text" class="inputbox " value="<?php echo $today; ?>"/>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <p class="text-center middlehead">VEHÍCULO</p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label> Marca y Modelo </label>
                                                    <input type="text" class="inputbox " value="<?php echo $imake.' '.$imodel;?>"/>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label> Año del Vehículo </label>
                                                    <input type="text" class="inputbox " value="<?php echo $iyear;?>"/>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label> VIN# </label>
                                                    <input type="text" class="inputbox " value="<?php echo $iserie;?>"/>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label> Lectura del Odometro </label>
                                                    <input type="text" class="inputbox " value="<?php echo $imileage;?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p class=" middlehead">
                                                CONCESIONARIO
                                            </p>
                                        </div>
                                        <div class="col-xs-3">
                                            <label> Nombre del Concesionario </label>
                                            <input type="text" class="inputbox " value="<?php echo get_option('invoice_company_name');?>"/>
                                        </div>
                                        <div class="col-xs-3">
                                            <label>Teléfono</label>
                                            <input type="text" class="inputbox " value="<?php echo get_option('invoice_company_phonenumber');?>"/>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Dirección</label>
                                            <input type="text" class="inputbox " value="<?php echo get_option('invoice_company_address').' '.get_option('invoice_company_city').' '.get_option('invoice_company_postal_code').' '.get_option('company_state').' '.get_option('invoice_company_country_code');?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="align-items: end;">
                                    <h4 class="col-xs-12 text-center"><strong>Términos y Condiciones</strong>
                                    </h4>
                                    <div class="col-xs-12">
                                        <p>
                                            Esta Garantía es emitida por el Concesionario al Comprador ("Usted"), como parte de la compra y en relación con el Vehículo, según cada uno está identificado en la Página de Información. El Concesionario ha nombrado a Premier Warranty Services, LLC (el "Administrador") como el administrador autorizado de los servicios provistos por esta Garantía. Ciertos términos que aparecen en mayúsculas se refieren a la información que se indica en la Página de Información. De tener alguna pregunta, puede contactar al Administrador llamando al 787-300-2050 o escribiendo al PO Box 191772, San Juan, Puerto Rico 00919- 1772.
                                        </p>
                                        <p>Vigencia de esta Garantía. Esta Garantía comienza en la Fecha de Compra y se mantendrá vigente mientras Usted sea el dueño del Vehículo, y expirará cuando Usted deje de ser el dueño del Vehículo. Esta Garantía no es cancelable ni transferible.</p>
                                        <ol class="listroman">
                                            <li>
                                                DEFINICIÓN DE TÉRMINOS IMPORTANTES
                                                <p>
                                                    Cuando se utilicen en esta <strong>Garantía,</strong> los siguientes términos aparecerán en mayúsculas y tendrán el significado que se atribuye a continuación:
                                                </p>
                                                <p>
                                                    <strong>"Vehículo", "Fecha de Compra"</strong> y <strong>"Concesionario"</strong> se refieren a la información establecida en la <strong>Página de Información</strong>.
                                                </p>
                                                <p>
                                                    <strong>"Usted"</strong> y <strong>"Su"</strong> se refieren a la persona natural identificada en la <strong>Página de Información</strong> como el Comprador y dueño del <strong>Vehículo.</strong>
                                                </p>
                                                <p>
                                                    "Administrador" significa Premier Warranty Services, LLC, P.O. Box 191772, San Juan, Puerto Rico 00919-1772, 787-300-2050, como el administrador autorizado por el Concesionario para los servicios provistos por esta Garantía.
                                                </p>
                                                <p>
                                                    "Avería" significa la falla de una pieza original o de repuesto cubierta por esta Garantía para realizar la(s) función(es) para la(s) cual(es) fue diseñado en un servicio normal, siempre que haya recibido todos los mantenimientos programados, conforme a lo recomendado por el fabricante en el manual del propietario del Vehículo.</p>

                                                <p>"Avería" no incluye la reducción gradual del rendimiento operativo causada por el uso y el desgaste natural cuando no ha ocurrido una falla.
                                                </p>
                                                <p>"Costo" son los cargos razonables y habituales por piezas y mano de obra necesarios para reparar o reemplazar las piezas cubiertas. Estos cargos no deberán exceder el precio al por menor de piezas sugerido por el fabricante, ni los costos de mano de obra derivados de publicaciones de tiempo de mano de obra reconocidas a nivel nacional.

                                                </p>
                                                <p>
                                                    "Deducible" se refiere al cargo de Doscientos Dólares ($200.00) que Usted deberá pagar por visita por las reparaciones cubiertas por esta Garantía, según se indica en la Página de Información.
                                                </p>
                                                <p>
                                                    "Taller de Reparación" significa un concesionario de automóviles con derechos de franquicia o taller de reparación debidamente licenciado que ofrezca una garantía escrita de piezas y mano de obra para las reparaciones cubiertas de no menos de 6 meses y 6,000 millas. Las reparaciones realizadas por cualquier Taller de Reparación
                                                    deben recibir la autorización del Administrador antes de comenzar.
                                                </p>
                                                <p>
                                                    "Propósitos Comerciales" significa que Su Vehículo se utiliza para propósitos comerciales, incluyendo los siguientes ejemplos: acarreo, trabajo de construcción, uso principal fuera de la carretera, servicio de recogido y/o entrega, arrendamiento diario, transporte de pasajeros por encargo (servicios de taxi, limosina, viaje compartido o "ride-sharing" como Uber, Lyft, etc., guagua o carro público), operaciones de grúa o de servicio en la carretera, uso gubernamental o militar, servicios policíacos, de bomberos, de ambulancia o de otra clase de emergencias, remoción de nieve, uso mancomunado por una compañía ("company pool use") o para viaje de negocios
                                                    cuando el Vehículo es utilizado por más de un conductor."
                                                </p>
                                            </li>
                                            <li>BENEFICIOS Y COBERTURA DE ESTA GARANTÍA
                                                <ul class="listcapalpha">
                                                    <li>
                                                        Averia
                                                        <p>El Administrador pagará a un Taller de Reparación el Costo de reparación de Su Vehículo, menos el Deducible, por cualquier Avería de las siguientes piezas que ocurra durante la vigencia de esta Garantía. Si el Taller de Reparación que Usted haya escogido no acepta pago directo del Administrador, el Administrador le reembolsará Su pago por el Costo de reparación, menos Su Deducible, siempre y cuando Usted le presente una copia de la factura emitida por el Taller de Reparación. A opción del Administrador, dependiendo de la disponibilidad de las piezas, la antigüedad y el millaje del Vehículo, la piezas utilizadas en reparaciones cubiertas podrán incluir piezas de reemplazo nuevas, reacondicionadas, usadas o no originales. Las piezas no enumeradas no están cubiertas.</p>
                                                        <ol class="listdecimal">
                                                            <li>MOTOR:
                                                                <p>
                                                                    Motor a gasolina: Bloque del cilindro, y todas las piezas internas lubricadas incluyendo, cigüeñal, barra y rodamientos principales, rodamientos de leva, tapones de expansión (congelamiento), bielas, pasadores de articulación, pistones, aros del pistón, árbol de levas, cojinete del árbol de levas, elevadores, culata, válvulas y guías, resortes de válvulas, balancines (seguidores de leva), varillas impulsoras, caja de la cadena de distribución (cubierta), cadena de distribución y ruedas dentadas, poleas y correa de distribución, tensor de la correa de distribución, colectores de entrada y salida, volante, ejes de balance/ balancines, amortiguador de sacudidas y perno de retén, polea del cigüeñal, cubiertas de válvulas, depósito de aceite, bomba de aceite y válvula de seguir-dad, mangueras de enfriamiento del aceite del motor, adaptador/caja del filtro de aceite, sistema de monitoreo de presión de aceite, soportes del motor, bomba de agua, sistema de monitoreo de temperatura, termostato y caja, bomba de suministro de combustible, bomba de vacío, varilla del nivel del aceite y tubo, sujetadores para los componentes detallados anteriormente.
                                                                    Motores Turbo, Sobrealimentados, Rotativos, Diesel, Híbridos o Mejorados: Todas las piezas detalladas anteriormente o piezas equivalentes, y además: turbocompresor, controlador de descarga, inter-refrigerador, tubos rígidos, compresor, embrague y polea, válvula de derivación, bomba de inyección, mangueras y boquillas.
                                                                </p>
                                                            </li>
                                                            <li>TRANSMISIÓN:
                                                                <p>Automática: Caja y todas las piezas lubricadas internas incluyendo: bomba de aceite, cuerpo de la válvula, convertidor de torque, modulador de vacío, regulador, eje principal, embragues, bandas, tambores, juegos de transmisión, rodamientos, casquillos, aros de sellado, cable TV, solenoides, unidad de control de cambio electrónica, soportes de transmisión, enfriador, mangueras y tubos rígidos de enfriamiento, varilla del nivel del aceite y tubo, sujetadores para los componentes detallados anteriormente.
                                                                </p>
                                                                <p>
                                                                    Estándar: Caja y todas las piezas lubricadas internas incluyendo; eje principal, juegos de transmisión, horquillas de cambios, sincronizadores, rodamientos, casquillos, sujetadores para los componentes detallados anteriormente.
                                                                    Caja de transferencia (vehículos 4X4): Caja y todas las piezas internas lubricadas incluyendo: eje principal, juegos de transmisión, cadena y ruedas dentadas, rodamientos, casquillos, soportes, sujetadores para los componentes detallados anteriormente, componentes de engranaje electrónico y de vacio.

                                                                </p>
                                                                </p>
                                                            </li>
                                                            <li>TRACCION DELANTERA
                                                                <p>
                                                                    Caja de transmisión final, y todas las piezas internas incluyendo: carcaza de transmisión, juegos de engranajes, cadena y ruedas dentadas, rodamientos, casquillos, semiejes, juntas universales de transmisión, rodamientos de bujes del eje delantero, ensambles de buje de bloqueo (4X4), soporte del eje de transmisión, sujetadores para los componentes detallados anteriormente.
                                                                </p>
                                                            </li>
                                                            <li>TRACCIÓN TRASERA
                                                                <p>Caja del eje de transmisión, y todas las piezas internas lubricadas, incluyendo: la carcasa de transmisión, juegos de engranajes, rodamientos, casquillos, paquete del embrague deslizante limitado, semiejes de, rodamientos de bujes del eje trasero, ejes de transmisión, juntas universales, soporte del eje de transmisión, sujetadores para los componentes detallados anteriormente.</p>
                                                            </li>
                                                            <li>IMPUESTOS Y LÍQUIDOS
                                                                <p>Impuestos municipales y estatales (IVU) asociados al Costo, y los líquidos necesarios para completar las reparaciones autorizadas.</p>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li>
                                                        Asistencia de Emergencia en la Carretera
                                                        <p>La Asistencia de Emergencia en la Carretera está disponible las 24 horas del día, los 365 días del año, en Puerto Rico, por hasta diez (10) años desde la Fecha de Compra de Su Vehículo, excepto si esta Garantía termina antes de dicho periodo. Usted sólo tendrá que pagar por los servicios y gastos cubiertos que superen los $100 por caso, y cualesquiera servicios y gastos no cubiertos. La Asistencia de Emergencia en la Carretera sólo está disponible para el Vehículo. La Asistencia de Emergencia en la Carretera incluye los siguientes servicios:
                                                        </p>
                                                        <ul class="listcircle">
                                                            <li> Asistencia de Remolque - cuando Su Vehículo no funcione o no esté seguro para manejar, será remolcado hasta el Taller de Reparación más cercano, o a otro sitio que Usted solicite.</li>
                                                            <li>Asistencia ante Pinchaduras de Neumáticos - el servicio consiste en la remoción del neumático pinchado y Su recambio por el neumático repuesto.</li>
                                                            <li>Servicio de Entrega de Combustible, Aceite, Líquidos y Agua - será atendida todo suministro de emergencia de aceite, líquidos del motor y agua si Su Vehículo lo necesita con urgencia tal como fuera indicado por los medidores o las luces del tablero. Se entregará suministro de combustible si Su Vehículo se quedara sin combustible.</li>
                                                            <li>Asistencia de Cerrajería - si Sus llaves quedaron trancadas dentro de Su Vehículo, se le proporcionará asistencia para que pueda entrar en él.</li>
                                                            <li>Asistencia de Baterías - si ocurriera una falla de la batería, se le proporcionará un paso de corriente ("jump-start") para arrancar Su Vehículo.
                                                            </li>
                                                            <p>La Asistencia de Emergencia en la Carretera es proporcionada por Connect Road Assist, LLC ("Connect"). Para recibir este beneficio, Usted deberá:</p>
                                                            <li>Comunicarse con Connect al 787-919-0368 para solicitar asistencia y un proveedor de servicios será despachado para ayudarlo; y</li>
                                                            <li>Permanecer con Su Vehículo cuando llegue el proveedor de servicios y mientras se brinda el servicio.
                                                            </li>
                                                        </ul>
                                                        <p>En caso de que el servicio no se pueda obtener a través de Connect, Usted recibirá un número de autorización para recibir un reembolso de los pagos realizados por los servicios obtenidos de otros proveedores, sujeto a las limitaciones establecidas en esta Garantía. Los servicios no obtenidos de acuerdo con este procedimiento no
                                                            serán reembolsados.
                                                        </p>
                                                        <p>Sólo está cubierta una incapacidad del Vehículo por cada tipo de servicio durante cualquier período de 72 horas.</p>
                                                        <p>Los beneficios de Asistencia de Emergencia en la Carretera no se proporcionarán para las siguientes situaciones o circunstancias: (a) emergencias que resulten del uso de intoxicantes o narcóticos o del uso del Vehículo en la comisión de un delito; (b) costo de piezas repuestas, llaves de reemplazo, fluidos, lubricantes o el costo de combustible, material, mano de obra adicional relacionada con el remolque o el costo de instalación de los productos; (c) remolque, montaje u otro servicio que no sea de emergencia (incluido el remolque hacia o desde una estación de servicio, garaje o taller de reparación para trabajos de reparación); (d) extracción o arrastre; (e)
                                                            reparación de neumáticos; (f) motocicletas, camiones de más de una tonelada y media de capacidad, vehículos de más de 20 años o fuera de fabricación durante 10 años o más, taxis, limusinas u otros vehículos comerciales, vehículos recreativos (RV), remolques de camping, remolques de viaje, o cualquier vehículo a remolque; (g)
                                                            impuestos o multas; (h) daño o inutilización debido a colisión, incendio, inundación o vandalismo; (i) un vehículo que no está en condiciones seguras para ser remolcado o reparado o que puede resultar en daños al vehículo si es remolcado o reparado, o en caminos que no se mantienen regularmente (como playas de arena, campos abiertos, bosques y áreas designado como no transitable debido a construcción, etc.); (i) remolque bajo la dirección de un oficial de la ley relacionado con obstrucción del tráfico, incautación, abandono, estacionamiento ilegal u otras violaciones de la ley; (k) llamadas de servicio repetidas para un vehículo que necesita mantenimiento o reparación de rutina; o (l) servicios recibidos independientemente de Connect sin autorización previa.
                                                        </p>
                                                        <p>Para Asistencia de Emergencia en la Carretera, llame libre de costo al 787-919-0368.</p>

                                                    </li>
                                                </ul>
                                            </li>
                                            <li>LIMITACIONES Y EXCLUSIONES DE ESTA GARANTÍA
                                                <ol class="listcapalpha">
                                                    <li>Limitaciones de la cubierta provista por esta Garantía
                                                        <ol class="listdecimal">
                                                            <li>Laresponsabilidad asumida y la cubierta provista bajo esta Garantía para cualquier Avería está limitada al Costo de reparar o reemplazar las piezas cubiertas que sufren una falla.
                                                            </li>
                                                            <li>El total de todos los Costos cubiertos durante la Vigencia de esta Garantía, acumulativamente por todas las Averías, no excederá el valor comercial de Su Vehículo al momento de la falla, computado de acuerdo con la Guía Oficial de Automóviles Usados de la National Automobile Dealers Association.</li>
                                                            <li>Esta Garantía no provee cubierta o beneficios cuando una Avería en la medida que esté cubierta por alguna garantía o certificación del fabricante, una póliza de seguro o un contrato de servicio sobre el Vehículo, o por una Avería para la cual el fabricante del Vehículo ha anunciado púbicamente su responsabilidad, incluyendo boletines de servicio. </li>
                                                            <li>Esta Garantía no aplica ni provee cubierta cuando el comprador o dueño del Vehículo es una corporación u otro tipo de persona jurídica.</li>
                                                            <li>Todas las garantías implícitas que puedan surgir en virtud de Ley, incluyendo todas las garantías implícitas de comerciabilidad o aptitud para un propósito específico, se limitan a la duración de esta Garantía.</li>
                                                            <li>Esta Garantía no cubre daños incidentales o consecuentes.</li>
                                                            <li>Esta Garantía aplica solamente a Averías que ocurran dentro de Puerto Rico.</li>
                                                        </ol>
                                                    </li>
                                                    <li>Servicios, piezas y equipos que no están cubiertos
                                                        <ol class="listdecimal">
                                                            <li>Los servicios de mantenimiento y piezas descritas bajo los requisitos de mantenimiento, tal como aparecen en esta Garantía o en el programa de mantenimiento del fabricante para Su Vehículo.</li>
                                                            <li>Servicios de mantenimiento y piezas normales incluyendo la puesta a punto ("tune up") del motor (incluye bujías de encendido, bujías incandescentes, cables de encendido, tapa del distribuidor y rotor), carburador, baterías, filtros, lubricantes o líquidos, gas refrigerante del aire acondicionado, líquido refrigerante del motor, todas las mangueras y correas (no especificamente detalladas), escobillas del limpiaparabrisas, pastillas de freno y zapatas, rotores y tambores de freno, alineación de la suspensión, fundas de velocidad constante, cubiertas de rueda, llantas, ruedas, balanceo, amortiguadores mecánicos, sistema de escape, convertidor catalítico, disco del embrague de fricción y plato de empuje, y cojinete del desembrague.</li>
                                                            <li>Vidrios, marco de los vidrios y adhesivos de sujeción, faros herméticos, bombillas, lentes, rebordes, molduras, metal brillante, tapizado, capota de vinilo o convertible, pintura, plancha, parachoques, alineación de piezas de la carrocería, piezas flexibles de la carrocería, paneles de las puertas, armazón estructural, soldaduras estructurales y montajes desmontables de capotas rígidas.</li>
                                                            <li>Accesorios o equipos de posventa, componentes y sistemas no instalados por el fabricante, incluyendo entre otros: sistemas anti-robo, detectores de radar, radios
                                                                "cb" (de banda ciudadana), equipo de radio y altavoz, control de velocidad de crucero, techo solar o corredizo, dispositivos a energía solar, teléfonos, TV, video, reproductor de DVD y componentes y artefactos relacionados.
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li>Causas o circunstancias en las que no se cubrirán los costos o reparaciones.
                                                        <ol class="listdecimal">
                                                            <li>Por cualquier costo que esté o haya estado cubierto bajo cualquier otra garantía del Vehículo, ya sea que dicha otra garantía esté o no vigente o haya sido anulada por el fabricante, sin importar si se cumple o no con dicha otra garantía. Si la garantía original del Vehículo es declarada nula, esta Garantía no cubrirá el Vehículo hasta la fecha de finalización programada de dicha garantía original.</li>
                                                            <li>Si Su Vehículo ha sido declarado pérdida total, en salvamento o para recuperación de piezas, o chatarra.</li>
                                                            <li>Cuando las reparaciones se llevan a cabo sin la autorización previa del Administrador, excepto cuando se requieran reparaciones de emergencia. Véase la Sección IV-A (Qué hacer en caso de una Avería).</li>
                                                            <li>Por gastos cobrados por la eliminación de materiales nocivos para el medio ambiente.</li>
                                                            <li>Por gastos cobrados por la eliminación de materiales no específicos. Ejemplos de ello incluyen paños y materiales limpieza misceláneos.</li>
                                                            <li>Por fallas causadas o que tengan que ver con colisión, incendio, robo, vandalismo, disturbios civiles, actos terroristas, guerra, explosiones, rayos, terremotos, huracanes, tormentas tropicales, erupciones volcánicas, temporales de viento, granizo, agua, heladas o inundaciones.</li>
                                                            <li>Por pérdida de tiempo, pérdida económica, contratiempos, alojamiento, gastos de flete, gastos fundamentales (depósito reembolsable al Taller de Reparación por piezas que sean re-fabricadas o reconstruidas), gastos de almacenamiento u otras pérdidas por daños consecuentes que hayan sido resultado de una Avería cubierta bajo esta Garantía.</li>
                                                            <li>Por una falla causada por líquidos contaminados o donde estos líquidos hayan contribuido a la falla.</li>
                                                            <li>Por cualquier falla causado por contaminación, recalentamiento, falta de líquido refrigerante o lubricantes, falta de viscosidad del aceite, sedimentos o flujo de aceite restringido.</li>
                                                            <li>Por una falla causada por remolcar un remolque o cualquier otro vehículo a menos que Su Vehículo esté equipado para esto, según la recomendación del fabricante.</li>
                                                            <li>Por una falla causada por usar Su Vehículo para correr carreras u otras competencias.</li>
                                                            <li>Por una falla causada por, o que tenga que ver con modificaciones, salvo que dichas modificaciones hayan sido realizadas por el fabricante (por ej., neumático de mayor tamaño, juegos de elevación, piezas o sistemas de rendimiento de posventa).</li>
                                                            <li>Por cualquier daño o pérdida consecuente o accidental en que Su Vehículo podría participar en una colisión causada por algo que tenga que ver con la falla de un componente cubierto por esta Garantía. </li>
                                                            <li>Por la reparación de válvulas y/o aros con el propósito de levantar la compresión del motor cuando no ha ocurrido una Avería.</li>
                                                            <li>Para corregir una imperfección estética.</li>
                                                            <li>Por una falla causada por abuso, uso inadecuado, alteraciones, o falta de mantenimiento habitual, según lo recomendado en los requisitos de mantenimiento de esta Garantía y/o en el programa de mantenimiento del fabricante para Su Vehículo.</li>
                                                            <li>Por una falla causada por óxido o corrosión relacionados con el clima.</li>
                                                            <li>Por una falla de una pieza cubierta como resultado de la falla de una pieza no cubierta.</li>
                                                            <li>Si Su Vehículo es usado para Propósitos Comerciales.</li>
                                                            <li>Si Su Vehículo se utiliza como taxi, patrulla de policía u otro vehículo de emergencia.</li>
                                                            <li>Por un falla causada por, o que tenga que ver con equipos, componentes o sistemas no instalados por el fabricante.</li>
                                                            <li>Si el odómetro de Su Vehículo se ha detenido, modificado o no representa correctamente las millas reales de Su Vehículo.</li>
                                                            <li>Para reparar, reemplazar, ajustar o alinear cualquier pieza no cubierta por esta Garantía, a menos que sea requerido en conjunto con la reparación de una pieza cubierta.</li>
                                                            <li>Por una falla previamente existente o causada por una condición que existía antes de la Fecha de Compra.</li>
                                                            <li>Por costos de diagnóstico, desmontaje o montaje, si Su reparación no está cubierta o si ha sido denegada.</li>
                                                            <li>Por una falla que sea resultado directo de un defecto mecánico o estructural, cuando el fabricante haya anunciado públicamente el retiro del mercado de los vehículos con el propósito de corregir dicho defecto.</li>
                                                            <li>Por pérdida adicional o daño ocasionado por Usted o el operador del Vehículo no haber tomado todas las precauciones razonables para proteger el Vehículo de cualquier otra pérdida o daño después de que haya ocurrido o se haya señalado una Avería.</li>
                                                            <li>Por reparaciones efectuadas únicamente para cumplir o mantener cualquier estándar de emisión gubernamental.</li>
                                                            <li>Por daños causados al motor del Vehículo como resultado de la ingestión de agua a través del sistema de toma de aire (denominada comúnmente como ingestión de agua).</li>
                                                            <li>Por reparaciones de pérdidas de agua o de aire, ruidos estridentes, de viento y chirridos.</li>
                                                            <li>Por fallas que ocurran o requieran reparación fuera de Puerto Rico.</li>

                                                        </ol>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li>SUS DEBERES Y RESPONSABILIDADES
                                                <ul class="listcapalpha">
                                                    <li>Qué hacer en caso de una Avería:
                                                        <ol class="listdecimal">
                                                            <li>
                                                                Si Usted sufre una Avería, Usted deberá:
                                                                <ul class="listcircle">
                                                                    <li>Valerse de todos los medios razonables para proteger Su Vehículo de daños adicionales.</li>
                                                                    <li>Informar la Avería al Administrador tan pronto como sea posible llamando al: 787-300-2050</li>
                                                                    <li>Obtener la autorización del Administrador antes de comenzar cualquier reparación cubierta por esta Garantía, excepto cuando una reparación de emergencia sea necesaria.</li>
                                                                    <li>Reservar al Administrador el derecho de referir Su Vehículo al Concesionario o un Taller de Reparación que realice servicios para Su tipo de vehículo, para reparaciones.</li>
                                                                    <li>Autorizar al Taller de Reparación a realizar el trabajo diagnóstico necesario y proporcionar "autorización de desmontaje" para que el Taller de Reparación pueda ofrecer un diagnóstico preciso y un costo estimado de las reparaciones. IMPORTANTE: ESTA GARANTÍA NO CUBRE GASTOS DE LABOR POR EL DIAGNÓSTICO, DESMONTAJE O RE-ENSAMBLAJE RELACIONADOS CON SERVICIOS O PIEZAS NO CUBIERTAS BAJO ESTA GARANTÍA.</li>
                                                                    <li>Permitir al Administrador examinar Su Vehiculo si se le solicita.</li>
                                                                    <li>Proporcionar al Administrador la información que se le solicite razonablemente, y de pedirsele, prueba del mantenimiento regular de Su Vehículo durante el Período del Garantía tal como se define en la Sección IV-C (Requisitos de Mantenimiento).</li>
                                                                </ul>
                                                            </li>
                                                            <li>Horario de atención: El horario de atención al cliente del Administrador es de lunes a viernes, de 8:30 AM a 5:30 PM de lunes a viernes, excepto en dias feriados oficiales</li>
                                                            <li>Instrucciones en caso de que el Vehículo sufra una Avería fuera del horario de atención: Llame al siguiente día hábil, o tan pronto como le sea razonablemente posible, para recibir instrucciones sobre cómo completar Su reclamo.</li>
                                                            <li>Instrucciones para Reparaciones de Emergencia: En el caso que se produzca una Avería cubierta y sea necesaria una reparación de emergencia fuera de los horarios de atención, Usted podrá comenzar las reparaciones mecánicas de emergencia antes de recibir la autorización previa del Administrador. Sin embargo, Usted o el Taller de Reparación, deberán notificar el servicio al Administrador tan pronto se reanude el horario de atención. Usted deberá suministrar la documentación concerniente a la Avería y a las reparaciones realizadas dentro de los treinta (30) días de producida la Avería.</li>
                                                            <p>Las reparaciones de emergencia son solamente aquellas requeridas debido a que Su Vehículo se encuentra en condiciones inoperables o inseguro para conducir. El reembolso del Costo de la reparación de emergencia estará sujeto a todos los términos y condiciones de esta Garantía.</p>
                                                        </ol>
                                                    </li>
                                                    <li>Su Ayuda y Colaboración
                                                        <p>Se requiere Su ayuda y colaboración de ser necesaria para hacer cumplir Sus derechos contra cualquier fabricante o Taller de Reparaciones que puedan ser responsables de pagarle a Usted el Costo de las reparaciones cubiertas por esta Garantía.</p>
                                                    </li>
                                                    <li>Requisitos de Mantenimiento
                                                        <ol class="listdecimal">
                                                            <li> Debe seguir los procedimientos de mantenimiento detallados a continuación. Si Su incumplimiento con estos procedimientos ocasiona una Avería, es posible que se le niegue la cobertura.</li>
                                                            <li> Su Vehículo debe recibir todo el servicio y mantenimiento programado según la recomendación del fabricante del Vehículo en el manual del propietario.</li>
                                                            <li> Debe reemplazar el líquido de transmisión, el líquido del eje de transmisión y el líquido de frenos según los intervalos de servicio recomendados por el fabricante y seguir todas las demás recomendaciones del fabricante respecto a otros servicios especiales (si corresponden a Su modelo) según lo detallado en el manual del propietario.</li>
                                                            <li> Debe guardar los comprobantes que verifiquen el Número de Identificación del Vehículo (VIN), las órdenes de trabajo y toda otra documentación que compruebe la fecha, una descripción de Su Vehículo, millaje y servicios realizados. El Administrador podría necesitar que se le proporcione pruebas de que los servicios especificados se han realizado. Si hubiera alguna falla en la presentación de evidencia sobre la prestación de servicios recibida, podría resultar que el reclamo para el cual se requirió la evidencia, sea denegado.</li>
                                                            <li> Debe asegurarse de que la luz/instrumento de advertencia del nivel de aceite y la luz/instrumento de advertencia de la temperatura estén funcionando antes de conducir Su Vehículo. Debe sacar Su Vehículo fuera de la carretera de forma segura y apagar el motor de inmediato cuando cualquiera de las luces/instrumentos del Vehículo indique un problema.
                                                            </li>
                                                        </ol>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ol>
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
        width: 100%;
    }

    .middlehead {
        background-color: #000;
        color: #fff;
        text-align: center;
    }

    ol.listroman {
        list-style: upper-roman;
        margin-left: 20px;
        margin-bottom: 0;
    }

    ul.listcapalpha {
        list-style: upper-alpha;
        margin-left: 20px;
        margin-bottom: 0;
    }

    ol.listdecimal {
        list-style: decimal;
        margin-left: 20px;
        margin-bottom: 0;
    }

    ul.listcircle {
        list-style: disc;
        margin-left: 20px;
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

        #wrapper,  #setup-menu-wrapper {
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

        .middlehead {
            background-color: #000 !important;
            color: #fff !important;
            text-align: center;
        }

        .panel-body {
            padding: 0;
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

        .firstblock {
            border: 2px solid #000;
        }

        .firstblock .row,
        .firstblock p {
            margin: 0;
        }

        .firstblock .row label {
            padding-left: 5px;
        }

        .firstblock .col-xs-6,
        .firstblock .col-xs-12,
        .firstblock .col-xs-3 {
            border-bottom: 2px solid #000;
            border-right: 2px solid #000;
            padding: 0;
        }

        .panel_s {
            margin-bottom: 0
        }




    }
</style>

</html>