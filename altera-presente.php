<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco-meusite.php';
require_once('class/Presente.php');

$presente = new Presente();

$presente->id = $_GET["id"];
$presente->titulo = $_POST["titulo"];
$presente->valor = str_replace(",",".", $_POST["valor"]);
$presente->categoria = $_POST["categoria"];
$presente->link = $_POST["link"];

if($_FILES['presente_imagem']['name'] != "") {
  $extensao = strtolower(substr($_FILES['presente_imagem']['name'], -4)); //pega a extensao do arquivo
  $presente->imagem = md5('presente_imagem') . $extensao; //define o nome do arquivo
  $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
  move_uploaded_file($_FILES['presente_imagem']['tmp_name'], $diretorio.$presente->imagem); //efetua o upload
} else {
  $presente->imagem = $_POST['presente_imagem_anterior'];
}

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