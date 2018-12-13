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
      
      <th>#ID</th>
      <th>Nome</th>
      <th>Confirmação</th>
      <th>Telefone</th>
      <th>Email</th>
      <th>Nº Adultos</th>
      <th>Nome Adultos</th>
      <th>Nº Crianças</th>
      <th>Ações</th>

      $nome = $_POST["nome"];
      $confirmacao = $_POST["confirmacao"];
      $telefone = $_POST["telefone"];
      $email = $_POST["email"];
      $adultos = $_POST["adultos"];
      $nome_adultos = $_POST["nome_adultos"];
      $criancas = $_POST["criancas"];

      if(alteraPresenca($conexao,
      $titulo,
      $brand,
      $cabecalho_imagem,
      $titulo_banner,
      $data_casamento,
      $section01_titulo,
      $section01_subtitulo,
      $section01_texto,
      $mensagens_titulo,
      $mensagens_subtitulo,
      $mensagens_imagem,
      $mensagens_quantidade,
      $fotos_titulo,
      $fotos_subtitulo
      ))
      {
        header ("Location: site?alteracao=true");
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