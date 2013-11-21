<?php 
set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', '1');
$file = "SUCURSALES_DE_CLIENTES.txt";

$file = fopen($file, "r") or exit("Unable to open file!");
$n_fila = 0;

function get_fila(){
	global $file, $columnas;
	$fila = fgets($file);
	$fila = str_replace("\n"," ",$fila);	
	$temp = explode(";",$fila);
	if(!isset($columnas)){
		$columnas = count($temp);
	}
	while(count($temp)<$columnas && !feof($file)){
		$fila2 = fgets($file);
		$fila2 = str_replace("\n"," ",$fila2);
		$temp = implode(";",$temp).trim($fila2);
		$temp = explode(";",$temp);
	}
	return implode(";",$temp);
}

copy("blanco.txt","data.txt");
$fp = fopen('data.txt', 'w');

while(!feof($file)){
	$n_fila++;
	$fila = get_fila();
	fwrite($fp, trim($fila)."\n");
}
fclose($file);

fclose($fp);
?>