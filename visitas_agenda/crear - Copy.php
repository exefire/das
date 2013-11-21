<h2>Crear Visitas Agenda</h2>
<? 
if (isset($_POST["nuevo_visitas_agenda"])) { 
	foreach($_POST as $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
			} 
	$sql = "INSERT INTO `visitas_agenda` ( `id_sucursal` , `id_vendedor` , `dia` ) 
					VALUES( '".$_POST["id_sucursal"]."', '".$_POST["id_vendedor"]."', '".$_POST["dia"]."' );"; 
	mysql_query($sql) or die(mysql_error()); 
	?><div class="msg">Registro de Visitas Agenda agregado.</div><?php 
} 
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_visitas_agenda" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","visitas_agenda,listar"); ?>"><div class="boton_volver">Volver a la Lista de Visitas Agenda</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Sucursal</td>
    <td><?php echo combobox("sucursales","id_sucursal","nombre",0,"id_sucursal"); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Vendedor</td>
    <td><?php echo combobox("vendedores","id_vendedor","nombre",0,"id_vendedor"); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Dia</td>
    <td><span id="spry_campo10">
  <input type="text" name="dia" id="dia" value="" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
  </tr>
    <tr>
    <td></td>
    <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
  </tr>
</table>
</form> 
<script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "integer", {maxChars:11});
</script>