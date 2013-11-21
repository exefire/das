<h2>Lista de <?php echo titulo_sql($_GET['tabla']); ?></h2>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <tr>
    <?php foreach($campos as $campo){	?>
    <th><?php echo titulo_sql($campo['Field']); ?></th>
    <?php } ?>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php 
echo '<?php
$sql = "SELECT * FROM `'.$_GET['tabla'].'`";
$result = mysql_query($sql) or die(mysql_error()."<br><br>".nl2br($sql));
$_SISTEMA["paginacion_total"] = mysql_num_rows($result);
$_SISTEMA["paginas"] = ceil($_SISTEMA["paginacion_total"]/$_SISTEMA["lineas_por_pagina"]);
if(isset($_GET["pagina_n"])){
	$_SISTEMA["pagina_n"] = $_GET["pagina_n"];
}else{
	$_SISTEMA["pagina_n"] = 1;
}
$sql .= " LIMIT ".(($_SISTEMA["pagina_n"]-1)*$_SISTEMA["lineas_por_pagina"]).", ".$_SISTEMA["lineas_por_pagina"];
$result = mysql_query($sql) or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
	foreach($row as $key => $value) { 
		$row[$key] = stripslashes($value); 
		$row[$key] = utf8_encode($value);  
		';
if(count($con_fecha)>0){
	foreach($con_fecha as $campo_fecha){
		echo 
	'if($key=="'.$campo_fecha.'"){
		$row[$key] = formato_fechaUS($value); 
	}
	';
	}
}
echo '	} 
?>';?>
  <tr>
    <?php foreach($campos as $campo){	
		if($campo['Key']=='MUL'){
		?>
    <?php echo '<td><?php echo nombre("'.$relaciones[$rel[$campo['Field']]]['hijo_tabla'].'",$row["'.$campo['Field'].'"],"'.$relaciones[$rel[$campo['Field']]]['hijo_clave'].'"); ?></td>
';?>
		<?php	
		continue;}
		?>
    <?php echo '<td><?php echo nl2br($row["'.$campo['Field'].'"]); ?></td>
';?>
    <?php }?>
    <td><a href="<?php echo '<?php echo agrega_get("pagina","'.$_GET['tabla'].',detalle"); ?>'; ?>&<?php echo $clave_primaria; ?>=<?php echo '<?php echo $row["'.$clave_primaria.'"] ?>'; ?>" title="Detalle">Detalle</a></td>
    <td><a href="<?php echo '<?php echo agrega_get("pagina","'.$_GET['tabla'].',editar"); ?>'; ?>&<?php echo $clave_primaria; ?>=<?php echo '<?php echo $row["'.$clave_primaria.'"] ?>'; ?>" title="Editar">Editar</a></td>
    <td><a href="<?php echo '<?php echo agrega_get("pagina","'.$_GET['tabla'].',eliminar"); ?>'; ?>&<?php echo $clave_primaria; ?>=<?php echo '<?php echo $row["'.$clave_primaria.'"] ?>'; ?>" title="Eliminar">Eliminar</a></td>
  </tr>
  <?php echo '<?php }?>'; ?>
</table>
<?php echo '<a href="<?php echo agrega_get("pagina","'.$_GET['tabla'].',crear"); ?>"><div class="boton_nuevo">Nuevo Registro</div></a>
<?php include_once("includes/paginacion.php");?>
'; ?>