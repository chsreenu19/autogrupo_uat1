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
                        form2
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">
                                    <div class="col-sm-5 col-xs-5">
                                        <img src="data:image/jpeg;base64,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" />
                                    </div>
                                    <div class="col-sm-3 col-xs-3 align-self-end">
                                        <h4 class="headmiddle">DEAL# 41257</h4>
                                        <h4 class="headmiddle">STK # DJW158378</h4>
                                        <h4 class="headmiddle">CUST# 7876199361</h4>
                                        <h4 class="headmiddle">FORM# 73430 NSK-FI</h4>
                                    </div>
                                    <div class="col-sm-4 col-xs-4 align-self-end text-right">
                                        <p class="weowetext">WE OWE</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="fr1">
                                    <p class="flexdiv">
                                        NAME <input type="text" class="inputbox fr1i1" />
                                        STK # <input type="text" class="inputbox fr1i2" />
                                        NEW <input type="text" class="inputbox fr1i3" />
                                        USED <input type="text" class="inputbox fr1i4" />
                                    </p>
                                </div>
                                <div class="fr2">
                                    <p class="flexdiv">
                                        ADDRESS <input type="text" class="inputbox fr2i1" />
                                        YEAR <input type="text" class="inputbox fr2i2" />
                                        MAKE <input type="text" class="inputbox fr2i3" />
                                    </p>
                                </div>
                                <div class="fr3">
                                    <p class="flexdiv">
                                        CITY <input type="text" class="inputbox fr3i1" />
                                        STATE <input type="text" class="inputbox fr3i2" />
                                        ZIP <input type="text" class="inputbox fr3i3" />
                                        MODEL <input type="text" class="inputbox fr3i4" />
                                    </p>
                                </div>
                                <div class="fr4">
                                    <p class="flexdiv">
                                        PHONE <input type="text" class="inputbox fr4i1" />
                                        SERIAL # <input type="text" class="inputbox fr4i2" />
                                    </p>
                                </div>
                                <div class="fr5">
                                    <p>
                                        SALESPERSON <input type="text" class="inputbox fr5i1" />
                                        DEL. DATE <input type="text" class="inputbox fr5i2" />
                                    </p>
                                </div>
                                <div class="sr1">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ITEM NO.</th>
                                                <th>NAME OF ITEM</th>
                                                <th>PART</th>
                                                <th>LABOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr1td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr1td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr1td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr1td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr2td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr2td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr2td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr2td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr3td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr3td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr3td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr3td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr4td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr4td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr4td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr4td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr5td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr5td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr5td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr5td4" /></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="inputbox sr1tr6td1" /></td>
                                                <td><input type="text" class="inputbox sr1tr6td2" /></td>
                                                <td><input type="text" class="inputbox sr1tr6td3" /></td>
                                                <td><input type="text" class="inputbox sr1tr6td4" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tr1">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <p class="tr1p1"><strong>(FOR APPOINTMENT CALL SERVICE DEPT.)</strong></p>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <p class="tr1p2"> DATE <input type="text" class="inputbox fr5i2" /></p>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="tr1p3"> CUSTOMERds
                                                <p class="text-center">
                                                    <input type="text" class="inputbox fr5i2" />
                                                    <span>(FOR APPOINTMENT CALL SERVICE DEPARTMENT)</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6  text-right">
                                            <div class="tr1p4"> APPROVED
                                                <p class="text-center">
                                                    <input type="text" class="inputbox fr5i2" />
                                                    <span>MGR</span>
                                                </p>
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

    img {
        width: 70%;
    }

    .headmiddle {
        font-weight: 600;
        font-size: 15px;
        margin: 0 0 5px 0;
    }

    .weowetext {
        font-size: 33px !important;
        font-weight: 700;
        text-align: right;
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
    }

    .table-bordered {
        border: 1px solid #000;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>td {
        border: 1px solid #000;
        text-align: center;
    }

    .table>thead:first-child>tr:first-child>th {
        border-top: 0;
    }

    .table>thead>tr>th:first-child,
    .table>tbody>tr>td:first-child,
    .table>thead>tr>th:nth-child(3),
    .table>thead>tr>th:nth-child(4),
    .table>tbody>tr>td:nth-child(3),
    .table>tbody>tr>td:nth-child(4) {
        max-width: 30px;
        min-width: 30px;
    }




    .table>tbody>tr>td input {
        width: 100%;
        margin-bottom: 0;
        border-bottom: 0;
    }

    .table-bordered>thead>tr>th {
        border-bottom-width: 2px;
    }

    .tr1p3,
    .tr1p4 {
        display: flex;
        align-items: center;
    }

    .tr1p4 {
        justify-content: end;
    }

    .tr1p3 p,
    .tr1p4 p {
        width: 75%;
        display: inline-block;
    }

    .tr1p3 p input,
    .tr1p4 p input {
        width: 100%;
    }

    .tr1p3 p span,
    .tr1p4 p span {
        display: block;
        text-align: center;
    }

    .fr1i3,
    .fr1i4,
    .fr3i3 {
        width: 7%;
    }

    .fr1i2,
    .fr2i2,
    .fr3i2 {
        width: 25%;
    }

    .fr1i1 {
        width: 40%;
    }

    .fr2i1 {
        width: 44%;
    }

    .fr2i3 {
        width: 15.5%;
    }

    .fr3i4,
    .fr3i1 {
        width: 22%;
    }

    .fr4i1,
    .fr4i2 {
        width: 43%;
    }

    .fr5i1 {
        width: 57%;
    }

    .fr5i2 {
        width: 24%;
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

        .flexdiv {
            display: flex;
            width: 100%;
            align-items: self-end;
            white-space: nowrap;
        }

        .fr1i3,
        .fr1i4,
        .fr3i3 {
            width: 7%;
        }

        .fr1i2,
        .fr2i2,
        .fr3i2 {
            width: 30%;
        }

        .fr1i1 {
            width: 44%;
        }

        .fr2i1 {
            width: 44%;
        }

        .fr2i3 {
            width: 15.5%;
        }

        .fr3i4,
        .fr3i1 {
            width: 26%;
        }

        .fr4i1,
        .fr4i2 {
            width: 46%;
        }

        .fr5i1 {
            width: 62%;
        }

        .fr5i2 {
            width: 23%;
        }

        .tr1p3 p,
        .tr1p4 p {
            width: 75%;
            display: inline-block;
            margin-bottom: -8px;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>td {
            border: 1px solid #000;
            text-align: center;
            padding: 2px;
        }


    }
</style>

</html>