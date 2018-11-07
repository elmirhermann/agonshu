<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agonshu";

// Cria a Conexao
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset( $conn, 'UTF8' ); //converte a base para aceitar caracteres Japoneses

// Checagem da Conexao
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
