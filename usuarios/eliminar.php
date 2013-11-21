<?php 

$id_usuario = (int) $_GET['id_usuario']; 	
 mysql_query("DELETE FROM `usuarios` WHERE `id_usuario` = '$id_usuario' ") ; 
$filas_afectadas = mysql_affected_rows();
if($filas_afectadas>0){
	echo "Registro Eliminado.<br /> ";
}elseif($filas_afectadas==-1){
	echo "No se puede eliminar porque contiene elementos internos.<br />";
}elseif($filas_afectadas===0){
	echo "Nada para eliminar<br />";
}
?> 

<p><a href="<?php echo agrega_get("pagina","usuarios,listar"); ?>">Volver a la Lista</a></p>