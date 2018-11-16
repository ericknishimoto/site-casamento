<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

$motoristas = listaMotoristas($conexao);

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Motoristas
        <small>cadastro de motoristas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cadastros</li>
        <li class="active">Motoristas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php if(isset($_GET["cadastro"]) && $_GET["cadastro"]==true) {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrado</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            O motorista foi cadastrado com sucesso!
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

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
            O motorista foi alterado com sucesso!
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
            O motorista foi excluído com sucesso!
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

<?php if(isset($_GET["erro"]) && $_GET["erro"]==1451) {
  ?>
      <div class="row">
        <div class="col-xs-8">
        <div class="box box-danger  box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">ALERTA</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
              Não foi possível excluir.<br>
              Porque o motorista possui lançamentos associados.
              </div>
              <!-- /.box-body -->
            </div>
        </div>
      </div>
  <?php
    }
  ?>
    <div class="row">
      <div class="col-xs-7 col-md-3">
        <button type="button" class="btn btn-success margin-bottom" data-toggle="modal" data-target="#modal-novo">
            <span>Novo Motorista</span>
          </button>
      </div>
    </div>

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Todos motoristas</h3>
            </div>
            <!-- /.box-header -->
            <!-- TABLE -->
            <div class="box-body ">
              <table id="tabela" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($motoristas as $motorista) {
                ?>

                      <td><?= $motorista['id'] ?></td>
                      <td><?= $motorista['nome'] ?></td>
                      <td><?= $motorista['cpf'] ?></td>
                      <td class="text-center">
                      <a data-url="altera-motorista.php?id=" data-id="<?= $motorista['id'] ?>" data-nome="<?= $motorista['nome'] ?>" data-cpf="<?= $motorista['cpf'] ?>" class="btn btn-default mr-1" data-toggle="modal" data-target="#modal-altera-motorista"><i class="fa fa-pencil"></i></a>
                      <a data-url="exclui-motorista.php?id=" data-id="<?= $motorista['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </td>
                  </tr>

                <?php
                }
                ?>
                </tbody>
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

<!-- MODAL NOVO -->
<div class="modal fade" id="modal-novo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Novo Motorista</h4>
        </div>
        <div class="modal-body">
          <form action="adiciona-motorista.php" id="form" method="POST">
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group mt-1">
                      <label>Nome completo:</label>
                      <input type="text" required name="nome" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>CPF:</label>
                      <input type="text" name="cpf" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="form" class="btn btn-success" value="Submit">Cadastrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

<!-- MODAL ALTERAR -->
<div class="modal fade" id="modal-altera-motorista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Alterar Motorista</h4>
        </div>
        <div class="modal-body">
          <form action="altera-motorista.php" id="form-alterar" method="POST">
            <input type="hidden" name="id" class="altera-id"/>
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group mt-1">
                      <label>Nome completo:</label>
                      <input type="text" required name="nome" class="form-control altera-nome">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>CPF:</label>
                      <input type="text" required name="cpf" class="form-control altera-cpf">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="form-alterar" class="btn btn-success" value="Submit">Alterar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
</div>

<!-- MODAL EXCLUIR-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir Motorista</h4>
      </div>
      <div class="modal-body">
        Deseja realmente exluir este motorista?
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
  $(document).ready(function(){
    let elemento = document.querySelector("#cadastros");
    let subelemento = document.querySelector("#motoristas");
    elemento.classList.add("active");
    subelemento.classList.add("active");
  })
</script>