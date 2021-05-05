<?php
require_once "../../configuracion/env.php";
require_once "../../app/modelo/estilo.php";
?>
<!--Inicio HTML-->
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Bonsais</title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--Inclusion de archivos css-->

    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Inicio</title>
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
    <style>
<?php include '../../publico/css/ventas.css'; ?>

</style>

</head>

<body data-home-page="Iniciar-Sesión.html" data-home-page-title="Iniciar Sesión" class="u-body">

<!--Nav Bar-->
<!--No sirve-->
<?php
include "../../app/vista/plantilla/menu.php";
?>
<!--Fin del NavBar-->

<?php
$sql = "SELECT * FROM venta";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){ 
      while($row = $result->fetch_array()){
        //Obtener la especie del los bonsais
        $folio=$row['folio'];
        $id_carrito=$row['id_carrito'];
        $id_direccion=$row['id_direccion'];
        $id_pago=$row['id_pago'];

// Consulta Carrito
$consultaCarrito = "SELECT * FROM carritoventa where id_carrito = $id_carrito";
        $result2=$mysqli->query($consultaCarrito);
        $carritoData=$result2->fetch_array();
        $id_cliente=$carritoData['id_cliente'];
        $id_bonsai=$carritoData['id_bonsai'];

//Consulta a pago
        $consultaPago = "SELECT * FROM pago where id_pago = $id_pago";
        $result3=$mysqli->query($consultaPago);
        $pagoData=$result3->fetch_array();

//Consulta a Dirección
$consultaDireccion = "SELECT * FROM direccion where id_direccion = $id_direccion";
$result4=$mysqli->query($consultaDireccion);
$direccionData=$result4->fetch_array();

//Consulta a Cliente
$consultaCliente = "SELECT * FROM cliente where id_cliente = $id_cliente";
$result5=$mysqli->query($consultaCliente);
$clienteData=$result5->fetch_array();

//Consulta a bonsai
$consultaBonsai = "SELECT * FROM bonsai where id_bonsai = $id_bonsai";
$result6=$mysqli->query($consultaBonsai);
$bonsaiData=$result6->fetch_array();

        echo "<div class='ventas'>";
        echo "<div class='ventaInfo'>";
        //Upper
        echo"<label class='nameFont  for=''>Fecha De Venta: </label>" ;
        echo"<label class='nameFont upper' for=''>".$pagoData['fecha']."</label>" ;
        echo"<label class='nameFont  for=''>Total: </label>" ;
        echo"<label class='nameFont upper' for=''>".$pagoData['monto']."</label>" ;

        echo"<label class='nameFont' for=''>Folio:</label>" ;
        echo"<label class='nameFont upper' for=''>".$folio."</label>" ;


      
        echo"<label class='nameFont' for=''>Nombre del Cliente:</label>" ;
        echo"<label class='nameFont ' for=''>".$clienteData['nombre']."&nbsp;"."</label>" ;
        echo"<label class='nameFont ' for=''>".$clienteData['apellidoPaterno']."&nbsp;"."</label>" ;
        echo"<label class='nameFont upper' for=''>".$clienteData['apellidoMaterno']."</label>" ;
        
        echo "<div class='direccionInfo'>";
//Mid
        echo"<label class='nameFont' for=''>Calle:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['calle']."</label>" ;
        echo"<label class='nameFont' for=''>Número Exterior:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['numExt']."</label>" ;
        echo"<label class='nameFont' for=''>Número Interior:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['numInt']."</label>" ;
        echo"<label class='nameFont' for=''>Colonia:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['colonia']."</label>" ;
        echo"<label class='nameFont' for=''>Codigo Postal:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['codigoPostal']."</label>" ;
        echo"<label class='nameFont' for=''>Ciudad:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['ciudad']."</label>" ;
        echo"<label class='nameFont' for=''>Estado:</label>" ;
        echo"<label class='nameFont mid' for=''>".$direccionData['estado']."</label>" ;

        echo"</div>" ;

//Low
        echo"<div class='productSegment' >";
        echo "<img src='".$bonsaiData['imagenBonsai']."' alt='Not Found' onerror=this.src='../../publico/bonsais/Error.png' width='200' height='120'>";
        echo"<label class='nameFont' for=''>Nombre del Bonsai:</label>" ;
        echo"<label class='nameFont low ' for=''>".$bonsaiData['nombreComun']."</label>" ;
        echo"<label class='nameFont' for=''>Precio Del Bonsai:</label>" ;
        echo"<label class='nameFont low' for=''>".$bonsaiData['precio']."</label>" ;
        echo"</div>" ;

        echo"</div>" ;
        echo"</div>" ;

        
      }

    } 

    else{
    echo "<p class='lead'><em>No Hay elementos en la base de datos.</p>";
    }


    }else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }


    // Close connection
$mysqli->close();
        ?>


</body>





</html>