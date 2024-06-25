<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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

                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        REGULATION OF VEHICLE WARRANTIES MOTOR
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
                                <div class="col-xs-6 mb-4">
                                    <h3 class="small_head my-3"> DEPARTAMENTO DE ESTADO</h3>
                                    <div class="inptxt my-2">
                                        <label>Núm. Reglamento</label>
                                        <input type="text" class="inputbox inp1" /><br>
                                    </div>
                                    <div class="inptxt my-2">
                                        <label>Fecha Rad.</label>
                                        <input type="text" class="inputbox inp1" /><br>
                                    </div>
                                    <div class="inptxt my-2">
                                        <label>Aprobado:</label>
                                        <input type="text" class="inputbox inp1" /><br>
                                    </div>
                                    <div class="inptxt mt-5">
                                        <label>Por:</label>
                                        <input type="text" class="inputbox inp1" /><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6  text-center">
                                    <div class="mx-auto">
                                        <img src="data:image/png;base64,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" alt="custmer logo here" />
                                    </div>
                                </div>
                                <div class="col-xs-6 mb-4">
                                    <h3 class="small_head text-center my-3"> ESTADO LIBRE ASOCIADO DE PUERTO RICO
                                        paco DEPARTAMENTO DE ASUNTOS DEL CONSUMIDOR
                                        OFICINA DEL SECRETARIO</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h3 class="main_head text-center my-3">REGLAMENTO DE<br> GARANTÍAS DE VEHÍCULOS<br> DE MOTOR</h3>
                                </div>
                                <div class="col-xs-12  text-center">
                                    <div class="logo_block mx-auto">
                                    <?php 
                                        if($companylogo!=''){
                                        ?>
                                        <img style="width:73% !important;" src="<?php echo $companylogo; ?>" alt="<?php echo $companyname;?>" />
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="inptxt mt-5 text-center">
                                        <label>Aprobado el</label>
                                        <input type="text" class="inputbox inp1" value="<?php echo $today; ?>"/><br>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="inptxt mt-5 text-center">
                                        <label>Recibido por</label>
                                        <input type="text" class="inputbox inp1" value="<?php echo $yo; ?>"/><br>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="inptxt mt-5 text-center">
                                        <label>Entregado por</label>
                                        <input type="text" class="inputbox inp1" value="<?php echo $salesreplname.' '.$salesrepfname; ?>"/><br>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <footer>
                            <div class="footer_strip">{{footer}}</div>
                        </footer>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
</div>

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

    .mb-2 {
        margin-bottom: .5rem !important
    }

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
        font-weight: 900;
        font-size: 35px;
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

    footer,
    header {
        display: none;
    }



    @media print {

        /* ----------- common css------- */
        @page {
            size: A4;
            margin: 15px;
        }

        body *,
        .noprint {
            visibility: hidden;
            font-family: 'Open Sans', sans-serif;
        }

        #print_block,
        #print_block * {
            visibility: visible;
            font-size: 15px;
            letter-spacing: 0.2px;
            text-align: justify;

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

        .print:last-child {
            /* page-break-after: auto; */
        }

        body header *,
        body header,
        body footer * {
            visibility: visible;
        }

        header {
            position: fixed;
            top: 0;
            display: block;
        }

        .header_strip,
        .footer_strip {
            background-color: #f4b33f !important;
            width: 247px;
            position: relative;
            left: -30px;
            /* padding-left: 36px; */
            top: 15px;
            overflow: hidden;
            color: #f4b33f !important;
            margin-left: -38px;
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
            position: fixed;
            bottom: 0;
            width: 100%;
            display: inline-block;

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
            font-size: 19pt !important;
            font-weight: 900;
            font-family: "open sans";
            margin-bottom: 40px;
            /* width: 49%; */
        }

        input[type="text"] {
            height: 24px;
            padding: 3px;
            font-size: 14px;
            line-height: 15px;
            color: #555;
            background-color: #eceffa !important;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        textarea {
            color: #555;
            background-color: #eceffa !important;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .panel-body {
            padding: 0;
        }

        .text-center {
            text-align: center !important;
        }

        /* ----------- common css------- */

    }
</style>
</body>

</html>