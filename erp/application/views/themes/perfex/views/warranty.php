<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div id="proposal-wrapper">

	  <?php
//echo "<pre>"; print_r($itmdata); exit;
	  //$itmdata['iattributes']['Mileage'] = 'test';
	  //$itmdata['iattributes']['Mileage'] = 1000;
		$var = intval(preg_replace('/[^\d.]/', '', $itmdata['iattributes']['Mileage'].' Miles/gallon'));
		$int = (int)$var;

		//$mileage = $itmdata['iattributes']['Mileage'];
		//echo $int; exit;
		//$int= 100001;
		$mes2 = '';
		$mes4 = '';
		$mes3= '';
		$mes='';
		if($int >0 && $int<= 36000){
			$mes2 = 'checked="checked"';
		}else if($int > 36000 && $int <= 50000){
			$mes3 = 'checked="checked"';
		}else if($int>50000 && $int<=100000){
			$mes4 = 'checked="checked"';
		}else if($int>100000){
			$mes='checked="checked"';
		}
	  ?>
 

   <div class="mtop15 preview-top-wrapper">
      
      <div class="top" data-sticky data-sticky-class="preview-sticky-header">
         <div class="container preview-sticky-container">
            <div class="row">
               <div class="col-md-12">
                  <div class="pull-left">
                     <h4 style="color:#882c87;" class="bold no-mtop proposal-html-number"><span><?php echo $itmdata['description']; ?></span>
                     </h4>
                  </div>
                  <div class="visible-xs">
                     <div class="clearfix"></div>
                  </div>
                  
                  <?php echo form_open($this->uri->uri_string()); ?>
                  
				    <h5 class="pull-right btn btn-info" onclick="print(this);">Print</h5>
				 
				  
                  <?php echo form_hidden('action','proposal_pdf'); ?>
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
			
			
			
			
			<div class="row">
			 <div class="col-md-8 col-xs-8">
				<div class="mbot30">
				   <div class="proposal-html-logo" style="width:27%;">
					  <?php echo get_dark_company_logo(); ?>
				   </div>
				</div>
			 </div>
			 
			 <div class="col-md-4 col-xs-4">
				 <div class="rowbs1 align-items-end">
					 <div class="col-md-12 col-sm-12" style="width: 101% !important;">
					 <?php echo format_organization_info().' ('.get_option('invoice_company_phonenumber').')'; ?>
					  <hr style="width: 450px;">
					</div>
				   
				  </div>
			  </div>
			 
			 
			 
			 <div class="clearfix"></div>
		  </div>
			<hr/>	
			<div class="row info_row">
			<h4 class="text-center">INFORMACION SOBRE GARANTIA Y CONDICIONES PARA EL VEHICULO</h4>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['Brand']; ?>" type="text"/></div><label>Marca</label></div>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['Model']; ?>" type="text"/></div><label>Modelo</label></div>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['Year']; ?>" type="text"/></div><label>Año</label></div>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['VIN']?>" type="text"/></div><label>Numero de serie</label></div>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['VIN']?>" type="text"/></div><label>Numero de inventario</label></div>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['Mileage']; ?>" type="text"/></div><label>Millage</label></div>
			<div class="col-md-3 col-xs-3"><div class="form-group"><input class="inputbox form-control" value="<?php echo $itmdata['iattributes']['Tablilla']; ?>" type="text"/></div><label>Tablilla</label></div>
			<div class="col-md-3 col-xs-3"><h3>Precio:</br><strong><input style="font-size:21px;" class="inputbox form-control" value="<?php echo '$'.number_format($itmdata['iattributes']['Boleta Price']); ?>" type="text"/><?php //echo '$'.number_format($itmdata['rate']); ?></strong></h3></div>
			</div>
			<hr/>
			
			
			<div class="row">
			<h4></h4>
			<div class="col-md-12">
			
			<table border="0" cellpadding="1" cellspacing="1" class="GPEV_table">
	<thead>
		<tr>
			<th scope="col" style="width: 83%; text-align: left;"><span style="font-size:12.0pt"><span style="font-family:&quot;Calibri&quot;,sans-serif">GARANTIAS PARA ESTE VEHICULO:</span></span></th>
			<th scope="col" style="width: 17%;"><span style="font-size:12.0pt"><span style="font-family:&quot;Calibri&quot;,sans-serif">INICIALES</span></span></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="width:80%"><input type="checkbox" <?php echo $mes4; ?>/><span>2 meses o dos mil millas, lo primero que ocurra.&nbsp;(Mas de 50,000 y hasta 100,000)</span></td>
			<td style="width:20%"><input class="inputbox" type="text"/></td>
		</tr>
		<tr>
			<td style="width:80%"><input type="checkbox" <?php echo $mes3; ?>/><span>3 meses o tres mil millas, Lo primero que ocurra.&nbsp;(Mas de 36,000 y hasta 50,000)</span></td>
			<td style="width:20%"><input class="inputbox" type="text"/></td>
		</tr>
		<tr>
			<td style="width:80%"><input type="checkbox" <?php echo $mes2; ?>/><span>4 meses o cuatro mil millas, lo primero que ocurra.&nbsp;(Hasta 36,000)</span></td>
			<td style="width:20%"><input class="inputbox" type="text"/></td>
		</tr>
		<tr>
			<td style="width:80%"><input type="checkbox" <?php echo $mes; ?>/><span>100,000 mil millas en Adelante no tiene garantia.&nbsp;(No tiene garantia)</span></td>
			<td style="width:20%"><input class="inputbox" type="text"/></td>
		</tr>
	</tbody>
