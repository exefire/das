<h2>Eliminar Centros Ventas</h2>

<?php 
$id_centros_venta = (int) $_GET["id_centros_venta"]; 
$sql = "DELETE FROM `centros_ventas` 
				WHERE `id_centros_venta` = '".$_GET["id_centros_venta"]."' 
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
<a href="<?php echo agrega_get("pagina","centros_ventas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Centros Ventas</div></a>
