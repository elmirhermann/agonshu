<?php
require_once("cabecalho.php");
require_once("bd/banco-cursos.php");
require_once("class/Cursos.php");

$curso = $_POST['curso'];

			if(insereNovoCurso($conn, $curso,0)) { ?>
				<p class="text-success">Curso Cadastrado com Sucesso!</p>
				<script>
					parent.document.location = parent.document.location;
				</script>
			<?php 
			} else {
				$msg = mysqli_error($conn);
			?>
				<p class="text-danger">Curso não Cadastrado: <?= $msg?></p>
			<?php
			}
			?>