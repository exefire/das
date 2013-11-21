<h2>Eliminar Visitas Agenda</h2>

<?php 
$id_visitas_agenda = (int) $_GET["id_visitas_agenda"]; 
$sql = "DELETE FROM `visitas_agenda` 
				WHERE `id_visitas_agenda` = '".$_GET["id_visitas_agenda"]."' 
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
<a href="<?php echo agrega_get("pagina","visitas_agenda,listar"); ?>"><div class="boton_volver">Volver a la Lista de Visitas Agenda</div></a>
