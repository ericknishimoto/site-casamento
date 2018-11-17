<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);
$mensagens = listaMensagens($conexao);

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

<!-- //Alert de alteração confirmada -->
<?php if(isset($_GET["confirmacao"]) && $_GET["confirmacao"]==true) {
  ?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Mensagem confirmada</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            A mensagem será incluída no site principal.
            <a href="index#mensagens" target="_blank"> Veja as alterações</a>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
  <?php
  }
?>

<?php if(isset($_GET["confirmacao"]) && $_GET["confirmacao"]=='0') {
  ?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Mensagem pendente</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            A mensagem será removida no site principal.
            <a href="index#mensagens" target="_blank"> Veja as alterações</a>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
  <?php
  }
?>

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

                <div class="col-md-3">
                    <div class="form-group">
                      <p>Texto logo:</p>
                      <input value="<?= ($infos['brand']) ?>" type="text" name="brand" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <p>Título no navegador:</p>
                      <input value="<?= ($infos['titulo']) ?>" type="text" name="titulo" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <p>Imagem cabeçalho:</p>
                      <img src="upload/<?= ($infos['cabecalho_imagem']) ?>" class="thumbnail img-rounded img-md"/>
                      <input value="<?= ($infos['cabecalho_imagem']) ?>" type="file" name="cabecalho_imagem" class="form-control-file">
                      <input value="<?= ($infos['cabecalho_imagem']) ?>" type="hidden" name="cabecalho_imagem_anterior">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                      <p>Título banner</p>
                      <input value="<?= ($infos['titulo_banner']) ?>" type="text" name="titulo_banner" class="form-control">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                      <p>Data do casamento:</p>
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
                    Talvez seja necessário pressionar "CTRl + F5" para atualizar as alterações.
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
                    <p>Título:</p>
                    <input value="<?= ($infos['section01_titulo']) ?>" type="text" name="section01_titulo" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>Subtítulo:</p>
                    <input value="<?= ($infos['section01_subtitulo']) ?>" type="text" name="section01_subtitulo" class="form-control">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <p>Texto:</p>                    
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
        <div class="box collapsed-box mensagens">
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
                <p>Título:</p>
                <input value="<?= ($infos['mensagens_titulo']) ?>" type="text" name="mensagens_titulo" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <p>Subtítulo:</p>
                <input value="<?= ($infos['mensagens_subtitulo']) ?>" type="text" name="mensagens_subtitulo" class="form-control">
              </div>
            </div>
            <div class="box-body mb-1">
                <div class="row">
                    <div class="col-xs-12">
                    <p>Aprovação de mensagens:</p>
                          <table id="tabela" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th>#ID</th>
                              <th>Nome</th>
                              <th>Mensagem</th>
                              <th>Aprovada</th>
                              <th class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
            
                            <?php
                            foreach ($mensagens as $mensagem) {
                            ?>
            
                                  <td><?= $mensagem['id'] ?></td>
                                  <td><?= $mensagem['nome'] ?></td>
                                  <td><?= $mensagem['mensagem'] ?></td>
                                  <td>
                                  <?php
                                    if($mensagem['confirmacao'] == 1) {
                                  ?>
                                    Confirmado
                                  <?php
                                    } else {
                                  ?>
                                    Pendente
                                  <?php
                                    }
                                  ?>
                                  </td>
                                  <td class="text-center">
                                    <a href="confirma-mensagem.php?id=<?= $mensagem['id'] ?>" class="btn btn-success mr-1">Aceitar</a>
                                    <a href="nega-mensagem.php?id=<?= $mensagem['id'] ?>" class="btn btn-default mr-1">Negar</a>
                                  </td>
                              </tr>
            
                            <?php
                            }
                            ?>
                            </tbody>
                          </table>
                  
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

            </div> 
          </div>
        </div>
        
        <!-- Sobre -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Sobre</h3>
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
                      <p>Subtítulo:</p>
                      <input value="<?= ($infos['subtitulo_sobre']) ?>" type="text" name="subtitulo_sobre" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                      <p>Texto:</p>
                      <textarea type="text" name="sobre_texto" class="form-control"><?= ($infos['sobre_texto']) ?></textarea>
                      <script>
                        CKEDITOR.replace( 'sobre_texto' );
                      </script>
                    </div>
                </div>

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
                      <p>Subtítulo:</p>
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
            <a href="dashboard" class="btn btn-default margin-bottom margin">Voltar</a>
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