<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$id = $_GET["id"];
$infos = listaPresenca($conexao, $id);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar presença
        <small>altere os dados da presença deste convidado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Alterar presença</li>
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
      <form action="#.php" method="POST" enctype="multipart/form-data">

        <!-- Convidado -->
        <div id="fotos" class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Alterar presença</h3>
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
                  <h4>Nome do convidado <span class="text-muted">(*)</span></h4>
                  <input name="nome" type="text" class="form-control" placeholder="Nome completo" value="<?= $infos["nome"] ?>" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <h4>Quantos Adultos? <span class="text-muted">(*)</span></h4>
                  <input name="adultos" type="number" class="form-control" value="<?= $infos["adultos"] ?>" required placeholder="0" >
                </div>
                <div class="col-md-6">
                  <h4>Quantas Crianças?</h4>
                  <input type="number" class="form-control" placeholder="0" value="<?= $infos["criancas"] ?>" >
                  <small name="criancas" class="text-muted">Menores de 10 anos.</small>
                </div>
              </div>

              <div class="mb-3">
                <h4 for="email">Email</h4>
                <input name="email" type="email" class="form-control" value="<?= $infos["email"] ?>" placeholder="seu@email.com.br">
              </div>

              <div class="mb-3">
                <h4 for="email">Telefone <span class="text-muted">(*)</span></h4>
                <input name="telefone" type="text" class="form-control" value="<?= $infos["telefone"] ?>" required placeholder="11 9999-9999">
              </div>

              <div class="mb-3">
                <h4>Nome dos Adultos</h4>
                <textarea name="nome_adultos" type="text" rows="4" maxlength="200" class="form-control"
                placeholder="Nome completo, Nome completo, Nome completo..."><?= $infos["nome_adultos"] ?></textarea>
                <span class="text-muted">(*) Campos obrigatórios</span>
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