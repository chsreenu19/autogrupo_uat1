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
                        form05
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">

                                    <h4 class="headtext col-xs-12 text-center"><strong>Buyer's Final Signature Document</strong> </h4>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="flexdiv">
                                            <p>
                                                <span>Deal Number: </span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span>Store Name: </span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span> F&I Manager:</span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span>Date:</span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span> Name:</span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span>Role:</span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span>Vehicle Make:</span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                            <p>
                                                <span>VIN:</span><input type="text" class="inputbox fr1i1" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p>Please sign below to acknowledge that you have electronically signed the following documents:</p>
                                <ol class="listdescimal">
                                    <li>Buyer's eSign Consent Document</li>
                                    <li>Contrato de Compra Venta</li>
                                    <li>We Owe</li>
                                    <li>Anexo Orden de Compra</li>
                                    <li>Solicitud Vehiculo de Motor</li>
                                    <li>Solicitud para regisstro de vehiculo</li>
                                    <li>Certificado De Garantia</li>
                                    <li>Acuerdo Suplementario (trade-in)</li>
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
    }

    ol {
        list-style: upper-roman;
        margin-left: 20px;
        margin-bottom: 0;
    }

    ul.listcircle {
        list-style: disc;
        margin-left: 15px;
    }

    #print_block ul.listcircle li {
        padding-left: 10px;
    }

    #print_block .listdescimal {
        list-style: decimal;
    }

    #print_block .listdescimal li {
        padding-left: 10px;
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
        padding: 0 10px 10px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    #print_block li {
        padding: 0 50px 7px;

    }

    .li1i8 {
        width: 100%;
    }

    .flexdiv p {
        margin-bottom: 5px;
    }

    .flexdiv p span {
        display: inline-block;
        width: 120px;
    }

    .showprintonly {
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
            font-size: 12px;
            font-family: "open sans";
            /* margin: 0 !important; */
        }

        .hide-print {
            display: none;
        }

        #wrapper,
        #setup-menu-wrapper {
            margin-left: 0;
            margin: 0 0;
            overflow: hidden;
            min-height: unset !important;
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

        .showprintonly {
            display: block;
        }

        .listsmallalpha li {
            padding-bottom: 5px;
        }

        .desimallist li {
            padding-left: 20px;
        }

        .flexdiv p span {
            display: inline-block;
            width: 120px;
        }



    }
</style>

</html>