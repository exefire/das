<h2>Eliminar <?php echo titulo_sql($_GET['tabla']); ?></h2>

<?php echo '<?php 
$'.$clave_primaria.' = (int) $_GET["'.$clave_primaria.'"]; 
$sql = "DELETE FROM `'.$_GET['tabla'].'` 
				WHERE `'.$clave_primaria.'` = \'".$_GET["'.$clave_primaria.'"]."\' 
				";
mysql_query($sql); 
$filas_afectadas = mysql_affected_rows();
if($filas_afectadas>0){?>
	<div class="msg">Registro Eliminado. </div>
<?php }elseif($filas_afectadas==-1){?>
	<div class="msg">No se puede eliminar este registro porque tiene relación con elementos de otras tablas.</div>
<?php }elseif($filas_afectadas===0){?>
	<div class="msg">Nada para eliminar. </div>
<?php }?>
<a href="<?php echo agrega_get("pagina","'.$_GET['tabla'].',listar"); ?>"><div class="boton_volver">Volver a la Lista de '.titulo_sql($_GET['tabla']).'</div></a>
';
?>