<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $_SISTEMA['titulo_browser']; ?></title>
<link rel="stylesheet" href="includes/jdpicker.css" />
<style type="text/css">
body, td, th {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 1em;
	color: #033;
}
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
h1 {
	color: #036;
	border-bottom: #F90 solid 1px;
}
h2 {
	color: #069;
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
	border: solid 1px #036;
	border-spacing: 0;
	border-collapse: collapse;
}
.tabla th {
	text-align: center;
	background: #036;
	color: #FFF;
	font-weight: normal;
	padding: 5px;
}
.tabla td {
	padding: 2px 5px 2px 5px;
	border-bottom: #036 solid 1px;
}
</style>
<script src="includes/jquery-1.8.3.min.js"></script>
<script src="includes/jquery.jdpicker.js"></script>
<link type="text/css" rel="stylesheet" href="includes/jq-metro.css">
<link type="text/css" rel="stylesheet" href="includes/Interacao.css">
<script src="includes/jquery.metro-btn.js" type="text/javascript"></script>




</head>

<body style="background:#333;">

<table cellpadding="0" cellspacing="0" background="0" width="900" align="center">
<tr valign="top" style="background:#0A4579;">
  <td style="padding:10px;"><img src="<?php echo $_SISTEMA['logo']; ?>" /></td>
</tr>
<?php if(isset($msg) && count($msg)>0){?>
<tr valign="top">
  <td style="background:#FFF;"><div style="background:#FFC; border:1px solid #900; padding:5px; margin:5px;">
    <ul>
    	<?php foreach($msg as $txt){ ?>
      <li><?php echo $txt; ?></li>
      <?php }?>
    </ul>
  </div></td>
</tr>
<?php }?>
<tr valign="top">
  <td style="background:#FFF; padding:10px;"><div id="content">
    
    
    
    <h1>Iniciar Sesión</h1>
    <form id="form1" name="form1" method="post" action="">
      <table border="0" cellspacing="0" cellpadding="0" class="tabla">
        <tr>
          <td>User</td>
          <td><input type="text" name="user" id="user" autocomplete="off" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="clave" id="clave" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="Ingresar" /></td>
        </tr>
      </table>
    </form>
  </div>
    </td>
</tr>
<tr valign="top">
  <td style="text-align:center; color:#FFF; font-size:12px; padding:20px;"><?php echo $_SISTEMA['footer']; ?></td>
</tr>
</table>
</body>
</html>