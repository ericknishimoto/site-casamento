<?php
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);
$mensagens = listaMensagens($conexao);
$fotos = listaFotos($conexao);

//Lógica data
$dataAtual = new DateTime(date('d-m-Y'));
$dataCasamento = new DateTime($infos['data_casamento']);
$intervalo = $dataAtual->diff($dataCasamento);
$valor = $intervalo->format('%r%a%');
$mensagem;

if ($valor == 0) {
  $mensagem = "É hoje!!!";
} elseif ($valor == 1) {
  $mensagem = "É amanhã!!!";
} elseif ($valor > 0) {
  $mensagem = "Faltam " . $valor . " dias";
} else {
  $mensagem = "Já se passaram " . $valor*-1 . " dias...";
}

?>

<html lang="en">

  <head>

<!--
Arquitetura de layout por Blackrock Digital LLC.
Veja mais em:
https://github.com/BlackrockDigital/startbootstrap-agency/blob/gh-pages/LICENSE
-->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= ($infos['titulo']) ?> (<?= date('d/m/Y', strtotime($infos['data_casamento'])) ?>)</title>
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

    <link href="css/lista-presentes.css" rel="stylesheet">
    <link href="css/tema-presentes.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?= ($infos['brand']) ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse animated fadeIn" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">     
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/">Home</a>
            </li>     
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#mensagens">Mensagens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#presenca">Presença</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#local">Local</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
     <section id="presenca" class="presenca text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Lista de Presentes</h2>
            <h3 class="section-subheading text-muted">Sem presentes, sem festa =)</h3>
          </div>
        </div>
        <div class="d-flex">
            <hr class="my-auto flex-grow-1" style="color:gray;">
            <div class="px-4" style="color:gray;">CATEGORIAS</div>
            <hr class="my-auto flex-grow-1" style="color:gray;">
        </div>              
        
        <div class="row d-flex justify-content-center">
          <button type="button" class="btn botao-categoria text-muted">
            Eletrodomésticos
          </button>
          <button type="button" class="btn botao-categoria text-muted">
            Cama, mesa e banho
          </button>
          <button type="button" class="btn botao-categoria text-muted">
            Decoração
          </button>
        </div>

      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

    <!-- Lista -->
    <section class="lista">
      <div class="container mb-4">
        <div class="row d-flex justify-content-center">

          <div class="col-lg-3 col-md-4 mt-4">
            <a target="_blank" href="https://www.magazineluiza.com.br/smart-tv-4k-led-75-lg-75uk6520-wi-fi-hdr-inteligencia-artificial-conversor-digital-4-hdmi/p/193419200/et/elit/?partner_id=4657&utm_source=google&utm_medium=pla&utm_campaign=PLA_marketplace&seller_id=magazineluiza&product_group_id=304686411572&ad_group_id=59464795802&aw_viq=pla&gclid=Cj0KCQiAkfriBRD1ARIsAASKsQLkXDqDqZp0JK6qC_CC42cqLRjEykohuDY2Jb5ypBMQESMScEnZdtcaAlXdEALw_wcB"class="link">
              <div class="card-presentes d-flex justify-content-center">
                <img class="card-img-top img-md3" src="img/tv.jpg" alt="Card image cap">
                <p class="card__titulo text-center">
                    Smart TV 4K LED 75” LG 75UK6520 Wi-Fi HDR</p>
               
                <p class="card__autor text-center">Valor médio:</p>
                <p class="card__preco text-center">R$9.000,00</p>
                <a target="_blank" href="https://www.magazineluiza.com.br/smart-tv-4k-led-75-lg-75uk6520-wi-fi-hdr-inteligencia-artificial-conversor-digital-4-hdmi/p/193419200/et/elit/?partner_id=4657&utm_source=google&utm_medium=pla&utm_campaign=PLA_marketplace&seller_id=magazineluiza&product_group_id=304686411572&ad_group_id=59464795802&aw_viq=pla&gclid=Cj0KCQiAkfriBRD1ARIsAASKsQLkXDqDqZp0JK6qC_CC42cqLRjEykohuDY2Jb5ypBMQESMScEnZdtcaAlXdEALw_wcB"class="btn botao-comprar">Comprar</a>
              </div>
           </a>
          </div>

          <div class="col-lg-3 col-md-4 mt-4">
              <div class="card-comprado d-flex justify-content-center">
                <img class="card-img-top img-md3" src="img/cooktop.jpg" alt="Card image cap">
                <p class="card__titulo text-center">
                    Cooktop em Vidro Temperado Com 5 Queimadores Tramontina</p>
                <p class="card__autor text-center">Valor médio:</p>
                <p class="card__preco text-center">R$3.500,00</p>
                <div class="btn btn-comprado">Comprado ✓</div>
              </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4">
              <div class="card-comprado d-flex justify-content-center">
                <img class="card-img-top img-md3" src="img/cooktop.jpg" alt="Card image cap">
                <p class="card__titulo text-center">
                    Cooktop em Vidro Temperado Com 5 Queimadores Tramontina</p>
                <p class="card__autor text-center">Valor médio:</p>
                <p class="card__preco text-center">R$3.500,00</p>
                <div class="btn btn-comprado">Comprado ✓</div>
              </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4">
              <div class="card-comprado d-flex justify-content-center">
                <img class="card-img-top img-md3" src="img/cooktop.jpg" alt="Card image cap">
                <p class="card__titulo text-center">
                    Cooktop em Vidro Temperado Com 5 Queimadores Tramontina</p>
                <p class="card__autor text-center">Valor médio:</p>
                <p class="card__preco text-center">R$3.500,00</p>
                <div class="btn btn-comprado">Comprado ✓</div>
              </div>
          </div>

        </div>
      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span class="copyright">© 2018 Todos os direitos reservados | Criado por Érick Nishimoto</i></span>
          </div>
          </div>
        </div>
      </div>
    </footer>

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

    <!-- Limitador de caracteres text-area -->
    <script>
      $(document).on("input", "#TxtObservacoes", function () {
        var limite = 200;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

      $(".caracteres").text(caracteresRestantes);
      });
    </script>

  </body>

</html>
