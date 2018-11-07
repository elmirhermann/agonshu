<html>
<?php
	include("head.php");
	include("bd.php");
?>

<?php
session_start();
$result = $_SESSION["idAssoc"];
?>
<body>
	<div align="center">
		<fieldset class="halffield">
		<legend>Cadastro de Itens</legend>
			<form id="frm-receita" name="frm-receita" method="POST">
				<table style=" width:100%;border:0;">
					<tbody class="text-10">
					<tr>
						<th>Itens</th>
						<th>Qtd Itens</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td>
							<select class="formulario input-sm" id="cursos" name="cursos">
							<?php					
								$tipoReceitas = buscaTiposReceitas($conn);
									foreach($tipoReceitas as $tp) :
							?>
								<option value="<?=$tp->getIdTipoReceita();?>">
									<?=$tp->getTipoReceita();?>
								</option>
							<?php
								endforeach
							?>
							</select>
						</td>
						<td>
						<input class="formulario input-sm" type="number" id="dataCurso" name="dataCurso" value="">
						</td>
						<td>
							<input class="btn btn-primary btn-sm" type="button" id="btn-cursos" name="btn-cursos" value="Cadastrar">
						</td>
					</tr>
					</tbody>
				</table>
			</form>
		</fieldset>
	</div>
	<hr></hr>
	<br>
	<div id="divretorno" name="divretorno" align="center">
		<table class="relatorio">
			<thead>
				<tr>
					<th>Item</th>
					<th>Data da Registro</th>
					<th>Valor Unit.</th>
					<th>Qtd. Item</th>
					<th>Valor Total</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$receitas = receitasAssociados($conn,$result);
	foreach($receitas as $r) :
	?>
			<tr>
				<td><?=$r->getTipoReceita();?></td>
				<td style="text-align: center;"><?=dateToBR($r->getDataRegistro());?></td>
				<td><?=$r->getValorUnitario();?></td>
				<td style="text-align: center;"><?=$r->getQtdItemReceita();?></td>
				<td style="text-align: right;"><?=$r->getValorTotal();?></td>
				<td style="text-align: center;">
						<button class="btn btn-danger btn-sm" value="<?=$r->getUniqkey();?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
				</td>
			</tr>

	<?php
	endforeach
	?>	
			</tbody>
		</table>
	</div>
</body>
<script>
$(document).ready(function(){
    $("#btn-cursos").click(function(){
        $.post("library/cursos-associados.php",
        {
			acao: "I",
			idAssoc: <?=$result?>,
			curso: $("#cursos").val(),
			dataCurso: $("#dataCurso").val()
        },
        function(data){
            $("#divretorno").append(data);
        });
    });
	
	    $(".btn-danger").click(function(){
			$.post("library/cursos-associados.php",
        {
			acao: "D",
			codCurso: $(this).val() 
        },
        function(data){
            $("#divretorno").append(data);
        });
    });
});

</script>
<?php
include("rodape.php");
?>
</html>