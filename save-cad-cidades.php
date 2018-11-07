<?php
require_once("cabecalho.php");
require_once("bd/banco-cidades.php");
require_once("class/Cidades.php");

$uf = $_POST['uf'];
$cidade = $_POST['cidade'];

			if(insereCidade($conn, $cidade,$uf,0)) { ?>
				<p class="text-success">Cidade Cadastrada com Sucesso!</p>
				<script>
					parent.document.location = parent.document.location;
				</script>
			<?php 
			} else {
				$msg = mysqli_error($conn);
			?>
				<p class="text-danger">Associado não <?=$txt?>: <?= $msg?></p>
			<?php
			}
			?>