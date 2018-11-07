<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Associados.php");
require_once("./library/functions.php");

function buscaAssociado($conn, $result) {
	$associados = array();
	$query = "select uniqkey, numeroAssociado, primeiroNome, segundoNome, sobrenome, dataInicioGYO, dataNascimento from tbAssociados where primeiroNome Like '%{$result}%' or segundoNome Like '%{$result}%' or sobrenome Like '%{$result}%'";
	$resultado = mysqli_query($conn,$query);
			while($associados_array = mysqli_fetch_assoc($resultado)) {
				$associado = new Associados();
					$associado->setIdAssociado($associados_array['uniqkey']);
					$associado->setCodAssociado($associados_array['numeroAssociado']);
					$associado->setPrimeiroNome($associados_array['primeiroNome']);
					$associado->setSegundoNome($associados_array['segundoNome']);
					$associado->setSobrenome($associados_array['sobrenome']);
					$associado->setdataNascimento($associados_array['dataNascimento']);
					$associado->setDataInicioGYO($associados_array['dataInicioGYO']);
				array_push($associados,$associado);
		}
		//var_dump($query);
	return $associados;
		
}

function resultBuscaAssociado($conn, $result) {
	$associados = array();
	$query = "select * from tbAssociados where uniqkey = '{$result}'";
	$resultado = mysqli_query($conn,$query);
		if($result!=''){
			while($associados_array = mysqli_fetch_assoc($resultado)) {
				$associado = new Associados();
					$associado->setIdAssociado($associados_array['uniqkey']);
					$associado->setCodAssociado($associados_array['numeroAssociado']);
					$associado->setPrimeiroNome($associados_array['primeiroNome']);
					$associado->setSegundoNome($associados_array['segundoNome']);
					$associado->setSobrenome($associados_array['sobrenome']);
					$associado->setNomeJapones($associados_array['primeiroNomeJapones']);
					$associado->setSegundoNomeJapones($associados_array['segundoNomeJapones']);
					$associado->setSobrenomeJapones($associados_array['sobrenomeJapones']);
					$associado->setIdEstadoCivil($associados_array['idEstadoCivil']);
					$associado->setIdSexo($associados_array['idSexo']);
					$associado->setIdTipoMensalidade($associados_array['idClassificaMensalidade']);
					$associado->setDataNascimento($associados_array['dataNascimento']);
					$associado->setLocalNascimento($associados_array['idCidade']);
					$associado->setLocalAssociacao($associados_array['localAssociacao']);
					$associado->setDataInicioGYO($associados_array['dataInicioGYO']);
					$associado->setCepResid($associados_array['cepResid']);
					$associado->setEnderecoResid($associados_array['enderecoResid']);
					$associado->setNumeroResid($associados_array['numeroResid']);
					$associado->setComplementoResid($associados_array['complementoResid']);
					$associado->setBairroResid($associados_array['bairroResid']);
					$associado->setCidadeResid($associados_array['cidadeResid']);
					$associado->setEstadoResid($associados_array['estadoResid']);
					$associado->setCepCom($associados_array['cepCom']);
					$associado->setEnderecoCom($associados_array['enderecoCom']);
					$associado->setNumeroCom($associados_array['numeroCom']);
					$associado->setComplementoCom($associados_array['complementoCom']);
					$associado->setBairroCom($associados_array['bairroCom']);
					$associado->setCidadeCom($associados_array['cidadeCom']);
					$associado->setEstadoCom($associados_array['estadoCom']);
					$associado->setIdProfissao($associados_array['idProfissao']);
					$associado->setDDDTelefoneResid($associados_array['dddTelefoneResid']);
					$associado->setTelefoneResid($associados_array['telefoneResid']);
					$associado->setDDDTelefoneCel($associados_array['dddTelefoneCel']);
					$associado->setTelefoneCel($associados_array['telefoneCel']);
					$associado->setDDDTelefoneCom($associados_array['dddTelefoneCom']);
					$associado->setTelefoneCom($associados_array['telefoneCom']);
					$associado->setRamalTelefoneCom($associados_array['ramalTelefoneCom']);
					$associado->setDDDTelefoneCom2($associados_array['dddTelefoneCom2']);
					$associado->setTelefoneCom2($associados_array['telefoneCom2']);
					$associado->setRamalTelefoneCom2($associados_array['ramalTelefoneCom2']);
					$associado->setApadrinhamento($associados_array['apadrinhamento']);
					$associado->setApresentador($associados_array['apresentador']);
					$associado->setPresenteGYO($associados_array['presenteGYO']);
					$associado->setEmailAssociado($associados_array['emailAssociado']);
					$associado->setMotivoEntrada($associados_array['motivoEntrada']);
					$associado->setObsAssociado($associados_array['obsAssociado']);
					$associado->setImgFoto($associados_array['imgFoto']);
					$associado->setStatusAssociado($associados_array['idStatusAssociado']);
				array_push($associados,$associado);
			}
		}else{
				$associado = new Associados();
					$associado->setIdAssociado('');
					$associado->setCodAssociado('');
					$associado->setPrimeiroNome('');
					$associado->setSegundoNome('');
					$associado->setSobrenome('');
					$associado->setNomeJapones('');
					$associado->setSegundoNomeJapones('');
					$associado->setSobrenomeJapones('');
					$associado->setIdEstadoCivil(1);
					$associado->setIdSexo('M');
					$associado->setIdTipoMensalidade(1);
					$associado->setDataNascimento('');
					$associado->setLocalNascimento(227);
					$associado->setLocalAssociacao('Agonshu S&#227;o Paulo');
					$associado->setDataInicioGYO(date('Y/m/d'));
					$associado->setCepResid('');
					$associado->setEnderecoResid('');
					$associado->setNumeroResid('');
					$associado->setComplementoResid('');
					$associado->setBairroResid('');
					$associado->setCidadeResid('');
					$associado->setEstadoResid('');
					$associado->setCepCom('');
					$associado->setEnderecoCom('');
					$associado->setNumeroCom('');
					$associado->setComplementoCom('');
					$associado->setBairroCom('');
					$associado->setCidadeCom('');
					$associado->setEstadoCom('');
					$associado->setIdProfissao(3);
					$associado->setDDDTelefoneResid('');
					$associado->setTelefoneResid('');
					$associado->setDDDTelefoneCel('');
					$associado->setTelefoneCel('');
					$associado->setDDDTelefoneCom('');
					$associado->setTelefoneCom('');
					$associado->setRamalTelefoneCom('');
					$associado->setDDDTelefoneCom2('');
					$associado->setTelefoneCom2('');
					$associado->setRamalTelefoneCom2('');
					$associado->setApadrinhamento('');
					$associado->setApresentador('');
					$associado->setPresenteGYO('');
					$associado->setEmailAssociado('');
					$associado->setMotivoEntrada('');
					$associado->setObsAssociado('');
					$associado->setImgFoto('');
					$associado->setStatusAssociado('');
				array_push($associados,$associado);
		}
		//var_dump($query);
	return $associados;
}

