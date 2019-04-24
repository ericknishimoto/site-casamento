<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$transferencias = listaTransferencias($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transferências Recebidas
        <small>administre as transferências recebidas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Transferências de Valores</li>
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
            <p>Alteração realizada com sucesso, confira no seu <a href="index#mensagens" target="_blank">site</a>.</p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>
      
        <!-- Mensagens -->
        <div id="mensagens" class="box">
          <div class="box-header with-border responsive">
            <h3 class="box-title">Controle de transferências</h3>
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
                              <th>Data</th>
                              <th>Nome</th>
                              <th>Valor</th>
                              <th>Operação</th>
                              <th>Observação</th>
                              <th>Aprovação</th>
                              <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
            
                            <?php
                            foreach ($transferencias as $transferencia) {
                            ?>
            
                                  <td><?= $transferencia['id'] ?></td>
                                  <td><?= date('d/m/Y', strtotime( $transferencia['data'])) ?></td>
                                  <td><?= $transferencia['nome'] ?></td>
                                  <td>R$ <?= number_format( $transferencia['valor'], 2, ',', '.' ) ?></td>
                                  <td><?= $transferencia['operacao'] ?></td>
                                  <td><?= $transferencia['obs'] ?></td>
                                  <td>
                                  <?php
                                    if($transferencia['confirmacao'] == 1) {
                                  ?>
                                    <p style="color: #00a65a; ">Confirmado</p>
                                  <?php
                                    } else {
                                  ?>
                                    <p style="color: #f56954;">Pendente</p>
                                  <?php
                                    }
                                  ?>
                                  </td>
                                  <td class="text-center">
                                    <a href="confirma-transferencia.php?id=<?= $transferencia['id'] ?>" class="btn btn-default mr-1 fa  fa-thumbs-o-up"></a>
                                    <a href="nega-transferencia.php?id=<?= $transferencia['id'] ?>" class="btn btn-default mr-1 fa fa-thumbs-o-down"></a>   
                                    <a data-url="exclui-transferencia?id=" data-id="<?= $transferencia['id'] ?>" class="btn btn-danger" data-toggle="modal" data-target="#modal-excluir">
                                      <i class="fa fa-trash-o"></i>
                                    </a>
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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>

<!-- MODAL EXCLUIR -->
<div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-danger">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Excluir</h4>
        </div>
        <div class="modal-body">
         <h4>Tem certeza que deseja excluir o item?</h4>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-danger delete">Excluir</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
</div>

<!-- Active Menu -->
<script>
var menu = document.querySelectorAll('#liTransfer');
var item = menu[0];
item.classList.add("active");
</script>