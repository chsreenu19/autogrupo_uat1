<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="<?php echo APP_BASE_URL; ?>/assets/css/printstyles.css?language=fr" type="text/css" media="print">
<style type="text/css">
  .card {
    border: 0.5;
    box-shadow: 0 2px 15px -3px rgb(0 0 0 / 7%), 0 10px 20px -2px rgb(0 0 0 / 4%);
    margin-bottom: 10px;
  }

  .pe-2 {
    padding-right: 5px
  }

  .card {
    border: 0.5;
    box-shadow: 0 2px 15px -3px rgb(0 0 0 / 7%), 0 10px 20px -2px rgb(0 0 0 / 4%);
    margin-bottom: 10px;
  }


  .card-header {
    padding: 0.5rem 1rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, .03);
    border-bottom: 1px solid rgba(0, 0, 0, .125);
  }

  .card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
  }

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: 0.45rem;
  }

  .bg-dark {
    background: #212529;
  }

  .text-white {
    color: rgb(255, 255, 255);
  }

  .col {
    flex: 1 0 0%;
  }

  .rowbs1 {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x));
  }

  .form-group .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

  }

  .rowbs1>* {
    flex-shrink: 0;

    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-top: var(--bs-gutter-y);
  }

  .col-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .justify-content-between {
    justify-content: space-between !important;
  }

  .pt-3 {
    padding-top: 1rem !important;
  }

  .pe-5 {
    padding-right: 3rem !important;
  }

  .card-header:first-child {
    border-radius: calc(0.45rem - 1px) calc(0.45rem - 1px) 0 0;
    line-height: 30px;
  }

  .form-group ol {
    list-style: num;
    padding-left: 10px;
  }

  .justify-content-end {
    justify-content: flex-end !important;
  }

  .form-check-inline {
    display: inline-block;
    margin-right: 1rem;
  }

  .frhtbnk td {
    padding: 0 5px !important;
  }

  table {
    width: 100%;
  }

  .Product_Selection_block {
    align-items: center;
  }

  .Product_Selection_block .form-check.form-check-inline {
    display: flex;
    align-items: center;
  }

  .Product_Selection_block .form-check.form-check-inline * {
    margin: 0;
    margin-left: 4px;
  }

  .alignitemscenter {
    align-items: center;
  }

  .checkwithinput {
    align-items: center;
  }

  .checkwithinput label.form-check-label {
    min-width: 87px;
  }

  .checkwithinput input[type=text] {
    margin-left: 10px;
  }

  .pr-0 {
    padding-right: 0;
  }

  .mb-0 {
    margin-bottom: 0;
  }


  @media print {
    @page {
      size: A3;
    }

    body * {
      visibility: hidden;

    }

    .table {
      margin-bottom: 0;
      padding: 5px;
    }

    .form-control {
      display: none;
    }

    #section-to-print,
    #section-to-print * {
      visibility: visible;

    }

    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }

    .pnt_feilds {
      display: flex;
    }

    .pnt_feilds.with_border {
      border-bottom: 0.5px solid #ccc;
    }

    .pnt_feilds label {
      margin-right: 10px;
      white-space: nowrap;
      width: 150px;
      margin-bottom: 0;

    }

    .pnt_feilds input {
      border-bottom: 0px !important;
      height: unset;
      padding: 0px 5px;
    }

    .checkwithinput input[type=text] {
      height: 20px;
      /* margin-top: 10px; */
    }

    .form-group {
      margin-bottom: 0;
    }

    .form-control {
      background: #000;
    }

    .form-group {
      margin: 5px 0 !important;
    }

    #sample {
      border-top: 0px transparent solid;
    }
    #sample>tr>td{
      border-width: 1px 0 0 1px !important;
  }
    textarea.form-control::-webkit-scrollbar {
      display: none;
    }
  }
</style>
<h5 class="pull-right btn btn-info" onclick="print(this);">Print Credit Application</h5>
<h4 class="customer-profile-group-heading"><?php echo _l('client_add_edit_profile'); ?></h4>

