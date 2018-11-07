<html>
<?php
	require_once("head.php");
	include("bd.php");
?>

<?php
session_start();
$idUser = $_SESSION["idUser"];
?>
<body>
	<div align="center">
		<div><h2>Cadastro de Profissão</h2></div>
		<fieldset class="halffield">
			<form id="frm-profissao" name="frm-profissao" method="POST">
				<table style=" width:50%;border:0;">
					<tbody class="text-10">
					<tr>
						<th>Profissão</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td>
							<input class="formulario input-sm" type="text" id="profissao" name="profissao" value="">
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
					<th>Id Profissão</th>
					<th>Profissão</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$profissoes = buscaProfissao($conn,'');
		foreach($profissoes as $profissao) :
	?>
			<tr>
				<td><?=$profissao->getIdProfissao();?></td>
				<td><?=$profissao->getProfissao();?></td>
				<td>
						<button class="btn btn-danger btn-sm" value="<?=$profissao->getIdProfissao();?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
        $.post("library/cad-profissoes.php",
        {
			acao: "I",
			profissao: $("#profissao").val()
        },
        function(data){
            $("#divretorno").append(data);
        });
    });
	
	    $(".btn-danger").click(function(){
			$.post("library/cad-profissoes.php",
        {
			acao: "D",
			idProfissao: $(this).val() 
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