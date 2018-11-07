<?php
require_once("cabecalho.php");
require_once("bd/banco-associados.php");
require_once("bd/banco-estadocivil.php");
require_once("class/Associados.php");
require_once("class/EstadoCivil.php");

$acao = $_POST['acao'];
$idAssoc = $_POST['idAssoc'];
$codAssociado = $_POST['codAssociado'];
$dtIniGYO = $_POST['dtIniGYO'];
$tipoMensalidade = $_POST['mensalidade'];
$dtnasc = $_POST['dtnasc'];
$idLocalNascimento = $_POST['idLocalNascimento'];
$nomePrimeiro = $_POST['nomePrimeiro'];
$nomeSegundo = $_POST['nomeSegundo'];
$sobreNome = $_POST['sobreNome'];
$nomePrimeiroJap = $_POST['nomePrimeiroJap'];
$nomeSegundoJap = $_POST['nomeSegundoJap'];
$sobrenomeJap = $_POST['sobrenomeJap'];
$estadocivil = $_POST['estadocivil'];
$sexo = $_POST['sexo'];
$dddTelResid = $_POST['dddTelResid'];
$telefoneResid = $_POST['telefoneResid'];
$dddTelCel = $_POST['dddTelCel'];
$telefonecel = $_POST['telefoneCel'];
$email = $_POST['email'];
$cepResid = $_POST['cepResid'];
$ruaResid = $_POST['ruaResid'];
$numeroResid = $_POST['numeroResid'];
$complementoResid = $_POST['complementoResid'];
$bairroResid = $_POST['bairroResid'];
$cidadeResid = $_POST['cidadeResid'];
$ufResid = $_POST['ufResid'];
$profissao = $_POST['profissao'];
$dddTelCom = $_POST['dddTelCom'];
$telefoneCom = $_POST['telefoneCom'];
$ramalTelefoneCom = $_POST['ramalTelefoneCom'];
$dddTelefoneCom2 = $_POST['dddTelefoneCom2'];
$telefoneCom2 = $_POST['telefoneCom2'];
$ramalTelefoneCom2 = $_POST['ramalTelefoneCom2'];
$cepCom = $_POST['cepCom'];
$ruaCom = $_POST['ruaCom'];
$numeroCom = $_POST['numeroCom'];
$complementoCom = $_POST['complementoCom'];
$bairroCom = $_POST['bairroCom'];
$cidadeCom = $_POST['cidadeCom'];
$ufCom = $_POST['ufCom'];
$apresentador = $_POST['apresentador'];
$padrinho = $_POST['padrinho'];
$presenteGYO = $_POST['presenteGYO'];
$obs = $_POST['obs'];
$motivoEntrada = $_POST['motivoEntrada'];

	$associado = new Associados();

	$associado->setIdAssociado($idAssoc);
	$associado->setCodAssociado($codAssociado);
	$associado->setPrimeiroNome($nomePrimeiro);
	$associado->setSegundoNome($nomeSegundo);
	$associado->setSobrenome($sobreNome);
	$associado->setNomeJapones($nomePrimeiroJap);
	$associado->setSegundoNomeJapones($nomeSegundoJap);
	$associado->setSobrenomeJapones($sobrenomeJap);
	$associado->setIdEstadoCivil($estadocivil);
	$associado->setIdSexo($sexo);
	$associado->setIdTipoMensalidade($tipoMensalidade);
	$associado->setDataNascimento(dateTimeToUS($dtnasc));
	$associado->setLocalNascimento($idLocalNascimento);
	$associado->setLocalAssociacao('AGONSHU SÃO PAULO');
	$associado->setDataInicioGYO(dateToUS($dtIniGYO));
	$associado->setCepResid($cepResid);
	$associado->setEnderecoResid($ruaResid);
	$associado->setNumeroResid($numeroResid);
	$associado->setComplementoResid($complementoResid);
	$associado->setBairroResid($bairroResid);
	$associado->setCidadeResid($cidadeResid);
	$associado->setEstadoResid($ufResid);
	$associado->setDDDTelefoneResid($dddTelResid);
	$associado->setTelefoneResid($telefoneResid);
	$associado->setDDDTelefoneCel($dddTelCel);
	$associado->setTelefoneCel($telefonecel);
	$associado->setCepCom($cepCom);
	$associado->setEnderecoCom($ruaCom);
	$associado->setNumeroCom($numeroCom);
	$associado->setComplementoCom($complementoCom);
	$associado->setBairroCom($bairroCom);
	$associado->setCidadeCom($cidadeCom);
	$associado->setEstadoCom($ufCom);
	$associado->setIdProfissao($profissao);
	$associado->setDDDTelefoneCom($dddTelCom);
	$associado->setTelefoneCom($telefoneCom);
	$associado->setRamalTelefoneCom($ramalTelefoneCom);
	$associado->setDDDTelefoneCom2($dddTelefoneCom2);
	$associado->setTelefoneCom2($telefoneCom2);
	$associado->setRamalTelefoneCom2($ramalTelefoneCom2);
	$associado->setApresentador($apresentador);
	$associado->setApadrinhamento($padrinho);
	$associado->setPresenteGYO($presenteGYO);
	$associado->setEmailAssociado($email);
	$associado->setMotivoEntrada($motivoEntrada);
	$associado->setObsAssociado($obs);
	//$associado->setstatusAssociado;

		if($acao == "u"){
			$exec = "atualizaAssociado";
			$txt = "Atualizado";
		}else{
			$exec = "insereAssociado";
			$txt = "Cadastrado";
		}
			if($exec($conn, $associado)) { ?>
				<p class="text-success">Associado <?=$txt?> com Sucesso!</p>
				<form action='consulta-associados.php' method='POST' id='atualiza' name='atualiza'>
					<input type='hidden' id='idAssoc' name='idAssoc' value='<?=$idAssoc?>'>
				</form>

			<script>
				document.getElementById('atualiza').submit();
			</script>
			<?php 
			} else {
				$msg = mysqli_error($conn);
			?>
				<p class="text-danger">Associado não <?=$txt?>: <?= $msg?></p>
			<?php
			}
			?>