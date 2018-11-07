<html>
<?php
	include("head.php");
	include("bd.php");
?>
<head>
	<title>.:: Mensalidade Ragaraja ::.</title>
</head>
<div align="center">
<?php
session_start();
$result = $_SESSION["idAssoc"];
?>
<div id="divretorno" name="divretorno" align="center">
	<table class="relatorio">
		<thead>
			<tr>
				<th nowrap>Id Mensalidade</th>
				<th nowrap>Data Mensalidade</th>
				<th nowrap>Usuario</th>
				<th nowrap></th>
			</tr>
		</thead>
		<tbody>
<?php
$mensalidades = mensalidadesAssociado($conn,$result);
foreach($mensalidades as $mensal) :
?>
		<tr>
			<td style="text-align: center;"><?=$mensal->getIdMensalidade();?></td>
			<td style="text-align: center;"><?=dateToBR($mensal->getDataMensalidade());?></td>
			<td><?=$mensal->getUser();?></td>
			<td style="text-align: center;">
				<button class="btn btn-danger btn-sm" value="<?=$mensal->getIdMensalidade();?>" title="Cancelar Mensalidade"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</td>
		</tr>
<?php
endforeach
?>	
		</tbody>
	</table>
</div>
<br><br><br>
<div>
	<button class="btn btn-primary btn-sm" id="btn-nova" name="btn-nova" onclick="novaMensalidade();">Nova Parcela</button>
</div>

</body>
<?php
include("rodape.php");
?>
<script type="text/javascript">
function novaMensalidade(){
	window.open('cad-mensalidade-associados.php?idAssoc=<?=$result?>&acao=I', '', 'width=500,height=200,menubar=0,scrollbars=0');
}
</script>
<script>
$(document).ready(function(){
	    $(".btn-danger").click(function(){
			$.post("library/mensalidade-associados.php",
        {
			acao: "D",
			idMensalidade: $(this).val() 
        },
			function(data){
				$("#divretorno").append(data);
			});
		});
		
		//NÃO ESTÁ SENDO UTILIZADA NO MOMENTO (BAIXA DE PARCELA)
		//$(".btn-success").click(function(){
		//	$.post("library/mensalidade-associados.php",
		//	{
		//		acao: "B",
		//		idMensalidade: $(this).val()
		//	},
		//	function(data){
		//		$("#divretorno").append(data);
		//	});
		//});
});
</script>
</html>