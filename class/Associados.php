<?php
class Associados{
	private $idAssociado;
	private $codAssociado;
	private $imgFoto;
	private $primeiroNome;
	private $segundoNome;
	private $sobrenome;
	private $nomeJapones;
	private $segundoNomeJapones;
	private $sobrenomeJapones;
	private $idEstadoCivil;
	private $idSexo;
	private $idTipoMensalidade;
	private $dataNascimento;
	private $localNascimento;
	private $localAssociacao;
	private $dataInicioGYO;
	private $cepResid;
	private $enderecoResid;
	private $numeroResid;
	private $complementoResid;
	private $bairroResid;
	private $cidadeResid;
	private $estadoResid;
	private $dddTelefoneResid;
	private $telefoneResid;
	private $dddTelefoneCel;
	private $telefoneCel;
	private $cepCom;
	private $enderecoCom;
	private $numeroCom;
	private $complementoCom;
	private $bairroCom;
	private $cidadeCom;
	private $estadoCom;
	private $idProfissao;
	private $dddTelefoneCom;
	private $telefoneCom;
	private $ramalTelefoneCom;
	private $dddTelefoneCom2;
	private $telefoneCom2;
	private $ramalTelefoneCom2;
	private $apresentador;
	private $apadrinhamento;
	private $presenteGYO;
	private $emailAssociado;
	private $motivoEntrada;
	private $obsAssociado;
	private $statusAssociado;


	public function getIdAssociado() {
		return $this-> idAssociado;
	}

	public function setIdAssociado($idAssociado) {
		$this->idAssociado = $idAssociado;
	}

	public function getCodAssociado(){
		return $this-> codAssociado;
	}

	public function setCodAssociado($codAssociado){
		$this->codAssociado = $codAssociado;
	}

	public function getImgFoto(){
		return $this-> imgFoto;
	}
	
	public function setImgFoto($imgFoto){
		$this->imgFoto = $imgFoto;
	}
	
	public function getPrimeiroNome(){
		return $this->primeiroNome;
	}

	public function setPrimeiroNome($primeiroNome){
		$this->primeiroNome = $primeiroNome;
	}

	public function getSegundoNome(){
		return $this->segundoNome;
	}

	public function setSegundoNome($segundoNome){
		$this->segundoNome = $segundoNome;
	}

	public function getSobrenome(){
		return $this->sobrenome;
	}

	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

	public function getNomeCompleto(){
		return $this->primeiroNome." ".$this->segundoNome." ".$this->sobrenome;
	}

	public function getNomeJapones(){
		return $this->nomeJapones;
	}
	
	public function getSegundoNomeJapones(){
		return $this->segundoNomeJapones;
	}
	
	public function setSegundoNomeJapones($segundoNomeJapones){
		$this->segundoNomeJapones = $segundoNomeJapones;
	}

	public function setNomeJapones($nomeJapones){
		$this->nomeJapones = $nomeJapones;
	}

	public function getSobrenomeJapones(){
		return $this->sobrenomeJapones;
	}

	public function setSobrenomeJapones($sobrenomeJapones){
		$this->sobrenomeJapones = $sobrenomeJapones;
	}

	public function getNomeCompletoJapones(){
		return $this->sobrenomeJapones.", ".$this->nomeJapones;
	}
	
	public function getIdEstadoCivil(){
		return $this->idEstadoCivil;
	}
	
	public function setIdEstadoCivil($idEstadoCivil){
		$this->idEstadoCivil = $idEstadoCivil;
	}
	
	public function getIdSexo(){
		return $this->idSexo;
	}
	
	public function setIdSexo($idSexo){
		$this->idSexo = $idSexo;
	}
	
	public function getIdTipoMensalidade(){
		return $this->idTipoMensalidade;
	}
	
