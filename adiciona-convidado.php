<?php 
require_once ('logica-usuario.php');
require_once ('conecta.php');
require_once ('banco-meusite.php');
require_once ('class/Convidado.php');

$convidado = new Convidado();

$convidado->nome = $_POST["nome"];
$convidado->confirmacao = $_POST["confirmacao"];
$convidado->email = $_POST["email"];
$convidado->telefone = $_POST["telefone"];
$convidado->categoria = $_POST["categoria"];

if(insereConvidado($conexao, $convidado))
{
	header ("Location: index?presenca=true#presenca");
	die();
}else{ 
?>
	<h1>Algo deu errado:</h1>
<?php
	printf("Connect failed: %s\n", mysqli_error($conexao));
	exit();
}