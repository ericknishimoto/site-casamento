<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco-meusite.php';
require_once('class/Convidado.php');

$convidado = new Convidado();

$convidado->id = $_GET["id"];
$convidado->nome = $_POST["nome"];
$convidado->telefone = $_POST["telefone"];
$convidado->email = $_POST["email"];
$convidado->adultos = $_POST["adultos"];
$convidado->nome_adultos = $_POST["nome_adultos"];
$convidado->criancas = $_POST["criancas"];

if(alteraPresenca($conexao, $convidado)) {
  header ("Location: presenca?alteracao=true");
  die();
}else{ 
  ?>
  <h1>Algo deu errado:</h1>
  <?php
  printf("Connect failed: %s\n", mysqli_error($conexao));
  exit();
}
?>

</section>
<!-- /.content -->
</div>