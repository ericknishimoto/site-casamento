<?php

function listaMeusite($conexao) {
    $infos = array();
    $query = "select * from meusite";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function listaMensagens($conexao) {
    $mensagens = array();
    $query = "select * from mensagens";
    $resultado = mysqli_query($conexao, $query);
    while ($mensagem = mysqli_fetch_assoc($resultado)) {
        array_push($mensagens, $mensagem);
    }
    return $mensagens;
}

function alteraMeusite ($conexao,
$titulo,
$brand,
$cabecalho_imagem,
$titulo_banner,
$data_casamento,
$section01_titulo,
$section01_subtitulo,
$section01_texto,
$mensagens_titulo,
$mensagens_subtitulo
)
{ 
$query = "UPDATE meusite set
titulo = '{$titulo}',
brand = '{$brand}',
cabecalho_imagem = '{$cabecalho_imagem}',
titulo_banner = '{$titulo_banner}',
data_casamento = '{$data_casamento}',
section01_titulo = '{$section01_titulo}',
section01_subtitulo = '{$section01_subtitulo}',
section01_texto = '{$section01_texto}',
mensagens_titulo = '{$mensagens_titulo}',
mensagens_subtitulo = '{$mensagens_subtitulo}'
";

return mysqli_query($conexao, $query);
}

function insereMensagem ($conexao, $nome, $dataMensagem, $mensagem) { 
    $query = "INSERT INTO mensagens (nome, data, mensagem)
    VALUES ('{$nome}','{$dataMensagem}','{$mensagem}')"; 
    return mysqli_query($conexao, $query);
}

function confirmaMensagem ($conexao,$id,$confirmacao) { 
    $query = "UPDATE mensagens set
    confirmacao = '{$confirmacao}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}




