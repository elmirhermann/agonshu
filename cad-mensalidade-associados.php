<html>
<?php
require_once("bd/banco-mensalidades.php");
//require_once("class/Mensalidades.php");
include("head.php");

$acao = $_GET['acao'];
$idAssoc = $_GET['idAssoc'];
?>
	<head>
		<title>.:: Nova Mensalidade ::.</title>
	</head>
	<body>
		<div class="container">
			<form id="frm-mensalidade" name="frm-mensalidade" method="POST" action="save-mensalidade-associado.php">
				<table class="text-10" border="0">
					<tbody>
						<tr>
							<th>Data Mensalidade</th>
							<th>Qtd Mensalidade</th>
							<th>Tipo Mensalidade</th>
						</tr>
						<tr>
							<td>
								<input class="formulario" type="date" id="dt-mensalidade" name="dt-mensalidade" value="">
							</td>
							<td>
								<input class="formulario" type="number" id="qtd-mensalidade" name="qtd-mensalidade" value="">
							</td>
							<td>
								<select class="formulario input-sm" id="tipo-mensalidade" name="tipo-mensalidade">
								<?php					
									$mensalidades = buscaTipoMensalidade($conn,$idAssoc);
										foreach($mensalidades as $mensalidade) :
								?>
									<option value="<?=$mensalidade->getIdTipoMensalidade();?>" selected="selected">
										<?=$mensalidade->getTipoMensalidade();?>
									</option>
								<?php
									endforeach
								?>
								</select>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<th>Obs Mensalidade</th>
						</tr>
						<tr>
							<td colspan="3">
								<textarea class="formulario" id="obs-mensalidade" name="obs-mensalidade" cols="60" rows="1" value=""></textarea>
							</td>
						</tr>
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