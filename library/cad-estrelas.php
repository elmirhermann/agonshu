<?php
require_once("../bd/conn.php");

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

if(isset($_POST['ano'])){
	$ano = $_POST['ano'];
}

if(isset($_POST['signoChines'])){
	$signoChines = $_POST['signoChines'];
}

if(isset($_POST['estrela'])){
	$estrela = $_POST['estrela'];
}

if(isset($_POST['elemento'])){
	$elemento = $_POST['elemento'];
}

if(isset($_POST['cor'])){
	$cor = $_POST['cor'];
}

 
if($acao == "I"){
    $query = $conn->query("insert into tbEstrelas(ano,signoChines,estrela,elemento,cor) values ('".$ano."','".$signoChines."','".$estrela."','".$elemento."','".$cor."') ");
    echo json_encode("<meta http-equiv='refresh' content='0' url='.\cad-estrelas.php'>");
}

if($acao == "D"){
$query = $conn->query("delete from tbEstrelas where ano = '".$ano."';");
	echo json_encode("<meta http-equiv='refresh' content='0' url='.\cad-estrelas.php'>");
}
?>