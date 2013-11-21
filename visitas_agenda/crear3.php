<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		
<style>
.chico td{
	font-size:10px;
}
#map-canvas, #map_canvas {
	height:250px;
	width:100%;
	border:1px #000 solid;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><h2>Crear Visitas Agenda</h2>
<h3>Filtros</h3>
<?php 
$sql = "SELECT * FROM `visitas_agenda`
				WHERE `id_vendedor` = '".$_GET['id_vendedor']."'
				";
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);
$vistas_vendedor = array();
for($i=0;$i<$num;$i++){
	$id_sucursal = mysql_result($result,$i,"id_sucursal");
	$dia = mysql_result($result,$i,"dia");
	$vistas_vendedor[$id_sucursal][] = $dia;
}
?>
<form name="form" id="form" method="get" action="">
<table border="0" cellspacing="0" cellpadding="0" class="tabla">
  <tr>
    <td class="titulo_der">Región</td>
    <td><select id="id_regionx" onChange="MM_jumpMenu('parent',this,0)">
      <option>Seleccionar....</option>
      <?php 
		$sql = "SELECT * FROM regiones
						ORDER BY orden ASC
						";
		$result = mysql_query($sql) or die(mysql_error());
		$num = mysql_num_rows($result);
		for($i=0;$i<$num;$i++){
			$id_region = mysql_result($result,$i,"id_region");
			$nombre = utf8_encode(mysql_result($result,$i,"roma"));
		?>
      <option value="?pagina=visitas_agenda,crear3&id_vendedor=<?php echo $_GET['id_vendedor'] ?>&id_region=<?php echo $id_region; ?>" <?php if(isset($_GET['id_region']) && $_GET['id_region']==$id_region){?> selected <?php }?> ><?php echo $nombre; ?></option>
      <?php }?>
    </select></td>
  </tr>
  <?php if(isset($_GET['id_region'])){?>
  <tr>
    <td class="titulo_der">Comuna</td>
    <td><select id="id_comunax" onChange="MM_jumpMenu('parent',this,0)">
    <option>Seleccionar....</option>
  	<?php 
		$sql = "SELECT * FROM comunas
						WHERE ERP_region = '".$_GET['id_region']."'
						ORDER BY nombre ASC
						";
		$result = mysql_query($sql) or die(mysql_error());
		$num = mysql_num_rows($result);
		for($i=0;$i<$num;$i++){
			$id_comuna = mysql_result($result,$i,"id_comuna_das");
			$nombre = utf8_encode(mysql_result($result,$i,"nombre"));
		?>
    <option value="?pagina=visitas_agenda,crear3&id_vendedor=<?php echo $_GET['id_vendedor'] ?>&id_region=<?php echo $_GET['id_region'] ?>&id_comuna=<?php echo $id_comuna; ?>" <?php if(isset($_GET['id_comuna']) && $_GET['id_comuna']==$id_comuna){?> selected <?php }?> ><?php echo $nombre; ?></option>
    <?php }?>
  </select></td>
  </tr>
  <?php }?>
  <?php if(isset($_GET['id_comuna'])){?>
  <tr>
    <td class="titulo_der">Zona</td>
    <td><select id="id_zona_comercialx" onChange="MM_jumpMenu('parent',this,0)">
    <option>Seleccionar....</option>
  	<?php 
		$sql = "SELECT sucursales.`id_zona_comercial`, zona_comercial.nombre  FROM `sucursales`
						LEFT JOIN zona_comercial ON sucursales.id_zona_comercial = zona_comercial.id_zona_comercial
						LEFT JOIN comunas ON sucursales.id_comuna = comunas.id_comuna_das
						WHERE `comunas`.`id_comuna_das` = '".$_GET['id_comuna']."'
						AND `ERP_region` = '".$_GET['id_region']."'
						GROUP BY sucursales.`id_zona_comercial`
						";
		$result = mysql_query($sql) or die(mysql_error());
		$num = mysql_num_rows($result);
		for($i=0;$i<$num;$i++){
			$id_zona_comercial = mysql_result($result,$i,"id_zona_comercial");
			$nombre = utf8_encode(mysql_result($result,$i,"nombre"));
		?>
    <option value="?pagina=visitas_agenda,crear3&id_vendedor=<?php echo $_GET['id_vendedor'] ?>&id_region=<?php echo $_GET['id_region'] ?>&id_comuna=<?php echo $_GET['id_comuna']; ?>&id_zona_comercial=<?php echo $id_zona_comercial; ?>" <?php if(isset($_GET['id_zona_comercial']) && $_GET['id_zona_comercial']==$id_zona_comercial){?> selected <?php }?> ><?php echo $nombre; ?></option>
    <?php }?>
    </select></td>
  </tr>
  <?php }?>
  <?php if(isset($_GET['id_zona_comercial']) && $_GET['id_zona_comercial']>0){?>
  <tr>
    <td class="titulo_der">Sector</td>
    <td><select id="id_sectorx" onChange="MM_jumpMenu('parent',this,0)">
      <option>Seleccionar....</option>
      <?php 
		$sql = "SELECT * FROM sectores
						WHERE `id_zona_comercial` = '".$_GET['id_zona_comercial']."'
						GROUP BY nombre
						";
		$result = mysql_query($sql) or die(mysql_error());
		$num = mysql_num_rows($result);
		for($i=0;$i<$num;$i++){
			$id_sector = mysql_result($result,$i,"id_sector");
			$nombre = utf8_encode(mysql_result($result,$i,"nombre"));
		?>
      <option value="?pagina=visitas_agenda,crear3&id_vendedor=<?php echo $_GET['id_vendedor'] ?>&id_region=<?php echo $_GET['id_region'] ?>&id_comuna=<?php echo $_GET['id_comuna']; ?>&id_zona_comercial=<?php echo $_GET['id_zona_comercial']; ?>&id_sector=<?php echo $id_sector; ?>" <?php if(isset($_GET['id_sector']) && $_GET['id_sector']==$id_sector){?> selected <?php }?> ><?php echo $nombre; ?></option>
      <?php }?>
    </select></td>
  </tr>
  
  <?php }?>
  <?php if(isset($_GET['id_comuna'])){?>
  <tr>
    <td class="titulo_der">
    <input name="pagina" type="hidden" id="pagina" value="visitas_agenda,crear3">
    <input name="id_vendedor" type="hidden" id="id_vendedor" value="<?php echo $_GET['id_vendedor']; ?>">
    <input name="id_region" type="hidden" id="id_region" value="<?php if(isset($_GET['id_region'])){ echo $_GET['id_region'];} ?>">
    <input name="id_comuna" type="hidden" id="id_comuna" value="<?php if(isset($_GET['id_comuna'])){ echo $_GET['id_comuna'];} ?>">
    <input name="id_sector" type="hidden" id="id_sector" value="<?php if(isset($_GET['id_sector'])){ echo $_GET['id_sector'];} ?>">
    <input name="id_zona_comercial" type="hidden" id="id_zona_comercial" value="<?php if(isset($_GET['id_zona_comercial'])){ echo $_GET['id_zona_comercial'];} ?>">
    </td>
    <td><input type="submit" value="Filtrar"></td>
  </tr>
   <?php }?>
