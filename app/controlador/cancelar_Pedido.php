<?php
    require_once "../../configuracion/env.php";
    require_once "../modelo/venta.php";

    if(isset($_POST['btnConfirmar'])){
        switch($_POST['btnConfirmar']){
            case 'Si':
                $venta = new Venta();
                $venta->folio = $_POST['folio'];
                $venta->estado = 'Cancelado';
                
                $validacion = $venta->editarDireccion();

                if($validacion == true){
                    $message = 'Pedido Cancelado Correctamente';
                    $location = URL_VISTAS.'pedidos.php';
                    alerta($message, $location);
                } else {
                    $message = 'ERROR: No se pudo cancelar el pedido';
                    $location = URL_VISTAS.'pedidos.php';
                    alerta($message, $location);
                }
            break;

            case 'No':
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