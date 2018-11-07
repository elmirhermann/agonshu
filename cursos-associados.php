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
		<legend>Cadastrar Curso</legend>
			<form id="frm-curso" name="frm-curso" method="POST">
				<table style=" width:100%;border:0;">
					<tbody class="text-10">
					<tr>
						<th>Curso</th>
						<th>Data de Realiza&#231;&#227;o</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td>
							<select class="formulario input-sm" id="cursos" name="cursos">
							<?php					
								$cursos = buscaCursos($conn);
									foreach($cursos as $curso) :
							?>
								<option value="<?=$curso->getIdCurso();?>">
									<?=$curso->getCurso();?>
								</option>
							<?php
								endforeach
							?>
							</select>
						</td>
						<td>
						<input class="formulario input-sm" type="date" id="dataCurso" name="dataCurso" value="">
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
					<th>Curso</th>
					<th>Data do Curso</th>
					<th>Data de Reciclagem</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$realizados = cursosAssociados($conn,$result);
	foreach($realizados as $cursoRealizado) :
	?>
			<tr>
				<td><?=$cursoRealizado->getCurso();?></td>
				<td style="text-align: center;"><?=dateToBR($cursoRealizado->getDataCurso());?></td>
				<td style="text-align: center;"><?=dateToBR($cursoRealizado->getDataReciclagem());?></td>
				<td style="text-align: center;">
						<button class="btn btn-danger btn-sm" value="<?=$cursoRealizado->getCodCurso();?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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