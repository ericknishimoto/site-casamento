<?php

session_start();

function usuarioEstaLogado() {
  return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
  if(!usuarioEstaLogado()) {
     header("Location: admin?falhaDeSeguranca=true");
     die();
  }
}

function verificaAdmin() {
  if($_SESSION["usuario_permissao"] != "admin") {
     header("Location: sem-permissao");
     die();
  }
}

function usuarioLogado($email) {
  return $_SESSION["usuario_logado"];
}

function logaUsuario($email,$nome, $permissao) {
  $_SESSION["usuario_logado"] = $email;
  $_SESSION["usuario_nome"] = $nome;
  $_SESSION["usuario_permissao"] = $permissao;
}

function logout() {
  session_destroy();
  session_start();
}