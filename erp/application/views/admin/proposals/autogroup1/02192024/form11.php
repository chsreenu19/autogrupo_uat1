<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');

?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-primary pull-right hide-print" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg hide-print tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        form06
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> DE: <input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> A: <input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h4 class="headtext text-center"><strong>CONDUCE DE ENTREGA</strong> </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="flexdiv">
                                            <p>Entregado A: <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Nombre: <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Dirección:<textarea class="inputbox"></textarea></p>
                                            <p> Guiado por:<input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">&nbsp;</div>
                                    <div class="col-xs-3">
                                        <div class="flexdiv">
                                            <p>Condiciones: <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Venta auto &nbsp; &nbsp; <input type="checkbox" class=" fr1i1" /></p>
                                            <p> Transf. Lote &nbsp; &nbsp; <input type="checkbox" class=" fr1i1" /></p>
                                            <p> Inst. accesorios &nbsp;&nbsp;<input type="checkbox" class=" fr1i1" /></p>
                                            <p> Otros<input type="text" class="inputbox fr1i1" /></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 table-responsive">
                                        <table class="table table-bordered table-CONDUCE">
                                            <thead>
                                                <tr>
                                                    <th>MARCA</th>
                                                    <th>MODELO</th>
                                                    <th>COLOR</th>
                                                    <th>AÑO</th>
                                                    <th class="NUMERO_FRAME">NUMERO FRAME</th>
                                                    <th>NUMERO STOCK</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="inputbox" />
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
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

    .showprintonly {
        display: none;
    }

    .flexdiv p {
        display: flex;
        white-space: nowrap;
        align-items: end;

    }

    .flexdiv input[type="text"] {
        width: 100%;
    }

    .bodycontent .flexdiv input[type="text"] {
        width: 87%;
        margin-left: auto;
    }

    textarea.inputbox {
        width: 87%;
        margin-left: auto;
        height: 60px;
        resize: none;
    }

    .headtext {
        border: 2px solid #000;
    }

    .table-CONDUCE th,
    .table-CONDUCE td {
        max-width: 50px;
    }

    .table-CONDUCE input {
        width: 100% !important;
    }

    .NUMERO_FRAME {
        min-width: 150px;
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
            font-size: 11.5px;
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

        textarea.inputbox {
            width: 87%;
            margin-left: auto;
            height: 48px;
            resize: none;
            border: none;
            border-bottom: 1px solid #000;
        }

        .NUMERO_FRAME {
            min-width: 160px;
        }

        .table-CONDUCE input[type="text"] {
            width: 100%;
            border: none;
        }

    }
</style>

</html>