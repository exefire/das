<h2>Crear Visitas Agenda</h2>
<? 
if (isset($_POST["nuevo_visitas_agenda"])) { 
	foreach($_POST as $key => $value) { 
		if(is_array($value)){
			continue;
		}
		$_POST[$key] = mysql_real_escape_string($value);
		$_POST[$key] = utf8_decode($value); 
	}
	if(isset($_POST['dias']) && is_array($_POST['dias'])){
		foreach($_POST['dias'] as $dia){
			$sql = "INSERT INTO `visitas_agenda` ( `id_sucursal` , `id_vendedor` , `dia` ) 
							VALUES( '".$_POST["id_sucursal"]."', '".$_GET["id_vendedor"]."', '".$dia."' );"; 
			mysql_query($sql) or die(mysql_error()); 
		}
	}
	?><div class="msg">Registro de Visitas Agenda agregado.</div><?php 
}
?>
<a href="<?php echo agrega_get("pagina","sucursales,visitas"); ?>"><div class="boton_volver">Volver a la Lista de Visitas Agenda</div></a>

<h3>Filtros</h3>
<form id="form1" name="form1" method="get" action="">
<?php
$no_repetir = array("id_comuna","id_zona_comercial");
foreach($no_repetir as $nombre){
	if(!isset($_GET[$nombre])){
		$_GET[$nombre] = "";
	}
}
foreach($_GET as $clave => $valor){
	if(in_array($clave,$no_repetir)){
		continue;
	}
?>
<input name="<?php echo $clave; ?>" type="hidden" value="<?php echo $valor; ?>" />
<?php }?>
<table border="0" cellspacing="0" cellpadding="0" class="tabla">
  <tr>
    <td class="titulo_der">Comuna</td>
    <td><?php echo combobox("comunas","id_comuna","nombre",$_GET['id_comuna'],"id_comuna"); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">Zona</td>
    <td><?php echo combobox("zona_comercial","id_zona_comercial","nombre",$_GET['id_zona_comercial'],"id_zona_comercial","",true); ?></td>
  </tr>
  <tr>
    <td class="titulo_der">&nbsp;</td>
    <td><input type="submit" value="Filtrar" /></td>
  </tr>
</table>
</form><br />
<?php 
if(isset($_GET['id_comuna']) && $_GET['id_comuna']>0){
	$filtro = "WHERE `id_comuna` = '".$_GET['id_comuna']."' ";
	if(isset($_GET['id_zona_comercial']) && $_GET['id_zona_comercial']>0){
		$filtro .= " AND `id_zona_comercial` = '".$_GET['id_zona_comercial']."' ";
	}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_visitas_agenda" type="hidden" value="1" />
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
      <td class="titulo_der"> Sucursal</td>
      <td>
      <?php echo combobox("cliente_sucursal","id_sucursal","nombre_junto",0,"id_sucursal",$filtro); ?></td>
    </tr>
    <tr>
      <td class="titulo_der">&nbsp;</td>
      <td><p>
      <?php for($dia=1;$dia<=6;$dia++){?>
        <label>
          <input type="checkbox" name="dias[]" value="<?php echo $dia; ?>" id="dias_0" />
          <?php echo dias($dia); ?></label>
        <br />
        <?php }?>
      </p></td>
    </tr>
    <tr>
      <td></td>
      <td><input name="" type="submit" value="Crear" class="boton_form" /></td>
    </tr>
</table>
</form>

<?php }?>