<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$noivo = contaConvidadosNoivo($conexao);
$noiva = contaConvidadosNoiva($conexao);
$familia = contaConvidadosFamilia($conexao);
$total = listaTotal($conexao);

$convitesNoiva = $total['noiva'];
$convitesNoivo = $total['noivo'];
$convitesFamilia= $total['familia'];

$confirmadoNoiva = $noiva['soma'];
$confirmadoNoivo = $noivo['soma'];
$confirmadoFamilia= $familia['soma'];

$totalGeral = $total['total'];
$totalConfirmado = $confirmadoNoiva + $confirmadoNoivo + $confirmadoFamilia;

$restanteNoiva = $convitesNoiva - $confirmadoNoiva;
$restanteNoivo = $convitesNoivo - $confirmadoNoivo;
$restanteFamilia = $convitesFamilia - $confirmadoFamilia;

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        <small>vejas os dados principais do seu site</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>
   
    <section class="content">
    
    <!-- CARDS -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total de Convites</span>
              <span class="info-box-number">Total: <?= $totalGeral ?></span>
              <span class="info-box-number">Confimados: 
                  <?php if($totalGeral < $totalConfirmado) {
                  ?>  <span style="color: #f56954"><?= $totalConfirmado ?></span>
                  <?php
                  }else{
                  ?>
                    <?= $totalConfirmado ?>
                  <?php
                  }?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="fa fa-female"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Convites da Noiva</span>
              <span class="info-box-number">Total: <?= $convitesNoiva ?></span>
              <span class="info-box-number">Confimados: 
                  <?php if($convitesNoiva < $confirmadoNoiva) {
                  ?>  <span style="color: #f56954"><?= $confirmadoNoiva ?></span>
                  <?php
                  }else{
                  ?>
                    <?= $confirmadoNoiva ?>
                  <?php
                  }?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-male"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Convidados Noivo</span>
              <span class="info-box-number">Total: <?= $convitesNoivo ?></span>
              <span class="info-box-number">Confimados: 
                  <?php if($convitesNoivo < $confirmadoNoivo) {
                  ?>  <span style="color: #f56954"><?= $confirmadoNoivo ?></span>
                  <?php
                  }else{
                  ?>
                    <?= $confirmadoNoivo ?>
                  <?php
                  }?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Família/Padrinhos</span>
              <span class="info-box-number">Total: <?= $convitesFamilia ?></span>
              <span class="info-box-number">Confimados: 
                  <?php if($convitesFamilia < $confirmadoFamilia) {
                  ?>  <span style="color: #f56954"><?= $confirmadoFamilia ?></span>
                  <?php
                  }else{
                  ?>
                    <?= $confirmadoFamilia ?>
                  <?php
                  }?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">

      <div class="col-md-6">
        <!-- Donut chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-pie-chart"></i>

            <h3 class="box-title">Total de Convites Confimados</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body text-center">
           
          <iframe width="600" height="295" src="https://datastudio.google.com/embed/reporting/1KDxSrwvjFhdXUy-Pkc0dyqvSUcNaCQu6/page/6zcn" frameborder="0" style="border:0" allowfullscreen></iframe>

          </div>
          <!-- /.box-body-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-6">
        <!-- Donut chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-pie-chart"></i>

            <h3 class="box-title">Total de Convites Confimados</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div id="total-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><canvas class="flot-overlay" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 71px; left: 315.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 211px; left: 293.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 130px; left: 134.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
          </div>
          <!-- /.box-body-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4">
        <!-- Donut chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-pie-chart"></i>

            <h3 class="box-title">Convites Noiva</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div id="noiva-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><canvas class="flot-overlay" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 71px; left: 315.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 211px; left: 293.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 130px; left: 134.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
          </div>
          <!-- /.box-body-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4">
        <!-- Donut chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-pie-chart"></i>

            <h3 class="box-title">Convites Noivo</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div id="noivo-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><canvas class="flot-overlay" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 71px; left: 315.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 211px; left: 293.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 130px; left: 134.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
          </div>
          <!-- /.box-body-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4">
        <!-- Donut chart -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-pie-chart"></i>

            <h3 class="box-title">Convites Familia</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div id="familia-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><canvas class="flot-overlay" width="514" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 514px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 71px; left: 315.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 211px; left: 293.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 130px; left: 134.602px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
          </div>
          <!-- /.box-body-->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

        </div>
      </div>
    </section>

<?php
require_once 'footer.php';
?>

<!-- FLOT CHARTS -->
<script src="bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="bower_components/Flot/jquery.flot.categories.js"></script>

<!-- Page script -->
<script>
  $(function () {

    /*
     * TOTAL CHART
     * -----------
     */

    var totalData = [
      { label: 'Noivo', data: "<?= $confirmadoNoivo ?>", color: '#00c0ef' },
      { label: 'Noiva', data: "<?= $confirmadoNoiva ?>", color: '#d81b60' },
      { label: 'Família', data: "<?= $confirmadoFamilia ?>", color: '#605ca8' }
    ]
    $.plot('#total-chart', totalData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            // formatter: labelFormatter, ::percent
            formatter: function (label, series) {
                        return '<div style="font-size:12pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + series.data[0][1] + '</div>';

                    },
            threshold: 0.1
          }

        }
      },
      legend: {
        show: true
      }
    })
    /*
     * END TOTAL CHART
     */

     /*
     * NOIVA CHART
     * -----------
     */

    var noivaData = [
      { label: 'Confirmado', data: "<?= $confirmadoNoiva ?>", color: '#d81b60' },
      { label: 'Restantes', data: "<?= $restanteNoiva ?>", color: '#d81b60a6' }
    ]
    $.plot('#noiva-chart', noivaData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            // formatter: labelFormatter, ::percent
            formatter: function (label, series) {
                        return '<div style="font-size:12pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + series.data[0][1] + '</div>';

                    },
            threshold: 0
          }

        }
      },
      legend: {
        show: true
      }
    })
    /*
     * END NOIVA CHART
     */

      /*
     * Noivo CHART
     * -----------
     */

    var noivoData = [
      { label: 'Confirmado', data: "<?= $confirmadoNoivo ?>", color: '#00acd6' },
      { label: 'Restantes', data: "<?= $restanteNoivo ?>", color: '#00c0efb0' }
    ]
    $.plot('#noivo-chart', noivoData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            // formatter: labelFormatter, ::percent
            formatter: function (label, series) {
                        return '<div style="font-size:12pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + series.data[0][1] + '</div>';

                    },
            threshold: 0
          }

        }
      },
      legend: {
        show: true
      }
    })
    /*
     * END Noivo CHART
     */

      /*
     * Familia CHART
     * -----------
     */

    var familiaData = [
      { label: 'Confirmado', data: "<?= $confirmadoFamilia ?>", color: '#605ca8' },
      { label: 'Restantes', data: "<?= $restanteFamilia ?>", color: '#605ca8ad' }
    ]
    $.plot('#familia-chart', familiaData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            // formatter: labelFormatter, ::percent
            formatter: function (label, series) {
                        return '<div style="font-size:12pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + series.data[0][1] + '</div>';

                    },
            threshold: 0
          }

        }
      },
      legend: {
        show: true
      }
    })
    /*
     * END Familia CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>

<!-- Active Menu -->
<script>
var menu = document.querySelectorAll('#liPainel');
var item = menu[0];
item.classList.add("active");
</script>