	public function setIdTipoMensalidade($idTipoMensalidade){
		$this->idTipoMensalidade = $idTipoMensalidade;
	}
	
	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
	}
	
	public function getLocalNascimento(){
		return $this->localNascimento;
	}
	
	public function setLocalNascimento($localNascimento){
		$this->localNascimento = $localNascimento;
	}
	
	public function getLocalAssociacao(){
		return $this->localAssociacao;
	}
	
	public function setLocalAssociacao($localAssociacao){
		$this->localAssociacao = $localAssociacao;
	}

	public function getDataInicioGYO(){
		return $this->dataInicioGYO;
	}

	public function setDataInicioGYO($dataInicioGYO){
		$this->dataInicioGYO = $dataInicioGYO;
	}
	
	public function getCepResid(){
		return $this->cepResid;
	} 
	
	public function setCepResid($cepResid){
		$this->cepResid = $cepResid;
	}
	
	public function getEnderecoResid(){
		return $this->enderecoResid;
	}
	
	public function setEnderecoResid($enderecoResid){
		$this->enderecoResid = $enderecoResid;
	}
	
	public function getNumeroResid(){
		return $this->numeroResid;
	}
	
	public function setNumeroResid($numeroResid){
		$this->numeroResid = $numeroResid;
	}
	
	public function getComplementoResid(){
		return $this->complementoResid;
	}
	
	public function setComplementoResid($complementoResid){
		$this->complementoResid = $complementoResid;
	}
	
	public function getBairroResid(){
		return $this->bairroResid;
	}
	
	public function setBairroResid($bairroResid){
		$this->bairroResid = $bairroResid;
	}
	
	public function getCidadeResid(){
		return $this->cidadeResid;
	}
	
	public function setCidadeResid($cidadeResid){
		$this->cidadeResid = $cidadeResid;
	}
	
	public function getEstadoResid(){
		return $this->estadoResid;
	}
	
	public function setEstadoResid($estadoResid){
		$this->estadoResid = $estadoResid;
	}

	public function getDDDTelefoneResid(){
		return $this->dddTelefoneResid;
	}

	public function setDDDTelefoneResid($dddTelefoneResid){
		$this->dddTelefoneResid = $dddTelefoneResid;
	}

	public function getTelefoneResid(){
		return $this->telefoneResid;
	}

	public function setTelefoneResid($telefoneResid){
		$this->telefoneResid = $telefoneResid;
	}
	
	public function getTelefoneResidCompleto(){
		return '('.$this->dddTelefoneResid.') '.$this->telefoneResid;
	}

	public function getDDDTelefoneCel(){
		return $this->dddTelefoneCel;
	}

	public function setDDDTelefoneCel($dddTelefoneCel){
		$this->dddTelefoneCel = $dddTelefoneCel;
	}

	public function getTelefoneCel(){
		return $this->telefoneCel;
	}

	public function setTelefoneCel($telefoneCel){
		$this->telefoneCel = $telefoneCel;
	}
	
	public function getTelefoneCelCompleto(){
		return '('.$this->dddTelefoneCel.') '.$this->telefoneCel;
	}
	
	public function getCepCom(){
		return $this->cepCom;
	}
	
	public function setCepCom($cepCom){
		$this->cepCom = $cepCom;
	}
	
	public function getEnderecoCom(){
		return $this->enderecoCom;
	}
	
	public function setEnderecoCom($enderecoCom){
		$this->enderecoCom = $enderecoCom;
	}
	
	public function getNumeroCom(){
		return $this->numeroCom;
	}
	
	public function setNumeroCom($numeroCom){
		$this->numeroCom = $numeroCom;
	}
	
	public function getComplementoCom(){
		return $this->complementoCom;
	}
	
	public function setComplementoCom($complementoCom){
		$this->complementoCom = $complementoCom;
	}
	
	public function getBairroCom(){
		return $this->bairroCom;
	}
	
	public function setBairroCom($bairroCom){
		$this->bairroCom = $bairroCom;
	}
	
	public function getCidadeCom(){
		return $this->cidadeCom;
	}
	
	public function setCidadeCom($cidadeCom){
		$this->cidadeCom = $cidadeCom;
	}
	
	public function getEstadoCom(){
		return $this->estadoCom;
	}
	
	public function setEstadoCom($estadoCom){
		$this->estadoCom = $estadoCom;
	}

	public function getIdProfissao(){
		return $this->idProfissao;
	}
	
	public function setIdProfissao($idProfissao){
		$this->idProfissao = $idProfissao;
	}
	
	public function getDDDTelefoneCom(){
		return $this->dddTelefoneCom;
	}

	public function setDDDTelefoneCom($dddTelefoneCom){
		$this->dddTelefoneCom = $dddTelefoneCom;
	}

	public function getTelefoneCom(){
		return $this->telefoneCom;
	}

	public function setTelefoneCom($telefoneCom){
		$this->telefoneCom = $telefoneCom;
	}

	public function getRamalTelefoneCom(){
		return $this->ramalTelefoneCom;
	}

	public function setRamalTelefoneCom($ramalTelefoneCom){
		$this->ramalTelefoneCom = $ramalTelefoneCom;
	}

	public function getDDDTelefoneCom2(){
		return $this->dddTelefoneCom2;
	}

	public function setDDDTelefoneCom2($dddTelefoneCom2){
		$this->dddTelefoneCom2 = $dddTelefoneCom2;
	}

	public function getTelefoneCom2(){
		return $this->telefoneCom2;
	}

	public function setTelefoneCom2($telefoneCom2){
		$this->telefoneCom2 = $telefoneCom2;
	}
	
	public function getRamalTelefoneCom2(){
		return $this->ramalTelefoneCom2;
	}
	
	public function getTelefoneComCompleto(){
		if($this->telefoneCom){
			if($this->telefoneCom2){
				return '('.$this->dddTelefoneCom.') '.$this->telefoneCom .' Ramal: '.$this->ramalTelefonecom.' / '.
				'('.$this->dddTelefoneCom2.') '.$this->telefoneCom2 .' Ramal: '.$this->ramalTelefonecom2;
			}else{
				return '('.$this->dddTelefoneCom.') '.$this->telefoneCom .' Ramal: '.$this->ramalTelefoneCom;
			}
		}
	}
	
	public function setRamalTelefoneCom2($ramalTelefoneCom2){
		$this->ramalTelefoneCom2 = $ramalTelefoneCom2;
	}

	public function getApresentador(){
		return $this->apresentador;
	}

	public function setApresentador($apresentador){
		$this->apresentador = $apresentador;
	}

	public function getApadrinhamento(){
		return $this->apadrinhamento;
	}

	public function setApadrinhamento($apadrinhamento){
		$this->apadrinhamento = $apadrinhamento;
	}

	public function getPresenteGYO(){
		return $this->presenteGYO;
	}

	public function setPresenteGYO($presenteGYO){
		$this->presenteGYO = $presenteGYO;
	}

	public function getEmailAssociado(){
		return $this->emailAssociado;
	}

	public function setEmailAssociado($emailAssociado){
		$this->emailAssociado = $emailAssociado;
	}

	public function getMotivoEntrada(){
		return $this->motivoEntrada;
	}
	
	public function setMotivoEntrada($motivoEntrada){
		$this->motivoEntrada = $motivoEntrada;
	}
	
	public function getObsAssociado(){
		return $this->obsAssociado;
	}

	public function setObsAssociado($obsAssociado){
		$this->obsAssociado = $obsAssociado;
	}

	public function getStatusAssociado(){
		return $this->statusAssociado;
	}

	public function setStatusAssociado($statusAssociado){
		$this->statusAssociado = $statusAssociado;
	}

}
