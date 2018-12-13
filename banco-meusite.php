<?php

require_once('class/Convidado.php');

function listaMeusite($conexao) {
    $infos = array();
    $query = "select * from meusite";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function listaMensagens($conexao) {
    $mensagens = array();
    $query = "select * from mensagens order by data desc";
    $resultado = mysqli_query($conexao, $query);
    while ($mensagem = mysqli_fetch_assoc($resultado)) {
        array_push($mensagens, $mensagem);
    }
    return $mensagens;
}

function listaFotos($conexao) {
    $fotos = array();
    $query = "select * from fotos";
    $resultado = mysqli_query($conexao, $query);
    while ($foto = mysqli_fetch_assoc($resultado)) {
        array_push($fotos, $foto);
    }
    return $fotos;
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
$mensagens_subtitulo,
$mensagens_imagem,
$mensagens_quantidade,
$fotos_titulo,
$fotos_subtitulo
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
mensagens_subtitulo = '{$mensagens_subtitulo}',
mensagens_imagem = '{$mensagens_imagem}',
mensagens_quantidade = '{$mensagens_quantidade}',
fotos_titulo = '{$fotos_titulo}',
fotos_subtitulo = '{$fotos_subtitulo}'
";

return mysqli_query($conexao, $query);
}

function alteraMensagensQuantidade ($conexao,
    $mensagens_quantidade
    )

    { 
    $query = "UPDATE meusite set
    mensagens_quantidade = '{$mensagens_quantidade}'
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

function confirmaPresenca ($conexao,$id,$confirmacao) { 
    $query = "UPDATE convidados set
    confirmacao = '{$confirmacao}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function insereFoto ($conexao, $nova_foto) { 
    $query = "INSERT INTO fotos (nome)
    VALUES ('{$nova_foto}')"; 
    return mysqli_query($conexao, $query);
}

function excluiFoto($conexao, $id) {
    $query = "delete from fotos where id = {$id}";
    return mysqli_query($conexao, $query);
}

// CONVIDADOS

function insereConvidado ($conexao, Convidado $convidado) { 
    $query = "INSERT INTO convidados (nome, confirmacao, adultos, criancas, email, telefone, nome_adultos)
    VALUES ('{$convidado->$nome}','{$convidado->$confirmacao}',
        '{$convidado->$adultos}','{$convidado->$criancas}',
            '{$convidado->$email}','{$convidado->$telefone}','{$convidado->$nome_adultos}')"; 
    return mysqli_query($conexao, $query);
}

function listaConvidados($conexao) {
    $convidados = array();
    $query = "select * from convidados";
    $resultado = mysqli_query($conexao, $query);
    while ($convidado_array = mysqli_fetch_assoc($resultado)) {
        
        $convidado = new Convidado();

        $convidado->id = $convidado_array['id'];
        $convidado->nome = $convidado_array['nome'];
        $convidado->confirmacao = $convidado_array['confirmacao'];
        $convidado->adultos = $convidado_array['adultos'];
        $convidado->criancas = $convidado_array['criancas'];
        $convidado->email = $convidado_array['email'];
        $convidado->telefone = $convidado_array['telefone'];
        $convidado->nome_adultos = $convidado_array['nome_adultos'];

        array_push($convidados, $convidado);
    }
    return $convidados;
}

function listaPresenca($conexao, $id) {
    $infos = array();
    $query = "select * from convidados where id = {$id} ";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraPresenca ($conexao, Convidado $convidado) { 

$query = "UPDATE convidados set
nome = '{$convidado->nome}',
telefone = '{$convidado->telefone}',
email = '{$convidado->email}',
adultos = '{$convidado->adultos}',
nome_adultos = '{$convidado->nome_adultos}',
criancas = '{$convidado->criancas}'
where id = '{$convidado->id}'";

return mysqli_query($conexao, $query);
}


