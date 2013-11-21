<?php 
include_once("../includes/sql.php");

function get_tablas($nombre_bd){
	$matriz = array();
	$sql = "SHOW TABLES FROM ".$nombre_bd;
	$resultado = mysql_query($sql) or die(mysql_error());
	if (!$resultado) {
			echo "Error de BD, no se pudieron listar las tablas\n";
			echo 'Error MySQL: ' . mysql_error();
			exit;
	}
	while ($fila = mysql_fetch_row($resultado)) {
			$matriz[] = $fila[0];
	}
	return ($matriz);
}

function get_campos($tabla){
	$matriz = array();
	$resultado = mysql_query("SHOW COLUMNS FROM ".$tabla);
	if (!$resultado) {
			echo 'No se pudo ejecutar la consulta: ' . mysql_error();
			exit;
	}
	if (mysql_num_rows($resultado) > 0) {
			while ($fila = mysql_fetch_assoc($resultado)) {
					$matriz[] = ($fila);
			}
	}
	return $matriz;
}

function get_foreing($nombre_db,$tabla=""){
	$matriz = array();
	$sql = "
	SELECT
		table_name as 'padre_tabla',
		column_name as 'padre_clave', 
		referenced_table_name as 'hijo_tabla',
		referenced_column_name as 'hijo_clave'
	FROM	information_schema.key_column_usage
	WHERE	referenced_table_name is not null
	AND		table_schema = '".$nombre_db."'
	";
	if(!empty($tabla)){
		$sql .= " AND table_name = '".$tabla."' ";
	}
	$result = mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);
	for($i=0;$i<$num;$i++){
		$temp = array();
		$temp['padre_tabla'] = mysql_result($result,$i,"padre_tabla");
		$temp['padre_clave'] = mysql_result($result,$i,"padre_clave");
		$temp['hijo_tabla'] = mysql_result($result,$i,"hijo_tabla");
		$temp['hijo_clave'] = mysql_result($result,$i,"hijo_clave");
		$matriz[] = $temp;
	}
	return $matriz;
}
?>