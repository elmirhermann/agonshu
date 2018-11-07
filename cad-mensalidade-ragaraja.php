<html>
<?php
require_once("bd/banco-mensalidades.php");
//require_once("class/Mensalidades.php");
include("head.php");

$acao = $_GET['acao'];
$idAssoc = $_GET['idAssoc'];
?>
	<head>
		<title>.:: Mensalidade Ragaraja ::.</title>
	</head>
	<body>
		<div class="container">
			<form id="frm-mensalidade" name="frm-mensalidade" method="POST" action="save-mensalidade-ragaraja.php">
				<table class="text-10" border="0">
					<tbody>
						<tr>
							<th>Data Mensalidade</th>
							<th>Qtd Mensalidade</th>
						</tr>
						<tr>
							<td>
								<input class="formulario" type="date" id="dt-mensalidade" name="dt-mensalidade" value="">
							</td>
							<td>
								<input class="formulario" type="number" id="qtd-mensalidade" name="qtd-mensalidade" value="">
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td colspan="3" style="text-align: center;">
								<input type="submit" class="btn btn-primary" id="btn-salva" name="btn-salva" value="Cadastrar"> 
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body>
</html>