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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php 
      
      $mensagens_titulo = $_POST["mensagens_titulo"];
      $mensagens_subtitulo = $_POST["mensagens_subtitulo"];

      if($_FILES['mensagens_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['mensagens_imagem']['name'], -4)); //pega a extensao do arquivo
        $mensagens_imagem = md5('mensagens_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['mensagens_imagem']['tmp_name'], $diretorio.$mensagens_imagem); //efetua o upload
      } else {
        $mensagens_imagem = $_POST['mensagens_imagem_anterior'];
      }

      if(alteraMensagens($conexao,
      $mensagens_titulo,
      $mensagens_subtitulo,
      $mensagens_imagem
      ))
      {
        header ("Location: mensagens");
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