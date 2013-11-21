<h2>Crear Regiones</h2>
<? 
if (isset($_POST["nuevo_regiones"])) { 
	foreach($_POST as $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
			} 
	$sql = "INSERT INTO `regiones` ( `id_region_das` , `nombre` , `roma` , `orden` ) 
					VALUES( '".$_POST["id_region_das"]."', '".$_POST["nombre"]."', '".$_POST["roma"]."', '".$_POST["orden"]."' );"; 
	mysql_query($sql) or die(mysql_error()); 
	?><div class="msg">Registro de Regiones agregado.</div><?php 
} 
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_regiones" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","regiones,listar"); ?>"><div class="boton_volver">Volver a la Lista de Regiones</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Region Das</td>
    <td><span id="spry_campo10">
  <input type="text" name="id_region_das" id="id_region_das" value="" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><span id="spry_campo11">
  <input type="text" name="nombre" id="nombre" value="" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Roma</td>
    <td><span id="spry_campo12">
  <input type="text" name="roma" id="roma" value="" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Orden</td>
    <td><span id="spry_campo13">
  <input type="text" name="orden" id="orden" value="" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
  </tr>
    <tr>
    <td></td>
    <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
  </tr>
</table>
</form> 
<script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100});
var spry_campo11 = new Spry.Widget.ValidationTextField("spry_campo11", "none", {maxChars:255});
var spry_campo12 = new Spry.Widget.ValidationTextField("spry_campo12", "none", {maxChars:5});
var spry_campo13 = new Spry.Widget.ValidationTextField("spry_campo13", "integer", {maxChars:11});
</script>