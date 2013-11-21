<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('America/Santiago');

$_SISTEMA['lineas_por_pagina'] = 20; // Cantidad de líneas por página
$_SISTEMA['sql_host'] = "localhost"; // Servidor msqyl
$_SISTEMA['sql_user'] = "exetest_exefire"; // Usuario mysql
$_SISTEMA['sql_clave'] = "Zl1F)cc!E8sy"; // Clave del Usuario mysql
$_SISTEMA['sql_dbase'] = "exetest_das"; // Base de Datos Mysql
$_SISTEMA['nombre'] = 'DAS'; // Nombre de la empresa
$_SISTEMA['titulo_browser'] = "Sistema Gestión DAS"; // Título que muestra el navegador por defecto
$_SISTEMA['titulo'] = "DAS"; // Título página H1, por defecto
$_SISTEMA['logo'] = "images/logotipo.png"; // logo en cabecera
$_SISTEMA['footer'] = "Desarrollado por ".'<a href="http://www.scblogistica.cl" target="_blank" style="color:#FFF;">SCB Log&iacute;stica</a>'." - ".date("Y"); // Pie de página

?>