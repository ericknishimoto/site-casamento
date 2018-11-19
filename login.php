<?php

include("conecta.php");
include("banco-usuario.php");
include("logica-usuario.php");

// session_start();

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if($usuario == null) {
    header("Location: admin?login=0");
} else {
    logaUsuario($usuario["email"], $usuario["nome"], $usuario["permissao"]);
    header("Location: admin");
}
die();