<?php 
include_once("config.php");
include_once("includes/sql.php");
include_once("includes/funciones.php");
include_once("login/login.php");

if(isset($_POST['nombre_pagina'])){
	$sql = "SELECT * FROM `titulos`
					WHERE `pagina` = '".trim($_GET['pagina'])."'
					";
	$result = mysql_query($sql) or trigger_error(mysql_error()); 
	$num = mysql_num_rows($result);
	if($num>0){
		$id_titulo = mysql_result($result,0,"id");
		$sql = "UPDATE `titulos` SET `titulo` = '".trim($_POST['nombre_pagina'])."' WHERE `titulos`.`id` = '".$id_titulo."';";
		mysql_query($sql) or trigger_error(mysql_error()); 
	}else{
		$sql = "INSERT INTO `titulos` (`pagina` ,`titulo` )
						VALUES (
						'".trim($_GET['pagina'])."', '".trim($_POST['nombre_pagina'])."'
						);";
		mysql_query($sql) or trigger_error(mysql_error()); 
	}
}


include_once("includes/titulos.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="http://www.das.cl/Favicon.ico" type="image/x-icon" />
<title><?php echo $_SISTEMA['titulo_browser']; ?></title>
<?php /* <link rel="stylesheet" href="includes/jquery.mobile-1.2.1.min.css" /> */?>
<link rel="stylesheet" href="includes/jdpicker.css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body, td, th {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 0.95em;
	color:#595A59;
}
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
h1 {
	color: #280D66;
	border-bottom: #F90 solid 1px;
}
h2 {
	color:#1A8AD2;
}
a:link {
	color: #069;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #069;
}
a:hover {
	text-decoration: underline;
	color: #069;
}
a:active {
	text-decoration: none;
	color: #069;
}
p > a {
	display: inline-block;
	padding: 5px;
	margin-right: 3px;
	border: #069 solid 1px;
}
.tabla {
	border: solid 1px #280D66;
	border-spacing: 0;
	border-collapse: collapse;
}
.tabla th {
	text-align: center;
	background:#280D66;
	color: #FFF;
	font-weight: normal;
	padding: 5px;
}
.tabla td {
	padding: 2px 5px 2px 5px;
	border-bottom: #280D66 solid 1px;
}
.msg{
	padding:10px;
	margin:10px 0px 10px 0px;
	border:#FC0 solid 1px;
	background:#FFC;
	color:#900;
}
.boton_nuevo, .boton_volver{
	margin:10px;
	display:inline-block;
	padding:8px;
	background:#280D66;
	color:#FFF;
	font-size:0.9em;
}
.titulo_der{
	text-align:right;
	padding-right:20px;
	font-weight:bold;
}
</style>
<script src="includes/jquery-1.8.3.min.js"></script>
<?php /* <script src="includes/jquery.mobile-1.2.1.min.js"></script> */?>
<script src="includes/jquery.jdpicker.js"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link type="text/css" rel="stylesheet" href="includes/jq-metro.css">
<link type="text/css" rel="stylesheet" href="includes/Interacao.css">
<script src="includes/jquery.metro-btn.js" type="text/javascript"></script>




</head>

<body style="background:#333;">

<table cellpadding="0" cellspacing="0" background="0" width="900" align="center">

<tr valign="top" style="background:#0A4579;">
  <td style="padding:10px;"><img src="<?php echo $_SISTEMA['logo']; ?>" /></td>
  <td align="right" valign="middle" style="padding:10px; color:#FFF; font-size:12px;"><?php include_once("login/form_logout.php");?>&nbsp;</td>
