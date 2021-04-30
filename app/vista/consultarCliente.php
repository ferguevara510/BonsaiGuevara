<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cliente.php";

$clientes = Cliente::buscarTodosClientes();
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Consultar Clientes</title>
    <link rel="stylesheet" href="<?php echo URL_CSS?>consultarCliente.css">
    <link rel="stylesheet" href="<?php echo URL_CSS?>nicepage.css" media="screen">
    <link rel="stylesheet" href="<?php echo URL_CSS?>Iniciar-Sesión.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>bootstrap.css">
    <script class="u-script" type="text/javascript" src="<?php echo URL_JS?>nicepage.js" defer=""></script>

    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.isotope.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jqBootstrapValidation.js"></script>

    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo":"../../publico/imagenes/bonsai_karla.png"
}</script>
    <meta property="og:title" content="Inicio">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
</head>

<body data-home-page="Iniciar-Sesión.html" data-home-page-title="Iniciar Sesión" class="u-body">
    <?php
    require_once "plantilla/menuAdmin.php";
    ?>
    
    <h1 class="u-text u-text-default u-text-cliente .u-title">Lista de clientes</h1>
    <div class="contenedor-tarjetas">
        <?php foreach($clientes as $cliente){?>
            <div class="tarjeta-cliente">
            <div class="seccion-superior">
                <div class="imagen-tarjeta">
                    <img src="<?php echo $cliente->imagenPerfil?>" alt="">
                </div>
                <div class="tarjeta-nombre">
                    <span><?php echo "{$cliente->nombre} {$cliente->apellidoPaterno} {$cliente->apellidoMaterno}";?></span>
                </div>
            </div>
            <div class="seccion-inferior">
                <div>
                    <strong>Número de teléfono: </strong>
                    <span><?php echo $cliente->numTelefono?></span>
                </div>
                <div>
                    <strong>Correo: </strong>
                    <span><?php echo $cliente->correo?></span>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    

    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-712f">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1">Universidad Veracruzana&nbsp;<br>Desarrollo de
                Software
            </p>
        </div>
    </footer>

</body>

</html>