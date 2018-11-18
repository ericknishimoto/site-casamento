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
      <form action="altera-meusite.php" method="POST" enctype="multipart/form-data">

        <!-- Cabecalho -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Cabeçalho</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Imagem do cabeçalho:</h4>
                      <img src="upload/<?= ($infos['cabecalho_imagem']) ?>" class="thumbnail img-rounded img-md"/>
                      <input value="<?= ($infos['cabecalho_imagem']) ?>" type="file" name="cabecalho_imagem" class="form-control-file">
                      <input value="<?= ($infos['cabecalho_imagem']) ?>" type="hidden" name="cabecalho_imagem_anterior">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Texto logo:</h4>
                      <input value="<?= ($infos['brand']) ?>" type="text" name="brand" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Título no navegador:</h4>
                      <input value="<?= ($infos['titulo']) ?>" type="text" name="titulo" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Título principal no banner</h4>
                      <input value="<?= ($infos['titulo_banner']) ?>" type="text" name="titulo_banner" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Data do casamento:</h4>
                      <input value="<?= ($infos['data_casamento']) ?>" type="date" name="data_casamento" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                  <div class="box box-warning box-solid mt-2">
                    <div class="box-header with-border">
                      <h3 class="box-title">Atenção</h3>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    Talvez seja necessário pressionar "CTRl + F5" para ver as atualizações.
                    </div>
                  <!-- /.box-body -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Seção #01 -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Seção #01</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
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

        <!-- Mensagens -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Mensagens</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">

            <div class="col-md-6">
              <div class="form-group">
                <h4>Imagem do fundo:</h4>
                <img src="upload/<?= ($infos['mensagens_imagem']) ?>" class="thumbnail img-rounded img-md"/>
                <input value="<?= ($infos['mensagens_imagem']) ?>" type="file" name="mensagens_imagem" class="form-control-file">
                <input value="<?= ($infos['mensagens_imagem']) ?>" type="hidden" name="mensagens_imagem_anterior">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <h4>Título:</h4>
                <input value="<?= ($infos['mensagens_titulo']) ?>" type="text" name="mensagens_titulo" class="form-control">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <h4>Subtítulo:</h4>
                <input value="<?= ($infos['mensagens_subtitulo']) ?>" type="text" name="mensagens_subtitulo" class="form-control">
              </div>
            </div>

            <d
            </div> 

          </div>
        </div>
        
        <!-- Fotos -->
        <div id="fotos" class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Fotos</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
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

        <!-- Contato -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Contato</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <h4>Subtítulo:</h4>
                      <input value="<?= ($infos['subtitulo_contato']) ?>" type="text" name="subtitulo_contato" class="form-control">
                    </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- /.row -->
        <div class="row">
          <div class="center-block text-center">
            <input type="submit" class="btn btn-success margin-bottom margin" value="Alterar">
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