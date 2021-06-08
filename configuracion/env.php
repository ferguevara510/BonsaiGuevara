<?php
define("URL_CSS", "../../publico/css/");
define("URL_JS", "../../publico/js/");
define("URL_IMAGENES", "../../publico/imagenes/");
define("URL_IMAGENE_PERFIL_DEFAULT", "../../publico/imagenes/perfil.jpg");
define("URL_VISTAS", "../vista/");
define("URL_CONTROLADORES", "../controlador/");
define("URL_MODELOS", "../modelo/");
define("PATH_IMAGENES_PERFIL","../../publico/perfiles/");
define("PATH_IMAGENES_BONSAIS","../../publico/bonsais/");
define("URL_CSS_CALENDARIO", "../../publico/calendario/main.css");
define("URL_JS_CALENDARIO", "../../publico/calendario/main.js");
define("URL_CERRAR_SESION", "../../app/controlador/logout.php");
define("URL_PLANTILLA", "plantilla/");
define("PATH_VISTA", "app/vista/");


define('DB_SERVER', 'localhost');
define("DB_USERNAME", "root");
define("DB_PASSWORD","");
define("DB_DATABASE", "bonsaiguevara");

error_reporting(E_ERROR | E_PARSE);

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($mysqli->connect_error) {
	echo "<script type='text/javascript'>
	alert('Error de Conexión a la Base de Datos, intentelo más tarde');
	window.location.href='".URL_VISTAS.'pedido.php'."';
	</script>";
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$mysqli2 = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($mysqli2->connect_error) {
	echo "<script type='text/javascript'>
	alert('Error de Conexión a la Base de Datos, intentelo más tarde');
	window.location.href='".URL_VISTAS.'pedido.php'."';
	</script>";
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

?>