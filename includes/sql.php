<?php 
mysql_connect($_SISTEMA['sql_host'], $_SISTEMA['sql_user'],$_SISTEMA['sql_clave']) or die(mysql_error()); 
mysql_select_db($_SISTEMA['sql_dbase']) or die(mysql_error()); 
?>