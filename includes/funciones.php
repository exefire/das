<?php 
if(isset($_GET['msg'])){
	foreach($_GET['msg'] as $text){
		$msg[] = $text;
	}
}
function agrega_get($agregar="",$valor=""){
	$temp = $_GET;
	if(!empty($agregar)){	
		$temp[$agregar] = $valor;
	}
	$matriz = array();
	foreach($temp as $clave => $valor){
		if(is_array($valor)){
			foreach($valor as $clave2 => $valor2){
				$matriz[] = $clave."[]=".$valor2;
			}
		}else{
			$matriz[] = $clave."=".$valor;
		}
	}
	return "?".implode("&",$matriz);
}
function combobox($tabla,$clave="id",$valor="nombre",$selected="",$nombre_campo="",$filtro="",$opcional=false){
	if(empty($nombre_campo)){
		$nombre_campo = $clave;
	}
	$sql = "SELECT * FROM `$tabla`
					$filtro
					ORDER BY `$tabla`.`$valor` ASC 
					";
	$result = mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);
	?>
<select name="<?php echo $nombre_campo; ?>" id="<?php echo $nombre_campo; ?>">
  <?php if($opcional){?>
  <option value="0" <?php if(($selected*1)===0){?> selected<?php }?>>Seleccionar...</option>
  <?php }?>
  <?php
	for($i=0;$i<$num;$i++){
		 ?>
  <option value="<?php echo mysql_result($result,$i,$clave); ?>" <?php if($selected==mysql_result($result,$i,$clave)){?> selected<?php }?>><?php echo utf8_encode(mysql_result($result,$i,$valor)); ?></option>
  <?php }?>
</select>
<?php
}

function formato_sql($valor){
	$valor = stripslashes($valor);
	$valor = utf8_encode($valor);
	return $valor;
}

function nombre($tabla,$id,$key="",$campo="nombre"){
	if(empty($clave)){
		$sql = "SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'";
		$result = mysql_query($sql) or die(mysql_error());
		$key = mysql_result($result,0,"Column_name");
	}
	$sql = "SELECT $campo FROM `$tabla` WHERE `$key` = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);
	if($num>0){
		return utf8_encode(mysql_result($result,0,$campo));
	}else{
		return "-";
	}
}

