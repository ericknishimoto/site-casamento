<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

$empresas = listaEmpresas($conexao);

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Empresas
        <small>cadastro de empresas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cadastros</li>
        <li class="active">Empresas</li>
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
            A empresa foi cadastrada com sucesso!
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
            A empresa foi alterado com sucesso!
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
            A empresa foi excluído com sucesso!
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
              Porque a empresa possui lançamento associado.
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
            <span>Nova Empresa</span>
          </button>
      </div>
    </div>

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Todas empresas</h3>
            </div>
            <!-- /.box-header -->
            <!-- TABLE -->
            <div class="box-body table-responsive">
              <table id="tabela" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Nome</th>
                  <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($empresas as $empresa) {
                ?>

                      <td><?= $empresa['id'] ?></td>
                      <td><?= $empresa['nome'] ?></td>
                      <td class="text-center">
                        <a data-url="altera-empresa.php?id=" data-id="<?= $empresa['id'] ?>" data-nome="<?= $empresa['nome'] ?>" class="btn btn-default mr-1" data-toggle="modal" data-target="#modal-altera"><i class="fa fa-pencil"></i></a>
                        <a data-url="exclui-empresa.php?id=" data-id="<?= $empresa['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
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
          <h4 class="modal-title" id="myModalLabel">Nova Empresa</h4>
        </div>
        <div class="modal-body">
          <form action="adiciona-empresa.php" id="form" method="POST">
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group mt-1">
                      <label>Nome:</label>
                      <input type="text" required name="nome" class="form-control">
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
<div class="modal fade" id="modal-altera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-success">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Alterar Empresa</h4>
        </div>
        <div class="modal-body">
          <form action="altera-empresa.php" id="form-altera" method="POST">
          <input type="hidden" name="id" class="altera-id"/>
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group mt-1">
                      <label>Nome:</label>
                      <input type="text" required name="nome" class="form-control altera-nome">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="form-altera" class="btn btn-success" value="Submit">Alterar</button>
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
        <h4 class="modal-title" id="myModalLabel">Excluir Empresa</h4>
      </div>
      <div class="modal-body">
        Deseja realmente exluir esta empresa?
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
    let subelemento = document.querySelector("#empresas");
    elemento.classList.add("active");
    subelemento.classList.add("active");
  })
</script>