<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TrampoAdmin</title>
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
      <b>T</b> | A
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <b>Trampo</b> | Admin
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
          <!-- User Account: style can be found in dropdown.less -->
<?php if ($_SESSION["usuario_permissao"] == "admin"){?> 
          <li class="user user-menu">
            <a href="form-novo-lancamento">

              <span>Novo Lançamento</span>
            </a>
          </li>
          <li class="dropdown user user-menu hidden-xs">
            <a href="cadastro-usuarios">
              <img src="dist/img/user.png" class="user-image" alt="User Image">
              <span><?= $_SESSION["usuario_nome"] ?></span>
            </a>
          </li>
<?php } ?>
          <!-- Control Sidebar Toggle Button -->
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
        <li class="header">PRINCIPAL</li>
<?php if ($_SESSION["usuario_permissao"] == "admin"){?> 
        <li id="dashboard">
          <a href="dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
<?php } ?>
        <li id="lancamentos">
          <a href="todos-lancamentos">
            <i class="fa fa-list"></i> <span>Lançamentos</span>
          </a>
        </li>    
<?php if ($_SESSION["usuario_permissao"] == "admin"){?>
        <li id="relatorios">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>Relatórios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">EM DEV</small>
            </span>
          </a>
        </li>
        <li class="header">CONFIGURAÇÕES</li>
        <li class="treeview" id="cadastros">
            <a href="#">
              <i class="fa fa fa-edit"></i> <span>Cadastros Gerais</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="motoristas"><a href="cadastro-motoristas"><i class="fa fa-circle-o"></i> Motoristas</a></li>
              <li id="empresas"><a href="cadastro-empresas"><i class="fa fa-circle-o"></i> Empresas</a></li>
              <li id="produtos"><a href="cadastro-produtos"><i class="fa fa-circle-o"></i> Produtos</a></li>
              <li id="servicos"><a href="cadastro-servicos"><i class="fa fa-circle-o"></i> Serviços</a></li>
            </ul>
          </li>
        <li id="usuarios"><a href="cadastro-usuarios"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
        <li id="regras"><a href="#">
          <i class="fa fa-cogs"></i> <span>Regras de Negócio</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">EM DEV</small>
          </span>
        </a></li>
        <li id="regras"><a href="meusite">
          <i class="fa fa-desktop"></i> <span>Meu site</span>
          <span class="pull-right-container">
          </span>
        </a></li>
<?php } ?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
