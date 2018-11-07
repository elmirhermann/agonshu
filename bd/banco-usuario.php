<?php
header('Content-Type: text/html; charset=utf-8');
require_once("conn.php");
require_once("class/Usuarios.php");
require_once("./library/functions.php");

function buscaUsuario($conn,$user,$pwd) {

	$users = array();
	$senhaMd5 = md5($pwd);
	//$email = mysqli_real_escape_string($conn, $user);
	$query = "select count(idUser) as count, idUser, usuario, pwd, nomeUser, emailUser from tbusuarios where usuario='{$user}' and pwd='{$pwd}' and idStatusUser = 1";
	$resultado = mysqli_query($conn, $query);
	$verificar= mysqli_num_rows($resultado);
			while($user_array = mysqli_fetch_assoc($resultado)) {
				$usuario = new Usuarios();
					$usuario->setIdUser($user_array['idUser']);
					$usuario->setUser($user_array['usuario']);
					$usuario->setPwd($user_array['pwd']);
					$usuario->setNomeUser($user_array['nomeUser']);
					$usuario->setEmailUser($user_array['emailUser']);
				array_push($users,$usuario);
			}
		//var_dump($query);
	return $users;
}