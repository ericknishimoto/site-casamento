<?php

require_once 'logica-usuario.php';
verificaUsuario();
require_once 'header.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permissao Negada
        <small>sem permissão</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sem permissão</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container text-center">
<br>
          <h3><i class="fa fa-warning text-red"></i> Oops! Você não possui permissão para esta função.</h3>

          <p>
            Verifique com o administrador.
          </p>

      </div>
    </section>
    <!-- /.content -->
  </div>

<?php
require_once 'footer.php';
?>