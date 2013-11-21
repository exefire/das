<h2>Editar Centros Ventas</h2>
<?php 
if (isset($_GET["id_centros_venta"]) ) { 
$id_centros_venta = (int) $_GET["id_centros_venta"]; 
if (isset($_POST["editar_centros_ventas"])) { 
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		
	} 
	$sql = "UPDATE `centros_ventas` 
					SET  `nombre` =  '".$_POST["nombre"]."' 
					WHERE `id_centros_venta` = '".$id_centros_venta."' "; 
	mysql_query($sql) or die(mysql_error()); 
	if (mysql_affected_rows()){?>
	<div class="msg">Datos Guardados Correctamente.</div>
	<?php }else{?>
	<div class="msg">Guardado sin cambios. </div> 
	<?php
	}
} 
$sql = "SELECT * FROM `centros_ventas` 
				WHERE `id_centros_venta` = '".$id_centros_venta."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="editar_centros_ventas" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","centros_ventas,listar"); ?>"><div class="boton_volver">Volver a la Lista de Centros Ventas</div></a>
  <table cellpadding="0" cellspacing="0" border="0" class="tabla">
        <tr>
      <td class="titulo_der">Id Centros Venta</td>
      <td><?php echo $row["id_centros_venta"]; ?></td>
    </tr>
        <tr>
      <td class="titulo_der">Nombre</td>
      <td><span id="spry_campo10">
  <input type="text" name="nombre" id="nombre" value="<?php echo utf8_encode($row["nombre"]); ?>" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
        <tr>
      <td></td>
      <td><input name="" type="submit" value="Guardar" class="boton_form" /></td>
    </tr>
  </table>
  </form> 
  <script type="text/javascript">
var spry_campo10 = new Spry.Widget.ValidationTextField("spry_campo10", "none", {maxChars:100});
</script> 
  <? } ?>