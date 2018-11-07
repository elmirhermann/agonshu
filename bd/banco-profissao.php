<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Profissao.php");
require_once("./library/functions.php");

function buscaProfissao($conn,$idProfissao) {
	$profissao = array();
	
	if($idProfissao){
		$query = "select * from tbProfissao where idProfissao = {$idProfissao} and  statusProfissao = 1 order by 2";
	}else{
		$query = "select * from tbProfissao where statusProfissao = 1 order by 2";
	}
	
	$resultado = mysqli_query($conn,$query);
			while($profissao_array = mysqli_fetch_assoc($resultado)) {
				$pro = new Profissao();
					$pro->setIdProfissao($profissao_array['idProfissao']);
					$pro->setProfissao($profissao_array['profissao']);
					$pro->setStatusProfissao($profissao_array['statusProfissao']);
				array_push($profissao,$pro);
		}
		//var_dump($query);
	return $profissao;
}