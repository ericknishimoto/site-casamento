<?php

function listaMeusite($conexao) {
    $infos = array();
    $query = "select * from meusite";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraMeusite ($conexao,
$titulo,
$brand,
$cabecalho_imagem,
$titulo_banner,
$data_casamento,
$section01_titulo,
$section01_subtitulo,
$section01_texto
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
section01_texto = '{$section01_texto}'
";

return mysqli_query($conexao, $query);
}


