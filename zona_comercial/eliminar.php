<h2>Eliminar Zona Comercial</h2>

<?php 
$id_zona_comercial = (int) $_GET["id_zona_comercial"]; 
$sql = "DELETE FROM `zona_comercial` 
				WHERE `id_zona_comercial` = '".$_GET["id_zona_comercial"]."' 
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
<a href="<?php echo agrega_get("pagina","zona_comercial,listar"); ?>"><div class="boton_volver">Volver a la Lista de Zona Comercial</div></a>
