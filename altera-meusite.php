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
      
      $titulo = $_POST["titulo"];
      $brand = $_POST["brand"];
      $titulo_banner = $_POST["titulo_banner"];
      $data_casamento = $_POST["data_casamento"];
      $section01_titulo = $_POST["section01_titulo"];
      $section01_subtitulo = $_POST["section01_subtitulo"];
      $section01_texto = $_POST["section01_texto"];
      $section02_texto = $_POST["section02_texto"];

      if($_FILES['cabecalho_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['cabecalho_imagem']['name'], -4)); //pega a extensao do arquivo
        $cabecalho_imagem = md5('cabecalho_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['cabecalho_imagem']['tmp_name'], $diretorio.$cabecalho_imagem); //efetua o upload
      } else {
        $cabecalho_imagem = $_POST['cabecalho_imagem_anterior'];
      }

      if($_FILES['trabalho1_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['trabalho1_imagem']['name'], -4)); //pega a extensao do arquivo
        $imagem1 = md5('trabalho1_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['trabalho1_imagem']['tmp_name'], $diretorio.$imagem1); //efetua o upload
      } else {
        $imagem1 = $_POST['trabalho1_imagem_anterior'];
      }

      if($_FILES['trabalho2_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['trabalho2_imagem']['name'], -4)); //pega a extensao do arquivo
        $imagem2 = md5('trabalho2_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['trabalho2_imagem']['tmp_name'], $diretorio.$imagem2); //efetua o upload
      } else {
        $imagem2 = $_POST['trabalho2_imagem_anterior'];
      }

      if($_FILES['trabalho3_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['trabalho3_imagem']['name'], -4)); //pega a extensao do arquivo
        $imagem3 = md5('trabalho3_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['trabalho3_imagem']['tmp_name'], $diretorio.$imagem3); //efetua o upload
      } else {
        $imagem3 = $_POST['trabalho3_imagem_anterior'];
      }

      if(alteraMeusite($conexao,
      $titulo,
      $brand,
      $cabecalho_imagem,
      $titulo_banner,
      $data_casamento,
      $section01_titulo,
      $section01_subtitulo,
      $section01_texto
      ))
      {
        header ("Location: meusite?alteracao=true");
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