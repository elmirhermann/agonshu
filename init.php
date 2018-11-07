<?php

require_once("bd\banco-usuario.php");

/* validação do Usuário */
$usuario = $_POST['inputUser'];
$senha = $_POST['inputPassword'];

	$usuarios = buscaUsuario($conn,$usuario,$senha);
		foreach($usuarios as $usu) :
			$idUser = $usu->getIdUser();
			$nameUser = $usu->getNomeUser();
		endforeach
?>

<?php
	if(isset($idUser)){
		session_start();
		$_SESSION["idUser"] = $idUser;
		$_SESSION["nameUser"] = $nameUser;
?>
		<meta http-equiv="refresh" content="0; url=.\init2.php">
<?php
	}else{
		echo("Usuário Não tem Permissão para Acessar o Sistema.");
?>
		<meta http-equiv='refresh' content="3; url=.\index.php">
<?php
		}
?>