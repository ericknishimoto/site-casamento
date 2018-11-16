<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco.php';
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
      
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $password1 = md5($_POST["password1"]);
      $password2 = md5($_POST["password2"]);
      $permissao = $_POST["permissao"];

      if ($password1 == $password2) {

        if(insereUsuario($conexao,$nome,$email,$password1,$permissao))
        {
          header ("Location: cadastro-usuarios.php?cadastro=true");
          die();
        }else{ 
        ?>
          <h1>Algo deu errado:</h1>
          <?php
            printf("Connect failed: %s\n", mysqli_error($conexao));
          exit();
        }
      } elseif ($password1 != $password2) {
        header ("Location: cadastro-usuarios.php?senha=true");
      }
      ?>

    </section>
    <!-- /.content -->
  </div>