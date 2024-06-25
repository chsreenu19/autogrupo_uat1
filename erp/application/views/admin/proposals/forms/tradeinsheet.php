<?php

use Twilio\TwiML\Voice\Number;

 defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');
$data = $quotedata;
//echo "<pre>"; print_r($data);exit;
$today = _d(date("m/d/yyyy"));

//companydetails
$companyname = get_option('invoice_company_name');
$companyaddress = get_option('invoice_company_address');
$companycity = get_option('invoice_company_city');
$companystate = get_option('company_state');
$companycountry = get_option('invoice_company_country_code');
$companyzip = get_option('invoice_company_postal_code');
$companyphone = get_option('invoice_company_phonenumber');
$companylogoimagename = get_option('company_logo');
if($companylogoimagename!=''){
    $companylogo = base_url('uploads/company/' . $companylogoimagename);
}else{
    $companylogo = '';
}

//inventory
$make = ((isset($data['main_data']['inventory']['Brand'])) && $data['main_data']['inventory']['Brand']!='') ? $data['main_data']['inventory']['Brand'] : '';
$model = ((isset($data['main_data']['inventory']['Model'])) && $data['main_data']['inventory']['Model']!='') ? $data['main_data']['inventory']['Model'] : '';
$vin = ((isset($data['main_data']['inventory']['VIN'])) && $data['main_data']['inventory']['VIN']!='') ? $data['main_data']['inventory']['VIN'] : '';
$year = ((isset($data['main_data']['inventory']['Year'])) && $data['main_data']['inventory']['Year']!='') ? $data['main_data']['inventory']['Year'] : '';
$balance = ((isset($data['main_data']['custom_feilds']['proposal_balance'])) && $data['main_data']['custom_feilds']['proposal_balance']!='') ? $data['main_data']['custom_feilds']['proposal_balance'] : '';
$rate = ((isset($data['main_data']['inventory']['rate'])) && $data['main_data']['inventory']['rate']!='') ? number_format($data['main_data']['inventory']['rate'],2) : ''; 

//tradein inventory
$tmake = ((isset($data['main_data']['tradein']['make'])) && $data['main_data']['tradein']['make']!='') ? $data['main_data']['tradein']['make'] : '';
$tmodel = ((isset($data['main_data']['tradein']['model'])) && $data['main_data']['tradein']['model']!='') ? $data['main_data']['tradein']['model'] : '';
$tvin = ((isset($data['main_data']['tradein']['vin'])) && $data['main_data']['tradein']['vin']!='') ? $data['main_data']['tradein']['vin'] : '';
$tyear = ((isset($data['main_data']['tradein']['year'])) && $data['main_data']['tradein']['year']!='') ? $data['main_data']['tradein']['year'] : '';
$ttablilla = ((isset($data['main_data']['tradein']['tablilla'])) && $data['main_data']['tradein']['tablilla']!='') ? $data['main_data']['tradein']['tablilla'] : '';
$tmarbete = ((isset($data['main_data']['tradein']['proposal_marbete'])) && $data['main_data']['tradein']['proposal_marbete']!='') ? $data['main_data']['tradein']['proposal_marbete'] : '';
$tmillage = ((isset($data['main_data']['custom_feilds']['proposal_millaje'])) && $data['main_data']['custom_feilds']['proposal_millaje']!='') ? $data['main_data']['custom_feilds']['proposal_millaje'] : '';
$tallowance = ((isset($data['main_data']['custom_feilds']['proposal_tradein'])) && $data['main_data']['custom_feilds']['proposal_tradein']!='') ? $data['main_data']['custom_feilds']['proposal_tradein'] : '';
$tbankpayoff = ((isset($data['main_data']['custom_feilds']['proposal_due'])) && $data['main_data']['custom_feilds']['proposal_due']!='') ? $data['main_data']['custom_feilds']['proposal_due'] : '';
$tfinancialaccountingnumber = ((isset($data['main_data']['tradein']['proposal_financing_institution_account_no'])) && $data['main_data']['tradein']['proposal_financing_institution_account_no']!='') ? $data['main_data']['tradein']['proposal_financing_institution_account_no'] : '';
$tmarbetevence = ((isset($data['main_data']['custom_feilds']['proposal_marbete_vence'])) && $data['main_data']['custom_feilds']['proposal_marbete_vence']!='') ? $data['main_data']['custom_feilds']['proposal_marbete_vence'] : '';


//sales rep
$salesrepfname = ((isset($data['main_data']['quote']['assignedtofname'])) && $data['main_data']['quote']['assignedtofname']!='') ? $data['main_data']['quote']['assignedtofname'] : '';
$salesreplname = ((isset($data['main_data']['quote']['assignedtolname'])) && $data['main_data']['quote']['assignedtolname']!='') ? $data['main_data']['quote']['assignedtolname'] : '';
$salesrepmanager = ((isset($data['main_data']['quote']['assignedstaffmanager'])) && $data['main_data']['quote']['assignedstaffmanager']!='') ? $data['main_data']['quote']['assignedstaffmanager'] : '';

//current date day
$currentday = date("d");

//current month
$currentmonth = date("m");

//current year
$currentyear = date("Y");


$yo = ((isset($data['main_data']['lead']['name'])) && $data['main_data']['lead']['name']!='') ? $data['main_data']['lead']['name'] : '';
$yocity = ((isset($data['main_data']['lead']['city'])) && $data['main_data']['lead']['city']!='') ? $data['main_data']['lead']['city'] : '';
$yostate = ((isset($data['main_data']['lead']['state'])) && $data['main_data']['lead']['state']!='') ? $data['main_data']['lead']['state'] : '';
$yoaddress = ((isset($data['main_data']['lead']['address'])) && $data['main_data']['lead']['address']!='') ? $data['main_data']['lead']['address'] : '';
$yocountry = 'Puerto Rico';
$yozip = ((isset($data['main_data']['lead']['zip'])) && $data['main_data']['lead']['zip']!='') ? $data['main_data']['lead']['zip'] : '';

