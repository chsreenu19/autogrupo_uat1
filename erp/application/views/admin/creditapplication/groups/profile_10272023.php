<?php defined('BASEPATH') or exit('No direct script access allowed'); 

//echo "<pre>"; print_r($alldata); exit;
?>
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
      font-size: 13px;
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
    .d-flex{
      display: flex;
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
    .col-md-25{
      width: 20%;
      padding-right: 15px;
      padding-left: 15px;
      position: relative;
      min-height: 1px;
      float: left;
    }
    @media (max-width:480px){
      .col-xs-25{
        width: 100%;
      }
    }
.Identification_row [class *="col-md-"]:not(first-child){

}
.Identification_row [class *="col-md-1"]{
width:12%;
}
.Identification_row [class *="col-md-1"]:not(last-child){

}
    @media print {
		a[href]:after { content: none !important; }
  img[src]:after { content: none !important; }
  
      @page {
        size: A3;
        margin:0;
      }

.card-header:first-child {
    line-height: normal;
	padding:5px !important;
}
      body * {
        visibility: hidden;

      }

      .table {
        margin-bottom: 0;
        padding: 5px;
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
        border-bottom: 0px solid #ccc;
      }

      .pnt_feilds label {
        margin-right: 10px;
        white-space: nowrap;
        margin-bottom: 0;

      }
.pnt_feilds .form-check-inline{
align-items:center;
}

      .pnt_feilds input {
        border-bottom: 1px solid #ccc !important;
        padding: 0px 5px 5px !important;
      }
	  .pnt_feilds .form-check-label{
	  margin-left:5px;
	  margin-bottom:0;
	  }
      .form-group .form-control{
        height:20px !important;
      }
      .checkwithinput input[type=text] {
        height: 20px;
        /* margin-top: 10px; */
      }
      .year_checkboxes{
        white-space:nowrap;
        display:flex;
      }

      .form-group, .form-group label {
        margin-bottom: 0;
		line-height:normal !important;
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
  <div class="col-md-12"><h5 class="pull-right btn btn-info" onclick="print(this);">Print Credit Application</h5></div>
 
	
  <div class="rowbs1 printarea" id="section-to-print">
    <?php echo form_open($this->uri->uri_string(), array('class' => 'client-form', 'autocomplete' => 'off')); ?>
    <div class="additional"></div>
    <div class="col-md-12">
      <div class="container-fluid p-4 ">
        <div class="rowbs1">
          <div class="col-md-5 col-sm-5">
            <div style="width:150px !important;"><?php get_company_logo() ?></div>
            <div class="rowbs1 align-items-end">
              <div class="col-md-12 col-sm-12" style="width: 101% !important;">
                <?php format_organization_info(); ?>
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
                    <div class="form-group pnt_feilds with_border">
                      <label>Date</label>
                      <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['quotedate']['date'];?>">
                    </div>
                  </td>
                  <td colspan="2">
                    <div class="form-group pnt_feilds with_border">
                      <label>Dealer</label>
                      <input type="text" class="form-control border" name="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group pnt_feilds with_border">
                      <label>Salesperson</label>
                      <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['quotedate']['Salesperson'];?>">
                    </div>
                  </td>
                  <td>
                    <div class="form-group pnt_feilds with_border">
                      <label>Telephone</label>
                      <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['quotedate']['assignedtophonenumber'];?>">
                    </div>
                  </td>
                  <td>
                    <div class="form-group pnt_feilds with_border">
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
            <div class="rowbs1">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="form-group pnt_feilds with_border">
                  <label>Make</label>
                  <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['make'];?>">
                </div>
                <div class="form-group pnt_feilds with_border">
                  <label> Millaje</label>
                  <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['millage'];?>">
                </div>
                <div class="form-group">
                  <label>Vehicle description</label>
                  <textarea class="form-control border" rows="2"><?php echo $alldata['main_data']['VehicleInformation']['vechicleDesc'];?></textarea>
                </div>

              </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="form-group pnt_feilds with_border">
                  <label>Model</label>
                  <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['model'];?>">
                </div>
                <div class="form-group ">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="New" value="option1">
                    <label class="form-check-label" for="New">New</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Old" value="option2" checked>
                    <label class="form-check-label" for="Old">Used</label>
                  </div>
                </div>
                <div class="form-group pnt_feilds with_border">
                  <label> Trade In</label>
                  <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['tradein'];?>">
                </div>
                <div class="rowbs1 alignitemscenter">
                 <div class="form-group col-md-5 col-sm-5 pnt_feilds ">
                  <label>Year</label>
                  <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['year'];?>">
                </div>

                <div class="col-md-7 col-sm-7 col-xs-7 pnt_feilds year_checkboxes">
                  <div class="form-check form-check-inline">
				  <?php
					$dp='';
					$ti = '';	
					if($alldata['main_data']['VehicleInformation']['downpayment']!=''){
						$dp='checked';
					}
					if($alldata['main_data']['VehicleInformation']['tradein']!=''){
						$ti='checked';
					}
					?>
                    <input class="form-check-input" type="checkbox" id="downpayment" value="option1" <?php echo $dp; ?>>
					
                    <label class="form-check-label" for="downpayment">Down payment</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tradein" value="option2" <?php echo $ti; ?>>
                    <label class="form-check-label" for="tradein">Trade In</label>
                  </div>

                </div>
              </div>

            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <div class="form-group  pnt_feilds with_border">
                <label> Price</label>
                <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['price'];?>">
              </div>
              <div class="form-group pnt_feilds with_border">
                <label> Down Payment</label>
                <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['downpayment'];?>">
              </div>
              <div class="form-group pnt_feilds with_border">
                <label> Balance</label>
                <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['balance'];?>">
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="form-group pnt_feilds with_border">
                <label>Termino</label>
                <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['VehicleInformation']['term']; ?>">
              </div>
              <div class="form-group col-md-12">
                <div class="rowbs1 checkwithinput alignitemscenter">
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
              <div class="form-group col-md-12">
                <div class="rowbs1 checkwithinput alignitemscenter">
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
              <div class="form-group col-md-12">
                <div class="rowbs1 checkwithinput alignitemscenter">
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
			  <div class="form-group pnt_feilds">
              <label><strong>Insurance</strong></label> 
              
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="Single" value="option1">
                  <label class="form-check-label" for="Single">Single</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="Double" value="option2">
                  <label class="form-check-label" for="Double">Double</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- ----card----- -->
      <div class="card">
        <div class="card-header bg-dark text-white">
          <i class="fa-solid fa-user"></i>&nbsp;
          Personal and Financial Applicant Information
        </div>
        <div class="card-body">
          <div class="rowbs1">
            <div class="col-md-25 col-sm-25 col-xs-25">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['personalInformation']['name']; ?>">
              </div>
           </div>
           <div class="col-md-25 col-sm-25 col-xs-25">
            <div class="form-group col">
              <label>Last Name</label>
              <input type="text" class="form-control border" name="" value="">
            </div>
          </div>
          <div class="col-md-25 col-sm-25 col-xs-25">
           <div class="form-group col-auto">
            <label>Mother’s maiden last name</label>
            <input type="text" class="form-control border" name="" value="">
          </div>
        </div>
        <div class="col-md-25 col-sm-25 col-xs-25">
          <div class="form-group">
            <label>Social Security Number</label>
			<?php 
			$number = '###-##-'.substr($alldata['main_data']['personalInformation']['ssn'], -4);
			?>
            <input type="text" class="form-control border" name="" value="<?php echo $number; ?>">
          </div>
        </div>
        <div class="col-md-25 col-sm-25 col-xs-25">
          <div class="form-group">
            <label>Birth Date</label>
            <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['personalInformation']['dob']; ?>">
          </div>
        </div>
      
            <div class="col-md-25 col-sm-25 col-xs-25 pe-0">
              
              <div class="form-group">
               <label style="white-space:nowrap"><strong>Identification</strong></label>
             </div>
           </div>
           <div class="col-md-25 col-sm-25 col-xs-25">
            
            <div class="form-group  pnt_feilds with_border">
              <label>Type</label>
              <input type="text" class="form-control border border-bottom" name="">
            </div>
          </div>
          <div class="col-md-25 col-sm-25 col-xs-25">
           
          <div class="form-group  pnt_feilds with_border">
            <label>Number</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
        <div class="col-md-25 col-sm-25 col-xs-25">
          
          <div class="form-group  pnt_feilds with_border">
            <label>State</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
        <div class="col-md-25 col-sm-25 col-xs-25">
          <div class="form-group  pnt_feilds with_border">
            <label>Expiration Date</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
      </div>
      <div class="rowbs1">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group mb-2">
            <label>Residential Address</label>

            <textarea class="form-control" rowbs1s="2"><?php echo $alldata['main_data']['personalInformation']['resaddress']; ?></textarea>
          </div>
          <div class="rowbs1 justify-content-end">
             <div class="col-md-5 col-sm-5 form-group pnt_feilds">
              <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
              <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code" value="<?php echo $alldata['main_data']['personalInformation']['reszip']; ?>">
            </div>
          </div>
          <div class="form-group mb-2">
            <label>Mailing Address</label>
            <textarea class="form-control" rows="2"></textarea>
          </div>
          <div class="rowbs1 justify-content-end">
            <div class="form-group mb-2 col-md-7 col-sm-7 pnt_feilds ">
              <label>Time in Address</label>
              <input type="text" class="form-control border" name="">
            </div>
            <div class="col-md-5 col-sm-5 form-group pnt_feilds">
              <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
              <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
            </div>
          </div>          
          <div class="form-group mb-2 pnt_feilds">
            <label>Email</label>
            <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['personalInformation']['email']; ?>">
          </div>
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
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group mb-2 ">
            <label>Name and address of current employer or Business</label>
            <textarea class="form-control" rows="2"></textarea>
          </div>
          <div class="rowbs1 justify-content-end">
            <div class="col-md-5 col-sm-5 form-group pnt_feilds">
              <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
              <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
            </div>
          </div>

          <div class="rowbs1">
            <div class="col-md-4 col-sm-4 col-xs-4">
              <label><strong>Time in employment</strong></label>
              <div style="display: flex;align-items: center;">
                <input type="text" class="form-control border" name="">
                <span>Years</span>
                <input type="text" class="form-control border" name="">
                <span>Month</span>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="form-group mb-2">
                <label>Position</label>
                <input type="text" class="form-control border" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="form-group mb-2">
              <label>Monthly Income($)</label>
              <input type="text" class="form-control border" name="">
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="form-group ">
              <label>Supervisor’s Name</label>
              <input type="text" class="form-control border" name="">
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="form-group ">
              <label>Telephone</label>
              <input type="text" class="form-control border" name="">
            </div>
          </div>
         
            <div class="d-flex  justify-content-between pt-3">
              <label class="mr-3">Residence Status &nbsp;&nbsp;</label>
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
        </div>
      </div>
    </div>
    <div class="rowbs1">
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group mb-2">
          <label>Telephone</label>
          <input type="text" class="form-control border" name="" value="<?php echo $alldata['main_data']['personalInformation']['telephone']; ?>">
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group mb-2">
          <label>Number of dependents</label>
          <input type="text" class="form-control border" name="">
        </div>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
       <div class="form-group mb-2">
        <label>Monthly Payment </label>
        <input type="text" class="form-control border" name="">
      </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
      <div class="form-group mb-2">
        <label>Mortgage</label>
        <input type="text" class="form-control border" name="">
      </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
      <div class="form-group mb-2 ">
        <label>Source of Income</label>
        <input type="text" class="form-control border" name="">
      </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
      <div class="form-group mb-2">
        <label>Other Income</label>
        <input type="text" class="form-control border" name="">
      </div>
    </div>
  </div>  
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

            <div class="col-md-12 text-center">
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
          <div class="rowbs1">
            <div class="col-md-25 col-sm-25 col-xs-25">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control border" name="">
              </div>
              
            </div>
            <div class="col-md-25 col-sm-25 col-xs-25">
              <div class="form-group col">
                <label>Last Name</label>
                <input type="text" class="form-control border" name="">
              </div>

            </div>
            <div class="col-md-25 col-sm-25 col-xs-25">
             <div class="form-group col-auto">
              <label>Mother’s maiden last name</label>
              <input type="text" class="form-control border" name="">
            </div>

          </div>
          <div class="col-md-25 col-sm-25 col-xs-25">
            <div class="form-group">
              <label>Social Security Number</label>
              <input type="text" class="form-control border" name="">
            </div>

          </div>
          <div class="col-md-25 col-sm-25 col-xs-25">
            <div class="form-group">
              <label>Birth Date</label>
              <input type="text" class="form-control border" name="">
            </div>

          </div>
          <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom: 10px;">
            <div class="form-group mb-2">
              <label>Mailing Addresss</label>

              <textarea class="form-control" rowbs1s="2"></textarea>
            </div>
            <div class="rowbs1 justify-content-end alignitemscenter ">
               <div class="col-md-4 col-sm-4 form-group pnt_feilds mb-0">
              <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
              <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
            </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 " style="margin-bottom: 10px;">
            <div class="form-group mb-2">
              <label>Residential Address</label>

              <textarea class="form-control" rowbs1s="2"></textarea>
            </div>
            <div class="rowbs1 justify-content-end pnt_feilds with_border ">
               <div class="col-md-5 col-sm-5 form-group pnt_feilds mb-0">
              <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
              <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
            </div>
            </div>
          </div>
        </div>
        <div class="rowbs1 Identification_row">
          <div class="col-md-1 col-sm-1 col-xs-1 pe-0">

            <div class="form-group">
             <label><strong>Identification</strong></label>
           </div>
         </div>
         <div class="col-md-2 col-sm-2 col-xs-2">

          <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">

          <div class="form-group ">
            <label>Number</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">

          <div class="form-group ">
            <label>State</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
        <div class="col-md-1 col-sm-2 col-xs-2 ">         
          <div class="form-group  ">
            <label>Expiration Date</label>
            <input type="text" class="form-control border border-bottom" name="">
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div class="form-group mb-2 ">
            <label class=" w-100">Email</label>
            <input type="text" class="form-control border" name="">
          </div>
        </div>
        
      </div>
      <div class="rowbs1">
        <div class="col-md-6 col-sm-6 col-xs-6 ">
          <div class="form-group mb-2">
            <label>Name of current employer or business</label>
            <textarea class="form-control" rows="2"></textarea>
          </div>
          <div class="rowbs1 justify-content-end">
             <div class="col-md-5 col-sm-5 form-group pnt_feilds">
              <label for="colFormLabelSm" class=" col-form-label col-form-label-sm text-end">Zip Code:</label>
              <input type="text" class="form-control form-control-sm border" id="colFormLabelSm" placeholder="Zip code">
            </div>
          </div>
          <div class="form-group mb-2">
            <label>Comments</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 ">
          <div class="rowbs1">
            <div class="form-group mb-2 col-md-6 col-sm-6">
              <label>Supervisor’s Name</label>
              <input type="text" class="form-control border" name="">
            </div>
            <div class="form-group mb-2 col-md-6 col-sm-6">
              <label>Telephone</label>
              <input type="text" class="form-control border" name="">
            </div>
          </div>
          <div class="rowbs1 ">
            <div class="col-md-6 col-sm-6 col-xs-6 ">
              <label><strong>Time in employment</strong></label>
              <div style="display: flex;align-items: center;">
                <input type="text" class="form-control border" name="">
                <span>Years</span>
                <input type="text" class="form-control border" name="">
                <span>Month</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 ">
              <div class="form-group ">
                <label>Position</label>
                <input type="text" class="form-control border" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
              <div class="form-group mb-2">
                <label>Monthly Income($)</label>
                <input type="text" class="form-control border" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 ">
              <div class="form-group mb-2">
                <label>Source of Income</label>
                <input type="text" class="form-control border" name="">
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 ">
              <div class="form-group mb-2 ">
                <label>Other Incomes</label>
                <input type="text" class="form-control border" name="">
              </div>
            </div>
          </div>
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
        </div>
        <div class="col-md-12 col-sm-12 colxs-12">
          <p><span class="text-danger"> *</span>It is not necessary to include income from alimony, child support or separate pension unless you wish to consider it as part of your income in this application.</p>
          <p>Federal Law requires that all financial institutions obtain, verify, and keep records regarding the information that identifies all persons who open accounts. This means that, when you open an account, we will ask for your name, address, date of birth, and Social Security or Tax Identification number as well as other information that will allow us to identify you. We may also ask to see your driver’s license or other identifying documents. In all cases, protection of our customers’ identity and the confidentiality of customer information is our pledge to you.</p>
          <p>
          Everything I have stated in this application is correct to the best of my knowledge. I understand that FirstBank will retain this application whether or not it is approved. FirstBank is authorized to check my credit and employment history and to answer questions about your credit experience with me.</p>

          <div class="rowbs1">
            <div class="form-group col-md-3 col-sm-3 col-xs-3">
              <input type="text" class="form-control border border-bottom" name="">
              <label>Applicant signature</label>
            </div>
            <div class="form-group col-md-3 col-sm-3 col-xs-3">
              <input type="text" class="form-control border border-bottom" name="">
              <label>Position</label>
            </div>
            <div class="form-group col-md-3 col-sm-3 col-xs-3">
              <input type="text" class="form-control border border-bottom" name="">
              <label>Co-Applicant or Co-Signer signature (if apply) </label>
            </div>
            <div class="form-group col-md-3 col-sm-3 col-xs-3">
              <input type="text" class="form-control border border-bottom" name="">
              <label>Position</label>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <div class="card" id="only_pdf">

    <div class="card-header bg-dark text-white"><i class="fa-solid fa-building-columns"></i>&nbsp;
      For the Exclusive Use of the Bank
    </div>
    <div class="card-body">
      <div class="rowbs1 alignitemscenter">
        <div class="col-md-2 col-sm-2 col-xs-2">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="ExclusiveApproved22" value="option1">
            <label class="form-check-label" for="ExclusiveApproved22">Approved</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="ExclusiveDeclined22" value="option2">
            <label class="form-check-label" for="ExclusiveDeclined22">Declined</label>
          </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
          <div class="form-group ">
            <label>Amount($)</label>
            <input type="text" class="form-control border" name="">
          </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
          <div class="form-group pe-2">
            <label>Term in months</label>
            <input type="text" class="form-control border" name="">
          </div>
        </div>
        <div class="col-md-25 col-sm-25 col-xs-25">
         <div class="form-group pe-2">
          <label>Residual Value</label>
          <input type="text" class="form-control border" name="">
        </div>
      </div>
      <div class="col-md-25 col-sm-25 col-xs-25">
        <div class="form-group pe-2">
          <label>Officer ID</label>
          <input type="text" class="form-control border" name="">
        </div>
      </div>
      <div class="col-md-1 col-sm-1 col-xs-1">
       <div class="form-group pe-2">
        <label>Date</label>
        <input type="text" class="form-control border" name="">
      </div>
    </div>
    <div class="col-md-12 col-sm-12 colxs-12">
      <div class="form-group mb-2 d-flex">
        <label class=" col-md-3 col-sm-3">Comments and conditions </label>
        <textarea class="form-control" rows="2"></textarea>
      </div>
    </div>
  </div>

</div>
</div>

      
          </div>
         

        </div>
        <?php echo form_close(); ?>
      </div>


<?php $this->load->view('admin/clients/client_group'); ?>