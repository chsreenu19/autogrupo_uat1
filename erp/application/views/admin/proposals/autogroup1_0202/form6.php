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
                        form6
                    </span>

                </h4>
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="print_block" id="print_block">
                            <div class="mb-5">
                                <div class="row ffblock">
                                    <!-- <div class="col-sm-12 col-xs-12 text-center">
                                        </div> -->
                                    <div class=" col-xs-3 align-self-end text-center">
                                        &nbsp;
                                    </div>
                                    <div class=" col-xs-6 align-self-end text-center">
                                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDABQODxIPDRQSEBIXFRQYHjIhHhwcHj0sLiQySUBMS0dARkVQWnNiUFVtVkVGZIhlbXd7gYKBTmCNl4x9lnN+gXz/2wBDARUXFx4aHjshITt8U0ZTfHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHz/wAARCAChAzEDASIAAhEBAxEB/8QAGwABAAEFAQAAAAAAAAAAAAAAAAYBAgQFBwP/xABNEAABAwMBAwYICwUIAQMFAAABAAIDBAURIQYSMRNBUWFxkSIyNXJzgaGxFBUjMzRCUlSTwdEWU2Ky4SQ2Q0R0g5LwgiUmo1WiwuLx/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AJmiIgIiICIiAiKmUFUXm6VredeTqj7KDITKxDO89S8nzhvjyBvaUGw3h0qm8OkLTyXOljPhTj1BY0l/pGcHZ9YQSHeHSq5HSoq7ailbzZ/8lb+1dN0f/d/RBLMoowzaimPPj/yWRHtHTP8A8THtQb9VWshu9PJjdkafYsxlVG/GDxQe6K0OB4FVQVREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQFQkDiV5Szhg04rFfK554oMmScDQLHdK53ArxllZEwvkOGjnWguO0bIvAg4+1Bv5ZmRN3pHgDrK1NXtFTQAhmHO6ytPDSXW8Hec4xRfacStxR7N0kGHTAzv4kv1CDVSX6vq3EUrJXA9AwPYrW2671R3ppRGDzOOqlccEcQAjjawdDRhHNQRtuz2cGeqkeecZ0V4sdGz/AA97tK3pYvFzEGoNrpG8IGdy83UFOP8AAZ3LavYvB7EGrfQ0/wC6Z3LxdQQfuwtm9i8XtQa00gZ8297OxyujqK+mOYpy7qKynNXk4IMym2lnhdioY4dY4KQ0V9gqWg72esYyoe5oI1A7l48luOBicWO6W6IOlxyskGWODh1K/KgVBe56V7WzuOPtBSygukVUGhxAeeHQUGyRUBVUBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERBQrGnqA3wWlJ5uLW+srBLs5QX5Ljk65Wvr7vBRtIJBcB06LBvF6bAzkoCXOOmiw7bs9NcS2qrnFkZOjOchB4b9wvs+7AHCMnV5OAFIbZs9S0ID3tE032njOOwLaU9PHTxtjhaGtAxgL2wgs3caDghavQDKpp0oPIhULSvbToTKDHMTj9VY8payTky4b/RlbDKidaT+08XRvIN42lfIMjGFR1uefrtWZB8z6yr0Grda5Twc1Y8lqqPqhp/8AJbziFRBG5LZVD/BPqIKw5qeWI4kjc3tCl5zzKxxOMaEdBQQsjrVhCldRR083zkTT2aLWVFlaQTTy4/hcPzQaMtCup6h9K7wSSw8W59y9qmknptZY8DpByFiO150ExtV4a5jWzPyw8H9HUt8Doua0tT8Hk8L5s8R0KW2i47rm00x8E/Nu/JBvkVAVVAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREFF5VEvJs6yvUnC18smXPkJ0boAg8pnY8HnPHC0V6ujaaJ0UZy86HCyLpXClp3Oz4TuHUtTYbe64VBrao70bT4LSOJQZFhsrpnitr272RmNh96lY4LybgAAAAcAAvUYAweKC8JvBee8Tw4KyWeOBhdK8NA6edB7E5VpIAyTgDnKjtw2ojhJZA3LuHWsGKK93fJDnwwnXeeSgk090pac+HKD5uq86K8U9fOYYc7wGT2LW0+y0eAa2pknPQCQFuKK30lG4mnp2RuIxvAa96DKUTrP70RecpYVE63+9EPnoJRB8z6yrKyR0VLI9vEBXwfNesryuP0KXzUEQp6y6VW++F4Ia7GrivcVl5j8bXscrbB8xN55WxegxG36vi0lgc71ZXvFtPGTuzxuYezCseFjyRsd4zQR1hBuYrrSVGA2QZ617lwcMgg9hUYNNF9Vu6eluitY6rpzmGoeW58V5KDf1cwghc9wGMYwedRQ1HLzyFrAG55l73K4T1MbYnsLTwODov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o6lkreg6FYctsr4Sd+neQOcahTSe2005y6Pdd9ph3T7FjOtlTH9HrHbo+rIM+1BCHlzDhwLT1hW8p1qZubcmHD6Vkw6WuA9hXg+pDTia3uaRx+T3vbhBES/rVhf15Ut+G0PPAwdsP9ENfRN4BjeyPH5IIiN5xw1pJ7FkMttdLjcpnkdJ0HtUlNzgHivPqaV5OubD4vKOPUwoNXFs/UnWeWOIdGclZcdmoosOe6SU9BxhZDZKqYhsNFK4ngXDd969G2+6yu+jsiHPvPBPsQUBjiwIImRD+FuCvGaoYzwpHj1rYR7OyPINVWOLc6tjbj2rY0tooqU5jga52nhP8I95QRyBtVW/Q4S4ZwXu0AW2orBG0iSueZ5Psf4fct4AAmEFkcbImBsbGtaOAAxhX4VUQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAVCiIKIiIA4LEqfH9SIgUvOssIiCvMqFEQVREQVREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERB//2Q==" />
                                        <p class="headtext">GARANTIA LIMITADA</p>
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        <h4 class="headmiddle">DEAL# 41257</h4>
                                        <h4 class="headmiddle">STK # DJW158378</h4>
                                        <h4 class="headmiddle">CUST# 7876199361</h4>
                                        <h4 class="headmiddle">FORM# 73430 NSK-FI</h4>
                                    </div>

                                </div>
                            </div>
                            <div class="bodycontent">
                                <div class="row" style="align-items: end;">
                                    <div class="col-xs-6">
                                        <div class="flexdiv">
                                            <p> Marca <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Modelo <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Núm. de Serie <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Millaje <input type="text" class="inputbox fr1i1" /></p>
                                        </div>

                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="flexdiv">
                                            <p> Año <input type="text" class="inputbox fr1i1" /></p>
                                            <p> Tablilla <input type="text" class="inputbox fr1i1" /></p>
                                            <p> No. de Marbete <input type="text" class="inputbox fr1i1" /></p>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <ol>
                                    <li>
                                        <p>TERMINOS GENERALES DE LA GARANTIA LIMITADA</p>
                                        <p>
                                            AUTO GRUPO (el "Vendedor") provee una garantía limitada ("Garantía Limitada") a todo vehículo de motor usado que usted adquiera de nuestros concesionarios. La Garantía Limitada asumirá el costo de adquisición de cualquier componente o pieza cubierta (según establecida en el Articulo II de la presente) y el costo de la mano de obra requerida para reemplazar el componente o la pieza defectuosa.</p>
                                        <p> El componente o las piezas a ser adquiridas conforme a la presente Garantia Limitada no necesariamente tendrá que ser nuevas u originales y el Vendedor podrá, a su entera y única discreción, reemplazar cualesquier componente o pieza(s) cubierta(s) por piezas de reemplazo no originales (Piezas de Reemplazo) o por componentes o piezas reconstruidas (Piezas Remanufacturadas) y/o usadas.
                                        </p>
                                    </li>
                                    <li>
                                        <p>DURACION O TÉRMINO DE LA GARANTIA:</p>
                                        <p>La GARANTIA LIMITADA provista por el Vendedor a los vehículos de motor usados adquiridos en nuestros concesionarios tiene una duración de tiempo limitada. La duración de la garantía será determinada a base del millaje reflejado por el odómetro del vehículo al momento de la compraventa:</p>
                                        <ul class="listalpha">
                                            <li>Menos de 36,000 millas al momento de la venta- Cuatro (4) meses o cuatro mil (4,000) millas, lo que ocurra primero;</li>
                                            <li>Mas de 36,000, pero menos de 50,000 millas- Tres (3) meses o tres mil (3,000) millas, lo que ocurra primero;</li>
                                            <li>Mas de 50,000 millas basta 100,000 millas - Dos (2) meses o dos mil (2,000) millas, lo que ocurra primero.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <p>COMPONENTES O PIEZAS CUBIERTAS POR LA GARANΤΙΑ:</p>
                                        <p>El Vendedor garantiza a nuestros Clientes que todo vehículo de motor usado que sea adquirido de nuestras facilidades estará, al momento de la compraventa, libre de desperfectos mecánicos en los componentes o piezas enumerados a continuación (las "Piezas Cubiertas") y, de no estarlo, se compromete a reparar el componente o pieza defectuosa sin costo al Cliente:</p>
                                        <ul class="listalpha">
                                            <li>
                                                <strong>MOTOR -</strong> Incluye piezas internas del motor incluyendo bomba de agua, bomba de gasolina (mecánica o eléctrica), múltiple de admisión y escape, bloque y volanta. En motores rotativos incluye las cajas de los rotores.
                                            </li>
                                            <li>
                                                <strong>TRANSMISION -</strong> Incluye caja de transmisión, todas las piezas internas de la transmisión y el convertidor de torsión.
                                            </li>
                                            <li>
                                                <strong>EJE IMPULSOR-</strong> Caja de tracción trasera y/o delantera, según aplique, con sus partes internas, ejes impulsores, eje de cardan y uniones universales.
                                            </li>
                                        </ul>
                                    </li>
                                    <div class="showprintonly">
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                        <div class="col-xs-12"> &nbsp;</div>
                                    </div>
                                    <li>
                                        <p>PROCEDIMIENTO PARA RECLAMAR LA GARANTIA DEL VENDEDOR:</p>
                                        <p>El cliente tendrá, como requisito indispensable para reclamar la garantía provista por el Vendedor, llevar el vehículo de motor al lugar donde adquirió el mismo para la celebración de una inspección. El Vendedor inspeccionara el Vehículo y determinara si la condición presentada por el mismo está o no cubierta por la presente Garantía Limitada. En la eventualidad de que la condición presentada por el Vehículo estuviese cubierta por la presente Garantía Limitada, el Vendedor reparara el Vehículo o le proveerá al Cliente el nombre y la dirección del centro de servicio donde deberá llevar el vehiculo para recibir el correspondiente servicio de reparación. El Cliente asumirá la responsabilidad y el costo, si alguno, de transportar el Vehículo al lugar donde adquirió el mismo y/o al centro de servicio designado por el Vendedor. Sera requisito indispensable para poder reclamar reparación con cargo a la presente Garantía Limitada que el Cliente produzca, previo requerimiento al efecto, evidencia de haber efectuado todos los servicios de mantenimiento requeridos para el adecuado y óptimo funcionamiento del Vehículo.</p>
                                        <p>Siempre y cuando el Cliente solicite, dentro del correspondiente periodo de la Garantía Limitada, la reparación de una Pieza Cubierta a un vehículo de motor usado, que no sea utilizado para la explotación comercial y/o la transportación colectiva, adquirido del Vendedor, y la reparación exceda un periodo mayor de cinco (5) días calendario, excluyendo el domingo; el Vendedor le proveerá al Cliente un vehículo de motor sustituto para su transportación personal. El vehículo de motor sustituto tendrá una transmisión similar (automática o manual) al vehículo dejado en reparación.</p>
                                    </li>
                                    <li>
                                        <p>OTRAS EXCLUSIONES A LA CUBIERTA DE LA GARANTIA LIMITADA</p>
                                        <ol class="desimallist">
                                            <li>
                                                La Garantía Limitada otorgadas por El Vendedor NO incluye el costo de la(s) pieza(s) y/o de mano de obra asociado con el reemplazo de algunas pieza(s) de uso y desgaste (Pieza de Uso y Desgaste). Será Pieza de Uso y Desgaste toda aquella(s) cuyo deterioro en funcionamiento sea una consecuencia normal del uso del vehículo y cuyo reemplazo sea requerido por motivo del desgaste normal de alguna pieza. Ejemplo de piezas de uso y desgaste incluyen, pero no se limitan a, las llantas, pastillas de frenos, bushings, puntos del motor, etc.
                                            </li>
                                            <li>Se excluye, además, de la cobertura de la Garantía Limitada el costo de la(s) pieza(s) o mano de obra asociada con la realización del mantenimiento requerido para el adecuado y óptimo funcionamiento del vehículo de motor.</li>
                                            <li>
                                                La cubierta provista por la Garantía Limitada NO incluye el costo de la(s) pieza(s) o mano de obra requerida para reparar alguna condición que surja como consecuencia, directa o indirecta, de:
                                                <ul class="listsmallalpha">
                                                    <li>Falta de mantenimiento del vehículo de motor;</li>
                                                    <li>Abuso del vehículo de motor;</li>
                                                    <li>Negligencia o descuido del vehículo de motor.</li>
                                                    <li>Accidentes de transito:</li>
                                                    <li>Intervenciones de terceras personas no autorizadas por El Vendedor, sean estos mecánicos licenciados o no;</li>
                                                    <li>Factores ambientales (como salitre, sal y/o contaminación ambiental) o naturales;</li>
                                                    <li>La explotación comercial del vehículo de motor,</li>
                                                    <li>La alteración o desviación de algún componente del Vehículo de Motor de los parámetros establecidos por el manufacturero del mismo;</li>
                                                    <li>La utilización del vehículo de motor en competencias automovilisticas, independientemente que sean celebras en las vias de rodaje publica o en pista habilitadas;</li>
                                                    <li>Las condiciones de las vías de rodaje públicas o privadas;</li>
                                                </ul>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <p>El Cliente: </p>
                                            <input type="text" class="inputbox tr1i1" />
                                            <p>(Customer Sign)</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">&nbsp;</div>
                                    <div class="col-xs-5">
                                        <div class="tr1p3">
                                            <p>Fecha:</p>
                                            <input type="text" class="inputbox tr1i1" />
                                            <p class="text-center">(Current Date)</p>
                                        </div>
                                    </div>
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
        padding: 0 10px 10px;
    }

    .tr1p3 {
        text-align: center;
    }

    .tr1p3 input {
        width: 100%;
    }

    #print_block li {
        padding: 0 50px 10px;

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

        #wrapper {
            margin-left: 0;
            margin: 0 0;
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
        .listsmallalpha li{
            padding-bottom: 5px;
        }
        .desimallist li{
            padding-left: 10px;
        }


    }
</style>

</html>