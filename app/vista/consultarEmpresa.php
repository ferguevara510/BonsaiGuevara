<?php
require_once "../../configuracion/env.php";
require_once "../modelo/administrador.php";
session_start();
$administrador = Administrador::consultarEmpresa();
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Consultar Empresa</title>
    <link rel="stylesheet" href="<?php echo URL_CSS?>nicepage.css" media="screen">
    <link rel="stylesheet" href="<?php echo URL_CSS?>Iniciar-Sesión.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>empresa.css">
    <script class="u-script" type="text/javascript" src="<?php echo URL_JS?>nicepage.js" defer=""></script>

    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.isotope.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jqBootstrapValidation.js"></script>

    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo": "../../publico/imagenes/bonsai_karla.png"
}</script>
    <meta property="og:title" content="Inicio">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
</head>

<body class="u-body">
    
    <?php
    require_once URL_PLANTILLA."menuCliente.php";
    ?>
    <div class="contenedor-tarjeta-empresa">
        <div class="tarjeta-empresa">
            <div class="seccion-icono">
                <img src="<?php echo URL_IMAGENES?>logo.jpg" alt="">
            </div>
            <div class="seccion-datos">
                <div>
                    <img src="<?php echo URL_IMAGENES?>nombre.png" alt="">
                    <span><?php echo "{$administrador->nombre} {$administrador->apellidoPaterno} {$administrador->apellidoMaterno}";?></span>
                </div>
                <div>
                    <img src="<?php echo URL_IMAGENES?>direccion.png" alt="">
                    <span><?php echo $administrador->direccion?></span>
                </div>
                <div>
                    <img src="<?php echo URL_IMAGENES?>telefono.png" alt="">
                    <span><?php echo $administrador->numTelefono?></span>
                </div>
                <div>
                    <img src="<?php echo URL_IMAGENES?>correo.png" alt="">
                    <span><?php echo $administrador->correo?></span>
                </div>
            </div>
        </div>
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