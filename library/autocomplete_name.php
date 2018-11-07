<?php
require_once("../bd/conn.php");
	
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT concat(primeiroNome,' ',segundoNome,' ',sobrenome) as nomeTodo, numeroAssociado FROM tbAssociados WHERE primeiroNome LIKE '%".$searchTerm."%' ORDER BY primeiroNome ASC");
    while ($row = $query->fetch_assoc()) {
        $retorno[] = "(".$row['numeroAssociado'].") ".$row['nomeTodo'];
    }
	
    echo json_encode($retorno);

?>