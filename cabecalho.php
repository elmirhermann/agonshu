<html>
<head>
	<?php
		include("head.php");
	?>
</head>
<body>
	<div class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header" style="width: 35%">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#agonshu" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Agonshu</a>
			</div>
			<div class="text-right">
				<form class="navbar-form navbar-left" id="busca_assoc" name="busca-assoc" action="busca-associados.php" target="central" method="POST">
					<div class="form-group">
						<input type="text" id="busca" name="busca" value="" class="form-control" placeholder="Buscar Associado">
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</form>
			</div>
		</div>
	</div>
</body>