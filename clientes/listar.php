<h2>Lista de Clientes</h2>
<h3>Filtros</h3>
<form id="form1" name="form1" method="get" action="">
<?php
$no_repetir = array("nombre","rut");
foreach($no_repetir as $nombre){
	if(!isset($_GET[$nombre])){
		$_GET[$nombre] = "";
	}
}
foreach($_GET as $clave => $valor){
	if(in_array($clave,$no_repetir)){
		continue;
	}
?>
<input name="<?php echo $clave; ?>" type="hidden" value="<?php echo $valor; ?>" />
<?php }?>
<input type="hidden" name="pagina_n" id="pagina_n" value="1" />
<table border="0" cellspacing="0" cellpadding="0" class="tabla">
  <tr>
    <td class="titulo_der">RUT</td>
    <td><input type="text" name="rut" id="rut" value="<?php echo $_GET['rut']; ?>" /></td>
  </tr>
  <tr>
    <td class="titulo_der">Nombre</td>
    <td><input type="text" name="nombre" id="nombre" value="<?php echo $_GET['nombre']; ?>" /></td>
  </tr>
  <tr>
    <td class="titulo_der">&nbsp;</td>
    <td><input type="submit" value="Filtrar" /></td>
  </tr>
</table>
</form><br />
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <tr>
        <th>RUT</th>
        <th>Nombre</th>
        <th>Sucursales</th>
        <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php
$sql = "SELECT clientes.*, count(id_sucursal) as cantidad_sucursales FROM `clientes`
				LEFT JOIN sucursales ON clientes.id_cliente = sucursales.id_cliente
				WHERE clientes.id_cliente > 0
				";
if(isset($_GET['nombre'])){
	$sql .= " AND clientes.nombre LIKE '%".$_GET['nombre']."%' ";
}
if(isset($_GET['rut'])){
	$sql .= " AND clientes.id_cliente_das LIKE '%".$_GET['rut']."%' ";
}
$sql .= " GROUP BY clientes.id_cliente
				";
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
        <td align="center"><?php echo nl2br($row["id_cliente_das"]); ?></td>
        <td><?php echo nl2br($row["nombre"]); ?></td>
		    <td align="center"><?php echo nl2br($row["cantidad_sucursales"]); ?></td>
        <td><a href="<?php echo agrega_get("pagina","clientes,detalle"); ?>&id_cliente=<?php echo $row["id_cliente"] ?>" title="Detalle">Detalle</a></td>
    <td><a href="<?php echo agrega_get("pagina","clientes,editar"); ?>&id_cliente=<?php echo $row["id_cliente"] ?>" title="Editar">Editar</a></td>
    <td><a href="<?php echo agrega_get("pagina","clientes,eliminar"); ?>&id_cliente=<?php echo $row["id_cliente"] ?>" title="Eliminar">Eliminar</a></td>
  </tr>
  <?php }?></table>
<a href="<?php echo agrega_get("pagina","clientes,crear"); ?>"><div class="boton_nuevo">Nuevo Registro</div></a>
<?php include_once("includes/paginacion.php");?>