</table>
<!--<pre><?php print_r($_GET);?><?php print_r($_POST);?></pre>-->
</form>
  <?php if(isset($_GET['id_comuna'])){?>
<h3>Sucursales</h3>
<?php 
$sql = "SELECT sucursales.*, clientes.*, comunas.nombre as nombre_comuna FROM sucursales
				LEFT JOIN clientes ON sucursales.id_cliente = clientes.id_cliente
				LEFT JOIN comunas ON sucursales.id_comuna = comunas.id_comuna_das
				WHERE id_sucursal > 0
				";
if(isset($_GET['id_comuna']) && $_GET['id_comuna'] > 0){
	$sql .= " AND `comunas`.`id_comuna_das` = '".$_GET['id_comuna']."'
						AND `ERP_region` = '".$_GET['id_region']."' ";
}
if(isset($_GET['id_sector']) && $_GET['id_sector'] > 0){
	$sql .= " AND `sucursales`.`id_sector` = '".$_GET['id_sector'] ."' ";
}
if(isset($_GET['id_zona_comercial']) && $_GET['id_zona_comercial'] > 0){
	$sql .= " AND `sucursales`.`id_zona_comercial` = '".$_GET['id_zona_comercial'] ."' ";
}
$result = mysql_query($sql) or die(mysql_error());
$num = mysql_num_rows($result);

$sucursales = array();
for($i=0;$i<$num;$i++){
	$sucursales[] = mysql_result($result,$i,"id_sucursal");
}

if(isset($_POST['visita']) && count($_POST['visita']) > 0){
	foreach($vistas_vendedor as $id_sucursal => $matriz){
		foreach($matriz as $dia){
			if(!isset($_POST['visita'][$id_sucursal][$dia]) && in_array($id_sucursal,$sucursales)){
				$sql2 = "DELETE FROM `visitas_agenda` 
								WHERE `id_sucursal` = '".$id_sucursal."'
								AND id_vendedor = '".$_GET['id_vendedor']."'
								AND dia = '".$dia."'
								;";
				mysql_query($sql2) or die(mysql_error());
			}
		}
	}
	foreach($_POST['visita'] as $id_sucursal => $valor){
		foreach($valor as $dia => $value){
			if(isset($vistas_vendedor[$id_sucursal]) && in_array($dia,$vistas_vendedor[$id_sucursal])){
				// Ya existe
				continue;
			}
			$sql2 = "INSERT INTO `visitas_agenda` (`id_sucursal`, `id_vendedor`, `dia`) VALUES
								(".$id_sucursal.", '".$_GET['id_vendedor']."', '".$dia."');";
			mysql_query($sql2) or die(mysql_error());
		}
	}
	// Carga de nuevo
	$sql2 = "SELECT * FROM `visitas_agenda`
					WHERE `id_vendedor` = '".$_GET['id_vendedor']."'
					";
	$result2 = mysql_query($sql2) or die(mysql_error());
	$num2 = mysql_num_rows($result2);
	$vistas_vendedor = array();
	for($i=0;$i<$num2;$i++){
		$id_sucursal = mysql_result($result2,$i,"id_sucursal");
		$dia = mysql_result($result2,$i,"dia");
		$vistas_vendedor[$id_sucursal][] = $dia;
	}
}
?>

<p>Total encontrado: <?php echo $num; ?></p></td>
    <td width="50%"><div id="map-canvas"></div></td>
  </tr>
</table>

<form name="form1" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla chico">
  <tr>
    <th>&nbsp;</th>
    <th>Cliente</th>
    <th>Sucursal</th>
    <th>Dirección</th>
    <th>Comuna</th>
    <?php for($dia=1;$dia<=6;$dia++){?>
    <th><?php echo substr(dias($dia),0,1); ?></th>
    <?php }?>
  </tr>
<?php 
	for($i=0;$i<$num;$i++){
		$id_cliente = mysql_result($result,$i,"id_cliente");
		$id_sucursal = mysql_result($result,$i,"id_sucursal");
		$ERP_direccion = utf8_encode(mysql_result($result,$i,"ERP_direccion"));
		$id_comuna = mysql_result($result,$i,"id_comuna");
		$id_sector = mysql_result($result,$i,"id_sector");
		$nombre_comuna = utf8_encode(mysql_result($result,$i,"nombre_comuna"));
		$id_zona_comercial = mysql_result($result,$i,"sucursales.id_zona_comercial");
?>
  <tr>
    <td class="titulo_der"><?php echo $i+1; ?></td>
    <td><?php echo nombre("clientes",$id_cliente,"id_cliente"); ?></td>
    <td><?php echo nombre("sucursales",$id_sucursal,"id_sucursal","ERP_nombre"); ?></td>
    <td><?php echo $ERP_direccion; ?></td>
    <td><?php echo $nombre_comuna; ?></td>
    <?php for($dia=1;$dia<=6;$dia++){?>
    <td style="border-left:1px solid; text-align:center;"><input type="checkbox" <?php if(isset($vistas_vendedor[$id_sucursal]) && in_array($dia,$vistas_vendedor[$id_sucursal])){?> checked <?php }?> name="visita[<?php echo $id_sucursal; ?>][<?php echo $dia; ?>]" id="visita[<?php echo $id_sucursal; ?>][<?php echo $dia; ?>]"></td>
    <?php }?>
  </tr>
  <?php }?>
  <tr>
    <td class="titulo_der">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td style="border-left:1px solid; text-align:center;" colspan="6"><input type="submit" value="Asignar Visitas"></td>
  </tr>
</table>
</form>
<script type="text/javascript">
  var script = '<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer';
  if (document.location.search.indexOf('compiled') !== -1) {
    script += '_compiled';
  }
  script += '.js"><' + '/script>';
  document.write(script);
</script>
<script>
function initialize() {
	var centro = new google.maps.LatLng(-28.33698628,-70.44688448);
	var mapOptions = {
		zoom: 4,
		center: centro,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
    
	// Se usa para los cluster
	var markers = [];

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	<?php 
	
	for($i=0;$i<$num;$i++){
		$id_sucursal = mysql_result($result,$i,"id_sucursal");
		$lat = mysql_result($result,$i,"lat");
		$lon = mysql_result($result,$i,"lon");
		if(abs($lat+$lon)>0){
			
		}else{
			continue;
		}
	?>
	var myLatlng<?php echo $i+1; ?> = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>);
	var contentString<?php echo $i+1; ?> = '<h3><?php echo nombre("sucursales",$id_sucursal,"id_sucursal","ERP_nombre"); ?></h3>';
	var infowindow<?php echo $i+1; ?> = new google.maps.InfoWindow({
			content: contentString<?php echo $i+1; ?>        });

	var marker<?php echo $i+1; ?> = new google.maps.Marker({
			position: myLatlng<?php echo $i+1; ?>,
			map: map,
			title: 'Corte de Electricidad'
	});
	
	// Se usa para los cluster
	markers.push(marker<?php echo $i+1; ?>);
	
	google.maps.event.addListener(marker<?php echo $i+1; ?>, 'click', function() {
		infowindow<?php echo $i+1; ?>.open(map,marker<?php echo $i+1; ?>);
	}); 
	
	<?php }?>

    
    // Muestra los clusters
	var markerCluster = new MarkerClusterer(map, markers);
}


$(document).ready(function() {
	initialize();
});
</script>
<?php }?>

