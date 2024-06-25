<!DOCTYPE html>
<?php 

if(empty($quotedata) && count($quotedata)<1){
exit('Unauthourzed Access');
}
$decode['Result']['quotedata'] = $quotedata;
$decode['Result']['quotecustomfields'] = $quotecustomfields;
$decode['Result']['quoteitems'] = $quoteitems;
//echo "<pre>"; print_r($quotedata['main_data']['lead']['name']); exit;

$vin = isset($decode['Result']['quoteitems']['iattributes']['vin']) ? $decode['Result']['quoteitems']['iattributes']['vin'] : '';





foreach($quoteitems as $row){
	if(isset($row['iattributes'])){
		$vinnumber = $row['iattributes']['vin'];
		$transmission = trim(strip_tags($row['iattributes']['Transmission']));
		$engine = trim(strip_tags($row['iattributes']['Engine']));
		$mileage = trim(strip_tags($row['iattributes']['Mileage']));
		$title = "<title>AUTO1PR - Sales order for - ".$decode['Result']['quotedata']['proposal_to'].'-'.$row['iattributes']['Make']."</title>";
		break;
	}
}
$ssn = isset($quotedata['main_data']['lead']['Social Security Number']) ? '###-##-'.substr($quotedata['main_data']['lead']['Social Security Number'], -4) : '';
$dob = isset($quotedata['main_data']['lead']['Date of Birth']) ? date("m-d-Y",strtotime($quotedata['main_data']['lead']['Date of Birth'])) : '';
$lcs = isset($quotedata['main_data']['lead']['License Number']) ? $quotedata['main_data']['lead']['License Number'] : '';
//echo $ssn; exit;
//$tt = isset($quotedata['main_data']['lead']['name']) ? '<title>'. $quotedata['main_data']['lead']['name'].'</title>' : '<title>New Sales Order</title>';

?>
<html>
	<meta charset="UTF-8">
  <head>
  <?php echo isset($quotedata['main_data']['lead']['name']) ? '<title>'. $quotedata['main_data']['lead']['name'].' - Sales Order</title>' : '<title>New Sales Order</title>'; ?>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/builds/vendor-admin.js?v=3.0.0"></script>
    <style>
	.img-responsive{width: 80% !important;}
      table,
      th,
      td {
        border: 1px solid black;
        border-collapse: collapse;
        /*padding: 0.25rem;*/
      }
	  /*input {
  outline: 0;
  border-width: 0 0 2px;
  border-color: #000000;
}*/
input:focus {
  border-color: green
}
.bordered {
    border: 1px solid #f00 !important;
}
input{
	 border: none;
	 font-size:11px;
	 width: 82% !important;
}

