<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css">
  .mvdar_mian {
    /* margin: 10px auto; */
  }

  input.form-control {
    border-radius: 0;
    box-shadow: unset;
    border-color: #000;
  }

  .left_block,
  .rrver2 {
    border: 4px solid #000;
    padding: 15px;
  }

  .mvdar_mian input.sm_block {
    width: 35px;
    letter-spacing: 1.5px;
    display: inline-block;
    margin: 0;
    padding: 0;
    text-align: center;
  }

  .left_block label,
  .right_block label {
    font-weight: normal;
  }

  .line {
    background: #000 !important;
    width: 100%;
    height: 3px;
    margin: 10px 0;
    border-radius: 10px;
  }

  .sub_heading h3 {
    margin: 0;
    margin-bottom: 15px;
  }

  .w-100 {
    width: 100%;
  }

  .mvdarr2c2 .col-xs-2,
  .mvdarr2c3 div,
  .mvdarr2c4 div,
  .mvdarr2c5>div,
  .mvdarr2c6>div {
    padding: 0;
    margin-right: 10px;
  }

  .mvdarr2c2 .mvdarr2c2b3,
  .mvdarr2c2 .mvdarr2c2b4,
  .mvdarr2c2 .mvdarr2c2b5,
  .mvdarr2c2 .mvdarr2c2b6 {
    width: 12%;
  }

  .mvdarr2c2 .mvdarr2c2b1 {
    width: 20%;
  }

  .mvdarr2c2 .mvdarr2c2b2 {
    width: 17%;
  }

  /* .mvdarr2c2 .col-xs-2 input, .mvdarr2c4 input, .mvdarr2c5 input, .mvdarr3 [class*="mvdarr3c1"] input,
    .mvdarr3c4b2 input.sm_block{
      max-width: 25px;
      max-height: 25px;
    }*/
  /*.mvdarr2c3 input{
      max-width: 25px;
      max-height: 25px;
    }*/
    .mvdarr2c4b2 input.sm_block {
      min-width: 50px;
    }

  /*.mvdarr2c3b1 input{
      width: 100% !important;
      max-width: 100% !important;
    }*/
    .mvdarr2c3 {
      text-align: center;
    }

    .mvdarr2c5b2 {
      width: 29%;
    }

    .mvdarr2c5b3 [class *="mvdarr2c5b2_sub"] {
      padding: 0;
      margin-right: 3px;
      display: inline;
    }

    .mvdarr2c5>div.mvdarr2c5b3 {
      padding-left: 15px;
      width: 33.5%;
      margin-right: 0;
    }

    .mvdarr2c5b2_sub1 {
      width: 44.5%;
    }

    .mvdarr2c5b2_sub2,
    .mvdarr2c5b2_sub3 {
      width: 22%
    }

    .mvdarr2c6 .mvdarr2c6b2 {
      margin-right: 0;
    }

    .mvdarr2c6b3 {
      margin-right: 0 !important;
      width: 41.5%;
    }

    [class *="mvdarr2"] {
      margin-bottom: 5px;
    }

    .mvdarr3c1b1 {
      padding-right: 0;
      text-align: center;
    }

    .mvdarr3c3b3,
    .mvdarr3c3b4,
    .mvdarr3c4b1,
    .mvdarr3c4b2 {
      padding-right: 0;
    }

    .mvdarr3.border {
      border: 1px solid #000;
      border-width: 1px 0px 0px 0px;
    }

    .mvdarr2c5 .mvdarr3c5.mvdarr3c5b1 input {
      max-width: 100%;
      width: 100%;
    }

    .rrver2 h3,
    .rrver2 h4 {
      margin-bottom: 25px;
      margin-top: 25px;
    }

    .rrver2c1 {
      margin-bottom: 36.5px;
    }

    .rrver1c1 {
      margin-bottom: 35px;
    }

    .rrver1c1 p {
      font-weight: 600;

    }

    [class*="input-"] {
      background: url("<?php echo base_url() . 'assets/images/rve/Rectangle-193.png' ?>");
      height: 40px;
      background-size: 40px;
      border: none;
      font-family: monospace;
      padding-left: 9px;
      letter-spacing: 18px;
      font-size: 22px;
      background-repeat-x: repeat;
      background-repeat-y: no-repeat;
      padding-top: 0;
      padding-bottom: 0;
    }

    [class*="input-sm"] {
      height: 30px;
      background-size: 30px 29px;
      letter-spacing: 18px;
      font-size: 22px;
      padding: 0;
      padding-left: 9px;
    }

    .input-14 {
      width: calc(40px * 14);
    }

    .input-11 {
      width: calc(30px * 11);
    }

    .input-10 {
      width: calc(30px * 10);
    }

    .input-9 {
      width: calc(30px * 9);
    }

    .input-8 {
      width: calc(30px * 8);
    }

    .input-7 {
      width: calc(30px * 7);
    }

    .input-6 {
      width: calc(30px * 6);
    }

    .input-5 {
      width: calc(30px * 5);
    }

    .input-4 {
      width: calc(30px * 4);
    }

    .input-3 {
      width: calc(30px * 3);
    }

    .input-2 {
      width: calc(30px * 2);
    }

    .input-1 {
      width: calc(35px * 1);
      text-align: center;
      background-size: 35px 30px;
      height: 30px;
      margin: auto;
    }

    .mx-auto {
      margin: 0 auto;
    }

    .mvdarr1c1 input.input-6[class *="input-md"] {
      width: calc(40px * 6);
    }

    .mvdarr2c3b2 {
      width: 4.3em;
      text-align: center;
    }

    .px-0 {
      padding-left: 0;
      padding-right: 0;
    }

    .Vtype_heading {
      writing-mode: vertical-lr;
      height: 151px;
      text-align: center;
      transform: rotate(180deg);
    }

    .mvdarr3 {
      padding-top: 10px;
    }

    .mvdarr2c6.mvdarr2c5.ps-code>div.mvdarr2c5b3 {
      width: 38.5%;
      margin-right: 5px;
    }

    @media print {

      body * {
        font-size: 7.5pt;
        line-height: 8.5pt;
      }

      body input[class *="input-"] {
        background: url('http://localhost/clients/madina/dms/assets/images/rve/Rectangle-194.png');
      }

      body label {
        font-size: 7pt !important;
        line-height: 16px;

      }


      @page {
        size: auto;
        margin: 0;
      }

      .left_block,
      .rrver2 {
        border: 2px solid #000;
        padding: 7px;
      }

      a[href]:after {
        content: none !important;
      }

      img[src]:after {
        content: none !important;
      }

      #section-to-print,
      #section-to-print * {
        visibility: hidden;
      }

      #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
      }

      .mvdar_mian>.row>.col-xs-8 {
        padding-right: 0;
      }

      body .mvdar_mian input[class *="input-"] {
        background: url("<?php echo base_url() . 'assets/images/rve/Rectangle-193.png' ?>") !important;
      /* height: 40px;
    background-size: 40px ; */
    height: 20px;
    background-size: 20px 20px !important;
    letter-spacing: 10px;
    font-size: 16px;
    border: none;
    font-family: monospace;
    padding-left: 9px;
    letter-spacing: 10px;
    padding-top: 0;
    padding-bottom: 0;
  }

  input.form-control {
    max-height: 20px;
    border: 0;
    border-bottom: 1px solid #000;


  }

  .sub_heading h3 {
    margin: 0;
    margin-bottom: 7px;
  }

  [class *="mvdarr2"] {
    margin-bottom: 0;
  }

  body input[class *="input-sm"] {
    height: 20px;
    background-size: 20px 20px !important;
    letter-spacing: 10px;
    font-size: 16px;
    padding: 0;
    padding-left: 9px;
  }

  body input.input-14,
  .mvdarr2c1full label {
    width: calc(20px * 14) !important;
  }

  .input-11 {
    width: calc(20px * 11) !important;
  }

  .input-10 {
    width: calc(20px * 10) !important;
  }

  .input-9 {
    width: calc(20px * 9) !important;
  }

  .input-8 {
    width: calc(20px * 8) !important;
  }

  .input-7 {
    width: calc(20px * 7) !important;
  }

  .input-6,
  .mvdarr1c1 label {
    width: calc(20px * 6) !important;
  }

  .input-5 {
    width: calc(20px * 5) !important;
  }

  body input.input-4 {
    width: calc(20px * 4) !important;
  }

  .input-3 {
    width: calc(20px * 3) !important;
  }

  .input-2 {
    width: calc(20px * 2) !important;
  }

  body input.input-1[class *="input-sm"] {
    width: calc(35px * 1) !important;
    text-align: center;
    background-size: 35px 20px !important;
    height: 20px;
    margin: auto;
  }

  .mvdarr2c2b1 {
    max-width: calc(30px * 4);
  }

  .mx-auto {
    margin: 0 auto;
  }

  .mvdarr2c3b2 {
    width: 4.3em;
    text-align: center;
  }

  .mvdarr2c4b2 {
    width: 6em;
  }

  .mvdarr2c5b3 [class *="mvdarr2c5b2_sub"] {
    padding: 0;
    margin-right: 3px;
    display: inline;
  }

  .col-xs-12.mvdarr2c5.mvdarr2c6 .mvdarr2c5b3 {
    margin-right: 3px;
  }

  .mvdarr2c6b3 {
    width: 34%;
  }

  .px-0 {
    padding-left: 0;
    padding-right: 0;
  }

  .mvdarr3c1b3 {
    padding-left: 0;
  }

  .mvdarr3c1b2 {
    padding-right: 0;
    padding-left: 0;
  }

  .mvdarr3c2b4 label,
  .mvdarr2c5b1 label {
    white-space: nowrap;
  }

  .rrver2c1 {
    margin-bottom: 18.5px;
  }

  footer {
    display: none;
  }

  .rrver2 .line {
    width: 90%;
    margin-left: 5% !important;
    text-align: center;
  }

  .dtop_text {
    margin-bottom: 2px;
  }

  .Vtype_heading {
    writing-mode: vertical-lr;
    height: 100px;
    text-align: center;
    transform: rotate(180deg);
    font-weight: 600;
  }

  .mvdarr2c6.mvdarr2c5.ps-code>div.mvdarr2c5b3 {
    margin-right: 10px;
  }

  .rrver2 h4 {
    margin-bottom: 20px;
    margin-top: 20px;
  }
  .rrver2 h3 {
    margin-bottom: 10px;
    margin-top: 15px;
  }
}
</style>
<div id="proposal-wrapper">

  <div class="mtop15 preview-top-wrapper">

    <div class="top" data-sticky data-sticky-class="preview-sticky-header">
      <div class="container preview-sticky-container">
        <div class="row" id="section-to-print">
          <div class="col-xs-12">
            <div class="pull-left">
              <!-- <h4 style="color:#882c87;" class="bold no-mtop proposal-html-number"><span>Description</span> -->
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
  <div class="mvdar_mian">
    <div class="row">
      <div class="col-xs-8">
        <p class="dtop_text">DTOP-776</p>
        <div class="left_block">
          <div class="row mvdarr1">
            <div class="col-xs-12 mvdarr1 sub_heading">
              <h3>Concesionario de Vehículos de Motor, o Representante Autorizado</h3>
            </div>
            <div class="col-xs-5 mvdarr1c1 text-center">
              <input type="text" class="form-control input-6 input-md" maxlength="6">
              <label class="text-center col-xs-9">Licencia</label>
            </div>
            <div class="col-xs-7 mvdarr1c2">
              <input type="text" name="" class="form-control">
              <label class="text-center col-xs-12">Nombre Negocio</label>
            </div>
          </div>
          <div class="line"></div>
          <div class="row mvdarr2">
            <div class="col-xs-12  sub_heading">
              <h3>Información del Vehículo</h3>
            </div>
            <div class="col-xs-12 mvdarr2c1full">
              <input type="text" class="form-control input-14" maxlength="14">
              <label class="text-center col-xs-9">VIN <small>(Número de Serie)</small></label>
            </div>
            <div class="col-xs-12 mvdarr2c2">
              <div class="col-xs-2 mvdarr2c1">
                <input type="text" class=" form-control input-4 input-sm" maxlength="4">
                <label class="w-100 text-center"> Año</label>
              </div>
              <div class="col-xs-2 mvdarr2c2b2">
                <input type="text" class=" form-control input-4 input-sm" maxlength="4">
                <label class="w-100 text-center"> Marca</label>
              </div>
              <div class="col-xs-2 mvdarr2c2b3">
                <input type="text" class="input-3 input-sm form-control" maxlength="3" name="keyword_6">
                <label class="w-100 text-center"> Modelo</label>
              </div>
              <div class="col-xs-2 mvdarr2c2b4">
                <input type="text" class="input-3 input-sm form-control" maxlength="1" name="keyword_6">
                <label class="w-100 text-center"> Submodelo</label>
              </div>
              <div class="col-xs-2 mvdarr2c2b5">
                <input type="text" class="input-3 input-sm form-control" maxlength="1" name="keyword_6">
                <label class="w-100 text-center"> Color</label>
              </div>
              <div class="col-xs-2 mvdarr2c2b6">
                <input type="text" class="input-3 input-sm form-control" maxlength="1" name="keyword_6">
                <label class="w-100 text-center"> Color 2</label>
              </div>

            </div>
            <div class="col-xs-12 mvdarr2c3">
              <div class="col-xs-1 mvdarr2c3b1">
                <input type="text" class="input-1 input-sm form-control" maxlength="1" name="keyword_6">
                <label class="w-100 text-center"> Puertas</label>
              </div>
              <div class="col-xs-2 mvdarr2c3b2">
                <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                <label class="w-100 text-center"> Cilindros</label>
              </div>
              <div class="col-xs-2 mvdarr2c3b3">
                <input type="text" class="input-3 input-sm form-control" maxlength="3" name="keyword_6">
                <label class="w-100 text-center"> Caballos</label>
              </div>
              <div class="col-xs-3 mvdarr2c3b4">
                <input type="text" class="input-5 input-sm form-control mx-auto" maxlength="5" name="keyword_6">
                <label class="w-100 text-center"> Peso Descargado</label>
              </div>
              <div class="col-xs-3 mvdarr2c3b5">
                <input type="text" class="input-5 input-sm form-control mx-auto" maxlength="5" name="keyword_6">
                <label class="w-100 text-center"> Capacidad Máxima</label>
              </div>
            </div>
            <div class="col-xs-12 mvdarr2c4">
              <div class="col-xs-3 mvdarr2c4b1">
                <input type="text" class="input-6 input-sm form-control" maxlength="6" name="keyword_6">
                <label class="col-xs-10 text-center"> Odómetro</label>
              </div>
              <div class="col-xs-2 mvdarr2c4b2 text-center">
                <input type="text" class="input-1 input-sm form-control" maxlength="1" name="keyword_6">
                <label class="w-100 text-center"> Título</label>
              </div>
              <div class="col-xs-4 mvdarr2c4b3">
                <label class="w-100 text-left"> T-Título</label>
                <label class="w-100 text-left"> C-Certificado<br> de origen</label>
              </div>
              <div class="col-xs-2 mvdarr2c4b4 text-center">
                <input type="text" class="input-2 input-sm mx-auto form-control" maxlength="2" name="keyword_6">
                <label class="w-100 text-center"> Estado de Procedencia</label>
              </div>

            </div>
            <div class="col-xs-12 mvdarr2c5">
              <div class="col-xs-3 mvdarr2c5b1">
                <div>&nbsp;</div>
                <input type="text" class="input-6 input-sm form-control" maxlength="6" name="keyword_6">
                <label class="col-xs-10 text-center"> Precio Contributivo</label>
              </div>
              <div class="col-xs-4 mvdarr2c5b2">
                <div>&nbsp;</div>
                <input type="text" class="input-7 input-sm form-control" maxlength="7" name="keyword_6">
                <label class="col-xs-10 text-center">Arbitrios Pagados</label>
              </div>
              <div class="col-xs-5 mvdarr2c5b3">
                <div class="row">
                  <div class="mvdarr2c5b2_sub1 col-xs-5">
                    <div class=" text-center"> Año</div>
                    <input type="text" class="input-4 input-sm form-control" maxlength="4" name="keyword_6">
                  </div>
                  <div class="mvdarr2c5b2_sub2 col-xs-4">
                    <div class=" text-center"> Mes</div>
                    <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                  </div>
                  <div class="mvdarr2c5b2_sub3 col-xs-3">
                    <div class=" text-center"> Día</div>
                    <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                  </div>
                </div>
                <label class="col-xs-12 text-center"> Fecha de Pago</label>
              </div>
            </div>
            <div class="col-xs-12 mvdarr2c5 mvdarr2c6">
              <div class="col-xs-5 mvdarr2c5b3">
                <div class="row">
                  <div class="mvdarr2c5b2_sub1 col-xs-5">
                    <div class=" text-center"> Año</div>
                    <input type="text" class="input-4 input-sm form-control" maxlength="4" name="keyword_6">
                  </div>
                  <div class="mvdarr2c5b2_sub2 col-xs-4">
                    <div class=" text-center"> Mes</div>
                    <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                  </div>
                  <div class="mvdarr2c5b2_sub3 col-xs-3">
                    <div class=" text-center"> Día</div>
                    <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                  </div>
                </div>
                <label class="col-xs-12 text-center"> Fecha de Venta</label>
              </div>
              <div class="col-xs-3 mvdarr2c6b2">
                <div>&nbsp;</div>
                <input type="text" class="input-6 input-sm form-control" maxlength="6" name="keyword_6">
                <label class="col-xs-12 text-center"> Casa Financiadora</label>
              </div>
              <div class="col-xs-4 mvdarr2c6b3">
                <div>&nbsp;</div>
                <input type="text" class="input-9 input-sm form-control" maxlength="9" name="keyword_6">
                <label class="col-xs-12 text-center"> Número de Contrato</label>
              </div>
            </div>
          </div>
          <div class="line"></div>
          <div class="row mvdarr3">
            <div class="col-xs-12  sub_heading">
              <h3>Información del Dueño</h3>
            </div>
            <div class="col-xs-3 mvdarr3c1b1 text-center">
              <div class="text-center">Guy</div>
              <input type="text" class="input-4 mx-auto input-sm form-control" maxlength="4" name="keyword_6">
              <label class="col-xs-12 text-center px-0">Identificación <small>(ssid, fein)</small></label>
            </div>
            <div class="col-xs-5 mvdarr3c1b2">
              <div>&nbsp;</div>
              <input type="text" class="input-10 input-sm form-control" maxlength="10" name="keyword_6">
              <label class="col-xs-12 text-center">Número de Seguro Social</label>
            </div>
            <div class="col-xs-4 mvdarr3c1b3">
              <div>&nbsp;</div>
              <input type="text" class="input-8 input-sm form-control" maxlength="8" name="keyword_6">
              <label class="col-xs-12 text-center">Licencia de Conducir </label>
            </div>
            <div class="col-xs-3 mvdarr3c2 mvdarr3c2b1">
              <input type="text" class="form-control" name="keyword_6">
              <label class="col-xs-12 text-center">Primer Nombre</label>
            </div>
            <div class="col-xs-3 mvdarr3c2 mvdarr3c2b2">
              <input type="text" class="form-control" name="keyword_6">
              <label class="col-xs-12 text-center">Inicial</label>
            </div>
            <div class="col-xs-3 mvdarr3c2 mvdarr3c2b3">
              <input type="text" class="form-control" name="keyword_6">
              <label class="col-xs-12 text-center">Apellido Paterno</label>
            </div>
            <div class="col-xs-3 mvdarr3c2 mvdarr3c2b4">
              <input type="text" class="form-control" name="keyword_6">
              <label class="col-xs-12 text-center">Apellido Materno</label>
            </div>
          </div>
          <div class="mvdarr3 border">
            <div class="row">
              <div class="col-xs-1">
                <h4 class="block_heading Vtype_heading">
                  Residencial
                </h4>
              </div>
              <div class="row col-xs-11">
                <div class="col-xs-12 mvdarr3c3 mvdarr3c3b2">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Urbanización, Barrio, Condominio</label>
                </div>
                <div class="col-xs-4 mvdarr3c3 mvdarr3c3b3">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Número de Casa</label>
                </div>
                <div class="col-xs-5 mvdarr3c3 mvdarr3c3b4">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Calle</label>
                </div>
                <div class="col-xs-3 mvdarr3c3 mvdarr3c3b5">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Buzón</label>
                </div>
                <div class="col-xs-8 mvdarr3c4 mvdarr3c4b1">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Municipio</label>
                </div>
                <div class="col-xs-4 mvdarr3c4 mvdarr3c4b2 text-center">
                  <input type="text" class="input-6 input-sm form-control" maxlength="6" name="keyword_6">
                  <label class="col-xs-10 text-center">Código Postal</label>
                </div>
              </div>
            </div>
          </div>
          <div class="mvdarr3 border">
            <div class="row">
              <div class="col-xs-1">
                <h4 class="block_heading Vtype_heading">
                  Postal
                </h4>
              </div>
              <div class="row col-xs-11">
                <div class="col-xs-12 mvdarr3c3 mvdarr3c3b2">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Apartado</label>
                </div>
                <div class="col-xs-9 mvdarr3c3 mvdarr3c3b3">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Municipio</label>
                </div>

                <div class="col-xs-3 mvdarr3c3 mvdarr3c3b5">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Buzón</label>
                </div>
                <div class="col-xs-8 mvdarr3c4 mvdarr3c4b1">
                  <input type="text" class="form-control" name="keyword_6">
                  <label class="w-100 text-left">Ciudad</label>
                </div>
                <div class="col-xs-4 mvdarr3c4 mvdarr3c4b2 text-center">
                  <input type="text" class="input-6 input-sm form-control" maxlength="6" name="keyword_6">
                  <label class="col-xs-10 text-center">Código Postal</label>
                </div>
                <div class="col-xs-12 mvdarr2c5 ps-code mvdarr2c6">
                  <div class="col-xs-5 mvdarr2c5b3">
                    <div class="row">
                      <div class="mvdarr2c5b2_sub1 col-xs-5">
                        <div class=" text-center"> Año</div>
                        <input type="text" class="input-4 input-sm form-control" maxlength="4" name="keyword_6">
                      </div>
                      <div class="mvdarr2c5b2_sub2 col-xs-4">
                        <div class=" text-center"> Mes</div>
                        <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                      </div>
                      <div class="mvdarr2c5b2_sub3 col-xs-3">
                        <div class=" text-center"> Día</div>
                        <input type="text" class="input-2 input-sm form-control" maxlength="2" name="keyword_6">
                      </div>
                    </div>
                    <label class="col-xs-12 text-center"> Fecha de Nacimiento</label>
                  </div>
                  <div class="col-xs-2 mvdarr3c5 mvdarr3c5b1">
                    <div>&nbsp;</div>
                    <input type="text" class="form-control w-100" name="keyword_6">
                    <label class="w-100 text-center">Género</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="line"></div>
          <div class="mvdarr4">
            <div class="row">
              <p class="col-xs-12">Certifico que los datos presentados son fieles y exactos.</p>
              <div class="col-xs-9">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-left">Concesionario de Vehículos, Representante Autorizado, o Dueño <small> letra de molde)</small></label>
              </div>
              <div class="col-xs-3">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-left">Fecha</label>
              </div>
              <div class="col-xs-12">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-left">Firma</label>
              </div>
            </div>
          </div>
        </div><!--  --left block--- -->
        <p>Rev. 3ene2013</p>
      </div>
      <div class="col-xs-4">
        <div class="right_block">
          <div class="row rrver1">
            <div class="col-xs-12 rrver1c1 text-center">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJt7XVeg4gYBnW1Yoc5OuybCLeboKeg4LMdw&usqp=CAU" width="100">
            </div>
            <div class="col-xs-12 rrver1c1 text-center">
              <p>Estado Libre Asociado de Puerto Rico</p>
              <p>Department of Transportation and Works </p>
              <p>y Obras Públicas</p>
              <p>Directoría de Servicios al Conductor</p>
            </div>
          </div>
          <div class="rrver2">
            <div class="row">
              <div class="col-xs-12 text-center sub_heading">
                <h3 class="">SOLICITUD PARA REGISTRACIÓN DE VEHÍCULOS DE MOTOR</h3>
              </div>
              <div class="line col-xs-12"></div>
              <div class="col-xs-12">
                <h4 class="text-center">USO OFICIAL SOLAMENTE</h4>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b1">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Fecha Recibido</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b2">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Número de Registro</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b3">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Número de Título</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b4">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Número de Tablilla</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b5">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Número de Marbete</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b6">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Gravámenes</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b7">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Clasificación del Vehículo</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b8">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Firma del Funcionario Evaluador</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b9">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Fecha de Revisión Manual</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b10">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Firma del Operador</label>
              </div>
              <div class="col-xs-12 rrver2c1 rrver2c1b11">
                <input type="text" class="form-control" name="keyword_6">
                <label class="w-100 text-center">Fecha Procesado en Máquina</label>
              </div>


            </div>
          </div>
        </div><!--  --right block--- -->
        <p class="text-right"><a href="www.dtop.gov.pr">www.dtop.gov.pr</a></p>
      </div>
    </div> <!--  --main-row--- -->
  </div> <!--  --mvdar_mian--- -->
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