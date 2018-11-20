<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$convidados = listaConvidados($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Presença
        <small>confira a lista de presença</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Lista de Presença</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
        <!-- Presenças -->
        <div id="convidados" class="box">
          <div class="box-header with-border responsive">
            <h3 class="box-title">Lista de confirmações</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">

                    <div class="col-xs-12">
                          <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#ID</th>
                              <th>Nome</th>
                              <th>Confirmação</th>
                              <th>Telefone</th>
                              <th>Email</th>
                              <th>Nº Adultos</th>
                              <th>Nome Adultos</th>
                              <th>Nº Crianças</th>
                            </tr>
                            </thead>
                            <tbody>
            
                            <?php
                            foreach ($convidados as $convidado) {
                            ?>
                                  <td><?= $convidado['id'] ?></td>
                                  <td><?= $convidado['nome'] ?></td>
                                  <td>
                                  <?php
                                    if($convidado['confirmacao'] == 1) {
                                  ?>
                                    <p style="color: green;">Confirmado</p>
                                  <?php
                                    } else {
                                  ?>
                                    <p style="color: red;">Não irá</p>
                                  <?php
                                    }
                                  ?>
                                  </td>
                                  <td><?= $convidado['telefone'] ?></td>
                                  <td><?= $convidado['email'] ?></td>
                                  <td><?= $convidado['adultos'] ?></td>
                                  <td><?= $convidado['nome_adultos'] ?></td>
                                  <td><?= $convidado['criancas'] ?></td>
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>