<h2>Detalles de Supervisores</h2>
<?php 
if (isset($_GET["id_supervisor"]) ) { 
$id_supervisor = (int) $_GET["id_supervisor"]; 
$sql = "SELECT * FROM `supervisores` 
				WHERE `id_supervisor` = '".$id_supervisor."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","supervisores,listar"); ?>"><div class="boton_volver">Volver a la Lista de Supervisores</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Supervisor</td>
    <td><?php echo utf8_encode($row["id_supervisor"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo utf8_encode($row["nombre"]); ?></td>
  </tr>
  </table>
<? } ?>