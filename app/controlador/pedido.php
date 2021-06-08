<?php 
require_once "../../configuracion/env.php";
require_once "../modelo/direccion.php";
require_once "../modelo/carrito.php";
require_once "../modelo/pago.php";
require_once "../modelo/venta.php";
require_once URL_CONTROLADORES."carrito.php";

// echo $_POST['pago'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if  (!empty($_POST["calle"]) && !empty($_POST["numExt"]) && !empty($_POST["colonia"]) 
        && !empty($_POST["codigo_postal"]) && !empty($_POST["ciudad"]) && !empty($_POST["estado"])) {

            if(! is_numeric($_POST["numExt"][0])){
                echo "<script type='text/javascript'>
                alert('Se está intentando ingresar un número incorrecto');
                window.location.href='".URL_VISTAS.'pedido.php'."';
                </script>";
            } else {
                //Seccion Direccion
                $direccion = new Direccion();
                $direccion->calle = $_POST["calle"];
                $direccion->numExt = $_POST["numExt"];
                $direccion->numInt = $_POST["numInt"];
                $direccion->colonia = $_POST["colonia"];
                $direccion->codigo_postal = $_POST["codigo_postal"];
                $direccion->ciudad = $_POST["ciudad"];
                $direccion->estado = $_POST["estado"];
                $validacion = $direccion->registrar();
                if ($validacion) {
                    $indice_direccion = $direccion->getLastIndex(); //Dato para Venta
                    //Seccion Carrito
                    $total = 0;
                    $id_carrito = rand(0, 99999);
                    $carrito = new Carrito();
                    $carrito->id_carrito = $id_carrito;
                    $carrito->id_cliente = $_SESSION['id_cliente'];

                    foreach ($_SESSION['Carrito'] as $indice => $producto) {
                        $carrito->id_bonsai = $producto['id'];
                        $total = $total + $producto['precio'];
                        $validacion = $carrito->registrar();
                        //echo $carrito->toString();
                    }
                    if ($validacion) {
                        //Seccion del Pago
                        $id_pago = rand(0, 99999);
                        $date = date('Y-m-d');
                        echo $total;
                        $tipo = $_POST['pago'];

                        $pago = new Pago();
                        $pago->id_pago = $id_pago;
                        $pago->fecha = $date;
                        $pago->monto = $total;
                        $pago->tipo = $tipo;
                        $validacion = $pago->registrar();

                        if ($validacion) {
                            //Seccion de Venta
                            $venta = new Venta();
                            $venta->id_carrito = $id_carrito;
                            $venta->id_direccion = $indice_direccion;
                            $venta->id_pago = $id_pago;
                            $venta->estado = 'Preparando';

                            $validacion = $venta->registrar();
                            if ($validacion) {
                                $jsondata = ["success" => "success"];
                                header('Content-type: application/json; charset=utf-8');
                                echo json_encode($jsondata);
                
                                header('Location: limpiar_carrito.php');
                            } else {
                                $jsondata = ["error" => "Error, no se pudo guardar la venta"];
                                echo $carrito->toString();
                                header('Content-type: application/json; charset=utf-8');
                                echo json_encode($jsondata);
                                exit();
                            }
                        } else {
                            $jsondata = ["error" => "Error, no se pudo guardar el pago"];
                            echo $carrito->toString();
                            header('Content-type: application/json; charset=utf-8');
                            echo json_encode($jsondata);
                            exit();
                        }
                    } else {
                        $jsondata = ["error" => "Error, no se pudo guardar un carrito"];
                        echo $carrito->toString();
                        header('Content-type: application/json; charset=utf-8');
                        echo json_encode($jsondata);
                        exit();
                    }
                } else {
                    $jsondata = ["error" => "Error, no se pudo guardar la direccion"];
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($jsondata);
                    exit();
                }
        }
    } else {
        echo "<script type='text/javascript'>
        alert('Datos Faltantes');
        window.location.href='".URL_VISTAS.'pedido.php'."';
        </script>";
    }
}