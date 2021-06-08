<?php
require_once "../../configuracion/env.php";
include URL_CONTROLADORES . "carrito.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminar Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div>
        <h1 class="text-center" style="background-color: white;">Terminar Compra</h1>
        <hr>
    </div>

    <br>
    <div class="container">
        <h2>Dirección</h2>
        <form action="<?php echo URL_CONTROLADORES ?>pedido.php" method="post">

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
            </div>

            <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">
            </div>


            <div class="form-group">
                <label for="colonia">Colonia</label>
                <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia">
            </div>


            <div class="form-group">
                <label for="nExterior">No. Exterior</label>
                <input type="text" class="form-control" id="numExt" name="numExt" placeholder="#">
            </div>


            <div class="form-group">
                <label for="nInterior">No. Interior (Opcional)</label>
                <input type="text" class="form-control" id="numInt" name="numInt" placeholder="#">
            </div>


            <div class="form-group">
                <label for="cp">Código Postal</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="#">
            </div>

            <br>
            <div class="form-group">
                <label style="font-weight: bold;">Métodos de Pago</label>
                <select name="pago">
                    <option value="Tarjeta">Tarjeta de Débito/Crédito</option>
                    <option value="PayPal">PayPal</option>
                    <option value="OXXO">OXXO</option>
                    <option value="Contra-Entrega">Contra-Entrega</option>
                </select>
            </div>

            <div class="form-group">
                <h2>Resumen</h2>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="40% text-center">Descripción</th>
                            <th class="15% text-center">Cantidad</th>
                            <th class="20% text-center">Precio</th>
                            <th class="20% text-center">Total</th>
                            <th class="5%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <!--Iniciamos recorrido del carrito-->
                        <?php $total = 0 ?>
                        <?php foreach ($_SESSION['Carrito'] as $indice => $producto) { ?>
                            <?php $total = $total + $producto['cantidad'] * $producto['precio'] ?>

                            <tr>
                                <th class="40%"><?php echo $producto['nombre'] ?></th>
                                <th class="15% text-center"><?php echo $producto['cantidad'] ?></th>
                                <th class="20% text-center"><?php echo $producto['precio'] ?></th>
                                <th class="20% text-center"><?php echo number_format($producto['cantidad'] * $producto['precio'], 2) ?></th>
                                <th class="5%  text-center">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $producto['id'] ?>">
                                        <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                                    </form>
                                </th>
                            </tr>

                        <?php } ?>

                        <tr>
                            <td class="text-right" colspan="3">
                                <h3>Total</h3>
                            </td>
                            <td class="text-right" colspan="2" style="color:green">
                                <h3>$<?php echo number_format($total, 2) ?></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button class="btn btn-primary" type="submit">¡Realizar Compra!</button>
            </div>
        </form>
    </div>

    <br>
    <!-- <br>
    <div class="container">
        <h2>Métodos de Pago</h2>
        <form>
            <input type="checkbox" id="tarjeta" name="tarjeta">
            <label for="tarjeta">Tarjeta de Débito/Crédito</label><br>
            <input type="checkbox" id="paypal" name="paypal">
            <label for="paypal">PayPal</label><br>
            <input type="checkbox" id="oxxo" name="oxxo">
            <label for="oxxo">OXXO</label><br>
            <input type="checkbox" id="entrega" name="entrega">
            <label for="entrega">Contraentrega</label><br>
        </form>
    </div> -->

    <!-- <br>
    <div class="container">
        <h2>Telefono</h2>
        <select name="telefono">
            <option value="value1">Value 1</option>
            <option value="value2" selected>Value 2</option>
            <option value="value3">Value 3</option>
        </select>
    </div> -->
</body>

</html>