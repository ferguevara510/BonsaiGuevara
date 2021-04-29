<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cita.php";
require_once "../modelo/duracion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['fecha'])) {
        $citas = Cita::buscarCitasDia($_GET['fecha']);
        $citasDelDia = [];
        foreach ($citas as $cita) {
            $horario = [];
            $horario["inicio"] = "{$cita->fecha} {$cita->hora}";
            $fechaFin = Duracion::generarIntervaloTiempo($cita->duracion, new DateTime($cita->hora, new DateTimeZone('America/Mexico_City')));
            $horario["fin"] = $fechaFin->format("Y-m-d H:i:s");
            $citasDelDia[] = $horario;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($citasDelDia);
        exit();
    }
    if(isset($_GET['id_cliente'])){
        $jsondata = ["success" => "success"];
    }
}
?>