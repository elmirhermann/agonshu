<?php
$conn = mysqli_connect("localhost","root","","agonshu");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$busca = "SELECT * FROM tbTipoReceita";

$total_reg = "20"; // número de registros por página

$pagina=$_GET['pagina'];
if (!$pagina) {
$pc = "1";
} else {
$pc = $pagina;
}

$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = mysqli_query($conn,"{$busca} LIMIT {$inicio},{$total_reg}");
$todos = mysqli_query($conn,"{$busca}");
 
$tr = mysqli_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas
 
// vamos criar a visualização
while ($dados = mysqli_fetch_assoc($limite)) {
$nome = $dados["tipoReceita"];
echo "Nome: $nome<br>";
}
 
// agora vamos criar os botões "Anterior e próximo"
$anterior = $pc -1;
$proximo = $pc +1;
if ($pc>1) {
echo " <a href='?pagina=$anterior'><- Anterior</a> ";
}
echo "|";
if ($pc<$tp) {
echo " <a href='?pagina=$proximo'>Próxima -></a>";
}
?>