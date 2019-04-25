<?php

function buscaUsuario($conexao, $email, $senha) {
    $email = protect($email);
    $senhaMd5 = protect($senha);
    $senhaMd5 = md5($senha);
    $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5 }'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

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