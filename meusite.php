<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);
$mensagens = listaMensagens($conexao);
$fotos = listaFotos($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar Site
        <small>altere os dados do seu site principal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Alterar Site</li>
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
      <form action="altera-meusite.php" method="POST" enctype="multipart/form-data">


        
        <!-- Fotos -->
        <div id="fotos" class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Fotos</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">

            <div class="col-md-6">
              <div class="form-group">
                <h4>Título:</h4>
                <input value="<?= ($infos['fotos_titulo']) ?>" type="text" name="fotos_titulo" class="form-control">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <h4>Subtítulo:</h4>
                <input value="<?= ($infos['fotos_subtitulo']) ?>" type="text" name="fotos_subtitulo" class="form-control">
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
    $('#imgCabecalho').attr('src', e.target.result);
  }

  reader.readAsDataURL(input.files[0]);
}
}

$("#imgCabecalhoInput").change(function() {
readURL(this);
});
</script>

<!-- Active Menu -->
<script>
var menu = document.querySelectorAll('#liConfigIni');
var item = menu[0];
item.classList.add("active");
</script>