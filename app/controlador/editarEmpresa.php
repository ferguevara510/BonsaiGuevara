<?php
require_once "../../configuracion/env.php";
require_once "../modelo/administrador.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["usuario"]) && isset($_POST["nombre"]) && isset($_POST["apellidoPaterno"]) && isset($_POST["apellidoMaterno"]) && isset($_POST["correo"]) && isset($_POST["telefono"]) 
            && isset($_POST["direccion"])) {
        $administrador = Administrador::consultarEmpresa();
        $cambiarContrasena = false;
        if (isset($_POST["contrasena"]) && $_POST["contrasena"]!=null) {
            $cambiarContrasena = true;
            $administrador->contrasena=$_POST["contrasena"];
        }
    }

        $administrador->nombre=$_POST["nombre"];
        $administrador->apellidoPaterno=$_POST["apellidoPaterno"];
        $administrador->apellidoMaterno=$_POST["apellidoMaterno"];
        $administrador->correo=$_POST["correo"];
        $administrador->numTelefono=$_POST["telefono"];
        $administrador->direccion=$_POST["direccion"];
        $validacion = $administrador->editarEmpresa($cambiarContrasena);
        if($validacion) {
            $jsondata = ["success" => "success"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        } else {
            $jsondata = ["error" => "Error, no se pudo guardar los datos"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
}

?>