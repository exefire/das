<h2>Detalles de Sucursales</h2>
<?php 
if (isset($_GET["id_sucursal"]) ) { 
$id_sucursal = (int) $_GET["id_sucursal"]; 
$sql = "SELECT * FROM `sucursales` 
				WHERE `id_sucursal` = '".$id_sucursal."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","sucursales,listar"); ?>"><div class="boton_volver">Volver a la Lista de Sucursales</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Sucursal</td>
    <td><?php echo utf8_encode($row["id_sucursal"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Cliente</td>
    <td><?php echo nombre("clientes",$row["id_cliente"],"id_cliente"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Id Comuna</td>
    <td><?php echo nombre("comunas",$row["id_comuna"],"id_comuna"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Id Zona Comercial</td>
    <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">ERP Nombre</td>
    <td><?php echo utf8_encode($row["ERP_nombre"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">ERP Direccion</td>
    <td><?php echo utf8_encode($row["ERP_direccion"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Telefono</td>
    <td><?php echo utf8_encode($row["telefono"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Lat</td>
    <td><?php echo utf8_encode($row["lat"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Lon</td>
    <td><?php echo utf8_encode($row["lon"]); ?></td>
  </tr>
  </table>
<? } ?>