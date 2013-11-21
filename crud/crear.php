<h2>Crear <?php echo titulo_sql($_GET['tabla']); ?></h2>
<?php 
$nombres_campos = array();
$con_fecha = array();
foreach($campos as $campo){
	if($campo['Null']=='YES'){
		$obligatorio = 0;
	}else{
		$obligatorio = 1;
	}
	if($campo['Key']=='PRI'){
		continue;
	}
	if($campo['Type']=='date' || $campo['Type']=='datetime'){
		$con_fecha[] = $campo['Field'];
	}
	$nombres_campos[] = $campo['Field'];
}
echo '<? 
if (isset($_POST["nuevo_'.$_GET['tabla'].'"])) { 
	foreach($_POST as $key => $value) { 
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
		';
if(count($con_fecha)>0){
	foreach($con_fecha as $campo_fecha){
		echo 
	'if($key=="'.$campo_fecha.'"){
		$_POST[$key] = formato_fechaUS($value); 
	}
	';
	}
}
echo '	} 
	$sql = "INSERT INTO `'.$_GET['tabla'].'` ( `'.implode('` , `',$nombres_campos).'` ) 
					VALUES( \'".$_POST["'.implode('"]."\', \'".$_POST["',$nombres_campos).'"]."\' );"; 
	mysql_query($sql) or die(mysql_error()); 
	?><div class="msg">Registro de '.titulo_sql($_GET['tabla']).' agregado.</div><?php 
} 
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_'.$_GET['tabla'].'" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","'.$_GET['tabla'].',listar"); ?>"><div class="boton_volver">Volver a la Lista de '.titulo_sql($_GET['tabla']).'</div></a>
'; ?>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
  <?php 
	$campos_matriz = array();
	$contador = 0;
	foreach($campos as $campo){
		if($campo['Null']=='YES'){
			$obligatorio = 0;
		}else{
			$obligatorio = 1;
		}
		if($campo['Key']=='PRI'){
			continue;
		}
		if($campo['Key']=='MUL' && $obligatorio){
			?>
  <tr>
    <td class="titulo_der"><?php echo titulo_sql($campo['Field']); ?></td>
    <td><?php echo '<?php echo combobox("'.$relaciones[$rel[$campo['Field']]]['hijo_tabla'].'","'.$relaciones[$rel[$campo['Field']]]['hijo_clave'].'","nombre",0,"'.$campo['Field'].'"); ?>'; ?></td>
  </tr>
  <?php
			continue;
		}
		if($campo['Key']=='MUL' && !$obligatorio){
			?>
  <tr>
    <td class="titulo_der"><?php echo titulo_sql($campo['Field']); ?></td>
    <td><?php echo '<?php echo combobox("'.$relaciones[$rel[$campo['Field']]]['hijo_tabla'].'","'.$relaciones[$rel[$campo['Field']]]['hijo_clave'].'","nombre",0,"'.$campo['Field'].'","",true); ?>'; ?></td>
  </tr>
  <?php
			continue;
		}
		$temp = get_formato_campo($campo['Type'],$campo['Field'],$obligatorio);
		$temp[0] = str_replace('sprytextfield1','spry_campo'.(10+$contador),$temp[0]);
		$campos_matriz[] = $temp;
		$contador++;
		?>
  <tr>
    <td class="titulo_der"><?php echo titulo_sql($campo['Field']); ?></td>
    <td><?php echo htmlentities($temp[0]); ?></td>
  </tr>
  <?php }?>
  <tr>
    <td></td>
    <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
  </tr>
</table>
<?php echo '</form>'; ?> 
<script type="text/javascript">
<?php 
$contador = 0;
foreach($campos_matriz as $campos_mat){
	$campos_mat[1] = str_replace('sprytextfield1','spry_campo'.(10+$contador),$campos_mat[1]);
	echo $campos_mat[1]."\n";
	$contador++;
}
?>
</script>