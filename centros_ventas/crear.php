<h2>Crear Centros Ventas</h2>
<? 
if (isset($_POST["nuevo_centros_ventas"])) { 
	foreach($_POST as $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
			} 
	$sql = "INSERT INTO `centros_ventas` ( `nombre` ) 
					VALUES( '".$_POST["nombre"]."' );"; 
	mysql_query($sql) or die(mysql_error()); 
	?><div class="msg">Registro de Centros Ventas agregado.</div><?php 
} 
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_centros_ventas" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","centros_ventas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Centros Ventas</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><span id="spry_campo10">
  <input type="text" name="nombre" id="nombre" value="" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td></td>
    <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
  </tr>
</table>
</form> 
<script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100});
</script>