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
      
      if($_FILES['nova_foto']['name'] != "") {
        $extensao = strtolower(substr($_FILES['nova_foto']['name'], -4)); //pega a extensao do arquivo
        $nova_foto = md5('nova_foto') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['nova_foto']['tmp_name'], $diretorio.$nova_foto); //efetua o upload
      } else {
        header ("Location: fotos?foto=0");
      }
      
      if(insereFoto($conexao,$nova_foto))
      {
        header ("Location: fotos?foto=true");
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