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
		<div><h2>Cadastro de Cursos</h2></div>
		<br>
		<fieldset class="halffield">
			<iframe id="iframe-aux" name="iframe-aux" style="display: none;"></iframe>
			<form id="frm-curso" name="frm-curso" method="POST" target="iframe-aux" action="save-cad-cursos.php">
				<table style=" width:50%;border:0;">
					<tbody class="text-10">
					<tr>
						<th>Curso</th>
						<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
						<td><input type="text" class="formulario" id="curso" name="curso" value=""></td>
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
		<table>
			<tr>
				<td><strong>Cursos Ativos</strong></td>
				<td colspan="3">&nbsp;</td>
				<td><strong>Cursos Inativos</strong></td>
			</tr>
			<tr>
				<td>
					<iframe class="iframes" id="cursos-ativos" name="cursos-ativos" src="cursos-ativos.php" style="border: none;"></iframe>
				</td>
				<td>&nbsp;</td>
				<td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<iframe class="iframes" id="cursos-inativos" name="cursos-inativos" src="cursos-inativos.php" style="border: none;"></iframe>
				</td>
			</tr>
		</table>
	</div>
</body>

<?php
include("rodape.php");
?>
</html>