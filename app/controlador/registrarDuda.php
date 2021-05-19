<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cliente.php";
require_once "../modelo/duda.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["correo"])) {
        $cliente = Cliente::buscarClienteCorreo($_POST["correo"]);
        if ($cliente != null) {
            if (isset($_POST["enviar"])){
                $duda = new Duda();
                $duda->correo = $_POST["correo"];
                $duda->descripcion = $_POST["enviar"];
                $duda->id_cliente = $cliente->id_cliente;
                $validacion = $duda->registrarDuda();

                if ($validacion) {
                    $jsondata = ["success" => "success"];
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($jsondata);
                    exit();
                } else {
                    $jsondata = ["error" => "Error, no se pudo guardar la duda"];
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($jsondata);
                    exit();
                }
            }
        }
    }else if(isset($_POST["id_duda"])){
        $duda = Duda::buscarDudaID($_POST["id_duda"]);
        $duda->respuesta = $_POST["respuesta"];
        $validacion = $duda->responderDuda();
        
        if ($validacion) {
            $jsondata = ["success" => "success", "id_duda"=>$duda->id_duda, "respuesta"=>$duda->respuesta];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        } else {
            $jsondata = ["error" => "Error, no se pudo guardar la respuesta"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    }
}

?>