<html>
<head>
<?php
//require_once("cabecalho.php");
include("head.php");
?>
</head>
<?php
session_start();
$_SESSION["idAssoc"] = $_POST["idAssoc"];
?>
<body>
	<div class="divcontainer">
		<div>
		  <ul class="nav nav-pills">
			<li role="presentation" class="menupills"><a href="consulta-associados.php" target="frame-aux">Associado</a></li>
			<li role="presentation" class="menupills"><a href="cursos-associados.php" target="frame-aux">Cursos</a></li>
			<li role="presentation" class="menupills"><a href="mensalidade-associados.php" target="frame-aux">Mensalidade</a></li>
			<li role="presentation" class="menupills"><a href="mensalidade-ragaraja.php" target="frame-aux">Ragaraja</a></li>
			<li role="presentetion" class="menupills"><a href="receitas-associados.php" target="frame-aux">Fechamento Receitas</a></li>
		  </ul>
		  <br>
		  <div>
			<iframe id="frame-aux" name="frame-aux" src="consulta-associados.php" frameborder="0" width="100%" height="100%"></iframe>
		  </div>
		</div>
	</div>
</body>
<?php
include("rodape.php");
?>
</html>