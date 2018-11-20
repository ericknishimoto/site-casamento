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
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Galeria de Fotos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<?php if(isset($_GET["status"]) && $_GET["status"]=="erro") {
?>
  <div class="row">
    <div class="col-xs-6">
      <div class="box box-danger box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Foto muito grande ou arquivo inválido!</h3>                  
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <p>Se a foto tiver mais que 2mb, use este aplicativo <a href="https://tinypng.com/" target="_blank">TinyPNG</a> para diminuí-la e tente novamente.</p>
        </div>
        <!-- /.box-body -->
        </div>
      </div>
  </div>
<?php
  }
?>

<?php if(isset($_GET["status"]) && $_GET["status"]=="ok") {
?>
  <div class="row">
    <div class="col-xs-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Foto enviada!</h3>                  
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <p>Foto enviada com sucesso, ela já esta disponível no seu <a href="index#fotos" target="_blank">site</a>.</p>
        </div>
        <!-- /.box-body -->
        </div>
      </div>
  </div>
<?php
  }
?>

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
          <div class="box-body">

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
                if ($fotos != null) {
                  
                  foreach ($fotos as $foto) {
                    ?>
                    <div class="col-xs-3 col-md-3 col-lg-3 text-center">
                      <img src="upload/<?= $foto['nome'] ?>"  class="img-thumbnail thumbnail img-rounded img-md2 mt-4">
                      <div class="col-xs-12">
                        <a href="apaga-foto?id=<?= $foto['id'] ?>" class="btn btn-danger fa fa-trash-o"></a>
                      </div>
                    </div>
                    <?php
                    }

                } else {
                  ?> 
                    <h4 class="text-muted mt-4">Nenhuma foto encontrada...</h4>
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