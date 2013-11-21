<h2>Lista de Regiones</h2>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <tr>
        <th>Id Region</th>
        <th>Id Region Das</th>
        <th>Nombre</th>
        <th>Roma</th>
        <th>Orden</th>
        <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php
$sql = "SELECT * FROM `regiones`";
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
			} 
?>  <tr>
        <td><?php echo nl2br($row["id_region"]); ?></td>
        <td><?php echo nl2br($row["id_region_das"]); ?></td>
        <td><?php echo nl2br($row["nombre"]); ?></td>
        <td><?php echo nl2br($row["roma"]); ?></td>
        <td><?php echo nl2br($row["orden"]); ?></td>
        <td><a href="<?php echo agrega_get("pagina","regiones,detalle"); ?>&id_region=<?php echo $row["id_region"] ?>" title="Detalle">Detalle</a></td>
    <td><a href="<?php echo agrega_get("pagina","regiones,editar"); ?>&id_region=<?php echo $row["id_region"] ?>" title="Editar">Editar</a></td>
    <td><a href="<?php echo agrega_get("pagina","regiones,eliminar"); ?>&id_region=<?php echo $row["id_region"] ?>" title="Eliminar">Eliminar</a></td>
  </tr>
  <?php }?></table>
<a href="<?php echo agrega_get("pagina","regiones,crear"); ?>"><div class="boton_nuevo">Nuevo Registro</div></a>
<?php include_once("includes/paginacion.php");?>
