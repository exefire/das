<?php 

if (isset($_GET['id_usuario']) ) { 
$id_usuario = (int) $_GET['id_usuario']; 
if (isset($_POST['submitted'])) { 
if($_POST['clave_crear']==$_POST['clave2']){
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
	} 
	$_POST['salt'] = md5(time()."casas");
	$_POST['hash'] = md5(trim($_POST['clave_crear']).$_POST['salt']);
	$sql = "UPDATE `usuarios` SET    `hash` =  '{$_POST['hash']}' ,  `salt` =  '{$_POST['salt']}'  WHERE `id_usuario` = '$id_usuario' "; 
	mysql_query($sql) or die(mysql_error()); 
	echo (mysql_affected_rows()) ? "Registro editado.<br />" : "Guardado sin cambios. <br />"; 
 ?> <p><a href="?pagina=usuarios,listar">Volver a la Lista</a></p>
 <?php }else{
		echo "Las claves no son iguales.";
	}
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `usuarios` WHERE `id_usuario` = '$id_usuario' ")); 
?>

<form action="" method="POST"> 
<table class="tabla">
	<tr>
	  <td><b>User:</b></td>
	  <td><?php echo formato_sql($row["user"]); ?></td>
	  </tr>
	<tr>
	  <td><b>Clave:</b></td>
	  <td><input type='password' name='clave_crear' id='clave_crear'/></td>
	  </tr>
	<tr>
	  <td><b>Clave de Nuevo:</b></td>
	  <td><input type='password' name='clave2' id='clave2'/></td>
	  </tr>
	<tr>
	  <td><b>Último Ingreso:</b></td>
	  <td><?php echo formato_sql($row["ultima_fecha"]); ?></td>
	  </tr>
	<tr>
		<td></td>
		<td><input type='submit' value='Guardar' /><input type='hidden' value='1' name='submitted' /></td>
</tr>
</table> 
</form> 
<? } ?> 
