<h2>Editar Comunas</h2>
<?php 
if (isset($_GET["id_comuna"]) ) { 
$id_comuna = (int) $_GET["id_comuna"]; 
if (isset($_POST["editar_comunas"])) { 
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		
	} 
	$sql = "UPDATE `comunas` 
					SET  `id_comuna_das` =  '".$_POST["id_comuna_das"]."' , 
						`nombre` =  '".$_POST["nombre"]."' , 
						`ERP_region` =  '".$_POST["ERP_region"]."' 
					WHERE `id_comuna` = '".$id_comuna."' "; 
	mysql_query($sql) or die(mysql_error()); 
	if (mysql_affected_rows()){?>
	<div class="msg">Datos Guardados Correctamente.</div>
	<?php }else{?>
	<div class="msg">Guardado sin cambios. </div> 
	<?php
	}
} 
$sql = "SELECT * FROM `comunas` 
				WHERE `id_comuna` = '".$id_comuna."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="editar_comunas" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","comunas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Comunas</div></a>
  <table cellpadding="0" cellspacing="0" border="0" class="tabla">
        <tr>
      <td class="titulo_der">Id Comuna</td>
      <td><?php echo $row["id_comuna"]; ?></td>
    </tr>
        <tr>
      <td class="titulo_der">Id Comuna Das</td>
      <td><span id="spry_campo10">
  <input type="text" name="id_comuna_das" id="id_comuna_das" value="<?php echo utf8_encode($row["id_comuna_das"]); ?>" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">Nombre</td>
      <td><span id="spry_campo11">
  <input type="text" name="nombre" id="nombre" value="<?php echo utf8_encode($row["nombre"]); ?>" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td class="titulo_der">ERP Region</td>
      <td><span id="spry_campo12">
  <input type="text" name="ERP_region" id="ERP_region" value="<?php echo utf8_encode($row["ERP_region"]); ?>" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td></td>
      <td><input name="" type="submit" value="Guardar" class="boton_form" /></td>
    </tr>
  </table>
  </form> 
  <script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100});
var spry_campo11 = new Spry.Widget.ValidationTextField("spry_campo11", "none", {maxChars:100, isRequired:false});
var spry_campo12 = new Spry.Widget.ValidationTextField("spry_campo12", "none", {maxChars:100, isRequired:false});
</script> 
  <? } ?>