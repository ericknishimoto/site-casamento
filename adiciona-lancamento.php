<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php 
      
      $data = $_POST["data"];
      $date_for_database = date("Y-m-d",strtotime(str_replace('/','-',$data))); //Transforma data para formato do BD
      $motorista = $_POST["motorista"];
      $empresa = $_POST["empresa"];
      $produto = $_POST["produto"];
      $workorder = $_POST["workorder"];
      $ref_externa = $_POST["ref_externa"];
      $servico = $_POST["servico"];
      $veiculo = $_POST["veiculo"];
      $placa = $_POST["placa"];
      $km_total = $_POST["km_total"];
      $pedagio = $_POST["pedagio"];
      $pedagio_decimal = number_format($pedagio, 2, ".", ",");
      $extras = $_POST["extras"];
      $origem = $_POST["origem"];
      $destino = $_POST["destino"];
      $val_total = $_POST["val_total"];
      $val_total_empresa = $_POST["val_total_empresa"];
      $obs = $_POST["obs"];
      
      if(insereLancamento($conexao,$date_for_database,$motorista,$empresa,$produto,$servico,$workorder,
      $ref_externa,$veiculo,$placa,$km_total,$pedagio_decimal,$extras,$origem,$destino,$val_total,$val_total_empresa,$obs))
      {
        $id= mysqli_insert_id($conexao);
        header ("Location: form-novo-lancamento?cadastro=true&id=".$id);
        die();
      }else{ 
      ?>
        <h1>Algo deu errado:</h1>
        <?php
          printf("Connect failed: %s\n", mysqli_error($conexao));
        exit();
      }
      ?>

    </section>
    <!-- /.content -->
  </div>