<h2>Detalles de Visitas Agenda</h2>
<?php 
if (isset($_GET["id_visitas_agenda"]) ) { 
$id_visitas_agenda = (int) $_GET["id_visitas_agenda"]; 
$sql = "SELECT * FROM `visitas_agenda` 
				WHERE `id_visitas_agenda` = '".$id_visitas_agenda."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<a href="<?php echo agrega_get("pagina","visitas_agenda,listar"); ?>"><div class="boton_volver">Volver a la Lista de Visitas Agenda</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Visitas Agenda</td>
    <td><?php echo utf8_encode($row["id_visitas_agenda"]); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Sucursal</td>
    <td><?php echo nombre("sucursales",$row["id_sucursal"],"id_sucursal"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Id Vendedor</td>
    <td><?php echo nombre("vendedores",$row["id_vendedor"],"id_vendedor"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Dia</td>
    <td><?php echo utf8_encode($row["dia"]); ?></td>
  </tr>
  </table>
<? } ?>