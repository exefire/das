<h2>Detalles de <?php echo titulo_sql($_GET['tabla']); ?></h2>
<?php 
$nombres_campos = array();
$con_fecha = array();
foreach($campos as $campo){
	if($campo['Key']=='PRI'){
		continue;
	}
	if($campo['Key']=='MUL'){
		continue;
	}
	if($campo['Type']=='date' || $campo['Type']=='datetime'){
		$con_fecha[] = $campo['Field'];
	}
	$nombres_campos[] = $campo['Field'];
}
echo '<?php 
if (isset($_GET["'.$clave_primaria.'"]) ) { 
$'.$clave_primaria.' = (int) $_GET["'.$clave_primaria.'"]; 
$sql = "SELECT * FROM `'.$_GET['tabla'].'` 
				WHERE `'.$clave_primaria.'` = \'".$'.$clave_primaria.'."\' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){
';
if(count($con_fecha)>0){
	foreach($con_fecha as $campo_fecha){
		echo 
	'if($key=="'.$campo_fecha.'"){
		$row[$key] = formato_fechaUS($value); 
	}
	';
	}
}
echo '
}
?>
<a href="<?php echo agrega_get("pagina","'.$_GET['tabla'].',listar"); ?>"><div class="boton_volver">Volver a la Lista de '.titulo_sql($_GET['tabla']).'</div></a>
'; ?>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <?php 
	$campos_matriz = array();
	$contador = 0;
	foreach($campos as $campo){
		if($campo['Key']=='MUL'){
?>
  <tr>
    <td class="titulo_der"><?php echo titulo_sql($campo['Field']); ?></td>
    <td><?php echo '<?php echo nombre("'.$relaciones[$rel[$campo['Field']]]['hijo_tabla'].'",$row["'.$campo['Field'].'"],"'.$relaciones[$rel[$campo['Field']]]['hijo_clave'].'"); ?>'; ?></td>
  </tr>
<?php	
		continue;}
			?>
  <tr>
    <td class="titulo_der"><?php echo titulo_sql($campo['Field']); ?></td>
    <td><?php echo '<?php echo utf8_encode($row["'.$campo['Field'].'"]); ?>'; ?></td>
  </tr>
  <?php }?>
</table>
<?php echo '<? } ?>'; ?>