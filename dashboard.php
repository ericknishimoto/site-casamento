<?php 
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

// $mesAtual = date("m");
// $anoAtual = date("Y");
// $lancamentos = contaLancamentosDashboard($conexao,$mesAtual, $anoAtual);
// $kms = contaKmsDashboard($conexao,$mesAtual, $anoAtual);
// $valTotal = str_replace('.',',', contaValTotalDashboard($conexao,$mesAtual, $anoAtual));
// $valTotalEmp =  str_replace('.',',', contaValTotalEmpDashboard($conexao,$mesAtual, $anoAtual));
// $kms = contaKmsDashboard($conexao,$mesAtual, $anoAtual);
// $lancamentoMotorista = contaMotoristasDashboard($conexao,$mesAtual, $anoAtual);
// $rendaMensal = contaRendaDashboard($conexao, $anoAtual);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard | <?php 	$date = date('F');
                    echo ucfirst(strftime("%B", strtotime( $date )));
                    ?>
        <small>painel de indicadores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- BOXS -->
      <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-edit"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Lançamentos</span>
                  <span class="h1">#</span>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-car"></i></span>
              

              <div class="info-box-content">
                <span class="info-box-text">Total KM</span>
                <span class="h1">#</span>
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
              <span class="info-box-icon bg-aqua"><i class="fa fa-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TOTAL MOTORISTAS</span>
                R$ <span class="h2">#</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-suitcase"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Empresa</span>
                R$ <span class="h2">#</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </div>

      <!-- GRAFICOS -->
      <div class="row">

          <div class="col-md-6">
            <!-- GRAFICO PIE -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Lançamentos x Motoristas | 
                  <?php 	$date = date('F');
                    echo ucfirst(strftime("%B", strtotime( $date )));
                    ?>
                </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="box-body">
                  <div id="donutchart" class="grafico"></div>
              </div>
            </div>
          </div>

          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- GRAFICO COLUMN -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Faturamento Mensal | <?= date('Y') ?></h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                </div>
              </div>
              <div class="box-body">
              <div id="chart_div" class="grafico"></div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>

<!-- GRAFICOS -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- GRAFICO PIE -->
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Nome', 'Total de lançamentos'],
      <?php foreach ($lancamentoMotorista as $lancamento) : ?>
        ['<?= $lancamento['motorista_nome']?>',<?= $lancamento['total']?>],
      <?php endforeach ?>
    ]);

    var options = {

      pieHole: 0.4,
      pieSliceText: 'value',
      legend: { position: 'top', alignment: 'center'},
      colors: ['#3c8dbc', '#00a65a', '#dd4b39', '#f39c12', '#00c0ef']
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>

<!-- GRAFICO BAR-->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {

    var chartDiv = document.getElementById('chart_div');

    var data = google.visualization.arrayToDataTable([
      [' ', 'Total Motoristas', 'Total Empresa'],
      <?php foreach ($rendaMensal as $lancamento) : ?>
        ['<?= $lancamento['data']?>',<?= $lancamento['val_total']?>,<?= $lancamento['val_total_empresa']?>],
      <?php endforeach ?>
    ]);

    var materialOptions = {
      legend: { position: 'top', alignment: 'center'},
      colors: ['#3c8dbc', '#00a65a', '#dd4b39', '#f39c12', '#00c0ef']
    };

    function drawMaterialChart() {
      var materialChart = new google.charts.Bar(chartDiv);
      materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
      
    }

    drawMaterialChart();
  };
</script>

<?php
require_once 'footer.php';
?>

<script>
  $(document).ready(function(){
    let elemento = document.querySelector("#dashboard");
    elemento.classList.add("active");
  })
</script>