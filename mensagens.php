<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$mensagens = listaMensagens($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mensagens Recebidas
        <small>administre as mensagens recebidas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Mensagens Recebidas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="altera-mensagens.php" method="POST" enctype="multipart/form-data">
      
        <!-- Mensagens -->
        <div id="mensagens" class="box">
          <div class="box-header with-border responsive">
            <h3 class="box-title">Aprovação de mensagens</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                          <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#ID</th>
                              <th>Nome</th>
                              <th>Mensagem</th>
                              <th>Aprovação</th>
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
                                    <p style="color: green;">Confirmado</p>
                                  <?php
                                    } else {
                                  ?>
                                    <p style="color: red;">Pendente</p>
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
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>