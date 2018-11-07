<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Receitas.php");
require_once("./library/functions.php");

function buscaTiposReceitas($conn) {
	$tipoReceitas = array();
	$query = "select * from tbTipoReceita where statusTipoReceita = 1 and idClassificaReceita not in(0,3) order by 1";
	$resultado = mysqli_query($conn,$query);
		while($receitas_array = mysqli_fetch_assoc($resultado)){
			$tiporeceita = new Receitas();
				$tiporeceita->setIdTipoReceita($receitas_array['idTipoReceita']);
				$tiporeceita->setTipoReceita($receitas_array['tipoReceita']);
				$tiporeceita->setValorTipoReceita($receitas_array['valorTipoReceita']);
				$tiporeceita->setClassificacaoReceita($receitas_array['classificacaoReceita']);
				$tiporeceita->setStatusTipoReceita($receitas_array['statusTipoReceita']);
			array_push($tipoReceitas,$tiporeceita);
		}
		//var_dump($query);
	return $tipoReceitas;
}

function buscaClassificaReceitas($conn, $status){
	$classificaReceitas = array();
	$query = "select * from tbClassificaReceita where statusClassificacaoReceita = {$status}";
	$resultado = mysqli_query($conn,$query);
		while($classifica_array = mysqli_fetch_assoc($resultado)){
			$classificaReceita = new Receitas();
				$classificaReceita->setIdClassificacaoReceita($classifica_array['idClassificacaoReceita']);
				$classificaReceita->setClassificacaoReceita($classifica_array['classificacaoReceita']);
				$classificaReceita->setStatusClassificacaoReceita($classifica_array['statusClassificacaoReceita']);
			array_push($classificaReceitas, $classificaReceita);
		}
	//var_dump($query);
	return $classificaReceitas;
}

function receitasAssociados($conn,$idAssoc){
	 $receitas = array();
	 $query = "SELECT A.*, B.tipoReceita FROM tbReceitas A INNER JOIN tbTipoReceita B ON B.idTipoReceita = A.idTipoReceita WHERE idAssociado = {$idAssoc} AND statusRecebivel not in (2)";
	 $resultado = mysqli_query($conn,$query);
		 while($receitas_array = mysqli_fetch_assoc($resultado)){
			 $receita = new Receitas();
				 $receita->setUniqkey($receitas_array['uniqkey']);
				 $receita->setIdReceita($receitas_array['idReceita']);
				 $receita->setTipoReceita($receitas_array['tipoReceita']);
				 $receita->setIdAssociado($receitas_array['idAssociado']);
				 $receita->setDataRegistro($receitas_array['dataRegistro']);
				 $receita->setIdTipoReceita($receitas_array['idTipoReceita']);
				 $receita->setQtdItemReceita($receitas_array['qtdItemReceita']);
				 $receita->setValorUnitario($receitas_array['valorUnitario']);
				 $receita->setValorTotal($receitas_array['valorTotal']);
				 $receita->setObsReceita($receitas_array['obsReceita']);
				 $receita->setStatusRecebivel($receitas_array['statusRecebivel']);
				 $receita->setStatusTransacao($receitas_array['statusTransacao']);
				 $receita->setIdUser($receitas_array['idUser']);
			 array_push($receitas,$receita);
		 }
		//var_dump($query);
	 return $receitas;
}

function buscaReceitas($conn,$status){
	$receitas = array();
	$query = "SELECT A.*, B.* FROM tbTipoReceita A INNER JOIN tbClassificaReceita B ON B.idClassificacaoReceita = A.idClassificaReceita WHERE A.statusTipoReceita = {$status}";
	$resultado = mysqli_query($conn,$query);
		while($array = mysqli_fetch_assoc($resultado)){
			$receita = new Receitas();
				$receita->setIdTipoReceita($array['idTipoReceita']);
				$receita->setTipoReceita($array['tipoReceita']);
				$receita->setValorTipoReceita($array['valorTipoReceita']);
				$receita->setStatusTipoReceita($array['statusTipoReceita']);
				$receita->setIdClassificacaoReceita($array['idClassificaReceita']);
				$receita->setClassificacaoReceita($array['classificacaoReceita']);
				$receita->setStatusClassificacaoReceita($array['statusClassificacaoReceita']);
			array_push($receitas, $receita);
		}
	//var_dump($query);
	return $receitas;
}

// function insereCurso($conn,$idAssoc,$curso,$dataCurso){
	 // $query = $conn->query("insert into tbCursosRealizados(idCurso,idAssociado,dataRealizaCurso) values ({$curso},{$idAssoc},'{$dataCurso}') ");
		// //var_dump($query);
    // //echo json_encode("<meta http-equiv='refresh' content='0' url='.\cursos-associados.php'>");
	// echo "<script>window.refresh();</script>";
// }