@media print {
  #printPageButton {
    display: none;
  }
  .img-responsive{width: 100% !important;}
  input{
		 border: none;
		 font-size:11px;
		 width: 92% !important;
	}
}

    </style>
	
  </head>
  
  <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                <i class="fa fa-print"></i> <button id="printPageButton" >Print</button> </a>
  <body style="font-size:11px;">
	              
	<form method="post" name="generate" action="../../html.php" target="_blank">			
	<table style="border-color: #ffffff !important;" cellpadding="1" cellspacing="1" style="width:100%">
		<tbody>
			<tr>
				<td style="border-color:#ffffff !important; width:60% !important;">
					<div style="width:18%;"><?php get_company_logo() ?></div></td>
				<td style="background-color:#ffffff; border-color:#ffffff; width:40%; text-align:right;">
					Volant Auto LLC&nbsp;</br>
					Doramar Shopping Center, Dorado, Puerto Rico</br>
					<!--PO box 8458 Ponce 00732</br>-->
					Tel: (787) 993-2064</br>
					<!--Fax: ------------</br>-->
					</td>
			</tr>
		</tbody>
	</table>
	
	
	
	
	
	
	<table style="border-color: #ffffff !important;" cellpadding="1" cellspacing="1" style="width:100%">
		<tbody>
			<tr>
				<td style="border-color:#ffffff !important;">
					<td style="background-color:#ffffff; border-color:#ffffff; text-align:left; width:60% !important;">
					<span style="font-weight: bold; padding-right:30px; padding-top:10px;">Nombre del Comprador</span><input style="width:80%;" type="text" value="<?php echo isset($quotedata['main_data']['lead']['name']) ? $quotedata['main_data']['lead']['name'] : ''; ?>"></br></br>
					<span style="font-weight: bold">Direccion Residencial</span></br>
					<input style="width:80%;" type="text" value="<?php echo isset($quotedata['main_data']['lead']['address']) ? $quotedata['main_data']['lead']['address'] : ''; ?>"></br>
					<span style="font-weight: bold">Direccion Postal</span></br>
					<input style="width:80%;" type="text" value="<?php echo isset($quotedata['main_data']['lead']['zip']) ? $quotedata['main_data']['lead']['zip'] : ''; ?>"></br>
				</td>
				<td style="background-color:#ffffff; border-color:#ffffff; width:40%; text-align:right;">
				<table style="border-color: #ffffff !important;" border="0" cellpadding="1" cellspacing="1">
					<tbody>
						<tr>
							<td style=" border-color: #ffffff !important;">Date of Sale: <input style="width: 50% !important;" type="text" placeholder="enter date of sale" value="<?php echo isset($quotedata['main_data']['quote']['date']) ? date("m-d-Y", strtotime($quotedata['main_data']['quote']['date'])) : ''; ?>"/></td>
						
						</tr>
						<tr>
							<td style=" border-color: #ffffff !important;">SSN: <input style="width: 50% !important;" type="text" placeholder="enter ssn" value="<?php echo $ssn;?>"/></td>
						</tr>
						<tr>
							<td style=" border-color: #ffffff !important;">Date of Birth: <input style="width: 50% !important;" type="text"placeholder="enter dob" value="<?php echo $dob ;?>"/></td>
							
						</tr>
						<tr>
							<td style=" border-color: #ffffff !important;">No. Licencia: <input style="width: 50% !important;" type="text" placeholder="enter no. licencia" value="<?php echo $lcs ;?>"/></td>
							
						</tr>
						<tr>
							<td style=" border-color: #ffffff !important;">Telefono: <input style="width: 50% !important;" type="text" placeholder="enter telefono" value="<?php echo isset($quotedata['main_data']['lead']['phonenumber']) ? $quotedata['main_data']['lead']['phonenumber'] : ''; ?>"/></td>
							
						</tr>
						<tr>
							<td style=" border-color: #ffffff !important;">Celular: <input style="width: 50% !important;" type="text" placeholder="enter celular" value="<?php echo isset($quotedata['main_data']['lead']['Mobile No']) ? $quotedata['main_data']['lead']['Mobile No'] : ''; ?>"/></td>
						
						</tr>
						<tr>
							<td style=" border-color: #ffffff !important;">Email: <input style="width: 60% !important;" type="text" placeholder="enter email" value="<?php echo isset($quotedata['main_data']['lead']['email']) ? $quotedata['main_data']['lead']['email'] : ''; ?>"/></td>
						
						</tr>
					</tbody>
		</table>
				</td>
			</tr>
		</tbody>
	</table>
	
	
	
			
			
	
	
		
		
				
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
      <div style="width: 55%; float: left;">
        <table style="width: 100%; background-color: transparent;">
          <thead>
            <tr>
              <th colspan="4" style="background-color: black;color: white; text-align: center;">VEHICULO VENDIDO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 18%;">
			  <input style="width:12px !important;" type="radio" id="Nuevo" name="Type" value="" <?php echo isset($quotedata['main_data']['custom_feilds']['proposal_type']) == 'New Vehicle' ? "checked='checked'" : ''; ?> /> <label for="Nuevo">Nuevo</label> <br/>
			  <input  style="width: 12px !important;"type="radio" id="Usado" name="Type" value="" <?php echo isset($quotedata['main_data']['custom_feilds']['proposal_type']) == 'Used Vehicle' ? "checked='checked'" : ''; ?>/> <label for="Usado">Usado</label> 
			  </td>
              
              <td style="width:106px;">Stock #: <input type="text" style="width:52px;" placeholder="enter stock" value="<?php echo isset($quotedata['main_data']['inventory']['VIN']) ? $quotedata['main_data']['inventory']['VIN'] : ''; ?> "/></td>
              <td style="width:106px;">Ano: <input value="<?php echo isset($quotedata['main_data']['inventory']['Year']) ? $quotedata['main_data']['inventory']['Year'] : ''; ?>" type="text" style="width:52px;" placeholder="enter ano"/></td>
            </tr>
            <tr>
              <td style="width:34%;">Marca: <input value="<?php echo isset($quotedata['main_data']['inventory']['Brand']) ? $quotedata['main_data']['inventory']['Brand'] : ''; ?>" type="text" style="width:88%" placeholder="enter marca"/></td>
              <td colspan="2">Modelo: <input  value="<?php echo isset($quotedata['main_data']['inventory']['Model']) ? $quotedata['main_data']['inventory']['Model'] : ''; ?>" type="text" style="width:74%; placeholder="enter modelo"/></td>
            </tr>
            <tr>
              <td>VIN: <input value="<?php echo isset($quotedata['main_data']['inventory']['VIN']) ? $quotedata['main_data']['inventory']['VIN'] : ''; ?> " type="text" style="width:88%" placeholder="enter vin"/></td>
              <td>Color: <input value="<?php echo isset($quotedata['main_data']['inventory']['Exterior Color']) ? $quotedata['main_data']['inventory']['Exterior Color'] : ''; ?>" type="text" style="width:88%"/></td>
              <td colspan="2">Millaje: <input value="<?php echo isset($quotedata['main_data']['inventory']['Mileage']) ? $quotedata['main_data']['inventory']['Mileage'] : ''; ?>" type="text" style="width:88%" placeholder="enter millaje"/></td>
            </tr>
            <tr>
              <td>Tablilla:<input type="text" style="width:88%" placeholder="enter tabilla" value="<?php echo isset($quotedata['main_data']['inventory']['Tablilla']) ? $quotedata['main_data']['inventory']['Tablilla'] : ''; ?>"/></td>
              <td>Marbete:<input type="text" style="width:88%" placeholder="enter marbete" value="<?php echo isset($quotedata['main_data']['inventory']['proposal_marbete']) ? $quotedata['main_data']['custom_feilds']['proposal_marbete'] : ''; ?>"/></td>
              <td colspan="2">Vence:<input type="text" style="width:88%"/></td>
            </tr>
          </tbody>
        </table>
        <table style="width: 100%; background-color: transparent;">
          <thead>
            <tr>
              <th colspan="4" style="background-color: black;color: white; text-align: center;">VEHICULO USADO TOMADO A CAMBIO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Marca: <input value="<?php echo isset($quotedata['main_data']['tradein']['make']) ? $quotedata['main_data']['tradein']['make'] : ''; ?>" type="text" style="width:88%"/></td>
              <td colspan="2">Modelo: <input  value="<?php echo isset($quotedata['main_data']['tradein']['model']) ? $quotedata['main_data']['tradein']['model'] : ''; ?>" type="text" style="width:88%" placeholder="enter modelo"/></td>
              <td>Ano: <input value="<?php echo isset($quotedata['main_data']['tradein']['year']) ? $quotedata['main_data']['tradein']['year'] : ''; ?>" type="text" style="width:88%"/></td>
            </tr>
            <tr>
              <td colspan="2">VIN #: <input value="<?php echo isset($quotedata['main_data']['tradein']['vin']) ? $quotedata['main_data']['tradein']['vin'] : ''; ?>" type="text" style="width:88%" placeholder="enter vin"/></td>
              <td colspan="2">Tablilla: <input type="text" value="<?php echo isset($quotedata['main_data']['tradein']['tablilla']) ? $quotedata['main_data']['tradein']['tablilla'] : ''; ?>" style="width:88%" placeholder="enter tabilla"/></td>
            </tr>
            <tr>
              <td colspan="2">Millaje: <input value="<?php echo isset($quotedata['main_data']['tradein']['millage']) ? $quotedata['main_data']['tradein']['millage'] : ''; ?>" type="text" style="width:88%" placeholder="enter millaje"/></td>
              <td colspan="2">Color:<input value="<?php echo isset($quotedata['main_data']['tradein']['color']) ? $quotedata['main_data']['tradein']['color'] : ''; ?>" type="text" style="width:88%" placeholder="enter color"/></td>
            </tr>
            <tr>
              <td colspan="4">Balance Adeudado A:<input value="<?php echo isset($quotedata['main_data']['tradein']['proposal_pending_balance_pay_off_balance']) ? $quotedata['main_data']['tradein']['proposal_pending_balance_pay_off_balance'] : ''; ?>" type="text" style="width:88%" placeholder="enter balance"/></td>
            </tr>
            <tr>
              <td colspan="2">Marbete: <input value="<?php echo isset($quotedata['main_data']['tradein']['proposal_marbete']) ? $quotedata['main_data']['tradein']['proposal_marbete'] : ''; ?>" type="text" style="width:75% !important;" placeholder="enter marbete"/></td>
              <td colspan="2">Vence: <input value="<?php echo isset($quotedata['main_data']['tradein']['proposal_vence']) ? $quotedata['main_data']['tradein']['proposal_vence'] : ''; ?>" type="text" style="width:88%" placeholder="enter vence"/></td>
            </tr>
            <tr>
              <td>Cliente Entrego:</td>
              <td colspan="3"><input style="width: 25px !important;" type="radio" id="Licencia" name="CLIENTE_ENTREGO" value="" /> <label for="Licencia">Licencia</label> <br/>
			  <input style="width: 25px !important;" type="radio" id="Titulo" name="CLIENTE_ENTREGO" value="" /> <label for="Titulo">Titulo</label><br/>
			  <input  style="width: 25px !important;"type="radio" id="Certificacion Multas Autoexpreso" name="CLIENTE_ENTREGO" value="" /> <label for="Certificacion Multas Autoexpreso">Certificacion Multas Autoexpreso</label>
			  </td>
              
            </tr>
            <tr>
              <td colspan="4"> Iniciales: </td>
            </tr>
            <tr>
              <td colspan="2">Credito por Carro Usado </td>
              <td colspan="2" style="text-align: right;"> <input placeholder="enter credito por carro usado"  name="CREDITO_POR_CARRO_USADO" type="text" value="$0.00"></td>
            </tr>
            <tr>
              <td colspan="2">Balance Adeudado </td>
              <td colspan="2" style="text-align: right;"> <input placeholder="enter balance adeudado"  name="BALANCE_ADEUDADO" type="text" value="<?php echo isset($quotedata['main_data']['custom_feilds']['proposal_balance']) ? $quotedata['main_data']['custom_feilds']['proposal_balance'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Credito Neto</td>
              <td colspan="2" style="text-align: right;"> <input placeholder="enter credito neto"  name="CREDITO_NETO" type="text" value="$0.00"></td>
            </tr>
            <tr>
              <td colspan="2">Pago de Contado</td>
              <td colspan="2" style="text-align: right;"> <input placeholder="enter pago de contado"  name="PAGO_DE_CONTADO" type="text" value="$0.00"></td>
            </tr>
            <tr>
              <td colspan="2">Credito a su favor </td>
              <td colspan="2" style="text-align: right;"> <input placeholder="enter credito a su favor" name="CREDITO_A_SU_FAVOR " type="text" value="$0.00"></td>
            </tr>
            <tr>
              <td colspan="2">Otros Pagos </td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter otros pagos"  name="OTROS_PAGOS " type="text" value="$0.00"></td>
            </tr>
            <tr>
              <td colspan="2">Credito Total </td>
              <td colspan="2" style="text-align: right;"> <input placeholder="enter credit total"  name="CREDITO_TOTAL " type="text" value="$0.00"></td>
            </tr>
            <tr>
              <td colspan="2">Pronto Recibido $ </td>
              <td colspan="2"> Recibo # </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div style="width: 45%; float:left;">
        <table style="width: 100%; background-color: transparent;">
          <!-- <thead><tr><th class="thead center">VEHICULO VENDIDO</th><th class="thead center"></th><th class="thead center"></th><th class="thead center"></th></tr></thead> -->
          <tbody>
            <tr>
              <td colspan="2">Precio Unidad</td>
              <td colspan="2" style="text-align: right;"><input value="<?php echo isset($quotedata['main_data']['inventory']['rate']) ? '$'.number_format($quotedata['main_data']['inventory']['rate']) : '$0.00'; ?>" placeholder="enter precio unidad" name="PRECIO_UNIDAD" type="text" value=""></td>
            </tr>
            <tr>
              <td colspan="2">Puertas: <input placeholder="enter puertas"  name="PUERTAS " type="text" value="<?php echo isset($quotedata['main_data']['inventory']['Doors']) ? $quotedata['main_data']['inventory']['Doors'] : ''; ?>"></td>
              <td colspan="2">Cilindros:<input value="<?php echo isset($quotedata['main_data']['inventory']['Engine']) ? $quotedata['main_data']['inventory']['Engine'] : ''; ?>" placeholder="enter clinindros"  name="CILINDROS " type="text"></td>
            </tr>
            <tr>
              <td colspan="2">Transmision:<input value="<?php echo isset($quotedata['main_data']['inventory']['Transmission']) ? $quotedata['main_data']['inventory']['Transmission'] : ''; ?>"  placeholder="enter transmission" name="TRANSMISION " type="text" value=""></td>
              <td colspan="2">Caballaje: <input placeholder="enter caballaje"  name="CABALLAJE " type="text" value=""></td>
            </tr>
            <tr>
              <td colspan="4" style="text-align: right;"><input  name="" type="text" value=""></td>
            </tr>
            <tr>
              <td colspan="2">Gap</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter gap" name="GAP " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_gap']) && $quotedata['main_data']['custom_feilds']['proposal_gap']!='') ? $quotedata['main_data']['custom_feilds']['proposal_gap'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Seguro Doble</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter seguro doble" name="SEGURO_DOBLE " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_double_insurance']) && $quotedata['main_data']['custom_feilds']['proposal_double_insurance'] !='') ? $quotedata['main_data']['custom_feilds']['proposal_double_insurance'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Seguro de Vida</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter seguro de vida" name="SEGURO_DE_VIDA " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_life_insurance']) && $quotedata['main_data']['custom_feilds']['proposal_life_insurance']!='') ? $quotedata['main_data']['custom_feilds']['proposal_life_insurance'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Contrato de servicio</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter contrato de servicio" name="CONTRATO_DE_SERVICIO " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_service_contract']) && $quotedata['main_data']['custom_feilds']['proposal_service_contract']!='') ? $quotedata['main_data']['custom_feilds']['proposal_service_contract'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Tablillas</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter tabillas" name="TABLILLAS " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_tablillas']) && $quotedata['main_data']['custom_feilds']['proposal_tablillas']!='') ? $quotedata['main_data']['custom_feilds']['proposal_tablillas'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Seguro ACAA</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter seguro acaa" name="SEGURO_ACAA " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_acaa_insurance']) && $quotedata['main_data']['custom_feilds']['proposal_acaa_insurance']!='') ? $quotedata['main_data']['custom_feilds']['proposal_acaa_insurance'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Precio Total</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter precio total" name="PRECIO_TOTAL " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_price_total']) && $quotedata['main_data']['custom_feilds']['proposal_price_total']!='') ? $quotedata['main_data']['custom_feilds']['proposal_price_total'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Credito Total</td>
              <td colspan="2" style="text-align: right;"><input placeholder="enter credit total" name="CREDITO_OTAL " type="text" value="<?php echo (isset($quotedata['main_data']['custom_feilds']['proposal_credit_total']) && $quotedata['main_data']['custom_feilds']['proposal_credit_total']!='') ? $quotedata['main_data']['custom_feilds']['proposal_credit_total'] : '$0.00'; ?>"></td>
            </tr>
            <tr>
              <td colspan="2">Balance a Pagar</td>
              <td colspan="2" style="text-align: right;"><input  name="BALANCE_A_PAGAR " type="text" value="$0.00"></td>
            </tr>
          </tbody>
        </table>
        <table style="width: 100%;  background-color: transparent;">
          <thead>
            <tr>
              <th class="thead center" colspan="6" style="background-color: black;color: white; text-align: center;">BALANCE - CONTRATO A PAGARSE DE ACUERDO CON</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:50px;"><input style="width:50px;" type="text" value="" ></td>
              <td style="width:50px;"><input style="width:50px;" type="text" value="Plazos"></td>
			  <td style="width:35px;"><input style="width:50px;" type="text" value="Mesuales De" ></td>
			  <td style="width:50px;"><input style="width:50px;" type="text" value="" ></td>
			  <td style="width:50px;"><input style="width:50px;" type="text" value="Con fecha de" ></td>
			  <td style="width:50px;"><input style="width:50px;" type="text" value=""></td>
            </tr>
            <tr>
              <td style="width:50px;"><input style="width:50px;" type="text" value="" ></td>
              <td style="width:50px;"><input style="width:50px;" type="text" value="Plazos" ></td>
              <td style="width:35px;"><input style="width:50px;" type="text" value="Mesuales De" ></td>
			  <td style="width:50px;"><input style="width:50px;" type="text" value="" ></td>
			  <td style="width:50px;"><input style="width:50px;" type="text" value="Con fecha de" ></td>
			  <td style="width:50px;"><input style="width:50px;"type="text" value="" ></td>
            </tr>
            <tr>
              <td colspan="6"><input type="text" placeholder="enter bank and apr"/></td>
            </tr>
            <tr>
              <td colspan="6">Observaciones <input placeholder="enter any observations" type="text" name="message"></textarea></td>
            </tr>
			
           
          </tbody>
        </table>
		
		
	  
		
      </div>
	
	
	
	<div style="width: 100%;">
	  <!--<table>
      <tbody>
         <tr>
              <td colspan="6" style="font-size:13px;">
                <h5 style="text-align:center; margin-bottom: 0px; text-decoration: underline;">No Acceptamos Devoluciones</h5>De devolver su unidad o cancelación de contrato con razón Recibo # justificada, Auto 1 LLC, Le cobrara $95.00 diarios por el use del vehículo.  En adición, se cobrara millaje y depreciación según establece la ley. Los "Document Fees" o "Gastos de cierre" NO son reembolsables una vez firmado la facture y el contrato. 
              </td>
            </tr>
        
      </tbody>
	  </table>-->
  </div>
  
  
  
  
		<div style="width: 100%;">
        <table style="width: 100%;">
          <tbody>
           <tr>
          <td>NOTA: El comprador expresamente garantiza que el automóvil usado entregado a cuenta, si alguno, está libre de todo gravamen o contrato de venta condicional y que la licencia del mismo debidamente endosada será entregada a la vendedora con el vehículo. Se entiende que toda compra a plazos as mediante contrato de venta condicional y/o hipoteca sobre bienes. En caso de que el comprador exprese su opción por cierta financiadora particular para el financiamiento del balance de esta venta, se le conceden 10 días de esta fecha para traer a la vendedora el importe de este balance y en caso de transcurrir dicho termino sin que se haya pagan dicho balance, la vendedora quedara en libertad de utilizar cualquier entidad financiadora para cobrarse dicho balance. En tal case se entenderá que tal actuación de la vendedora tiene autorización expresa del comprador. El comprador ha representado a la vendedora ser mayor de edad. Todo vehículo usado se vende de acuerdo a la garantía estipulada por la ley. En caso de tratarse de la compra de un vehículo nuevo, la vendedora expresamente concede al comprador la garantía normal en carros nuevos que concede la casa manufacturera cuya garantía es de conocimiento del comprador. Aunque esta orden esté firmada por un vendedor no obligará en forma alguna a la vendedora, hasta canto haya sido aprobada y firmada por uno de los oficiales de la casa. Esta orden de compra y el contrato de venta condicional correspondiente y/o el contrato de hipoteca sobre bienes muebles, si la venta es a plazos, contiene por escrito todas as condiciones del negocio. </td>
        </tr>
           
          </tbody>
      </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      <div style="width: 100%;">
         <table style="width: 100%;">
          <tbody>
            <tr style="height:50px; vertical-align:bottom;">
              <td >Volant Auto LLC</td>
              <td colspan="2">FIRMA DEL COMPRADOR 
              </td>
            </tr>
            <tr style="height:50px; vertical-align:bottom;">
              <td >GERENCIA</td>
              <td>FIRMA DEL VENDEDOR: <input style="width: 40% !important;" type="text" value="" ></td>
              <td>NUM. REF.</td>
            </tr>
          </tbody>
		  </table>
		  
		   
      </div>
	 
	  </form>
  </body>
  
  
  
</html>
<script type="text/javascript">
$(document).ready(function(){

	$("body").on("focus","input",function(){
		//alert($(this).val());
		console.log($(this).val());
		
		
			$(this).addClass('bordered');   
		
		
	});
	$("body").on("blur","input",function(){
		//alert($(this).val());
		console.log($(this).val());
		
		 if ($(this).val()) {
			$(this).removeClass('bordered');   
		}
		
	});
});
</script>

