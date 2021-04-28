<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cita.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fecha"]) && isset($_POST["hora"]) && isset($_POST["duracion"]) && isset($_POST["descripcion"]) && isset($_POST["id_cliente"])) {
        $cita = new Cita();
        $cita->fecha = $_POST["fecha"];
        $cita->hora = $_POST["hora"];
        $cita->duracion = $_POST["duracion"];
        $cita->descripcion = $_POST["descripcion"];
        $cita->id_cliente = $_POST["id_cliente"];
        $validacion = $cita->registrarCita();
        if ($validacion) {
            $jsondata = ["success" => "success"];
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