$financial_institution = ((isset($data['main_data']['custom_feilds']['proposal_financial_institution'])) && $data['main_data']['custom_feilds']['proposal_financial_institution']!='') ? $data['main_data']['custom_feilds']['proposal_financial_institution'] : '';
$warehousecode = ((isset($data['main_data']['warehouse']['warehouse_code'])) && $data['main_data']['warehouse']['warehouse_code']!='') ? $data['main_data']['warehouse']['warehouse_code'] : '';
$warehousename = ((isset($data['main_data']['warehouse']['warehouse_name'])) && $data['main_data']['warehouse']['warehouse_name']!='') ? $data['main_data']['warehouse']['warehouse_name'] : '';
$warehouse = $warehousecode;
$warehousecity = ((isset($data['main_data']['warehouse']['city'])) && $data['main_data']['warehouse']['city']!='') ? $data['main_data']['warehouse']['city'] : '';


$ssn = ((isset($data['main_data']['lead']['Social Security Number'])) && $data['main_data']['lead']['Social Security Number']!='') ? $data['main_data']['lead']['Social Security Number'] : '';
$baseCurrency = get_base_currency();
$monthlypayment = ((isset($data['main_data']['custom_feilds']['proposal_monthly_payment'])) && $data['main_data']['custom_feilds']['proposal_monthly_payment']!='') ? '$'.number_format($data['main_data']['custom_feilds']['proposal_monthly_payment'],2) : '';

