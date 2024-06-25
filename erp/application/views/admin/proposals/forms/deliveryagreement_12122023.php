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
            <div class="col-md-12 ">
                <button class="btn btn-primary no-print pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold no-print tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        ACUERDO PARA ENTREGA INMEDIATA /
                        SPOT DELIVERY AGREEMENT
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
                                    <div class="logo_block">
                                    <?php if($companylogo!=''){
                                        ?>
                                        <img style="width:73% !important;" src="<?php echo $companylogo; ?>" alt="<?php echo $companyname;?>" />
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3 class="main_head mt-3"> ACUERDO PARA ENTREGA INMEDIATA /<br>
                                        SPOT DELIVERY AGREEMENT</h3>

                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <div class="paratext my-2">
                                        Yo, <input type="text" class="inputbox inp1" value="<?php echo $yo; ?>"/>
                                        &nbsp;hago constar que hoy &nbsp;
                                        <input type="text" class="inputbox inp2" value="<?php echo $today; ?>"/>,&nbsp;
                                        adquirí el vehículo de motor marca, <input type="text" class="inputbox inp3" value="<?php echo $tmake;?>"/>&nbsp; 
                                        modelo,&nbsp;
                                        <input type="text" class="inputbox inp3" value="<?php echo $tmodel;?>"/>&nbsp;
                                        Año:,&nbsp;
                                        <input type="text" class="inputbox inp4" value="<?php echo $tyear;?>"/>&nbsp;
                                        y número de serie&nbsp;
                                        <input type="text" class="inputbox inp5" value="<?php echo $tvin;?>"/>&nbsp;
                                        (de aquí en adelante el "vehículo").&nbsp;
                                    </div>
                                    <p class="paratext">
                                        Reconozco que la compra del vehículo fue (o será) financiada mediante la otorgación de un contrato de venta al por menor a
                                        plazos (de aquí en adelante el "financiamiento") entre el suscribiente y el banco, (de aquí en adelante el "Banco"). Reconozco
                                        que dicho financiamiento puede estar condicionado al pago, por concepto de pronto. de alguna cantidad de dinero y/o a la
                                        presentación de cierta evidencia y/o documentación. Me obligo y comprometo a realizar el pago y/o proveer la
                                        documentación requerida por el banco dentro de los tres (3) dias Luego de Solicitada
                                    </p>

                                    <p class="paratext">Reconozco que, para mi beneficio, <?php echo strtoupper($companyname);?>, accedió a entregarme el vehículo antes de que el banco realice el
                                        desembolso por el balance financiado. En consideración a dicha cortesía, y en la eventualidad de que el banco reconsidere su
                                        aprobación o no desembolse el importe a financiar por cualquier razón (incluyendo algunas acción u omisión del
                                        suscribiente), el concede y reconozco a <?php echo strtoupper($companyname);?>, el derecho de poseer el vehículo sin necesidad de acudir
                                        previamente al tribunal (self-help). Renuncio a toda reclamación, incluyendo el resarcimiento de daños y perjuicios.
                                        motivados o causados por la reposición del vehículo</p>
                                    <p class="paratext">
                                        En la eventualidad de que el banco reconsidere su aprobación o no desembolse el importe a financiar por cualquier razón
                                        (incluyendo alguna acción u omisión del suscribiente), y en la alternativa a la reposición del vehículo, me obligo y
                                        comprometo a pagarle a <?php echo strtoupper($companyname);?>. la totalidad del precio pactado por la compraventa del vehículo. Dicho
                                        importe devengara intereses al uno por ciento (1%) por encima del tipo pactado en el financiamiento
                                    </p>
                                    <p>
                                        En la eventualidad de que <?php echo strtoupper($companyname);?>, presente algún recurso legal ante los tribunales de justicia para obtener la
                                        posesión del vehículo o el cobro del precio de compraventa y sus correspondientes intereses me obliga y comprometo a
                                        pagarle una partida adicional igual al diez por ciento (10%) del precio de compraventa y/o noventa y cinco centavos ($0.95)
                                        por milla recorrida en el odómetro del vehículo, sobre la lectura al momento de la entrega para compensar los daños.
                                        honorario y/o gastos legales
                                    </p>

                                </div>
                                <div class="col-xs-6 text-center">
                                    <div class="paratext my-2">
                                        <input type="text" class="inputbox div2inp1" value="<?php echo $yo; ?>"/>
                                        <p>Nombre de Cliente (en letra de moide)</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <div class="paratext my-2">
                                        <input type="text" class="inputbox div2inp2" />
                                        <p>Firma</p>
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
        margin: 15px 0;
    }

    .small_head {
        font-size: 16px;
        margin: 10px 0;
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

    /* ----------- common css------- */
    .inp1,
    .inp2 {
        width: 15rem;
    }

    .inp3,
    .inp4 {
        width: 8rem;
    }

    /* -------------------------------------------------------------------------------------------- */
    @media print {
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&family=Open+Sans:wght@300;500;600;700&display=swap');

        /* ----------- common css------- */
        @page {
            size: A4;
            margin: 15px;
        }
        .panel-body {
            padding: 0;
        }

        body * {
            visibility: hidden;
        }

        #print_block,
        #print_block *,
        body header *,
        body header,
        body footer * {
            visibility: visible;
            font-family: 'Open Sans', sans-serif;
            font-size: 13px;
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
            position: fixed;
            bottom: 0;
            width: 94%;
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

        input.inputbox {
            height: 24px;
            padding: 3px;
            font-size: 14px;
            line-height: 15px;
            color: #555;
            background-color: #eceffa;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        /* ----------- common css------- */
        .div2inp2 {
            border: none;
            border-bottom: 1px solid #555;
        }
    }
</style>

</html>