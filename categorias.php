<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$categorias = listaCategorias($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Categorias
        <small>adicione e remova as categorias de presentes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Categorias</li>
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
              <h3 class="box-title">Alteração realizada!</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>Alteração realizada com sucesso.</p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

<?php if(isset($_GET["cadastro"]) && $_GET["cadastro"]==true) {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastro realizado!</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>Categoria cadastrada com sucesso.</p>
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
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Categoria excluída!</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>Categoria excluída com sucesso.</p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

<?php if(isset($_GET["erro"]) && $_GET["erro"]=="1451") {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Categoria em uso!</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>Existem produtos cadastrados com esta categoria, remova-os para poder prosseguir.</p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

  <form action="adiciona-categoria.php" method="POST" enctype="multipart/form-data">
    <!-- Cabecalho -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Adionar categoria</h3>
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
            <div class="col-md-12">
                <div class="form-group">
                  <h4>Nome da Categoria:</h4>
                  <input type="text" name="categoria" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="center-block text-center mt-2">
                  <input type="submit" class="btn btn-success btn-lg margin-bottom margin" value="Adicionar">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </form>

        <!-- TABELA -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Lista de Categorias Cadastradas</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">

          
              <div class="col-xs-12">
                <table id="tabela" class="table table-bordered table-striped text-center">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  foreach ($categorias as $categoria) {
                  ?>
                        <td><?= $categoria['nome'] ?></td>
                        </td>
                        <td class="text-center">
                          <a href="exclui-categoria.php?id=<?= $categoria['id'] ?>" class="btn btn-default mr-1"><i class="fa fa-trash-o"></i></a>       
                        </td>
                    </tr>

                  <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
 
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Preview image upload -->
<script>
  function readURL(input) {

if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e) {
    $('#blah').attr('src', e.target.result);
  }

  reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp").change(function() {
readURL(this);
});
</script>

<?php
require_once 'footer.php';
?>