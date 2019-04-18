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

      if($_FILES['cabecalho_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['cabecalho_imagem']['name'], -4)); //pega a extensao do arquivo
        $cabecalho_imagem = md5('cabecalho_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['cabecalho_imagem']['tmp_name'], $diretorio.$cabecalho_imagem); //efetua o upload
      } else {
        $cabecalho_imagem = $_POST['cabecalho_imagem_anterior'];
      }

      if(alteraBannerPrincipal($conexao,
        $titulo,
        $brand,
        $cabecalho_imagem,
        $titulo_banner,
        $data_casamento
        ))
      {
        header ("Location: personalizar-banner-principal?alteracao=true");
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