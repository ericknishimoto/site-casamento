<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
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

      $presentes_titulo = $_POST["presentes_titulo"];
      $presentes_subtitulo = $_POST["presentes_subtitulo"];
      $presentes_banco = $_POST["presentes_banco"];
      $presentes_agencia = $_POST["presentes_agencia"];
      $presentes_conta = $_POST["presentes_conta"];

      if(alteraSecaoPresentes(
        $conexao,
        $presentes_titulo,
        $presentes_subtitulo,
        $presentes_banco,
        $presentes_agencia,
        $presentes_conta
        ))
      {
        header ("Location: personalizar-secao-presentes?alteracao=true");
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