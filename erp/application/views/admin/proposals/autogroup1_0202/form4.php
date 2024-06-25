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
                        form4
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
                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6 align-self-end text-center">
                                        <p class="headtext">CONTRATO DE RENUNCIA AL DERECHO DE <br>SANEAMIENTO (GARANTIA DEL CODIGO CIVIL 2020)</p>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <h4 class="headmiddle">DEAL# 41257</h4>
                                        <h4 class="headmiddle">STK # DJW158378</h4>
                                        <h4 class="headmiddle">CUST# 7876199361</h4>
                                        <h4 class="headmiddle">FORM# 73430 NSK-FI</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <h4><strong>FAVOR LEER DETENIDAMENTE ANTES DE INICIAR y FIRMAR</strong></h4>
                                <ol>
                                    <li>
                                        Durante el día de hoy, 01 de January de 2024 hemos seleccionado, de forma libre y voluntaria, el vehículo de motor (el "Vehículo") descrito en el correspondiente contrato de compraventa u orden de compra; Iniciales
                                        <input type="text" class="inputbox li1i1" />
                                    </li>
                                    <li>Que el ejecutivo de ventas nos divulgó nuestro derecho de traer un perito mecánico para que inspeccione el Vehículo antes de la comprar el mismo, derecho que hemos ejercido o renunciado de forma libre y voluntaria; Iniciales
                                        <input type="text" class="inputbox li1i2" />
                                    </li>
                                    <li>LOS SUSCRIBIENTES, LIBRE Y VOLUNTARIAMENTE, ACEPTAN Y ACUERDAN LA SUPRESIÓN (ENTIÉNDASE LA ELIMINACIÓN) DE LA OBLIGACIÓN DE SANEAMIENTO POR (ENTIENDASE GARANTÍA CONTRA) EVICCIÓN Y/O DEFECTOS OCULTOS IMPUESTA AL VENDEDOR POR EL CÓDIGO CIVIL DE PUERTO RICO Y, A TENOR CON ELLO, RELEVAMOS DE FORMA IRREVOCABLE AL VENDEDOR DE TODA OBLIGACIÓN DE SANEAMIENTO POR EVICCIÓN Y/O DEFECTOS OCULTOS IMPUESTA POR EL CÓDIGO CIVIL DE PUERTO RICO. Iniciales
                                        <input type="text" class="inputbox li1i3" />
                                    </li>
                                    <li>Damos fe de haber recibido y leído los Artículos 1261 al 1263 y 1267 del Código Civil de Puerto Rico, por lo que la presente renuncia y relevo de responsabilidad se hace con pleno conocimiento de sus implicaciones. Iniciales
                                        <input type="text" class="inputbox li1i4" />
                                    </li>
                                    <li>
                                        En la eventualidad de que el Vehículo tenga menos de 100,000 millas registradas en el odómetro, la compra del mismo incluye la protección conferida por los términos y condiciones de cierta otra garantía limitada provista, por escrito, por el Manufacturero y/o el Vendedor. Iniciales
                                        <input type="text" class="inputbox li1i5" />
                                    </li>
                                    <li>Que hemos examinado, inspeccionado y/o probado el Vehículo y lo aceptamos sin reserva de clase alguna por encontrarlo en condiciones satisfactorias. Iniciales
                                        <input type="text" class="inputbox li1i6" />
                                    </li>
                                    <li class="li7">
                                        Que durante la referida inspección nos percatamos y/o fuimos informados de los siguientes defectos, vicios y/o condiciones del Vehículo:
                                        <input type="text" class="inputbox li1i7" />
                                        <input type="text" class="inputbox li1i8" />
                                        <input type="text" class="inputbox li1i9" />.
                                        Iniciales
                                        <input type="text" class="inputbox li1i10" />
                                    </li>
                                    <li>
                                        Reconocemos que no hemos pactado con el Vendedor un uso particular para el Vehículo y que este será destinado para el uso ordinario y corriente brindado a vehículos de motor.
                                    </li>
                                    <li>
                                        Aceptamos que la adquisición de un vehículo de motor es un gasto, no una inversión, por lo que deprecia de valor desde el momento en que es sacados de las facilidades del Vendedor. Reconocemos que el Vehículo requiere mantenimiento preventivo y el cambio regular de ciertas piezas de uso y desgaste para mantenerlo en condiciones óptimas de funcionamiento.
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p>El Comprador #1</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">&nbsp;</div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p class="text-center">El Comprador #2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="showprintonly">
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                    <div class="col-xs-12"> &nbsp;</div>
                                </div>

                                <ol>
                                    <div class="showprintonly">
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                    </div>


                                    <li>
                                        <p><strong>El Artículo 1261</strong> del Código Civil de 2020 dispone:<br></p>
                                        <p>"La persona que transmite un bien a título oneroso responde por evicción y por los defectos ocultos del bien aunque lo ignorase.<br></p>
                                        <p>Igual obligación se deben entre sí quienes dividen bienes comunes.<br></p>
                                        <p> La persona obligada responde ante el adquirente y quienes lo sucedan en el derecho por cualquier causa y título".</p>
                                    </li>
                                    <li>
                                        <p><strong>El Artículo </strong> del Código Civil de 2020 dispone:<br></p>
                                        <p>"El transmitente está obligado en los términos del artículo anterior, aunque nada se exprese en el acto de enajenación o división.<br></p>
                                        <p>Las partes pueden aumentar, disminuir o suprimir esta obligación. La disminución o supresión de la responsabilidad es inválida si la parte transmitente incurre en dolo."</p>
                                    </li>
                                    <li>
                                        <p><strong>El Artículo 1263</strong> del Código Civil de 2020 dispone:<br></p>
                                        <p>"El adquirente puede optar por reclamar la subsanación o reparación de los defectos, la entrega de un bien equivalente o resolver total o parcialmente el contrato.<br></p>
                                        <p>La resolución total solo procede si la evicción o el defecto recaen sobre un aspecto determinante para la adquisición del bien. La misma regla es de aplicación en caso de adquisición conjunta de varios bienes.<br></p>
                                        <p>En caso de evicción, el adquirente también tiene derecho al resarcimiento de los daños sufridos, salvo que haya actuado con negligencia.<br></p>
                                        <p>En caso de vicio redhibitorio, el adquirente solo tiene derecho al resarcimiento de los daños sufridos si el transmitente actuó con dolo.<br></p>
                                        <p> En ambos casos, si la adquisición se hizo a riesgo del adquirente o en subasta judicial o administrativa, no se responde por el resarcimiento de los daños sufridos y de los gastos que haya incurrido para sanear el título"</p>
                                    </li>
                                    <li>
                                        <p><strong>El Artículo </strong> del Código Civil de 2020 define como redhibitorio aquel defecto oculto en el
                                            bien transmitido a título oneroso, existente al tiempo de la adquisición, que hace impropio al
                                            bien para su destino o disminuye de tal modo su utilidad que, de haberlo conocido, el adquirente
                                            no lo habría adquirido o habría dado menos por él. También se considera vicio redhibitorio:</p>
                                        (a) aquel especialmente acordado como tal por las partes.<br>
                                        (b) aquel que el transmitente garantiza que no existe, y<br>
                                        (c) la ausencia de la calidad convenida.
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p>El Comprador #1</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">&nbsp;</div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <input type="text" class="inputbox tr1i1" />
                                            <p class="text-center">El Comprador #2</p>
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
        width: 150px;
    }

    .headmiddle {
        font-weight: 700;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    ol {
        list-style: decimal;
        margin-left: 20px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    #print_block li {
        padding: 0 40px 10px;

    }

    .li1i8 {
        width: 100%;
    }
    .showprintonly{
        display: none;
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
            font-size: 12.5px;
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

        ol input[type="text"] {
            margin-bottom: 10px;
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
        .showprintonly{
            display: block;
        }


    }
</style>

</html>