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
      
      $titulo = $_POST["titulo"];
      $brand = $_POST["brand"];
      $titulo_banner = $_POST["titulo_banner"];
      $data_casamento = $_POST["data_casamento"];
      $section01_titulo = $_POST["section01_titulo"];
      $section01_subtitulo = $_POST["section01_subtitulo"];
      $section01_texto = $_POST["section01_texto"];
      $mensagens_titulo = $_POST["mensagens_titulo"];
      $mensagens_subtitulo = $_POST["mensagens_subtitulo"];
      $fotos_titulo = $_POST["fotos_titulo"];
      $fotos_subtitulo = $_POST["fotos_subtitulo"];

      if($_FILES['cabecalho_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['cabecalho_imagem']['name'], -4)); //pega a extensao do arquivo
        $cabecalho_imagem = md5('cabecalho_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['cabecalho_imagem']['tmp_name'], $diretorio.$cabecalho_imagem); //efetua o upload
      } else {
        $cabecalho_imagem = $_POST['cabecalho_imagem_anterior'];
      }

      if($_FILES['mensagens_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['mensagens_imagem']['name'], -4)); //pega a extensao do arquivo
        $mensagens_imagem = md5('mensagens_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['mensagens_imagem']['tmp_name'], $diretorio.$mensagens_imagem); //efetua o upload
      } else {
        $mensagens_imagem = $_POST['mensagens_imagem_anterior'];
      }

      if(alteraMeusite($conexao,
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