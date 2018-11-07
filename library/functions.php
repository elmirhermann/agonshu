<?php

/*********************/
/* funcoes para data */
/*********************/

//Converte para o padrao Brasileiro dd/mm/aaaa
function dateToBR($data){
	if(strtotime($data) == ''){
		return '';
	}else{
		return date("d/m/Y",strtotime($data));
	}
}

//Converte para o padrao Brasileiro dd/mm/aaaa h:mm:ss
function dateTimeToBR($data){
	if(strtotime($data) == ''){
		return '';
	}else{
		return date("d/m/Y H:i:s",strtotime($data));
	}
}

//Converte para o padrao Americano yyyy/mm/dd
function dateToUS($data){
	if(strtotime($data) == ''){
		return '';
	}else{
		return date("Y/m/d",strtotime($data));
	}
}

//Converte para o padrao Americano yyyy/mm/dd h:mm:ss
function dateTimeToUS($data){
		$dt = $data;
		$data1 = DateTime::createFromFormat("d/m/Y H:i:s", $dt);
		return $data1->format("Y-m-d H:i:s");
}

//Retorna Somente o Ano
function dateYear($data){
	if(strtotime($data) == ''){
		return '';
	}else{
		return date("Y",strtotime($data));
	}
}
?>