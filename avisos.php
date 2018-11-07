<html>
	<head>
		<?php
			include("head.php");
			session_start();
		?>
	</head>
	<body>
		<?php
			echo("<h2>Bem Vindo, ". $_SESSION["nameUser"] ."</h2>");
		?>
	</body>
</html>