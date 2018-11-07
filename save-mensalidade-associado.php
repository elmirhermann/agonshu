<?php
require_once("cabecalho.php");
require_once("bd/banco-mensalidades.php");

session_start();
$result = $_SESSION["idAssoc"];
$idUser = $_SESSION["idUser"];

$dtMensalidade = $_POST['dt-mensalidade'];
$qtdMensalidade = $_POST['qtd-mensalidade'];
$tipoMensalidade = $_POST['tipo-mensalidade'];
$obsMensalidade = $_POST['obs-mensalidade'];

$mensal = buscaTipoMensalidade($conn,$result);
	foreach($mensal as $m) :
		$vlrMensalidade = $m->getValorMensalidade();
	endforeach;
	
	$mensalidade = new Mensalidades();
		$mensalidade->setIdAssoc($result);
		$mensalidade->setDataMensalidade(dateToUS($dtMensalidade));
		$mensalidade->setIdTipoMensalidade($tipoMensalidade);
		$mensalidade->setObsMensalidade($obsMensalidade);
		$mensalidade->setValorMensalidade($vlrMensalidade);
		$mensalidade->setIdUser($idUser);
			
		insereMensalidade($conn, $qtdMensalidade, $mensalidade);
		echo "	<script>
					window.opener.location.reload();
					self.close();
				</script>";