<?php 
require_once ('logica-usuario.php');
require_once ('conecta.php');
require_once ('banco-meusite.php');
require_once ('banco-meusite.php');
require_once ('class/Convidado.php');

$convidado = new Convidado();

$convidado->$nome = $_POST["nome"];
$convidado->$confirmacao = $_POST["paymentMethod"];
$convidado->$adultos = $_POST["adultos"];
$convidado->$criancas = $_POST["criancas"];
$convidado->$email = $_POST["email"];
$convidado->$telefone = $_POST["telefone"];
$convidado->$nome_adultos = $_POST["nome_adultos"];

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