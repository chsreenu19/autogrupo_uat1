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
                        irs1
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row topblock">
                                    <div class="col-xs-3 br-1">
                                        <div class="dflex jcsb aic">
                                            <p><strong>Formulario <br> del IRS </strong></p>
                                            <h2 class="m-0 f900">8300</h2>
                                        </div>
                                        <p>(Rev. diciembre de 2023)</p>
                                        <p>Department of the Treasury<br>Internal Revenue Service </p>
                                    </div>
                                    <div class="col-xs-6 br-1 text-center hmdlcon">
                                        <h3 class="f900 mt-0">Informe de Pagos en Efectivo en Exceso de $10,000 Recibidos en una Ocupación o Negocio
                                        </h3>
                                        <p><strong>Vea las instrucciones para la definición de efectivo. </strong></p>
                                        <p>Use este formulario para las transacciones que ocurran después del 31 de diciembre de 2023.
                                            No utilice las versiones anteriores a partir de esta fecha. Para el Aviso sobre la Ley<br>
                                            de Confidencialidad de Información y la Ley de Reducción de Trámites, vea las instrucciones. </p>
                                    </div>
                                    <div class="col-xs-3 ">
                                        <div class="dflex jcsb aic">
                                            <p><strong>Formulario<br>de la FinCEN</strong></p>
                                            <h2 class="m-0 f900">8300</h2>
                                        </div>
                                        <p>(Rev. agosto de 2014)<br>OMB No. 1506-0018</p>
                                        <p>Department of the Treasury<br>
                                            <small> Financial Crimes Enforcement Network</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bodycontent">
                                <ul class="listdecimal">
                                    <li class="bt-2">
                                        Marque el (los) recuadro(s) apropiado(s) si: &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                        <strong> &nbsp; a </strong> <input type="checkbox" name="Enmienda" id="Enmienda">
                                        <label for="Enmienda"> Enmienda un informe anterior</label>
                                        <strong> &nbsp; b </strong> <input type="checkbox" name="sospechosa" id="sospechosa">
                                        <label for="sospechosa"> Es una transacción sospechosa</label>
                                    </li>
                                    <div class="headertxt bt-1">
                                        <strong>Parte I </strong> &nbsp; &nbsp; <span class="f900">Identidad de la Persona de Quien se Recibió el Efectivo</span>
                                    </div>
                                    <li class="bt-1 ">
                                        <span>Si se trata de más de una persona, marque aquí y vea las instrucciones </span><input type="checkbox" name="Enmienda" id="Enmienda" class="flright">
                                    </li>
                                    <li class="bt-1 col-xs-4">
                                        <span>Apellido</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-2 bt-1 bl-1">
                                        <span>Primer nombre</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-2 bt-1 bl-1">
                                        <span>Inicial</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-4 pl-0  bt-1 bl-1">
                                        <span>Número de identificación del contribuyente</span><br>
                                        <input type="text" class="inputbox fr1i1 input-20 text-center" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-30 text-center" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-48 text-center" maxlength="4" />
                                    </li>
                                    <li class="bt-1 col-xs-8">
                                        <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-4 bl-1 pl-0">
                                        <span>Fecha de nacimiento (vea las instrucciones)</span>
                                        <input type="text" class="inputbox fr1i1 input-20 text-center" placeholder="mm" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-30 text-center" placeholder="dd" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-48 text-center" placeholder="yyyy" maxlength="4" />
                                    </li>
                                    <li class="bt-1 col-xs-2 px-2">
                                        <span>Ciudad</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-1 bl-1 px-2 font-10">
                                        <span>Estado</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-2 bl-1 px-2 font-10">
                                        <span>Código postal (ZIP)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-3 bl-1">
                                        <span>País (si no es EE. UU.)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-4 bl-1">
                                        <span>Ocupación, profesión o negocio</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-12 pl-0 m-0">
                                        <!-- 14. &nbsp;  -->
                                        <div class="row list14">
                                            <span class="col-xs-2 d-inline">Documento de<br>
                                                identificación (ID)</span>
                                            <div class="col-xs-10 row">
                                                <div class="col-xs-12">
                                                    <strong>a &nbsp; Describa la identificación</strong>
                                                    <input type="text" class="inputbox fr1i1 input-77" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <strong>b &nbsp; Emitido por</strong>
                                                    <input type="text" class="inputbox fr1i1 input-70" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <strong> c &nbsp; Número</strong>
                                                    <input type="text" class="inputbox fr1i1 input-77" />
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <div class="headertxt bt-1 pl-0 col-xs-12">
                                        <strong>Parte II </strong> &nbsp; &nbsp; <span class="f900">Persona por Quien se Efectuó esta Transacción</span>
                                    </div>
                                    <li class="bt-1 col-xs-12 pl-0">
                                        <span>Si esta transacción se hizo en nombre de más de una persona, marque aquí y vea las instrucciones </span><input type="text" class="inputbox fr1i1 input-30">
                                    </li>
                                    <li class="bt-1 col-xs-4 pl-0">
                                        <span>Apellido de la persona o nombre de la organización</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-2 bt-1 bl-1">
                                        <span>Primer nombre</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-2 bt-1 bl-1">
                                        <span>Inicial</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-4  bt-1 bl-1">
                                        <span>Número de identificación del contribuyente</span><br>
                                        <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                        <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                        <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                    </li>
                                    <li class="col-xs-12 bt-1 pl-0">
                                        <div class="row list14">
                                            <div class="col-xs-8">
                                                <span>Apellido de la persona o nombre de la organización</span>
                                                <input type="text" class="inputbox fr1i1 input-100" />
                                            </div>
                                            <div class="col-xs-4">
                                                <span>Número de identificación del contribuyente</span><br>
                                                <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                                <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                                <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="bt-1 col-xs-7 br-1 pl-0">
                                        <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1  col-xs-5">
                                        <span>Ocupación, profesión o negocio</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 br-1 col-xs-5 pl-0 pr-0">
                                        <span>Ciudad</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-1 pl-0 pr-0 ">
                                        <span>Estado</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 bl-1 col-xs-3 pl-0">
                                        <span>Código postal (ZIP)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 bl-1 col-xs-3 ">
                                        <span>País (si no es EE. UU.)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-12 pl-0 m-0">
                                        <!-- 14. &nbsp;  -->
                                        <div class="row list14">
                                            <span class="col-xs-2 d-inline">Documento de<br>
                                                identificación (ID)</span>
                                            <div class="col-xs-10 row">
                                                <div class="col-xs-12">
                                                    <strong>a &nbsp; Describa la identificación</strong>
                                                    <input type="text" class="inputbox fr1i1 input-77" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <strong>b &nbsp; Emitido por</strong>
                                                    <input type="text" class="inputbox fr1i1 input-70" />
                                                </div>
                                                <div class="col-xs-6">
                                                    <strong> c &nbsp; Número</strong>
                                                    <input type="text" class="inputbox fr1i1 input-77" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <div class="headertxt bt-1 pl-0 col-xs-12">
                                        <strong>Parte III </strong> &nbsp; &nbsp; <span class="f900">Descripción de la Transacción y Método de Pago </span>
                                    </div>
                                    <li class="col-xs-3  bt-1 pl-0">
                                        <span>Fecha en que se recibió el efectivo </span><br>
                                        <input type="text" class="inputbox fr1i1 input-20 text-center" placeholder="mm" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-30 text-center" placeholder="dd" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-48 text-center" placeholder="yyyy" maxlength="4" />
                                    </li>
                                    <li class="col-xs-3  bt-1 px-2 bl-1">
                                        <span> Total del efectivo recibido</span><br>
                                        $ <input type="text" class="inputbox fr1i1 input-77 text-right" placeholder="12345" maxlength="4" />.00
                                    </li>
                                    <li class="col-xs-3  bt-1 px-2 bl-1 pb-15">
                                        Si el efectivo se
                                        recibió en más de un
                                        pago, marque aquí &nbsp;&nbsp;&nbsp; <input type="checkbox" name="cashwasreceived" class="mt-0 vertalimid fl-right" id="cashwasreceived">
                                    </li>
                                    <li class="col-xs-3  bt-1 pl-0 pr-0 bl-1">
                                        <span> Precio total si es diferente de la
                                            partida 29</span><br>
                                        $ <input type="text" class="inputbox fr1i1 input-77 text-right" placeholder="12345" maxlength="4" />.00
                                    </li>
                                    <li class="col-xs-12 bt-1 pl-0">
                                        Cantidad de efectivo recibido (en equivalente a dólares de EE. UU.) (tiene que ser igual a la cantidad de la partida 29) (vea las instrucciones):
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <ul class="listalpha list32">
                                                    <li><span>Moneda de EE. UU.</span> &nbsp;&nbsp;&nbsp;&nbsp; $ <input type="text" class="inputbox fr1i1  input-30 text-right" maxlength="4" />.00</li>
                                                    <li><span>Moneda extranjera</span> &nbsp;&nbsp;&nbsp;&nbsp; $ <input type="text" class="inputbox fr1i1  input-30 text-right" maxlength="4" />.00</li>
                                                    <li><span>Cheque(s) de cajero</span> &nbsp;&nbsp;&nbsp;&nbsp; $ <input type="text" class="inputbox fr1i1  input-30 text-right" maxlength="4" />.00</li>
                                                    <li><span>Giro(s)</span> &nbsp;&nbsp;&nbsp;&nbsp; $ <input type="text" class="inputbox fr1i1  input-30 text-right" maxlength="4" />.00</li>
                                                    <li><span>Letra(s) bancaria(s) </span> &nbsp;&nbsp;&nbsp;&nbsp; $ <input type="text" class="inputbox fr1i1  input-30 text-right" maxlength="4" />.00</li>
                                                    <li><span>Cheque(s) de caja</span> &nbsp;&nbsp;&nbsp;&nbsp; $ <input type="text" class="inputbox fr1i1  input-30 text-right" maxlength="4" />.00</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-7">
                                                <span> (Cantidad de billetes de $100 o más</span> $ <input type="text" class="inputbox fr1i1 input-30 text-right" maxlength="4" />.00)<br>
                                                <span> (País</span> $ <input type="text" class="inputbox fr1i1 input-30 text-right" maxlength="4" />.00)<br>
                                                <div class="textarealist32">
                                                    Nombre del emisor y número de serie del instrumento monetario
                                                    <textarea rows="3" class="inputbox input-100"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="bt-1 pl-0 col-xs-7">
                                        Clase de transacción
                                        <ul class="listalpha">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <li><input type="checkbox" name="Personalpropertypurchased" class="mt-0 vertalimid" id="Personalpropertypurchased">
                                                        <label for="Personalpropertypurchased" class="mb-0">Bienes muebles comprados </label>
                                                    </li>
                                                    <li><input type="checkbox" name="Realpurchased" class="mt-0 vertalimid" id="Realpurchased">
                                                        <label for="Realpurchased" class="mb-0">Bienes inmuebles comprados</label>
                                                    </li>
                                                    <li><input type="checkbox" name="Personalservicesprovided" class="mt-0 vertalimid" id="Personalservicesprovided">
                                                        <label for="Personalservicesprovided" class="mb-0">Servicios personales provistos</label>
                                                    </li>
                                                    <li><input type="checkbox" name="Businessservicesprovided" class="mt-0 vertalimid" id="Businessservicesprovided">
                                                        <label for="Businessservicesprovided" class="mb-0">Servicios profesionales provistos</label>
                                                    </li>
                                                    <li><input type="checkbox" name="Intangiblepropertypurchased" class="mt-0 vertalimid" id="Intangiblepropertypurchased">
                                                        <label for="Intangiblepropertypurchased" class="mb-0">Propiedad intangible comprada</label>
                                                    </li>
                                                </div>
                                                <div class="col-xs-6">
                                                    <li><input type="checkbox" name="obligations" class="mt-0 vertalimid" id="obligations">
                                                        <label for="obligations" class="mb-0">Deudas pagadas</label>
                                                    </li>
                                                    <li><input type="checkbox" name="Exchangecash" class="mt-0 vertalimid" id="Exchangecash">
                                                        <label for="Exchangecash" class="mb-0">Intercambio de efectivo</label>
                                                    </li>
                                                    <li><input type="checkbox" name="Escrow" class="mt-0 vertalimid" id="Escrow">
                                                        <label for="Escrow" class="mb-0">Fondos fiduciarios o en plica </label>
                                                    </li>
                                                    <li><input type="checkbox" name="courtclerks" class="mt-0 vertalimid" id="courtclerks">
                                                        <label for="courtclerks" class="mb-0">Fianza recibida por escribanos</label>
                                                    </li>
                                                    <li><input type="checkbox" name="Other" class="mt-0 vertalimid" id="Other">
                                                        <label for="Other" class="mb-0">Otras (especifique en la partida 34)</label>
                                                    </li>

                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="col-xs-5 bt-1">
                                        Descripción específica de la propiedad o servicio
                                        indicado en la partida 33. Indique el número de serie
                                        o de registro, dirección, número de caso, etc.
                                        <textarea rows="3" class="inputbox input-100"></textarea>
                                    </li>
                                    <div class="headertxt bt-1 col-xs-12 pl-0">
                                        <strong>Parte IV </strong> &nbsp; &nbsp; <span class="f900">Negocio que Recibió el Efectivo </span>
                                    </div>
                                    <li class="col-xs-8 bt-1 pl-0">
                                        <span>Nombre del negocio que recibió el efectivo </span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-4 bl-1 bt-1">
                                        <span>Número de identificación del empleador</span><br>
                                        <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                        <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                        <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                    </li>
                                    <li class="col-xs-12 bt-1 pl-0">
                                        <div class="row list14">
                                            <div class="col-xs-8">
                                                <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                                <input type="text" class="inputbox fr1i1 input-100" />
                                            </div>
                                            <div class="col-xs-4">
                                                <span>Número de Seguro Social</span><br>
                                                <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                                <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                                <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                            </div>
                                        </div>
                                    </li>
                                    <li class="bt-1 br-1 col-xs-4 pl-0 px-2">
                                        <span>Ciudad</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 col-xs-1 px-2  ">
                                        <span>Estado</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 bl-1 col-xs-3 px-2">
                                        <span>Código postal (ZIP)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="bt-1 bl-1 col-xs-4 ">
                                        <span>País (si no es EE. UU.)</span>
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-12 bt-1 pl-0">
                                        Declaro bajo pena de perjurio que la información que he suministrado anteriormente, a mi leal saber y entender, es verídica, correcta y completa.
                                        <div class="row ais">
                                            <div class="col-xs-6 d-flex aic">
                                                Firma &nbsp;&nbsp; <span class="input-100 text-center"><input type="text" class="inputbox fr1i1 input-100" /><br> Funcionario autorizado</span>
                                            </div>
                                            <div class="col-xs-6 d-flex aic">
                                                Cargo &nbsp;&nbsp; <span class="input-100 text-center"><input type="text" class="inputbox fr1i1 input-100" /></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xs-3  bt-1 pl-0">
                                        <span>Fecha de la firma</span><br>
                                        <input type="text" class="inputbox fr1i1 input-20 text-center" placeholder="mm" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-30 text-center" placeholder="dd" maxlength="2" />
                                        <input type="text" class="inputbox fr1i1 input-48 text-center" placeholder="yyyy" maxlength="4" />
                                    </li>
                                    <li class="col-xs-6 bt-1 bl-1">
                                        Escriba a máquina o en letra de molde el nombre de la persona de contacto
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <li class="col-xs-3 bt-1 bl-1">
                                        Número de teléfono de la persona de contacto
                                        <input type="text" class="inputbox fr1i1 input-100" />
                                    </li>
                                    <div class="row bt-1 col-xs-12">
                                        <div class="col-xs-4">
                                            <span>IRS Form 8300 (sp) (Rev. 12-2023)</span>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <small>Cat. No. 24396N</small>
                                        </div>
                                        <div class="col-xs-4 text-right">
                                            FinCen Form 8300 (sp) <small>(Rev. 8-2014)</small>
                                        </div>
                                    </div>
                                </ul>
                                <div style="break-after:page"></div><br>
                                <!-- </div> -->
                                <div class="secondblock mt-5">
                                    <h3 class="f900 mt-0 text-center">Otras Partes Involucradas</h3>
                                    <p class="text-center"><small>(Complete las partes correspondientes a continuación si marcó el recuadro 2 o 15 en la página 1.)</small></p>
                                    <div class="headertxt bt-1">
                                        <strong>Parte I </strong> &nbsp; &nbsp; <span class="f900">Continuación—Complete si marcó el recuadro 2 en la página 1</span>
                                    </div>
                                    <ol class="listdecimal" start=3>
                                        <li class="bt-1 col-xs-4">
                                            <span>Apellido</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Primer nombre</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Inicial</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-4 pl-0  bt-1 bl-1">
                                            <span>Número de identificación del contribuyente</span><br>
                                            <input type="text" class="inputbox fr1i1 input-20 text-center" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-30 text-center" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-48 text-center" maxlength="4" />
                                        </li>
                                        <li class="bt-1 col-xs-8">
                                            <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-4 bl-1 pl-0">
                                            <span>Fecha de nacimiento (vea las instrucciones)</span>
                                            <input type="text" class="inputbox fr1i1 input-20 text-center" placeholder="mm" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-30 text-center" placeholder="dd" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-48 text-center" placeholder="yyyy" maxlength="4" />
                                        </li>
                                        <li class="bt-1 col-xs-2 px-2">
                                            <span>Ciudad</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-1 bl-1 px-2 font-10">
                                            <span>Estado</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-2 bl-1 px-2 font-10">
                                            <span>Código postal (ZIP)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-3 bl-1">
                                            <span>País (si no es EE. UU.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-4 bl-1">
                                            <span>Ocupación, profesión o negocio</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-12 pl-0 m-0">
                                            <!-- 14. &nbsp;  -->
                                            <div class="row list14">
                                                <span class="col-xs-2 d-inline">Documento de<br>
                                                    identificación (ID)</span>
                                                <div class="col-xs-10 row">
                                                    <div class="col-xs-12">
                                                        <strong>a &nbsp; Describa la identificación</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong>b &nbsp; Emitido por</strong>
                                                        <input type="text" class="inputbox fr1i1 input-70" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong> c &nbsp; Número</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    </ol>
                                    <div style="background-color:#ccc" class="p-3 bt-1 col-xs-12">&nbsp;
                                        <br>
                                    </div>
                                    <ol class="listdecimal " start=3>
                                        <li class="bt-1 col-xs-4">
                                            <span>Apellido</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Primer nombre</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Inicial</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-4 pl-0  bt-1 bl-1">
                                            <span>Número de identificación del contribuyente</span><br>
                                            <input type="text" class="inputbox fr1i1 input-20 text-center" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-30 text-center" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-48 text-center" maxlength="4" />
                                        </li>
                                        <li class="bt-1 col-xs-8">
                                            <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-4 bl-1 pl-0">
                                            <span>Fecha de nacimiento (vea las instrucciones)</span>
                                            <input type="text" class="inputbox fr1i1 input-20 text-center" placeholder="mm" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-30 text-center" placeholder="dd" maxlength="2" />
                                            <input type="text" class="inputbox fr1i1 input-48 text-center" placeholder="yyyy" maxlength="4" />
                                        </li>
                                        <li class="bt-1 col-xs-2 px-2">
                                            <span>Ciudad</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-1 bl-1 px-2 font-10">
                                            <span>Estado</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-2 bl-1 px-2 font-10">
                                            <span>Código postal (ZIP)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-3 bl-1">
                                            <span>País (si no es EE. UU.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-4 bl-1">
                                            <span>Ocupación, profesión o negocio</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-12 pl-0 m-0">
                                            <!-- 14. &nbsp;  -->
                                            <div class="row list14">
                                                <span class="col-xs-2 d-inline">Documento de<br>
                                                    identificación (ID)</span>
                                                <div class="col-xs-10 row">
                                                    <div class="col-xs-12">
                                                        <strong>a &nbsp; Describa la identificación</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong>b &nbsp; Emitido por</strong>
                                                        <input type="text" class="inputbox fr1i1 input-70" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong> c &nbsp; Número</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <div class="headertxt bt-1 col-xs-12 pl-0">
                                        <strong>Parte II </strong> &nbsp; &nbsp; <span class="f900">Continuación—Complete si marcó el recuadro 15 en la página 1</span>
                                    </div>
                                    <ol class="listdecimal" start="16">
                                        <li class="bt-1 col-xs-4 pl-0">
                                            <span>Apellido de la persona o nombre de la organización</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Primer nombre</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Inicial</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-4  bt-1 bl-1">
                                            <span>Número de identificación del contribuyente</span><br>
                                            <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                            <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                            <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                        </li>
                                        <li class="col-xs-12 bt-1 pl-0">
                                            <div class="row list14">
                                                <div class="col-xs-8">
                                                    <span>Apellido de la persona o nombre de la organización</span>
                                                    <input type="text" class="inputbox fr1i1 input-100" />
                                                </div>
                                                <div class="col-xs-4">
                                                    <span>Número de identificación del contribuyente</span><br>
                                                    <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                                    <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                                    <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                                </div>
                                            </div>
                                        </li>
                                        <li class="bt-1 col-xs-7 br-1 pl-0">
                                            <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1  col-xs-5">
                                            <span>Ocupación, profesión o negocio</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 br-1 col-xs-5 pl-0 pr-0">
                                            <span>Ciudad</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-1 pl-0 pr-0 ">
                                            <span>Estado</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 bl-1 col-xs-3 pl-0">
                                            <span>Código postal (ZIP)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 bl-1 col-xs-3 ">
                                            <span>País (si no es EE. UU.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-12 pl-0 m-0">
                                            <!-- 14. &nbsp;  -->
                                            <div class="row list14">
                                                <span class="col-xs-2 d-inline">Documento de<br>
                                                    identificación (ID)</span>
                                                <div class="col-xs-10 row">
                                                    <div class="col-xs-12">
                                                        <strong>a &nbsp; Describa la identificación</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong>b &nbsp; Emitido por</strong>
                                                        <input type="text" class="inputbox fr1i1 input-70" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong> c &nbsp; Número</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <div style="background-color:#ccc" class="p-3 bt-1 col-xs-12">&nbsp;
                                        <br>
                                    </div>
                                    <ol class="listdecimal" start="16">
                                        <li class="bt-1 col-xs-4 pl-0">
                                            <span>Apellido de la persona o nombre de la organización</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Primer nombre</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-2 bt-1 bl-1">
                                            <span>Inicial</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="col-xs-4  bt-1 bl-1">
                                            <span>Número de identificación del contribuyente</span><br>
                                            <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                            <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                            <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                        </li>
                                        <li class="col-xs-12 bt-1 pl-0">
                                            <div class="row list14">
                                                <div class="col-xs-8">
                                                    <span>Apellido de la persona o nombre de la organización</span>
                                                    <input type="text" class="inputbox fr1i1 input-100" />
                                                </div>
                                                <div class="col-xs-4">
                                                    <span>Número de identificación del contribuyente</span><br>
                                                    <input type="text" class="inputbox fr1i1 input-20 text-center" />
                                                    <input type="text" class="inputbox fr1i1 input-30 text-center" />
                                                    <input type="text" class="inputbox fr1i1 input-48 text-center" />
                                                </div>
                                            </div>
                                        </li>
                                        <li class="bt-1 col-xs-7 br-1 pl-0">
                                            <span>Dirección (número, calle y núm. de oficina o de apto.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1  col-xs-5">
                                            <span>Ocupación, profesión o negocio</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 br-1 col-xs-5 pl-0 pr-0">
                                            <span>Ciudad</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-1 pl-0 pr-0 ">
                                            <span>Estado</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 bl-1 col-xs-3 pl-0">
                                            <span>Código postal (ZIP)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 bl-1 col-xs-3 ">
                                            <span>País (si no es EE. UU.)</span>
                                            <input type="text" class="inputbox fr1i1 input-100" />
                                        </li>
                                        <li class="bt-1 col-xs-12 pl-0 m-0">
                                            <!-- 14. &nbsp;  -->
                                            <div class="row list14">
                                                <span class="col-xs-2 d-inline">Documento de<br>
                                                    identificación (ID)</span>
                                                <div class="col-xs-10 row">
                                                    <div class="col-xs-12">
                                                        <strong>a &nbsp; Describa la identificación</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong>b &nbsp; Emitido por</strong>
                                                        <input type="text" class="inputbox fr1i1 input-70" />
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <strong> c &nbsp; Número</strong>
                                                        <input type="text" class="inputbox fr1i1 input-77" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <p><strong>Comentarios—</strong>Use las líneas provistas a continuación para comentar o aclarar la información que haya anotado en cualquier línea de las Partes I, II, III y IV.</p>
                                    <textarea class="input-100" rows="6"></textarea>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            IRS Form 8300 (sp) <small>(Rev. 12-2023)</small>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            FinCen Form 8300 (sp) <small>(Rev. 8-2014)</small>
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

            .headtext {
                border-bottom: 2px solid #000;
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

            .pb-15 {
                padding-bottom: 15px;
            }

            .headmiddle {
                font-weight: 700;
                font-size: 15px;
                margin: 0 0 5px 0;
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

            .mt-0 {
                margin-top: 0 !important;
            }

            .mt-5 {
                margin-top: 15px !important;
            }

            .vertalimid {
                vertical-align: middle;
            }

            .fl-right {
                float: right;

            }

            .showprintonly {
                display: none;
            }

            .input-48 {
                width: 46%;
            }

            .input-77 {
                width: 77%;
            }

            .input-70 {
                width: 70%;
            }

            .input-50 {
                width: 50%;
            }

            .input-30 {
                width: 30%;
            }

            .input-20 {
                width: 20%;
            }

            .input-100 {
                width: 100%;
            }

            .dflex {
                display: flex;
            }

            .jcsb {
                justify-content: space-between;
            }

            .aic {
                align-items: center;
            }

            .ais {
                align-items: flex-start;
            }

            .br-1 {
                border-right: 1px solid #000;
            }

            .bl-1 {
                border-left: 1px solid #000;
            }

            .f900 {
                font-weight: 900;
            }

            .hmdlcon p {
                font-size: 9px !important;
            }

            strong {
                font-weight: 700;
            }

            #Enmienda,
            #sospechosa {
                vertical-align: middle;
                margin-top: 0;
                margin-left: 10px;
            }

            .bt-2 {
                border-top: 2px solid #000;
            }

            .bt-1 {
                border-top: 1px solid #000;
            }

            .headertxt strong {
                background: #000;
                color: #fff;
                padding: 1px 5px;
                height: 100%;
                display: inline-block;
            }

            .listalpha {
                list-style: lower-alpha;
                padding-left: 20px;
            }

            .listalpha li {
                margin-bottom: 5px;
            }

            .listdecimal {
                list-style: decimal;
                list-style-position: inside;

            }

            .listdecimal li {
                padding-left: 10px;
            }

            .px-2 {
                padding-left: 5px !important;
                padding-right: 5px;
            }

            .pl-0 {
                padding-left: 0px !important;
            }

            .pr-0 {
                padding-right: 0px !important;
            }

            .d-inline {
                display: inline-block;
            }

            .list14 {
                padding-left: 20px;
                margin-top: -15px;

            }

            #print_block li::marker {
                font-size: 11px;
                font-weight: 700;
            }

            .list32 li span {
                width: 130px;
                display: inline-block;
            }

            .textarealist32 {
                position: relative;
                padding-left: 13px;
            }

            .textarealist32:before {
                content: "}";
                font-size: 90px;
                position: absolute;
                left: -6px;
                top: 0;
                height: 135px;
                width: 0px;
                line-height: 86px;
                display: flex;
                transform: scaleX(0.41);
                font-weight: 200;
            }

            .mb-0 {
                margin-bottom: 0 !important;
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
                    page-break-before: avoid !important;
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
                    border: none;
                    border-bottom: 0px solid #333;
                    border-radius: 0px;
                    margin-bottom: 0px;
                    background-color: #f1f4ff !important;
                }

                strong {
                    font-weight: 700;
                }

                .br-0 {
                    border-right: 0px !important;
                }

                .mb-0 {
                    margin-bottom: 0px;
                }

                .showprintonly {
                    display: block;
                }

                small {
                    font-size: 8px !important;
                }

                .topblock p {
                    margin-bottom: 0 !important;
                }

                .topblock h2 {
                    font-size: 30px !important;
                }

                .bt-2 {
                    border-top: 2px solid #000;
                }

                .bt-1 {
                    border-top: 1px solid #000;
                }

                .headertxt strong {
                    background-color: #000 !important;
                    color: #fff !important;
                    padding: 1px 5px;
                    height: 100%;
                    display: inline-block;
                }

                .font-10 * {
                    font-size: 10px !important;
                }

                .list32 li {
                    margin-bottom: 0;
                }

                .textarealist32:before {
                    content: "}";
                    font-size: 56px;
                    position: absolute;
                    left: -3px;
                    top: 0;
                    height: 135px;
                    width: 0px;
                    line-height: 70px;
                    display: flex;
                    transform: scaleX(0.41);
                    font-weight: 200;
                }
                .content{
                    padding: 0;
                }
            }
        </style>

        </html>