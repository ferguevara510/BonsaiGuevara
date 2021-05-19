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
            $fechaFin = Duracion::generarIntervaloTiempo($cita->duracion, new DateTime("{$cita->fecha} {$cita->hora}", new DateTimeZone('America/Mexico_City')));
            $horario["fin"] = $fechaFin->format("Y-m-d H:i:s");
            $citasDelDia[] = $horario;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($citasDelDia);
        exit();
    }else if(isset($_GET['id_cliente'])){
        $cita = Cita::buscarCitaCliente($_GET['id_cliente']);
        header('Content-type: application/json; charset=utf-8');
        if(isset($cita)){
            echo json_encode($cita);
        }else{
            header('Status Code: 404');
            echo json_encode(["error" => "No se encontro una cita"]);
        }
        
        exit();
    }else if(isset($_GET['id'])){
        $cita = Cita::buscarCitaPorFolio($_GET['id']);
        header('Content-type: application/json; charset=utf-8');
        if(isset($cita)){
            echo json_encode($cita);
        }else{
            header('Status Code: 404');
            echo json_encode(["error" => "No se encontro una cita"]);
        }
        
        exit();
    }else if(isset($_GET["mes_año"])){
        $seccionesFecha = explode("_",$_GET['mes_año']);
        $citas = Cita::buscarCitas();
        $formatoCitas = [];
        foreach ($citas as $cita) {
            $horario = [];
            $horario["title"] = "Cita";
            $horario["start"] = "{$cita->fecha} {$cita->hora}";
            $fechaFin = Duracion::generarIntervaloTiempo($cita->duracion, new DateTime("{$cita->fecha} {$cita->hora}", new DateTimeZone('America/Mexico_City')));
            $horario["end"] = $fechaFin->format("Y-m-d H:i:s");
            $horario["id"] = $cita->folio;
            $formatoCitas[] = $horario;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($formatoCitas);
        exit();
    }else{
        $citas = Cita::buscarCitas();
        $formatoCitas = [];
        foreach ($citas as $cita) {
            $horario = [];
            $horario["title"] = "Cita";
            $horario["start"] = "{$cita->fecha} {$cita->hora}";
            $fechaFin = Duracion::generarIntervaloTiempo($cita->duracion, new DateTime("{$cita->fecha} {$cita->hora}", new DateTimeZone('America/Mexico_City')));
            $horario["end"] = $fechaFin->format("Y-m-d H:i:s");
            $horario["id"] = $cita->folio;
            $formatoCitas[] = $horario;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($formatoCitas);
        exit();
    }
}
?>