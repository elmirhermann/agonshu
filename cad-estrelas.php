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
		<div><h2>Cadastro de Estrela do Nascimento</h2></div>
		<fieldset class="halffield">
			<form id="frm-curso" name="frm-curso" method="POST">
				<table style=" width:100%;border:0;">
					<tbody class="text-10">
					<tr>
						<th>Ano</th>
						<th>SignoChinês</th>
						<th>Estrela</th>
						<th>Elemento</th>
						<th>Cor</th>
					</tr>
					<tr>
						<td>
							<input class="formulario input-sm" type="number" id="ano" name="ano" value="">
						</td>
						<td>
							<select class="formulario input-sm" type="checkbox" id="signoChines" name="signoChines">
								<option value="CACHORRO">CACHORRO</option>
								<option value="CARNEIRO">CARNEIRO</option>
								<option value="CAVALO">CAVALO</option>
								<option value="COBRA">COBRA</option>
								<option value="COELHO">COELHO</option>
								<option value="DRAGÃO">DRAGÃO</option>
								<option value="GALO">GALO</option>
								<option value="JAVALI">JAVALI</option>
								<option value="MACACO">MACACO</option>
								<option value="RATO">RATO</option>
								<option value="TIGRE">TIGRE</option>
								<option value="TOURO">TOURO</option>
							</select>
						</td>
						<td>
							<select class="formulario input-sm" type="checkbox" id="estrela" name="estrela">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
						</td>
						<td>
							<select class="formulario input-sm" type="checkbox" id="elemento" name="estrela">
								<option value="ÁGUA">ÁGUA</option>
								<option value="FOGO">FOGO</option>
								<option value="MADEIRA">MADEIRA</option>
								<option value="METAL">METAL</option>
								<option value="TERRA">TERRA</option>
							</select>
						</td>
						<td>
							<select class="formulario input-sm" type="checkbox" id="cor" name="cor">
								<option value="AMARELA">AMARELA</option>
								<option value="AZUL">AZUL</option>
								<option value="BRANCA">BRANCA</option>
								<option value="PRETA">PRETA</option>
								<option value="VERDE">VERDE</option>
								<option value="VERMELHO">VERMELHO</option>
								<option value="VIOLETA">VIOLETA</option>
							</select>
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
					<th>Ano</th>
					<th>Signo Chinês</th>
					<th>Estrela</th>
					<th>Elemento</th>
					<th>Cor</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$estrelas = buscaEstrela($conn);
		foreach($estrelas as $estrela) :
	?>
			<tr>
				<td><?=$estrela->getAno();?></td>
				<td><?=$estrela->getSignoChines();?></td>
				<td><?=$estrela->getEstrela();?></td>
				<td><?=$estrela->getElemento();?></td>
				<td><?=$estrela->getCor();?></td>
				<td>
						<button class="btn btn-danger btn-sm" value="<?=$estrela->getAno();?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
        $.post("library/cad-estrelas.php",
        {
			acao: "I",
			ano: $("#ano").val(),
			signoChines: $("#signoChines").val(),
			estrela: $("#estrela").val(),
			elemento: $("#elemento").val(),
			cor: $("#cor").val()
        },
        function(data){
            $("#divretorno").append(data);
        });
    });
	
	    $(".btn-danger").click(function(){
			$.post("library/cad-estrelas.php",
        {
			acao: "D",
			ano: $(this).val() 
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