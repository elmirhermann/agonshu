<?php
require_once("../bd/conn.php");

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

if(isset($_POST['codCurso'])){
	$codCurso = $_POST['codCurso'];
}
if(isset($_POST['idAssoc'])){
	$idAssoc = $_POST['idAssoc'];
}

if(isset($_POST['curso'])){
	$curso = $_POST['curso'];
}

if(isset($_POST['dataCurso'])){
	$dataCurso = $_POST['dataCurso'];
}
 
if($acao == "I"){
    $query = $conn->query("insert into tbCursosRealizados(idCurso,idAssociado,dataRealizaCurso) values (".$curso.",".$idAssoc.",'".$dataCurso."') ");
    echo json_encode("<meta http-equiv='refresh' content='0' url='.\cursos-associados.php'>");
}

if($acao == "D"){
$query = $conn->query("delete from tbCursosRealizados where uniqkey = ".$codCurso);
	echo json_encode("<meta http-equiv='refresh' content='0' url='.\cursos-associados.php'>");
}
?>