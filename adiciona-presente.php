<?php 
require_once ('logica-usuario.php');
require_once ('conecta.php');
require_once ('banco-meusite.php');
require_once ('class/Presente.php');

$presente = new Presente();

$presente->titulo = $_POST["titulo"];
$presente->valor = $_POST["valor"];
$presente->link = $_POST["link"];

if ( isset( $_FILES[ 'produto_imagem' ][ 'name' ] ) && $_FILES[ 'produto_imagem' ][ 'error' ] == 0 ) {
  echo 'Você enviou o produto_imagem: <strong>' . $_FILES[ 'produto_imagem' ][ 'name' ] . '</strong><br />';
  echo 'Este produto_imagem é do tipo: <strong > ' . $_FILES[ 'produto_imagem' ][ 'type' ] . ' </strong ><br />';
  echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'produto_imagem' ][ 'tmp_name' ] . '</strong><br />';
  echo 'Seu tamanho é: <strong>' . $_FILES[ 'produto_imagem' ][ 'size' ] . '</strong> Bytes<br /><br />';

  $produto_imagem_tmp = $_FILES[ 'produto_imagem' ][ 'tmp_name' ];
  $nome = $_FILES[ 'produto_imagem' ][ 'name' ];

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
      $presente->imagem = uniqid ( time () ) . '.' . $extensao;

      // Concatena a pasta com o nome
      $destino = 'upload/' . $presente->imagem;

      // tenta mover o nova_foto para o destino
      if ( @move_uploaded_file ( $produto_imagem_tmp, $destino ) ) {
          echo 'produto_imagem salvo com sucesso em : <strong>' . $destino . '</strong><br />';
          echo ' < img src = "' . $destino . '" />';
        
      
        if(inserePresente($conexao, $presente)) {
          header ("Location: presentes?cadastro=true");
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
  header ("Location: presentes?status=erro");  
?>

</section>
<!-- /.content -->
</div>