<?php
require_once("cabecalho.php");
require_once("bd/banco-mensalidades.php");

session_start();
$result = $_SESSION["idAssoc"];
$idUser = $_SESSION["idUser"];

$dtMensalidade = $_POST['dt-mensalidade'];
$qtdMensalidade = $_POST['qtd-mensalidade'];

$ragaraja = mensalidadeRagaraja($conn);
	foreach($ragaraja as $r) :
		$vlrMensalidade = $r->getValorMensalidade();
	endforeach;
	
	$mensalidade = new Mensalidades();
		$mensalidade->setIdAssoc($result);
		$mensalidade->setDataMensalidade(dateToUS($dtMensalidade));
		$mensalidade->setValorMensalidade($vlrMensalidade);
		$mensalidade->setIdUser($idUser);
			
		insereMensalidade($conn, $qtdMensalidade, $mensalidade);
		echo "	<script>
					window.opener.location.reload();
					self.close();
				</script>";