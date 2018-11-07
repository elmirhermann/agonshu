<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/EstadoCivil.php");
require_once("./library/functions.php");

function buscaEstadoCivil($conn,$idEstado) {
	$estadoCivil = array();
	if($idEstado){
		$query = "select * from tbEstadoCivil where idEstadoCivil = '{$idEstado}' and  statusEstadoCivil = 1";
	}else{
		$query = "select * from tbEstadoCivil where  statusEstadoCivil = 1";
	}
	$resultado = mysqli_query($conn,$query);
			while($estadoCivil_array = mysqli_fetch_assoc($resultado)) {
				$ec = new EstadoCivil();
					$ec->setIdEstadoCivil($estadoCivil_array['idEstadoCivil']);
					$ec->setEstadoCivil($estadoCivil_array['estadoCivil']);
					$ec->setStatusEstadoCivil($estadoCivil_array['statusEstadoCivil']);
				array_push($estadoCivil,$ec);
		}
		//var_dump($query);
	return $estadoCivil;
}