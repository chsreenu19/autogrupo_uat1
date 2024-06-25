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

$monthlypayment = ((isset($data['main_data']['custom_feilds']['proposal_monthly_payment'])) && $data['main_data']['custom_feilds']['proposal_monthly_payment']!='') ? $data['main_data']['custom_feilds']['proposal_monthly_payment'] : '';

?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-md-12">
            <button class="btn btn-primary no-print pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold no-print tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                    Devolución de Prima No Devengada
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
                                <div class="col-xs-12  text-center">
                                    <div class="logo_block mx-auto">
                                        <?php 
                                        if($companylogo!=''){
                                        ?>
                                        <img style="width:73% !important;" src="<?php echo $companylogo; ?>" alt="<?php echo $companyname;?>" />
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 mb-4">
                                    <h3 class="main_head text-center my-3"> Devolución de Prima<br>
                                        No Devengada</h3>
                                </div>
                                <!--<div class="col-sm-12 col-xs-12">
                                    <div class="inptxt">
                                        <label>Nombre del Asegurado:</label>
                                        <textarea class="Nombretext" rows="5"><?php echo $yo;?></textarea>
                                    </div>
                                </div>-->
                                <div class="col-sm-12 col-xs-12">
                                    <div class="inptxt my-2">
                                        <label>Nombre del Asegurado:</label>
                                        <input type="text" class="inputbox inp1" value="<?php echo $yo; ?>"/>

                                    </div>
                                    <h5><strong>Estimados señores:</strong></h5>
                                    <p class="paratext">Por la presente les autorizo para que en caso de que esta póliza sea cancelada por
                                        ustedes, por cualquier causa remitan el importe de la prima no devengada a favor
                                        de <?php echo strtoupper($companyname); ?></p>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-sm-6 col-xs-12">
                                    <p><?php echo strtoupper($companyname); ?></p>
                                    <p><?php echo $companyaddress.' '.$companycity.' '.$companystate.' '.$companyzip.' '.$companyphone; ?></p>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 "></div>
                                <div class="col-xs-6 ">
                                    <div class="textchk text-center mb-5">
                                        <label>
                                            <input type="text" name="" class="inputbox"><br>
                                            Firma del Asegurado
                                        </label>
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

    footer {
        display: none;
    }
    .mx-auto{
        margin-left: auto;
        margin-right: auto;
    }
    .inptxt{
        display: flex;
        white-space: nowrap;
    }
    .inptxt input,  textarea{
        width: 100%;
        margin-left: 20px;
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
        textarea{
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