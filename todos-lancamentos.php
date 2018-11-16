<?php
require_once 'logica-usuario.php';
verificaUsuario();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

if(isset($_GET["motorista"])) {
  $motorista =  ($_GET["motorista"]);
  $lancamentos = listaLancamentosMotorista($conexao, $motorista);
  $motoristas = listaMotoristas($conexao);
} else {
  $lancamentos = listaLancamentos($conexao);
  $motoristas = listaMotoristas($conexao);
}

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lançamentos
        <small>veja todos os lançamentos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lançamentos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php if(isset($_GET["alteracao"]) && $_GET["alteracao"]==true) {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Alterado</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            A ordem #<?=$_GET["id"] ?> foi alterada com sucesso!
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

<?php if(isset($_GET["exclusao"]) && $_GET["exclusao"]==true) {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Excluído</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            A ordem #<?=$_GET["id"] ?> foi excluída com sucesso!
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>
    <div class="row">
<?php if ($_SESSION["usuario_permissao"] == "admin"){?>
      <div class="col-sm-4 col-md-3">
        <a href="form-novo-lancamento" class="btn btn-block btn-success margin-bottom">
          <span>Novo Lançamento</span>
        </a>
      </div>
<?php } ?>
      <div class="col-sm-5 col-md-4">
        <div class="input-group">
        <select onchange="capturaMotorista(this)" id="select_id" type="text" required name="motoristas_nome" class="form-control altera-empresa">
            <option value="todos" disabled selected>Filtra motorista</option>
            <option value="todos">Todos</option>
            <?php foreach ($motoristas as $motorista) : ?>
              <option value="<?= $motorista['nome'] ?>"><?= $motorista['nome'] ?></option>
            <?php endforeach ?>
          </select>
          <span class="input-group-btn">
            <a href="todos-lancamentos?motorista=todos" id="lnk-nome" class="btn btn-default btn-block margin-bottom"><i class="fa  fa-search"></i></a>
          </span>
        </div>

      </div>
    </div>

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Todos lançamentos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped compact text-center">
                <thead>
                <tr>
                  <th>Nº Ordem</th>
                  <th>Data</th>
                  <th>Motorista</th>
                  <th>Empresa</th>
                  <th>Produto</th>
                  <th>Serviço</th>
                  <th>Total</th>
                  <th>Total Emp</th>
                  <th id="thAcoes" class="text-center">Ações</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($lancamentos as $lancamento) {
                $data = date('d-m-Y', strtotime(str_replace('-','/', $lancamento['data'])));
                $data_convertida = str_replace('-','/', $data);
                ?>
                      <td class="text-center">
                        <a href="lancamento?id=<?= $lancamento['id'] ?>">
                          <p class="ordem"><?= $lancamento['id'] ?></p>
                        </a>
                      </td>
                      <td><?= $data_convertida ?></td>
                      <td><?= $lancamento['motorista_nome'] ?></td>
                      <td><?= $lancamento['empresa_nome'] ?></td>
                      <td><?= $lancamento['produto_nome'] ?></td>
                      <td><?= $lancamento['servico_nome'] ?></td>
                      <td>R$ <?= str_replace('.',',', $lancamento['val_total']) ?>
                        <input type="hidden" id="val_total" value="<?= $lancamento['val_total'] ?>" />
                      </td>
                      <td>R$ <?= str_replace('.',',', $lancamento['val_total_empresa']) ?>
                        <input type="hidden" id="val_total_empresa" value="<?= $lancamento['val_total_empresa'] ?>" />
                      </td>
                      <td class="min-width1 text-center">
                        <a href="lancamento?id=<?= $lancamento['id'] ?>" class="btn btn-default"><i class="fa fa-eye"></i></a>
                        <a href="form-altera-lancamento?id=<?= $lancamento['id'] ?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        <a data-url="exclui-lancamento?id=" data-id="<?= $lancamento['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
                  <tfoot style="background-color: lightgrey;">
                    <tr>
                      <th colspan="6" >SOMA TOTAL:</th>
                      <th id="somaValTotal"></th>
                      <th id="somaValTotalEmpresa"></th>
                      <th></th>
                    </tr>
                  </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- MODAL -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir ordem</h4>
      </div>
      <div class="modal-body">
        Deseja realmente exluir este lançamento?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger delete">Excluir</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php
require_once 'footer.php';
?>

<script>
  function capturaMotorista(el) {
    var $lnk = document.getElementById("lnk-nome");
    $lnk.href = $lnk.href.replace(/motorista=(.*)/, 'motorista=') + el.value;
  }
</script>

<!-- ATIVAR NAV -->
<script>
  $(document).ready(function(){
    let elemento = document.querySelector("#lancamentos");
    elemento.classList.add("active");
  })
</script>