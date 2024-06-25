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
$customerfulladdress = $customeraddress.' '.$customercity.' '.$customerstate.' '.$customerzip;

//ableittech need to create thisvin
$customermailbox = '';

$today = date('m-d-Y');
$todaytext = date('d F Y');
?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-xs-12">
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
                                <div class=" col-xs-12 align-self-end text-left">
                                    <?php get_company_logo_forms('','','dark') ?>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> DE: <input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> A: <input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h4 class="headtext text-center"><strong>CONDUCE DE ENTREGA</strong> </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="flexdiv">
                                            <p>Entregado A: <input type="text" class="inputbox fr1i1" value="<?php echo $customername;?>"/></p>
                                            <p> Nombre: <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Dirección:<textarea class="inputbox"><?php echo $customerfulladdress;?></textarea></p>
                                            <p> Guiado por:<input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">&nbsp;</div>
                                    <div class="col-xs-3">
                                        <div class="flexdiv">
                                            <p>Condiciones: <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Venta auto &nbsp; &nbsp; <input type="checkbox" class=" fr1i1" /></p>
                                            <p> Transf. Lote &nbsp; &nbsp; <input type="checkbox" class=" fr1i1" /></p>
                                            <p> Inst. accesorios &nbsp;&nbsp;<input type="checkbox" class=" fr1i1" /></p>
                                            <p> Otros<input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 table-responsive">
                                        <table class="table table-bordered table-CONDUCE">
                                            <thead>
                                                <tr>
                                                    <th>MARCA</th>
                                                    <th>MODELO</th>
                                                    <th>COLOR</th>
                                                    <th>AÑO</th>
                                                    <th class="NUMERO_FRAME">NUMERO FRAME</th>
                                                    <th>NUMERO STOCK</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" value="<?php echo $imake; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" value="<?php echo $imodel; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" value="<?php echo $icolor; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" value="<?php echo $iyear; ?>"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" value="<?php echo $iserie; ?>"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
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
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
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
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
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
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
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

    .flexdiv p {
        display: flex;
        white-space: nowrap;
        align-items: end;

    }

    .flexdiv input[type="text"] {
        width: 100%;
    }

    .bodycontent .flexdiv input[type="text"] {
        width: 87%;
        margin-left: auto;
    }

    textarea.inputbox {
        width: 87%;
        margin-left: auto;
        height: 60px;
        resize: none;
    }

    .headtext {
        border: 2px solid #000;
    }

    .table-CONDUCE th,
    .table-CONDUCE td {
        max-width: 50px;
    }

    .table-CONDUCE input {
        width: 100% !important;
    }

    .NUMERO_FRAME {
        min-width: 150px;
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
            font-size: 11.5px;
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

        textarea.inputbox {
            width: 87%;
            margin-left: auto;
            height: 48px;
            resize: none;
            border: none;
            border-bottom: 1px solid #000;
        }

        .NUMERO_FRAME {
            min-width: 160px;
        }

        .table-CONDUCE input[type="text"] {
            width: 100%;
            border: none;
        }

    }
</style>

</html>