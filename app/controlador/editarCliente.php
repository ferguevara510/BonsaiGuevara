<?php
require_once "../modelo/cliente.php";
require_once "../../configuracion/env.php";

if($_SERVER["REQUEST_METHOD"] == "PUT") {
    parse_str(file_get_contents("php://input"),$_PUT);
    if(isset($_PUT["id_cliente"]) && is_numeric($_PUT['id_cliente']) && isset($_PUT["nombre"]) 
        && isset($_PUT["apellidoPaterno"]) && isset($_PUT["apellidoMaterno"]) && isset($_PUT["correo"]) && isset($_PUT["telefono"])) {
        $cliente = Cliente::buscarCliente($_PUT["id_cliente"]);
        $cambiarContrasena = false;
        if (isset($_PUT["contrasena"]) && $_PUT["contrasena"]!=null) {
            $cambiarContrasena = true;
            $cliente->contrasena=$_PUT["contrasena"];
        }
        $cliente->nombre=$_PUT["nombre"];
        $cliente->apellidoPaterno=$_PUT["apellidoPaterno"];
        $cliente->apellidoMaterno=$_PUT["apellidoMaterno"];
        $cliente->correo=$_PUT["correo"];
        $cliente->numTelefono=$_PUT["telefono"];
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