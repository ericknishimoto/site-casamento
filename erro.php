<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Algo deu errado!</title>
    <link rel="shortcut icon" type="image/png" href="dist/img/favicon.ico"/>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->

    <link href="css/agency-<?= $infos['tema'] ?>.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="text-uppercase">
           <h2>Houve algum problema!</h2>
          </div>
          <div class="intro-lead-in">Tente novamente dentro de alguns minutos ou fale com o administrador.</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="index">Tentar novamente</a>
        </div>
      </div>
  </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    <!-- Altera BG -->
    <script>
      let bg = document.querySelector(".masthead");
      bg.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0),rgba(0, 0, 0, .6)),url('upload/erro.jpeg')";
      bg.style.backgroundRepeat = "no-repeat";
      bg.style.backgroundAttachment = "scroll";
      bg.style.backgroundPosition = "center center";
      bg.style.backgroundSize = "cover";
    </script>

     <!-- typed.js -->
    <script src="js/typed.js"></script>
    <script>
     $('document').ready( function(){
      var typed = new Typed("#typed", {
        backSpeed: 40,
        typeSpeed: 40,
        loop: true,
        strings: ["<?= $infos['titulo_banner']?> ^1000", "<?= $infos['titulo_banner02']?> ^1000"] // Waits 1000ms
      });
     })
    </script>

  </body>

</html>
