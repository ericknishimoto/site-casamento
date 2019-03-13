<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco-meusite.php';
require_once('class/Presente.php');

$presente = new Presente();

$presente->id = $_GET["id"];
$presente->titulo = $_POST["titulo"];
$presente->valor = $_POST["valor"];
$presente->categoria = $_POST["categoria"];
$presente->link = $_POST["link"];

if(alteraPresente($conexao, $presente)) {
  header ("Location: presentes?alteracao=true");
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