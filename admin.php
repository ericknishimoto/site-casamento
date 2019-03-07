<?php
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

include("logica-usuario.php");

//REDIRECT DO USUARIO LOGADO
if(isset($_SESSION["usuario_logado"])) {
  header("Location: site");
}
?>

<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administração | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Principal -->
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- Espacamento -->
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
<body class="hold-transition login-page">
    
<div class="login-box">
  <div class="login-logo">
     <b>Admin</b> | Meusite
  </div>


<?php
if(isset($_GET["falhaDeSeguranca"])) {
?>
<div class="row">
        <div class="col-xs-12">
          <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Falha no login!</h3>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                Entre com o e-mail e senha corretos.
                </div>
                <!-- /.box-body -->
            </div>
          </div>
      </div>
<?php
}
?>

<?php if(isset($_GET["logout"]) && $_GET["logout"]==true) {
    ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Deslogado</h3>                  
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                Usuário deslogado com sucesso!
                </div>
                <!-- /.box-body -->
            </div>
          </div>
      </div>
    <?php
      }
  ?>

<?php if(isset($_GET["login"]) && $_GET["login"]==0) {
    ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Erro!</h3>                  
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                Usuário ou senha inválido!
                </div>
                <!-- /.box-body -->
            </div>
          </div>
      </div>
    <?php
      }
  ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
  
 <p class="login-box-msg">Faça login para continuar</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input required class="form-control" type="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required class="form-control" type="password" name="senha" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat mb-1">Login</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
</script>

</body></html>