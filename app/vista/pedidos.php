<?php
require_once "../../configuracion/env.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pedidos</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--Inclusion de archivos css-->
	<meta name="page_type" content="np-template-header-footer-from-plugin">
	<link rel="stylesheet" href="../../publico/css/nicepage.css" media="screen">
	<link rel="stylesheet" type="text/css" href="publico/css/bootstrap.css">
	<script class="u-script" type="text/javascript" src="../../publico/js/nicepage.js" defer=""></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="../../publico/js/jquery.1.11.1.js"></script>
	<script type="text/javascript" src="../../publico/js/bootstrap.js"></script>
	<meta property="og:title" content="Inicio">
	<meta property="og:type" content="website">
	<meta name="theme-color" content="#478ac9">
	<link rel="canonical" href="index.html">
	<meta property="og:url" content="index.html">
</head>

<body>
    <?php include "../../app/vista/plantilla/menuCliente.php"; ?>
    <h2>Mis Pedidos</h2>

<?php
    $sql = "SELECT
    C.nombre,
    Cart.id_carrito, Cart.id_bonsai,
    B.nombreComun, B.precio, B.imagenBonsai,
    V.folio, V.estado,
    P.monto, P.fecha, P.tipo,
    D.*

    FROM cliente C
    JOIN carritoventa Cart
    ON C.id_cliente = Cart.id_cliente

    JOIN bonsai B
    ON Cart.id_bonsai = B.id_bonsai

    JOIN venta V
    ON Cart.id_carrito = V.id_carrito

    JOIN pago P
    ON V.id_pago = P.id_pago

    JOIN direccion D
    ON V.id_direccion = D.id_direccion

    WHERE C.id_cliente = ".$_SESSION['id_cliente']." && V.estado = 'Preparando'
    
    ORDER BY Cart.id_carrito;";

    $primero = true;
    $valor;

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
?>

