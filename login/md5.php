<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body><?php 
if(isset($_POST['texto'])){
	$_POST['salt'] = md5("exe".time());
	$_POST['hash'] = md5($_POST['texto'].$_POST['salt']);
	unset($_POST['texto']);
	print_r($_POST);
}
?>
<form id="form1" name="form1" method="post" action="">
  <input type="text" name="texto" id="texto" />
  <input type="submit" />
</form>
</body>
</html>