function meses($num,$corto=0){
	$matriz[1] = "Enero";
	$matriz[2] = "Febrero";
	$matriz[3] = "Marzo";
	$matriz[4] = "Abril";
	$matriz[5] = "Mayo";
	$matriz[6] = "Junio";
	$matriz[7] = "Julio";
	$matriz[8] = "Agosto";
	$matriz[9] = "Septiembre";
	$matriz[10] = "Octubre";
	$matriz[11] = "Noviembre";
	$matriz[12] = "Diciembre";
	$num = ($num+1)-1;
	if(!isset($matriz[$num])){
		return "Mes no encontrado.";
	}else{
		if($corto){
			return substr($matriz[$num],0,3);
		}else{
			return $matriz[$num];
		}
	}
}
function dias($num,$corto=0){
	$matriz[1] = "Lunes";
	$matriz[2] = "Martes";
	$matriz[3] = "Miércoles";
	$matriz[4] = "Jueves";
	$matriz[5] = "Viernes";
	$matriz[6] = "Sábado";
	$matriz[0] = "Domingo";
	if($corto){
		return substr($matriz[$num],0,3);
	}else{
		return $matriz[$num];
	}
}
function rut_digito($r){
	$sub_rut = strtoupper(ereg_replace('\.|,|-','',$r));
	$x=2; $s=0;
	for($i=strlen($sub_rut)-1;$i>=0;$i--){
		if($x>7){
			$x=2;
		}
		$s+=$sub_rut[$i]*$x;
		$x++;
	}
	$dv=11-($s%11);
	if($dv==10){
		$dv='K';
	}
	if($dv==11){
		$dv='0';
	}
	return $dv;
}
function formato_rut($r){
	$r = str_replace(".","",$r);
	$r = str_replace(" ","",$r);
	$r = str_replace(",","",$r);
	$r = str_replace("-","",$r);
	$r = str_replace("_","",$r);
	$sub_rut=substr($r,0,strlen($r)-1);
	$sub_dv=substr($r,-1);
	return $sub_rut."-".$sub_dv;
}
function limpiar_rut($r){
	$r = str_replace(".","",$r);
	$r = str_replace(" ","",$r);
	$r = str_replace(",","",$r);
	$r = str_replace("-","",$r);
	$r = str_replace("_","",$r);
	return $r;
}
function validar_rut($r){
	$r = str_replace(".","",$r);
	$r = str_replace(" ","",$r);
	$r = str_replace(",","",$r);
	$r = str_replace("-","",$r);
	$r = str_replace("_","",$r);
	$r=strtoupper($r);
	$sub_rut=substr($r,0,strlen($r)-1);
	$sub_dv=substr($r,-1);
	$x=2;
	$s=0;
	for ( $i=strlen($sub_rut)-1;$i>=0;$i-- ){
		if ( $x >7 ){
			$x=2;
		}
		$s += $sub_rut[$i]*$x;
		$x++;
	}
	$dv=11-($s%11);
	if ( $dv==10 ){
		$dv='K';
	}
	if ( $dv==11 ){
		$dv='0';
	}
	if ( $dv==$sub_dv ){
		return true;
	}else{
		return false;
	}
}
function numero($val,$decimal=0){
	$valor_texto = number_format($val,$decimal,',','.');
	if($val<0){	
		$valor_texto = str_replace("-","",$valor_texto);
		$valor_texto = '<div class="negativo">-'.$valor_texto.'</div>';
		return $valor_texto;
	}else{
		return $valor_texto;
	}
}
function dinero($val){
	$valor_texto = number_format($val,'0',',','.');
	if($val<0){	
		$valor_texto = str_replace("-","",$valor_texto);
		$valor_texto = '<div class="negativo">($'.$valor_texto.')</div>';
		return $valor_texto;
	}else{
		return "$".$valor_texto;
	}
}
function validar_email($email) {
  return (preg_match('/^[-!#$%&\'*+\\.\/0-9=?A-Z^_`{|}~]+@([-0-9A-Z]+\.)+([0-9A-Z]){2,4}$/i', $email)) ? 1 : 0;
}
function numtoletras($xcifra)
{
$xarray = array(0 => "Cero",
1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
"DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
"VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
);
//
$xcifra = trim($xcifra);
$xlength = strlen($xcifra);
$xpos_punto = strpos($xcifra, ".");
$xaux_int = $xcifra;
$xdecimales = "00";
if (!($xpos_punto === false))
   {
   if ($xpos_punto == 0)
      {
      $xcifra = "0".$xcifra;
      $xpos_punto = strpos($xcifra, ".");
      }
   $xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
   $xdecimales = substr($xcifra."00", $xpos_punto + 1, 2); // obtengo los valores decimales
   }
 
$XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
$xcadena = "";
for($xz = 0; $xz < 3; $xz++)
   {
   $xaux = substr($XAUX, $xz * 6, 6);
   $xi = 0; $xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
   $xexit = true; // bandera para controlar el ciclo del While
   while ($xexit)
      {
      if ($xi == $xlimite) // si ya llegó al límite máximo de enteros
         {
         break; // termina el ciclo
         }
    
      $x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
      $xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
      for ($xy = 1; $xy < 4; $xy++) // ciclo para revisar centenas, decenas y unidades, en ese orden
         {
         switch ($xy)
            {
            case 1: // checa las centenas
               if (substr($xaux, 0, 3) < 100) // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
                  {
                  }
               else
                  {
										if(isset($xarray[substr($xaux, 0, 3)])){
                  $xseek = $xarray[substr($xaux, 0, 3)]; // busco si la centena es número redondo (100, 200, 300, 400, etc..)
										}else{
											$xseek = 0;
											}
                  if ($xseek)
                     {
                     $xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
                     if (substr($xaux, 0, 3) == 100)
                        $xcadena = " ".$xcadena." CIEN ".$xsub;
                     else
                        $xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                     $xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
                     }
                  else // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
                     {
                     $xseek = $xarray[substr($xaux, 0, 1) * 100]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
                     $xcadena = " ".$xcadena." ".$xseek;
                     } // ENDIF ($xseek)
                  } // ENDIF (substr($xaux, 0, 3) < 100)
               break;
            case 2: // checa las decenas (con la misma lógica que las centenas)
               if (substr($xaux, 1, 2) < 10)
                  {
                  }
               else
                  {
										if(isset($xarray[substr($xaux, 1, 2)])){
                  $xseek = $xarray[substr($xaux, 1, 2)];
										}else{
											$xseek = 0;
										}
                  if ($xseek)
                     {
                     $xsub = subfijo($xaux);
                     if (substr($xaux, 1, 2) == 20)
                        $xcadena = " ".$xcadena." VEINTE ".$xsub;
                     else
                        $xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                     $xy = 3;
                     }
                  else
                     {
                     $xseek = $xarray[substr($xaux, 1, 1) * 10];
                     if (substr($xaux, 1, 1) * 10 == 20)
                        $xcadena = " ".$xcadena." ".$xseek;
                     else 
                        $xcadena = " ".$xcadena." ".$xseek." Y ";
                     } // ENDIF ($xseek)
                  } // ENDIF (substr($xaux, 1, 2) < 10)
               break;
            case 3: // checa las unidades
               if (substr($xaux, 2, 1) < 1) // si la unidad es cero, ya no hace nada
                  {
                  }
               else
                  {
                  $xseek = $xarray[substr($xaux, 2, 1)]; // obtengo directamente el valor de la unidad (del uno al nueve)
                  $xsub = subfijo($xaux);
                  $xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                  } // ENDIF (substr($xaux, 2, 1) < 1)
               break;
            } // END SWITCH
         } // END FOR
         $xi = $xi + 3;
      } // ENDDO
 
      if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
         $xcadena.= " DE";
          
      if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
         $xcadena.= " DE";
       
      // ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
      if (trim($xaux) != "")
         {
         switch ($xz)
            {
            case 0:
               if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                  $xcadena.= "UN BILLON ";
               else
                  $xcadena.= " BILLONES ";
               break;
            case 1:
               if (trim(substr($XAUX, $xz * 6, 6)) == "1")
                  $xcadena.= "UN MILLON ";
               else
                  $xcadena.= " MILLONES ";
               break;
            case 2:
               if ($xcifra < 1 )
                  {
                  $xcadena = "CERO PESOS";
                  }
               if ($xcifra >= 1 && $xcifra < 2)
                  {
                  $xcadena = "UN PESO ";
                  }
               if ($xcifra >= 2)
                  {
                  $xcadena.= " PESOS  "; //
                  }
               break;
            } // endswitch ($xz)
         } // ENDIF (trim($xaux) != "")
      // ------------------      en este caso, para México se usa esta leyenda     ----------------
      $xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
      $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
      $xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
      $xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
      $xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
      $xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
      $xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
   } // ENDFOR ($xz)
   return trim($xcadena);
} // END FUNCTION
function subfijo($xx)
{ // esta función regresa un subfijo para la cifra
$xx = trim($xx);
$xstrlen = strlen($xx);
if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
	$xsub = "";
//
if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
	$xsub = "MIL";
//
return $xsub;
} // END FUNCTION

