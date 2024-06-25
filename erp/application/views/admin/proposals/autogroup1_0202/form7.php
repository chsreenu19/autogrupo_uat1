<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');

?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg hide-print tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        form6
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
                                        <p class="headtext">INSTRUCCIONES</p>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        &nbsp;
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <ol class="desimallist">
                                    <li>
                                        Complemente este formulario en original y copia en todas sus partes previo a su presentación. Use maquinilla, pluma o equipo procesador de palabras.
                                    </li>
                                    <li>Indique direcciones física y postal de acuerdo a formato requerido por el Servicio Postal de los Estados Unidos.</li>
                                    <li>La información sobre el vehículo podrá obtenerla de uno de los siguientes documentos:
                                        <ul class="listsmallalpha">
                                            <li>Vehículo nuevo
                                                <ol class="desimallist">
                                                    <li>factura notariada</li>
                                                    <li>certificado de origen del manufacturero</li>
                                                    <li>título del vehículo</li>
                                                </ol>
                                            </li>
                                            <li>Vehículo usado
                                                <ol class="desimallist">
                                                    <li>título de propiedad</li>
                                                    <li>documento de registro</li>
                                                    <li>documento de subasta pública</li>
                                                    <li>documento de certificado de cesión</li>
                                                    <li>documento de compraventa de compañía de seguro</li>

                                                </ol>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>El tipo de vehículo será:
                                        <ol class="listsmallalpha">
                                            <li>pasajeros</li>
                                            <li>camión liviano</li>
                                            <li>camión pesado</li>
                                            <li>arrastre</li>
                                            <li>motocicleta</li>
                                        </ol>

                                    </li>
                                    <li>Aranceles
                                        <p>
                                            La fórmula para obtener el arancel a pagar por el contrato de financiamiento es la siguiente: valor del precio de venta del vehículo menos $1,000; el resultado se multiplica por .005 y se le añaden $5.00 en comprobante de Rentas Internas para obtener los derechos a pagar. Para el pago de los derechos sobre gravamen mobiliario de hipoteca, el CESCO utilizará la tabla de cómputos de derechos de inscripción, a los cuales deberá agregarse el comprobante de Rentas Internas por la cantidad de $ 5.00 dólares.
                                        </p>
                                    </li>
                                    <li>
                                        Acompañe con este formulario comprobante de Rentas Internas por valor de cinco (5) dólares, según indicado. Sin no utiliza este formulario el comprobante será de diez (10) dólares.
                                    </li>
                                    <li>
                                        Presentar contrato de financiamiento o de hipoteca. Además, debe ofrece la mayor cantidad de
                                        información posible referente al vehículo para agilizar su inscripción en nuestros récords.
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

    .desimallist li {
        margin-bottom: 15px;
    }

    .desimallist {
        list-style: decimal;
        /* margin-left: 20px; */
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
        padding: 0 10px 0px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    .li1i8 {
        width: 100%;
    }

    .flexdiv p {
        margin-bottom: 5px;
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
            font-size: 12px;
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


    }
</style>

</html>