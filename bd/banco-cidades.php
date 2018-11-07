<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Cidades.php");
require_once("./library/functions.php");

function buscaCidade($conn,$idCidade) {
	$cidades = array();
	if($idCidade){
		$query = "select * from tbCidades where idCidade = {$idCidade} and  statusCidade = 1 order by cidade";
	}else{
		$query = "select * from tbCidades where statusCidade = 1 order by cidade";
	}
	$resultado = mysqli_query($conn,$query);
			while($cidades_array = mysqli_fetch_assoc($resultado)) {
				$cidade = new Cidades();
					$cidade->setIdCidade($cidades_array['idCidade']);
					$cidade->setCidade($cidades_array['cidade']);
					$cidade->setEstadoCidade($cidades_array['estadoCidade']);
					$cidade->setStatusCidade($cidades_array['statusCidade']);
				array_push($cidades,$cidade);
		}
		//var_dump($query);
	return $cidades;
}

function buscaCidadesInativas($conn) {
	$cidades = array();
		$query = "select * from tbCidades where statusCidade = 0 order by cidade";
	$resultado = mysqli_query($conn,$query);
			while($cidades_array = mysqli_fetch_assoc($resultado)) {
				$cidade = new Cidades();
					$cidade->setIdCidade($cidades_array['idCidade']);
					$cidade->setCidade($cidades_array['cidade']);
					$cidade->setEstadoCidade($cidades_array['estadoCidade']);
					$cidade->setStatusCidade($cidades_array['statusCidade']);
				array_push($cidades,$cidade);
		}
		//var_dump($query);
	return $cidades;
}


function insereCidade($conn,$cidade,$uf,$status) {
	$query = "INSERT INTO tbCidades(cidade,estadoCidade,statusCidade) values(upper('{$cidade}'),upper('{$uf}'),0)";
	return mysqli_query($conn, $query);
}

