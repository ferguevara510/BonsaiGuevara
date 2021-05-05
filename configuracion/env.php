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
define("URL_CERRAR_SESION", "app/controlador/logout.php");
define("URL_PLANTILLA", "plantilla/");
define("PATH_VISTA", "app/vista/");


define('DB_SERVER', 'localhost');
define("DB_USERNAME", "root");
define("DB_PASSWORD","");
define("DB_DATABASE", "bonsaiguevara");

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$mysqli2 = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

?>