<h2>Detalles de Vendedores</h2>
<?php 
if (isset($_GET["id_vendedor"]) ) { 
$id_vendedor = (int) $_GET["id_vendedor"]; 
$sql = "SELECT * FROM `vendedores` 
				WHERE `id_vendedor` = '".$id_vendedor."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<style>
.ul_fino{
	padding:0px;
	margin: 0px 0px 0px 15px;
}
</style>
<a href="<?php echo agrega_get("pagina","vendedores,listar"); ?>">
<div class="boton_volver">Volver a la Lista de Vendedores</div>
</a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <tr>
    <td class="titulo_der"> Supervisor</td>
    <td><?php echo nombre("supervisores",$row["id_supervisor"],"id_supervisor"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
  <tr>
    <td class="titulo_der"> Zona </td>
    <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
  </tr>
</table>
<? } ?>
<h2>Visitas Programadas</h2>
<?php 
$sql = "SELECT * FROM `visitas_agenda`
				WHERE `id_vendedor` = '".$_GET['id_vendedor']."'
				ORDER BY dia
				";
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$visitas = array();
for($i=0;$i<$num;$i++){
	$id_sucursal = mysql_result($result,$i,"id_sucursal");
	$dia = mysql_result($result,$i,"dia");
	$visitas[$dia][] = ($id_sucursal);
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla">
  <tr>
    <?php for($dia=1;$dia<=6;$dia++){?>
    <th><?php echo dias($dia); ?>&nbsp;</th>
    <?php }?>
  </tr>
  <tr>
    <?php for($dia=1;$dia<=6;$dia++){?>
    <td style="border-left:1px solid;"><ul class="ul_fino">
        <?php 
				if(!isset($visitas[$dia])){
					continue;
				}
				foreach($visitas[$dia] as $id_sucursal){?>
        <li><?php echo nombre("sucursales",$id_sucursal,"id_sucursal","ERP_nombre"); ?> </li>
        <?php	}?>
      </ul></td>
    <?php }?>
  </tr>
</table><a href="<?php echo agrega_get("pagina","visitas_agenda,crear3"); ?>"><div class="boton_volver">Nueva Visita</div></a>
