<?php
setlocale(LC_ALL, "pt_BR");
date_default_timezone_set('America/Sao_Paulo');

define("DB_TYPE", "mysql");
define("DB_USER", "thanos");
define("DB_PASS", "123");
define("DB_HOST", "127.0.0.1");
define("DB_DATABASE", "thanos");


function __autoload($className)
{
	$server  = $_SERVER["DOCUMENT_ROOT"];
	$arquivo = $_SERVER["PHP_SELF"];

	$iPos 	 = strpos($arquivo, "/", 1);
	$arquivo = substr($arquivo, 0, $iPos);
	$rInclude= $server . $arquivo;


	$file = "{$server}/class/{$className}.php";


	
	if(!file_exists($file)){ $file = "{$rInclude}/class/{$className}.php"; }

	include_once($file);

}

function calcularTempoPercorrido($_dataInicio, $_dataFim){
	
	$datetime1 = date_create($_dataInicio);
	$datetime2 = date_create($_dataFim);
	$interval = date_diff($datetime2, $datetime1);
		
	$dias = $interval->format('%d');
	$minutos = $interval->format('%I');
	$horas = $interval->format('%H');
	$horas = $horas+($dias*24);
	
	$horas = str_pad($horas, 2, "0", STR_PAD_LEFT);

	if ($interval->format('%y') > 1){
		$_anos = $interval->format('%y') ." anos ";
	}
	else if ($interval->format('%y') == 1){
		$_anos = $interval->format('%y') ." ano ";
	}
	
	if ($interval->format('%m') > 1){
		$_meses = $interval->format('%m') ." meses ";
	}
	else if ($interval->format('%m') == 1){
		$_meses = $interval->format('%m') ." mês ";
	}
	
	if ($interval->format('%d') > 1){
		$_dias = $interval->format('%d') ." dias ";
	}
	else if ($interval->format('%d') == 1){
		$_dias = $interval->format('%d') ." dia ";
	}
	
	return $_anos ." ". $_meses ." ". $_dias;
	
	//return $interval->format('%y')." anos(s) ". $interval->format('%m') ." mes(es) ". $interval->format('%d') . " dia(s)";
	
}


function fTrataNulo($_value, $_small = false){
	$_return = '';
	
	if (empty($_value) || $_value == null){
		if (!$_small){
			$_return = '<font color=silver>[sem informa&ccedil;&atilde;o]</font>';
		}
		else{
			$_return = '<font color=silver> - </font>';
		}
	}
	else{
		$_return = $_value;
	}
	
	return utf8_encode($_return);
	
}

?>