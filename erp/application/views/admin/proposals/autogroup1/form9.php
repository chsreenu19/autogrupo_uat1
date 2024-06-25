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
                    <?php echo $title; ?>
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">
                                <div class=" col-xs-6 align-self-end text-left">
                                    <?php get_company_logo_forms('','','dark') ?>
                                    </div>
                                    <h4 class="headtext col-xs-12 text-center"><strong>Buyer's eSign Consent Document</strong> </h4>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <p>ELECTRONIC SIGNATURE CONSENT TO DO BUSINESS Please read this information carefully and retain this information for future reference.Electronic Signatures. You are purchasing a vehicle which requires you to sign a series of forms which may include but are not limited to a buyer's order, a service contract, an insurance form and an odometer statement. This dealership is utilizing electronic signature technology to help make this transaction more convenient and secure. As a result, one or more of the forms required to purchase your vehicle may be eligible for electronic signature execution. Consent. By signing this consent form, you understand and agree that you intend to conduct business electronically and have your signature captured electronically to execute certain forms for this vehicle purchase only. For those forms that are eligible for electronic signature, you acknowledge that by signing your name on the electronic signature pad, you are indicating your intent to sign the applicable forms or documents and this constitutes your signature. for other forms that are not eligible for electronic signature, you will still be required to execute hard copy documents in pen. You will receive copies of all forms signed both electronically and signed in pen. Withdrawal of Consent. You have the right to withdraw your consent to do business electronically at any time during this vehicle purchase transaction. However, if you withdraw such consent during the purchase process, all electronic signatures and consents provided will be considered void and you may elect to proceed with the vehicle purchase using pen and paper signatures for all required documents.</p>
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



    }
</style>

</html>