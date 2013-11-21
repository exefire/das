<h2>Detalles de Regiones</h2>
<?php 
if (isset($_GET["id_region"]) ) { 
$id_region = (int) $_GET["id_region"]; 
$sql = "SELECT * FROM `regiones` 
				WHERE `id_region` = '".$id_region."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","regiones,listar"); ?>"><div class="boton_volver">Volver a la Lista de Regiones</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Region</td>
    <td><?php echo utf8_encode($row["id_region"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Region Das</td>
    <td><?php echo utf8_encode($row["id_region_das"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Roma</td>
    <td><?php echo utf8_encode($row["roma"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Orden</td>
    <td><?php echo utf8_encode($row["orden"]); ?></td>
  </tr>
  </table>
<? } ?>