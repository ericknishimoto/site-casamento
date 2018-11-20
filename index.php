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

    <link href="css/index.css" rel="stylesheet">
    <link href="css/tema.css" rel="stylesheet">
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
              <a class="nav-link js-scroll-trigger" href="#section01">Sobre</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#mensagens">Mensagens</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#fotos">Fotos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Local</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead animated fadeIn slow">
      <div class="container">
        <div class="intro-text">
          <div class="intro-welcome animated fadeIn delay-1s">Sejam bem vindos!</div>
          <div class="intro-heading animated fadeIn delay-1s"><?= $infos['titulo_banner'] ?></div>
          <div class="intro-lead text-uppercase mt-5 animated fadeIn delay-1s"><?= $mensagem ?></div>
          <div class="intro-lead-in animated fadeIn delay-1s">– <?=  date('d.m.Y', strtotime($infos['data_casamento'])) ?> –</div>
          <a class="seta-inicio js-scroll-trigger animated fadeIn delay-1s" href="#section01"><i class="fas fa-angle-down animated pulse infinite"></i></a>
        </div>
      </div>
  </header>

    <!-- Section #01 -->
    <section id="section01" class="section01 text-center">
      <div class="container mb-3">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading"><?= ($infos['section01_titulo']) ?></h2>
            <h3 class="section-subheading text-muted"><?= ($infos['section01_subtitulo']) ?></h3>
          </div>
        </div>
        <div class="d-flex mb-3">
            <hr class="my-auto flex-grow-1" style="color:gray;">
            <div class="px-4" style="color:gray;">♥</div>
            <hr class="my-auto flex-grow-1" style="color:gray;">
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <p class="text-muted mb-5"><?= ($infos['section01_texto']) ?></p>
          </div>
        </div>
      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

    <!-- Mensagens -->
    <section class="bg-light" id="mensagens">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color:white;"><?= ($infos['mensagens_titulo']) ?></h2>
            <h3 class="section-subheading" style="color:white;"><?= ($infos['mensagens_subtitulo']) ?></h3>
          </div>
        </div>

        <div class="row d-flex justify-content-center">

        <?php
        
        $counter = 0;
        foreach ($mensagens as $mensagem) {

          if ($counter >= 6){
            break;
          } 

          $counter++;

          if ( $mensagem['confirmacao'] == 1) {
        ?>
            <div class="col-lg-4 mt-4">
              <div class="card d-flex justify-content-center"">
                <p class="card__texto text-center">
                <?= ($mensagem['mensagem']) ?>
                </p>
                <p class="card__autor text-center">- <?= ($mensagem['nome']) ?> -</p>
                <p class="card__data text-center"><?= date('d/m/Y', strtotime($mensagem['data'])) ?></p>
              </div>
            </div>
        <?php 
          }
        }
        ?>

        </div>

        <div class="row">
            <div class="col-md-12 text-center botao-mensagem">
              <button type="button" class="btn btn-lg mr-4" data-toggle="modal" data-target="#modal-nova-mensagem">
                <span>Enviar Mensagem</span>
              </button>
              <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#modal-mensagem">
                <span>Ver Todas</span>
              </button>
            </div>
          </div>

      </div>  
    </section>

    <!-- Fotos -->
    <section id="fotos">

        <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading"><?= ($infos['fotos_titulo']) ?></h2>
              <h3 class="section-subheading text-muted"><?= ($infos['fotos_subtitulo']) ?></h3>
            </div>
          </div>

      <div class="container">
        <div class="row text-center d-flex justify-content-center">
            <?php
            if ($fotos != null) {
              foreach ($fotos as $foto) {
                ?>  
                  <div class="col-lg-4 col-xs-4 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                      data-image="upload/<?= ($foto['nome']) ?>"
                      data-target="#image-gallery">
                      <img class="img-thumbnail thumbnail img-rounded img-md" src="upload/<?= ($foto['nome']) ?>" alt="Another alt text">
                    </a>
                  </div>
                <?php 
                }
            } else {
              ?> 
                <h4 class="text-muted mt-5">Em breve...</h4>
              <?php 
            }
            ?>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span class="copyright">© 2018 Érick Nishimoto | Todos os direitos reservados | <a href="admin">Admin</a></span>
          </div>
          </div>
        </div>
      </div>
    </footer>

  <!-- MODAL TODAS MENSAGENS -->
  <div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-xs-12 p-4">
                      <div class="row">
                        <div class="col-12">

                          <div class="form-group mt-1 text-center">
                              <label class="titulo-modal">Todas as mensagens</label>
                          </div>

                          <div class="container">
                            <?php
                            foreach ($mensagens as $mensagem) {

                            if ( $mensagem['confirmacao'] == 1) {
                            ?>
                              <div class="d-flex mb-1">
                                <hr class="my-auto flex-grow-1" style="color:gray;">
                                <div class="px-4" style="color:gray;">♥</div>
                                <hr class="my-auto flex-grow-1" style="color:gray;">
                              </div>
                              <div class="col-lg-12">
                                  <p class="card__texto text-center">
                                  <?= ($mensagem['mensagem']) ?>
                                  </p>
                                  <p class="card__autor-m text-center">- <?= ($mensagem['nome']) ?> -</p>
                                  <p class="card__data text-center"><?= date('d/m/Y', strtotime($mensagem['data'])) ?></p>
                              </div>
                            <?php 
                              }
                            }
                            ?>
                          </div>

                      </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="button" class="btn text-muted" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- MODAL NOVA MSG -->
   <div class="modal fade" id="modal-nova-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="modal-body">
                  <form action="adiciona-mensagem.php" id="form" method="POST">
                      <div class="row">
                        <div class="col-xs-12 p-4">

                          <div class="row">
                            <div class="col-12">

                              <div class="form-group mt-1 text-center">
                                  <label class="titulo-modal">Escreva sua mensagem!</label>
                              </div>

                              <div class="form-group mt-1">
                                  <label>Nome:</label>
                                  <input type="text" required name="nome" class="form-control">
                              </div>
                            </div>

                            <div class="col-12">
                              <div class="form-group mt-1">
                                  <label>Mensagem:</label>
                                  <textarea type="text" rows="4" maxlength="200" required name="mensagem" class="form-control" id="TxtObservacoes"></textarea>
                                  <div class="text-right">
                                    <p class="contador-caracteres">Caracteres <span class="contador-caracteres caracteres">200</span> Restantes<br></p>
                                  </div>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn text-muted mr-2" type="submit" form="form" value="Submit">Enviar</button>
                            <button type="button" class="btn text-muted" data-dismiss="modal">Fechar</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL FOTO -->
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="image-gallery-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                    </button>

                    <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Galeria -->
    <script src="js/galeria.js"></script>

    <!-- Altera BG -->
    <script>
      let bg = document.querySelector(".masthead");
      bg.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0),rgba(0, 0, 0, .4)),url('upload/<?= $infos['cabecalho_imagem']?>')";
      bg.style.backgroundRepeat = "no-repeat";
      bg.style.backgroundAttachment = "fixed";
      bg.style.backgroundPosition = "center center";
      bg.style.backgroundSize = "cover";
    </script>
    <script>
      let bg2 = document.querySelector("#mensagens");
      bg2.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0),rgba(0, 0, 0, .4)),url('upload/<?= $infos['mensagens_imagem']?>";
      bg2.style.backgroundRepeat = "no-repeat";
      bg2.style.backgroundAttachment = "fixed";
      bg2.style.backgroundPosition = "center center";
      bg2.style.backgroundSize = "cover";
    </script>

    <!-- Limitador de caracteres text-area -->
    <script>
      $(document).on("input", "#TxtObservacoes", function () {
        var limite = 200;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

      $(".caracteres").text(caracteresRestantes);
      });
    </script>

      <!-- Abre modal de msg enviada -->
      <?php if(isset($_GET["mensagem"]) && $_GET["mensagem"]==true) {
        ?>
        <script>
          $( document ).ready(function() {
            $("#modal-confirm").modal();
        });
        </script>

        <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="modal-body"></div>
                        <div class="row m-3">
                          <p class="titulo-modal">Mensagem enviada!</p>
                          <p class="text-muted">Aguarde a confirmação dos noivos, para que ela apareça no site.</p>
                          <div class="col-12 text-right">
                              <button type="button" class="btn text-muted" data-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
          }
      ?>

  </body>

</html>
