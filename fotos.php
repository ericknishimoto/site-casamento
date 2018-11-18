<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);
$fotos = listaFotos($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar meu site
        <small>altere os dados do seu site principal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Meu site</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="adiciona-foto.php" method="POST" enctype="multipart/form-data">
        
        <!-- Fotos -->
        <div id="fotos" class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Galeria de Fotos</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">

            <div class="col-md-12">
              <div class="form-group">
                <h4>Inserir foto:</h4>
                <input required type="file" name="nova_foto" class="form-control-file">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" class="btn btn-success margin-bottom" value="Enviar foto">
              </div>
            </div>

            <div class="box-body mb-1">
              <div class="row">
                <div class="col-xs-12">
                <h4>Fotos enviadas:</h4>

                <?php
                foreach ($fotos as $foto) {
                ?>
                <div class="col-xs-4 text-center mt-4">
                  <p>Nº <?= $foto['id'] ?></p>
                  <img src="upload/<?= $foto['nome'] ?>" style="width: 300px;">
                  <div class="col-xs-12 mt-1">
                    <a href="apaga-foto?id=<?= $foto['id'] ?>" class="btn btn-default mr-1">Apagar</a>
                  </div>
                </div>
                <?php
                }
                ?>
        
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div> 
            
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