<?php 
include_once("../config.php");
include_once("mysql.php");
include_once("../includes/funciones.php");

$opciones['int('][0] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {maxChars:XYZ, isRequired:false});');
$opciones['int('][1] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {maxChars:XYZ});');
$opciones['bigint('][0] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {maxChars:XYZ, isRequired:false});');
$opciones['bigint('][1] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {maxChars:XYZ});');
$opciones['double'][0] = array('<span id="sprytextfield1">
  <input name="campo" type="text" id="campo" value="XXX" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:false});');
$opciones['double'][1] = array('<span id="sprytextfield1">
  <input name="campo" type="text" id="campo" value="XXX" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real");');
$opciones['float'][0] = array('<span id="sprytextfield1">
  <input name="campo" type="text" id="campo" value="XXX" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:false});');
$opciones['float'][1] = array('<span id="sprytextfield1">
  <input name="campo" type="text" id="campo" value="XXX" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real");');
$opciones['decimal('][0] = array('<span id="sprytextfield1">
  <input name="campo" type="text" id="campo" value="XXX" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real", {isRequired:false});');
$opciones['decimal('][1] = array('<span id="sprytextfield1">
  <input name="campo" type="text" id="campo" value="XXX" maxlength="20" />
  <span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span><span class="textfieldRequiredMsg">Campo Obligatorio.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "real");');
$opciones['date'][0] = array('<span id="sprytextfield1">
<input type="text" name="campo" id="campo" value="XXX" size="10" maxlength="10" />
<span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {hint:"dd-mm-aaaa", format:"dd-mm-yyyy", isRequired:false});');
$opciones['date'][1] = array('<span id="sprytextfield1">
<input type="text" name="campo" id="campo" value="XXX" size="10" maxlength="10" />
<span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldInvalidFormatMsg">Formato Incorrecto.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {hint:"dd-mm-aaaa", format:"dd-mm-yyyy"});');
$opciones['datetime'][0] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {maxChars:20, isRequired:false});');
$opciones['datetime'][1] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {maxChars:20});');
$opciones['varchar('][0] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
<span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {maxChars:XYZ, isRequired:false});');
$opciones['varchar('][1] = array('<span id="sprytextfield1">
  <input type="text" name="campo" id="campo" value="XXX" />
  <span class="textfieldRequiredMsg">Campo Obligatorio.</span><span class="textfieldMaxCharsMsg">Supera el número máximo de caracteres.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {maxChars:XYZ});');
$opciones['text'][0] = array('<span id="sprytextfield1">
  <textarea name="campo" id="campo" cols="45" rows="5">XXX</textarea>
</span>','var sprytextfield1 = new Spry.Widget.ValidationTextarea("sprytextfield1", {isRequired:false});');
$opciones['text'][1] = array('<span id="sprytextfield1">
  <textarea name="campo" id="campo" cols="45" rows="5">XXX</textarea>
  <span class="textareaRequiredMsg">Campo Obligatorio.</span></span>','var sprytextfield1 = new Spry.Widget.ValidationTextarea("sprytextfield1");');

function get_formato_campo($tipo,$nombre,$obligatorio=0,$valor=""){
	global $opciones;
	$salida = array();
	foreach($opciones as $type => $formatos_campo){
		$temp = substr($tipo,0,strlen($type));
		if($temp==$type){
			if(strpos($tipo,')')>0){
				$numero = trim(str_replace(')','',substr($tipo,strpos($tipo,'(')+1)))*1;
				$formatos_campo[$obligatorio][1] = str_replace('XYZ',$numero,$formatos_campo[$obligatorio][1]);
			}
				$formatos_campo[$obligatorio][0] = str_replace('campo',$nombre,$formatos_campo[$obligatorio][0]);
				$formatos_campo[$obligatorio][0] = str_replace('XXX',($valor),$formatos_campo[$obligatorio][0]);
			$salida = $formatos_campo[$obligatorio];
			break;
		}
	}
	if(count($salida)>0){
		return $salida;
	}else{
		$numero = 255;
		$opciones['varchar('][0][1] = str_replace('XYZ',$numero,$formatos_campo[$obligatorio][1]);
		$opciones['varchar('][0][0] = str_replace('XXX',$valor,$formatos_campo[$obligatorio][0]);
		return array($opciones['varchar('][0]);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CRUD</title>
<style type="text/css">
body,td,th {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 12px;
}
</style>
</head>

<body>
<h1>CRUD</h1>
<?php 
if(isset($_POST['tabla_crud'])){
	$dir = "../".$_POST['tabla_crud'];
	if(!file_exists($dir)){
		mkdir($dir);
	}
	unset($_POST['tabla_crud']);
	foreach($_POST as $clave => $value){
		$archivo = $clave.".php";
		file_put_contents($dir."/".$archivo,$value);
		echo $archivo." OK<br />";
	}
}
$db = $_SISTEMA['sql_dbase'];
$tablas = get_tablas($db);
?>
<p><strong>Base de Datos</strong>: <?php echo $db; ?></p>

  <?php 
if(isset($_GET['tabla']) && !empty($_GET['tabla'])){
	$campos = get_campos($_GET['tabla']);
	$relaciones = get_foreing($db,$_GET['tabla']);
	foreach($relaciones as $id_rel => $relacion){
		$rel[$relacion['padre_clave']] = $id_rel;
	}
?>
  <p><a href="./">&lt; Volver</a></p>
<h2>Tabla: <?php echo $_GET['tabla']; ?></h2>
<h3>Campos</h3>
<table cellpadding="0" cellspacing="0" border="1">
  <?php foreach($campos as $campo){	?>
  <tr>
    <?php foreach($campo as $encabezado => $campo_var){	?>
    <th><?php echo $encabezado; ?></th>
    <?php } ?>
    <th>Relaciones</th>
  </tr>
  <?php break;}?>
  <?php 
	$contador = 0;
	foreach($campos as $campo){	
		if(!isset($clave_primaria) && ($campo['Key']=='PRI')){
			$clave_primaria = $campo['Field'];
		}
?>
  <tr>
    <?php foreach($campo as $campo_var){	?>
    <td><?php echo $campo_var; ?></td>
    <?php }?>
    <?php if(isset($rel[$campo['Field']])){?>
    <td><?php echo $relaciones[$rel[$campo['Field']]]['hijo_tabla']; ?> =&gt; <?php echo $relaciones[$rel[$campo['Field']]]['hijo_clave']; ?></td>
    <?php }else{?>
    <td>&nbsp;</td>
    <?php }?>
  </tr>
  <?php }?>
</table>
<h3>Archivos</h3>
<form id="form1" name="form1" method="post" action="">

<input type="submit" value="Crear CRUD" />
  <input name="tabla_crud" type="hidden" id="tabla_crud" value="<?php echo $_GET['tabla'] ?>" />
  <?php 
$archivos = array("crear","editar","eliminar","listar","detalle");
foreach($archivos as $archivo){
	if(!file_exists($archivo.".php")){
		continue;
	}
?>
  <h4><?php echo $archivo ?>.php</h4>
<textarea name="<?php echo $archivo ?>" id="<?php echo $archivo ?>" cols="100" rows="20">
<?php include_once($archivo.".php");?>
</textarea>
<?php }?><br />
<input type="submit" value="Crear CRUD" />
</form>
<?php }else{?>
<h2>Tablas</h2>
<ul>
  <?php foreach($tablas as $tabla){	?>
  <li><a href="?tabla=<?php echo $tabla; ?>"><?php echo $tabla; ?></a></li>
  <?php }?>
</ul>
<?php }?>
</body>
</html>