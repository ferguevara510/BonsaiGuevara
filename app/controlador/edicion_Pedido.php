<?php 
require_once "../../configuracion/env.php";
require_once "../modelo/direccion.php";

    if(isset($_POST['btnConfirmar'])){
        switch($_POST['btnConfirmar']){
            case 'Aceptar':
                $direccion = new Direccion();
                $direccion->id_direccion = $_POST['id_direccion'];
                $direccion->calle = $_POST['calle'];
                $direccion->numExt = $_POST['numExt'];
                $direccion->numInt = $_POST['numInt'];
                $direccion->colonia = $_POST['colonia'];
                $direccion->codigo_postal = $_POST['codigo_postal'];
                $direccion->ciudad = $_POST['ciudad'];
                $direccion->estado = $_POST['estado'];

                $validacion = $direccion->editarDireccion();

                if($validacion == true){
                    $message = 'Dirección Actualizada Correctamente';
                    $location = URL_VISTAS.'pedidos.php';
                    alerta($message, $location);
                } else {
                    $message = 'ERROR: No se pudo Actualizar la Dirección';
                    $location = URL_VISTAS.'pedidos.php';
                    alerta($message, $location);
                }
            break;

            case 'Cancelar':
                header('Location: '. URL_VISTAS.'pedidos.php');
            break;
        }
    }

    function alerta($mensaje, $direccion){
        echo "<script type='text/javascript'>
        alert('".$mensaje."');
        window.location.href='".$direccion."';
        </script>";
    }
?>