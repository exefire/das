<?php
$sql = "SELECT * FROM `titulos`
				";
$result = mysql_query($sql) or trigger_error(mysql_error()); 
$num = mysql_num_rows($result);
for($i=0;$i<$num;$i++){
	$titulos[mysql_result($result,$i,"pagina")] = mysql_result($result,$i,"titulo");
}

if(isset($_GET['pagina']) && isset($titulos[$_GET['pagina']])){
	$_SISTEMA['titulo_browser'] = $titulos[$_GET['pagina']]." - ".$_SISTEMA['titulo'];
	$_SISTEMA['titulo'] = $titulos[$_GET['pagina']];
}

unset($titulos);
?>