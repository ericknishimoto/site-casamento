<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administração</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- CKEditor 4 -->
  <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="dist/css/style.css">
  <link rel="stylesheet" href="dist/css/espacamento.css">
  
   <link rel="shortcut icon" type="image/png" href="dist/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="site" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
      <b>AM</b>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <b>Admin</b> | Casamento
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Alternar navegação</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="index" target="_blank">Visualizar Site</i></a>
          </li>
          <li>
            <a href="logout">Sair</i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION["usuario_nome"] ?></p>
       <i class="fa fa-user" style="color: #b8c7ce"></i> <span class="h6" style="color: #b8c7ce"><?= $_SESSION["usuario_permissao"] ?></span>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
<?php if ($_SESSION["usuario_permissao"] == "admin"){?> 
        <li class="header">PRINCIPAL</li>
        <li id="regras"><a href="site">
          <i class="fa fa-home"></i> <span>Home</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="regras"><a href="meusite">
          <i class="fa fa-desktop"></i> <span>Alterar Site</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="regras"><a href="fotos">
          <i class="fa fa-photo"></i> <span>Galeria de Fotos</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="regras"><a href="mensagens">
          <i class="fa fa-comment-o"></i> <span>Mensagens Recebidas</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="regras"><a href="presenca">
          <i class="fa fa-list"></i> <span>Lista de Presença</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="regras" class=" treeview">
          <a href="presentes">
            <i class="fa fa-gift""></i> <span>Presentes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li><a href="presentes"><i class="fa fa-circle-o"></i> Lista de Presentes</a></li>
            <li><a href="categorias"><i class="fa fa-circle-o"></i> Categorias</a></li>
          </ul>
        </li>
        <li id="regras"><a href="cadastro-usuarios">
          <i class="fa fa-users"></i> <span>Usuário</span>
          <span class="pull-right-container">
          </span>
        </a></li>
<?php } ?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
