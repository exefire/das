<h2>Detalles de Sectores</h2>
<?php 
if (isset($_GET["id_sector"]) ) { 
$id_sector = (int) $_GET["id_sector"]; 
$sql = "SELECT * FROM `sectores` 
				WHERE `id_sector` = '".$id_sector."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","sectores,listar"); ?>"><div class="boton_volver">Volver a la Lista de Sectores</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Sector</td>
    <td><?php echo utf8_encode($row["id_sector"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Zona Comercial</td>
    <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
  </table>
<? } ?>