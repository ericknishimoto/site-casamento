<?php
require_once 'logica-usuario.php';
verificaUsuario();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

$id = $_GET["id"];
$lancamentos = listaLancamento($conexao, $id);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ordem #<?= ($lancamentos['id']) ?>
        <small>veja todas as informações desta ordem</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Lançamentos</li>
        <li class="active">Ordem</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="adiciona-lancamento.php" method="POST">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Dados gerais</h3>
              </div>
              <div class="box-body">
                <!-- .row -->
                <div class="row">
                  <div class="col-md-2">
                      <!-- Date -->
                    <div class="form-group">
                      <label>Data:</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input disabled value="<?= date("d-m-Y",strtotime(str_replace('/','-',($lancamentos['data'])))); ?>" type="text" required name="data" class="form-control pull-right" id="datepicker">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Motorista:</label>
                      <select disabled type="text" required name="motorista" class="form-control">
                        <option disabled value="" selected><?= ($lancamentos['motorista_nome']) ?></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Empresa:</label>
                      <select disabled type="text" required name="empresa" class="form-control">
                      <option disabled value="" selected><?= $lancamentos['empresa_nome'] ?></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">                      
                    <div class="form-group">
                      <label>Produto:</label>
                      <select disabled type="text" required name="produto" class="form-control">
                      <option disabled value="" selected><?= $lancamentos['produto_nome'] ?></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Workorder:</label>
                      <input disabled value="<?= ($lancamentos['workorder']) ?>" type="text" name="workorder" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Ref. Externa:</label>
                      <input disabled value="<?= ($lancamentos['ref_externa']) ?>" type="text" name="ref_externa" class="form-control">
                    </div>
                  </div>

                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                
                <div class="col-md-2">                      
                    <div class="form-group">
                      <label>Serviço:</label>
                      <select disabled type="text" required name="servico" class="form-control">
                      <option disabled value="" selected><?= $lancamentos['servico_nome'] ?></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Veículo:</label>
                      <input disabled value="<?= $lancamentos['veiculo'] ?>" type="text" required  name="veiculo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Placa:</label>
                      <input id="placa"  disabled value="<?= ($lancamentos['placa']) ?>" type="text" name="placa" class="form-control placaCarro">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>KM Totais:</label>
                      <input  disabled value="<?= ($lancamentos['km_total']) ?>" type="number" required name="km_total" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group input-symbol-real">
                      <label>Pedágio:</label>
                      <!-- Input number com casa decimal -->
                        <input  disabled value="<?= ($lancamentos['pedagio']) ?>" type="number" required name="pedagio" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Extras:</label>
                      <input  disabled value="<?= $lancamentos['extras'] ?>" type="text" name="extras" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->

                    <div class="box-header with-border">
                      <h3 class="box-title">Endereços</h3>
                    </div>

                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group mt-1">
                      <label>Origem:</label>
                      <input  disabled value="<?= $lancamentos['origem'] ?>" type="text" required name="origem" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Destino:</label>
                      <input  disabled value="<?= $lancamentos['destino'] ?>" type="text" required name="destino" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-8">
                    <div class="form-group input-symbol-real">
                      <label>Total:</label>
                      <input  disabled value="<?= ($lancamentos['val_total']) ?>" type="number" required name="val_total" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="form-group input-symbol-real">
                      <label>Total Empresa:</label>
                      <input  disabled value="<?= ($lancamentos['val_total_empresa']) ?>" type="number" required name="val_total_empresa" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Observações</label>
                      <textarea  disabled class="form-control" rows="2" name="obs"><?= $lancamentos['obs'] ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.row -->

              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="center-block text-center">
              <a href="form-altera-lancamento?id=<?= $lancamentos['id'] ?>" class="btn btn-success margin-bottom margin">Alterar</a>
              <a href="todos-lancamentos" class="btn btn-default margin-bottom margin">Voltar</a>
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

<script>
  $(document).ready(function(){
    let elemento = document.querySelector("#lancamentos");
    elemento.classList.add("active");
  })
</script>