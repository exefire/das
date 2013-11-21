<h2>Detalles de Sucursale</h2>
<?php 
if (isset($_GET["id_sucursal"]) ) { 
$id_sucursal = (int) $_GET["id_sucursal"]; 
$sql = "SELECT * FROM `sucursales` 
				WHERE `id_sucursal` = '".$id_sucursal."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
?>
<a href="<?php echo agrega_get("pagina","clientes,detalle"); ?>">
<div class="boton_volver">Volver al Cliente</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der"> Cliente</td>
    <td><?php echo nombre("clientes",$row["id_cliente"],"id_cliente"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der"> Comuna</td>
    <td><?php echo nombre("comunas",$row["id_comuna"],"id_comuna"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Zona</td>
    <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Sucursal</td>
    <td><?php echo utf8_encode($row["ERP_nombre"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der"> Dirección</td>
    <td><?php echo utf8_encode($row["ERP_direccion"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Teléfono</td>
    <td><?php echo utf8_encode($row["telefono"]); ?></td>
  </tr>
  </table>
<? } ?>
<h2>Visitas Programadas</h2>
<?php 
$sql = "SELECT * FROM `visitas_agenda`
				WHERE `id_sucursal` = '".$_GET['id_sucursal']."'
				ORDER BY dia
				";
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$visitas = array();
for($i=0;$i<$num;$i++){
	$id_vendedor = mysql_result($result,$i,"id_vendedor");
	$dia = mysql_result($result,$i,"dia");
	$visitas[$id_vendedor][] = ($dia);
}
?>
<table border="0" cellspacing="0" cellpadding="0" class="tabla">
  <tr>
    <th>Vendedor</th>
    <?php for($dia=1;$dia<=6;$dia++){?>
    <th><?php echo dias($dia); ?></th>
    <?php }?>
  </tr>
  <?php foreach($visitas as $id_vendedor => $dias){?>
  <tr>
    <td><?php echo nombre("vendedores",$id_vendedor,"id_vendedor"); ?></td>
    <?php for($dia=1;$dia<=6;$dia++){?>
    <td align="center" style="border-left:1px solid; <?php if(in_array($dia,$dias)){?>background:#090; <?php }?> ">&nbsp;</td>
    <?php }?>
  </tr>
  <?php }?>
</table>
<a href="<?php echo agrega_get("pagina","visitas_agenda,crear"); ?>">
<div class="boton_volver">Nueva Visita</div></a>