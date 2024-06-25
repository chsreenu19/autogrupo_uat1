<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();
$userstaffid = $this->session->userdata('staff_user_id');

?>
<div id="wrapper">
    <div class="content accounting-template proposal">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary pull-right" onclick="print(this);"><i class="fa fa-print"></i> </button>
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700 tw-flex tw-items-center tw-space-x-2">
                    <span>
                        Authorization to Liquidate Accounts
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
                                <div class="col-sm-12">
                                    <h3 class="main_head"> Autorización a Liquidar<br>Cuentas</h3>
                                    <div class="input_sec form-inline Fecha_text">
                                        <label>Fecha :</label>
                                        <input type="text" class="inputbox ">
                                    </div>
                                    <p class="text-bold small_head">A QUIEN PUEDA INTERESAR:</p>
                                    <div class="txinptbk">
                                        <span>YO,</span>
                                        <input type="text" class="txinpt" />
                                        <span>, AUTORIZO A MEDINA AUTO SALES, INC. A LIQUIDAR MI CUENTA NO.</span>
                                        <input type="text" class="txinpt" />
                                        <span> CON </span>
                                        <input type="text" class="txinpt" />
                                        <span>. GRACIAS POR ADELANTADO</span>
                                    </div>
                                    <div class="signintxt">
                                        <input type="text" class="inputbox" />
                                        <p>FIRMA DEL CLIENTE</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input_sec LIQ_text mb-15">
                                        <label>LIQUIDACIÓN TRADE IN EN SUCURSAL DE:</label>
                                        <input type="text" class="inputbox w-100">
                                    </div>
                                    <div class="input_sec STOCK_text mb-15">
                                        <label>STOCK:</label>
                                        <input type="text" class="inputbox w-100">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>MARCA:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>MODELO:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>AÑO:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>SERIE NO:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>TABLILLA:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec halfipt_text mb-15">
                                        <label>REGISTRO:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="input_sec FIRMAipt_text mb-15">
                                        <label>FIRMA DE QUIÉN VERIFICÓ LAS MULTAS:</label>
                                        <input type="text" class="inputbox">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="input_sec halfipt_text mb-15">
                                            <label>FECHA:</label>
                                            <input type="text" class="inputbox">
                                        </div>
                                        <div class="input_sec halfipt_text mb-15">
                                            <label>VENDEDOR:</label>
                                            <input type="text" class="inputbox">
                                        </div>
                                        <div class="input_sec halfipt_radio d-flex mb-15">
                                            <div class="form-inline">
                                                <label for="yes">SÍ</label>
                                                <input type="radio" id="yes" name="confirm" />
                                            </div>
                                            <div class="form-inline">
                                                <label for="no">NO</label>
                                                <input type="radio" id="no" name="confirm" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row contact_sec">
                                <div class="col-md-6 col-sm-6">
                                    <p class="text-bold small_head">VERIFICACIÓN DE MULTAS EN OBRA PÚBLICAS</p>
                                    <p class="text-bold small_head">CAGUAS <span>(787) 744-2290 / (787) 744-1990</span></p>
                                    <p class="text-bold small_head">GUAYAMA <span>(787) 744-2290 / (787) 744-1990</span></p>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <p class="small_head">NOTA: CLIENTE SE HACE RESPONSBALE DE</p>
                                    <p class="small_head">CUALQUIER DEUDA QUE APARECIERA EN LA</span></p>
                                    <p class="small_head">LIQUIDACIÓN Y/0 MULTAS.</span></p>
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
    input.inputbox,
    .txinpt {
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

    .main_head {
        display: none;
    }

    .txinpt {
        min-width: 33rem;
    }

    .txinptbk span {
        line-height: 50px;
        font-size: 16px;
        color: #000;
    }

    .text-bold {
        font-weight: 600;
    }

    .small_head {
        font-size: 16px;
        margin: 10px 0;
    }

    .signintxt {
        margin-top: 40px;
        width: 200px;
        text-align: center;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .LIQ_text,
    .STOCK_text,
    .FIRMAipt_text,
    .halfipt_text {
        display: flex;
        align-items: center;
    }

    .LIQ_text label {
        width: 24rem;
    }

    .STOCK_text label {
        width: 5rem;
    }

    .LIQ_text .w-100,
    .STOCK_text .w-100 {
        width: 100%;
    }

    .mb-15 {
        margin-bottom: 15px;
    }

    .halfipt_text label {
        display: inline-block;
        width: 5rem;
    }

    .halfipt_text input,
    .FIRMAipt_text label {
        width: 22rem;
    }

    .FIRMAipt_text input {
        width: 100%;
    }

    .halfipt_radio {
        width: 10rem;
        align-items: center;
    }

    .halfipt_radio .form-inline {
        margin-right: 25px;

    }

    .small_head span {
        font-weight: 400;
        padding-left: 15px;
    }

    hr {
        height: 3px;
        background-color: #808080;
    }

    @media print {

        /* a[href]:after {
            content: none !important;
        }
        img[src]:after {
            content: none !important;
        } */
        /* html {
            transform: scale(1.0);
            transform-origin: 0 0;
            zoom: 76%
        } */
        @page {
            size: A4;
            margin: 2rem;
        }


        body * {
            visibility: hidden;
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

        }

        .footer_strip {
            min-width: 227mm;
            bottom: 0;
            top: unset;
            left: -7mm;
            right: 0;
            width: 100%;
        }



        #wrapper {
            margin-left: 0;
            margin: 2rem;
        }

        label {
            display: inline-block;
        }

        input.inputbox {
            font-size: 16px;
            display: inline-block;
        }

        #print_block,
        #print_block * {
            visibility: visible;
            font-size: 16px;
            font-family: "open sans";
        }

        #print_block {
            position: absolute;
            left: 0;
            top: 0;
        }

        .main_head {
            display: block;
            font-size: 26pt !important;
            font-weight: 900;
            font-family: "open sans";
            margin-bottom: 40px;
        }

        .Fecha_text {
            margin-bottom: 40px
        }

        .signintxt input {
            border: none;
            border-bottom: 1px solid #666666;
        }

        .text-bold {
            font-weight: 600;
        }

        .txinpt {
            min-width: 23rem;
            /* width: auto; */
        }

        .txinptbk span {
            letter-spacing: 0;
            line-height: 45px;
            font-size: 16px;
        }

        .LIQ_text {
            display: flex;
        }

        .LIQ_text label {
            width: 31rem;
        }

        .LIQ_text .w-100 {
            width: 100%;
        }

        .contact_sec {
            display: flex;
            align-items: center;
            margin-top: 30px;
        }

        .contact_sec>div.col-sm-6 {
            width: 50%;
        }

        .halfipt_radio {
            margin-left: 20px;
        }

        .halfipt_radio .form-inline {
            width: 65px;
        }

        .halfipt_text {
            margin-right: 20px;
        }

        .d-flex .input_sec.halfipt_text {
            margin-right: 20px;
        }

        .d-flex .input_sec.halfipt_text label {
            width: 7rem;
        }

        .d-flex .input_sec.halfipt_text input {
            width: 15rem;
        }

        hr {
            border-top: 3px solid #808080;
            margin: 10x 0;
        }

        .FIRMAipt_text label {
            width: 24rem;
        }

        input[type="text"] {
            background-color: #e9ecf7 !important;
        }
    }
</style>

</html>