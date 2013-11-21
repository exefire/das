<h2>Detalles de Comunas</h2>
<?php 
if (isset($_GET["id_comuna"]) ) { 
$id_comuna = (int) $_GET["id_comuna"]; 
$sql = "SELECT * FROM `comunas` 
				WHERE `id_comuna` = '".$id_comuna."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","comunas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Comunas</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Comuna</td>
    <td><?php echo utf8_encode($row["id_comuna"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Comuna Das</td>
    <td><?php echo utf8_encode($row["id_comuna_das"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">ERP Region</td>
    <td><?php echo utf8_encode($row["ERP_region"]); ?></td>
  </tr>
  </table>
<? } ?>