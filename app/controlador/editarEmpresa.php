<?php
require_once "../../configuracion/env.php";
require_once "../modelo/administrador.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["usuario"]) && isset($_POST["nombre"]) && isset($_POST["apellidoPaterno"]) && isset($_POST["apellidoMaterno"]) && isset($_POST["correo"]) && isset($_POST["telefono"]) 
            && isset($_POST["direccion"])) {
        $administrador = Administrador::consultarEmpresa();
        $cambiarContrasena = false;
        if (isset($_POST["contrasena"]) && $_POST["contrasena"]!=null) {
            if(md5($_POST["confirmarContrasena"]) !== $administrador->contrasena){
                $jsondata = ["error" => "Error, para cambiar la contraseña ingresar la contraseña actual"];
                header('Content-type: application/json; charset=utf-8');
                echo json_encode($jsondata);
                exit();
            }
            $cambiarContrasena = true;
            $administrador->contrasena=$_POST["contrasena"];
        }
    }
    if(!is_numeric($_POST["telefono"]) || strlen($_POST["telefono"]) != 10){
        $jsondata = ["error" => "Error, el teléfono dede solo contener números y tener un longitud de 10 digitos"];
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
    }
    $seccionesNombre = explode(" ",$_POST["nombre"]);

    foreach($seccionesNombre as $seccion){
        if(!ctype_alpha($seccion)){
            $jsondata = ["error" => "Error, el nombre solo puede contener letras"];
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);
            exit();
        }
    }
    

    if(!ctype_alpha($_POST["apellidoPaterno"]) || !ctype_alpha($_POST["apellidoMaterno"]) ){
        $jsondata = ["error" => "Error, los apellidos solo pueden contener letras"];
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
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