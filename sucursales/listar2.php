<h2>Sucursales</h2>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <tr>
        <th> Nombre</th>
        <th> Zona </th>
        <th> Dirección</th>
        <th> Comuna</th>
        <th>Vendedores</th>
        <th>Días</th>
        <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php
$sql = "SELECT sucursales.*, count(DISTINCT id_vendedor) as vendedores, count(DISTINCT dia) as dias FROM `sucursales`
				LEFT JOIN visitas_agenda ON sucursales.id_sucursal = visitas_agenda.id_sucursal
				WHERE sucursales.id_cliente = '".$_GET["id_cliente"]."'
				GROUP BY sucursales.id_sucursal
				";
$result = mysql_query($sql) or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
	foreach($row as $key => $value) { 
		$row[$key] = stripslashes($value); 
		$row[$key] = utf8_encode($value);  
			} 
?>  <tr>
        <td><?php echo nl2br($row["ERP_nombre"]); ?></td>
        <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
        <td><?php echo nl2br($row["ERP_direccion"]); ?></td>
        <td><?php echo nombre("comunas",$row["id_comuna"],"id_comuna"); ?></td>
        <td align="center"><?php echo nl2br($row["vendedores"]); ?></td>
        <td align="center"><?php echo nl2br($row["dias"]); ?></td>
        <td><a href="<?php echo agrega_get("pagina","sucursales,visitas"); ?>&id_sucursal=<?php echo $row["id_sucursal"] ?>" title="Detalle">Visitas</a></td>
    <td><a href="<?php echo agrega_get("pagina","sucursales,editar"); ?>&id_sucursal=<?php echo $row["id_sucursal"] ?>" title="Editar">Editar</a></td>
    <td><a href="<?php echo agrega_get("pagina","sucursales,eliminar"); ?>&id_sucursal=<?php echo $row["id_sucursal"] ?>" title="Eliminar">Eliminar</a></td>
  </tr>
  <?php }?></table>