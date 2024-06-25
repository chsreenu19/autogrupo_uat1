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
								<h5>ESTADO LIBRE ASOCIADO DE PUERTO RICO<br>
									DEPARTAMENTO DE TRANSPORTACIÓN Y OBRAS PÚBLICAS<br>
								DIRECTORÍA DE SERVICIOS AL CONDUCTOR</h5>
							</div>
						</div>
						<div class="row afsr1">
							<h3 class="text-center col-xs-12 col-sm-12">SOLICITUD PRESENTACIÓN GRAVAMEN MOBILIARIO SOBRE VEHÍCULOS DE MOTOR</h3>
							<div class="col-xs-4 col-xs-4 afsr afsr1c1">
								<h4 class="sub-heading">A. INFORMACIÓN DEL ACREEDOR</h4>
							</div>
							<div class="col-xs-8 col-xs-8 text-right">
								<div class="afsr1c2">
									<input type="checkbox" name="Presentation" id="Presentation" checked><label for="Presentation"> Presentación</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" name="release" id="release"><label for="release"> Liberación</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" name="Secured_Creditor" id="Secured_Creditor"><label for="Secured_Creditor"> Acreedor Garantizado</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" name="Mortgagee" id="Mortgagee"><label for="Mortgagee"> Acreedor Hipotecario</label>
								</div>
							</div>
						</div>
						<div class="afsr2 row">
							<div class="col-xs-7 col-xs-7 afsr2c1">
								<input type="text" name="">
								<label>Nombre Corporación o Razón Social (si aplica)</label>
							</div>
							<div class="col-xs-5 col-xs-5 afsr2c1">
								<input type="text" name="">
								<label>Número Identificación Patronal</label>
							</div>

							<div class="col-xs-12 afsr2c3">
								<input type="text" name="">
								<label>Dirección Residencial (Urbanización, Condominio o Barrio)</label>
							</div>
							<div class="col-xs-3 afsr2c4">
								<input type="text" name="">
								<label>Número de Casa</label>
							</div>
							<div class="col-xs-6 afsr2c4">
								<input type="text" name="">
								<label>Calle</label>
							</div>
							<div class="col-xs-3 afsr2c4">
								<input type="text" name="">
								<label>Apartamento o Buzón</label>
							</div>
							<div class="col-xs-9 afsr2c5">
								<input type="text" name="">
								<label>Municipio</label>
							</div>
							<div class="col-xs-3 afsr2c5">
								<input type="text" name="">
								<label>Zona Postal</label>
							</div>
							<div class="col-xs-12 afsr2c6">
								<input type="text" name="">
								<label>Dirección Postal (Urbanización, Condominio o Barrio)</label>
							</div>
							<div class="col-xs-3 afsr2c7">
								<input type="text" name="">
								<label>Número de Casa</label>
							</div>
							<div class="col-xs-6 afsr2c7">
								<input type="text" name="">
								<label>Calle</label>
							</div>
							<div class="col-xs-3 afsr2c7">
								<input type="text" name="">
								<label> Buzón</label>
							</div>
							<div class="col-xs-9 afsr2c8">
								<input type="text" name="">
								<label>Municipio (Solo si es diferente a la Residencial)</label>
							</div>
							<div class="col-xs-3 afsr2c8">
								<input type="text" name="">
								<label>Zona Postal</label>
							</div>
						</div> <!-- afsr3 -->
						<div class="afsr3 row">
							<h4 class="sub-heading col-xs-12">B. INFORMACIÓN DEL DEUDOR</h4>
							<div class="col-xs-7 afsr3c1">
								<input type="text" name="">
								<label>Nombre Corporación o Razón Social (si aplica)</label>
							</div>
							<div class="col-xs-5 afsr3c2">
								<input type="text" name="">
								<label>Número de Seguro Social</label>
							</div>
							<div class="col-xs-12 afsr3c3">
								<input type="text" name="">
								<label>Dirección Residencial (Urbanización, Condominio o Barrio)</label>
							</div>
							<div class="col-xs-3 afsr3c4">
								<input type="text" name="">
								<label>Número de Casa</label>
							</div>
							<div class="col-xs-6 afsr3c4">
								<input type="text" name="">
								<label>Calle</label>
							</div>
							<div class="col-xs-3 afsr3c4">
								<input type="text" name="">
								<label>Apartamento o Buzón</label>
							</div>
							<div class="col-xs-9 afsr3c5">
								<input type="text" name="">
								<label>Municipio</label>
							</div>
							<div class="col-xs-3 afsr3c5">
								<input type="text" name="">
								<label>Zona Postal</label>
							</div>
							<div class="col-xs-12 afsr3c6">
								<input type="text" name="">
								<label>Dirección Postal (Urbanización, Condominio o Barrio)</label>
							</div>
							<div class="col-xs-3 afsr3c6">
								<input type="text" name="">
								<label>Número de Casa</label>
							</div>
							<div class="col-xs-6 afsr3c7">
								<input type="text" name="">
								<label>Calle</label>
							</div>
							<div class="col-xs-3 afsr3c7">
								<input type="text" name="">
								<label> Buzón</label>
							</div>
							<div class="col-xs-9 afsr3c8">
								<input type="text" name="">
								<label>Municipio (Solo si es diferente a la Residencial)</label>
							</div>
							<div class="col-xs-3 afsr3c8">
								<input type="text" name="">
								<label>Zona Postal</label>
							</div>
							<div class="col-xs-4 afsr3c9">
								<input type="text" name="">
								<label>Fecha de Nacimiento</label>
							</div>
							<div class="col-xs-4 afsr3c8">
								&nbsp;
							</div>
							<div class="col-xs-4 afsr3c8">
								<input type="text" name="">
								<label>Número de Licencia de Conducir</label>
							</div>
						</div> <!--   afsr3 -->
						<div class="afsr4 row">
							<h4 class="sub-heading col-xs-12">C. INFORMACIÓN SOBRE EL VEHÍCULO</h4>
							<div class="col-xs-3 afsr4c1">
								<input type="text" name="">
								<label>Marca</label>
							</div>
							<div class="col-xs-2 afsr4c1">
								<input type="text" name="">
								<label>Modelo</label>
							</div>
							<div class="col-xs-2 afsr4c1">
								<input type="text" name="">
								<label>Año</label>
							</div>
							<div class="col-xs-2 afsr4c1">
								<input type="text" name="">
								<label>Color</label>
							</div>
							<div class="col-xs-3 afsr4c2 text-right">
								<div class="afsr1c2">
									<input type="checkbox" id="New" name="New"><label for="New"> Nuevo</label>
								</div>
								<div class="afsr1c2">
									<input type="checkbox" id="Used" name="Used"><label for="Used"> Usado</label>
								</div>
							</div>
						</div>
						<div class="afsr4 row">
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Número de Registro</label>
							</div>
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Cilindro</label>
							</div>
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Número de Serie</label>
							</div>
							<div class="col-xs-3 afsr4c3">
								<input type="text" name="">
								<label>Número de Tablilla</label>
							</div>
							<div class="col-xs-2 afsr4c4">
								<input type="text" name="">
								<label>Tipo</label>
							</div>
							<div class="col-xs-2 afsr4c4">
								<input type="text" name="">
								<label>Caballos de Fuerza</label>
							</div>
							<div class="col-xs-3 afsr4c4">
								<input type="text" name="">
								<label>Número de Puertas</label>
							</div>
							<div class="col-xs-3 afsr4c4">
								<input type="text" name="">
								<label>Capacidad de Carga</label>
							</div>
							<div class="col-xs-2 afsr4c4">
								<input type="text" name="">
								<label>Peso Neto</label>
							</div>
							<div class="col-xs-2 afsr4c5">
								<input type="text" name="">
								<label>Fecha Adquisición</label>
							</div>
							<div class="col-xs-2 afsr4c5">
								<input type="text" name="">
								<label>Estado Procedencia</label>
							</div>
							<div class="col-xs-3 afsr4c5">
								<input type="text" name="">
								<label>Título del Vehículo</label>
							</div>
							<div class="col-xs-3 afsr4c5">
								<input type="text" name="">
								<label>Número de Contrato</label>
							</div>
							<div class="col-xs-2 afsr4c5">
								<input type="date" name="">
								<label>Fecha</label>
							</div>
							<div class="col-xs-4 afsr4c6">
								<input type="text" name="">
								<label>Nombre Traficante</label>
							</div>
							<div class="col-xs-4 afsr4c6">
								<input type="text" name="">
								<label>Número de Licencia</label>
							</div>
							<div class="col-xs-4 afsr4c6">
								<input type="text" name="">
								<label>Número de Identificación Patronal</label>
							</div>
							<div class="col-xs-4 afsr4c7">
								<input type="text" name="">
								<label>Firma Deudor </label>
							</div>
							<div class="col-xs-4 afsr4c7">
								<input type="text" name="">
								<label>Firma del Acreedor </label>
							</div>
							<div class="col-xs-4 afsr4c7">
								<input type="date" name="">
								<label>Fecha</label>
							</div>

						</div> <!--   afsr4 -->
						<div class="afsr5 row">
							<hr class="col-xs-12">
							<div class="afsr5c1 col-xs-12 text-center">
								<h4>PARA USO OFICIAL SOLAMENTE</h4>
								<p>Presentación a inscripción</p>
							</div>
						</div>
						<div class="afsr5 row">
							<div class="col-xs-3 afsr5c2">
								Fecha y Hora de Presentación: 
							</div>
							<div class="col-xs-3 afsr5c2">
								<input type="date" name="" value="2018-07-22">
								<label>Día/Mes/Año</label>
							</div>

							<div class="col-xs-2 afsr5c2">
								<input type="time" id="appt" required>
								<label>Hora Minutos</label>
							</div>
							<div class="col-xs-4 afsr5c2">
								<input type="text" id="appt" required>
								<label>Lugar</label>
							</div>
						</div>
						<div class="afsr5 row">
							<div class="col-xs-4 afsr5c3">
								<input type="text" id="appt" required>
								<label>Derechos a Pagar</label>
							</div>
							<div class="col-xs-4 afsr5c3">
								&nbsp;
							</div>
							<div class="col-xs-4 afsr5c3">
								<input type="text" id="appt" required>
								<label>Número de Control Asignado</label>
							</div>
						</div>
						<div class="afsr6-1 row">
							<div class="col-xs-4 afsr6-1c1">
								<input type="text" id="appt" required>
								<label class="text-center w-100">Nombre Funcionario Receptor de DISCO</label>
							</div>
							<div class="col-xs-4 afsr6-1c2">
								<input type="text" id="appt" required>
								<label class="text-center w-100">Fecha</label>
							</div>
							<div class="col-xs-4 afsr6-1c3">
								<input type="text" id="appt" required>
								<label class="text-center w-100">Firma</label>
							</div>
							<p class="col-xs-6 text-left">Rev. 3ene2013</p>
							<p class="col-xs-6 text-right"><a href="www.dtop.gov.pr">www.dtop.gov.pr</a></p>
						</div>
						<div class="afsr6 row">
							<div class="afsr6c1 col-xs-12 text-center">
								<h4>INSTRUCCIONES</h4>
							</div>
							<div class="afsr6c1 col-xs-12 ">
								<ol type="1">
									<li>Complemente este formulario en original y copia en todas sus partes previo a su presentación. Use maquinilla, pluma o
									equipo procesador de palabras. </li>
									<li>Indique direcciones física y postal de acuerdo a formato requerido por el Servicio Postal de los Estados Unidos.</li>
									<li>La información sobre el vehículo podrá obtenerla de uno de los siguientes documentos:<br>
										<ol type="a">
											<li> Vehículo nuevo
												<ol type="1">
													<li>factura notariada</li>
													<li>certificado de origen del manufacturero </li>
													<li>título del vehículo</li>
												</ol>
											</li>
											<li> Vehículo usado
												<ol type="1">
													<li>título de propiedad</li>
													<li>documento de registro </li>
													<li>documento de subasta pública</li>
													<li>documento de certificado de cesión</li>
													<li>documento de compraventa de compañía de seguro</li>
												</ol>
											</li>
										</ol>
									</li>
									<li>El tipo de vehículo será:
										<ol type="a">
											<li>pasajeros</li>
											<li>camión liviano</li>
											<li>camión pesado</li>
											<li>arrastre</li>
											<li>motocicleta</li>
										</ol>
									</li>
									<li>Aranceles<br>
										La fórmula para obtener el arancel a pagar por el contrato de financiamiento es la siguiente: valor del precio de venta del vehículo menos de mil (1,000) dólares; el resultado se multiplica por .005 y se le añaden cinco (5) dólares en comprobante de Rentas Internas para obtener los derechos a pagar. Para el pago de los derechos sobre gravamen mobiliario de hipoteca, el CESCO utilizará la tabla de cómputos de derechos de inscripción, a los cuales deberá agregarse el comprobante de Rentas Internas por la cantidad de cinco (5) dólares.
									</li>
									<li>Acompañe con este formulario comprobante de Rentas Internas por valor de cinco (5) dólares por cada vehículo que se
									detalle en esta solicitud, según indicado. Sin no utiliza este formulario el comprobante será de diez (10) dólares.</li>
									<li>Presentar contrato de financiamiento o de hipoteca. Además, debe ofrece la mayor cantidad de información posible
									referente al vehículo para agilizar su inscripción en nuestros récords.</li>
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