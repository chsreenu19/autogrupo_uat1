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
                <button class="btn btn-primary pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg hide-print tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        ANNEX TO PURCHASE ORDER
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
                                <div class="col-xs-6">
                                    <h3 class="main_head mt-0"> Autorización Trade-in,
                                        Traspaso y Cobro</h3>

                                </div>
                                <div class="col-xs-6">
                                    <div class="logo_block text-right">
                                    <?php if($companylogo!=''){
                                        ?>
                                        <img style="width:73% !important;" src="<?php echo $companylogo; ?>" alt="<?php echo $companyname;?>" />
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="paratext mb-4">
                                        YO, <input type="text" class="inputbox inp1" value="<?php echo $yo; ?>"/>
                                        &nbsp;MAYOR DE EDAD, CON SEGURO SOCIAL &nbsp;
                                        <input type="text" class="inputbox inp2" value="<?php echo $ssn; ?>"/>, CERTIFICO LO SIGUIENTE:
                                    </div>
                                    <ol class="list-items">
                                        <li class="">
                                            &nbsp;QUE SOY EL DUEÑO REGISTRAL DEL VEHÍCULO:<br>
                                            MARCA:&nbsp;
                                            <input type="text" class="inputbox l1ip1" value="<?php echo $tmake; ?>"/>
                                            &nbsp; MODELO:&nbsp;
                                            <input type="text" class="inputbox l1ip2" value="<?php echo $tmodel; ?>"/>
                                            &nbsp; Año::&nbsp;
                                            <input type="text" class="inputbox l1ip3" value="<?php echo $tyear; ?>"/>
                                            &nbsp;TABLILLA:&nbsp;
                                            <input type="text" class="inputbox l1ip4" value="<?php echo $ttablilla; ?>"/>
                                            &nbsp; NUMERO DE MOTOR:&nbsp;
                                            <input type="text" class="inputbox l1ip5" value="<?php echo $tvin; ?>"/>
                                            &nbsp; ANTE DEL DPTO. DE TRANSPORTACIÓN Y OBRAS PÚBLICAS.&nbsp;
                                        </li>
                                        <li>QUE AUTORIZO ALSR. (A) <input type="text" class="inputbox l2ip1" value="<?php echo $yo;?>"/>
                                            A DEJAR EN TRADE-IN EL VEHÍCULO ANTES DESCRITO.</li>
                                        <li>AUTORIZO EL TRASPASO DEL MISMO, YA SEA A NOMBRE DE <?php echo strtoupper($companyname); ?>. Y/O CUALQUIER
                                            PERSONA AUTORIZADA POR LA ANTES MENCIONADA EMPRESA</li>
                                        <li>ME COMPROMETO A QUE DE SURGIR ALGUNA MULTA EN EL PROCESO DE TRASPASO Y LA MISMA ES ANTES
                                            DE LA FECHA DE ENTREGA DEL AUTO DADO EN TRADE-IN, SERÉ RESPONSABLE TANTO YO COMO EL QUE
                                            SUSCRIBA, A PAGAR EL MONTO TOTAL DE DICHOS BOLETOS. MEDIANTE LA PRESENTE SE SOMETE A LA
                                            JURISDICCIÓN CORRESPONDIENTE.</li>
                                        <li>QUE LIBERODE TODARESPONSABILIDAD, TANTODEACCIÓN COMODERECLAMACIÓN CON RELACIÓN ALO
                                            ANTES EXPRESADO A <?php echo strtoupper($companyname); ?>.
                                        </li>
                                        <li>CERTIFICO HABER LEÍDO Y ENTENDIDO EL PRESENTE DOCUMENTO POR LO QUE FIRMO LIBRE DE
                                            COACCIÓN.</li>
                                        <li>AUTORIZO A <?php echo strtoupper($companyname); ?>. A COBRAR CUALQUIER SOBRANTE DE PRIMA DE SEGURO NO
                                            DEVENGADA Y/O SOBRANTE DEL PRODUCTO DE GARANTÍA EXTENDIDA SI APLICA.
                                        </li>
                                    </ol>

                                    <div class="paratext mb-4">
                                        DADOEN
                                        <input type="text" class="inputbox d3ip1" value="<?php echo $warehousecity;?>"/>
                                        &nbsp;PR HOY &nbsp;
                                        <input type="text" class="inputbox d3ip2" value="<?php echo $currentday; ?>" />,
                                        &nbsp; DE &nbsp;
                                        <input type="text" class="inputbox d3ip3" value="<?php echo $currentmonth; ?>"/>
                                        &nbsp;DE 20 &nbsp;
                                        <input type="text" class="inputbox d3ip4" value="<?php echo $currentyear; ?>"/>
                                    </div>

                                </div>
                                <div class="col-xs-6 text-left d4ipg1">
                                    <input type="text" class="inputbox d4ip1" value="<?php echo $yo; ?>"/>
                                    <span>NOMBRE DUEÑO REGISTRAL</span>
                                </div>
                                <div class="col-xs-6 text-right d4ipg2">
                                    <input type="text" class="inputbox d4ip1" />
                                    <span>FIRMA DUEÑO REGISTRAL</span>
                                </div>
                                <div class="col-xs-6 text-left d4ipg1">
                                    <input type="text" class="inputbox d4ip1"  value="<?php echo $yo; ?>"/>
                                    <span>NOMBRE PERSONA QUE DEJA TRADE-IN</span>
                                </div>
                                <div class="col-xs-6 text-right d4ipg2">
                                    <input type="text" class="inputbox d4ip1" />
                                    <span> FIRMA PERSONA QUE DEJA TRADE-IN</span>
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
    }

    .small_head {
        font-size: 16px;
        margin: 10px 0;
    }

    .logo_block.text-right {
        width: 200px;
        margin-left: auto;
        border: 2px dashed #555;
        padding: 10px;
        min-height: 100px;
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
        line-height: 15px;
        margin-bottom: 10px;
    }

    footer {
        /* display: none; */
    }

    /* ----------- common css------- */
    ol {
        list-style: normal;
    }

    .list-items li {
        margin-bottom: 10px;
    }

    .d4ip1 {
        width: 20rem;
    }

    .d4ipg1 span,
    .d4ipg2 span {
        display: block;
    }

    /* -------------------------------------------------------------------------------------------- */
    @media print {


        /* ----------- common css------- */
        @page {
            size: A4;
            margin: 15px;
        }

        body * {
            visibility: hidden;
        }

        #print_block,
        #print_block * {
            visibility: visible;
            /* font-size: 16px;
                font-family: "open sans"; */
        }

        .hide-print {
            display: none;
        }

        html,
        body {
            height: 99%;
        }

        .print:last-child {
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
            position: fixed;
            bottom: 0;
            width: 100%;

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
            /* margin: 2rem; */
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

        .panel-body {
            padding: 0;
        }
        /* ----------- common css------- */
        .logo_block.text-right {
            width: 200px;
            margin-left: auto;
            border: 2px dashed #555;
            padding: 10px;
            min-height: 100px;
            line-height: 73px;
            text-align: center;
            margin-bottom: 10px;
        }

        .inp1 {
            width: 200px;
        }

        .inp2 {
            width: 100px;
        }

        .l1ip1,
        .l1ip2,
        .l1ip3 {
            width: 165px;
        }

        .d3ip1,
        .d3ip3,
        .l2ip1 {
            width: 130px;
        }

        .d3ip2,
        .d3ip4 {
            width: 90px;
        }

        .d4ipg1 span {
            max-width: 288px;
            text-align: center;
            margin-right: auto;
            display: block;
        }

        .d4ipg1 .d4ip1 {
            max-width: 288px;
            display: block;
            margin-right: auto;
        }

        .d4ipg2 .d4ip1 {
            max-width: 288px;
            display: block;
            margin-left: auto;
        }

        .d4ipg2 span {
            max-width: 288px;
            text-align: center;
            margin-left: auto;
            display: block;
        }

    }
</style>

</html>