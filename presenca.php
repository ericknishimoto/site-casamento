<?php
require_once ('logica-usuario.php');
verificaUsuario(); verificaAdmin();
require_once ('header.php');
require_once ('conecta.php');
require_once ('banco-meusite.php');

$convidados = listaConvidados($conexao);
$total = listaTotal($conexao);

$totalNoiva = $total['noiva'];
$totalNoivo = $total['noivo'];
$totalFamilia= $total['familia'];

$totalGeral = $total['total'];
$totalUtilizado = $totalNoiva + $totalNoivo + $totalFamilia;
$totalRestante = $totalGeral - $totalUtilizado;

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Presença
        <small>confira a lista de presença</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Lista de Presença</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php if(isset($_GET["exclusao"]) && $_GET["exclusao"]==true) {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Convidado excluído!</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>Convidado excluído com sucesso.</p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

      <?php if(isset($_GET["presenca"]) && $_GET["presenca"]==true && ($totalUtilizado == $totalGeral)) {
  ?>
      <div class="row">
        <div class="col-xs-8">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Total atualizado!</h3>
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
                <!-- /.box-tools -->
            </div>
              <!-- /.box-header -->
            <div class="box-body">
              <p>Total atualizado com sucesso.</p>
            </div>
              <!-- /.box-body -->
          </div>
        </div>
      </div>
  <?php
    }
  ?>

<?php if(isset($_GET["presenca"]) && $_GET["presenca"]==true && ($totalUtilizado < $totalGeral)) {
  ?>
      <div class="row">
        <div class="col-xs-8">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Total atualizado!</h3>
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
                <!-- /.box-tools -->
            </div>
              <!-- /.box-header -->
            <div class="box-body">
              <p>Existem <b><?= $totalRestante ?> convites</b> não relacionados.</p>
            </div>
              <!-- /.box-body -->
          </div>
        </div>
      </div>
  <?php
    }
  ?>

<?php if($totalUtilizado > $totalGeral) {
  ?>
      <div class="row">
        <div class="col-xs-8">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ATENÇÃO!!!</h3>
              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
                <!-- /.box-tools -->
            </div>
              <!-- /.box-header -->
            <div class="box-body">
              <p>A soma dos convites <b>ultrapassam o total informado</b>. Corrija os valores divergentes.</p>
            </div>
              <!-- /.box-body -->
          </div>
        </div>
      </div>
  <?php
    }
  ?>

<form action="altera-total-convidados.php" method="POST" enctype="multipart/form-data">
    <!-- Cabecalho -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Adionar total de convidados</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
        <!-- /. tools -->
      </div>

      <!-- Formulário -->
      <div class="box-body pad" style="">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <h4>Total de convidados:</h4>
                  <input type="number" value="<?= $total['total']?>" name="total" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <h4>Total para Noiva:</h4>
                  <input type="number" value="<?= $total['noiva']?>" name="noiva" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <h4>Total para Noivo:</h4>
                  <input type="number" value="<?= $total['noivo']?>" name="noivo" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <h4>Total para Família/Padrinhos:</h4>
                  <input type="number" value="<?= $total['familia']?>" name="familia" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="center-block text-center mt-2">
                  <input type="submit" class="btn btn-success btn-lg margin-bottom margin" value="Atualizar">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </form>

      <!-- Presenças -->
      <div id="convidados" class="box">
        <div class="box-header with-border responsive">
          <h3 class="box-title">Lista de confirmações</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <table id="tabela" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Confirmação</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Categoria</th>
                <th>Ações</th>
              </tr>
              </thead>
              <tbody>

              <?php
              foreach ($convidados as $convidado) {
              ?>
                    <td><?= $convidado->id ?></td>
                    <td><?= $convidado->nome ?></td>
                    <td>
                    <?php
                      if($convidado->confirmacao == 1) {
                    ?>
                      <p style="color: green;">Confirmado</p>
                    <?php
                      } else {
                    ?>
                      <p style="color: red;">Não irá</p>
                    <?php
                      }
                    ?>
                    </td>
                    <td><?= $convidado->telefone ?></td>
                    <td><?= $convidado->email ?></td>                    
                    <td>
                      <?php if($convidado->categoria == '') {
                      ?> <p style="color: red;">Verificar</p>
                      <?php  
                      }else{
                      ?>  <?= $convidado->categoria ?>
                      <?php 
                      }
                      ?>
                    </td>
                    <td class="text-center">
                      <a href="confirma-presenca.php?id=<?= $convidado->id ?>" class="btn btn-default mr-1 fa  fa-thumbs-o-up"></a>
                      <a href="nega-presenca.php?id=<?= $convidado->id ?>" class="btn btn-default mr-1 fa fa-thumbs-o-down"></a>
                      <a href="form-presenca.php?id=<?= $convidado->id ?>" class="btn btn-default mr-1"><i class="fa fa-edit"></i></a> 
                      <a href="exclui-presenca.php?id=<?= $convidado->id ?>" class="btn btn-default mr-1"><i class="fa fa-trash-o"></i></a>          
                    </td>
                </tr>

              <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.row -->
      </div>    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once ('footer.php');
?>

<!-- Active Menu -->
<script>
var menu = document.querySelectorAll('#liPresenca');
var item = menu[0];
item.classList.add("active");
</script>