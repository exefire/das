<?php 
// Log Out
if(isset($_POST['cerrar'])){
	foreach($_COOKIE as $clave => $valor){
		setcookie ($clave,"",0);
	}
	header("location: ./");
	exit;
}
// Log In
if(isset($_POST['user']) && isset($_POST['clave'])){
	$user = str_replace(".","",$_POST['user']);
	$sql = "SELECT * FROM `usuarios`
					WHERE `user` = '".$user."'
					";
	$result = mysql_query($sql) or die(mysql_error()."<br><br>".nl2br($sql));
	$num = mysql_num_rows($result);
	if($num==1){
		// El usuario existe
		$dias = 1;
		$caduca = time()+60*60*24*$dias;
		// id_usuario	user 	hash 	salt 	ultima_fecha 
		$id_usuario = mysql_result($result,0,"id_usuario");
		$user = mysql_result($result,0,"user");
		$hash = mysql_result($result,0,"hash");
		$salt = mysql_result($result,0,"salt");
		
		$clave = md5(trim($_POST['clave']).$salt);
		$ultima_fecha = date("Y-m-d H:i:s");
				
		if($hash==$clave){
			// Existe Usuario, Clave correcta
			setcookie ("user",$user,$caduca);
			setcookie ("hash",md5($ultima_fecha),$caduca);
			$sql = "UPDATE `usuarios` 
							SET `ultima_fecha` = '".$ultima_fecha."' 
							WHERE `user` = '".$user."'
							;";
			$result = mysql_query($sql) or die(mysql_error()."<br><br>".nl2br($sql));
			$resto = explode("?",$_SERVER['REQUEST_URI']);
			header("location: http://".$_SERVER['HTTP_HOST'].$resto[0]);
			exit;
		}else{
			// Existe Usuario, Clave Incorrecta
			$resto = explode("?",$_SERVER['REQUEST_URI']);
			header("location: http://".$_SERVER['HTTP_HOST'].$resto[0]."?msg[]=".urlencode("Clave incorrecta."));
			exit;
		}
	}else{
		// Usuario NO Existe
		$resto = explode("?",$_SERVER['REQUEST_URI']);
		header("location: http://".$_SERVER['HTTP_HOST'].$resto[0]."?msg[]=".urlencode("No existe ese usuario.")."");
		include_once("form_login.php");
		exit;
	}
}elseif(!isset($_COOKIE['user'])&&!isset($_COOKIE['hash'])){
	// No existe sesión iniciada
	include_once("form_login.php");
	exit;
}
// Valida si es que está Loggeado vásilamente
if(isset($_COOKIE['user'])&&isset($_COOKIE['hash'])){
	$sql = "SELECT * FROM `usuarios`
					WHERE `user` = '".$_COOKIE['user']."'
					";
	$result = mysql_query($sql) or die(mysql_error()."<br><br>".nl2br($sql));
	$num = mysql_num_rows($result);
	if($num==1){
		// Existe el user
		$ultima_fecha = mysql_result($result,0,"ultima_fecha");
		$sql = "SELECT * FROM `usuarios`
						WHERE `user` = '".$_COOKIE['user']."'
						AND md5(`ultima_fecha`) = '".$_COOKIE['hash']."'
						";
		$result = mysql_query($sql) or die(mysql_error()."<br><br>".nl2br($sql));
		$num = mysql_num_rows($result);
		if($num==1){
			// OK la sesión
		}else{
			// Sesión con error
			//echo "Error 45";
			//exit;
		}
	}else{
		// No Existe el user
		echo "Error 122";
		exit;
	}
}
?>