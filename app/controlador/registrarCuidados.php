<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cuidado.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["especie"]) && isset($_POST["cantidadriego"]) && isset($_POST["lugar"]) && isset($_POST["maceta"]) 
        && isset($_POST["tiempotransplante"]) && isset($_POST["tipocultivo"]) && isset($_POST["estilo"])){
        
        $cuidado = new Cuidado();
        $cuidado->id_especie=$_POST["especie"];
        $cuidado->cantidadRiego=$_POST["cantidadriego"];
        $cuidado->lugar=$_POST["lugar"];
        $cuidado->maceta=$_POST["maceta"];
        $cuidado->tiempoTransplante=$_POST["tiempotransplante"];
        $cuidado->tipoCultivo=$_POST["tipocultivo"];
        $cuidado->estilo=$_POST["estilo"];
        $validacion = $cuidado->registrarCuidado();

        if($validacion){
            $jsondata = ["success" => "success"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }else{
            $jsondata = ["error" => "Error, no se pudo guardar el cuidado del bonsái"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    }
}
