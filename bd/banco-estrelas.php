<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Estrelas.php");
require_once("./library/functions.php");

function buscaEstrela($conn){
	$estrelas = array();
	$query = "select * from tbEstrelas order by 1 desc limit 20";
	$resultado = mysqli_query($conn,$query);
		while($estrelas_array = mysqli_fetch_assoc($resultado)){
			$estrela = new Estrelas();
				$estrela->setAno($estrelas_array['ano']);
				$estrela->setSignoChines($estrelas_array['signoChines']);
				$estrela->setEstrela($estrelas_array['estrela']);
				$estrela->setElemento($estrelas_array['elemento']);
				$estrela->setCor($estrelas_array['cor']);
			array_push($estrelas, $estrela);
		}
	//var_dump($query);
	return $estrelas;
}