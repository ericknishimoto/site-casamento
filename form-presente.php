<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$id = $_GET["id"];
$presente = listaPresente($conexao, $id);
$categorias = listaCategorias($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar presente
        <small>altere os dados do presente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Alterar presente</li>
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
            <p>Alteração realizada com sucesso, confira no seu <a href="index" target="_blank">site</a>.</p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>
      <form action="altera-presente.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">

        <!-- Convidado -->
        <div id="fotos" class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Alterar presente</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">

            <div class="col-md-12 mb-3">

              <div class="row">
                <div class="col-md-12 mb-3">
                  <h4>Nome do produto</h4>
                  <input name="titulo" type="text" class="form-control" placeholder="Nome completo" value="<?= $presente->titulo ?>" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <h4>Preço Médio</h4>
                  <input name="valor" type="number" class="form-control" value="<?= $presente->valor ?>" required placeholder="0" >
                </div>
                <div class="col-md-6">
                  <h4>Categoria</h4>
                  <select name="categoria" class="form-control">
                  <?php foreach($categorias as $categoria) :?>
                  <option value="<?=$categoria['id']?>">
                    <?=$categoria['nome']?>
                   </option>
                   <?php endforeach ?>
                </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <h4>Link</h4>
                  <input name="link" type="text" class="form-control" value="<?= $presente->link ?>" required placeholder="0" >
                </div>
            </div> 

          </div>
        </div>

        <!-- /.row -->
        <div class="row">
          <div class="center-block text-center">
            <input type="submit" class="btn btn-success btn-lg margin-bottom margin" value="Alterar">
          </div>
        </div>
        
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>