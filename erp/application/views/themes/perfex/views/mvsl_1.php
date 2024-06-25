<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
	.info_row {
		/* width: 80%;
      margin:auto; */
	}


	.afsr1 {
		margin-bottom: 10px;
	}

	.afsr1 h3 {
		font-size: 25px;
		font-weight: 600;
		margin-bottom: 20px;
	}

	.afsr1c2 {
		display: inline-block;
		margin-right: 35px;
	}

	.afsr4c2 .afsr1c2 {
		margin-right: 20px;
	}

	.afsr1c2 input[type="checkbox"],
	.afsr4c2 input[type="checkbox"] {
		width: 22px;
		height: 16px;
		vertical-align: sub;
	}

	.row[class*="afsr"] input[type="text"],
	.row[class*="afsr"] input[type="date"],
	input[type="time"] {
		width: 100%;
		min-height: 30px;
		border-radius: 5px;
		border: 1px solid #838383;
		padding: 5px 5px;
	}

	.row[class*="afsr"] label {
		font-weight: 400;
	}

	.afsr4c1,
	.afsr4c3,
	.afsr4c4,
	.afsr4c6,
	.afsr4c7,
	.afsr5c2,
	.afsr5c3 {
		text-align: center;
	}

	.afsr5 hr {
		background: #000;
		height: 2px;
		width: 100%;
	}

	.logo_block img {
		width: 100px;
		height: auto;
	}

	.logo_block p {
		font-weight: 600;
		margin-left: 10px;
		color: #000;

	}

	.afsr1c2 {
		min-width: 74px;
		text-align: left;
		display: inline-block;
		width: calc(100% / 3);
	}

	.afsr1c2 label {
		position: relative;
	}

	.afsr1c2 input[type="checkbox"] {
		display: none;
	}

	.afsr1c2 label:before {
		border-radius: 0;
		border: 1px solid #ccc;
		background-color: #fff;
		position: absolute;
		top: -1px;
		left: -25px;
		width: 20px;
		height: 20px;
		text-align: center;
		line-height: 21px;
		content: " ";
	}

	.afsr1c2 input:checked+label::before {
		content: "✓";
		background-color: #e5e5e5;
		color: #000;
		font-size: 20px;
	}

	.afsr6-1 {
		text-align: center;
	}


	@media print {
		body {
			margin-top: 0;
		}

		body * {
			font-size: 7.5pt;
			line-height: 8.5pt;
		}

		body label {
			font-size: 7pt !important;
			line-height: 16px;

		}

		@page {
			size: auto;
			margin: 0;
		}

		body * {
			visibility: hidden;
			line-height: normal;
		}

		.logo_block img {
			width: 60px !important;
			height: auto;
		}

		header {
			display: none;
		}

		a[href]:after {
			content: none !important;
		}

		img[src]:after {
			content: none !important;
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


		.row[class*="afsr"] input[type="text"],
		.row[class*="afsr"] input[type="date"],
		input[type="time"] {
			min-height: unset;
			border: none;
			border-bottom: 1px solid #000;
			border-radius: 0;
			padding: 0;
		}

		h4 {
			font-size: 10pt;
			background: #000;
			color: #fff;
			font-weight: 600;
			/* border-bottom: 1px solid #000; */
		}

		.afsr1 h3 {
			font-size: 18px;
			font-weight: 600;
			margin-bottom: 10px;
			margin-top: 5px;
		}

		.afsr5 hr {
			margin-bottom: 5px;
			margin-top: 5px;
			display: none;
		}

		.afsr1c2 {
			display: inline-block;
			margin-right: 20px;
		}

		.afsr4c2 label {
			margin-right: 10px;
		}

		.afsr5c1 h4 {
			border: unset;
			margin-bottom: 5px;
		}

		.afsr5c1 p {
			margin: 5px;
		}

		.afsr1c2 label {
			position: relative;
		}

		.afsr1c2 label:before {
			content: "(\00a0\00a0\00a0)";
			border-radius: 0;
			font-size: 10px;
			border: unset;
			background-color: unset;
			position: absolute;
			top: -1px;
			left: -18px;
			width: 20px;
			height: 20px;
			text-align: center;
			line-height: normal;
			color: #fff;
		}

		.afsr1c2 input:checked+label::before {
			content: "(✓)";
			background-color: unset;
			color: #000;
			font-size: 10px;
		}

		.logo_block img {
			width: 80px;
			height: auto;
		}

		.panel-body.proposal-content.tc-content.padding-30,
		.panel_s {
			padding: unset;
			border: none;
		}

		input[type="date"]::-webkit-inner-spin-button,
		input[type="time"]::-webkit-inner-spin-button,
		input[type="date"]::-webkit-calendar-picker-indicator,
		input[type="time"]::-webkit-calendar-picker-indicator {
			display: none;
			-webkit-appearance: none;
		}

		input[type=date]::-webkit-datetime-edit-text {
			-webkit-appearance: none;
			display: none;
		}

		input[type=date]::-webkit-datetime-edit-month-field {
			-webkit-appearance: none;
			display: none;
		}

		input[type=date]::-webkit-datetime-edit-day-field {
			-webkit-appearance: none;
			display: none;
		}

		input[type=date]::-webkit-datetime-edit-year-field {
			-webkit-appearance: none;
			display: none;
		}

		.sub-heading {
			margin-top: 5px;
		}

		.afsr4c2 {
			text-align: right;
		}

		.afsr4c2 .afsr1c2 {
			margin-right: 0px !important;
			max-width: 70px;
		}

	}
</style>
<div id="proposal-wrapper">

	<div class="mtop15 preview-top-wrapper">

		<div class="top" data-sticky data-sticky-class="preview-sticky-header">
			<div class="container preview-sticky-container">
				<div class="row">
					<div class="col-md-12">
						<div class="pull-left">
							<h4 style="color:#882c87;" class="bold no-mtop proposal-html-number"><span>Description</span>
							</h4>
						</div>
						<div class="visible-xs">
							<div class="clearfix"></div>
						</div>

						<?php echo form_open($this->uri->uri_string()); ?>

						<h5 class="pull-right btn btn-info" onclick="print(this);">Print</h5>


						<?php echo form_hidden('action', 'proposal_pdf'); ?>
						<?php echo form_close(); ?>


						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="section-to-print">
		<div class="col-md-12 proposal-left">
			<div class="panel_s mtop20">
				<div class="panel-body proposal-content tc-content padding-30">
					<!-- <div class="row">
						<div class="col-md-8">
							<div class="mbot30">
								<div class="proposal-html-logo" style="width:27%;">
									<?php echo get_dark_company_logo(); ?>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="rowbs1 align-items-end">
								<div class="col-md-12 col-sm-12" style="width: 101% !important;">
									<?php echo format_organization_info(); ?>
									<hr style="width: 450px;">
								</div>

							</div>
						</div>
					</div> -->
					<div class="info_row">
						<div class="row">
							<div class="col-xs-6 col-xs-6 logo_block">
								<? php // echo get_dark_company_logo(); 
								?>
								<p>DTOP-770</p>
								<img src="<?php echo base_url() . 'assets/images/dtop_logo.jpg' ?>" width="100px">
							</div>
							<div class="col-xs-6 col-xs-6 text-right">
								<h5>COMMONWEALTH OF PUERTO RICO<br> DEPARTMENT OF TRANSPORTATION AND PUBLIC WORKS<br> DIRECTORATE OF DRIVER SERVICESs</h5>
							</div>
						</div>
						<div class="row afsr1">
							<h3 class="text-center col-xs-12 col-sm-12">APPLICATION FOR SUBMISSION OF MOTOR VEHICLE SECURITY LIEN</h3>
							<div class="col-xs-4 col-xs-4 afsr afsr1c1">
								<h4 class="sub-heading">To. CREDITOR INFORMATION</h4>
							</div>
							<div class="col-xs-8 col-xs-8 text-right">
								<div class="afsr1c2">
									<input type="checkbox" name="Presentation" id="Presentation" checked><label for="Presentation"> Presentation</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" name="release" id="release"><label for="release"> release</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" name="Secured_Creditor" id="Secured_Creditor"><label for="Secured_Creditor"> Secured Creditor</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" name="Mortgagee" id="Mortgagee"><label for="Mortgagee"> Mortgagee</label>
								</div>
							</div>
						</div>
						<div class="afsr2 row">
							<div class="col-xs-7 col-xs-7 afsr2c1">
								<input type="text" name="">
								<label>Name of the Corporation or Company Name (if applicable)</label>
							</div>
							<div class="col-xs-5 col-xs-5 afsr2c1">
								<input type="text" name="">
								<label>Employer Identification Number</label>
							</div>

							<div class="col-xs-12 afsr2c3">
								<input type="text" name="">
								<label>Residential Address (Urbanization, Condominium or Neighborhood)</label>
							</div>
							<div class="col-xs-3 afsr2c4">
								<input type="text" name="">
								<label>House number</label>
							</div>
							<div class="col-xs-6 afsr2c4">
								<input type="text" name="">
								<label>Street</label>
							</div>
							<div class="col-xs-3 afsr2c4">
								<input type="text" name="">
								<label>Apartment or Mailbox</label>
							</div>
							<div class="col-xs-9 afsr2c5">
								<input type="text" name="">
								<label>Municipality</label>
							</div>
							<div class="col-xs-3 afsr2c5">
								<input type="text" name="">
								<label>Postal zone</label>
							</div>
							<div class="col-xs-12 afsr2c6">
								<input type="text" name="">
								<label>Mailing Address (Urbanization, Condominium or Neighborhood)</label>
							</div>
							<div class="col-xs-3 afsr2c7">
								<input type="text" name="">
								<label>House number</label>
							</div>
							<div class="col-xs-6 afsr2c7">
								<input type="text" name="">
								<label>Street</label>
							</div>
							<div class="col-xs-3 afsr2c7">
								<input type="text" name="">
								<label> Mailbox</label>
							</div>
							<div class="col-xs-9 afsr2c8">
								<input type="text" name="">
								<label>Municipality (Only if it is different from the Residential)</label>
							</div>
							<div class="col-xs-3 afsr2c8">
								<input type="text" name="">
								<label>Postal zone</label>
							</div>
						</div> <!-- afsr3 -->
						<div class="afsr3 row">
							<h4 class="sub-heading col-xs-12">b. DEBTOR INFORMATION</h4>
							<div class="col-xs-7 afsr3c1">
								<input type="text" name="">
								<label>Name of the Corporation or Company Name (if applicable)</label>
							</div>
							<div class="col-xs-5 afsr3c2">
								<input type="text" name="">
								<label>Social Security number</label>
							</div>
							<div class="col-xs-12 afsr3c3">
								<input type="text" name="">
								<label>Residential Address (Urbanization, Condominium or Neighborhood)</label>
							</div>
							<div class="col-xs-3 afsr3c4">
								<input type="text" name="">
								<label>House number</label>
							</div>
							<div class="col-xs-6 afsr3c4">
								<input type="text" name="">
								<label>Street</label>
							</div>
							<div class="col-xs-3 afsr3c4">
								<input type="text" name="">
								<label>Apartment or Mailbox</label>
							</div>
							<div class="col-xs-9 afsr3c5">
								<input type="text" name="">
								<label>Municipality</label>
							</div>
							<div class="col-xs-3 afsr3c5">
								<input type="text" name="">
								<label>Postal zone</label>
							</div>
							<div class="col-xs-12 afsr3c6">
								<input type="text" name="">
								<label>Mailing Address (Urbanization, Condominium or Neighborhood)</label>
							</div>
							<div class="col-xs-3 afsr3c6">
								<input type="text" name="">
								<label>House number</label>
							</div>
							<div class="col-xs-6 afsr3c7">
								<input type="text" name="">
								<label>Street</label>
							</div>
							<div class="col-xs-3 afsr3c7">
								<input type="text" name="">
								<label> Mailbox</label>
							</div>
							<div class="col-xs-9 afsr3c8">
								<input type="text" name="">
								<label>Municipality (Only if it is different from the Residential)</label>
							</div>
							<div class="col-xs-3 afsr3c8">
								<input type="text" name="">
								<label>Postal zone</label>
							</div>
							<div class="col-xs-4 afsr3c9">
								<input type="text" name="">
								<label>Birthdate</label>
							</div>
							<div class="col-xs-4 afsr3c8">
								&nbsp;
							</div>
							<div class="col-xs-4 afsr3c8">
								<input type="text" name="">
								<label>Driver's License Number</label>
							</div>
						</div> <!--   afsr3 -->
						<div class="afsr4 row">
							<h4 class="sub-heading col-xs-12">c. INFORMATION ABOUT THE VEHICLE</h4>
							<div class="col-xs-3 afsr4c1">
								<input type="text" name="">
								<label>Brand</label>
							</div>
							<div class="col-xs-2 afsr4c1">
								<input type="text" name="">
								<label>Model</label>
							</div>
							<div class="col-xs-2 afsr4c1">
								<input type="text" name="">
								<label>Year</label>
							</div>
							<div class="col-xs-2 afsr4c1">
								<input type="text" name="">
								<label>Color</label>
							</div>
							<div class="col-xs-3 afsr4c2 text-right">
								<div class="afsr1c2">
									<input type="checkbox" id="New" name="New"><label for="New"> New</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" id="Used" name="Used"><label for="Used"> Used</label>
								</div>
							</div>
						</div>
						<div class="afsr4 row">
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Registry number</label>
							</div>
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Cylinder</label>
							</div>
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Serial number</label>
							</div>
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Tablet Number</label>
							</div>
							<div class="col-xs-2 afsr4c4">
								<input type="text" name="">
								<label>Guy</label>
							</div>
							<div class="col-xs-2 afsr4c4">
								<input type="text" name="">
								<label>Horsepower</label>
							</div>
							<div class="col-xs-3 afsr4c4">
								<input type="text" name="">
								<label>Number of doors</label>
							</div>
							<div class="col-xs-3 afsr4c4">
								<input type="text" name="">
								<label>Loading capacity</label>
							</div>
							<div class="col-xs-2 afsr4c4">
								<input type="text" name="">
								<label>Net weight</label>
							</div>
							<div class="col-xs-2 afsr4c5">
								<input type="text" name="">
								<label>Acquisition Date</label>
							</div>
							<div class="col-xs-2 afsr4c5">
								<input type="text" name="">
								<label>State of Origin</label>
							</div>
							<div class="col-xs-3 afsr4c5">
								<input type="text" name="">
								<label>Vehicle Title</label>
							</div>
							<div class="col-xs-3 afsr4c5">
								<input type="text" name="">
								<label>Contract number</label>
							</div>
							<div class="col-xs-2 afsr4c5">
								<input type="date" name="">
								<label>Date</label>
							</div>
							<div class="col-xs-4 afsr4c6">
								<input type="text" name="">
								<label>Trafficker Name</label>
							</div>
							<div class="col-xs-4 afsr4c6">
								<input type="text" name="">
								<label>License number</label>
							</div>
							<div class="col-xs-4 afsr4c6">
								<input type="text" name="">
								<label>Employer Identification Number</label>
							</div>
							<div class="col-xs-4 afsr4c7">
								<input type="text" name="">
								<label>Signature Debtor</label>
							</div>
							<div class="col-xs-4 afsr4c7">
								<input type="text" name="">
								<label>Creditor Signature</label>
							</div>
							<div class="col-xs-4 afsr4c7">
								<input type="date" name="">
								<label>Date</label>
							</div>

						</div> <!--   afsr4 -->
						<div class="afsr5 row">
							<hr class="col-xs-12">
							<div class="afsr5c1 col-xs-12 text-center">
								<h4>FOR OFFICIAL USE ONLY</h4>
								<p>Presentation to registration</p>
							</div>
						</div>
						<div class="afsr5 row">
							<div class="col-xs-3 afsr5c2">
								Date and hour of presentation:
							</div>
							<div class="col-xs-3 afsr5c2">
								<input type="date" name="" value="2018-07-22">
								<label>Day Month Year</label>
							</div>

							<div class="col-xs-2 afsr5c2">
								<input type="time" id="appt" required>
								<label>Hour Minutes</label>
							</div>
							<div class="col-xs-4 afsr5c2">
								<input type="text" id="appt" required>
								<label>Place</label>
							</div>
						</div>
						<div class="afsr5 row">
							<div class="col-xs-4 afsr5c3">
								<input type="text" id="appt" required>
								<label>Rights to Pay</label>
							</div>
							<div class="col-xs-4 afsr5c3">
								&nbsp;
							</div>
							<div class="col-xs-4 afsr5c3">
								<input type="text" id="appt" required>
								<label>Assigned Control Number</label>
							</div>
						</div>
						<div class="afsr6-1 row">
							<div class="col-xs-4 afsr6-1c1">
								<input type="text" id="appt" required>
								<label class="text-center w-100">DISC Receiver Official Name</label>
							</div>
							<div class="col-xs-4 afsr6-1c2">
								<input type="text" id="appt" required>
								<label class="text-center w-100">Date</label>
							</div>
							<div class="col-xs-4 afsr6-1c3">
								<input type="text" id="appt" required>
								<label class="text-center w-100">Signature</label>
							</div>
							<p class="col-xs-6 text-left">Rev. 3Jan2013</p>
							<p class="col-xs-6 text-right"><a href="www.dtop.gov.pr">www.dtop.gov.pr</a></p>
						</div>
						<div class="afsr6 row">
							<div class="afsr6c1 col-xs-12 text-center">
								<h4>INSTRUCTIONS</h4>
							</div>
							<div class="afsr6c1 col-xs-12 ">
								<ol type="1">
									<li>Complete this form in original and copy in all its parts prior to its presentation. Use a razor, pen or word processing equipment. </li>
									<li>Indicate physical and postal addresses according to the format required by the United States Postal Service.</li>
									<li>The information about the vehicle can be obtained from one of the following documents:<br>
										<ol type="a">
											<li> New vehicle
												<ol type="1">
													<li>notarized invoice</li>
													<li>manufacturer's certificate of origin </li>
													<li>vehicle title</li>
												</ol>
											</li>
											<li> Used vehicle
												<ol type="1">
													<li>- title deed</li>
													<li>registration document </li>
													<li>public auction document</li>
													<li>transfer certificate document</li>
													<li>insurance company purchase and sale document</li>
												</ol>
											</li>
										</ol>
									</li>
									<li>The type of vehicle will be:
										<ol type="a">
											<li>passenger</li>
											<li>light truck</li>
											<li>heavy truck</li>
											<li>drag</li>
											<li>motorcycle</li>
										</ol>
									</li>
									<li>Tariffs<br>
										The formula to obtain the fee to be paid for the financing contract is as follows: value of the sale price of the vehicle less than
										one thousand (1,000) dollars; the result is multiplied by .005 and five (5) dollars in Internal Revenue receipt are added to
										obtain the rights to pay. For the payment of the rights on mortgage furniture lien, CESCO will use the table of calculation of
										registration rights, to which must be added the Internal Revenue receipt for the amount of five (5) dollars.
									</li>
									<li>Attach with this form proof of Internal Revenue for the value of five (5) dollars for each vehicle detailed in this application, as
										indicated. If you do not use this form, the voucher will be ten (10) dollars.</li>
									<li>Submit financing or mortgage contract. In addition, it should offer as much information as possible. regarding the vehicle to expedite its registration in our records.</li>
								</ol>
							</div>
						</div>
					</div> <!-- main  info_row -->

				</div><!-- section-to-print -->
			</div>
			<script>
				$(function() {
					new Sticky('[data-sticky]');
					$(".proposal-left table").wrap("<div class='table-responsive'></div>");
					// Create lightbox for proposal content images
					$('.proposal-content img').wrap(function() {
						return '<a href="' + $(this).attr('src') + '" data-lightbox="proposal"></a>';
					});
				});
			</script>