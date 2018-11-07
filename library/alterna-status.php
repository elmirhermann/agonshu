<!DOCTYPE HTML>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("../bd/conn.php");

$acao = $_POST['acao'];
$id = $_POST['id'];
$status = $_POST['status'];
$tabela = $_POST['tabela'];
$campoTabela = $_POST['campoTabela'];
$campoId = $_POST['campoId'];
$url = $_POST['url'];

$query = $conn->query("UPDATE ".$tabela." SET ".$campoTabela." = ".$status." WHERE ".$campoId." = ".$id);
//$query =("UPDATE ".$tabela." SET ".$campoTabela." = ".$status." WHERE ".$campoId." = ".$id);
?>
<script>
	parent.parent.document.location = parent.parent.document.location;
</script>