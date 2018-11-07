<?php
require_once("../bd/conn.php");

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

if(isset($_POST['idMensalidade'])){
	$idMensal = $_POST['idMensalidade'];
}
 
if($acao == "D"){
	$query = $conn->query("DELETE FROM tbMensalidade WHERE idMensalidade = ".$idMensal);
	echo json_encode("<meta http-equiv='refresh' content='0' url='.\mensalidade-associados.php'>");
}
/* NÃO ESTÁ SENDO UTILIZADO NO MOMENTO (BAIXA DE PARCELA)*/
/*
if($acao == "B"){
	
	session_start();
	$idAssoc = $_SESSION["idAssoc"];
	
	$query = $conn->query("UPDATE tbMensalidade set dataBaixaMensalidade = '".date('Y/m/d')."', idUserBaixa = 0 where idMensalidade = ".$idMensal);
	
	$mensalidades = mensalidadesAssociado($conn,$idAssoc);
	foreach($mensalidades as $mensalidade) :		
		$query = $conn->query("CALL CONTABILIZARECEITA ".$idAssoc.",".$mensalidade->getIdTipoReceita.",1,".$mensalidade->getValorMensalidade.",'Baixa de Mensalidade',0)");
	endforeach;
	echo json_encode("<meta http-equiv='refresh' content='0' url='.\mensalidade-associados.php'>");
	//var_dump($query);
}
*/
?>