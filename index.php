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
      <div class="container" style="max-width: 1300px;">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?= ($infos['brand']) ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse animated fadeIn" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">   
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="lista-presentes">Presentes</a>
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

        if ( $mensagem['confirmacao'] == 1) {

            if ($counter >= $infos['mensagens_quantidade']){
              break;
            } 
  
            $counter++;
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
            <?php
              if ($valor > 0 || $valor == 0) {
              ?>
                <button type="button" class="btn btn-lg botao-enviar" data-toggle="modal" data-target="#modal-nova-mensagem">
                  <span>Enviar Mensagem</span>
                </button>
            <?php    
              }?>
            <button type="button" class="btn btn-lg botao-todos" data-toggle="modal" data-target="#modal-mensagem">
              <span>Ver Todas</span>
            </button>
          </div>
        </div>

      </div>  
    </section>
    
    <!-- CONFIRMACAO DE PRESENCA -->
     <section id="presenca" class="presenca text-center">
      <div class="container mb-3">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Confirmação de Presença</h2>
            <h3 class="section-subheading text-muted">Faça parte da nossa história de amor, confirme sua presença.</h3>
          </div>
        </div>
        <div class="d-flex">
            <hr class="my-auto flex-grow-1" style="color:gray;">
            <div class="px-4" style="color:gray;">♥</div>
            <hr class="my-auto flex-grow-1" style="color:gray;">
        </div>              
        
        <div class="row d-flex justify-content-center">
          <button type="button" class="btn btn-lg botao-todos text-muted" data-toggle="modal" data-target="#modal-presenca">
            Confirme sua presença
          </button>
        </div>

        </form>
      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

    <!-- LOCAL -->
    <section class="bg-light" id="local">
      <div class="container mb-3">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="color:white;">Local do Evento</h2>
            <h3 class="section-subheading" style="color:white;">Contamos com a presença de todos vocês neste momento tão especial.</h3>
          </div>
        </div>
        
        <div class="row mb-5">
        <div class="col-lg-1 text-center"></div>
          <div class="col-lg-7 text-left">
            <h4 class="section-heading" style="color:white;"><b>Afrikan House Garden</b></h4>
            <p class="section-heading" style="color:white;">09 de Fevereiro de 2019 às 17:30</p>
            <p class="section-heading" style="color:white;">
            Aguardamos por você no espaço Afrikan House Garden em Itapecerica da Serra para Cerimônia que ocorrerá ao Ar Livre e Recepção no Salão 
            R. Benedito Pereira Rodrigues, 2073 - Lagoa, Itapecerica da Serra - SP, 06858-000  
            </p>
          </div>
          <div class="col-lg-3 text-center">
            <img class="img-thumbnail thumbnail img-rounded img-md3" src="img/img.png" alt="Another alt text">
          </div>
          <div class="col-lg-1 text-center"></div>
        </div>    

        <!-- MAPA GOOGLE -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.322774193079!2d-46.64824608561993!3d-23.556848284685152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59b3fe0a98e3%3A0x109ddd531016c9c0!2sR.+Rui+Barbosa%2C+156+-+Bela+Vista%2C+S%C3%A3o+Paulo+-+SP%2C+01326-010!5e0!3m2!1spt-BR!2sbr!4v1545923302280" width="100%" height="100%" frameborder="0" style="border:0; max-height: 400px" allowfullscreen></iframe>       

        </form>
      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

 <!-- LISTA DE PRESENTES -->
 <section id="presenca" class="presenca text-center">
      <div class="container mb-3">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Lista de Presentes</h2>
            <h3 class="section-subheading text-muted">Ajude os noivos a montar a casa nova. Presenteie!</h3>
          </div>
        </div>
        <div class="d-flex">
            <hr class="my-auto flex-grow-1" style="color:gray;">
            <div class="px-4" style="color:gray;">♥</div>
            <hr class="my-auto flex-grow-1" style="color:gray;">
        </div>              
        
        <div class="row d-flex justify-content-center">
          <a href="lista-presentes.php" class="btn btn-lg botao-todos text-muted link">
            Ver lista
          </a>
          <button type="button" class="btn btn-lg botao-todos text-muted bg-color-gray" data-toggle="modal" data-target="#modal-transferencia">
            Transferir valor
          </button>
        </div>

        </form>
      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>


    <!-- Fotos -->
    <section id="fotos">

            <div class="col-lg-12 text-center">
              <h2 class="section-heading" style="color:white;"><?= ($infos['fotos_titulo']) ?></h2>
              <h3 class="section-subheading" style="color:white;"><?= ($infos['fotos_subtitulo']) ?></h3>
            </div>


      <div class="container">
        <div class="row text-center d-flex justify-content-center">
            <?php
            if ($fotos != null) {
              foreach ($fotos as $foto) {
                ?>  
                  <div class="col-lg-3 col-xs-3 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                      data-image="upload/<?= ($foto['nome']) ?>"
                      data-target="#image-gallery">
                      <img class="img-thumbnail thumbnail img-rounded img-md2" src="upload/<?= ($foto['nome']) ?>" alt="Another alt text">
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
        <span class="copyright"><?= ($infos['titulo']) ?>© - Todos os direitos reservados | Criado por <a href="www.ericknishimoto.com.br">Érick Nishimoto</a></span>
      </div>
    </div>
  </div>
</footer>

<!-- ********************************** MODAL TRANSFERENCIA ********************************** -->

<div class="modal fade" id="modal-transferencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="modal-body">
                  <form action="adiciona-transferencia.php" id="form" method="POST">
                      <div class="row">
                        <div class="col-xs-12 p-4">

                          <div class="row">
                            <div class="col-12">

                              <div class="form-group mt-1 text-center">
                                  <label class="titulo-modal">Transferir Valor</label>
                              </div>

                              <div class="row text-center">
                                <p class="col-md-12 text-muted">Transfira um valor diretamente para os noivos.</p>
                              </div>

                              <div class="form-group row text-center">
                                <div class="col-md-12 text-center mt-1 mb-1">
                                  <span class="h3 text-muted"><b>Itaú</b></span><br>
                                  <span class="h4 text-muted">Agência: 0123</span><br>
                                  <span class="h4 text-muted">C/C: 81234-5</span>
                                </div>
                                <!-- <div class="col-md-6 text-center">
                                  <img src="img/pig.png" style="max-height: 100px;">
                                </div> -->
                              </div>

                              <div class="row text-center">
                                <p class="col-md-12 text-muted"><b>*Após fazer a transferência, envie-nos os dados abaixo.</b></p>
                              </div>
                            </div>

                            <!-- DIVISÓRIA -->
                            <div class="col-12 mt-1 mb-1">
                              <div class="d-flex mb-1">
                                <hr class="my-auto flex-grow-1" style="color:gray;">
                                <div class="px-4" style="color:gray;">♥</div>
                                <hr class="my-auto flex-grow-1" style="color:gray;">
                              </div>
                            </div>

                            <div class="col-12">
                              <div class="form-group mt-1">
                                <label>Nome:</label>
                                <input type="text" name="nome" class="form-control">
                                <div class="text-right">
                                </div>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group mt-1">
                                <label>Valor:</label>
                                <input type="number" name="valor" class="form-control">
                                  <div class="text-right">
                                  </div>
                              </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mt-1">
                                  <label>Data:</label>
                                  <input type="date" name="data" class="form-control">
                                    <div class="text-right">
                                    </div>
                                </div>
                              </div>

                          </div>
                        </div>
                        <div class="col-12 text-center">
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

  <!-- MODAL TODAS MENSAGENS -->
  <div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-12">

                          <div class="form-group mt-4 text-center">
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
                        <div class="col-12 text-center">
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

  <!-- MODAL CONFIRMACAO PRESENCA -->
   <div class="modal fade" id="modal-presenca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="modal-body">
                  <div class="row">
                    <form action="adiciona-convidado.php" id="form-convidado" method="POST">
                      <div class="col-12">

                        <div class="form-group mt-1 text-center">
                          <label class="titulo-modal mt-4">Confirmação de Presença</label>
                        </div>

                        <div class="col-md-12 mb-3">

                          <label>Nome do convidado <span class="text-muted">(*)</span></label>
                          <input name="nome" type="text" class="form-control" placeholder="Nome completo" required>
                          <div class="my-3">
                            <label>Você irá ao evento? <span class="text-muted">(*)</span></label>
                            <div class="custom-control custom-radio">
                              <input value="1" id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required>
                              <label class="custom-control-label" for="credit">Sim</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                              <label class="custom-control-label" for="debit">Não</label>
                            </div>
                          </div>
      
                          <div class="row">
                            <div class="col-md-6 mb-3">
                              <label>Quantos Adultos? <span class="text-muted">(*)</span></label>
                              <input name="adultos" type="number" class="form-control" required placeholder="0">
                            </div>
                            <div class="col-md-6 mb-3">
                              <label>Quantas Crianças?</label>
                              <input type="number" class="form-control" placeholder="0">
                              <small name="criancas" class="text-muted">Menores de 10 anos.</small>
                            </div>
                          </div>
              
                          <div class="mb-3">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="seu@email.com.br">
                          </div>
            
                          <div class="mb-3">
                            <label for="email">Telefone</label> <span class="text-muted">(*)</span></label>
                            <input name="telefone" type="text" class="form-control" required placeholder="11 9999-9999">
                          </div>

                          <div class="mb-3">
                            <label>Nome dos Adultos</label>
                            <textarea name="nome_adultos" type="text" rows="4" maxlength="200" class="form-control" placeholder="Nome completo, Nome completo, Nome completo..."></textarea>
                            <span class="text-muted">(*) Campos obrigatórios</span>
                          </div>

                          <div class="col-12 text-center mt-4">
                            <button class="btn text-muted mr-2" type="submit" form="form-convidado" value="Submit">Enviar</button>
                            <button type="button" class="btn text-muted" data-dismiss="modal">Fechar</button>
                          </div>

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
    bg.style.backgroundPosition = "center";
    bg.style.backgroundSize = "cover";

    let bg2 = document.querySelector("#mensagens");
    bg2.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0),rgba(0, 0, 0, .2)),url('upload/<?= $infos['mensagens_imagem']?>";
    

    let bg3 = document.querySelector("#local");
    bg3.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0),rgba(0, 0, 0, .8)),url('img/bg-3.jpg')";
   

    let bg4 = document.querySelector("#fotos");
    bg4.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.4)),url('img/bg-4.jpg')";
   
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

    <!-- Replace URL -->
    <script>
    window.history.replaceState('', '', '/');
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

      <!-- Abre modal de presenca enviada -->
      <?php if(isset($_GET["presenca"]) && $_GET["presenca"]==true) {
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
                          <p class="titulo-modal">Confirmação cadastrada!</p>
                          <p class="text-muted">Qualquer dúvida entre em contato com os noivos.</p>
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
