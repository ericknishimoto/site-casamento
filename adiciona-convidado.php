<?php 
require_once 'logica-usuario.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';
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
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php 
      
      $nome = $_POST["nome"];
      $confirmacao = $_POST["paymentMethod"];
      $adultos = $_POST["adultos"];
      $criancas = $_POST["criancas"];
      $email = $_POST["email"];
      $telefone = $_POST["telefone"];
      $nome_adultos = $_POST["nome_adultos"];
      
      if(insereConvidado($conexao, $nome, $confirmacao, $adultos, $criancas, $email, $telefone, $nome_adultos))
      {
        header ("Location: index?presenca=true#presenca");
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