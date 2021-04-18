<?php
require_once "../modelo/cliente.php";
require_once "../../configuracion/env.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "PUT") {
    if(isset($_REQUEST["id_cliente"]) && is_numeric($_GET['id_cliente']) && isset($_REQUEST["nombre"]) 
        && isset($_REQUEST["apellidoPaterno"]) && isset($_REQUEST["apellidoMaterno"]) && isset($_REQUEST["correo"]) 
        && isset($_REQUEST["telefono"])) {
        $cliente = Cliente::buscarCliente($_REQUEST["id_cliente"]);
        $cambiarContrasena = false;
        if (isset($_REQUEST["contrasena"]) && isset($_REQUEST["confirmarContrasena"])) {
            $cambiarContrasena = true;
            $cliente->contrasena=$_REQUEST["contrasena"];
        }
        $cliente->nombre=$_REQUEST["nombre"];
        $cliente->apellidoPaterno=$_REQUEST["apellidoPaterno"];
        $cliente->apellidoMaterno=$_REQUEST["apellidoMaterno"];
        $cliente->correo=$_REQUEST["correo"];
        $cliente->numTelefono=$_REQUEST["telefono"];
        $validacion = $cliente->editarCliente($cambiarContrasena);
        if($validacion) {
            $jsondata = ["success" => "success"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        } else {
            $jsondata = ["error" => "Error, no se pudo guardar el usuario"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    }
}