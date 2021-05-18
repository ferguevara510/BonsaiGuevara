<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cita.php";
require_once "../modelo/duracion.php";
require_once "../modelo/cliente.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fecha"]) && isset($_POST["hora"]) && isset($_POST["duracion"]) && isset($_POST["descripcion"]) && isset($_POST["id_cliente"])) {
        $cliente = Cliente::buscarClienteCorreo($_SESSION["user_email"]);
        $cita = new Cita();
        $cita->fecha = $_POST["fecha"];
        $cita->hora = $_POST["hora"];
        $cita->duracion = $_POST["duracion"];
        $cita->descripcion = $_POST["descripcion"];
        $cita->id_cliente = $cliente->id_cliente;
        $validacion = $cita->registrarCita();
        if ($validacion) {
            $horario["title"] = "Cita";
            $horario["start"] = "{$cita->fecha} {$cita->hora}";
            $fechaFin = Duracion::generarIntervaloTiempo($cita->duracion, new DateTime("{$cita->fecha} {$cita->hora}", new DateTimeZone('America/Mexico_City')));
            $horario["end"] = $fechaFin->format("Y-m-d H:i:s");
            $horario["id"] = $cita->folio;
            $jsondata = ["success" => "success","cita" => $horario];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        } else {
            $jsondata = ["error" => "Error, no se pudo guardar la cita"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    }
}
?>