function estrelaNascimento($conn, $data){
	$query = "SELECT estrela FROM tbEstrelas WHERE ano = '{$data}'";
	$resultado = mysqli_query($conn,$query);
	$estrela = mysqli_fetch_assoc($resultado);
		//var_dump($resultado);
		return $estrela;
}

function atualizaAssociado($conn, Associados $associado) {
	$query = "update tbAssociados set numeroAssociado = '{$associado->getCodAssociado()}',
			primeiroNome = '{$associado->getPrimeiroNome()}',
			segundoNome = '{$associado->getSegundoNome()}',
			sobrenome = '{$associado->getSobrenome()}',
			primeiroNomeJapones = '{$associado->getNomeJapones()}',
			segundoNomeJapones = '{$associado->getSegundoNomeJapones()}',
			sobrenomeJapones = '{$associado->getSobrenomeJapones()}',
			idsexo = '{$associado->getIdSexo()}',
			idCidade = '{$associado->getLocalNascimento()}',
			dataNascimento = '{$associado->getdataNascimento()}',
			dataInicioGYO = '{$associado->getDataInicioGYO()}',
			idEstadoCivil = '{$associado->getIdEstadoCivil()}',
			localAssociacao = '{$associado->getLocalAssociacao()}',
			idClassificaMensalidade = '{$associado->getIdTipoMensalidade()}',
			cepResid = '{$associado->getCepResid()}',
			enderecoResid = '{$associado->getEnderecoResid()}',
			numeroResid = '{$associado->getNumeroResid()}',
			complementoResid = '{$associado->getComplementoResid()}',
			bairroResid = '{$associado->getBairroResid()}',
			cidadeResid = '{$associado->getCidadeResid()}',
			estadoResid = '{$associado->getEstadoResid()}',
			dddTelefoneResid = '{$associado->getDddTelefoneResid()}',
			telefoneResid = '{$associado->getTelefoneResid()}',
			dddTelefoneCel = '{$associado->getDddTelefoneCel()}',
			telefoneCel = '{$associado->getTelefoneCel()}',
			cepCom = '{$associado->getCepCom()}',
			enderecoCom = '{$associado->getEnderecoCom()}',
			numeroCom = '{$associado->getNumeroCom()}',
			complementoCom = '{$associado->getComplementoCom()}',
			bairroCom = '{$associado->getBairroCom()}',
			cidadeCom = '{$associado->getCidadeCom()}',
			estadoCom = '{$associado->getEstadoCom()}',
			dddTelefoneCom = '{$associado->getDddTelefoneCom()}',
			telefoneCom = '{$associado->getTelefoneCom()}',
			ramalTelefoneCom = '{$associado->getRamalTelefoneCom()}',
			dddTelefoneCom2 = '{$associado->getDddTelefoneCom2()}',
			telefoneCom2 = '{$associado->getTelefoneCom2()}',
			ramalTelefoneCom2 = '{$associado->getRamalTelefoneCom2()}',
			idProfissao = '{$associado->getIdProfissao()}',
			motivoEntrada = '{$associado->getMotivoEntrada()}',
			apresentador = '{$associado->getApresentador()}',
			apadrinhamento = '{$associado->getApadrinhamento()}',
			presenteGYO = '{$associado->getPresenteGYO()}',
			emailAssociado = '{$associado->getEmailAssociado()}',
			obsAssociado = '{$associado->getObsAssociado()}',
			idStatusAssociado = '{$associado->getStatusAssociado()}'
	where uniqkey = {$associado->getIdAssociado()}";
	//	var_dump($query);
	return mysqli_query($conn, $query);
}

