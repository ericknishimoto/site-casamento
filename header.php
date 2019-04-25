<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BoraCasar | Painel de Administração</title>
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
  <link rel="stylesheet" href="dist/css/tema.css">
  
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
      <b>BC</b>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <b>BoraCasar</b> | Admin
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
          <a href="\" target="_blank">Visualizar Site &nbsp <i class="fa fa-share"></i></a>
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
        <li id="liPainel"><a href="site">
          <i class="fa fa-dashboard"></i> <span>Painel</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="liPerso" class=" treeview">
          <a href="#">
            <i class="fa fa-paint-brush"></i> <span>Personalizar Página</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li id="liPersoBanner"><a href="personalizar-banner-principal"><i class="fa fa-circle-o"></i> Banner Principal</a></li>
            <li id="liPersoSecaoBoasVindas"><a href="personalizar-secao-boas-vindas"><i class="fa fa-circle-o"></i> Seção de Boas Vindas</a></li>
            <li id="liPersoSecaoBoasVindasNoiva"><a href="personalizar-secao-boas-vindas-noiva"> &nbsp &nbsp <i class="fa fa-female"></i>Dados da Noiva</a></li>
            <li id="liPersoSecaoBoasVindasNoivo"><a href="personalizar-secao-boas-vindas-noivo"> &nbsp &nbsp <i class="fa fa-male"></i>Dados do Noivo</a></li>
            <li id="liPersoSecaoMensagens"><a href="personalizar-secao-mensagens"><i class="fa fa-circle-o"></i> Seção de Mensagens</a></li>
            <li id="liPersoSecaoPresenca"><a href="personalizar-secao-presenca"><i class="fa fa-circle-o"></i> Seção de Confirm. de Presença</a></li>
            <li id="liPersoSecaoLocal"><a href="personalizar-secao-local"><i class="fa fa-circle-o"></i> Seção de Local</a></li>
            <li id="liPersoSecaoLocal01"><a href="personalizar-secao-local01"> &nbsp &nbsp <i class="fa fa-map-marker"></i>Definir Local 01</a></li>
            <li id="liPersoSecaoLocal02"><a href="personalizar-secao-local02"> &nbsp &nbsp <i class="fa fa-map-marker"></i>Definir Local 02</a></li>
            <li id="liPersoSecaoPresentes"><a href="personalizar-secao-presentes"><i class="fa fa-circle-o"></i> Seção de Lista de Presentes</a></li>
            <li id="liPersoSecaoFotos"><a href="personalizar-secao-fotos"><i class="fa fa-circle-o"></i> Seção de Fotos</a></li>
          </ul>
        </li>
        <li id="liUpFotos"><a href="fotos">
          <i class="fa fa-photo"></i> <span>Upload de Fotos</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="liMensagens"><a href="mensagens">
          <i class="fa fa-comments"></i> <span>Mensagens Recebidas</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="liPresenca"><a href="presenca">
          <i class="fa fa-list"></i> <span>Lista de Presença</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="liPresentes" class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>Lista de Presentes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li id="liCadProd"><a href="presentes"><i class="fa fa-circle-o"></i> Cadastro de presentes</a></li>
            <li id="liCadCat"><a href="categorias"><i class="fa fa-circle-o"></i> Cadastro de categorias</a></li>
          </ul>
        </li><li id="liTransfer"><a href="transferencias">
          <i class="fa fa-money"></i> <span>Transferência de Valores</span>
          <span class="pull-right-container">
          </span>
        </a></li>
        <li id="liUser"><a href="cadastro-usuarios">
          <i class="fa fa-users"></i> <span>Usuário</span>
          <span class="pull-right-container">
          </span>
        </a></li>
<?php } ?> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
