<?php


function listaUsuarios($conexao) {
    $usuarios = array();
    $query = "select * from usuarios";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
        array_push($usuarios, $usuario);
    }
    return $usuarios;
}

function alteraUsuario($conexao,$id,$senha) { 
    $query = "UPDATE usuarios set
    senha = '{$senha}'
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}
