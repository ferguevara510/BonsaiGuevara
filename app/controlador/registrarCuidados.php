<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cuidado.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["cantidadriego"]) && isset($_POST["lugar"]) && isset($_POST["maceta"]) 
        && isset($_POST["tiempotransplante"]) && isset($_POST["tipocultivo"])){
        
        $cuidado = new Cuidado();
        $cuidado->cantidadRiego=$_POST["cantidadriego"];
        $cuidado->lugar=$_POST["lugar"];
        $cuidado->maceta=$_POST["maceta"];
        $cuidado->tiempoTransplante=$_POST["tiempotransplante"];
        $cuidado->tipoCultivo=$_POST["tipocultivo"];
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
