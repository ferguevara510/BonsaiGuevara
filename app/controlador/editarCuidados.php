<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cuidado.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //parse_str(file_get_contents("php://input"),$_PUT);
    if (isset($_POST["id_cuidado"])){
        $cuidado= Cuidado::buscarCuidado($_POST["id_cuidado"]);
        $cuidado->id_especie=$_POST["especie"];
        $cuidado->cantidadRiego=$_POST["cantidadriego"];
        $cuidado->lugar=$_POST["lugar"];
        $cuidado->maceta=$_POST["maceta"];
        $cuidado->tiempoTransplante=$_POST["tiempotransplante"];
        $cuidado->tipoCultivo=$_POST["tipocultivo"];
        $cuidado->estilo=$_POST["estilo"];
        $validacion= $cuidado->editarCuidado();
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
        else{
    $_PUT = $_POST;
    if (isset($_PUT["id_especie"]) && is_numeric($_PUT['id_especie']) && isset($_PUT["especie"]) 
        && isset($_PUT["cantidadriego"]) && isset($_PUT["lugar"]) && isset($_PUT["maceta"]) && isset($_PUT["tiempotransplante"]) && isset($_PUT["tipocultivo"])&& isset($_PUT["estilo"])) {
        $cuidado= Cuidado::buscarCuidados($_PUT["id_especie"]);
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
}

?>
