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
                        form3
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">
                                    <div class="col-sm-12 col-xs-12 text-center">
                                        <img src="data:image/jpeg;base64,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" />
                                    </div>
                                    <div class="col-sm-4 col-xs-4 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class="col-sm-4 col-xs-4 align-self-end text-center">
                                        <p class="headtext">ACUERDO PARA ENTREGA INMEDIATA</p>
                                        <p class="subheadtext">(Spot Delivery Agreement)</p>
                                    </div>
                                    <div class="col-sm-4 col-xs-4  text-right">
                                        <h4 class="headmiddle">DEAL# 41257</h4>
                                        <h4 class="headmiddle">CUST# 7876199361</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="fr1">
                                    <p class="flexdiv">
                                        FECHA: <input type="text" class="inputbox fr1i1" />
                                    </p>
                                </div>
                                <div class="fr2">
                                    <p class="flexdiv">
                                        Yo <input type="text" class="inputbox fr2i1" /> hago constar que, en la fecha arriba indicada, adquirí de AUTOGRUPO
                                    </p>
                                </div>
                                <div class="fr3">
                                    <p class="flexdiv">
                                        el vehículo de motor marca <input type="text" class="inputbox fr3i1" />
                                        modelo <input type="text" class="inputbox fr3i2" />
                                        con tablilla <input type="text" class="inputbox fr3i3" />
                                    </p>
                                </div>
                                <div class="fr4">
                                    <p class="flexdiv">
                                        número de serie <input type="text" class="inputbox fr4i1" />
                                        (el "Vehículo"). INICIALES: <input type="text" class="inputbox fr4i2" />
                                    </p>
                                </div>
                                <div class="fr5">
                                    <p>
                                        RECONOZCO que la compra del Vehículo esta sujeta a una condición de financiamiento mediante la otorgación de un contrato de venta al por menor a plazos y/o contrato de arrendamiento financiero (el "Financiamiento") entre el suscribiente y el banco FIRST BANK
                                        <input type="text" class="inputbox fr5i1" />
                                        (de aquí en adelante el "Banco"). RECONOZCO que el financiamiento puede estar condicionado al pago, por concepto de pronto, de alguna cantidad de dinero y/o a la presentación de cierta evidencia y/o documentación. <strong>Me OBLIGO Y COMPROMETO a realizar el pago y/o a proveer la documentación requerida por el Banco dentro de los cinco (5) dias de requerida. INICIALES:
                                        <input type="text" class="inputbox fr5i2" /></strong>
                                    </p>
                                </div>
                                <div class="fir6">
                                    <p>
                                        RECONOZCO que, para mi beneficio, AUTOGRUPO accedió a entregarme el Vehículo antes de que el Banco realice el desembolso del balance a financiarse. En consideración a dicha cortesía, y en la eventualidad de que el Banco reconsidere su aprobación y/o no desembolse el importe del Financiamiento por cualquier razón (incluyendo alguna acción u omisión del suscribiente), <strong> le CONCEDO Y RECONOZOCO a AUTOGRUPO el derecho de reposeer el Vehículo sin necesidad de acudir previamente al tribunal (self-help). RENUNCIO a toda reclamación, incluyendo al resarcimiento de daños y perjuicios, motivados o causados por la reposesión del Vehículo. INICIALES: <input type="text" class="inputbox fir6i1" /></strong>
                                    </p>
                                </div>
                                <div class="sr7">
                                    <p>
                                        En la eventualidad de que el Banco reconsidere su aprobación o no desembolse el importe a financiarse por cualquier razón (incluyendo alguna acción u omisión del suscribiente) y, en la alternativa a la reposesión del Vehículo, <strong> me OBLIGO y COMPROMETO a pagarle a AUTOGRUPO la totalidad del precio pactado para la compraventa del Vehículo.</strong> Dicho importe devengará intereses a un por ciento (1%) por encima del tipo pactado en el Financiamiento.
                                        <strong>INICIALES:<input type="text" class="inputbox fir7i1" /></strong>
                                    </p>
                                </div>
                                <div class="ser8">
                                    <p>
                                        En la eventualidad de que AUTOGRUPO presente algun recurso legal ante los tribunales de justicia para obtener el cobro del precio de compraventa o la posesión del Vehículo o el cobro del precio de compraventa, y sus correspondientes intereses, me  <strong>OBLIGO y COMPROMETO</strong> a pagarle una partida adicional igual al diez por ciento (10%) del precio de compraventa para compensarle los daños, honorarios y/o gastos legales.
                                        <strong> INICIALES:<input type="text" class="inputbox fir8i1" /></strong>
                                    </p>
                                </div>

                                <div class="tr1">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="tr1p3">

                                                <input type="text" class="inputbox tr1i1" />
                                                <p>Cliente</p>
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

    .text-center {
        text-align: center;
    }

    img {
        width: 30%;
    }

    .headmiddle {
        font-weight: 600;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    .tr1i1 {
        text-align: center;
        width: 100%;
    }

    .tr1p3 {
        text-align: center;
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
            font-size: 9.5px;
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