function formato_fecha($texto){
	$time = strtotime($texto);
	$fecha = date("d-m-Y",$time);
	if(date("Y",$time)=="-0001"){
		return "00-00-0000";
	}else{
		return $fecha;
	}
}
function formato_fechaUS($texto){
	$temp = explode(" ",$texto);
	if(count($temp)>1){
		$matriz = explode("-",$temp[0]);
		krsort($matriz);	
		return implode("-",$matriz)." ".$temp[1];
	}else{
		$matriz = explode("-",$texto);
		krsort($matriz);	
		return implode("-",$matriz);
	}
}
function ids($id=0,$letra=""){
	while(strlen($id)<5){
		$id = "0".$id;
	}
	return strtoupper($letra).$id;
}
function titulo_sql($texto){
	$temp = explode("_",$texto);
	foreach($temp as $clave=>$valor){
		$temp[$clave] = ucfirst($valor);
	}
	return implode(" ",$temp);
}
function matriz_partidas($inicio="",$nivel=0,$id_acumulado=""){
	$matriz = array();
	if(empty($inicio)){
		$filtro = "IS NULL";
	}else{
		$filtro = " = '".$inicio."' ";
	}
	$sql = "SELECT * FROM `presupuesto_partidas`
					WHERE `padre` $filtro
					ORDER BY `orden` ASC
					";
	$result = mysql_query($sql) or trigger_error(mysql_error()); 
	$num = mysql_num_rows($result);
	if(count($num)>0){
		for($i=0;$i<$num;$i++){
			$temp = array();
			$temp['nivel'] = $nivel;
			$temp['id'] = mysql_result($result,$i,"id_presupuestos_partida");
			$temp['orden'] = mysql_result($result,$i,"orden");
			$temp['nombre'] = utf8_encode(mysql_result($result,$i,"nombre"));
			if(empty($id_acumulado)){
				$temp['id_acumulado'] = ($i+1);
			}else{
				$temp['id_acumulado'] = $id_acumulado.".".($i+1);
			}
			$temp['hijos'] = matriz_partidas(mysql_result($result,$i,"id_presupuestos_partida"),$nivel+1,$temp['id_acumulado']);
			if(count($temp['hijos'])<1){
				unset($temp['hijos']);
			}
			$matriz[] = $temp;
		}
		return $matriz;
	}else{
		return array();
	}
}
function combobox_partidas($matriz,$selected=0,$nombre_campo,$oblitario=false){
		?>
<select name="<?php echo $nombre_campo; ?>" id="<?php echo $nombre_campo; ?>">
	<?php if($oblitario){?>
  <option value="0" <?php if(($selected*1)===0){?> selected<?php }?>>Seleccionar...</option>
  <?php }?>
  <?php
	combobox_partidas_items($matriz,$selected);
	?>
</select>
<?php
}
function combobox_partidas_items($matriz,$selected=0){
	foreach($matriz as $partida){
		 ?>
  <option value="<?php echo $partida['id']; ?>" <?php if($selected==$partida['id']){?> selected<?php }?>><?php for($i=0;$i<=$partida['nivel'];$i++){echo "--";}?><?php echo $partida['id_acumulado']; ?> <?php echo $partida['nombre']; ?></option>
  <?php 
		if(isset($partida['hijos'])){
			combobox_partidas_items($partida['hijos'],$selected);
		}
	}
}
function get_id_usuario(){
	$sql = "SELECT * FROM `usuarios`
					WHERE `user` = '".trim($_COOKIE['user'])."'
					";
	$result = mysql_query($sql) or die(mysql_error());
	$num = mysql_num_rows($result);
	if($num==1){
		return mysql_result($result,0,"id_usuario");
	}else{
		return 0;
	}
}
?>
