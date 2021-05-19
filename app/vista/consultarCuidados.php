<?php
require_once "../../configuracion/env.php";
require_once "../modelo/cuidado.php";
require_once "../modelo/estilo.php";
session_start();

$cuidados = Cuidado::buscarCuidados();
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Consultar Cuidados</title>
    <link rel="stylesheet" href="<?php echo URL_CSS?>cuidados.css">
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
  if(isset($_SESSION["usuario"])){
    require_once "plantilla/menuAdmin.php";
  }else if(isset($_SESSION["user_email"])){
    require_once "plantilla/menuCliente.php";
  }else{
    require_once "plantilla/menu.php";
  }
?>
<?php if (isset($_SESSION["usuario"])){?>
    <div class="contenedor-margen alinear-derecha">
        <button type="button" class="boton-cita" id="registrarCuidado"><a href="<?php echo URL_VISTAS ?>registrarCuidado.php">Registrar Cuidado</a></button>
    </div>
<?php }?>
    <h1 class="u-text u-text-default u-text-cuidado .u-title">Lista de cuidados</h1>
    <div class="contenedor-tarjetas">
    <?php foreach ($cuidados as $cuidado){?>
        <div class="tarjeta-cuidado">
            <div class="registro">
                <strong>Especie:</strong>
                <span><?php echo "{$cuidado->id_especie->nombreEspecie}"; ?></span>
            </div>
            <div class="registro">
                <strong>Cantidad de riego:</strong>
                <span><?php echo "{$cuidado->cantidadRiego}";?></span>
            </div>
            <div class="registro">
                <strong>Lugar:</strong>
                <span><?php echo "{$cuidado->lugar}";?></span>
            </div>
            <div class="registro">
                <strong>Maceta:</strong>
                <span><?php echo "{$cuidado->maceta}";?></span>
            </div>
            <div class="registro">
                <strong>Tiempo de transplante:</strong>
                <span><?php echo "{$cuidado->tiempoTransplante}";?></span>
            </div>
            <div class="registro">
                <strong>Tipo de cultivo:</strong>
                <span><?php echo "{$cuidado->tipoCultivo}";?></span>
            </div>
            <div class="registro">
                <strong>Estilo:</strong>
                <span><?php echo Estilo::obtenerValores($cuidado->estilo);?></span>
            </div>
            <div class="boton-editar">
                <a href="../../app/vista/editarCuidados.php?id_cuidado=<?php echo $cuidado->id_cuidado; ?>">
                    <img src="../../publico/imagenes/edit.png" alt="">
                </a>
            </div>
            <div class="boton-eliminar">
                <a href="#">
                    <img src="../../publico/imagenes/delete.png" alt="">
                </a>
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