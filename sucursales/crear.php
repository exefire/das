<h2>Crear Sucursales</h2>
<? 
if (isset($_POST["nuevo_sucursales"])) { 
	foreach($_POST as $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
			} 
	$sql = "INSERT INTO `sucursales` ( `id_cliente` , `id_comuna` , `id_zona_comercial` , `ERP_nombre` , `ERP_direccion` , `telefono` , `lat` , `lon` ) 
					VALUES( '".$_POST["id_cliente"]."', '".$_POST["id_comuna"]."', '".$_POST["id_zona_comercial"]."', '".$_POST["ERP_nombre"]."', '".$_POST["ERP_direccion"]."', '".$_POST["telefono"]."', '".$_POST["lat"]."', '".$_POST["lon"]."' );"; 
	mysql_query($sql) or die(mysql_error()); 
	?><div class="msg">Registro de Sucursales agregado.</div><?php 
} 
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_sucursales" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","sucursales,listar"); ?>"><div class="boton_volver">Volver a la Lista de Sucursales</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Cliente</td>
    <td><?php echo combobox("clientes","id_cliente","nombre",0,"id_cliente"); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Comuna</td>
    <td><?php echo combobox("comunas","id_comuna","nombre",0,"id_comuna","",true); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Zona Comercial</td>
    <td><?php echo combobox("zona_comercial","id_zona_comercial","nombre",0,"id_zona_comercial","",true); ?></td>
  </tr>
    <tr>
    <td class="titulo_der">ERP Nombre</td>
    <td><span id="spry_campo10">
  <input type="text" name="ERP_nombre" id="ERP_nombre" value="" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">ERP Direccion</td>
    <td><span id="spry_campo11">
  <input type="text" name="ERP_direccion" id="ERP_direccion" value="" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Telefono</td>
    <td><span id="spry_campo12">
  <input type="text" name="telefono" id="telefono" value="" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Lat</td>
    <td><span id="spry_campo13">
  <input name="lat" type="text" id="lat" value="" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
  </tr>
    <tr>
    <td class="titulo_der">Lon</td>
    <td><span id="spry_campo14">
  <input name="lon" type="text" id="lon" value="" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
  </tr>
    <tr>
    <td></td>
    <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
  </tr>
</table>
</form> 
<script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100, isRequired:false});
var spry_campo11 = new Spry.Widget.ValidationTextField("spry_campo11", "none", {maxChars:100, isRequired:false});
var spry_campo12 = new Spry.Widget.ValidationTextField("spry_campo12", "none", {maxChars:100, isRequired:false});
var spry_campo13 = new Spry.Widget.ValidationTextField("spry_campo13", "real", {isRequired:false});
var spry_campo14 = new Spry.Widget.ValidationTextField("spry_campo14", "real", {isRequired:false});
</script>