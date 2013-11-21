<h2>Detalles de Centros Ventas</h2>
<?php 
if (isset($_GET["id_centros_venta"]) ) { 
$id_centros_venta = (int) $_GET["id_centros_venta"]; 
$sql = "SELECT * FROM `centros_ventas` 
				WHERE `id_centros_venta` = '".$id_centros_venta."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","centros_ventas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Centros Ventas</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Centros Venta</td>
    <td><?php echo utf8_encode($row["id_centros_venta"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
  </table>
<? } ?>