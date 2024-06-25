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
                        form1
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div>
                                <div class="text-center">
                                    CONTRATO DE COMPRA VENTA
                                </div>
                                <div class="row ffblock">
                                    <div class="col-sm-6 col-xs-6">
                                        <img src="data:image/jpeg;base64,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" />
                                    </div>
                                    <div class="col-sm-3 col-xs-3 align-self-end">
                                        <h4 class="headmiddle">DEAL# 41257</h4>
                                        <h4 class="headmiddle">STK # DJW158378</h4>
                                        <h4 class="headmiddle">CUST# 7876199361</h4>
                                        <h4 class="headmiddle">FORM# 73430 NSK-FI</h4>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 align-self-end text-center">
                                        <p>PO Box 29468 San Juan, PR 00929</p>
                                        <p>Tel: (787) 522-6565</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="firstblock">
                                    <div class="row">
                                        <div class="inputsecr1c1 col-md-8 col-sm-8 col-xs-8">
                                            <label>NOMBRE DEL COMPRADOR</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr1c2 col-md-4 col-sm-4 col-xs-4 br-0">
                                            <label>FECHA DE CONTRATO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr2c1 col-md-12 col-sm-12 col-xs-12 br-0 col-xs-12">
                                            <label>DIRECCION DE COMPRADOR</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="inputsecr2c1 col-md-3 col-sm-3 col-xs-3">
                                            <label>TEL. RESIDENCIA</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr2c2 col-md-3 col-sm-3 col-xs-3">
                                            <label>TEL. NEGOCIO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr2c3 col-md-3  col-sm-3 col-xs-3">
                                            <label>APARTADO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr2c4 col-md-3  col-sm-3 col-xs-3 br-0">
                                            <label>FECHA DE 00972EGA</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="inputsecr3c1 col-md-3  col-sm-3 col-xs-3">
                                            <label>SIRVASE ENTRAR MI ORDEN POR UN VEHICULO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr3c2 col-md-2  col-sm-2 col-xs-2">
                                            <label>MARCA</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr3c3 col-md-1  col-sm-1 col-xs-1">
                                            <label>AÑO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr3c4 col-md-2  col-sm-2 col-xs-2">
                                            <label>COLOR</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr3c5 col-md-2  col-sm-2 col-xs-2">
                                            <label>CARROCERÍA Y MODELO</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="inputsecr3c6 col-md-2  col-sm-2 col-xs-2 br-0">
                                            <label>STOCK</label>
                                            <input type="text" class="inputbox " />
                                        </div>
                                        <div class="col-md-9  col-sm-9 col-xs-9 br-0 bm-0">
                                            <div class="row m-0">
                                                <div class="inputsecr4c1 col-md-6  col-sm-6 col-xs-6">
                                                    <label>SERIE</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="inputsecr4c2 col-md-3  col-sm-3 col-xs-3">
                                                    <label>MILLAJE</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="inputsecr4c3 col-md-3  col-sm-3 col-xs-3">
                                                    <label>#TABLILLA</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="inputsecr4c1 col-md-3 bm-0 col-sm-3 col-xs-3">
                                                    <label># SEGURO SOCIAL</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="inputsecr4c2 col-md-3  bm-0 col-sm-3 col-xs-3">
                                                    <label>#LICENCIA CONDUCIR</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="inputsecr4c3 col-md-6  bm-0 col-sm-6 col-xs-6">
                                                    <label>E-MAIL</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3  col-sm-3 col-xs-3 br-0  bm-0">
                                            <div class="inputsecr4c1 col-md-12">
                                                <label>AUTOMÓVIL</label>
                                                <div class="form-inline">
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        TAXI/PÚBLICO
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        NUEVO
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        DEMOSTRADOR
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        USADO
                                                    </label>
                                                    <label class="pe-5p">
                                                        <input type="checkbox" name="Cassettes" />
                                                        ALQUILER
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="secondblock">
                                    <div class="row">
                                        <div class="col-sm-6  col-xs-6 col-md-6 px-0">
                                            <div class="row">
                                                <h4 class="col-sm-12 col-xs-12 text-center sbhead">
                                                    <strong> VENTA A LEASING CO.</strong>
                                                </h4>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>LEASE CO</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>P.O. #</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>VENDEDOR</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CLIENTE</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>TEL</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>DIRECCIÓN </label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <h4 class="col-sm-12 col-xs-12 text-center sbhead">
                                                    <strong> VEHÍCULO USADO TOMADO A CAMBIO</strong>
                                                </h4>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>MARCA</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>ANO MODELO</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>TABLILLA</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>COLOR</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>MILLAJE</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>STOCK NO</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>SERIE NO.</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <label>BALANCE ADEUDADO A</label>
                                                    <input type="text" class="inputbox " />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO POR CARRO USADO</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO NETO</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>PRONTO</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO A SU FAVOR</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>OTROS PAGOS</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <label>CREDITO TOTAL</label>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <h4 class="col-sm-12 col-xs-12 text-center sbhead">
                                                    <strong> BALANCE - CONTRATO A PAGARSE DE ACUERDO CON</strong>
                                                </h4>
                                                <div class="col-sm-6 col-xs-6">
                                                    HIPOTECA BIENES MUEBLES CONTRATO DE VENTA CONDICIONAL
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    PARA SER SUSCRITO EN O ANTES DE LA ENTREGA
                                                </div>
                                                <div class="col-sm-1 col-xs-1">
                                                    EN
                                                </div>
                                                <div class="col-sm-2 col-xs-2">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-9 col-xs-9">
                                                    PLAZOS MENSUALES DE
                                                </div>
                                                <div class="col-sm-1 col-xs-1">
                                                    EN
                                                </div>
                                                <div class="col-sm-2 col-xs-2">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-9 col-xs-9">
                                                    PLAZOS MENSUALES DE
                                                </div>
                                                <div class="col-sm-12 col-xs-12 bm-0">
                                                    RESIDUAL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6 secondright px-0 br-0">
                                            <div class="row">
                                                <div class="col-sm-8 col-xs-8">
                                                    PRECIO UNIDAD
                                                </div>
                                                <div class="col-sm-4  col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8  col-xs-8">
                                                    PRECIO TOTAL INCLUYENDO
                                                </div>
                                                <div class="col-sm-4   col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-8  col-xs-8">
                                                    ACCESORIOS ADICIONALES INSTALADOS
                                                </div>
                                                <div class="col-sm-4   col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                                <div class="col-xs-12 br-0">&nbsp;<br>&nbsp;</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8  col-xs-8">
                                                    TABLILLA Y ACAA
                                                </div>
                                                <div class="col-sm-4   col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-8  col-xs-8">
                                                    PRECIO TOTAL
                                                </div>
                                                <div class="col-sm-4    col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-8  col-xs-8">
                                                    CREDITO TOTAL
                                                </div>
                                                <div class="col-sm-4    col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>

                                                <div class="col-sm-8 col-xs-8">
                                                    BALANCE A PAGAR
                                                </div>
                                                <div class="col-sm-4 col-xs-4 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-4 col-xs-4">
                                                    FINANCIADO POR
                                                </div>
                                                <div class="col-sm-6 col-xs-6 ">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                                <div class="col-sm-2 col-xs-2 br-0">
                                                    <input type="text" class="inputbox olinp" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="rbottom col-xs-12 br-0 px-0">
                                                    <h4 class="br-0"><strong>OBSERVACIONES:</strong></h4>
                                                    <div class="col-xs-8">MOBILITY COVERAGE</div>
                                                    <div class="col-xs-4 br-0">
                                                        <input type="text" class="inputbox olinp" />
                                                    </div>
                                                    <div class="col-xs-8">GAP</div>
                                                    <div class="col-xs-4 br-0">
                                                        <input type="text" class="inputbox olinp" />
                                                    </div>
                                                    <div class="col-xs-8">CONTRATO DE SERVICIO</div>
                                                    <div class="col-xs-4 br-0">
                                                        <input type="text" class="inputbox olinp" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="thirdblock">
                                    <h4><strong>NOTAS PARA EL PIE DEL CONTRATO DE </strong></h4>
                                    <p>"NOTA: El presente contrato de compra y venta dejará sin efecto cualquier otro acuerdo que las partes pudieron haber llegado anteriormente, si alguno. El comprador expresamente garantiza que el automóvil usado entregado a una cuenta (el "trade in"), si alguno, está libre de todo gravamen y/o deuda y que la licencia, debidamente endosada, será entregada a la vendedora con el vehiculo. En la eventualidad que el "trade in", su licencia y/o titulo tenga una deuda pendiente y/o un gravamen sobre el mismo, el comprador representa que la cantidad informada al vendedor como el balance de cancelación del mismo es correcto. Si el balance de cancelación resulta ser mayor que la cuantia informada al vendedor, el comprador se compromete y obliga a pagar y/o rembolsar la diferencia entre el balance de cancelación reportado y el balance de cancelación requerido subsiguientemente por la correspondiente institución financiera. Si el balance de cancela- ción del trade in resulte ser menor que la cuantia aqui informada, el comprador CEDE y TRASPASA la diferencia a favor del Vendedor. En la eventualidad de que el vehiculo de motor selec- cionado por el comprador sea entregado a éste y la compraventa sea subsiguientemente cancelada por acuerdo mutuo entre las partes contratantes y/o el préstamo solicitado para financiar la compra no quede debidamente perfeccionado por falta de desembolso o cualquier otra causa: el comprador expresamente autoriza al vendedor a reposeer el vehículo entregado, sin necesidad de notificación o intervención judicial previa y se obliga, además, a pagarle al vendedor y/o lo autoriza a retener de cualquier suma pagada o acreditada por concepto de "trade in", y/o entregada como pronto pago, la cuantia de noventa y cinco centavos [$0.95] por milla recorrida con el vehiculo. El comprador se obliga, además, a pagar al vendedor cualesquiera sumas de dinero re- queridas para reparar todo daño que haya sufrido el vehiculo desde la fecha en que el mismo le fue entregado hasta la fecha en que el mismo fue devuelto al vendedor. Se entiende que toda compra a plazos está condicionada a la aprobación y el desembolso del préstamo solicitado. El comprador representa a la vendedora ser mayor de edad. El comprador reconoce y acepta que está obligado a cumplir con los términos y condiciones establecidos en la garantia de fabrica y que las reparaciones bajo dicha garantia tienen que ser autorizadas por el manufacturero del vehiculo de motor. El comprador acepta y reconoce que los términos de la garantia de fabrica son de su conocimiento. Aunque esta orden de compra esté firmada por un vendedor, ésta no obligará en forma alguna a la vendedora hasta tanto haya sido aprobada y firmada por uno de los gerentes de la misma. Esta orden de compra y el contrato de venta condicional correspondiente, si la venta es a plazos, contienen por escrito todas las condiciones del negocio aqui establecido sin haberse hecho o extendido garantia y/o representación expresa o implicita alguna que no sean las aqui contenidas"</p>
                                </div>
                                <div class="fourthblock">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <textarea rows="5" class="col-xs-12" cols="30"></textarea>
                                            <p class="text-center">GERENCIA</p>
                                        </div>
                                        <div class="col-xs-6 px-0">
                                            <div class="inputsec4r2c1 text-center col-xs-12 br-0">
                                                <label>FIRMA DEL COMPRADOR</label>
                                                <input type="text" class="inputbox " />
                                            </div>
                                            <div class="inputsec4r2c2 text-center col-xs-6 br-0 bm-0">
                                                <label>FIRMA DEL VENDEDOR</label>
                                                <input type="text" class="inputbox " />
                                            </div>
                                            <div class="inputsec4r2c2 text-center col-xs-6 br-0 bm-0">
                                                <label>FACTURA NUM.</label>
                                                <input type="text" class="inputbox " />
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

    .headmiddle {
        font-weight: 600;
        font-size: 15px;
        margin: 0 0 5px 0;
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
        width: 100%;
    }

    .olinp {
        margin: 5px 0;
    }

    img {
        width: 100px;
    }

    .secondright {
        display: flex;
        flex-wrap: wrap;
        align-content: space-between;
    }

    .secondright .row {
        width: 100%;
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
            margin: 0 !important;
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
            line-height: 12px;
            color: #555;
            /* background-color: #eceffa !important; */
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        strong {
            font-weight: 700;
        }

        .row div.col-xs-2,
        div.col-xs-3,
        div.col-xs-4,
        div.col-xs-5,
        div.col-xs-6,
        div.col-xs-7,
        div.col-xs-8,
        div.col-xs-9,
        div.col-xs-10,
        div.col-xs-12 {
            padding: 0 2px !important;
        }

        .secondblock>.row>.col-sm-6 {
            padding: 0;
        }

        .secondblock>.row>.col-sm-6>.row>[class^="col-sm-"] {
            padding: 2px 2px !important;
        }


        .firstblock,
        .secondblock,
        .thirdblock,
        .fourthblock {
            border: 2px solid #000;
            border-bottom: 0;
            padding: 0px !important;
            margin-bottom: 5px;
        }

        #print_block .secondblock {
            margin-bottom: 5px !important;
            border: 2px solid #000 !important;
        }

        #print_block .thirdblock {
            padding: 3px !important;
            margin-bottom: 5px !important;
            border: 2px solid #000 !important;
        }

        #print_block .firstblock {
            border-radius: 13px;
            margin-bottom: 5px !important;
            padding-left: 4px !important;
        }

        .fourthblock,
        .firstblock {
            border-bottom: 2px solid #000;
        }

        .thirdblock p {
            font-size: 8px !important;
        }

        .form-inline {
            /* display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 0px;
            padding-top: 2px; */
        }

        div#print_block .firstblock .row>div input[type="checkbox"] {
            vertical-align: middle;
            height: 10px;
            width: 10px;
        }

        div#print_block .row>div input {
            border: none;
            padding: 0;
        }

        div#print_block .firstblock .row>div,
        div#print_block .secondblock .row>div,
        div#print_block .fourthblock .row .inputsec4r2c1,
        /* div#print_block .secondblock .rbottom>h4, */
        div#print_block .secondblock .row>h4 {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
        }

        .br-0 {
            border-right: 0px !important;
        }

        .pe-5p {
            padding-right: 5px;
        }

        .bm-0 {
            border-bottom: 0 !important;
        }

        div#print_block .secondblock .row>div.px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important;
            border-right: 0px;
        }


    }
</style>

</html>