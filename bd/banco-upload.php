<?php
//header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("../class/Associados.php");
require_once("../library/functions.php");

function atualizaImgAssociado($conn, $novoNome, $idAssoc){
		$query = "update tbAssociados set imgFoto ='{$novoNome}' where uniqkey = {$idAssoc} ;";
	return mysqli_query($conn, $query);
}