?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary no-print pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold no-print tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        HOJA DE TRADE-IN
                    </span>
                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <header>
                                <div class="header_strip">
                                    .
                                </div>
                            </header>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="main_head my-2"> HOJA DE TRADE-IN</h3>
                                </div>
                                <div class="col-sm-6 col-xs-6 pl-0">
                                    <div class="inptxt my-2">
                                        <label class="main_label">Registrado a nombre de</label>
                                        <input type="text" class="inputbox inp1" value="<?php echo $yo; ?>"/>
                                    </div>
                                    <div class="inprdio mb-2">
                                        <label class="main_label">Comprado:</label>
                                        <div class="form-inline d-inline">
                                            <label>
                                                <input type="radio" name="Comprado" class="inputradio" />
                                                Nuevo
                                            </label>
                                            <label>
                                                <input type="radio" name="Comprado" class="inputradio" />
                                                Usado
                                            </label>
                                        </div>
                                    </div>
                                    <div class="inptxt mb-2">
                                        <label class="main_label">Utilizado para:</label>
                                        <input type="text" class="inputbox inp1" />
                                    </div>
                                    <div class="inptxt mb-2">
                                        <label class="main_label">Fecha ce compra:</label>
                                        <input type="text" class="inputbox inp1" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="inprdio my-2">
                                        <label class="main_label">Cliente:</label>
                                        <div class="form-inline d-inline">
                                            <label>
                                                <input type="radio" name="Cliente" class="inputradio" />
                                                Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="Cliente" class="inputradio" />
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="inprdio my-2">
                                        <label class="main_label">Financiado:</label>
                                        <div class="form-inline d-inline">
                                            <label>
                                                <input type="radio" name="Financiado" class="inputradio" />
                                                Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="Financiado" class="inputradio" />
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="inprdio my-2">
                                        <label class="main_label">Posee deuda con Banco:</label>
                                        <div class="form-inline d-inline">
                                            <label>
                                                <input type="radio" name="Banco" class="inputradio" />
                                                Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="Banco" class="inputradio" />
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <!-- <div class="inptxt my-2">
                                        <label class="main_label">Utilizado para:</label>
                                        <input type="text" class="inputbox inp1" />
                                    </div>
                                    <div class="inptxt my-2">
                                        <label class="main_label">Fecha ce compra:</label>
                                        <input type="text" class="inputbox inp1" />
                                    </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 pl-0">
                                    <div class="inputext">
                                        <label>Marca:</label>
                                        <input type="text" class="inputbox w-100" value="<?php echo $tmake; ?>"/>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="inputext">
                                        <label>Modelo:</label>
                                        <input type="text" class="inputbox w-100" value="<?php echo $tmodel; ?>"/>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="inputext">
                                        <label>Año:</label>
                                        <input type="text" class="inputbox w-100" value="<?php echo $tyear; ?>"/>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="inputext">
                                        <label>Color:</label>
                                        <input type="text" class="inputbox w-100" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 pl-0">
                                    <div class="div2grp d-flex">
                                        <label class="me-3">Tablilla:</label>
                                        <input type="text" class="inputbox  w-100" value="<?php echo $ttablilla; ?>">
                                    </div>
                                </div>
                                <!--<div class="col-xs-6">
                                    <div class="div2grp d-flex">
                                        <label class="me-3">Tablilla:</label>
                                        <input type="text" class="inputbox w-100">
                                    </div>
                                </div>-->
                            </div>
                            <div class="row">
                                <div class="col-xs-4 pl-0">
                                    <div class="div3grp d-flex">
                                        <label class="me-2">Transmisión:</label>
                                        <select class="w-100 selectbox">
                                            <option>Automática</option>
                                            <option>Manual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-5">
                                    <div class="div3grp div3Marbete d-flex">
                                        <label class="me-0">Marbete vence:</label>
                                        <input type="text" class="inputbox w-100" value="<?php echo $tmarbetevence; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="div3grp d-flex">
                                        <label class="me-2">Millaje:</label>
                                        <input type="text" class="inputbox w-100" value="<?php echo $tmillage; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table border-none">
                                        <thead>
                                            <tr>
                                                <th>Equipo del Vehículo Requiere Reparación</th>
                                                <th>Sí &nbsp; No</th>
                                                <th>Observaciones</th>
                                                <th>Estimado de Reparación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Chapas Identificación</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>A/C</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <div class="form-inline">
                                                        <label class="me-3">
                                                            Radio Cassettes
                                                            <input type="checkbox" name="Cassettes" />
                                                        </label>
                                                        <label class="me-3">
                                                            CD Player
                                                            <input type="checkbox" name="CD_Player" />
                                                        </label>
                                                        <label class="me-3">
                                                            CD Changer
                                                            <input type="checkbox" name="CD_Changer" />
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Transmisión / Clutch</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Motor</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Frenos</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Suspensión</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tren delantero</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sistema de Emisión</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Luces</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Radiador, Bomba, Coolant</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Carroceria</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Inyectores</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gomas. Repuesto. Gato</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Aros</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Otros</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chapas Identificación</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chapas Identificación</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chapas Identificación</td>
                                                <td>
                                                    <div>
                                                        <input type="radio" name="rw1">
                                                        <input type="radio" name="rw1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                                <td>
                                                    <input type="text" class="inputbox" />
                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="3">
                                                    <div class="text-right">
                                                        Total estimado de reparación liminar:
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex totalgrp">
                                                        $ <input type="text" class="inputbox ms-2" />
                                                    </div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-5 pl-0">
                                    <div class="pull-right list_block">
                                        <ul>
                                            <li><span>Rayazo</span> <span>x</span></li>
                                            <li><span>Abolladura</span> <span>x</span></li>
                                            <li><span>Falta pieza</span> <span>x</span></li>
                                            <li><span>Roto</span> <span>o</span></li>
                                        </ul>
                                    </div>
                                    <h5><strong>Favor de marcar cualquier abolladura o rayano que exista en el auto</strong></h5>
                                    <img width="300" src="data:image/webp;base64,UklGRhQYAABXRUJQVlA4IAgYAADwfgCdASrCAQABPt1orFEopaSipFKsQRAbiWlu/HRWey5pIrcofbb1d1Eu+/+in//9P/buN0Z9QD+W9Or6y3/DyZbxp/lv613Pf5/7PvUfyNfG88rIP1famXzX79+e/QXvP+RGoL7J3XfcP9B/0fUC9v/rv/N8IX+19BvsB/xPcA/WT/e8bD6B7A382/xP/m/yfseaAfrD2Ff1561RkkVP/6gGkj+hkbADQUGQ/4vfVPD4BwDfkmrLGdEw40miB5JmfGiis1CLH7gL5ORU//qAvk1HdYHi4RrndiccbpVW00Tp5EoQ3SUw3LZkxtOJKELxKS29biY28gb2FmVXwjwgZuw2scNnnQRt8IyW8gHg2xKWZjoyWFUeuVtJWJgOsnd5DCDoqHZBRl1MaeeOIKA/+oC7rxT+pd/nxHE5M9TnB30udJlKg++xetngJZMcaHni0Xe7gvi8uGeTansj1dyG01P/5zELP3xp8ACuMOl6Aub81WNTbXE3ocptGy/DPHz4i3TG5W7LXyFQoROs8C6PtfsXOLV+XCGJ6voewDYYqELT+1e+nxxl9ciM1/Tk5kpsCWiNTs/mCAucCeN0KjJY4zsKuRfyXw+D6RbfoV3uFB0P2yC/6nPK4eSbUe+W/7sgYXCf5O4QqmrCt6z5Fq8zQNBxNU1tuiCRbZshDOVjMvc9lIpx/2y+zsmUoit7ut85LiPy8u/HtPXKrjh0BMmW4FP1BQsMg53h5W+VG8rXmwFFyUotqkRIUxRr7f3jmWjasYyyM01yI8rNL84lV5Z5Qy6yAs8dFGLaZZgUW0zkSatl/xbsntg5gpb9wWmeDsW5inRZ8u4ZzNU+oaQN8AAjLA7L0yl+UuIh7QxKh1w0kVaPigVRZsM9ul0i0CJPKEf9BzCTC8zS9GD8zSYxwiOzU80FqRKTItDcruzqKJNaxQFTzdKgBzbR3hag8iGqxFBuZn60zF6LenC9x9TxsEBAsCL5TpHUUTRQzMBoLPmSX4Z3PK8VciuO9QfPDhdEG434hsdd3WYw7G/DBFipvUIfr3IRBznKJlZEGEZbI1Hz8lYhZQj2YdmYNGW1ZcSK+Q473g37Wq4Yv+JU38orjhBWxZxO3hRX1Z5iFgCTh1aiY1yLtPpV3tJh+dV97onFXfufqQCW+/+nmmiQAyggeZrAM4ZbnjMidQLRtsiVnbRmkBH3va4tk/vZtrCuw0ryTmwiW7G6gDF4Zb3fnqDhBzEWBhORU//0FeuZXXrcYw2Aywb7nky8gCiIPTgK1ivDlN0L9ig3QD1qjhKum20Oe6Kn/9QF8nIqgCKeo3/cFFOpnnqRSsz/rwbs4kKL7Q19ed2ICUXyU0Lw1BwrPuzVauNAAP75zuf4wSh2oztlPzRs3StCjvPJtaZSX8Qfhcy4BUI3JOZJlQPaFa8alZ3QX6tpRtKCFhKZo4auYvRMBQ2yDa82hcRnNka5Uo708uL2+tgk9l2WW0VY/Nyqk0dzB8ghuqUC1VKM9dxcn1TV4zYC4WjXfdHuRfuNajr8ZQG4icpsmRyTcMWlLykw5BrJXUeGWB4ZESs7x+vDvG/VBwTDu28i12PJeXr+vtNBRcdCBLy1DYU1IihfFGaDbcVusU8IPnr8UCTmQv9eUXOQTNnf/EDkyo0E3aiqAYe89ukBvMH3OZ37xml6ksdUEKraCe9sCfiJDOZDpi692LUTCS84iS5Tp0AsnY9GWb020fs8Cb2g02n2Tf2Tlpy1JZXzGddRuAgt5Iu+lUdFtRMQQtj4u/rg+tsLd/KdG2CEjHcD+t0Cyo9F3O6Uk+aMz50XnMxgQo9a+9AMRy/8flks2yyP5igLY9Fa5Z5sA4zaVI0U2Ub4jJmM14jzxnBN7XjYNQDjB/kzf/sB1U3U/0Ypup/oxTdT/Rim6n+jFN1P9GKbqf6ZIzWBR3RgzRfssI9kE3qiunKao8H+5PES31lf8nI8CNVIaQU4wohmQhU/DvKngWm+MYIg88tQmUZ5v0W5YRmogjciCOMmMGpMl7hwv+eXb/cS7lN45PiNHxsoRGlVnSXetu4/efbNVwAGGReciwN+gjoa13Gp77fVoL6KZ0t+/WG70XP8e6Rv5qJBDvGULV2ZBf/GLh76YrfdjNMtCr0CQaFLon3gSavw8+kVFSSUzBMjUOmfnXd02y0I+dLPO4Fi5wPARNUj38bJZcK+5p51i6LPfJ2yO3V9XZwEGJscw/PwCDDLxVGP+xRPiLSJU+F/1llCcnqMhpntebG+BXE62hhY29rI5WYsDaC093i4jCL9U1nj5+G0tvCq0OaSJTgD9PewgqZfw3jf1rkznwz8pyuc44uzXn6ajTi/u7LXVT1z4S2b1S5YFz381+2kgXjM9jBYeU5stXoL8+KOChQVOonPy/3Y4C4xdlgMm0Ue1ZziVItmd2Fn9n5A5fxs45Ntbh7owaToE+WDlIkp13sjZIzrI/NShR71ZKm5GjUl1tstJdFjiYLCgjkXIm6k/SdRLD3CszmtI+R0wGY+An6hdmyY+OHqJJh/SAp0JGolRap52fUS87C+sSd8kVVu4SuduHytQdWHKWr3FTV0/6t6A5kufhKpUR5auTbBm4+ZG2XESaaCzR+H+eTwc2AlG1nNRToAy5XXzP1Yz+cu4HHEVXWdSMkgxSbID4tV37J/WiLPd7wMiYeQfEcDsTyqQGw88jBtiGL8WrAmy65hnDUK2/oVKDyxH1xuMB346ys3qS1TpfGZCiBP1e6oivc7KnG5k/tRtfpPoYMrEuhllVkP8SvPazzOR+9bheTHUg45dzzzm13zYtVB92wpyy74S04gAF1q+4XO8OMKRDLKGWKQRcdT74St2Kwp5usHu5s1QOF7BK1vgQ/jvNM6OrtTOWhM66yv3oBDzQviQQFaRWNhnsPN5R0/z0fTXDJnGtjm2vhqUJU2rifSnfCaOeLjMbQLHr/REthCfgmfr4UASPctoSTTtj2ocsz5Dv2w4Q+1hTPZR1wIQ3FEW84XasmJai77VSoJIDCXi4eX0K3gB+9OUTmnYpw/C+7ddFgFn+FnEPF6Bx8Lu7TWkQoWABTNjdMsDUiMQSAJVlXUihfrqBDW9CwiaCdKCftb+2P7x4ryhmsLqpbVG7tG8t11SAl2nrx3V8jYLEBoWB2I6zpGK89WCs2o6W5egprDIb3Ba9D15Y/rQdGQ0i8OTSZtSBcGgQdR3YcDKFNBOPmkhbBu86z5J29BwPd+9l252Yu/SKDIsTv9mzPvlvgP03RAddzkrCqP9WrfSyM/dDSg0Wf+Qr38khypW7LYb0jfbNBr4hdW3+DZQG/NLG2PKH3Du6BCdIfnD4ckn1WwX5orEeH6W0s0RUobGndYr+pqrmWT0dpp0pjKV8m5cpp5fiyQqy1I7yZtJftVL4XGfJpXxCxa3BliP/KrC7gtYGoTO05CPYUR+un4pf8GZKAj9ofp0eDl90NWjrD0dmFWPJk/H7bLkC1K4ZqBQcBPddNHNVYMblrVI638UzUL573k++HMur3fCigQtvUZDbCC7C1wsZPrBmK8SWlZ+5fM/pE6Fb/9uR/Bl24vE/5podBZspM5Qx5HQNhGRCg+lzf6udYDsBPS+8ttese+80KlEDow1GJ2doaIj37c9TRfCkruaLa8QBi78ofL/nRNGFjdq1dQ8fLfEfLmAR/W85qB1VH3RELKoLHBSwKAFQwzsxE+T3zFsRRrSo6VDtX+Ifi4TF0KQoMKluP11Y+SStYBrCnt3Frfv72PVnHtEe0FrpcN+mXo/5GeqKFbX3z9TA00NUooueqPGH7Rfy4ynajGUmaV7azesnsennUWnydCd+fjCOrOI34TfBKLN6kk/d3+I8WUfR/ayQWZ72ClIONwoKHFafk/DPC1T2O2n13t7QWOvY2wS10lHUfTBLKOaFL3B/1S7oWs+htSiGlPg9Cohvm8DsRH0hLE/8yey2yVBIAG7rFhNVb+4iW5JkHIUJO2d3FAOpGMWJ5jUiPYUUFgw+8WCJOz1FvAuHAJgCttGeVIpxAD6YzLyQ70RNhUaToqEI0s+3tpIF4zKjggaf7SiWOWVRKtg0J3Qj3TndqrDVbf1Qo4XWzYIuoKMRsDeTk+Ir5T1ZZJriHkpeumfj3cMGMjhQmvSdQxhVjL15PFp9kCTouX1DRpzpfsrwtGReciwAKVkEwvO1oxDm4W5Shde63eOZ+7GFKdWD/QJmIeoWOHShuuvUD7Kcqrd4apOTloiKKBkB+t7JDPKpXOKt0YoeO9pE5N8hXpowwBnDbpnSdvzrP3uuhoiCCrkyZId3IauGcs0vwS/aKsbnU5Mx8POa3pPdWQNt0vkNMAXKFpKqpwa0y3j305FTPRI7IFRGTrsTFZbzlOyxW9GXmRisVszyZxRmtBQXytvNUZlGwh8jAXiGmublNSfMpudHgDYjJI3+e56U2KJZiS9giG/okNAOo0oA9IkAFcbHHepRu3pMUMguyyT4OGeRD5xu6JrRiM50fUGS6kvB8bPmTW2RQBZcjomQS7pm4KNfqZCxWn9UhATWL/dMKOofwylzQ3aUHKOyONup/g1kjWTZuG/NAL2Q49He/pqJs7nlK8Aq0uL9x3FkToPOYniqaPmI2BlO3w8xau0chFdqeSlp8OxnpLTN3bsf8jFaRHpeMwAffYCTX9tx0XUUBdGJsQkQV6yaF/YOB76rJfybsGbgQYu8FCUpBQSv8cOy1GRmwwYDXw8JT3NSrfCkRkoJ4tfrWbCiql2LDDvnynYsryeCurp9ZGFm20aUQ+hXnlhz9M7LyLpFfRlR/ewhcyER98/+Do3qqeSCFrFOWZf3p5yZt8ppj8t1HH56HTjSNsrweqdzY89rdJCogCH/yfCoBYHj/LuslAJ8Ys6FHmxmOId8iJsMGup8WROCPzTMRnQFdjyd3Mtyr3uEuAuUmmNOViweQKQ46L2TTmsNMrxnaea/3fEEDJCaXiZ3hdIRRKs3ghQN9g7xKSuzhDDfgAg0eKAAjeX7vKsXN4rjssH0DjdNyUfPv/I2JAfW3vj0wrUWrixUJKWZ9AIeuGibCJEHUypUyL4Rj/9VINz4QOSkL7ai4E+67swsaCxC9tZUQ8q6XK5UzubY9AxBnh6DmFQ01kB9ctO8TlFGucFvQa3JfEM9s3VXwF7S5vBNeQbqzYyjIQF29VpT0qy2oNWtOFCCVDisgQ3d/yqcKmti04HEgxvKwfEYpzDzOAJtlxNfRG2wPhaBjWyH6vOEVyBn6C2wiHRsIFGHKTveuumEuKT/+KfWULaQlO8An2h9cVKG/dg1OC5MOCDyydR7kHpZAZgYooYPeXrfRrHarGKmrYWHZXcehAlNcmy8RvQ6YgjnC+oAVc4xirFbLrcLliLg6qL6WjPgrEZ/rN/+TT93Z6eAlk8sKRYAl+W05oioA34vYS/NcCQm2qRVvIZnJNLpxR7ZfcXLEldixB6dmvZi9kjE9ZfcUIzwg3/k9wNnH3SbbB64R5aBbL7nl5li0qDSAATl+zrPKhWAYQGLmWTRzUXs92g+Ub1mkhGqbJNZYml+a6gjVNq2lwIKgJvCClT6mJ0qJLcJtCBS0vL582nijdScbQTcjsztLaG8YtuEVKy5dwAPphqmcTW5/ovBqrD0eBWCkSoT8uDQKg5RiVQZq2mBD+VmPgOKz9w7EnjeUpTJp94NjA+Ggzbgs03L5UXyxsihXS7e9ji0ed3XnAMw/6SLiOwe3g1jdElg7hnINi7zONPGaIBwJCxHKWkHIlWbCBWxBXPOHkJ1AZJ8Os3Dzwh2bmkp7zZWUO/E7mQkUVX6qdLmAvh3oCKaHeRXTFb3ZtL7nJHhlqNQG12g4zhmv6Z9PqjbW8BnhZFMMFcN3+SYyGL+Q0zkKCwW4YdsNiSo+9trrcq2VE1uOxK4Rm8gqkH7g8pmfH8422P7jhek72LrOduTsdf+/6b28Ndydl6gmDyHdZ7cgtK2Xy8wWggTy7R0fND1wTqFlX/+YkqDfE10UKt+uumYEynB+fk/cbZ3+I3hxhnDOdTD8rAuW7NB3bVwII7VxB1j/XSqmC73v6Y/iD0nWXhU3D0JvVZtAc+6OPUIs9DOcQblsl1Cg0L4/amZo5mmADUFZhc/1BsfhbdbqByMxluwdXRVoGhKmvJlbTwTXBrHW1pAlXiuHVSLLZaOrU2ALtcTDlMne3NFOkaTwdnDF+UzBMasNjpqwTco+HFXXfsmzSgsa0Su/IbnDhIJInQ/yPmqSdN+DbXoxS3QiEGXnbJyM0BufwYfDBNLtYZacoZhEBavQPg7mbWAkoLnIW16/9CDgTZMLlOYQijmvxsdPkyhUg3bQfA6DDV6cUbFpW8EYipZ8S4Hvp0PQdg/zMvgAXDMJGk8bHQr0NGFszLrkCn/hFQZcKe2KM4HVP04xBaQFWgQOodOiZCPT3Pe2XE6VigbKKSa+T6UQIdsd9mG/Sbf+9tCsI+ejulv3OECtucN0rhWAc2okhksfT3xMIOlHCPkFZsfNPFyVrNp0a5kKC3Oodsr6pc6E7E7mwMvvbGSWNxjtN30tmd7vNjNCw/jX/AK2maEqZWXJ506Ihz2q/Egj6GHMqSv+v6/icx1sG/cJU+qdMZ3dBlfkP6kgS5vGa538iY3tA0mV2IcTSVwf0PFHSzaxUkrM2WVZ/Dfx+GAfziiZ9ntn68IfXp/9UFlc+0jUOP2able86zaBBD+EHQHx1ehUq4wjHTsUucZcvhkKEmeojmjyyMS0dtHg9fcOSVMgBQlzmayKBJVZxBk0czoZVxPxJDbfCVlWN4pLafTzrHZdVGeiL2bqwSejdjTOVJ2qj9WeDJEGUclTOhGdK4TZRLEIkE8EdA2NywzcARrAAEO2CIAGRaHGtDBB5Mu4HWf9NOPcfsb6sTbZjPoweQ+htPcDS3L0UeUr/4SKEB+OxNiVvQlPEzLYxaJhJZdLypCq3B7zvLWwkxgchNdRzDBma95h+C0Rop0IcthgeiaMCwySMIiE064HL6tj7osYKUvPOpjDDQxvX9K5EjqienKu0hG/XUkncksOVHQeNbiqART8aYjqPuqzQAPfXQB0eM1iDMy7NegSF5RuDoi9CbcPykqQodO+ubZvwSBZro7fLyj5IHaOeYfn0+u/0SXxJGTRR3xQJtP7l4bMErEwAAvKNQGgmvM8iRXN/hDlpEhwbOMnrRtqJqvf8BxVkMe/dBnAR+QrXROqYXjkx6umQiizv620RC93H7TPagQaZ6uG5Zil126pyIUfencnYuWW6W3g/+iWYpFm9362qif448WPbAjRIeB7LTnLEXjsZ6gI4lyeMNEhNd3+tIrgMvTu631d586OvZdDwDXlUvJq2FzpsAt3JC7wvJp8IdqU/I5j8Bp6ZrFbxFaGGVzzDnDQyvjeiPqEHQBc6X1l+ruZdS6gsby3vP2kkf72lza8oPFuQHiYbsfCJZmKLhbMPvQPx2cN+1ff682tJNATr7TLcUygBZDfptJMO2F8ihC46vmLDURxdh5TNYrOhBG4MRggNPZLQJaEt2eguxqVhOti6WWTL+1aSd9b2av9V3ba84T2RDog0TdUfFp+xbNBjHr4rwCc8uTgHgo4SgC9tNi2PsYbccyFwZoSvlr1kHlTJcCmAwCjo+RH67Ge6WTjkXB85h1Agr5MRVu/83dVacj3dtY5GKSu0a9uLfD7U7QLu0d+1EIN1Va6G2hh3zB609wJVpLXfmg/J3y11bxCOput7VTAF6u/fKkDWak3OeD33K94MNoptvKF5rlaUSRpdJJK9f2GG3EpQduodzTV7cfIM+DrPIdsFJoC+wZ3ZdC0JGpQh2j+jhXFo8HuChcMejH/z0G0VmyNujELS6kcjMGfKr9xFTUgg3olUW6yEwZbJ2m7aQS3Pl/fAXyj98o6VUldgthcb3jnpw/J4XkGLO3dYty7B2/l2kCz6qWx2jrIYlJwz6d4aGPAFvvCS3ZAYjWGa1lXvWFoVPtGZCZxrn+S4l7Ofj8G4Y/vuW0WvPeUElDvKL10xa/WCv2ZslonzbKQtj4T6+ZXIi/arEXOeqhiDYSsMQY5SopDszt9j8rbM7+mY9HZQcNa8YpczTtdUNwgzd/MBoupdrXOrbOEvhwi6ymUPIZTehaQkUY7KWrbAB44+rIfJwWAJQxWKgEVtoMQGSYtPoLObW2NrpEr9m+eXNqqsTqlZOzztrUeQKHBsPa4XAnEAAA==">
                                </div>
                                <div class="col-xs-7">
                                    <label class="main_label d-flex">
                                        Garantía de fábrica vigente:
                                        <div class="form-inline ms-4">
                                            <label class="me-4">
                                                <input type="radio" name="gdfv" />
                                                Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="gdfv" />
                                                No
                                            </label>
                                        </div>
                                    </label>
                                    <div class="form-inline inptgrp">
                                        Tiempo por consumir
                                        <input type="text" class="inputbox" />
                                        meses
                                        <input type="text" class="inputbox" />
                                        millas.
                                    </div>
                                    <label class="main_label d-flex">
                                        ¿Fue reparado el vehículo por choque anterior?
                                        <div class="form-inline ms-4">
                                            <label class="me-4">
                                                <input type="radio" name="gdfv" />
                                                Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="gdfv" />
                                                No
                                            </label>
                                        </div>
                                    </label>
                                    <div class="inptxt my-2 d-flex">
                                        <label class="main_label">¿Dónde? ¿Tipo?</label>
                                        <input type="text" class="inputbox inp1 w-100" />
                                    </div>
                                    <div class="row Auto_que_desea">
                                        <div class="col-xs-6 pl-0">
                                            <label>Auto que desea:</label>
                                            <div class="inptxt mb-1 d-flex">
                                                <label class="main_label">Marca/Modelo</label>
                                                <input type="text" class="inputbox inp1 w-100" value="<?php echo $make.'/'.$model; ?>"/>
                                            </div>
                                            <div class="inptxt mb-1 d-flex">
                                                <label class="main_label">Año</label>
                                                <input type="text" class="inputbox inp1 w-100" value="<?php echo $year;?>"/>
                                            </div>
                                            <div class="inptxt mb-1 d-flex">
                                                <label class="main_label">Precio</label>
                                                $ <input type="text" class="inputbox inp1 w-100 ms-1" value="<?php echo $rate; ?>"/>
                                            </div>
                                            <div class="inptxt mb-1 d-flex">
                                                <label class="main_label">Valor Trade-In</label>
                                                <input type="text" class="inputbox inp1 w-100" value="<?php echo $tallowance; ?>"/>
                                            </div>
                                            <div class="inptxt mb-1 d-flex">
                                                <label class="main_label">Deuda (Si aplica)</label>
                                                <input type="text" class="inputbox inp1 w-100" value="<?php echo $tbankpayoff; ?>"/>
                                            </div>
                                            <div class="inptxt mb-1 d-flex">
                                                <label class="main_label">Balance</label>
                                                $ <input type="text" class="inputbox inp1 w-100 ms-1" value="<?php echo number_format($balance,2); ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 ">
                                            <div class="Comentarios">
                                                <p class="mb-0"> Comentarios </p>
                                                <textarea>

                                                    </textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 pl-0">
                                    <div class="d-flex">
                                        <!--<label>Vendedor:</label>
                                        <input type="text" class="inputbox w-100 ms-3">-->
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class=" d-flex">
                                        <label>Vendedor:</label>
                                        <input type="text" class="inputbox w-100 ms-3" value="<?php echo $salesreplname.' '.$salesrepfname; ?>">
                                    </div>
                                </div>
                            </div>

                            <footer>
                                <div class="footer_strip"><?php echo strtoupper($companyname); ?></div>
                            </footer>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php init_tail(); ?>