</tr>
<?php if(isset($msg) && count($msg)>0){?>
<tr valign="top">
  <td colspan="2"><div style="background:#FFC; padding:1px;">
    <ul>
    	<?php foreach($msg as $txt){ ?>
      <li><?php echo $txt; ?></li>
      <?php }?>
    </ul>
  </div></td>
</tr>
<?php }?>
<?php if(isset($_GET['pagina'])){?>
<tr valign="top">
  <td colspan="2" style="background:#FFF;"><ul id="MenuBar1" class="MenuBarHorizontal">
    <li><a href="./">Inicio</a></li>
<li><a href="?pagina=clientes">Clientes</a></li>
    <li><a href="#" class="MenuBarItemSubmenu">Fuerza Venta</a>
      <ul>
        <li><a href="?pagina=supervisores">Supervisores</a></li>
        <li><a href="?pagina=vendedores">Vendedores</a></li>
      </ul>
    </li>
    <li><a href="#" class="MenuBarItemSubmenu">Geograf&iacute;a</a>
      <ul>
        <li><a href="?pagina=regiones">Regiones</a></li>
        <li><a href="?pagina=comunas">Comunas</a></li>
        <li><a href="?pagina=zona_comercial">Zonas</a></li>
        <li><a href="?pagina=sectores">Sectores</a></li>
      </ul>
  </li>
    <li><a href="?pagina=usuarios">Usuarios</a></li>
  </ul>
      <div style="clear:both;"></div>
      
      
      
      <?php 
if(false && isset($_GET['pagina']) && $_SERVER['HTTP_HOST']=='localhost'){
$sql = "SELECT * FROM `titulos`
				WHERE `pagina` = '".trim($_GET['pagina'])."'
				";
$result = mysql_query($sql) or trigger_error(mysql_error()); 
$num = mysql_num_rows($result);
$titulo = "";
if($num>0){
	$titulo = mysql_result($result,0,"titulo");
}
?>
<form id="form1" name="form1" method="post" action="<?php echo agrega_get(); ?>">
  <input type="text" name="nombre_pagina" id="nombre_pagina" value="<?php echo $titulo; ?>" />
  <input type="submit" value="Actualizar" />
</form>
<?php }?></td>
</tr>
<tr valign="top">
  <td colspan="2" style="background:#FFF; padding:10px;"><div id="content">
      
      
      
      <h1><?php echo $_SISTEMA['titulo']; ?></h1>
      <?php 
if(isset($_GET['pagina'])){
	$archivo = str_replace(",","/",$_GET['pagina']).".php";
	?><?php
	if(file_exists($archivo)){
		include($archivo);
	}elseif(file_exists($_GET['pagina']."/listar.php")){
		include($_GET['pagina']."/listar.php");
	}else{
		echo "Esta sección se encuentra en etapa de desarrollo.";
	}
}
?>
    </div>
    </td>
</tr>
<?php }else{?>
<tr valign="top">
  <td colspan="2" style="">
    
    
    
    <script type="text/javascript">
$(document).ready(function () {

$("#barra1").AddMetroSimpleButton('bt1', 'metro-verde', './images/facturas.png', 'Productos',										'window.location = "./?pagina=articulo";');
$("#barra1").AddMetroSimpleButton('bt2', 'metro-laranja', './images/presupuestos.png', 'Presupuesto', 					'window.location = "./?pagina=articulo";');
$("#barra1").AddMetroDoubleWithTrailerWithBG('bt6', './images/equipos.jpg', 'Vendedores',											'window.location = "./?pagina=vendedores";', 'metro-azul');
$("#barra1").AddMetroSimpleButton('bt4', 'metro-vermelho', './images/alertas.png', 'Alertas (8)', 							'window.location = "./?pagina=articulo";');

$("#barra2").AddMetroSimpleButton('bt4', 'metro-roxo', './images/hojasRuta.png', 'TMS', 							'window.location = "./?pagina=articulo";');
$("#barra2").AddMetroSimpleButton('bt4', 'metro-vermelho', './images/ordenesTrabajo.png', 'Workflow', 			'window.location = "./?pagina=articulo";');
$("#barra2").AddMetroSimpleButton('bt3', 'metro-verde', './images/proveedores.png', 'Config', 							'window.location = "./?pagina=articulo";');
$("#barra2").AddMetroSimpleButton('bt6', 'metro-blanco', './images/user.png', 'Usuarios', 											'window.location = "./?pagina=usuarios";');
$("#barra2").AddMetroSimpleButton('bt3', 'metro-roxo', './images/export.png', 'Reportes', 											'window.location = "./?pagina=articulo";');

$("#barra3").AddMetroDoubleWithTrailerWithBG('bt6','./images/empleados.jpg', 'Clientes', 												'window.location = "./?pagina=clientes";', 'metro-azul');
$("#barra3").AddMetroSimpleButton('bt6', 'metro-laranja', './images/rights.png', 'Permisos', 										'window.location = "./"?pagina=articulo;');
$("#barra3").AddMetroDoubleWithTrailerWithBG('bt6', './images/proyectos.jpg', 'Promociones', 											'window.location = "./?pagina=proyectos";','metro-azul');



});
</script>
    
  <div style="background:#333;">
    <div id="barra1" class="metro-panel"></div>
    <div id="barra2" class="metro-panel"></div>
    <div id="barra3" class="metro-panel"></div>
  </div>
    
    
    </td>
</tr>
<?php }?>
<tr valign="top">
  <td colspan="2" style="text-align:center; color:#FFF; font-size:12px; padding:20px;"><?php echo $_SISTEMA['footer']; ?></td>
</tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>