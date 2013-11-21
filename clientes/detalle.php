<h2>Detalles de Clientes</h2>
<?php 
if (isset($_GET["id_cliente"]) ) { 
$id_cliente = (int) $_GET["id_cliente"]; 
$sql = "SELECT * FROM `clientes` 
				WHERE `id_cliente` = '".$id_cliente."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","clientes,listar"); ?>"><div class="boton_volver">Volver a la Lista de Clientes</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
   
  <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr> <tr>
    <td class="titulo_der">Zona</td>
    <td><?php echo nombre("zona_comercial",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
  </tr>
  </table>
<? } ?>
<?php include_once("sucursales/listar2.php");?>