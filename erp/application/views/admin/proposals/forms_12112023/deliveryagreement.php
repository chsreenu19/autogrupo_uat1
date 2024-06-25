<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head_forms();
$userstaffid = $this->session->userdata('staff_user_id');

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
                                        <img src="" alt="custmer logo here" />
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3 class="main_head mt-3"> ACUERDO PARA ENTREGA INMEDIATA /<br>
                                        SPOT DELIVERY AGREEMENT</h3>

                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <div class="paratext my-2">
                                        Yo, <input type="text" class="inputbox inp1" />
                                        &nbsp;hago constar que hoy &nbsp;
                                        <input type="text" class="inputbox inp2" />,&nbsp;
                                        adquirí el vehículo de motor marca, modelo,&nbsp;
                                        <input type="text" class="inputbox inp3" />&nbsp;
                                        vcon tablilla #,&nbsp;
                                        <input type="text" class="inputbox inp4" />&nbsp;
                                        y número de serie&nbsp;
                                        <input type="text" class="inputbox inp5" />&nbsp;
                                        (de aquí en adelante el "vehículo").&nbsp;
                                    </div>
                                    <p class="paratext">
                                        Reconozco que la compra del vehículo fue (o será) financiada mediante la otorgación de un contrato de venta al por menor a
                                        plazos (de aquí en adelante el "financiamiento") entre el suscribiente y el banco, (de aquí en adelante el "Banco"). Reconozco
                                        que dicho financiamiento puede estar condicionado al pago, por concepto de pronto. de alguna cantidad de dinero y/o a la
                                        presentación de cierta evidencia y/o documentación. Me obligo y comprometo a realizar el pago y/o proveer la
                                        documentación requerida por el banco dentro de los tres (3) dias Luego de Solicitada
                                    </p>

                                    <p class="paratext">Reconozco que, para mi beneficio, Medina Auto Sales, Inc., accedió a entregarme el vehículo antes de que el banco realice el
                                        desembolso por el balance financiado. En consideración a dicha cortesía, y en la eventualidad de que el banco reconsidere su
                                        aprobación o no desembolse el importe a financiar por cualquier razón (incluyendo algunas acción u omisión del
                                        suscribiente), el concede y reconozco a Medina Auto Sales, Inc., el derecho de poseer el vehículo sin necesidad de acudir
                                        previamente al tribunal (self-help). Renuncio a toda reclamación, incluyendo el resarcimiento de daños y perjuicios.
                                        motivados o causados por la reposición del vehículo</p>
                                    <p class="paratext">
                                        En la eventualidad de que el banco reconsidere su aprobación o no desembolse el importe a financiar por cualquier razón
                                        (incluyendo alguna acción u omisión del suscribiente), y en la alternativa a la reposición del vehículo, me obligo y
                                        comprometo a pagarle a Medina Auto Sales, Inc.. la totalidad del precio pactado por la compraventa del vehículo. Dicho
                                        importe devengara intereses al uno por ciento (1%) por encima del tipo pactado en el financiamiento
                                    </p>
                                    <p>
                                        En la eventualidad de que Medina Auto Sales. Inc., presente algún recurso legal ante los tribunales de justicia para obtener la
                                        posesión del vehículo o el cobro del precio de compraventa y sus correspondientes intereses me obliga y comprometo a
                                        pagarle una partida adicional igual al diez por ciento (10%) del precio de compraventa y/o noventa y cinco centavos ($0.95)
                                        por milla recorrida en el odómetro del vehículo, sobre la lectura al momento de la entrega para compensar los daños.
                                        honorario y/o gastos legales
                                    </p>

                                </div>
                                <div class="col-xs-6 text-center">
                                    <div class="paratext my-2">
                                        <input type="text" class="inputbox div2inp1" />
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


        /* ----------- common css------- */
        @page {
            size: A4;
            margin: 1rem 0rem;
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
            page-break-after: avoid !important;
            page-break-before: avoid !important;
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
        .no-print{
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
        .div2inp2{
            border: none;
            border-bottom: 1px solid #555;
        }
    }
</style>

</html>