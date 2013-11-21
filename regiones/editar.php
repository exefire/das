<h2>Editar Regiones</h2>
<?php 
if (isset($_GET["id_region"]) ) { 
$id_region = (int) $_GET["id_region"]; 
if (isset($_POST["editar_regiones"])) { 
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		
	} 
	$sql = "UPDATE `regiones` 
					SET  `id_region_das` =  '".$_POST["id_region_das"]."' , 
						`nombre` =  '".$_POST["nombre"]."' , 
						`roma` =  '".$_POST["roma"]."' , 
						`orden` =  '".$_POST["orden"]."' 
					WHERE `id_region` = '".$id_region."' "; 
	mysql_query($sql) or die(mysql_error()); 
	if (mysql_affected_rows()){?>
	<div class="msg">Datos Guardados Correctamente.</div>
	<?php }else{?>
	<div class="msg">Guardado sin cambios. </div> 
	<?php
	}
} 
$sql = "SELECT * FROM `regiones` 
				WHERE `id_region` = '".$id_region."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="editar_regiones" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","regiones,listar"); ?>"><div class="boton_volver">Volver a la Lista de Regiones</div></a>
  <table cellpadding="0" cellspacing="0" border="0" class="tabla">
        <tr>
      <td class="titulo_der">Id Region</td>
      <td><?php echo $row["id_region"]; ?></td>
    </tr>
        <tr>
      <td class="titulo_der">Id Region Das</td>
      <td><span id="spry_campo10">
  <input type="text" name="id_region_das" id="id_region_das" value="<?php echo utf8_encode($row["id_region_das"]); ?>" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Nombre</td>
      <td><span id="spry_campo11">
  <input type="text" name="nombre" id="nombre" value="<?php echo utf8_encode($row["nombre"]); ?>" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Roma</td>
      <td><span id="spry_campo12">
  <input type="text" name="roma" id="roma" value="<?php echo utf8_encode($row["roma"]); ?>" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Orden</td>
      <td><span id="spry_campo13">
  <input type="text" name="orden" id="orden" value="<?php echo utf8_encode($row["orden"]); ?>" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span></td>
    </tr>
        <tr>
      <td></td>
      <td><input name="" type="submit" value="Guardar" class="boton_form" /></td>
    </tr>
  </table>
  </form> 
  <script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100});
var spry_campo11 = new Spry.Widget.ValidationTextField("spry_campo11", "none", {maxChars:255});
var spry_campo12 = new Spry.Widget.ValidationTextField("spry_campo12", "none", {maxChars:5});
var spry_campo13 = new Spry.Widget.ValidationTextField("spry_campo13", "integer", {maxChars:11});
</script> 
  <? } ?>