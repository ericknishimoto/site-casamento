<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);

//Limpa cache
clearstatcache();

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Definir Local 02
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li>Personalizar Página</li>
        <li>Personalizar Local</li>
        <li class="active">Local 02</li>
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
      <form action="altera-secao-local-local02.php" method="POST" enctype="multipart/form-data">

        <!-- Cabecalho -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Local</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Imagem do quadro:</h4>
                      <img id="imgLocal" src="upload/<?= ($infos['local_local02_imagem']) ?>" class="thumbnail img-rounded img-md"/>
                      <input id="imgLocalInput" value="<?= ($infos['local_local02_imagem']) ?>" type="file" name="local_local02_imagem" class="form-control-file">
                      <input value="<?= ($infos['local_local02_imagem']) ?>" type="hidden" name="local_local02_imagem_anterior">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Titulo:</h4>
                      <input value="<?= ($infos['local_local02_titulo']) ?>" type="text" name="local_local02_titulo" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Subtitulo:</h4>
                      <input value="<?= ($infos['local_local02_subtitulo']) ?>" type="text" name="local_local02_subtitulo" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="box box-warning box-solid mt-2">
                    <div class="box-header with-border">
                      <h3 class="box-title">Atenção</h3>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <p>Fotos com mais de 2mb não são carregadas, use este aplicativo <a href="https://tinypng.com/" target="_blank">TinyPNG</a> para diminuí-la e tente novamente.</p>
                    </div>
                  <!-- /.box-body -->
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Texto:</h4>                    
                    <textarea type="text" name="local_local02_texto" class="form-control"><?= ($infos['local_local02_texto']) ?></textarea>                     
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Cole o mapa aqui:</h4>
                    <p>(Adicione o mapa compartilhado do Google maps <a href="img/maps.gif" target="_blank">Veja como pegar o endereço</a>)</p>
                    <textarea type="text" name="local_local02_mapa" class="form-control"><?= ($infos['local_local02_mapa']) ?></textarea>
                  </div>
                </div>

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

<!-- Preview image upload -->
<script>
  function readURL(input) {

if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e) {
    $('#imgLocal').attr('src', e.target.result);
  }

  reader.readAsDataURL(input.files[0]);
}
}

$("#imgLocalInput").change(function() {
readURL(this);
});
</script>

<!-- Active Menu -->
<script>
var menu = document.querySelectorAll('#liPerso');
var item = menu[0];
item.classList.add("active");

var submenu = document.querySelectorAll('#liPersoSecaoLocal02');
var item = submenu[0];
item.classList.add("active");
</script>