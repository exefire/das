<h2>Eliminar Vendedores</h2>

<?php 
$id_vendedor = (int) $_GET["id_vendedor"]; 
$sql = "DELETE FROM `vendedores` 
				WHERE `id_vendedor` = '".$_GET["id_vendedor"]."' 
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
<a href="<?php echo agrega_get("pagina","vendedores,listar"); ?>"><div class="boton_volver">Volver a la Lista de Vendedores</div></a>
