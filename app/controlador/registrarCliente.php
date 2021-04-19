<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cliente.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["nombre"]) && isset($_POST["apellidoPaterno"]) && isset($_POST["apellidoMaterno"]) 
        && isset($_POST["contrasena"]) && isset($_POST["confirmarContrasena"]) && isset($_POST["correo"]) 
            && isset($_POST["telefono"])){
        $pathImage = URL_IMAGENE_PERFIL_DEFAULT;
        if(isset($_FILES["imagenPerfil"]) && file_exists($_FILES['imagenPerfil']['tmp_name'])){
            $pathImage = PATH_IMAGENES_PERFIL.uniqid();
            if (move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $pathImage)) {
                if(file_exists($_FILES['imagenPerfil']['tmp_name'])){
                    unlink($_FILES['imagenPerfil']['tmp_name']);
                }

            }
        }
        $cliente = new Cliente();
        $cliente->nombre=$_POST["nombre"];
        $cliente->apellidoPaterno=$_POST["apellidoPaterno"];
        $cliente->apellidoMaterno=$_POST["apellidoMaterno"];
        $cliente->contrasena=$_POST["contrasena"];
        $cliente->correo=$_POST["correo"];
        $cliente->numTelefono=$_POST["telefono"];
        $cliente->imagenPerfil = $pathImage;
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
