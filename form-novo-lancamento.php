<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco.php';

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
        Novo lançamento
        <small>cadastre um novo lançamento</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Lançamentos</li>
        <li class="active">Novo lançamento</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php if(isset($_GET["cadastro"]) && $_GET["cadastro"]==true) {
?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrado</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            Ordem #<?=$_GET["id"] ?> cadastrada com sucesso!
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
<?php
  }
?>

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
                        <input type="text" required name="data" class="form-control pull-right" id="datepicker">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Motorista:</label>
                      <select type="text" required name="motorista" class="form-control">
                        <option value="" disabled selected>Selecionar</option>
                        <?php foreach ($motoristas as $motorista) : ?>
                        <option value="<?= $motorista['id'] ?>"><?= $motorista['nome'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Empresa:</label>
                      <select type="text" required name="empresa" class="form-control">
                        <option value="" disabled selected>Selecionar</option>
                        <?php foreach ($empresas as $empresa) : ?>
                          <option value="<?= $empresa['id'] ?>"><?= $empresa['nome'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">                      
                    <div class="form-group">
                      <label>Produto:</label>
                      <select type="text" required name="produto" class="form-control">
                      <option value="" disabled selected>Selecionar</option>
                        <?php foreach ($produtos as $produto) : ?>
                          <option value="<?= $produto['id'] ?>"><?= $produto['nome'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Workorder:</label>
                      <input type="text" name="workorder" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Ref. Externa:</label>
                      <input type="text" name="ref_externa" class="form-control">
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
                      <option value="" disabled selected>Selecionar</option>
                        <?php foreach ($servicos as $servico) : ?>
                          <option value="<?= $servico['id'] ?>"><?= $servico['nome'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Veículo:</label>
                      <input type="text" required  name="veiculo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Placa:</label>
                      <input id="placa" type="text" name="placa" class="form-control placaCarro">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>KM Totais:</label>
                      <input type="number" required name="km_total" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group input-symbol-real">
                      <label>Pedágio:</label>
                      <!-- Input number com casa decimal -->
                      
                        <input type="number" name="pedagio" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"">
                      
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Extras:</label>
                      <input type="text" name="extras" class="form-control">
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
                      <input type="text" required name="origem" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Destino:</label>
                      <input type="text" required name="destino" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group input-symbol-real">
                      <label>Total:</label>
                      <input type="number" required name="val_total" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group input-symbol-real">
                      <label>Total Empresa:</label>
                      <input type="number" required name="val_total_empresa" class="form-control" name="price" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    </div>
                  </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label>Observações</label>
                      <textarea class="form-control" rows="2" name="obs" placeholder="Digite aqui..."></textarea>
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
              <input type="submit" class="btn btn-success margin-bottom margin" value="Cadastrar">
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