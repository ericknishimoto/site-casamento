<?php
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);
$presentes = listaPresentes($conexao);
$categorias = listaCategorias($conexao);
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
      <div class="container" style="max-width: 1300px;">
        <a class="navbar-brand js-scroll-trigger" href="/"><?= ($infos['brand']) ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse animated fadeIn" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto"> 
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/">Início</a>
            </li>   
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#section01">Sobre</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#mensagens">Mensagens</a>
            </li>      
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/#presenca">Presença</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#local">Local</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#fotos">Fotos</a>
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
        <button type="button" id="categoria" class="btn botao-categoria text-muted mostrarTodos">
          TODOS            
        </button>    
          <?php foreach($categorias as $categoria) :?>
            <button type="button" id="categoria" class="btn botao-categoria text-muted">
            <?=$categoria['nome']?>
            </button>    
          <?php endforeach ?>  
        </div>

      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

    <!-- Lista -->
    <section class="lista">
      <div class="container mb-4">
        <div class="row d-flex justify-content-center">
        
          <!-- INI CARD TRANSFERENCIA -->
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="card-presentes d-flex justify-content-center text-center">
            <a href="" class="link text-center" data-toggle="modal" data-target="#modal-transferencia">
              <img class="card-img-top img-md3" src="img/pig.png" alt="Card image cap">
              <p class="card__titulo d-flex card__titulo justify-content-center align-items-center text-center">Transferir Valor</p>                    
              <p class="card__autor text-center">Transfira diretamente</p>
            <p class="card__preco text-center">para a gente =)</p>
              <span class="badge badge-presente mb-2">Transferência</span>
              </a>
              <button type="button" class="btn botao-comprar" data-toggle="modal" data-target="#modal-transferencia">
              Transferir valor
              </button>
            </div>
          </div>
          <!-- FIM CARD TRANSFERENCIA -->

          <?php
            if ($presentes != null) {
              foreach ($presentes as $presente) {

                if ($presente->confirmacao != 1) {
                ?>

                <div class="col-lg-3 col-md-4 mt-4" id="presente">
                  <a target="_blank" href="<?= ($presente->link) ?>" class="link">
                    <div class="card-presentes d-flex justify-content-center text-center">
                      <img class="card-img-top img-md3" src="upload/<?= $presente->imagem ?>" alt="Card image cap">
                      <p class="card__titulo d-flex card__titulo justify-content-center align-items-center text-center"><?= $presente->titulo ?></p>                    
                      <p class="card__autor text-center">Valor médio:</p>
                      <p class="card__preco text-center">R$ <?= number_format( $presente->valor, 2, ',', '.' ) ?></p>
                      <span class="badge badge-presente mb-2"><?= $presente->categoria ?></span>
                      <a target="_blank" href="<?= $presente->link ?>" class="btn botao-comprar">Comprar</a>
                    </div>
                  </a>
                </div>

                <?php 
                } else {
                ?> 
                  <div class="col-lg-3 col-md-4 mt-4 presente">
                  <a target="_blank" class="link">
                    <div class="card-comprado d-flex justify-content-center">
                      <img class="card-img-top img-md3" src="upload/<?= $presente->imagem ?>" alt="Card image cap">
                      <p class="card__titulo d-flex card__titulo justify-content-center align-items-center text-center"><?= $presente->titulo ?></p>                    
                      <p class="card__autor text-center">Valor médio:</p>
                      <p class="card__preco text-center">R$ <?= $presente->valor ?></p>
                      <div class="btn btn-comprado">Adquirido ✓</div>
                    </div>
                  </a>
                </div>
                <?php 
                }
              }
            } else {
              ?> 
                <h4 class="text-muted mt-5">Em breve...</h4>
              <?php 
            }
            ?>

        </div>
      </div>
      <!-- <a class="seta-section js-scroll-trigger" href="#mensagens"><i class="fas fa-angle-down animated pulse infinite"></i></a> -->
    </section>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <span class="copyright"><?= ($infos['titulo']) ?> - Todos os direitos reservados | Criado por <a href="http://www.ericknishimoto.com.br" target="_blank">Érick Nishimoto</a></span>
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
              <form action="adiciona-transferencia.php" id="form-transferencia" method="POST">
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
                              <span class="h3 text-muted"><b><?= ($infos['presentes_banco']) ?></b></span><br>
                              <span class="h4 text-muted">Agência: <?= ($infos['presentes_agencia']) ?></span><br>
                              <span class="h4 text-muted"><?= ($infos['presentes_conta']) ?></span>
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
                          <div class="d-flex mt-4 mb-4">
                            <hr class="my-auto flex-grow-1" style="border-top: 1px dashed lightgray;">
                          </div> 
                        </div>

                        <div class="col-12">
                          <div class="form-group mt-1">
                            <label>Nome</label><span class="text-muted"> (*)</span>
                            <input type="text" name="nome" class="form-control">
                            <div class="text-right">
                            </div>
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group mt-1">
                            <label>Valor</label><span class="text-muted"> (*)</span>
                            <input name="valor" class="form-control money">
                              <div class="text-right">
                              </div>
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group mt-1">
                            <label>Data</label><span class="text-muted"> (*)</span>
                            <input type="date" name="data" class="form-control">
                              <div class="text-right">
                              </div>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group mt-1">
                            <label>Número de Operação</label><span class="text-muted"> (Opcional)</span>
                            <input type="text" name="operacao" class="form-control">
                            <div class="text-right">
                            </div>
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group mt-1">
                            <label>Observação</label><span class="text-muted"> (Opcional)</span>
                            <textarea type="text" rows="2" maxlength="200" name="obs" class="form-control" id="TxtObservacoes"></textarea>
                            <div class="text-right">
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn text-muted bg-color-gray mr-2" type="submit" form="form-transferencia" value="Submit">Enviar</button>
                        <button type="button" class="btn text-muted bg-color-gray" data-dismiss="modal">Fechar</button>
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

<script src="js/adicionaFiltro.js"></script>
<script src="js/filtraPresentes.js"></script>

  </body>

</html>
