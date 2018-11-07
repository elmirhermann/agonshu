<html>
<head>
<?php
	include("head.php");
?>
</head>
<body>
<?php
//require_once("cabecalho.php");
require_once("bd/banco-associados.php");
require_once("bd/banco-estadocivil.php");

$busca = $_POST['busca'];
?>
<div class="container">
	<table class="table table-responsive">
		<tbody class="text-10">
			<tr>
				<th>&nbsp;</th>
				<th>C&#243;digo Associado</th>
				<th>Nome Associado</th>
				<th>Data Nascimento</th>
				<th>Estrela</th>
				<th>Associado desde</th>
			</tr>
<?php
$associados = buscaAssociado($conn, $busca);
	foreach($associados as $associado) :
?>
			<tr>
				<td>
					<form id="result-busca" name="result-busca" action="info-associados.php" target="_self" method="POST">
						<input type="hidden" id="idAssoc" name="idAssoc" value="<?=$associado->getIdAssociado();?>">
						<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
					</form>
				</td>
				<td style="vertical-align: middle;"><?=$associado->getCodAssociado();?></td>
				<td style="vertical-align: middle;"><?=$associado->getNomeCompleto();?></td>
				<td style="vertical-align: middle;"><?=dateTimeToBR($associado->getDataNascimento());?>
				<td style="vertical-align: middle;">
					<?php
						$estrela = estrelaNascimento($conn,dateYear($associado->getDataNascimento()));
						echo $estrela['estrela'];
					?>
				</td>
				<td style="vertical-align: middle;"><?=dateToBR($associado->getDataInicioGYO());?></td>
			</tr>
<?php
	endforeach
?>
		</tbody>
	</table>
</div>
</body>
<?php
include("rodape.php");
?>
</html>