<h2>Editar Visitas Agenda</h2>
<?php 
if (isset($_GET["id_visitas_agenda"]) ) { 
$id_visitas_agenda = (int) $_GET["id_visitas_agenda"]; 
if (isset($_POST["editar_visitas_agenda"])) { 
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		
	} 
	$sql = "UPDATE `visitas_agenda` 
					SET  `id_sucursal` =  '".$_POST["id_sucursal"]."' , 
						`id_vendedor` =  '".$_POST["id_vendedor"]."' , 
						`dia` =  '".$_POST["dia"]."' 
					WHERE `id_visitas_agenda` = '".$id_visitas_agenda."' "; 
	mysql_query($sql) or die(mysql_error()); 
	if (mysql_affected_rows()){?>
	<div class="msg">Datos Guardados Correctamente.</div>
	<?php }else{?>
	<div class="msg">Guardado sin cambios. </div> 
	<?php
	}
} 
$sql = "SELECT * FROM `visitas_agenda` 
				WHERE `id_visitas_agenda` = '".$id_visitas_agenda."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="editar_visitas_agenda" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","visitas_agenda,listar"); ?>"><div class="boton_volver">Volver a la Lista de Visitas Agenda</div></a>
  <table cellpadding="0" cellspacing="0" border="0" class="tabla">
        <tr>
      <td class="titulo_der">Id Visitas Agenda</td>
      <td><?php echo $row["id_visitas_agenda"]; ?></td>
    </tr>
      <tr>
    <td class="titulo_der">Id Sucursal</td>
    <td><?php echo combobox("sucursales","id_sucursal","nombre",$row["id_sucursal"],"id_sucursal"); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Vendedor</td>
    <td><?php echo combobox("vendedores","id_vendedor","nombre",$row["id_vendedor"],"id_vendedor"); ?></td>
  </tr>
      <tr>
      <td class="titulo_der">Dia</td>
      <td><span id="spry_campo10">
  <input type="text" name="dia" id="dia" value="<?php echo utf8_encode($row["dia"]); ?>" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
    </tr>
        <tr>
      <td></td>
      <td><input name="" type="submit" value="Guardar" class="boton_form" /></td>
    </tr>
  </table>
  </form> 
  <script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "integer", {maxChars:11});
</script> 
  <? } ?>