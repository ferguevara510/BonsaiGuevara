<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cliente.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //parse_str(file_get_contents("php://input"),$_PUT);
    $_PUT = $_POST;
    if (isset($_PUT["id_cliente"]) && is_numeric($_PUT['id_cliente']) && isset($_PUT["nombre"]) 
        && isset($_PUT["apellidoPaterno"]) && isset($_PUT["apellidoMaterno"]) && isset($_PUT["correo"]) && isset($_PUT["telefono"])) {
        $cliente = Cliente::buscarCliente($_PUT["id_cliente"]);
        $cambiarContrasena = false;
        if (isset($_PUT["contrasena"]) && $_PUT["contrasena"]!=null) {
            $cambiarContrasena = true;
            $cliente->contrasena=$_PUT["contrasena"];
        }

        if (isset($_FILES["imagenPerfil"]) && file_exists($_FILES['imagenPerfil']['tmp_name'])){
            $pathImage = PATH_IMAGENES_PERFIL.uniqid();
            if (move_uploaded_file($_FILES['imagenPerfil']['tmp_name'], $pathImage)) {
                if (file_exists($_FILES['imagenPerfil']['tmp_name'])){
                    unlink($_FILES['imagenPerfil']['tmp_name']);
                    if (file_exists($cliente->imagenPerfil) && $cliente->imagenPerfil !== URL_IMAGENE_PERFIL_DEFAULT){
                        unlink($cliente->imagenPerfil);
                    }
                }
            }
            $cliente->imagenPerfil = $pathImage;
        }

        $cliente->nombre=$_PUT["nombre"];
        $cliente->apellidoPaterno=$_PUT["apellidoPaterno"];
        $cliente->apellidoMaterno=$_PUT["apellidoMaterno"];
        $cliente->correo=$_PUT["correo"];
        $cliente->numTelefono=$_PUT["telefono"];
        $validacion = $cliente->editarCliente($cambiarContrasena);
        if ($validacion) {
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
?>
