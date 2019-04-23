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

      $noivo_nome = $_POST["noivo_nome"];
      $noivo_desc = $_POST["noivo_desc"];

      if($_FILES['noivo_img']['name'] != "") {
        $extensao = strtolower(substr($_FILES['noivo_img']['name'], -4)); //pega a extensao do arquivo
        $noivo_img = md5('noivo_img') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['noivo_img']['tmp_name'], $diretorio.$noivo_img); //efetua o upload
      } else {
        $noivo_img = $_POST['noivo_img_anterior'];
      }

      if(alteraBoasVindasNoivo($conexao,
        $noivo_nome,
        $noivo_desc,
        $noivo_img
      ))
      {
        header ("Location: personalizar-secao-boas-vindas-noivo?alteracao=true");
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