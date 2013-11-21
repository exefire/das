<h2>Detalles de Zona Comercial</h2>
<?php 
if (isset($_GET["id_zona_comercial"]) ) { 
$id_zona_comercial = (int) $_GET["id_zona_comercial"]; 
$sql = "SELECT * FROM `zona_comercial` 
				WHERE `id_zona_comercial` = '".$id_zona_comercial."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","zona_comercial,listar"); ?>"><div class="boton_volver">Volver a la Lista de Zona Comercial</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Zona Comercial</td>
    <td><?php echo utf8_encode($row["id_zona_comercial"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
  </table>
<? } ?>