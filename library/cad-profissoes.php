<?php
require_once("../bd/conn.php");

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

if(isset($_POST['idProfissao'])){
	$idProfissao = $_POST['idProfissao'];
}

if(isset($_POST['profissao'])){
	$profissao = $_POST['profissao'];
}
 
if($acao == "I"){
    $query = $conn->query("insert into tbProfissao(profissao, statusProfissao) values (upper('".$profissao."'),1) ");
    echo json_encode("<meta http-equiv='refresh' content='0' url='.\cad-profissoes.php'>");
}

if($acao == "D"){
$query = $conn->query("delete from tbProfissao where idProfissao = '".$idProfissao."';");
	echo json_encode("<meta http-equiv='refresh' content='0' url='.\cad-profissoes.php'>");
}
?>