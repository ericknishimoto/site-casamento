<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Seção de Boas Vindas
        <small>edite os dados do seu site</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li>Personalizar Página</li>
        <li class="active">Seção de Boas Vindas</li>
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
      <form action="altera-secao-boas-vindas.php" method="POST" enctype="multipart/form-data">

        <!-- Seção de Boas Vindas -->
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Insira as informações da seção de boas vindas:</h3>
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
                    <h4>Título:</h4>
                    <input value="<?= ($infos['section01_titulo']) ?>" type="text" name="section01_titulo" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <h4>Subtítulo:</h4>
                    <input value="<?= ($infos['section01_subtitulo']) ?>" type="text" name="section01_subtitulo" class="form-control">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h4>Texto:</h4>                    
                    <textarea type="text" name="section01_texto" class="form-control"><?= ($infos['section01_texto']) ?></textarea>
                      <script>
                        CKEDITOR.replace( 'section01_texto' );
                      </script>
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
var menu = document.querySelectorAll('#liPerso');
var item = menu[0];
item.classList.add("active");

var submenu = document.querySelectorAll('#liPersoSecaoBoasVindas');
var item = submenu[0];
item.classList.add("active");
</script>