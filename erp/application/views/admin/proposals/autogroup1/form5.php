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
                        form5
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">

                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <h4 class="headmiddle">DEAL# 41257</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <ol>
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

    #print_block li {
        padding: 0 50px 10px;

    }

    .li1i8 {
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