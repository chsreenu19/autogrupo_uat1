<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');
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
                                    <div class="col-sm-5 col-xs-5">
                                    <?php get_company_logo_forms() ?>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 align-self-end">
                                    <h4 class="headmiddle">DEAL# <?php echo $salesordernumber; ?></h4>
                                        <h4 class="headmiddle">STK # <?php echo $stocknumber; ?></h4>
                                        <h4 class="headmiddle">CUST# <?php echo $customerid; ?></h4>
                                        
                                    </div>
                                    <div class="col-sm-4 col-xs-4 align-self-end text-right">
                                        <p class="weowetext">WE OWE</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="fr1">
                                    <p class="flexdiv">
                                        NAME <input type="text" class="inputbox fr1i1" value="<?php echo $customername; ?>"/>
                                        STK # <input type="text" class="inputbox fr1i2" value="<?php echo $stocknumber; ?>"/>
                                        NEW <input type="text" class="inputbox fr1i3" value="<?php echo $newvehicle; ?>"/>
                                        USED <input type="text" class="inputbox fr1i4" value="<?php echo $usedvehicle; ?>"/>
                                    </p>
                                </div>
                                <div class="fr2">
                                    <p class="flexdiv">
                                        ADDRESS <input type="text" class="inputbox fr2i1" value="<?php echo $customeraddress; ?>"/>
                                        YEAR <input type="text" class="inputbox fr2i2" value="<?php echo $iyear; ?>"/>
                                        MAKE <input type="text" class="inputbox fr2i3" value="<?php echo $imake; ?>"/>
                                    </p>
                                </div>
                                <div class="fr3">
                                    <p class="flexdiv">
                                        CITY <input type="text" class="inputbox fr3i1" value="<?php echo $customercity; ?>"/>
                                        STATE <input type="text" class="inputbox fr3i2" value="<?php echo $customerstate; ?>"/>
                                        ZIP <input type="text" class="inputbox fr3i3" value="<?php echo $customerzip; ?>"/>
                                        MODEL <input type="text" class="inputbox fr3i4" value="<?php echo $imodel; ?>"/>
                                    </p>
                                </div>
                                <div class="fr4">
                                    <p class="flexdiv">
                                        PHONE <input type="text" class="inputbox fr4i1" value="<?php echo $customerhomephone; ?>"/>
                                        SERIAL # <input type="text" class="inputbox fr4i2" value="<?php echo $iserie; ?>"/>
                                    </p>
                                </div>
                                <div class="fr5">
                                    <p>
                                        SALESPERSON <input type="text" class="inputbox fr5i1" value="<?php echo $qstaff; ?>"/>
                                        DEL. DATE <input type="text" class="inputbox fr5i2" value="<?php echo $quotedate; ?>"/>
                                    </p>
                                </div>
                                <div class="sr1">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ITEM NO.</th>
                                                <th>NAME OF ITEM</th>
                                                <th>PART</th>
                                                <th>LABOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr1td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr1td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr1td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr1td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr2td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr2td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr2td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr2td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr3td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr3td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr3td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr3td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr4td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr4td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr4td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr4td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr5td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr5td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr5td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr5td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr6td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr6td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr6td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr6td4" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tr1">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <p class="tr1p1"><strong>(FOR APPOINTMENT CALL SERVICE DEPT.)</strong></p>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <p class="tr1p2"> DATE <input type="text" class="inputbox fr5i2" value="<?php echo $today; ?>"/></p>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="tr1p3"> CUSTOMERds
                                                <p class="text-center">
                                                    <input type="text" class="inputbox fr5i2" />
                                                    <span>(FOR APPOINTMENT CALL SERVICE DEPARTMENT)</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6  text-right">
                                            <div class="tr1p4"> APPROVED
                                                <p class="text-center">
                                                    <input type="text" class="inputbox fr5i2" />
                                                    <span>MGR</span>
                                                </p>
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

    img {
        width: 70%;
    }

    .headmiddle {
        font-weight: 600;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    .weowetext {
        font-size: 33px !important;
        font-weight: 700;
        text-align: right;
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
    }

    .table-bordered {
        border: 1px solid #000;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>td {
        border: 1px solid #000;
        text-align: center;
    }

    .table>thead:first-child>tr:first-child>th {
        border-top: 0;
    }

    .table>thead>tr>th:first-child,
    .table>tbody>tr>td:first-child,
    .table>thead>tr>th:nth-child(3),
    .table>thead>tr>th:nth-child(4),
    .table>tbody>tr>td:nth-child(3),
    .table>tbody>tr>td:nth-child(4) {
        max-width: 30px;
        min-width: 30px;
    }




    .table>tbody>tr>td input {
        width: 100%;
        margin-bottom: 0;
        border-bottom: 0;
    }

    .table-bordered>thead>tr>th {
        border-bottom-width: 2px;
    }

    .tr1p3,
    .tr1p4 {
        display: flex;
        align-items: center;
    }

    .tr1p4 {
        justify-content: end;
    }

    .tr1p3 p,
    .tr1p4 p {
        width: 75%;
        display: inline-block;
    }

    .tr1p3 p input,
    .tr1p4 p input {
        width: 100%;
    }

    .tr1p3 p span,
    .tr1p4 p span {
        display: block;
        text-align: center;
    }

    .fr1i3,
    .fr1i4,
    .fr3i3 {
        width: 7%;
    }

    .fr1i2,
    .fr2i2,
    .fr3i2 {
        width: 25%;
    }

    .fr1i1 {
        width: 40%;
    }

    .fr2i1 {
        width: 44%;
    }

    .fr2i3 {
        width: 15.5%;
    }

    .fr3i4,
    .fr3i1 {
        width: 22%;
    }

    .fr4i1,
    .fr4i2 {
        width: 43%;
    }

    .fr5i1 {
        width: 57%;
    }

    .fr5i2 {
        width: 24%;
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

        .flexdiv {
            display: flex;
            width: 100%;
            align-items: self-end;
            white-space: nowrap;
        }

        .fr1i3,
        .fr1i4,
        .fr3i3 {
            width: 7%;
        }

        .fr1i2,
        .fr2i2,
        .fr3i2 {
            width: 30%;
        }

        .fr1i1 {
            width: 44%;
        }

        .fr2i1 {
            width: 44%;
        }

        .fr2i3 {
            width: 15.5%;
        }

        .fr3i4,
        .fr3i1 {
            width: 26%;
        }

        .fr4i1,
        .fr4i2 {
            width: 46%;
        }

        .fr5i1 {
            width: 62%;
        }

        .fr5i2 {
            width: 23%;
        }

        .tr1p3 p,
        .tr1p4 p {
            width: 75%;
            display: inline-block;
            margin-bottom: -8px;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>td {
            border: 1px solid #000;
            text-align: center;
            padding: 2px;
        }


    }
</style>

</html>