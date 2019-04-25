<?php

require_once('class/Convidado.php');
require_once('class/Presente.php');

function protect( &$str ) {
/*** Função para retornar uma string/Array protegidos contra SQL/Blind/XSS Injection*/
    if( !is_array( $str ) ) {                      
            $str = preg_replace( '/(from|select|insert|delete|where|drop|union|order|update|database)/i', '', $str );
            $str = preg_replace( '/(&lt;|<)?script(\/?(&gt;|>(.*))?)/i', '', $str );
            $tbl = get_html_translation_table( HTML_ENTITIES );
            $tbl = array_flip( $tbl );
            $str = addslashes( $str );
            $str = strip_tags( $str );
            return strtr( $str, $tbl );
    } else {
            return array_filter( $str, "protect" );
    }
}

function listaMeusite($conexao) {
    $infos = array();
    $query = "select * from meusite";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function listaMensagens($conexao) {
    $mensagens = array();
    $query = "select * from mensagens order by id desc";
    $resultado = mysqli_query($conexao, $query);
    while ($mensagem = mysqli_fetch_assoc($resultado)) {
        array_push($mensagens, $mensagem);
    }
    return $mensagens;
}

function listaTransferencias($conexao) {
    $transferencias = array();
    $query = "select * from transferencia_valores order by data desc";
    $resultado = mysqli_query($conexao, $query);
    while ($transferencia = mysqli_fetch_assoc($resultado)) {
        array_push($transferencias, $transferencia);
    }
    return $transferencias;
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

function alteraMeusite (
    $conexao,
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

function alteraSecaoLocal (
    $conexao,
    $local_titulo,
    $local_subtitulo,
    $local_imagem
    )

    { 
    $query = "UPDATE meusite set
    local_titulo = '{$local_titulo}',
    local_subtitulo = '{$local_subtitulo}',
    local_imagem = '{$local_imagem}'
    ";

    return mysqli_query($conexao, $query);
}

function alteraLocal01 (
        $conexao,
        $local_local01_titulo,
        $local_local01_horario,
        $local_local01_texto,
        $local_local01_imagem,
        $local_local01_mapa
    )

    { 
        $query = "UPDATE meusite set
        local_local01_titulo = '{$local_local01_titulo}',
        local_local01_horario = '{$local_local01_horario}',
        local_local01_texto = '{$local_local01_texto}',
        local_local01_imagem = '{$local_local01_imagem}',
        local_local01_mapa = '{$local_local01_mapa}'
    ";

    return mysqli_query($conexao, $query);
}

function alteraLocal02 (
    $conexao,
    $local_local02_titulo,
    $local_local02_horario,
    $local_local02_texto,
    $local_local02_imagem,
    $local_local02_mapa
)

{ 
    $query = "UPDATE meusite set
    local_local02_titulo = '{$local_local02_titulo}',
    local_local02_horario = '{$local_local02_horario}',
    local_local02_texto = '{$local_local02_texto}',
    local_local02_imagem = '{$local_local02_imagem}',
    local_local02_mapa = '{$local_local02_mapa}'
";

return mysqli_query($conexao, $query);
}


function alteraBoasVindasNoiva (
    $conexao,
    $noiva_nome,
    $noiva_desc,
    $noiva_img
)

{ 
    $query = "UPDATE meusite set
    noiva_nome = '{$noiva_nome}',
    noiva_desc = '{$noiva_desc}',
    noiva_img = '{$noiva_img}'
";

return mysqli_query($conexao, $query);
}

function alteraBoasVindasNoivo (
    $conexao,
    $noivo_nome,
    $noivo_desc,
    $noivo_img
)

{ 
    $query = "UPDATE meusite set
    noivo_nome = '{$noivo_nome}',
    noivo_desc = '{$noivo_desc}',
    noivo_img = '{$noivo_img}'
";

return mysqli_query($conexao, $query);
}

function alteraSecaoMensagens (
    $conexao,
    $mensagens_titulo,
    $mensagens_subtitulo,
    $mensagens_imagem,
    $mensagens_quantidade
    )

    { 
    $query = "UPDATE meusite set
    mensagens_titulo = '{$mensagens_titulo}',
    mensagens_subtitulo = '{$mensagens_subtitulo}',
    mensagens_imagem = '{$mensagens_imagem}',
    mensagens_quantidade = '{$mensagens_quantidade}'
    ";

    return mysqli_query($conexao, $query);
}

function alteraSecaoPresenca (
    $conexao,
    $presenca_titulo,
    $presenca_subtitulo,
    $presenca_aviso
    )

    { 
    $query = "UPDATE meusite set
    presenca_titulo = '{$presenca_titulo}',
    presenca_subtitulo = '{$presenca_subtitulo}',
    presenca_aviso = '{$presenca_aviso}'
    ";

    return mysqli_query($conexao, $query);
}

function alteraSecaoFotos (
    $conexao,
    $fotos_titulo,
    $fotos_subtitulo
    )

    { 
    $query = "UPDATE meusite set
    fotos_titulo = '{$fotos_titulo}',
    fotos_subtitulo = '{$fotos_subtitulo}'
    ";

    return mysqli_query($conexao, $query);
}

function alteraSecaoPresentes (
    $conexao,
    $presentes_titulo,
    $presentes_subtitulo,
    $presentes_banco,
    $presentes_agencia,
    $presentes_conta
    )

    { 
    $query = "UPDATE meusite set
    presentes_titulo = '{$presentes_titulo}',
    presentes_subtitulo = '{$presentes_subtitulo}',
    presentes_banco = '{$presentes_banco}',
    presentes_agencia = '{$presentes_agencia}',
    presentes_conta = '{$presentes_conta}'
    ";

    return mysqli_query($conexao, $query);
}


function alteraBannerPrincipal (
    $conexao,
    $titulo,
    $brand,
    $cabecalho_imagem,
    $titulo_banner,
    $data_casamento
    )

    { 
    $query = "UPDATE meusite set
    titulo = '{$titulo}',
    brand = '{$brand}',
    cabecalho_imagem = '{$cabecalho_imagem}',
    titulo_banner = '{$titulo_banner}',
    data_casamento = '{$data_casamento}'
    ";

    return mysqli_query($conexao, $query);
}

function alteraSecaoBoasVindas (
    $conexao,   
    $section01_titulo,
    $section01_subtitulo,
    $section01_texto
    )

    { 
    $query = "UPDATE meusite set
    section01_titulo = '{$section01_titulo}',
    section01_subtitulo = '{$section01_subtitulo}',
    section01_texto = '{$section01_texto}'
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

function insereTransferencia ($conexao, $nome, $valor, $data, $operacao, $obs) {
    
    $nome = protect($nome);
    $valor = protect($valor);
    $data = protect($data);
    $operacao = protect($operacao);
    $obs = protect($obs);
    
    $query = "INSERT INTO transferencia_valores (nome, valor, data, operacao, obs)
    VALUES ('{$nome}','{$valor}','{$data}','{$operacao}','{$obs}')"; 
    return mysqli_query($conexao, $query);
}

function insereMensagem ($conexao, $nome, $data, $mensagem) { 
    
    $nome = protect($nome);
    $data = protect($data);
    $mensagem = protect($mensagem);
    
    $query = "INSERT INTO mensagens (nome, data, mensagem)
    VALUES ('{$nome}','{$data}','{$mensagem}')"; 
    return mysqli_query($conexao, $query);
}

function confirmaMensagem ($conexao,$id,$confirmacao) { 
    $query = "UPDATE mensagens set
    confirmacao = '{$confirmacao}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function confirmaTransferencia ($conexao,$id,$confirmacao) { 
    $query = "UPDATE transferencia_valores set
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
    $nome = protect($convidado->nome);
    $confirmacao = protect($convidado->confirmacao);
    $email = protect($convidado->email);
    $telefone = protect($convidado->telefone);
    $categoria = protect($convidado->categoria);

    $query = "INSERT INTO convidados (nome, confirmacao, email, telefone, categoria)
    VALUES ('{$nome}','{$confirmacao}','{$email}','{$telefone}','{$categoria}')"; 
    return mysqli_query($conexao, $query);
}

function listaConvidados($conexao) {
    $convidados = array();
    $query = "select * from convidados order by nome asc";
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

function excluiPresenca($conexao, $id) {
    $query = "delete from convidados where id = {$id}";
    return mysqli_query($conexao, $query);
}

function excluiTransferencia($conexao, $id) {
    $query = "delete from transferencia_valores where id = {$id}";
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
    on lp.codCategoria = c.id order by titulo asc, categoria asc";
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
    $query = "select *,lp.id as id, c.nome as categoria, c.id as categoriaId from lista_presentes as lp join categorias as c
    on lp.codCategoria = c.id and lp.id = '{$id}'";
    $resultado = mysqli_query($conexao, $query);
    while ($presente_array = mysqli_fetch_assoc($resultado)) {
        
        $presente = new Presente();

        $presente->id = $presente_array['id'];
        $presente->titulo = $presente_array['titulo'];
        $presente->valor = $presente_array['valor'];
        $presente->link = $presente_array['link'];
        $presente->categoria = $presente_array['categoria'];
        $presente->categoriaId = $presente_array['categoriaId'];
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

function contaConvidadosNoivo($conexao) {
    $infos = array();
    $query = "SELECT COUNT(categoria) as soma FROM convidados where categoria = 'noivo' and confirmacao = 1";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function contaConvidadosNoiva($conexao) {
    $infos = array();
    $query = "SELECT COUNT(categoria) as soma FROM convidados where categoria = 'noiva' and confirmacao = 1";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function contaConvidadosFamilia($conexao) {
    $infos = array();
    $query = "SELECT COUNT(categoria) as soma FROM convidados where categoria = 'Família/Padrinhos' and confirmacao = 1";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraTotal ($conexao, $total, $noiva, $noivo, $familia) { 
    $query = "UPDATE `config_convidados` set
    total = '{$total}',
    noiva = '{$noiva}',
    noivo = '{$noivo}',
    familia = '{$familia}'
    WHERE id =1"; 
    return mysqli_query($conexao, $query);
}

function listaTotal($conexao) {
    $infos = array();
    $query = "select * from config_convidados where id = 1";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}