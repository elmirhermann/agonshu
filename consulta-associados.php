<html>
<?php
include("head.php");
include("bd.php");
		
session_start();
$result = $_SESSION["idAssoc"];

$associados = resultBuscaAssociado($conn, $result);
	foreach($associados as $associado) :
?>
<body>
<iframe id="ifm-aux" name="ifm-aux" style="display:none;"></iframe>
<div>
	<table width="100%">
		<tbody class="text-10">
			<tr>
				<th class="text-center" rowspan="8" nowrap>
					<img class="img-thumbnail img-profile" src="imagens/img-associado/<?=$associado->getImgFoto();?>"></img>
					<br>
					<br>
					<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal">
					  Alterar Imagem
					</button>
				</th>
				<td nowrap colspan="6" style="text-align:center;">
					<H2><?=$associado->getNomeCompleto();?><br></H2>
				</td>
			</tr>
			<tr>
				<th>Data Nasc.:</th>
				<td><?=$associado->getDataNascimento();?></td>
				<th>Local Nasc.::</th>
				<td>
					<?php
						$cidadeNascimento = buscaCidade($conn,$associado->getLocalNascimento());
						 foreach($cidadeNascimento as $cidade) :
							echo $cidade->getCidade()."/".$cidade->getEstadoCidade();
						endforeach
					?>
				</td>
				<th>Estrela:</th>
				<td>
					<?php
						$estrela = estrelaNascimento($conn,dateYear($associado->getDataNascimento()));
						echo $estrela['estrela'];
					?>
				</td>
			</tr>
			<tr>
				<td rowspan="6">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table width="100%">
		<tbody class="text-10">
			<tr>
				<th nowrap>N&#250;m Associado:</th>
				<td nowrap><?="01 - ".$associado->getCodAssociado();?></td>
				<th nowrap>Data de In&#237;cio GYO:</th>
				<td nowrap><?=dateToBR($associado->getDataInicioGYO());?></td>
				<th nowrap>Tipo Mensalidade:</th>
				<td nowrap>
				<?php
					$tipoMensalidade = buscaTipoMensalidade($conn,$result);
						foreach($tipoMensalidade as $tm) :
							echo $tm->getTipoMensalidade();
						endforeach
				?>
				</td>
			</tr>
			<tr>
				<th nowrap>Primeiro Nome:</th>
				<td nowrap><?=$associado->getPrimeiroNome();?></td>
				<th nowrap>Nome do Meio:</th>
				<td nowrap><?=$associado->getSegundoNome();?></td>
				<th nowrap>Sobrenome:</th>
				<td><?=$associado->getSobrenome();?></td>
			</tr>
			<tr>
				<th nowrap>Primeiro Nome (Japon&#234;s):</th>
				<td nowrap><?=$associado->getNomeJapones();?></td>
				<th nowrap>Nome do Meio (Japon&#234;s):</th>
				<td nowrap><?=$associado->getSegundoNomeJapones();?></td>
				<th nowrap>Sobrenome (Japon&#234;s):</th>
				<td nowrap><?=$associado->getSobrenomeJapones();?></td>
			</tr>
			<tr>
				<th nowrap>Local Associa&#231;&#227;o</th>
				<td><?=$associado->getLocalAssociacao();?></td>
				<th nowrap>Estado Civil</th>
				<td>
					<?php
					$estadoCivil = buscaEstadoCivil($conn,$associado->getIdEstadoCivil());
						foreach($estadoCivil as $ec) :
							echo $ec->getEstadoCivil();
						endforeach
					?>
				</td>
				<th>Sexo:</th>
				<td>
					<?php
					if($associado->getIdSexo()=='M'){
						echo "MASCULINO";
					}else{
						echo "FEMININO";
					}
					?>
				</td>
			</tr>
			<tr><th colspan="6"><hr></hr></th></tr>
			<tr>
				<th>Tel. Residencial:</th>
				<td><?=$associado->getTelefoneResidCompleto();?></td>
				<th>Tel. Celular:</th>
				<td><?=$associado->getTelefoneCelCompleto();?></td>
			</tr>
			<tr>
				<th>End. Resid.:</th>
				<td><?=$associado->getEnderecoResid().", ".$associado->getNumeroResid()." ".$associado->getComplementoResid();?></td>
				<th>Bairro:</th>
				<td><?=$associado->getBairroResid();?></td>
				<th>Cidade:</th>
				<td><?=$associado->getCidadeResid()."/".$associado->getEstadoResid();?></td>
			</tr>
			<tr>
				<th nowrap>E-mail:</th>
				<td colspan="2" nowrap><?=$associado->getEmailAssociado();?></td>
			</tr>
			<tr><th colspan="6"><hr></hr></th></tr>	
			<tr>
				<th>Tel. Comercial:</th>
				<td><?=$associado->getTelefoneComCompleto();?></td>
				<th>End. Com.:</th>
				<td><?=$associado->getEnderecoCom().", ".$associado->getNumeroCom()." ".$associado->getComplementoCom();?></td>
			</tr>
			<tr>
				<th>Profiss&#227;o:</th>			
				<td>
					<?php
					$profissao = buscaProfissao($conn,$associado->getIdProfissao());
						foreach($profissao as $pro) :
							echo $pro->getProfissao();
						endforeach
					?>
				</td>
				<th>Bairro:</th>
				<td><?=$associado->getBairroCom();?></td>
				<th>Cidade:</th>
				<td><?=$associado->getCidadeCom()."/".$associado->getEstadoCom();?></td>
			</tr>
			<tr><th colspan="6"><hr></hr></th></tr>
			<tr>
				<th>Padrinho/Madrinha:</th>
				<td><?=$associado->getApadrinhamento();?></td>
				<th>Apresentador:</th>
				<td><?=$associado->getApresentador();?></td>
				<th>Respons&#225;vel Presente GYO:</th>
				<td><?=$associado->getPresenteGYO();?></td>
			</tr>
			<tr><th colspan="6"><hr></hr></th></tr>
			</tr>
			<tr>
				<th colspan="3">Observa&#231;&#245;es:</th>
				<th colspan="3">Motivo da Entrada:
			</tr>
				<td colspan="3"><?=$associado->getObsAssociado();?></td>
				<td colspan="3"><?=$associado->getMotivoEntrada();?></td>
			</tr>
			<tr><th colspan="6"><hr></hr></th></tr>
			<tr>
			<td colspan="6" style="text-align: right;">
				<form id="FRM" name="FRM" action="alt-associados.php" method="POST">
					<input type="hidden" id="idAssoc" name="idAssoc" value="<?=$result?>">
					<button class="btn btn-primary btn-sm" onClick="envia_form();">Editar Informa&#231;&#245;es</button>
				</form>
			</td>
				
			</tr>
		</tbody>
	</table>
<?php
	endforeach
?>
</div>
<?php
include("modal-associados.php");
?>
</body>
<script>
	function envia_form(){
		FRM.submit();
	}
</script>
</html>