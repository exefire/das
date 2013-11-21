<h2>Crear Comunas</h2>
<? 
if (isset($_POST["nuevo_comunas"])) { 
	foreach($_POST as $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
			} 
	$sql = "INSERT INTO `comunas` ( `id_comuna_das` , `nombre` , `ERP_region` ) 
					VALUES( '".$_POST["id_comuna_das"]."', '".$_POST["nombre"]."', '".$_POST["ERP_region"]."' );"; 
	mysql_query($sql) or die(mysql_error()); 
	?><div class="msg">Registro de Comunas agregado.</div><?php 
} 
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_comunas" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","comunas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Comunas</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Comuna Das</td>
    <td><span id="spry_campo10">
  <input type="text" name="id_comuna_das" id="id_comuna_das" value="" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><span id="spry_campo11">
  <input type="text" name="nombre" id="nombre" value="" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">ERP Region</td>
    <td><span id="spry_campo12">
  <input type="text" name="ERP_region" id="ERP_region" value="" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td></td>
    <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
  </tr>
</table>
</form> 
<script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100});
var spry_campo11 = new Spry.Widget.ValidationTextField("spry_campo11", "none", {maxChars:100, isRequired:false});
var spry_campo12 = new Spry.Widget.ValidationTextField("spry_campo12", "none", {maxChars:100, isRequired:false});
</script>