<? 

if (isset($_POST['submitted'])) {
	if($_POST['clave_crear']==$_POST['clave2']){
		
		
	foreach($_POST AS $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
	} 
	$_POST['salt'] = md5(time()."casas");
	$_POST['hash'] = md5(trim($_POST['clave_crear']).$_POST['salt']);
	
	
	$sql = "INSERT INTO `usuarios` ( `user` ,  `hash` ,  `salt` ,  `ultima_fecha`  ) VALUES(  '{$_POST['user_crear']}' ,  '{$_POST['hash']}' ,  '{$_POST['salt']}' ,  ''  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	 ?> Usuario agregado.<br />
		<p><a href='?pagina=usuarios'>Volver a la Lista de Usuarios</a></p>
	 <?php  
	}else{
		echo "Las claves no son iguales.";
	}
}
 ?>

<form action="<?php echo agrega_get(); ?>" method="POST"> 
<table class="tabla">
	<tr>
		<td><b>User:</b></td>
		<td><input type='text' name='user_crear' id='user_crear'/></td>
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
	  <td></td>
	  <td><input type='submit' value='Agregar' /><input type='hidden' value='1' name='submitted' /></td>
	  </tr>
</table> 
</form> 
