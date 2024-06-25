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
                            <div class="info_row">
                                <div class="row">
                                    <div class="col-xs-6 logo_block">

                                        <p>DTOP-DIS-770</p>
                                        <p>Rev. 04-2010</p>
                                        <img src="<?php echo base_url() . 'assets/images/dtop_logo.jpg' ?>" width="100px">
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <h5>GOBIERNO DE PUERTO RICO<br>
                                            DEPARTAMENTO DE TRANSPORTACIÓN Y OBRAS PÚBLICAS DIRECTORÍA DE SERVICIOS AL CONDUCTOR<br>
                                            División de Vehículos de Motor<br>
                                            <strong>41257</strong>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row afsr1">
                                    <h3 class="text-center col-xs-12">SOLICITUD PRESENTACIÓN GRAVAMEN MOBILIARIO SOBRE VEHÍCULOS DE MOTOR</h3>
                                    <p class="text-center col-xs-12">Favor de Leer las instrucciones al dorso</p>
                                    <div class="col-xs-12 topcheckbox">
                                        <div class="afsr1c2">
                                            <input type="checkbox" name="Presentation" id="Presentation" checked><label for="Presentation"> Presentación</label>
                                        </div>
                                        <div class="afsr1c2">
                                            <input type="checkbox" name="release" id="release"><label for="release"> Liberación</label>
                                        </div>
                                        <div class="afsr1c2">
                                            <input type="checkbox" name="Cesión" id="Cesión"><label for="Cesión"> Cesión o traspaso</label>
                                        </div>
                                        <div class="afsr1c2">
                                            <input type="checkbox" name="Divulgación" id="Divulgación"><label for="Divulgación"> Divulgación o Certificación</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-10 afsr afsr1c1 topcheckbox">
                                        <h4 class="sub-heading "><strong>A. INFORMACIÓN DEL ACREEDOR</strong></h4>
                                        <div class="afsr1c2">
                                            <input type="checkbox" name="Secured_Creditor" id="Secured_Creditor"><label for="Secured_Creditor"> Acreedor Garantizado</label>
                                        </div>
                                        <div class="afsr1c2">
                                            <input type="checkbox" name="Mortgagee" id="Mortgagee"><label for="Mortgagee"> Acreedor Hipotecario</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="afsr2 row">
                                    <div class="col-xs-7 afsr2c1 text-left">
                                        <input type="text" name="" class="inputbox">
                                        <label>Nombre Corporación o Razón Social (si aplica)</label>
                                    </div>
                                    <div class=" col-xs-5 afsr2c1 text-center">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número Identificación Patronal</label>
                                    </div>

                                    <div class="col-xs-12 afsr2c3">
                                        <input type="text" name="" class="inputbox">
                                        <label>Dirección Residencial (Urbanización, Condominio o Barrio)</label>
                                    </div>
                                    <div class="col-xs-3 afsr2c4 ">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Casa</label>
                                    </div>
                                    <div class="col-xs-6 afsr2c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Calle</label>
                                    </div>
                                    <div class="col-xs-3 afsr2c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Apartamento o Buzón</label>
                                    </div>
                                    <div class="col-xs-9 afsr2c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Municipio</label>
                                    </div>
                                    <div class="col-xs-3 afsr2c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Zona Postal</label>
                                    </div>
                                    <div class="col-xs-12 afsr2c6">
                                        <input type="text" name="" class="inputbox">
                                        <label>Dirección Postal (Urbanización, Condominio o Barrio)</label>
                                    </div>
                                    <div class="col-xs-3 afsr2c7">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Casa</label>
                                    </div>
                                    <div class="col-xs-6 afsr2c7">
                                        <input type="text" name="" class="inputbox">
                                        <label>Calle</label>
                                    </div>
                                    <div class="col-xs-3 afsr2c7">
                                        <input type="text" name="" class="inputbox">
                                        <label> Buzón</label>
                                    </div>
                                    <div class="col-xs-9 afsr2c8">
                                        <input type="text" name="" class="inputbox">
                                        <label>Municipio (Solo si es diferente a la Residencial)</label>
                                    </div>
                                    <div class="col-xs-3 afsr2c8">
                                        <input type="text" name="" class="inputbox">
                                        <label>Zona Postal</label>
                                    </div>
                                </div> <!-- afsr3 -->
                                <div class="afsr3 row ">
                                    <h4 class="sub-heading col-xs-12"><strong>B. INFORMACIÓN DEL DEUDOR</strong></h4>
                                    <div class="col-xs-7 afsr3c1">
                                        <input type="text" name="" class="inputbox">
                                        <label>Nombre Corporación o Razón Social (si aplica)</label>
                                    </div>
                                    <div class="col-xs-5 afsr3c2">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Seguro Social</label>
                                    </div>
                                    <div class="col-xs-12 afsr3c3">
                                        <input type="text" name="" class="inputbox">
                                        <label>Dirección Residencial (Urbanización, Condominio o Barrio)</label>
                                    </div>
                                    <div class="col-xs-3 afsr3c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Casa</label>
                                    </div>
                                    <div class="col-xs-6 afsr3c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Calle</label>
                                    </div>
                                    <div class="col-xs-3 afsr3c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Apartamento o Buzón</label>
                                    </div>
                                    <div class="col-xs-9 afsr3c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Municipio</label>
                                    </div>
                                    <div class="col-xs-3 afsr3c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Zona Postal</label>
                                    </div>
                                    <div class="col-xs-12 afsr3c6">
                                        <input type="text" name="" class="inputbox">
                                        <label>Dirección Postal (Urbanización, Condominio o Barrio)</label>
                                    </div>
                                    <div class="col-xs-3 afsr3c6">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Casa</label>
                                    </div>
                                    <div class="col-xs-6 afsr3c7">
                                        <input type="text" name="" class="inputbox">
                                        <label>Calle</label>
                                    </div>
                                    <div class="col-xs-3 afsr3c7">
                                        <input type="text" name="" class="inputbox">
                                        <label> Buzón</label>
                                    </div>
                                    <div class="col-xs-9 afsr3c8">
                                        <input type="text" name="" class="inputbox">
                                        <label>Municipio (Solo si es diferente a la Residencial)</label>
                                    </div>
                                    <div class="col-xs-3 afsr3c8">
                                        <input type="text" name="" class="inputbox">
                                        <label>Zona Postal</label>
                                    </div>
                                    <div class="col-xs-4 afsr3c9 text-center">
                                        <input type="text" name="" class="inputbox">
                                        <label>Fecha de Nacimiento</label>
                                    </div>
                                    <div class="col-xs-4 afsr3c8">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-4 afsr3c8 text-center">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Licencia de Conducir</label>
                                    </div>
                                </div> <!--   afsr3 -->
                                <div class="afsr4 row text-center">
                                    <h4 class="sub-heading col-xs-12"><strong>C. INFORMACIÓN SOBRE EL VEHÍCULO</strong></h4>
                                    <div class="col-xs-3 afsr4c1">
                                        <input type="text" name="" class="inputbox">
                                        <label>Marca</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c1">
                                        <input type="text" name="" class="inputbox">
                                        <label>Modelo</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c1">
                                        <input type="text" name="" class="inputbox">
                                        <label>Año</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c1">
                                        <input type="text" name="" class="inputbox">
                                        <label>Color</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c2 text-right topcheckbox">
                                        <div class="afsr1c2">
                                            <input type="checkbox" id="New" name="New"><label for="New"> Nuevo</label>
                                        </div>
                                        <div class="afsr1c2">
                                            <input type="checkbox" id="Used" name="Used"><label for="Used"> Usado</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="afsr4 row text-center">
                                    <div class="col-xs-3 afsr4c3" class="inputbox">
                                        <input type="text" name="">
                                        <label>Número de Registro</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c3">
                                        <input type="text" name="" class="inputbox">
                                        <label>Cilindro</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c3">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Serie</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c3">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Tablilla</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Tipo</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Caballos de Fuerza</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Puertas</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Capacidad de Carga</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c4">
                                        <input type="text" name="" class="inputbox">
                                        <label>Peso Neto</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Fecha Adquisición</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Estado Procedencia</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Título del Vehículo</label>
                                    </div>
                                    <div class="col-xs-3 afsr4c5">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Contrato</label>
                                    </div>
                                    <div class="col-xs-2 afsr4c5">
                                        <input type="date" name="" class="inputbox">
                                        <label>Fecha</label>
                                    </div>
                                    <div class="col-xs-4 afsr4c6">
                                        <input type="text" name="" class="inputbox">
                                        <label>Nombre Traficante</label>
                                    </div>
                                    <div class="col-xs-4 afsr4c6">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Licencia</label>
                                    </div>
                                    <div class="col-xs-4 afsr4c6">
                                        <input type="text" name="" class="inputbox">
                                        <label>Número de Identificación Patronal</label>
                                    </div>
                                    <div class="col-xs-4 afsr4c7">
                                        <input type="text" name="" class="inputbox">
                                        <label>Firma Deudor </label>
                                    </div>
                                    <div class="col-xs-4 afsr4c7">
                                        <input type="text" name="" class="inputbox">
                                        <label>Firma del Acreedor </label>
                                    </div>
                                    <div class="col-xs-4 afsr4c7">
                                        <input type="date" name="" class="inputbox">
                                        <label>Fecha</label>
                                    </div>

                                </div> <!--   afsr4 -->
                                <div class="afsr5 row">
                                    <hr class="col-xs-12">
                                    <div class="afsr5c1 col-xs-12 text-center">
                                        <h4><strong>PARA USO OFICIAL SOLAMENTE</strong></h4>
                                        <p>Presentación a inscripción</p>
                                    </div>
                                </div>
                                <div class="afsr5 row text-center">
                                    <div class="col-xs-3 afsr5c2 text-right">
                                        Fecha y Hora de Presentación:
                                    </div>
                                    <div class="col-xs-3 afsr5c2">
                                        <input type="date" name="" value="2018-07-22" class="inputbox">
                                        <label>Día/Mes/Año</label>
                                    </div>

                                    <div class="col-xs-2 afsr5c2">
                                        <input type="time" id="appt" required class="inputbox">
                                        <label>Hora Minutos</label>
                                    </div>
                                    <div class="col-xs-4 afsr5c2">
                                        <input type="text" id="appt" required class="inputbox">
                                        <label>Lugar</label>
                                    </div>
                                </div>
                                <div class="afsr5 row text-center">
                                    <div class="col-xs-4 afsr5c3">
                                        <input type="text" id="appt" required class="inputbox">
                                        <label>Derechos a Pagar</label>
                                    </div>
                                    <div class="col-xs-4 afsr5c3">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-4 afsr5c3">
                                        <input type="text" id="appt" required class="inputbox">
                                        <label>Número de Control Asignado</label>
                                    </div>
                                </div>
                                <div class="afsr6-1 row text-center">
                                    <div class="col-xs-4 afsr6-1c1">
                                        <input type="text" id="appt" required class="inputbox">
                                        <label class="text-center w-100">Nombre Funcionario Receptor de DISCO</label>
                                    </div>
                                    <div class="col-xs-1 afsr5c3">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-3 afsr6-1c2">
                                        <input type="text" id="appt" required class="inputbox">
                                        <label class="text-center w-100">Fecha</label>
                                    </div>
                                    <div class="col-xs-1 afsr5c3">
                                        &nbsp;
                                    </div>
                                    <div class="col-xs-3 afsr6-1c3">
                                        <input type="text" id="appt" required class="inputbox">
                                        <label class="text-center w-100">Firma</label>
                                    </div>
                                    <p class="col-xs-6 text-left">Rev. 3ene2013</p>
                                    <p class="col-xs-6 text-right"><a href="www.dtop.gov.pr">www.dtop.gov.pr</a></p>
                                </div>
                                <div style="break-after:page"></div>
                                <div class="afsr6 row" >
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
                            </div>
                            <div class="mb-5">
                                <div class="row ffblock">
                                    <!-- <div class="col-sm-12 col-xs-12 text-center">
                                        </div> -->
                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6 align-self-end text-center">
                                        <p class="headtext">INSTRUCCIONES</p>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        &nbsp;
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <ol class="desimallist">
                                    <li>
                                        Complemente este formulario en original y copia en todas sus partes previo a su presentación. Use maquinilla, pluma o equipo procesador de palabras.
                                    </li>
                                    <li>Indique direcciones física y postal de acuerdo a formato requerido por el Servicio Postal de los Estados Unidos.</li>
                                    <li>La información sobre el vehículo podrá obtenerla de uno de los siguientes documentos:
                                        <ul class="listsmallalpha">
                                            <li>Vehículo nuevo
                                                <ol class="desimallist">
                                                    <li>factura notariada</li>
                                                    <li>certificado de origen del manufacturero</li>
                                                    <li>título del vehículo</li>
                                                </ol>
                                            </li>
                                            <li>Vehículo usado
                                                <ol class="desimallist">
                                                    <li>título de propiedad</li>
                                                    <li>documento de registro</li>
                                                    <li>documento de subasta pública</li>
                                                    <li>documento de certificado de cesión</li>
                                                    <li>documento de compraventa de compañía de seguro</li>

                                                </ol>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>El tipo de vehículo será:
                                        <ol class="listsmallalpha">
                                            <li>pasajeros</li>
                                            <li>camión liviano</li>
                                            <li>camión pesado</li>
                                            <li>arrastre</li>
                                            <li>motocicleta</li>
                                        </ol>

                                    </li>
                                    <li>Aranceles
                                        <p>
                                            La fórmula para obtener el arancel a pagar por el contrato de financiamiento es la siguiente: valor del precio de venta del vehículo menos $1,000; el resultado se multiplica por .005 y se le añaden $5.00 en comprobante de Rentas Internas para obtener los derechos a pagar. Para el pago de los derechos sobre gravamen mobiliario de hipoteca, el CESCO utilizará la tabla de cómputos de derechos de inscripción, a los cuales deberá agregarse el comprobante de Rentas Internas por la cantidad de $ 5.00 dólares.
                                        </p>
                                    </li>
                                    <li>
                                        Acompañe con este formulario comprobante de Rentas Internas por valor de cinco (5) dólares, según indicado. Sin no utiliza este formulario el comprobante será de diez (10) dólares.
                                    </li>
                                    <li>
                                        Presentar contrato de financiamiento o de hipoteca. Además, debe ofrece la mayor cantidad de
                                        información posible referente al vehículo para agilizar su inscripción en nuestros récords.
                                    </li>
                                </ol>

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
        width: 80px;
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

    .desimallist li {
        margin-bottom: 10px;
    }

    .desimallist {
        list-style: decimal;
        /* margin-left: 20px; */
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
        padding: 0 10px 0px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    .li1i8 {
        width: 100%;
    }

    .flexdiv p {
        margin-bottom: 5px;
    }

    strong {
        font-weight: 700;
    }

    .afsr1 h3 {
        font-size: 20px;
        font-weight: 700;
    }

    .topcheckbox {
        display: flex;
        justify-content: space-between;
    }

    .topcheckbox input {
        margin-right: 10px;
    }

    .inputbox {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
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
            font-size: 10px;
            font-family: "open sans";
            /* margin: 0 !important; */
        }

        .hide-print {
            display: none;
        }

        #wrapper {
            margin-left: 0;
            margin: 0 0;
            visibility: hidden;
            min-height: unset !important;
        }

        input[type="date"],
        input[type="time"],
        input[type="text"] {
            height: 18px;
            min-height: 11px;
            padding: 3px;
            font-size: 14px;
            line-height: 22px;
            color: #555;
            font-weight: 600;
            /* background-color: #eceffa !important; */
            border: none;
            border-bottom: 1px solid #333;
            border-radius: 0px;
            margin-bottom: 0px;
        }

        strong {
            font-weight: 900;
        }

        .br-0 {
            border-right: 0px !important;
        }

        .mb-0 {
            margin-bottom: 5px;
        }

        body .col-xs-12 {
            padding-right: 15px !important;
            padding-left: 15px !important;
        }

        .logo_block p {
            margin-bottom: 0;
        }

        img {
            width: 70px;
        }

        .afsr1 h3 {
            margin: 0;
        }

        .afsr1 p {
            margin-bottom: 2px;
        }

        #print_block input[type="text"]~label {
            margin-bottom: 0;
        }

        #print_block h4.sub-heading,
        .afsr5c1 h4 {
            margin: 2px;
        }

        #print_block hr.col-xs-12 {
            margin: 0;
            border-color: #000;
        }

    }
</style>

</html>