<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');
//echo "<pre>kirti"; print_r($data['quotedata']); exit;

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

//paymentdetails
$monthlypayment = ((isset($data['main_data']['custom_feilds']['proposal_monthly_payment'])) && $data['main_data']['custom_feilds']['proposal_monthly_payment']!='') ? $data['main_data']['custom_feilds']['proposal_monthly_payment'] : '';

?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary pull-right noprint" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg noprint tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        Authorization to Liquidate Accounts
                    </span>

                </h4>
                <div class="panel_s">


                <?php  //echo "<pre>"; print_r($data);exit; ?>
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <header>
                                <div class="header_strip hide_web">
                                    .
                                </div>
                            </header>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="main_head"> Autorización a Liquidar<br>Cuentas</h3>
                                    <div class="input_sec form-inline Fecha_text">
                                        <label>Fecha :</label>
                                        <input type="text" class="inputbox " value="<?php echo $today; ?>">
                                    </div>
                                    <p class="text-bold small_head">A QUIEN PUEDA INTERESAR:</p>
                                    <div class="txinptbk">
                                        <span>YO,</span>
                                        <input type="text" class="txinpt aqinp1" value="<?php echo $yo; ?>"/>
                                        <span>, AUTORIZO <?php echo $companyname; ?>. A LIQUIDAR MI CUENTA NO.</span>
                                        <input type="text" class="txinpt aqinp2" value="<?php echo $tfinancialaccountingnumber; ?>"/>
                                        <span> CON </span>
                                        <input type="text" class="txinpt aqinp3"  />
                                        <span>. GRACIAS POR ADELANTADO</span>
                                    </div>
                                    <div class="signintxt">
                                        <input type="text" class="inputbox" />
                                        <p>FIRMA DEL CLIENTE</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_sec LIQ_text mb-15">
                                        <label>LIQUIDACIÓN TRADE IN EN SUCURSAL DE:</label>
                                        <input type="text" class="inputbox w-100">
                                    </div>
                                    <div class="input_sec STOCK_text mb-15">
                                        <label>STOCK:</label>
                                        <input type="text" class="inputbox w-100">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>MARCA:</label>
                                        <input type="text" class="inputbox" value="<?php echo $tmake;?>">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>MODELO:</label>
                                        <input type="text" class="inputbox" value="<?php echo $tmodel;?>">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>AÑO:</label>
                                        <input type="text" class="inputbox" value="<?php echo $tyear;?>">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>SERIE NO:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>TABLILLA:</label>
                                        <input type="text" class="inputbox" value="<?php echo $ttablilla;?>">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>REGISTRO:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec FIRMAipt_text mb-15">
                                        <label>FIRMA DE QUIÉN VERIFICÓ LAS MULTAS: &nbsp;</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="input_sec halfipt_text mb-15">
                                            <label>FECHA:</label>
                                            <input type="text" class="inputbox" value="<?php echo $today; ?>">
                                        </div>
                                        <div class="input_sec halfipt_text mb-15">
                                            <label> &nbsp; VENDEDOR: &nbsp;</label>
                                            <input type="text" class="inputbox" value="<?php echo $salesreplname.' '.$salesrepfname;?>"> &nbsp;
                                        </div>
                                        <div class="input_sec halfipt_radio d-flex mb-15">
                                            <div class="form-inline">
                                                <label for="yes">SÍ</label>
                                                <input type="radio" id="yes" name="confirm" />
                                            </div>
                                            <div class="form-inline">
                                                <label for="no">NO</label>
                                                <input type="radio" id="no" name="confirm" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row contact_sec">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p class="text-bold small_head">VERIFICACIÓN DE MULTAS EN OBRA PÚBLICAS</p>
                                    <p class="text-bold small_head"><?php echo $companyname; ?> <span><?php echo $companyphone; ?></span></p>
                                    <!--<p class="text-bold small_head">GUAYAMA <span>(787) 744-2290 / (787) 744-1990</span></p>-->
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p class="small_head">NOTA: CLIENTE SE HACE RESPONSBALE DE</p>
                                    <p class="small_head">CUALQUIER DEUDA QUE APARECIERA EN LA</span></p>
                                    <p class="small_head">LIQUIDACIÓN Y/0 MULTAS.</span></p>
                                </div>

                            </div>
                            <footer>
                                <div class="footer_strip"><?php echo $companyname; ?></div>
                            </footer>
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
    input.inputbox,
    .txinpt {
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

    .main_head {
        display: none;
        font-size: 22px;
        font-weight: 500;
    }

    .txinpt {
        min-width: 33rem;
    }

    .txinptbk span {
        /* line-height: 50px; */
        font-size: 16px;
        color: #000;
        line-height: 50px;
    }

    .text-bold {
        font-weight: 600;
    }

    .small_head {
        font-size: 16px;
        margin: 10px 0;
    }

    .signintxt {
        margin-top: 20px;
        width: 200px;
        text-align: center;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .LIQ_text,
    .STOCK_text,
    .FIRMAipt_text,
    .halfipt_text {
        display: flex;
        align-items: center;
    }

    .LIQ_text label {
        width: 24rem;
    }

    .STOCK_text label {
        width: 5rem;
    }

    .LIQ_text .w-100,
    .STOCK_text .w-100 {
        width: 100%;
    }

    .input_sec {
        margin-bottom: 15px;
    }

    .halfipt_text label {
        /* display: inline-block; */
        width: 5rem;
    }

    .halfipt_text input,
    .FIRMAipt_text label {
        /* width: 22rem; */
    }

    .FIRMAipt_text input {
        /* width: 100%; */
    }

    .halfipt_radio {
        width: 10rem;
        align-items: center;
    }

    .halfipt_radio .form-inline {
        margin-right: 25px;

    }

    .small_head span {
        font-weight: 400;
        padding-left: 15px;
    }

    hr {
        height: 3px;
        background-color: #808080;
    }

    .hide_web {
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

        .noprint {
            display: none;
        }

        .main_head {
            font-size: 22px !important;
            font-weight: 600;
        }

        .main_head,
        .hide_web {
            display: block;
        }

        #print_block,
        #print_block * {
            visibility: visible;
            font-size: 13px;
            letter-spacing: 0.2px;

        }

        html,
        body {
            height: 99%;
            page-break-after: avoid !important;
            overflow: hidden;
        }

        .panel-body {
            padding: 0;
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
            display: block;

        }

        .footer_strip {
            min-width: 127mm;
            top: unset;
            bottom: 0;
            left: -7mm;
            right: 0;
            width: 100%;
        }

        #wrapper {
            margin-left: 0;
            margin: 0 2rem;
        }

        /* ----------- common css------- */
        input[type="text"] {
            height: 24px;
            padding: 3px;
            font-size: 14px;
            line-height: 15px;
            color: #555;
            background: #eceffa !important;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .input_sec {
            margin-bottom: 5px !important;
        }

        .txinpt {
            min-width: 13rem;
            margin-bottom: 15px;
            display: inline;
        }

        .txinpt.aqinp1 {
            width: 15rem;
        }

        .txinptbk span {
            /* line-height: 50px; */
            line-height: 30px;
        }
    }
</style>

</html>