</table>
			
			</div>
			</div>
			<br/>
			<hr/>
			<div class="row" >
				
				<div class="col-md-12">
				<h5>PARTES INCLUIDAS SEGUN REGLAMENTO DE D.A.C.O.</h5>
					<ol  style="list-style-type: upper-alpha;">
						<li><strong>MOTOR </strong>&ndash; incluye todas las piezas internas del motor incluyendo bomba de agua, bomba de gasolina (mec&aacute;nica o el&eacute;ctrica), m&uacute;ltiple admisi&oacute;n y escape, bloque y volanta. &nbsp;En motores rotativos incluye las cajas de los rotores. &nbsp;Se excluyen piezas de servicio normal de mantenimiento que requieran cambios peri&oacute;dicos y su respectiva mano de obra. &nbsp;</li>
						<li><strong>TRANSMISION </strong>&ndash; Incluye caja de transmisi&oacute;n, todas las piezas internas de transmisi&oacute;n y el convertidor de torsi&oacute;n.&nbsp;</li>
						<li><strong>SISTEMA ELECTRICO</strong> &ndash; Incluye computadora y sus accesorios.&nbsp;</li>
						<li><strong>EJE IMPULSADOR</strong> &ndash; Caja de tracci&oacute;n trasera y/o delantera, seg&uacute;n aplique, con sus partes internas, ejes impulsores, eje de cardan y uniones transversales.&nbsp;</li>
						<li><strong>FRENOS</strong> &ndash; Cilindros traseros, bomba de frenos, servo asistencia de vac&iacute;o, l&iacute;neas y acoplamientos hidr&aacute;ulicos y calibradores de discos. Se excluyen piezas de servicio normal de mantenimiento que requieran cambios peri&oacute;dicos y sus respectiva mano de obra.&nbsp;</li>
						<li><strong>RADIADOR Y ABANICO DEL RADIADOR</strong></li>
						<li><strong>DIRECCION </strong>&ndash; La caja de gu&iacute;a y sus partes internas (rack y pinion)</li>
						<li><strong>ODOMETRO FUNCIONANDO</strong></li>
					</ol>
				</div>
               
            </div>
			<hr/>
			<div class="row">
				<div class="col-md-12">
					<ul>
						<li>Para obtener servicio: El consumidor se comunicara (&aacute;rea de servicio) en horas laborables de requerir servicios por conceptos de garant&iacute;a.</li>
						<li>Sera el proveedor del servicio y ser&aacute; la entidad responsable de honrar la garant&iacute;a y/o coordinar cualquier otro recurso t&eacute;cnico.&nbsp;</li>
						<li>Circunstancias bajo las cuales el consumidor puede perder el derecho a reclamar la garant&iacute;a (a) Podr&iacute;a perder su derecho si el veh&iacute;culo de referencia sufri&oacute; un impacto al cual ocasionara da&ntilde;o a la unidad. (b) Alteraciones al veh&iacute;culo posterior a la compra. (c) Que la unidad sea intervenida mec&aacute;nicamente previo a la evaluaci&oacute;n profesional a la cual usted tiene derecho a recibir de nuestro departamento de servicio.&nbsp;</li>
						<li>Proveer&aacute; una unidad sustituida; si la reparaci&oacute;n de la unidad vendida y en garant&iacute;a permaneciera m&aacute;s de (5) d&iacute;as calendario sin incluir Domingo.&nbsp;</li>
						<li>La garant&iacute;a de su veh&iacute;culo ser&aacute; transferida a cualquier consumidor subsiguiente sin costo alguno por el tiempo o por el restante.&nbsp;</li>
					</ul>
				</div>
               
            </div>
			
			
			<hr/>
			<div class="row">
			<h4></h4>
			<div class="col-md-12">
			
			<table border="0" cellpadding="1" cellspacing="1">
	<thead>
		<tr>
			<th scope="col" style="width: 83%; text-align: left;"><span style="font-size:12.0pt"><span style="font-family:&quot;Calibri&quot;,sans-serif">NOTAS IMPORTANTES AL CONSUMIDOR:</span></span></th>
			<th scope="col" style="width: 17%;"><span style="font-size:12.0pt"><span style="font-family:&quot;Calibri&quot;,sans-serif">INICIALES</span></span></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="width:692px">1. <span>Leo y certifico que he sido responsablemente orientado y se me han mostrados los “labels” o etiquetas de las partes del vehículo de esta transacción.</span></td>
			<td style="width:210px"><input class="inputbox" type="text"/></td>
		</tr>
		<tr>
			<td style="width:692px">2. <span>Certifico haber sido orientado, que este vehiculo puedo haber tenido  reemplazos de piezas , trabajos de hojalateria y pintura con la intencion de  optimizarlo.</span></td>
			<td style="width:210px"><input class="inputbox" type="text"/></td>
		</tr>
		<tr>
			<td style="width:692px">3. <span>Certifico que he recibido copia del REGLAMENTO DE GARANTIAS DE VEHICULOS DE MOTORL el cual servirá como guía informativa.</span></td>
			<td style="width:210px"><input class="inputbox" type="text"/></td>
		</tr>
		<tr>
			<td style="width:692px">4. <span>Certifico que he sido informado que el vehículo aquí vendido proviene del uso anteriores en carácter de (Rental Car) Si___ No___</span></td>
			<td style="width:210px"><input class="inputbox" type="text"/></td>
		</tr>
	</tbody>
