<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cita.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["accion"]) && $_POST["accion"] == "delete" && isset($_POST["folio"])){
        $cita = Cita::buscarCitaPorFolio($_POST["folio"]);
        $validacion = $cita->eliminarCita();

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