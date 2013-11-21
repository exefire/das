<h2>Editar Vendedores</h2>
<?php 
if (isset($_GET["id_vendedor"]) ) { 
$id_vendedor = (int) $_GET["id_vendedor"]; 
if (isset($_POST["editar_vendedores"])) { 
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		
	} 
	$sql = "UPDATE `vendedores` 
					SET  `id_supervisor` =  '".$_POST["id_supervisor"]."' , 
						`nombre` =  '".$_POST["nombre"]."' , 
						`id_zona_comercial` =  '".$_POST["id_zona_comercial"]."' 
					WHERE `id_vendedor` = '".$id_vendedor."' "; 
	mysql_query($sql) or die(mysql_error()); 
	if (mysql_affected_rows()){?>
	<div class="msg">Datos Guardados Correctamente.</div>
	<?php }else{?>
	<div class="msg">Guardado sin cambios. </div> 
	<?php
	}
} 
$sql = "SELECT * FROM `vendedores` 
				WHERE `id_vendedor` = '".$id_vendedor."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="editar_vendedores" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","vendedores,listar"); ?>"><div class="boton_volver">Volver a la Lista de Vendedores</div></a>
  <table cellpadding="0" cellspacing="0" border="0" class="tabla">
        <tr>
      <td class="titulo_der">Id Vendedor</td>
      <td><?php echo $row["id_vendedor"]; ?></td>
    </tr>
      <tr>
    <td class="titulo_der">Id Supervisor</td>
    <td><?php echo combobox("supervisores","id_supervisor","nombre",$row["id_supervisor"],"id_supervisor"); ?></td>
  </tr>
      <tr>
      <td class="titulo_der">Nombre</td>
      <td><span id="spry_campo10">
  <input type="text" name="nombre" id="nombre" value="<?php echo utf8_encode($row["nombre"]); ?>" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span></td>
    </tr>
      <tr>
    <td class="titulo_der">Id Zona Comercial</td>
    <td><?php echo combobox("zona_comercial","id_zona_comercial","nombre",$row["id_zona_comercial"],"id_zona_comercial"); ?></td>
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