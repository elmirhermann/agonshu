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
<body>
<iframe id="iframe-aux" name="iframe-aux" style="display: none;"></iframe>
	<div id="chamada" width="100%">
		<table class="relatorio" Style="width: 100%">
			<thead>					
				<tr>
					<th>Id Curso</th>
					<th>Curso</th>
					<th>&nbsp;</td>
				</tr>
			</thead>
			<tbody>
						<?php
						$cursos = buscaCursos($conn);
						foreach($cursos as $curso) :
						?>
						<tr>
							<td style="text-align: center;"><?=$curso->getIdCurso();?></td>
							<td><?=$curso->getCurso();?></td>
							<td style="text-align: center;">
								<form id="frm_<?=$curso->getIdCurso();?>" name="frm_<?=$curso->getIdCurso();?>" method="POST" action="./library/alterna-status.php" target="iframe-aux">
									<input type="hidden" id="acao" name="acao" value="I"/>
									<input type="hidden" id="status" name="status" value="0"/>
									<input type="hidden" id="tabela" name="tabela" value="tbCursos"/>
									<input type="hidden" id="campoTabela" name="campoTabela" value="statusCurso"/>
									<input type="hidden" id="campoId" name="campoId" value="uniqkey"/>
									<input type="hidden" id="url" name="url" value=".\cad-cursos.php"/>
									<input type="hidden" id="id" name="id" value="<?=$curso->getIdCurso();?>"/>
									<input type="button" class="btn btn-danger btn-sm" id="envia_cid_<?=$curso->getIdCurso();?>" name="envia_cid_<?=$curso->getIdCurso();?>" onClick="frm_<?=$curso->getIdCurso();?>.submit();" value="Desativar"/>
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