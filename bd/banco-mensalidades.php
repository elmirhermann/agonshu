<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Mensalidades.php");
//require_once("./library/functions.php");

/*************************/
/* MENSALIDADE ASSOCIADO */
/*************************/

function insereMensalidade($conn, $qtdMensalidade, Mensalidades $mensalidade){
	$query = $conn->query("CALL INSEREMENSALIDADE (".$mensalidade->getIdAssoc().",'".$mensalidade->getDataMensalidade()."',".$mensalidade->getIdTipoMensalidade().",'".$mensalidade->getObsMensalidade()."',".$mensalidade->getIdUser().",".$qtdMensalidade.",".$mensalidade->getValorMensalidade().")");
	//var_dump("CALL INSEREMENSALIDADE (".$mensalidade->getIdAssoc().",'".$mensalidade->getDataMensalidade()."',".$mensalidade->getIdTipoMensalidade().",'".$mensalidade->getObsMensalidade()."',".$mensalidade->getIdUser().",".$qtdMensalidade.",".$mensalidade->getValorMensalidade().")");
}

function buscaTipoMensalidade($conn,$idAssoc){
	$mensalidades = array();
	if($idAssoc){
		$query = "select b.idTipoReceita as idTipoMensalidade, b.apelidoTipoReceita as tipoMensalidade, b.valorTipoReceita as valorMensalidade from tbAssociados a inner join tbTipoReceita b on b.idTipoReceita = a.idClassificaMensalidade where a.uniqkey = {$idAssoc} and b.idClassificaReceita = 3 and b.statusTipoReceita = 1";
	}else{
		$query = "select b.idTipoReceita as idTipoMensalidade, b.apelidoTipoReceita as tipoMensalidade, b.valorTipoReceita as valorMensalidade from tbTipoReceita b where b.idClassificaReceita = 3 and b.statusTipoReceita = 1";
	}
	$resultado = mysqli_query($conn,$query);
		while($mensalidades_array = mysqli_fetch_assoc($resultado)){
			$mensalidade = new Mensalidades();
				$mensalidade->setIdTipoMensalidade($mensalidades_array['idTipoMensalidade']);
				$mensalidade->setTipoMensalidade($mensalidades_array['tipoMensalidade']);
				$mensalidade->setValorMensalidade($mensalidades_array['valorMensalidade']);
			array_push($mensalidades,$mensalidade);
		}
		//var_dump($query);
	return $mensalidades;
}

function mensalidadesAssociado($conn, $idAssoc){
	$mensalidades = array();
	
		$query = "select	a.idMensalidade, a.dataMensalidade, a.obsMensalidade,
							b.apelidoTipoReceita, c.usuario as userCriacao, b.idTipoReceita,
							a.valorMensalidade
				  from	tbMensalidade a
						inner join tbTipoReceita b on b.idTipoReceita = a.idTipoMensalidade
						left join tbUsuarios c on c.idUser = a.idUser
				  where a.idAssociado = {$idAssoc} and b.idClassificaReceita = 3 order by 2";
		$resultado = mysqli_query($conn,$query);
			while($mensalidades_array = mysqli_fetch_assoc($resultado)){
				$mensalidade = new Mensalidades();
					$mensalidade->setIdMensalidade($mensalidades_array['idMensalidade']);
					$mensalidade->setDataMensalidade($mensalidades_array['dataMensalidade']);
					$mensalidade->setObsMensalidade($mensalidades_array['obsMensalidade']);
					$mensalidade->setTipoMensalidade($mensalidades_array['apelidoTipoReceita']);
					$mensalidade->setUser($mensalidades_array['userCriacao']);
					$mensalidade->setIdTipoReceita($mensalidades_array['idTipoReceita']);
					$mensalidade->setValorMensalidade($mensalidades_array['valorMensalidade']);
				//var_dump($resultado);
				array_push($mensalidades, $mensalidade);
			}
		return $mensalidades;
}


/************************/
/* MENSALIDADE RAGARAJA */
/************************/

function mensalidadeRagaraja($conn){
	$ragaraja = array();
	$query = "SELECT valorTipoReceita FROM tbTipoReceita WHERE idTipoReceita = 57";
	$resultado = mysqli_query($conn,$query);
		while($ragaraja_array = mysqli_fetch_assoc($resultado)){
			$mensalidade = new Mensalidades();
				$mensalidade->setValorMensalidade($ragaraja_array['valorTipoReceita']);
			array_push($ragaraja, $mensalidade);
		}
		return $ragaraja;
}

function mensalidadesRagaraja($conn, $idAssoc){
	$mensalidades = array();
	
		$query = "select	a.idRagaraja, a.dataAssociacao, c.usuario as userCriacao, a.valorMensalidade
				  from	tbRagaraja a
						left join tbUsuarios c on c.idUser = a.idUser
				  where a.idAssociado = {$idAssoc} order by 2";
		$resultado = mysqli_query($conn,$query);
			while($mensalidades_array = mysqli_fetch_assoc($resultado)){
				$mensalidade = new Mensalidades();
					$mensalidade->setIdMensalidade($mensalidades_array['idMensalidade']);
					$mensalidade->setDataMensalidade($mensalidades_array['dataMensalidade']);
					$mensalidade->setObsMensalidade($mensalidades_array['obsMensalidade']);
					$mensalidade->setTipoMensalidade($mensalidades_array['apelidoTipoReceita']);
					$mensalidade->setUser($mensalidades_array['userCriacao']);
					$mensalidade->setIdTipoReceita($mensalidades_array['idTipoReceita']);
					$mensalidade->setValorMensalidade($mensalidades_array['valorMensalidade']);
				//var_dump($resultado);
				array_push($mensalidades, $mensalidade);
			}
		return $mensalidades;
}