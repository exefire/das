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
							VALUES( '".$_GET["id_sucursal"]."', '".$_POST["id_vendedor"]."', '".$dia."' );"; 
			mysql_query($sql) or die(mysql_error()); 
		}
	}
	?><div class="msg">Registro de Visitas Agenda agregado.</div><?php 
}
?>
<form action="<?php echo agrega_get(); ?>" method="post">
<input name="nuevo_visitas_agenda" type="hidden" value="1" />
<a href="<?php echo agrega_get("pagina","sucursales,visitas"); ?>"><div class="boton_volver">Volver a la Lista de Visitas Agenda</div></a>
<table cellpadding="0" cellspacing="0" border="0" class="tabla">
    <tr>
      <td class="titulo_der"> Vendedor</td>
      <td><?php echo combobox("vendedores","id_vendedor","nombre",0,"id_vendedor"); ?></td>
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
