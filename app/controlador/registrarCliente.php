<?php
require_once "../modelo/cliente.php";
require_once "../../configuracion/env.php";

$nombre = "";
$apellidoPaterno = "";
$apellidoMaterno = "";
$contrasena = "";
$correo = "";
$telefono = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["nombre"]) && isset($_POST["apellidoPaterno"]) && isset($_POST["apellidoMaterno"]) 
        && isset($_POST["contrasena"]) && isset($_POST["confirmarContrasena"]) && isset($_POST["correo"]) 
            && isset($_POST["telefono"])){
        $cliente = new Cliente();
        $cliente->nombre=$_POST["nombre"];
        $cliente->apellidoPaterno=$_POST["apellidoPaterno"];
        $cliente->apellidoMaterno=$_POST["apellidoMaterno"];
        $cliente->contrasena=$_POST["contrasena"];
        $cliente->correo=$_POST["correo"];
        $cliente->numTelefono=$_POST["telefono"];
        $validacion = $cliente->registrarCliente();

        if($validacion){
            $jsondata = ["success" => "success"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }else{
            $jsondata = ["error" => "Error, no se pudo guardar el usuario"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    }
}