<?php
        if($primero == true){
            $valor = $row['id_carrito'];
            $primero = false;
?>

    <div class="container">
    <h3>Preparando</h3>
    <hr>
    
    <br>
    <div class="container">
        <form method="post" action="edicion_Pedido.php">
            <label><?php echo "Folio del Pedido: ".$row['folio']; ?></label>
            <br>
            <label><?php echo "Fecha de Encargo: ".$row['fecha']; ?></label>
            <br>
            <label><?php echo "Total del Pedido: ".$row['monto']; ?></label>
            <br>

            <input type='hidden' name='id_direccion' id='id_direccion' value="<?php echo $row['id_direccion']; ?>">
            <input type='hidden' name='folio' id='folio' value="<?php echo $row['folio']; ?>">

            <button class="btn btn-primary" name="btnEdicion" value="editar" type="submit">Cambiar Dirección</button>
            <button class="btn btn-danger" name="btnEdicion" value="cancelar" type="submit">Cancelar</button>
        </form>
    </div>
    <br>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="40% text-center">Imagen</th>
                <th class="33% text-center">Nombre</th>
                <th class="33% text-center">Precio</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php
                } else{
                    if($valor == $row['id_carrito']){?>
                        <!-- echo "Mismo carrito"."<br>"; -->
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php
                    } else{ 
?>

        </tbody>
        </table>
    </div>

    <div class="container">
    <hr>
    
    <br>
    <div class="container">
        <form method="post" action="edicion_Pedido.php">
            <label><?php echo "Folio del Pedido: ".$row['folio']; ?></label>
            <br>
            <label><?php echo "Fecha de Encargo: ".$row['fecha']; ?></label>
            <br>
            <label><?php echo "Total del Pedido: ".$row['monto']; ?></label>
            <br>

            <input type='hidden' name='id_direccion' id='id_direccion' value="<?php echo $row['id_direccion']; ?>">
            <input type='hidden' name='folio' id='folio' value="<?php echo $row['folio']; ?>">

            <button class="btn btn-primary" name="btnEdicion" value="editar" type="submit">Cambiar Dirección</button>
            <button class="btn btn-danger" name="btnEdicion" value="cancelar" type="submit">Cancelar</button>
        </form>
    </div>
    <br>

        <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="40% text-center">Imagen</th>
                <th class="33% text-center">Nombre</th>
                <th class="33% text-center">Precio</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php 
                        $valor = $row['id_carrito'];
                        // echo "Cambiamos de Carrito: ".$valor."<br>";
                    }
                }
            }
        } else {
            echo "<p class='lead'><em>No Hay Pedidos.</p>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
?>
        </tbody>
        </table>
        <hr>
    </div>

<?php
    $sql = "SELECT
    C.nombre,
    Cart.id_carrito, Cart.id_bonsai,
    B.nombreComun, B.precio, B.imagenBonsai,
    V.folio, V.estado,
    P.monto, P.fecha, P.tipo,
    D.*

    FROM cliente C
    JOIN carritoventa Cart
    ON C.id_cliente = Cart.id_cliente

    JOIN bonsai B
    ON Cart.id_bonsai = B.id_bonsai

    JOIN venta V
    ON Cart.id_carrito = V.id_carrito

    JOIN pago P
    ON V.id_pago = P.id_pago

    JOIN direccion D
    ON V.id_direccion = D.id_direccion

    WHERE C.id_cliente = ".$_SESSION['id_cliente']." && V.estado = 'Enviado';";

    $primero = true;
    $valor;

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
?>

<?php
        if($primero == true){
            $valor = $row['id_carrito'];
            $primero = false;
?>

    <div class="container">
    
    <h3>Enviados</h3>
    <hr>

<?php                    
                    echo "Folio del Pedido: ".$row['folio']."<br>";
                    echo "Fecha de Encargo: ".$row['fecha']."<br>";
                    echo "Total del Pedido: ".$row['monto']."<br>";
?>   

    <br>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="40% text-center">Imagen</th>
                <th class="33% text-center">Nombre</th>
                <th class="33% text-center">Precio</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php
                } else{
                    if($valor == $row['id_carrito']){?>
                        <!-- echo "Mismo carrito"."<br>"; -->
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php
                    } else{ 
?>

        </tbody>
        </table>
        <hr>
    </div>

    <div class="container">

<?php                    
                    echo "Folio del Pedido: ".$row['folio']."<br>";
                    echo "Fecha de Encargo: ".$row['fecha']."<br>";
                    echo "Total del Pedido: ".$row['monto']."<br>";
?>   

        <br>
        <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="40% text-center">Imagen</th>
                <th class="33% text-center">Nombre</th>
                <th class="33% text-center">Precio</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php 
                        $valor = $row['id_carrito'];
                        // echo "Cambiamos de Carrito: ".$valor."<br>";
                    }
                }
            }
        } else {
            echo "<p class='lead'><em>No Hay Pedidos.</p>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
?>
        </tbody>
        </table>
        <hr>
    </div>

<?php
    $sql = "SELECT
    C.nombre,
    Cart.id_carrito, Cart.id_bonsai,
    B.nombreComun, B.precio, B.imagenBonsai,
    V.folio, V.estado,
    P.monto, P.fecha, P.tipo,
    D.*

    FROM cliente C
    JOIN carritoventa Cart
    ON C.id_cliente = Cart.id_cliente

    JOIN bonsai B
    ON Cart.id_bonsai = B.id_bonsai

    JOIN venta V
    ON Cart.id_carrito = V.id_carrito

    JOIN pago P
    ON V.id_pago = P.id_pago

    JOIN direccion D
    ON V.id_direccion = D.id_direccion

    WHERE C.id_cliente = ".$_SESSION['id_cliente']." && V.estado = 'Cancelado';";

    $primero = true;
    $valor;

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
?>

<?php
        if($primero == true){
            $valor = $row['id_carrito'];
            $primero = false;
?>

    <div class="container">
    
    <h3>Cancelados</h3>
    <hr>

<?php                    
                    echo "Folio del Pedido: ".$row['folio']."<br>";
                    echo "Fecha de Encargo: ".$row['fecha']."<br>";
                    echo "Total del Pedido: ".$row['monto']."<br>";
?>   

    <br>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="40% text-center">Imagen</th>
                <th class="33% text-center">Nombre</th>
                <th class="33% text-center">Precio</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php
                } else{
                    if($valor == $row['id_carrito']){?>
                        <!-- echo "Mismo carrito"."<br>"; -->
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php
                    } else{ 
?>

        </tbody>
        </table>
        <hr>
    </div>

    <div class="container">

<?php                    
                    echo "Folio del Pedido: ".$row['folio']."<br>";
                    echo "Fecha de Encargo: ".$row['fecha']."<br>";
                    echo "Total del Pedido: ".$row['monto']."<br>";
?>   

        <br>
        <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="40% text-center">Imagen</th>
                <th class="33% text-center">Nombre</th>
                <th class="33% text-center">Precio</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <th class="33% text-center"><img src="<?php echo $row['imagenBonsai'] ?>" width="200" height="120" alt="NOT FOUND"></th>
            <th class="33% text-center"><?php echo $row['nombreComun'] ?></th>
            <th class="33% text-center"><?php echo $row['precio'] ?></th>
        </tr>

<?php 
                        $valor = $row['id_carrito'];
                        // echo "Cambiamos de Carrito: ".$valor."<br>";
                    }
                }
            }
        } else {
            echo "<p class='lead'><em>No Hay Pedidos.</p>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
?>
        </tbody>
        </table>
        <hr>
    </div>
    
</body>
</html>