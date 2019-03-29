<?php

require_once('class/Convidado.php');
require_once('class/Presente.php');

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
    $query = "INSERT INTO convidados (nome, confirmacao, email, telefone, categoria)
    VALUES ('{$convidado->nome}','{$convidado->confirmacao}',
            '{$convidado->email}','{$convidado->telefone}','{$convidado->categoria}')"; 
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
        $convidado->email = $convidado_array['email'];
        $convidado->telefone = $convidado_array['telefone'];
        $convidado->categoria = $convidado_array['categoria'];

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
categoria = '{$convidado->categoria}'
where id = '{$convidado->id}'";

return mysqli_query($conexao, $query);
}

// PRESENTES

function inserePresente ($conexao, Presente $presente) { 
    $query = "INSERT INTO lista_presentes (titulo, valor, link, codCategoria, imagem)
    VALUES ('{$presente->titulo}','{$presente->valor}',
        '{$presente->link}', '{$presente->categoria}','{$presente->imagem}')"; 
    return mysqli_query($conexao, $query);
}

function listaPresentes($conexao) {
    $presentes = array();
    $query = "select *,lp.id as id, c.nome as categoria from lista_presentes as lp join categorias as c
    on lp.codCategoria = c.id order by titulo asc";
    $resultado = mysqli_query($conexao, $query);
    while ($presente_array = mysqli_fetch_assoc($resultado)) {
        
        $presente = new Presente();

        $presente->id = $presente_array['id'];
        $presente->titulo = $presente_array['titulo'];
        $presente->valor = $presente_array['valor'];
        $presente->link = $presente_array['link'];
        $presente->categoria = $presente_array['categoria'];
        $presente->confirmacao = $presente_array['confirmacao'];
        $presente->imagem = $presente_array['imagem'];

        array_push($presentes, $presente);
    }
    return $presentes;
}

function listaPresente($conexao, $id) {
    $presentes = array();
    $query = "select *,lp.id as id, c.nome as categoria from lista_presentes as lp join categorias as c
    on lp.codCategoria = c.id and lp.id = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    while ($presente_array = mysqli_fetch_assoc($resultado)) {
        
        $presente = new Presente();

        $presente->id = $presente_array['id'];
        $presente->titulo = $presente_array['titulo'];
        $presente->valor = $presente_array['valor'];
        $presente->link = $presente_array['link'];
        $presente->categoria = $presente_array['categoria'];
        $presente->confirmacao = $presente_array['confirmacao'];
        $presente->imagem = $presente_array['imagem'];

        array_push($presentes, $presente);
    }
    return $presente;
}

function confirmaPresente ($conexao,$id,$confirmacao) { 
    $query = "UPDATE lista_presentes set
    confirmacao = '{$confirmacao}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function excluiPresente($conexao, $id) {
    $query = "delete from lista_presentes where id = {$id}";
    return mysqli_query($conexao, $query);
}

function alteraPresente ($conexao, Presente $presente) { 

    $query = "UPDATE lista_presentes set
    titulo = '{$presente->titulo}',
    valor = '{$presente->valor}',
    codCategoria = '{$presente->categoria}',
    link = '{$presente->link}',   
    imagem = '{$presente->imagem}'
    where id = '{$presente->id}'
    ";
    
    return mysqli_query($conexao, $query);
    }

function insereCategoria ($conexao, $categoria) { 
    $query = "INSERT INTO categorias (nome)
    VALUES ('{$categoria}')"; 
    return mysqli_query($conexao, $query);
}

function listaCategorias($conexao) {
    $categorias = array();
    $query = "select * from categorias order by nome asc ";
    $resultado = mysqli_query($conexao, $query);
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

function excluiCategoria($conexao, $id) {
    $query = "delete from categorias where id = {$id}";
    return mysqli_query($conexao, $query);
}