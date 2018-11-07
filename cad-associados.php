<html>
<head>
<?php
//require_once("cabecalho.php");
include("head.php");
?>
</head>
<?php
include("bd.php");
$result = $_POST['idAssoc'];
?>
<body style="overflow-x:hidden;">
<?php
if($result){
	$acao = 'u';
}else{
	$acao = 'i';
}

$associados = resultBuscaAssociado($conn, $result);
	foreach($associados as $associado) :
?>
<iframe id="ifm-aux" name="ifm-aux" style="display:none;"></iframe>
<div>
	<center><h2>Cadastro de Novo Associado</h2>
	<br>
	<br>
	<form name="frm-cad-assoc" id="frm-cad-assoc" action="save-cad-associado.php" method="POST">
	<input type="hidden" id="idAssoc" name="idAssoc" value="<?=$associado->getIdAssociado();?>">
	<input type="hidden" id="acao" name="acao" value="<?=$acao?>">
	<table class="table-responsive text-10">
		<tbody>
			<tr>
				<th nowrap>C&#243;d. Associado</th>
				<td><input class="formulario input-sm text-center" type="text" id="codAssociado" name="codAssociado" value="<?=$associado->getCodAssociado();?>"></td>
				<th nowrap>Data de In&#237;cio GYO</th>
				<td>
					<form class="form-horizontal" method="post">
					   <input class="formulario input-sm text-center" id="dtIniGYO" name="dtIniGYO" placeholder="MM/DD/YYYY"  value="<?=dateToBR($associado->getDataInicioGYO());?>" type="text"/>
					</form>
				</td>
				<th nowrap>Tipo Mensalidade</th>
				<td>
					<select class="formulario input-sm" id="mensalidade" name="mensalidade">
					<?php					
						$tipoMensalidade = buscaTipoMensalidade($conn,'');
							foreach($tipoMensalidade as $tm) :
								$assocTM = $associado->getIdTipoMensalidade() == $tm->getIdTipoMensalidade();
								$selecaoTM = $assocTM ? "selected='selected'" : "";
					?>
						<option value="<?=$tm->getIdTipoMensalidade();?>" <?=$selecaoTM?> >
							<?=$tm->getTipoMensalidade();?>
						</option>
					<?php
						endforeach
					?>
					</select>
				</td>
			</tr>
			<tr>
				<th nowrap>Data de Nasc.</th>
				<td>
					<input type="datetimelocal" id="dtnasc" name="dtnasc" class="formulario input-sm text-center" value="<?=dateTimeToBR($associado->getDataNascimento());?>" />
					<script type="text/javascript">
						$('#dtnasc').datetimepicker({
							format: "dd/mm/yyyy HH:ii:ss",
							language: "pt-BR",
							autoclose: true
						});
					</script>
				</td>
				<th>Local Nasc.</th>
				<td>
					<select class="formulario input-sm" id="idLocalNascimento" name="idLocalNascimento">
					<?php					
						$cidades = buscaCidade($conn,'');
							foreach($cidades as $cidade) :
								$cid = $associado->getLocalNascimento() == $cidade->getIdCidade();
								$selecaoCid = $cid ? "selected='selected'" : "";
					?>
						<option value="<?=$cidade->getIdCidade();?>" <?=$selecaoCid?>>
							<?=$cidade->getCidade();?>
						</option>
					<?php
						endforeach
					?>
					</select>
				</td>
				<th nowrap>&nbsp;</th>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="6"><hr></td>
			</tr>
			<tr>
				<th rowspan="2" style="vertical-align: middle;">Primeiro Nome</th>
				<td><input class="formulario input-sm" type="text" id="nomePrimeiro" name="nomePrimeiro" value="<?=$associado->getPrimeiroNome();?>"></td>
				<th rowspan="2" style="vertical-align: middle;">Nome do Meio</th>
				<td><input class="formulario input-sm" type="text" id="nomeSegundo" name="nomeSegundo" value="<?=$associado->getSegundoNome();?>"></td>
				<th rowspan="2" style="vertical-align: middle;">Sobrenome</th>
				<td><input class="formulario input-sm" type="text" id="sobreNome" name="sobreNome" value="<?=$associado->getSobrenome();?>"></td>
			</tr>
			<tr>

				<td><input class="formulario input-sm" type="text" id="nomePrimeiroJap" name="nomePrimeiroJap" value="<?=$associado->getNomeJapones();?>">
				<td><input class="formulario input-sm" type="text" id="nomeSegundoJap" name="nomeSegundoJap" value="<?=$associado->getSegundoNomeJapones();?>"></td>
				<td><input class="formulario input-sm" type="text" id="sobrenomeJap" name="sobrenomeJap" value="<?=$associado->getSobrenomeJapones();?>"></td>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<th>Local Associa&#231;&#227;o</th>
				<td><?=$associado->getLocalAssociacao();?></td>
				<th>Estado Civil</th>
				<td>
					<select class="formulario input-sm" id="estadocivil" name="estadocivil">

					<?php
					$estadoCivil = buscaEstadoCivil($conn,'');
						foreach($estadoCivil as $ec) :
							$assocec = $associado->getIdEstadoCivil() == $ec->getIdEstadoCivil();
							$selecao = $assocec ? "selected='selected'" : "";
				?>
							<option value="<?=$ec->getIdEstadoCivil();?>" <?=$selecao?> >
								<?=$ec->getEstadoCivil();?>
							</option>
					<?php
						endforeach
					?>
					</select>
				<th>Sexo</th>
				<td>
					<select class="formulario input-sm" id="sexo" name="sexo">
						<option value="M" selected="selected">MASCULINO</option>
						<option value="F">FEMININO</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="6"><hr></td>
			</tr>
			<tr>
				<th colspan="6"><h4>Informa&#231;&#245;es Pessoais</h4></th>
			</tr>
			<tr>
				<th>Tel. Residencial</th>
				<td>
					<input class="formulario input-sm" size="2" type="text" id="dddTelResid" name="dddTelResid" value="<?=$associado->getDDDTelefoneResid();?>" maxlength="2" size="2">
					<input class="formulario input-sm" size="9" type="text" id="telefoneResid" name="telefoneResid" value="<?=$associado->getTelefoneResid();?>" maxlength="9" size="10">
				</td>
				<th>Tel. Celular</th>
				<td>
					<input class="formulario input-sm" size="2" type="text" id="dddTelCel" name="dddTelCel" value="<?=$associado->getDDDTelefoneCel();?>" maxlength="2" size="2">
					<input class="formulario input-sm" size="9" type="text" id="telefonecel" name="telefoneCel" value="<?=$associado->getTelefoneCel();?>" maxlength="9" size="10">
				</td>
				<th>E-mail</th>
				<td><input class="formulario input-sm" type="email" id="email" name="email" value="<?=$associado->getEmailAssociado();?>"></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<th>CEP</TH>				
				<td>
					<input class="formulario input-sm" type="text" id="cepResid" name="cepResid" value="<?=$associado->getCepResid();?>" maxlength="9">
					&nbsp;&nbsp;&nbsp;
					<input type="button" class="btn btn-sm" id="btnResid" name="btnResid" value="Buscar CEP">
				</td>
			</tr>
			<tr>
				<th>Rua</th>
				<td><input class="formulario input-sm" type="text" id="ruaResid" name="ruaResid" value="<?=$associado->getEnderecoResid();?>" size="34"></td>
				<th>N&#250;mero</th>
				<td><input class="formulario input-sm" size="6" type="text" id="numeroResid" name="numeroResid" value="<?=$associado->getNumeroResid();?>"></td>
				<th>Complemento</th>
				<td><input class="formulario input-sm" type="text" id="complementoResid" name="complementoResid" value="<?=$associado->getComplementoResid();?>"></td>
			</tr>
			<tr>
				<th>Bairro</th>
				<td><input class="formulario input-sm" type="text" id="bairroResid" name="bairroResid" value="<?=$associado->getBairroResid();?>"></td>
				<th>Cidade</th>
				<td><input class="formulario input-sm" size="10" type="text" id="cidadeResid" name="cidadeResid" value="<?=$associado->getCidadeResid();?>"></td>
				<th>Estado</th>
				<td><input class="formulario input-sm" type="text" id="ufResid" name="ufResid" maxlength="2" value="<?=$associado->getEstadoResid();?>"></td>
			</tr>
			<tr>
				<td colspan="6"><hr></td>
			</tr>
			<tr>
				<th colspan="6"><h4>Informa&#231;&#245;es Comerciais</h4></th>
			</tr>
			<tr>
				<th>Profiss&#227;o</th>
				<td>
					<select class="formulario input-sm" id="profissao" name="profissao">
					<?php
						$profissao = buscaProfissao($conn,'');
							foreach($profissao as $tipo) :
								$verifica = $associado->getIdProfissao() == $tipo->getIdProfissao();
								$select = $verifica ? "selected='selected'" : "";
					?>		
						<option value="<?=$tipo->getIdProfissao();?>" <?=$select?> ><?=$tipo->getProfissao();?></option>
					<?php
							endforeach
					?>
					
					</select>
				</td>
			</tr>
			<tr>
				<th>Tel. Comercial</th>
				<td>
					<input class="formulario input-sm" size="2" type="text" id="dddTelCom" name="dddTelCom" value="<?=$associado->getDDDTelefoneCom();?>" maxlength="2" size="2">
					<input class="formulario input-sm" size="9" type="text" id="telefoneCom" name="telefoneCom" value="<?=$associado->getTelefoneCom();?>" maxlength="9" size="10">
					&nbsp;&nbsp;
					<strong>Ramal</strong>
					<input class="formulario input-sm" size="4" type="text" id="ramalTelefoneCom" name="ramalTelefoneCom" value="<?=$associado->getRamalTelefoneCom();?>">				
				</td>
				<th>Tel. Comercial</th>
				<td colspan="2" nowrap>
					<input class="formulario input-sm" size="2" type="text" id="dddTelefoneCom2" name="dddTelefoneCom2" value="<?=$associado->getDDDTelefoneCom2();?>" maxlength="2" size="2">
					<input class="formulario input-sm" size="9" type="text" id="telefoneCom2" name="telefoneCom2" value="<?=$associado->getTelefoneCom2();?>" maxlength="9" size="10">
					&nbsp;&nbsp;
					<strong>Ramal</strong>
					<input class="formulario input-sm" size="4" type="text" id="ramalTelefoneCom2" name="ramalTelefoneCom2" value="<?=$associado->getRamalTelefoneCom2();?>">
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<th>CEP</TH>				
				<td>
					<input class="formulario input-sm" type="text" id="cepCom" name="cepCom" value="<?=$associado->getCepCom();?>" maxlength="9">
					&nbsp;&nbsp;&nbsp;
					<input type="button" class="btn btn-sm" id="btnCom" name="btnCom" value="Buscar CEP">
				</td>
			</tr>
			<tr>
				<th>Rua</th>
				<td><input class="formulario input-sm" type="text" id="ruaCom" name="ruaCom" size="34" value="<?=$associado->getEnderecoCom();?>"></td>
				<th>N&#250;mero</th>
				<td><input class="formulario input-sm" size="6" type="text" id="numeroCom" name="numeroCom" value="<?=$associado->getNumeroCom();?>"></td>
				<th>Complemento</th>
				<td><input class="formulario input-sm" type="text" id="complementoCom" name="complementoCom" value="<?=$associado->getComplementoCom();?>"></td>
			</tr>
			<tr>
				<th>Bairro</th>
				<td><input class="formulario input-sm" type="text" id="bairroCom" name="bairroCom" value="<?=$associado->getBairroCom();?>"></td>
				<th>Cidade</th>
				<td><input class="formulario input-sm" size="10" type="text" id="cidadeCom" name="cidadeCom" value="<?=$associado->getCidadeCom();?>"></td>
				<th>Estado</th>
				<td><input class="formulario input-sm" type="text" id="ufCom" name="ufCom" maxlength="2" value="<?=$associado->getEstadoCom();?>"></td>
			</tr>
			<tr>
				<td colspan="6"><hr></td>
			</tr>
			<tr>
				<th>Apresentador</th>
				<td><input class="formulario input-sm" type="text" id="apresentador" name="apresentador" value="<?=$associado->getApresentador();?>"></td>
				<th>Padrinho</th>
				<td><input class="formulario input-sm" type="text" id="padrinho" name="padrinho" value="<?=$associado->getApadrinhamento();?>"></td>
				<th>Resp. Presente GYO</th>
				<td><input class="formulario input-sm" type="text" id="presenteGYO" name="presenteGYO" value="<?=$associado->getPresenteGYO();?>"></td>
			</tr>
			<tr>
				<td colspan="6"><hr></td>
			</tr>
			<tr>
				<th style="vertical-align: middle;" colspan ="3">Observa&#231;&#240;es</th>
				<th style="vertical-align: middle;" colspan ="3">Motivo Entrada</th>
			</tr>
			<tr>
				<td colspan="3">
					<textarea class="form-control" cols="30" id="obs" name="obs"><?=$associado->getObsAssociado();?></textarea>
				</td>
				<td colspan="3">
					<textarea cols="40" class="form-control" id="motivoEntrada" name="motivoEntrada"><?=$associado->getMotivoEntrada();?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="6">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td><input type="button" class="btn btn-danger" id="btn-volta" name="btn-volta" value="Voltar" onclick="javascript: history.back();"></td>
				<td class="text-center">
					<button form="frm-cad-assoc" class="btn btn-primary" type="submit" target="ifm-aux">Salvar</button>
				</td>
				<td colspan="2">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	</form>
<?php
	endforeach
?>
</div>
<?php
include("modal-associados.php");
include("library\scripts.php");
include("rodape.php");
?>
</body>
</html>