function insereAssociado($conn, Associados $associado) {

	$query = "insert into tbAssociados (numeroAssociado,primeiroNome,segundoNome,sobrenome,primeiroNomeJapones,segundoNomeJapones,
			sobrenomeJapones,idSexo,idCidade,dataNascimento,dataInicioGYO,idEstadoCivil,localAssociacao,idClassificaMensalidade,
			cepResid,enderecoResid,numeroResid,complementoResid,bairroResid,cidadeResid,estadoResid,dddTelefoneResid,telefoneResid,
			dddTelefoneCel,telefoneCel,cepCom,enderecoCom,numeroCom,complementoCom,bairroCom,cidadeCom,estadoCom,dddTelefoneCom,
			telefoneCom,ramalTelefoneCom,dddTelefoneCom2,telefoneCom2,ramalTelefoneCom2,idProfissao,motivoEntrada,apresentador,
			apadrinhamento,presenteGYO,emailAssociado,obsAssociado,idStatusAssociado)
			values('{$associado->getCodAssociado()}','{$associado->getPrimeiroNome()}','{$associado->getSegundoNome()}',
			'{$associado->getSobrenome()}','{$associado->getNomeJapones()}','{$associado->getSegundoNomeJapones()}','{$associado->getSobrenomeJapones()}',
			'{$associado->getIdSexo()}',{$associado->getLocalNascimento()},'{$associado->getDataNascimento()}','{$associado->getDataInicioGYO()}',
			{$associado->getIdEstadoCivil()},'{$associado->getLocalAssociacao()}',{$associado->getIdTipoMensalidade()},'{$associado->getCepResid()}',
			'{$associado->getEnderecoResid()}','{$associado->getNumeroResid()}','{$associado->getComplementoResid()}','{$associado->getBairroResid()}',
			'{$associado->getCidadeResid()}','{$associado->getEstadoResid()}','{$associado->getDddTelefoneResid()}','{$associado->getTelefoneResid()}',
			'{$associado->getDddTelefoneCel()}','{$associado->getTelefoneCel()}','{$associado->getCepCom()}','{$associado->getEnderecoCom()}','{$associado->getNumeroCom()}',
			'{$associado->getComplementoCom()}','{$associado->getBairroCom()}','{$associado->getCidadeCom()}','{$associado->getEstadoCom()}',
			'{$associado->getDddTelefoneCom()}','{$associado->getTelefoneCom()}','{$associado->getRamalTelefoneCom()}','{$associado->getDddTelefoneCom2()}',
			'{$associado->getTelefoneCom2()}','{$associado->getRamalTelefoneCom2()}',{$associado->getIdProfissao()},'{$associado->getMotivoEntrada()}',
			'{$associado->getApresentador()}','{$associado->getApadrinhamento()}','{$associado->getPresenteGYO()}','{$associado->getEmailAssociado()}',
			'{$associado->getObsAssociado()}','{$associado->getStatusAssociado()}')";
		var_dump($query);
	return mysqli_query($conn, $query);
}