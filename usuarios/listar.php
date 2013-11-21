 <table class="tabla">
  	<tr>
  		<th>ID Usuario</th>
  		<th>User</th>
  		<th>Último Ingreso</th>
  		<th>&nbsp;</th>
  		<th>&nbsp;</th>
  	</tr>
 <?php 
$sql = "SELECT * FROM `usuarios`";
$result = mysql_query($sql) or die(mysql_error()."<br><br>".nl2br($sql));
$_SISTEMA["paginacion_total"] = mysql_num_rows($result);
$_SISTEMA["paginas"] = ceil($_SISTEMA["paginacion_total"]/$_SISTEMA["lineas_por_pagina"]);
if(isset($_GET["pagina_n"])){
	$_SISTEMA["pagina_n"] = $_GET["pagina_n"];
}else{
	$_SISTEMA["pagina_n"] = 1;
}
$sql .= " LIMIT ".(($_SISTEMA["pagina_n"]-1)*$_SISTEMA["lineas_por_pagina"]).", ".$_SISTEMA["lineas_por_pagina"];
$result = mysql_query($sql) or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); $row[$key] = utf8_encode($value); } 
 ?> 	<tr>
  		<td align="right"><?php echo ids( $row["id_usuario"]); ?></td>
  		<td align="center"><?php echo nl2br( $row["user"]); ?></td>
  		<td><?php echo nl2br( $row["ultima_fecha"]); ?></td>
  		<td><a href="?pagina=usuarios,editar&id_usuario=<?php echo $row["id_usuario"];?>">Editar</a></td>
  		<td><a href="?pagina=usuarios,eliminar&id_usuario=<?php echo $row["id_usuario"];?>">Eliminar</a></td>
  	</tr>
 <?php } 
 ?> </table>
  <p><a href="?pagina=usuarios,nuevo">Nuevo Usuario</a></p> 
<?php include_once("includes/paginacion.php");?>