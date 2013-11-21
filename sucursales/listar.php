<h2>Lista de Sucursales</h2>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <tr>
        <th> Cliente</th>
        <th> Zona </th>
        <th> Nombre</th>
        <th> Dirección</th>
        <th> Comuna</th>
        <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php
$sql = "SELECT * FROM `sucursales`";
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
        <td><?php echo nombre("clientes",$row["id_cliente"],"id_cliente"); ?></td>
		    <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
		    <td><?php echo nl2br($row["ERP_nombre"]); ?></td>
        <td><?php echo nl2br($row["ERP_direccion"]); ?></td>
        <td><?php echo nombre("comunas",$row["id_comuna"],"id_comuna"); ?></td>
        <td><a href="<?php echo agrega_get("pagina","sucursales,detalle"); ?>&id_sucursal=<?php echo $row["id_sucursal"] ?>" title="Detalle">Detalle</a></td>
    <td><a href="<?php echo agrega_get("pagina","sucursales,editar"); ?>&id_sucursal=<?php echo $row["id_sucursal"] ?>" title="Editar">Editar</a></td>
    <td><a href="<?php echo agrega_get("pagina","sucursales,eliminar"); ?>&id_sucursal=<?php echo $row["id_sucursal"] ?>" title="Eliminar">Eliminar</a></td>
  </tr>
  <?php }?></table>
<a href="<?php echo agrega_get("pagina","sucursales,crear"); ?>">
<div class="boton_nuevo">Nueva Sucursal</div></a><?php include_once("includes/paginacion.php");?>
