<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cita.php";
require_once "../modelo/duracion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['fecha'])) {
        $citas = Cita::buscarCitasDia($_GET['fecha']);
        
    }
}

$fechas = Duracion::generarIntervaloTiempo(8, new DateTime("now", new DateTimeZone('America/Mexico_City')));
var_dump($fechas); 
?>