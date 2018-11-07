<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Cursos.php");
require_once("./library/functions.php");

function buscaCursos($conn) {
	$cursos = array();
	$query = "select * from tbcursos where statusCurso = 1 order by 2";
	$resultado = mysqli_query($conn,$query);
		while($cursos_array = mysqli_fetch_assoc($resultado)){
			$curso = new Cursos();
				$curso->setIdCurso($cursos_array['uniqkey']);
				$curso->setCurso($cursos_array['curso']);
				$curso->setDescricaoCurso($cursos_array['descricaoCurso']);
				$curso->setStatusCurso($cursos_array['statusCurso']);
			array_push($cursos,$curso);
		}
		//var_dump($query);
	return $cursos;
}

function buscaCursosInativos($conn) {
	$cursos = array();
	$query = "select * from tbcursos where statusCurso = 0 order by 2";
	$resultado = mysqli_query($conn,$query);
		while($cursos_array = mysqli_fetch_assoc($resultado)){
			$curso = new Cursos();
				$curso->setIdCurso($cursos_array['uniqkey']);
				$curso->setCurso($cursos_array['curso']);
				$curso->setDescricaoCurso($cursos_array['descricaoCurso']);
				$curso->setStatusCurso($cursos_array['statusCurso']);
			array_push($cursos,$curso);
		}
		//var_dump($query);
	return $cursos;
}

function cursosAssociados($conn,$idAssoc){
	$cursos = array();
	$query = "select  a.curso, b.uniqkey, b.dataRealizaCurso, b.dataUltimaReciclagem from tbCursos a inner join tbCursosRealizados b on b.idCurso = a.uniqkey where b.idAssociado = {$idAssoc}";
	$resultado = mysqli_query($conn,$query);
		while($realizados_array = mysqli_fetch_assoc($resultado)){
			$curso = new Cursos();
				$curso->setCodCurso($realizados_array['uniqkey']);
				$curso->setCurso($realizados_array['curso']);
				$curso->setDataCurso($realizados_array['dataRealizaCurso']);
				$curso->setDataReciclagem($realizados_array['dataUltimaReciclagem']);
			array_push($cursos,$curso);
		}
		//var_dump($query);
	return $cursos;
}

function insereCurso($conn,$idAssoc,$curso,$dataCurso){
	 $query = $conn->query("insert into tbCursosRealizados(idCurso,idAssociado,dataRealizaCurso) values ({$curso},{$idAssoc},'{$dataCurso}') ");
		//var_dump($query);
    //echo json_encode("<meta http-equiv='refresh' content='0' url='.\cursos-associados.php'>");
	echo "<script>window.refresh();</script>";
}

function insereNovoCurso($conn,$curso,$status) {
	$query = "INSERT INTO tbCursos(curso,statusCurso) values(upper('{$curso}'),0)";
	return mysqli_query($conn, $query);
}