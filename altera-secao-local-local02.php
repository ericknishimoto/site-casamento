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

      $local_local02_titulo = $_POST["local_local02_titulo"];
      $local_local02_horario = $_POST["local_local02_horario"];
      $local_local02_texto = $_POST["local_local02_texto"];
      $local_local02_mapa = $_POST["local_local02_mapa"];

      if($_FILES['local_local02_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['local_local02_imagem']['name'], -4)); //pega a extensao do arquivo
        $local_local02_imagem = md5('local_local02_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['local_local02_imagem']['tmp_name'], $diretorio.$local_local02_imagem); //efetua o upload
      } else {
        $local_local02_imagem = $_POST['local_local02_imagem_anterior'];
      }

      if(alteraLocal02($conexao,
        $local_local02_titulo,
        $local_local02_horario,
        $local_local02_texto,
        $local_local02_imagem,
        $local_local02_mapa
      ))
      {
        header ("Location: personalizar-secao-local02?alteracao=true");
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