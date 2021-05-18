<?php
require_once "../../configuracion/env.php";
require_once "../modelo/duda.php";
require_once "../modelo/administrador.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $dudas = Duda::buscarDuda();
    $respuesta = [];
    $respuesta["dudas"] = $dudas;

    $administrador = Administrador::consultarEmpresa();
    $respuesta["administrador"] = "{$administrador->nombre} {$administrador->apellidoPaterno} {$administrador->apellidoMaterno}";
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($respuesta);
        exit();
}
?>