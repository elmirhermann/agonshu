<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include_once("head.php");
		?>
	</head>
	<body style="margin-top: 15%; margin-left: 40%">
		<div style="border: 0px;">
			<table class="formulario" style="border: 0px;">
				<tr>
					<td>
						<form class="form-horizontal" action="init.php" method="POST"">
						  <div class="form-group">
							<label for="inputUser" class="col-sm-2 control-label">Usuário</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="login">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Senha</label>
							<div class="col-sm-10">
							  <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Senha">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" class="btn btn-info">Entrar</button>
							</div>
						  </div>
						</form>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>