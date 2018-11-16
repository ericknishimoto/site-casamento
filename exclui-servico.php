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
      
      $id = $_GET["id"];
      
      if(excluiServico($conexao,$id))
      {
        header ("Location: cadastro-servicos.php?exclusao=true");
        die();
      } elseif(mysqli_errno($conexao)==1451) {
        header ("Location: cadastro-servicos.php?erro=1451");
      } else { 
      ?>
        <h1>Algo deu errado:</h1>
        <?php
          printf("Connect failed: %s\n", mysqli_errno($conexao));
        exit();
      }
      ?>

    </section>
    <!-- /.content -->
  </div>