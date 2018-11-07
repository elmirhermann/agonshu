<!DOCTYPE html>
<html>
<?php
	require_once("head.php");
	include("bd.php");
?>

<?php
session_start();
$idUser = $_SESSION["idUser"];
$result = $_SESSION["idAssoc"];
?>
<body>
	<div align="center">
		<div><h2>Cadastro de Itens de Receita</h2></div>
		<br>
		<fieldset class="halffield">
			<iframe id="iframe-aux" name="iframe-aux" style="display: none;"></iframe>
			<form id="frm-curso" name="frm-curso" method="POST" target="iframe-aux" action="save-cad-cidades.php">
				<table style=" width:50%;border:0;">
					<tbody class="text-10">
					<tr>
						<th>Item Receita</th>
						<th>&nbsp;</th>
						<th>Valor</th>
						<th>&nbsp;</th>
						<th>Classificação</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td><input type="text" class="formulario" id="itemReceita" name="itemReceita" value=""></td>
						<td>&nbsp;</td>
						<td><input type="text" class="formulario" id="valor" name="valor" value=""></td>
						<td>&nbsp;</td>
						<td>
							<select class="formulario" id="idClassificacao" name="idClassificacao">
								<?php
									$classificaReceitas = buscaClassificaReceitas($conn,'1');
										foreach($classificaReceitas as $cr) :
								?>
									<option value="<?=$cr->getIdClassificacaoReceita();?>"><?=$cr->getClassificacaoReceita();?></option>
								<?php
										endforeach
								?>
							</select>
						</td>
						<td>&nbsp;</td>
						<td><input class="btn btn-primary btn-sm" type="submit" id="btn-cursos" name="btn-cursos" value="Cadastrar"></td>
					</tr>
					</tbody>
				</table>	
			</form>
		</fieldset>
	</div>
	<hr></hr>
	<div id="divretorno" name="divretorno" class="container" style="max-width:100%">
		<table class="relatorio">
			<thead>
				<tr>
					<th>id Receita</th>
					<th>Receita</th>
					<th>Valor Unitário</th>
					<th>Classificação Receita</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$classificacao = buscaReceitas($conn,'1');
		foreach($classificacao as $cr) :
	?>
			<tr>
				<td><?=$cr->getIdTipoReceita();?></td>
				<td><?=$cr->getTipoReceita();?></td>
				<td><?=$cr->getValorTipoReceita();?></td>
				<td><?=$cr->getClassificacaoReceita();?></td>
				<td>
						<button class="btn btn-danger btn-sm" value="<?=$cr->getIdClassificacaoReceita();?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
				</td>
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