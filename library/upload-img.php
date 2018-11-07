<?php
require_once("../bd/banco-upload.php");

$idAssoc = $_POST['idAssoc'];
//echo $idAssoc;

/******
 * Upload de imagens
 ******/
 
// verifica se foi enviado um arquivo
if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
    //echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
    //echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
    //echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
    //echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];
 
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
        //$novoNome = uniqid ( time () ) . '.' . $extensao;
 
        // Concatena a pasta com o nome
        $destino = '../imagens/img-associado /' . $nome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
           // echo ' < img src = "' . $destino . '" />';
			if(atualizaImgAssociado($conn, $nome, $idAssoc)) { 
				//echo'<p class="text-success">Atualiza&#231;&#227;o realizada com sucesso!</p>';
			} else {
				$msg = mysqli_error($conn);
				echo'<p class="text-danger">Não foi poss&#237;vel realizar a atualiza&#231;&#227;o do Associado: <?= $msg?></p>';
			}
			?>
			<form action='..\consulta-associados.php' method='POST' id='atualiza-img' name='atualiza-img'>
				<input type='hidden' id='idAssoc' name='idAssoc' value='<?=$idAssoc?>'>
			</form>

			<script>
				document.getElementById('atualiza-img').submit();
			</script>
			<?php
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';