<script>

</script>
</body>
<style>
    /* ----------- common css------- */
    .m-0 {
        margin: 0 !important
    }

    .m-1 {
        margin: .25rem !important
    }

    .m-2 {
        margin: .5rem !important
    }

    .m-3 {
        margin: 1rem !important
    }

    .m-4 {
        margin: 1.5rem !important
    }

    .m-5 {
        margin: 3rem !important
    }

    .m-auto {
        margin: auto !important
    }

    .mx-0 {
        margin-right: 0 !important;
        margin-left: 0 !important
    }

    .mx-1 {
        margin-right: .25rem !important;
        margin-left: .25rem !important
    }

    .mx-2 {
        margin-right: .5rem !important;
        margin-left: .5rem !important
    }

    .mx-3 {
        margin-right: 1rem !important;
        margin-left: 1rem !important
    }

    .mx-4 {
        margin-right: 1.5rem !important;
        margin-left: 1.5rem !important
    }

    .mx-5 {
        margin-right: 3rem !important;
        margin-left: 3rem !important
    }

    .mx-auto {
        margin-right: auto !important;
        margin-left: auto !important
    }

    .my-0 {
        margin-top: 0 !important;
        margin-bottom: 0 !important
    }

    .my-1 {
        margin-top: .25rem !important;
        margin-bottom: .25rem !important
    }

    .my-2 {
        margin-top: .5rem !important;
        margin-bottom: .5rem !important
    }

    .my-3 {
        margin-top: 1rem !important;
        margin-bottom: 1rem !important
    }

    .my-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important
    }

    .my-5 {
        margin-top: 3rem !important;
        margin-bottom: 3rem !important
    }

    .my-auto {
        margin-top: auto !important;
        margin-bottom: auto !important
    }

    .mt-0 {
        margin-top: 0 !important
    }

    .mt-1 {
        margin-top: .25rem !important
    }

    .mt-2 {
        margin-top: .5rem !important
    }

    .mt-3 {
        margin-top: 1rem !important
    }

    .mt-4 {
        margin-top: 1.5rem !important
    }

    .mt-5 {
        margin-top: 3rem !important
    }

    .mt-auto {
        margin-top: auto !important
    }

    .me-0 {
        margin-right: 0 !important
    }

    .me-1 {
        margin-right: .25rem !important
    }

    .me-2 {
        margin-right: .5rem !important
    }

    .me-3 {
        margin-right: 1rem !important
    }

    .me-4 {
        margin-right: 1.5rem !important
    }

    .me-5 {
        margin-right: 3rem !important
    }

    .me-auto {
        margin-right: auto !important
    }

    .mb-0 {
        margin-bottom: 0 !important
    }

    .mb-1 {
        margin-bottom: .25rem !important
    }

    /* .mb-2 {
        margin-bottom: .5rem !important
    } */

    .mb-3 {
        margin-bottom: 1rem !important
    }

    .mb-4 {
        margin-bottom: 1.5rem !important
    }

    .mb-5 {
        margin-bottom: 3rem !important
    }

    .mb-auto {
        margin-bottom: auto !important
    }

    .ms-0 {
        margin-left: 0 !important
    }

    .ms-1 {
        margin-left: .25rem !important
    }

    .ms-2 {
        margin-left: .5rem !important
    }

    .ms-3 {
        margin-left: 1rem !important
    }

    .ms-4 {
        margin-left: 1.5rem !important
    }

    .ms-5 {
        margin-left: 3rem !important
    }


    .main_head {
        display: block;
        margin: 15px 0;
    }

    .small_head {
        font-size: 16px;
        margin: 10px 0;
        font-weight: 500;
    }

    .logo_block {
        width: 200px;
        /* margin-left: auto; */
        border: 2px dashed #555;
        padding: 10px;
        min-height: 80px;
        line-height: 73px;
        text-align: center;
    }

    input.inputbox,
    .txinpt {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 15px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .paratext {
        font-size: 14px;
        line-height: 21px;
        margin-bottom: 10px;
    }

    p.paratext {
        text-align: justify;
    }

    .d-inline {
        display: inline-block;
    }

    footer {
        display: none;
    }

    /* ----------- common css------- */
    label.main_label {
        min-width: 170px;
    }

    .form-inline label {
        margin: 0 19px 0 0;
    }

    .div2grp,
    .div3grp,
    .totalgrp {
        align-items: center;
    }

    .div3grp label {
        width: 155px;
    }

    .selectbox {
        height: 35px;
        border-radius: 5px;
        border-color: #ccc;
    }

    table {
        vertical-align: middle;
    }

    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        vertical-align: middle;
    }

    .table>tbody>tr>td input.inputbox {
        margin-bottom: 0;
        width: 100%;
    }

    .list_block {
        background: #efefef;
        padding: 0 4px;
    }

    .list_block li {
        display: flex;
        justify-content: space-between;
        min-width: 90px;
    }

    .Auto_que_desea .inptxt {
        align-items: center;
    }

    .Auto_que_desea input {
        margin-bottom: 0;
    }

    .Comentarios {
        position: relative;
    }

    .Comentarios textarea {
        display: flex;
        /* position: absolute; */
        width: 100%;
        min-height: 152px;
        border-color: #ccc;
    }

    .list_block img {
        width: 39%;
    }

    .Auto_que_desea label.main_label {
        min-width: 110px;
    }

    .table>tbody>tr:nth-of-type(odd) {
        background-color: #ccc;
    }

    /* -------------------------------------------------------------------------------------------- */
    @media print {
        @page {
            size: A4;
            margin: 0 5px;
        }

        body * {
            visibility: hidden;
        }

        #print_block,
        #print_block * {
            visibility: visible;
            font-size: 13px;
            font-family: "open sans";
        }

        .hide-print {
            display: none;
        }

        html,
        body {
            height: 99%;
            page-break-after: avoid !important;
            page-break-before: avoid !important;
            overflow: hidden;
        }

        footer {
            page-break-after: auto;
        }

        body header *,
        body header,
        body footer * {
            visibility: visible;
        }

        header {
            position: fixed;
            top: 0;
        }

        .no-print {
            display: none;
        }

        .header_strip,
        .footer_strip {
            background-color: #f4b33f !important;
            width: 247px;
            position: relative;
            left: 0px;
            /* padding-left: 36px; */
            top: 15px;
            overflow: hidden;
            color: #f4b33f !important;
            margin-left: -20px;

        }

        .header_strip:before,
        .footer_strip:before {
            content: "";
            position: absolute;
            right: 5px;
            top: -30px;
            height: 90px;
            width: 47px;
            transform: rotateZ(47deg);
            background: #c6c6c6 !important;
            border: 16px solid #fff;
        }

        .header_strip:after,
        .footer_strip:after {
            content: "";
            position: absolute;
            right: -12px;
            top: 0;
            background: #fff !important;
            height: 48px;
            width: 30px;
            transform: rotateZ(48deg);
        }

        .footer_strip:after {
            height: 90px;
            width: 247px;
            transform: rotateZ(47deg);
            background: #f4b33f !important;
            border-left: 16px solid #ccc;
            z-index: 2;
        }

        footer {
            /* position: fixed; */
            top: 100%;
            bottom: 0;
            width: 94%;
            display: block;
            page-break-after: always !important;

        }

        .footer_strip {
            min-width: 127mm;
            bottom: 0;
            top: unset;
            left: -7mm;
            right: 0;
            width: 100%;
        }

        #wrapper {
            margin-left: 0;
            margin: 0 2rem;
        }

        .main_head {
            display: block;
            font-size: 18pt !important;
            font-weight: 900;
            font-family: "open sans";
            margin-bottom: 20px;
            /* width: 49%; */
        }

        input[type="text"] {
            height: 20px;
            padding: 3px;
            font-size: 14px;
            line-height: 15px;
            color: #555;
            background-color: #eceffa !important;
            border: 0px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .selectbox {
            height: 20px;
        }

        /* ----------- common css------- */
        .pl-0 {
            padding-left: 0;
        }

        input.inputbox.inp1 {
            width: 130px;
        }

        .form-inline label {
            margin: 0 10px 0 0;
        }

        label.main_label {
            min-width: 150px;
        }

        .inprdio .form-inline.d-inline {
            width: 144px;
        }

        .div3Marbete label {
            width: 180px;
            white-space: nowrap;
        }

        th:nth-child(1) {
            width: 226px;
        }

        th:nth-child(2) {
            width: 70px;
        }

        th:nth-child(3),
        td:nth-child(3),
        th:nth-child(4),
        td:nth-child(4) {
            width: 100px;
        }

        td:nth-child(3) input,
        td:nth-child(4) input {
            width: 100%;
        }

        .table>tbody>tr:nth-child(odd)>td:nth-child(1) {
            background-color: #e9e9e9 !important;
        }

        .table>tbody>tr>td,
        .table>thead>tr>th {
            padding: 0;
            /* border:0px; */
        }

        .panel-body,
        .content {
            padding: 0px;
        }

        .inptgrp input.inputbox {
            width: 75px;
        }

        .Auto_que_desea input.inputbox {
            width: 100%;
        }

        table.table {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .my-2 {
            margin-top: 0.1rem !important;
            margin-bottom: 0.1rem !important;
        }

        .mb-1 {
            margin-bottom: 0 !important;
        }



    }
</style>

</html>