</table>
			
			</div>
			</br></br></br>
			
			<div class="col-md-12" style="margin-top: 45px;">
				
			<div class="col-md-7 col-xs-7"><strong style="font-size:12.0pt">FIRMA DEL COMPRADOR:</strong><input style="width: 60%;" class="inputbox" type="text"/></div>
			<div class="col-md-5 col-xs-5"><strong style="font-size:12.0pt">FECHA:</strong><input class="inputbox" style="width: 60%;"  type="text"/></div>
			</div>
			
			
			
			
			
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
         </div>
      </div>
      
   </div>
</div>

<script>
   $(function(){
     new Sticky('[data-sticky]');
     $(".proposal-left table").wrap("<div class='table-responsive'></div>");
         // Create lightbox for proposal content images
         $('.proposal-content img').wrap( function(){ return '<a href="' + $(this).attr('src') + '" data-lightbox="proposal"></a>'; });
     });
</script>
</div>
<style>
hr{
	margin-top: 0px !important;
}
input[type="checkbox"] {
    width: 40px;
    height: 25px;
}
input.inputbox {
    border: 0;
    outline: 0;
    border-bottom: 2px solid #ccc;
}
.GPEV_table tr td:first-child {
	display:flex;
	align-items:center;
}
.GPEV_table tr td:first-child span {
	margin-top:4px;
}
.info_row input.form-control{
border-radius:0px;
padding-left:0
}
.info_row .form-group{
margin-bottom:0;
}
@media print {
	
	a[href]:after { content: none !important; }
  img[src]:after { content: none !important; }
	@page {
    size: A4;
  margin: 0;
  }
html{
transform: scale(1.0);transform-origin: 0 0;
	zoom:76%
}
  body * {
    visibility: hidden;


  }
  input.inputbox{
	  font-size: 20px;
  }
.table{
    margin-bottom: 0;
    padding: 5px;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
	
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
