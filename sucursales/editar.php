<h2>Editar Sucursales</h2>
<?php 
if (isset($_GET["id_sucursal"]) ) { 
$id_sucursal = (int) $_GET["id_sucursal"]; 
if (isset($_POST["editar_sucursales"])) { 
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		
	} 
	$sql = "UPDATE `sucursales` 
					SET   
						`id_comuna` =  '".$_POST["id_comuna"]."' , 
						`id_zona_comercial` =  '".$_POST["id_zona_comercial"]."' , 
						`id_sector` =  '".$_POST["id_sector"]."' , 
						`ERP_nombre` =  '".$_POST["ERP_nombre"]."' , 
						`ERP_direccion` =  '".$_POST["ERP_direccion"]."' , 
						`telefono` =  '".$_POST["telefono"]."' , 
						`lat` =  '".$_POST["lat"]."' , 
						`lon` =  '".$_POST["lon"]."' 
					WHERE `id_sucursal` = '".$id_sucursal."' "; 
	mysql_query($sql) or die(mysql_error()); 
	if (mysql_affected_rows()){?>
	<div class="msg">Datos Guardados Correctamente.</div>
	<?php }else{?>
	<div class="msg">Guardado sin cambios. </div> 
	<?php
	}
} 
$sql = "SELECT * FROM `sucursales` 
				WHERE `id_sucursal` = '".$id_sucursal."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="editar_sucursales" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","sucursales,listar"); ?>"><div class="boton_volver">Volver a la Lista de Sucursales</div></a>
  <table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
      <td class="titulo_der">Comuna</td>
      <td><?php echo combobox("comunas","id_comuna_das","nombre",$row["id_comuna"],"id_comuna","",true); ?></td>
    </tr>
    <tr>
      <td class="titulo_der">Zona</td>
      <td><?php echo combobox("zona_comercial","id_zona_comercial","nombre",$row["id_zona_comercial"],"id_zona_comercial","",true); ?></td>
    </tr>
    <tr>
    <td class="titulo_der">Sector</td>
    <td><?php echo combobox("sectores","id_sector","nombre",$row["id_sector"],"id_sector","",true); ?></td>
  </tr>
      <tr>
      <td class="titulo_der">ERP Nombre</td>
      <td><span id="spry_campo10">
  <input type="text" name="ERP_nombre" id="ERP_nombre" value="<?php echo utf8_encode($row["ERP_nombre"]); ?>" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">ERP Direccion</td>
      <td><span id="spry_campo11">
  <input type="text" name="ERP_direccion" id="ERP_direccion" value="<?php echo utf8_encode($row["ERP_direccion"]); ?>" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Telefono</td>
      <td><span id="spry_campo12">
  <input type="text" name="telefono" id="telefono" value="<?php echo utf8_encode($row["telefono"]); ?>" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Lat</td>
      <td><span id="spry_campo13">
  <input name="lat" type="text" id="lat" value="<?php echo utf8_encode($row["lat"]); ?>" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Lon</td>
      <td><span id="spry_campo14">
  <input name="lon" type="text" id="lon" value="<?php echo utf8_encode($row["lon"]); ?>" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
    </tr>
        <tr>
      <td></td>
      <td><input name="" type="submit" value="Guardar" class="boton_form" /></td>
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
  <? } ?>