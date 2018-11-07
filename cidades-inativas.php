<!DOCTYPE html>
<html>
<?php
	include("head.php");
	include("bd.php");
?>

<?php
session_start();
$idUser = $_SESSION["idUser"];
$result = $_SESSION["idAssoc"];
?>
	<div id="chamada" width="100%"> <!-- Cidades Inativas -->
		<table class="relatorio" Style="width: 100%">
		<thead>
			<tr>
				<th>Id Cidade</th>
				<th>Cidade</th>
				<th>UF</th>
				<th colspan="2">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$cidades = buscaCidadesInativas($conn,'');
				foreach($cidades as $cidade) :
			?>
			<tr>
				<td style="text-align: center;"><?=$cidade->getIdCidade();?></td>
				<td><?=$cidade->getCidade();?></td>
				<td><?=$cidade->getEstadoCidade();?></td>
				<td style="text-align: center;">
					<iframe id="iframe-aux" name="iframe-aux" style="display: none;"></iframe>
					<form id="frm_<?=$cidade->getIdCidade();?>" name="frm_<?=$cidade->getIdCidade();?>" method="POST" action="./library/alterna-status.php" target="iframe-aux">
						<input type="hidden" id="acao" name="acao" value="A"/>
						<input type="hidden" id="status" name="status" value="1"/>
						<input type="hidden" id="tabela" name="tabela" value="tbCidades"/>
						<input type="hidden" id="campoTabela" name="campoTabela" value="statusCidade"/>
						<input type="hidden" id="campoId" name="campoId" value="idCidade"/>
						<input type="hidden" id="url" name="url" value=".\cad-cidades.php"/>
						<input type="hidden" id="id" name="id" value="<?=$cidade->getIdCidade();?>"/>
						<input type="button" class="btn btn-success btn-sm" id="envia-cid-<?=$cidade->getIdCidade();?>" name="envia-cid-<?=$cidade->getIdCidade();?>" onClick="frm_<?=$cidade->getIdCidade();?>.submit();" value="Ativar"/>
					</form>
				</td>
			</tr>
			<?php
				endforeach
			?>	
			</tbody>	
		</table>
	</div>
<?php
include("rodape.php");
?>
</body>
</html>