<div class="rowbs1 printarea" id="section-to-print">
  <?php echo form_open($this->uri->uri_string(), array('class' => 'client-form', 'autocomplete' => 'off')); ?>
  <div class="additional"></div>
  <div class="col-md-12">
    <div class="container-fluid p-4 ">
      <div class="rowbs1">
        <div class="col-md-5 col-sm-5">
          <div style="width:150px !important;"><?php get_company_logo_able() ?></div>
          <div class="rowbs1 align-items-end">
            <div class="col-md-12 col-sm-12" style="width: 101% !important;">
              <?php echo format_organization_info(); ?>
              <hr style="width: 100%; margin:5px 0">
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="d-flex pe-5 justify-content-between pt-3 Product_Selection_block ">
                <label class="">Producto</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="Convencional" value="option1">
                  <label class="form-check-label" for="Convencional">Convencional</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="Leasing" value="option1">
                  <label class="form-check-label" for="Leasing">Leasing</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="PRP" value="option1">
                  <label class="form-check-label" for="PRP">PRP</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-sm-7">
          <h3 class="pl-5 text-end ms-auto">Solicitud de Credito / Credit Application</h3>
          <div class="table-responsive">
            <table class="table border table-bordered">
              <tr>
                <td>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </td>
                <td colspan="2">
                  <div class="form-group">
                    <label>Dealer</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group">
                    <label>Salesperson</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4">
      <div class="card box-shadow">
        <div class="card-header bg-dark text-white"><i class="fa-solid fa-car"></i>&nbsp; Vehicle Information</div>
        <div class="card-body">
          <table class="table border table-bordered">
            <tr>
              <td>
                <div class="form-group pnt_feilds with_border">
                  <label>Make</label>
                  <input type="text" class="form-control border" name="">
                </div>
                <div class="form-group pnt_feilds ">
                  <label> Millaje</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pnt_feilds with_border">
                  <label>Model</label>
                  <input type="text" class="form-control border" name="">
                </div>
                <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="New" value="option1">
                    <label class="form-check-label" for="New">New</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Old" value="option2">
                    <label class="form-check-label" for="Old">Old</label>
                  </div>
                </div>
              </td>
              <td>
                <div class="form-group pnt_feilds with_border">
                  <label> Price</label>
                  <input type="text" class="form-control border" name="">
                </div>
                <div class="form-group pnt_feilds">
                  <label> Down Payment</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pnt_feilds with_border">
                  <label>Termino</label>
                  <input type="text" class="form-control border" name="">
                </div>
                <div class="form-group">
                  <div class="row checkwithinput alignitemscenter">
                    <div class="col-md-6 col-sm-6 pr-0">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Single_Interest" value="option1">
                        <label class="form-check-label" for="Single_Interest">Single Interest</label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 d-flex alignitemscenter">
                      <label class="mb-0">$</label>
                      <input type="text" class="form-control border" name="">
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="form-group">
                  <label>Vehicle description</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td style="vertical-align: middle;">
                <div class="form-group pnt_feilds with_border">
                  <label> Trade In</label>
                  <input type="text" class="form-control border" name="">
                </div>
                <div class="form-group pnt_feilds">
                  <label> Balance</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td style="width: 26rem;">
                <div class="form-group">
                  <div class="row checkwithinput alignitemscenter">
                    <div class="col-md-6 col-sm-6 pr-0">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="double_interest" value="option1">
                        <label class="form-check-label" for="double_interest">Double Interest</label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 d-flex alignitemscenter">
                      <label class="mb-0">$</label>
                      <input type="text" class="form-control border" name="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row checkwithinput alignitemscenter">
                    <div class="col-md-6 col-sm-6 pr-0">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="credit_life" value="option1">
                        <label class="form-check-label" for="credit_life">Credit Life</label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 d-flex alignitemscenter">
                      <label class="mb-0">$</label>
                      <input type="text" class="form-control border" name="">
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="width: 100px;">
                <div class="rowbs1 alignitemscenter">
                  <div class="form-group col-md-5 col-sm-5 pnt_feilds">
                    <label>Year</label>
                    <input type="text" class="form-control border" name="">
                  </div>

                  <div class="col-md-7 col-sm-7">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="downpayment" value="option1">
                      <label class="form-check-label" for="downpayment">Down payment</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="tradein" value="option2">
                      <label class="form-check-label" for="tradein">Trade In</label>
                    </div>

                  </div>
                </div>
              </td>
              <td>
                <div class="form-group pnt_feilds">
                  <label>Residual Value</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pnt_feilds ">
                  <label>Insurance</label>
                  <!-- <input type="text" class="form-control border" name=""> -->
                  <!-- <select class="form-control">
                    <option>Single</option>
                    <option>Double</option>
                  </select> -->
                  <div class="form-check form-check-inline  ">
                    <input class="form-check-input" type="checkbox" id="Single" value="option1">
                    <label class="form-check-label" for="Single">Single</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Double" value="option2">
                    <label class="form-check-label" for="Double">Double</label>
                  </div>
                </div>

              </td>
            </tr>
          </table>
        </div>
      </div> <!-- ----card----- -->
      <div class="card">
        <div class="card-header bg-dark text-white">
          <i class="fa-solid fa-user"></i>&nbsp;
          Personal and Financial Applicant Information
        </div>
        <div class="card-body">
          <table class="table border table-bordered">
            <tr>
              <td style="    width: 50vw">
                <div class="rowbs1">
                  <div class="form-group col">
                    <label>Name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group col">
                    <label>Last Name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group col-auto">
                    <label>Mother’s maiden last name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </div>
              </td>
              <td colspan="2">
                <div class="form-group">
                  <label>Social Security Number</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <label>Birth Date</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div class="rowbs1 align-items-center fontform_pdf">
                  <div class="col">
                    <label>Identification</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Type</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Number</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>State</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Expiration Date</label>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group mb-2">
                  <label>Residential Address</label>

                  <textarea class="form-control" rowbs1s="2"></textarea>
                </div>
                <div class="rowbs1 justify-content-end">
                  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-end">Zip Code:</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
                  </div>
                </div>
              </td>
              <td colspan="3">
                <div class="form-group mb-2 ">
                  <label>Name and address of current employer or business</label>
                  <textarea class="form-control" rowbs1s="2"></textarea>
                </div>
                <div class="rowbs1 justify-content-end">
                  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-end">Zip Code:</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group mb-2">
                  <label>Mailing Address</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <div class="rowbs1 justify-content-end">
                  <div class="form-group mb-2 col-md-7 col-sm-7">
                    <label>Time in Address</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="col-md-5 col-sm-5">
                    <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
                    <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
                  </div>
                </div>
                <div class="form-group mb-2">
                  <label>Email</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td colspan="3" class="p-0 col-md-6">
                <table class="table mb-0 bordernone_pdf" id="sample" style=" border-width: 0px 0 0 0px !important;">
                  <tr>
                    <td style=" border-width: 0px 1px 1px 0px !important;" >
                      <div class="form-group mb-2">
                        <label>Time in employment</label>
                        <div class="d-flex">
                          <input type="text" class="form-control border" name="">
                          <span>Years</span>
                          <input type="text" class="form-control border" name="">
                          <span>Month</span>
                        </div>
                      </div>
                    </td>
                    <td style=" border-width: 0px 0 1px 0px !important;">
                      <div class="form-group mb-2">
                        <label>Position</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td style=" border-width: 0px 0 1px 0px !important;">
                      <div class="form-group mb-2">
                        <label>Monthly Income($)</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style=" border-width: 0px 1px 0 0px !important;">
                      <div class="form-group ">
                        <label>Supervisor’s Name</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td style=" border-width: 0px 0 0 0px !important;">
                      <div class="form-group ">
                        <label>Telephone</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="4" class="p-0">
                <table class="table table-bordered mb-0" >
                  <tr>
                    <td style=" border-width: 0px 0 1px 0px !important;">
                      <div class="form-group mb-2">
                        <label>Telephone</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td style=" border-width: 0px 1px 1px 0px !important;">
                      <div class="form-group mb-2">
                        <label>Number of dependents</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td style=" border-width: 0px 0 1px 0px !important;">
                      <div class="d-flex pe-5 justify-content-between pt-3">
                        <label class="">Agreement</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Verbal" value="option1">
                          <label class="form-check-label" for="Verbal">Verbal</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Written" value="option1">
                          <label class="form-check-label" for="Written">Written</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Court" value="option1">
                          <label class="form-check-label" for="Court">Court</label>
                        </div>
                      </div>
                      <div class="d-flex pe-5 justify-content-between pt-3">
                        <label class="">Residence Status</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="own" value="option1">
                          <label class="form-check-label" for="own">Own</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="rent" value="option1">
                          <label class="form-check-label" for="rent">Rent</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="withfamily" value="option1">
                          <label class="form-check-label" for="withfamily">With Family</label>
                        </div>
                      </div>
                    </td>

                  </tr>
                  <tr>
                    <td style=" border-width: 0px 1px 0 0px !important;">

                      <div class="form-group mb-2">
                        <label>Monthly Payment </label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td style=" border-width: 0px 1px 0 0px !important;">
                      <div class="form-group mb-2">
                        <label>Mortgage</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td style=" border-width: 0px 0px 0 0px !important;">
                      <div class="rowbs1">
                        <div class="form-group mb-2 col-md-6 col-sm-6">
                          <label>Source of Income</label>
                          <input type="text" class="form-control border" name="">
                        </div>
                        <div class="form-group mb-2 col-md-6 col-sm-6">
                          <label>Other Income</label>
                          <input type="text" class="form-control border" name="">
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div> <!-- -----  card-------- -->
      <div class="card">
        <div class="card-header bg-dark text-white"><i class="fa-solid fa-user-large"></i>&nbsp;
          Personal and Financial Co - Applicant / Co -Signer Inform ation
        </div>
        <div class="card-body">
          <div class="rowbs1 justify-content-center">
            <!-- <div class="form-group col-md-5 text-end">
              <label><strong>Please select :</strong></label>
            </div> -->

            <div class="col-md-7">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="coApplicant" value="option1">
                <label class="form-check-label" for="coApplicant">Co-Applicant</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="coSigner" value="option2">
                <label class="form-check-label" for="coSigner">Co-Signer</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="downpayment" value="option1">
                <label class="form-check-label" for="downpayment">Down payment</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tradein" value="option2">
                <label class="form-check-label" for="tradein">Trade In</label>
              </div>
            </div>
          </div>
          <table class="table table-bordered mb-0">
            <tr>
              <td style="    width: 50vw" style=" border-width: 0px 1px 0 0px !important;">
                <div class="rowbs1">
                  <div class="form-group col">
                    <label>Name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group col">
                    <label>Last Name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group col-auto">
                    <label>Mother’s maiden last name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </div>
              </td>
              <td colspan="2" style=" border-width: 1px 1px 0 0px !important;">
                <div class="form-group">
                  <label>Social Security Number</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td style=" border-width: 1px 0px 0 0px !important;">
                <div class="form-group">
                  <label>Birth Date</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
            </tr>            
            <tr>
              <td style=" border-width: 1px 1px 0 0px !important;">
                <div class="form-group mb-2">
                  <label>Mailing Address</label>

                  <textarea class="form-control" rowbs1s="2"></textarea>
                </div>
                <div class="rowbs1 justify-content-end">
                  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-end">Zip Code:</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
                  </div>
                </div>
              </td>
              <td colspan="3" style=" border-width: 1px 0px 0 0px !important;">
                <div class="form-group mb-2 ">
                  <label>Residential Address</label>
                  <textarea class="form-control" rowbs1s="2"></textarea>
                </div>
                <div class="rowbs1 justify-content-end">
                  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-end">Zip Code:</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <div class="rowbs1 align-items-center fontform_pdf w-100">
                  <div class="col">
                    <label>Identification</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Type</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Number</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>State</label>
                  </div>
                  <div class="form-group col text-center">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Expiration Date</label>
                  </div>
                </div>
              </td>
              <td colspan="1">
                <div class="form-group mb-2 ">
                  <input type="text" class="form-control border" name="">
                  <label class="text-center w-100">Email</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-group mb-2">
                  <label>Name of current employer or business</label>
                  <textarea class="form-control" rowbs1s="1"></textarea>
                </div>
                <div class="rowbs1 justify-content-end">
                  <div class="col-md-3">
                    <label for="colFormLabelSm" class=col-form-label col-form-label-sm text-end">Zip Code:</label>
                    <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group mb-2 col-md-6 col-sm-6">
                    <label>Supervisor’s Name</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group mb-2 col-md-6 col-sm-6">
                    <label>Telephone</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </div>
              </td>
              <td colspan="3" class="p-0 col-md-6">

                <div class="rowbs1">
                  <div class="form-group mb-2 col-md-12">
                    <label>Time in employment</label>
                    <div class="row">
                      <div class=" col-md-6 col-sm-6">
                        <label>Years</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                      <div class=" col-md-6 col-sm-6">
                        <label>Month</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-2 col-md-6 col-sm-6 ">
                    <label>Position</label>
                    <input type="text" class="form-control border" name="">
                  </div>

                  <div class="form-group mb-2 col-md-6 col-sm-6">
                    <label>Monthly Income($)</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group mb-2 col-md-6 col-sm-6">
                    <label>Source of Income</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                  <div class="form-group mb-2 col-md-6 col-sm-6">
                    <label><span class="text-danger">*</span>Other Incomes</label>
                    <input type="text" class="form-control border" name="">
                  </div>
                </div>

              </td>
            </tr>
            <tr>
              <td colspan="5" class="p-0" style=" border-width: 0px 0px 0 0px !important;">
                <table class="table mb-0 " style=" border-width: 0px 0px 0 0px !important;">
                  <tr>
                    <td style="width:50%" style=" border-width: 0px 0px 0 0px !important;">
                      <label>Comments</label>
                      <textarea class="form-control w-100" rows="3" ></textarea>
                    </td>

                    <td style=" border-width: 0px 0px 0 0px !important;">
                      <div class="d-flex pe-5 justify-content-end pt-3">
                        <label class=""><strong>Agreement &nbsp; &nbsp;</strong></label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Verbal" value="option1">
                          <label class="form-check-label" for="Verbal">Verbal</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Written" value="option1">
                          <label class="form-check-label" for="Written">Griten</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="Court" value="option1">
                          <label class="form-check-label" for="Court">Court</label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <td colspan="5" style=" border-width: 0px 0px 0 0px !important;">
                    <span class="text-danger"> *</span>It is not necessary to include income from alimony, child support or separate pension unless you wish to consider it as part of your income in this application.
                  </td>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>


      <div class="card" id="only_pdf">
        <!-- <div class="card-header bg-dark text-white"><i class="fa-solid fa-user-large"></i>&nbsp;
          Bank References
        </div>
        <div class="card-body">
          <table class="table table-bordered mb-0">
            <tr>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Bank</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Branch</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Account Type</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
            </tr>
          </table>
        </div> -->
        <!-- <div class="card-header bg-dark text-white"><i class="fa-solid fa-asterisk"></i>&nbsp;
          Credit References
        </div> -->
        <div class="card-body">
          <!-- <table class="table table-bordered mb-0">
            <tr>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Lender’s Name</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td class="col-md-3 col-sm-3">
                <div class="form-group ">
                  <label>Telephone</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Account Number</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td class="col-md-3 col-sm-3">
                <div class="form-group">
                  <label>Outstanding Balance</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
            </tr>
          </table> -->
          <p>Federal Law requires that all financial institutions obtain, verify, and keep records regarding the information that identifies all persons who open accounts. This means that, when you open an account, we will ask for your name, address, date of birth, and Social Security or Tax Identification number as well as other information that will allow us to identify you. We may also ask to see your driver’s license or other identifying documents. In all cases, protection of our customers’ identity and the confidentiality of customer information is our pledge to you.</p>
          <p>
            Everything I have stated in this application is correct to the best of my knowledge. I understand that FirstBank will retain this application whether or not it is approved. FirstBank is authorized to check my credit and employment history and to answer questions about your credit experience with me.</p>
          <table class="mb-0 table fontsize_pdf">
            <tr>
              <td>
                <div class="row justify-content-between">
                  <div class="form-group col-md-3 col-sm-3">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Applicant signature</label>
                  </div>

                  <div class="form-group col-md-3 col-sm-3">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Position</label>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Co-Applicant or Co-Signer signature (if apply) </label>
                  </div>
                  <div class="form-group col-md-3 col-sm-3">
                    <input type="text" class="form-control border border-bottom" name="">
                    <label>Position</label>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="card-header bg-dark text-white"><i class="fa-solid fa-building-columns"></i>&nbsp;
          For the Exclusive Use of the Bank
        </div>
        <div class="card-body">
          <table>
            <tr>
              <td style="vertical-align: middle;">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="ExclusiveApproved22" value="option1">
                  <label class="form-check-label" for="ExclusiveApproved22">Approved</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="ExclusiveDeclined22" value="option2">
                  <label class="form-check-label" for="ExclusiveDeclined22">Declined</label>
                </div>
              </td>
              <td>
                <div class="form-group pe-2">
                  <label>Amount($)</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pe-2">
                  <label>Term in months</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pe-2">
                  <label>Residual Value</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pe-2">
                  <label>Officer ID</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
              <td>
                <div class="form-group pe-2">
                  <label>Date</label>
                  <input type="text" class="form-control border" name="">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="6">
                <div class="form-group mb-2 d-flex">
                  <label class=" col-md-3 col-sm-3">Comments and conditions </label>
                  <textarea class="form-control" rows="2"></textarea>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <!-- -----card-------- -->
      <!--<div class="card">
              <div class="card-header bg-dark text-white"><i class="fa-solid fa-money-check-dollar"></i>&nbsp;
                Bank References
              </div>
              <div class="card-body">
                <table class="table table-bordered mb-0" >
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Bank</label> 
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Branch</label>              
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Account Type</label>              
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Account Number</label>              
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td> 
                  </tr>
                </table>
              </div>
            </div> -->
      <!-- ------card------- -->
      <!--<div class="card">
              <div class="card-header bg-dark text-white"><i class="fa-solid fa-money-check-dollar-pen"></i>&nbsp;
                Credit References
              </div>
              <div class="card-body">
                <table class="table table-bordered mb-0" >
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Lender’s Name</label> 
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Telephone</label>              
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Account Number</label>              
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Outstanding Balance</label>              
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td> 
                  </tr>
                </table>
                <p>Federal Law requires that all financial institutions obtain, verify, and keep records regarding the information that identifies all persons who open accounts. This means that, when you open an account, we will ask for your name, address, date of birth, and Social Security or Tax Identification number as well as other information that will allow us to identify you. We may also ask to see your driver’s license or other identifying documents. In all cases, protection of our customers’ identity and the confidentiality of customer information is our pledge to you.</p>
                <p>
                Everything I have stated in this application is correct to the best of my knowledge. I understand that FirstBank will retain this application whether or not it is approved. FirstBank is authorized to check my credit and employment history and to answer questions about your credit experience with me.</p>
                <table class="mb-0 table" >
                  <tr>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control border border-bottom" name="">
                        <label>Applicant signature</label> 
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control border border-bottom" name="">
                        <label>Date</label>              
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control border border-bottom" name="">
                        <label>Co-Applicant or Co-Signer signature (if apply) </label>              
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control border border-bottom" name="">
                        <label>Date</label>              
                      </div>
                    </td> 
                  </tr>
                </table>
              </div>
            </div> -->
      <!-- ------card------- -->
      <!--<div class="card">
              <div class="card-header bg-dark text-white"><i class="fa-solid fa-building-columns"></i>&nbsp;
                For the Exclusive Use of the Bank
              </div>
              <div class="card-body">
                <table class="frhtbnk">
                  <tr>                    
                    <td style="vertical-align: middle;">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="ExclusiveApproved" value="option1">
                        <label class="form-check-label" for="ExclusiveApproved">Approved</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="ExclusiveDeclined" value="option2">
                        <label class="form-check-label" for="ExclusiveDeclined">Declined</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Amount($)</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Term in months</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Residual Value</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Officer ID</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control border" name="">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6">
                      <div class="form-group mb-2">
                        <label>Comments and conditions  </label> 
                        <textarea class="form-control" rowbs1s="1"></textarea>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div> -->
      <!-- ------card------ -->
    </div>
    <!-- --------------------------secondpage--------------------------------------- -->



  </div>
  <?php echo form_close(); ?>
</div>


<?php $this->load->view('admin/clients/client_group'); ?>