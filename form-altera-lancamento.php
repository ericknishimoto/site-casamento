<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

$id = $_GET["id"];
$lancamento = listaLancamento($conexao, $id);
$motoristas = listaMotoristas($conexao);
$empresas = listaEmpresas($conexao);
$produtos = listaProdutos($conexao);
$servicos = listaServicos($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar Ordem #<?= ($lancamento['id']) ?>
        <small>altere os dados desta ordem</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Lançamentos</li>
        <li class="active">Ordem</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="altera-lancamento.php" method="POST">
      <input type="hidden" name="id" value="<?=$lancamento['id']?>" />
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
                        <input value="<?= date("d-m-Y",strtotime(str_replace('/','-',($lancamento['data'])))); ?>" type="text" required name="data" class="form-control pull-right" id="datepicker">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Motorista:</label>
                      <select type="text" required name="motorista" class="form-control">
                        <?php foreach ($motoristas as $motorista) :
                          $valida = $motorista['id'] == $lancamento['motoristas_id'];
                          $selecao = $valida ? "selected='selected'" : "";
                          ?>
                        <option value="<?= $motorista['id'] ?>" <?=$selecao?>>
                        <?= $motorista['nome'] ?>
                        </option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Empresa:</label>
                      <select type="text" required name="empresa" class="form-control">
                        <?php foreach ($empresas as $empresa) :
                            $valida = $empresa['id'] == $lancamento['empresas_id'];
                            $selecao = $valida ? "selected='selected'" : "";
                            ?>
                          <option value="<?= $empresa['id'] ?>" <?=$selecao?>>
                          <?= $empresa['nome'] ?>
                          </option>
                          <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">                      
                    <div class="form-group">
                      <label>Produto:</label>
                      <select type="text" required name="produto" class="form-control">
                        <?php foreach ($produtos as $produto) :
                            $valida = $produto['id'] == $lancamento['produtos_id'];
                            $selecao = $valida ? "selected='selected'" : "";
                            ?>
                          <option value="<?= $produto['id'] ?>" <?=$selecao?>>
                          <?= $produto['nome'] ?>
                          </option>
                          <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Workorder:</label>
                      <input value="<?= ($lancamento['workorder']) ?>" type="text" name="workorder" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Ref. Externa:</label>
                      <input value="<?= ($lancamento['ref_externa']) ?>" type="text" name="ref_externa" class="form-control">
                    </div>
                  </div>

                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                
                <div class="col-md-2">                      
                    <div class="form-group">
                      <label>Serviço:</label>
                      <select type="text" required name="servico" class="form-control">
                        <?php foreach ($servicos as $servico) :
                            $valida = $servico['id'] == $lancamento['servicos_id'];
                            $selecao = $valida ? "selected='selected'" : "";
                            ?>
                          <option value="<?= $servico['id'] ?>" <?=$selecao?>>
                          <?= $servico['nome'] ?>
                          </option>
                          <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Veículo:</label>
                      <input value="<?= $lancamento['veiculo'] ?>" type="text" required  name="veiculo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Placa:</label>
                      <input id="placa"  value="<?= ($lancamento['placa']) ?>" type="text" name="placa" class="form-control placaCarro">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>KM Totais:</label>
                      <input  value="<?= ($lancamento['km_total']) ?>" type="number" required name="km_total" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group input-symbol-real">
                      <label>Pedágio:</label>
                      <!-- Input number com casa decimal -->
                        <input  value="<?= ($lancamento['pedagio']) ?>" type="number" name="pedagio" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Extras:</label>
                      <input  value="<?= $lancamento['extras'] ?>" type="text" name="extras" class="form-control">
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
                      <input  value="<?= $lancamento['origem'] ?>" type="text" required name="origem" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Destino:</label>
                      <input  value="<?= $lancamento['destino'] ?>" type="text" required name="destino" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-8">
                    <div class="form-group input-symbol-real">
                      <label>Total:</label>
                      <input  value="<?= ($lancamento['val_total']) ?>" type="number" required name="val_total" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                  </div>
                  <div class="col-xs-8">
                    <div class="form-group input-symbol-real">
                      <label>Total Empresa:</label>
                      <input  value="<?= ($lancamento['val_total_empresa']) ?>" type="number" required name="val_total_empresa" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Observações</label>
                      <textarea  class="form-control" rows="2" name="obs"><?= $lancamento['obs'] ?></textarea>
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
              <input type="submit" class="btn btn-success margin-bottom margin" value="Alterar">
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