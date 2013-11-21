<h2>Lista de Vendedores</h2>
<h3>Filtros</h3>
<form id="form1" name="form1" method="get" action="">
<?php
$no_repetir = array("id_supervisor","nombre","id_zona_comercial");
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
    <td class="titulo_der">Supervisor</td>
    <td><?php echo combobox("supervisores","id_supervisor","nombre",$_GET['id_supervisor'],"id_supervisor","",true); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Nombre</td>
    <td><input type="text" name="nombre" id="nombre" value="<?php echo $_GET['nombre']; ?>" /></td>
  </tr>
  <tr>
    <td class="titulo_der">Zona</td>
    <td><?php echo combobox("zona_comercial","id_zona_comercial","nombre",0,"id_zona_comercial","",true); ?></td>
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
        <th>Supervisor</th>
        <th>Nombre</th>
        <th>Zona</th>
        <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php
$sql = "SELECT * FROM `vendedores` 
				WHERE id_vendedor > 0
				";
if(isset($_GET['id_supervisor']) && $_GET['id_supervisor'] > 0){
	$sql .= " AND id_supervisor LIKE '".$_GET['id_supervisor']."' ";
}
if(isset($_GET['nombre']) && !empty($_GET['nombre'])){
	$sql .= " AND nombre LIKE '%".$_GET['nombre']."%' ";
}
if(isset($_GET['id_zona_comercial']) && $_GET['id_zona_comercial'] > 0){
	$sql .= " AND id_zona_comercial LIKE '".$_GET['id_zona_comercial']."' ";
}
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
        <td><?php echo nl2br($row["id_vendedor"]); ?></td>
        <td><?php echo nombre("supervisores",$row["id_supervisor"],"id_supervisor"); ?></td>
		    <td><?php echo nl2br($row["nombre"]); ?></td>
        <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
		    <td><a href="<?php echo agrega_get("pagina","vendedores,detalle"); ?>&id_vendedor=<?php echo $row["id_vendedor"] ?>" title="Detalle">Detalle</a></td>
    <td><a href="<?php echo agrega_get("pagina","vendedores,editar"); ?>&id_vendedor=<?php echo $row["id_vendedor"] ?>" title="Editar">Editar</a></td>
    <td><a href="<?php echo agrega_get("pagina","vendedores,eliminar"); ?>&id_vendedor=<?php echo $row["id_vendedor"] ?>" title="Eliminar">Eliminar</a></td>
  </tr>
  <?php }?></table>
<a href="<?php echo agrega_get("pagina","vendedores,crear"); ?>"><div class="boton_nuevo">Nuevo Registro</div></a>
<?php include_once("includes/paginacion.php");?>
