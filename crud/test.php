<?php 
include_once("../includes/sql.php");
include_once("../includes/funciones.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Test</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>







<h2>Detalles de Unidad Grupal</h2>
<?php 
if (isset($_GET["id_unidad_grupal"]) ) { 
$id_unidad_grupal = (int) $_GET["id_unidad_grupal"]; 
$sql = "SELECT * FROM `unidad_grupal` 
				WHERE `id_unidad_grupal` = '".$id_unidad_grupal."' 
				";
$row = mysql_fetch_array (mysql_query($sql)) or die(mysql_error()); 
foreach($row as $key => $value){

}
?>
<div class="boton_volver"><a href="<?php echo agrega_get("pagina","unidad_grupal,listar"); ?>">Volver a la Lista de unidad_grupal</a></div>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
    <td class="titulo_der">Id Unidad Grupal</td>
    <td><?php echo $row["id_unidad_grupal"]; ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Id Proyecto</td>
    <td><?php echo $row["id_proyecto"]; ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Nombre</td>
    <td><?php echo $row["nombre"]; ?></td>
  </tr>
    <tr>
    <td class="titulo_der">Descripcion</td>
    <td><?php echo $row["descripcion"]; ?></td>
  </tr>
  </table>
<? } ?>







</body>
</html>