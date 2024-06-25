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
                        ANNEX TO PURCHASE ORDER
                    </span>
                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="">
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
                                            <img src="" alt="custmer logo here" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="paratext my-2">
                                            YO, <input type="text" class="inputbox inp1" />
                                            &nbsp;MAYOR &nbsp; DE &nbsp; EDAD, &nbsp; SEGURO &nbsp; SOCIAL &nbsp;
                                            <input type="text" class="inputbox inp2" />, EMPLEADO Y VECINO DE
                                            <input type="text" class="inputbox inp3" />
                                            PUERTO RICO. CERTIFICO LO SIGUIENTE:
                                        </div>
                                        <ol class="list-items">
                                            <li class="mb-2">
                                                QUE MI NOMBRE Y CIRCUNSTANCIAS PERSONALES SON LAS ANTES EXPRESADAS.
                                            </li>
                                            <li>
                                                <p> QUE MI NOMBRE Y DIRECCIÓN FÍSICA Y POSTAL SON:</p>
                                                <div class="inptxtdiv mt-2 d-flex">
                                                    <span> NOMBRE </span>
                                                    <input type="text" class="inputbox li1inpt1" />
                                                </div>
                                                <div class="inptxtdiv mt-2 d-flex">
                                                    <span> DIRECCIÓN FÍSICA </span>
                                                    <textarea type="text" class="inputbox li1inpt1"></textarea>
                                                </div>
                                                <div class="inptxtdiv mt-2 d-flex">
                                                    <span> DIRECCIÓN POSTAL </span>
                                                    <textarea type="text" class="inputbox li1inpt1"></textarea>
                                                </div>
                                            </li>

                                            <li>
                                                QUE EN LA FECHA DE
                                                <input type="text" class="inputbox li2inpt1" />
                                                DE
                                                <input type="text" class="inputbox li2inpt2" />
                                                DE
                                                <input type="text" class="inputbox li2inpt3" />, ENTREGUE A
                                                <p>MEDINA AUTO SALES, INC. UN VEHÍCULO DE MOTOR MARCA </p> MODELO
                                                <input type="text" class="inputbox li2inpt4" />
                                                AÑO
                                                <input type="text" class="inputbox li2inpt5" />
                                                TABLILLA
                                                <input type="text" class="inputbox li2inpt6" />
                                            </li>
                                            <li>
                                                QUE EN MI MEJOR CONOCIMIENTO DICHO VEHÍCULO NO TIENE NINGÚN TIPO DE GRAVÁMENES, ESTÁ EN
                                                BUENAS CONDICIONES, NO HA SIDO INTERVENIDO POR LA POLICÍA DE PUERTO RICO, NO HA SIDO
                                                CONFISCADO NI SE HA COMETIDO DELITO ALGUNO CON EL MISMO, NI SE HA VIOLADO NINGUNA LEY
                                            </li>
                                            <li>
                                                QUE EN LA EVENTUALIDAD DE QUE EN DICHO VEHÍCULO APAREZCA ALGUNA DE LAS LIMITACIONES
                                                SEÑALADAS EN EL PÁRRAFO ANTERIOR, <strong>ME HAGO RESPONSABLE DEL PAGO.</strong>
                                            </li>
                                            <li>ASÍ MISMO, LIBERO A MEDINA AUTO SALES, INC. DE CUALQUIER PAGO, RESPONSABILIDAD, RESARCIMIENTO
                                                DE LOS HECHO EXPUESTOS EN EL PARRAFO #4 DE ESTE RELEVO DE RESPONSABILIDAD Y HAGO CONSTAR
                                                QUE SE REALIZARON TODAS LAS GESTIONES PERTINENTES PARA INSPECCIONAR DICHO VEHÍCULO Y
                                                ASEGURARSE QUE EL MISMO CUMPLE CON LOS REQUISITOS DE LEY INDISPENSABLES.
                                            </li>
                                            <li>
                                                <p>
                                                    QUE CUMPLIRÉ DE INMEDIATO A QUE SE EVIDENCIE LO ANTERIOR Y ME SOMETO A QUE RESUELVA CON EL
                                                    DEALER
                                                </p>
                                                <div>
                                                    EN <input type="text" class="inputbox li3inpt1" />,
                                                    PUERTO RICO HOY <input type="text" class="inputbox li3inpt2" />
                                                    DE <input type="text" class="inputbox li3inpt3" />
                                                    DE <input type="text" class="inputbox li3inpt4" />
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="div2igrp mt-5">
                                            <input type="text" class="inputbox div2itm1" />
                                            <span>DECLARANTE</span>
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
        display: none;
    }

    /* ----------- common css------- */
    ol {
        list-style: normal;
        padding-left: 15px;
    }

    .list-items li {
        margin-bottom: 10px;
    }

    .inptxtdiv {
        align-items: center;
    }

    .li1inpt1 {
        width: 70%;
        margin-left: auto;
    }

    .li2inpt1,
    .li2inpt2 {
        width: 7rem;
    }

    .li2inpt3 {
        width: 9rem;
    }

    .li2inpt4,
    .li2inpt5 {
        width: 9rem;
    }

    .li2inpt6 {
        width: 12rem;
    }

    .li3inpt1 {
        width: 8rem;
    }

    .li3inpt2,
    .li3inpt3 {
        width: 6rem;
    }

    .li3inpt4 {
        width: 8rem;
    }

    .div2igrp * {
        width: 233px;
        display: block;
        text-align: center;
    }


    /* -------------------------------------------------------------------------------------------- */
    @media print {


        /* ----------- common css------- */
        @page {
            size: A4;
            margin: 1rem 0rem;
        }

        .noprint {
            visibility: hidden;
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
            page-break-before: avoid  !important;
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
        .inp1 {
            width: 25rem;
        }

        .inp2 {
            width: 7rem;
        }

        .inp3 {
            width: 11rem;
        }

        .li1inpt1 {
            width: 70%;
            margin-left: auto;
        }

        .div2igrp input {
            border: none;
            border-bottom: 1px solid #555;
        }
    }
</style>

</html>