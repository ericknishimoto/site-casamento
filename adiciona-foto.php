<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco-meusite.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php 

/******
 * Upload de imagens
 ******/
 
// verifica se foi enviado um arquivo

if ( isset( $_FILES[ 'nova_foto' ][ 'name' ] ) && $_FILES[ 'nova_foto' ][ 'error' ] == 0 ) {
    echo 'Você enviou o nova_foto: <strong>' . $_FILES[ 'nova_foto' ][ 'name' ] . '</strong><br />';
    echo 'Este nova_foto é do tipo: <strong > ' . $_FILES[ 'nova_foto' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'nova_foto' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'nova_foto' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $nova_foto_tmp = $_FILES[ 'nova_foto' ][ 'tmp_name' ];
    $nome = $_FILES[ 'nova_foto' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = 'upload/' . $novoNome;
 
        // tenta mover o nova_foto para o destino
        if ( @move_uploaded_file ( $nova_foto_tmp, $destino ) ) {
            echo 'nova_foto salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            echo ' < img src = "' . $destino . '" />';
          
        if(insereFoto($conexao,$novoNome))
        {
          header ("Location: fotos?status=ok");
          die();
        }else{ 
        ?>
          <h1>Algo deu errado:</h1>
          <?php
            printf("Connect failed: %s\n", mysqli_error($conexao));
          exit();
        }

        }
        else
            echo 'Erro ao salvar o nova_foto. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas nova_fotos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum nova_foto!';
    header ("Location: fotos?status=erro");  

      ?>

    </section>
    <!-- /.content -->
  </div>