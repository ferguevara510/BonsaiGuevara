<?php
require_once "../../configuracion/env.php";
require_once "../modelo/duda.php";
require_once "../modelo/administrador.php";

$dudas = Duda::buscarDuda();
$administrador = Administrador::consultarEmpresa();

session_start();
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Registrar Duda</title>
    <link rel="stylesheet" href="<?php echo URL_CSS ?>consultarCliente.css">
    <link rel="stylesheet" href="<?php echo URL_CSS ?>nicepage.css" media="screen">
    <link rel="stylesheet" href="<?php echo URL_CSS ?>Iniciar-Sesión.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS ?>bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS ?>duda.css">
    <script class="u-script" type="text/javascript" src="<?php echo URL_JS ?>nicepage.js" defer=""></script>

    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="text/javascript" src="<?php echo URL_JS ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS ?>bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS ?>jquery.isotope.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS ?>jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS ?>duda.js"></script>
    

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "url": "index.html",
            "logo": "../../publico/imagenes/bonsai_karla.png"
        }
    </script>
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
    <h1 class="u-text u-text-default u-text-cliente .u-title">Dudas</h1>
    <div id="alerta" class="alert alert-dismissible tag-hidden" role="alert">
        <h4 class="alert-heading">Notificación</h4>
        <p class="mensaje"></p>
    </div>
    <?php if(!isset($_SESSION["usuario"])){?>
    <div class="form-duda">
        <form id="form-duda" method="POST" name="form-duda" action="<?php echo URL_CONTROLADORES ?>registrarDuda.php">
            <div class="row form-group">
                <input type="hidden" name="correo" value="<?php echo $_SESSION['user_email'];?>">
                <label for="enviarDuda" class="u-label col-sm-12">Exprese su duda</label>
                <div class="col-sm-12">
                    <textarea class="form-control" id="enviarDuda" name="enviar" rows="3"></textarea>
                </div>
                <span class="col-sm-12 help-block"></span>
            </div>
            <div class="alinear-izquierda">
                <button type="submit" class="boton-verde" id="boton-guardar">Guardar</button>
            </div>
        </form>
    </div>
    <?php }?>

    <div class="contenedor-tarjetas">
    <?php foreach($dudas as $duda){?>
        <div class="contenedor-duda">
            <div class="contenedor-pregunta">
                <div class="nombre-duda col-sm-6"><?php echo $duda->nombre?></div>
                <div class="correo-duda col-sm-6"><?php echo $duda->correo?></div>
                <div class="pregunta-duda col-sm-12"><?php echo $duda->descripcion?></div>
            </div>
            <?php if($duda->respuesta == null && isset($_SESSION["usuario"])){?>
            <button class="respuesta boton-azul" id-duda="<?php echo $duda->id_duda?>" id="btn-respuesta-<?php echo $duda->id_duda?>">Responder</button>
            <?php }?>
            <div class="contenedor-respuesta">
                <div class="nombre-duda <?php echo $duda->respuesta != null ? "" : "tag-hidden";?>" id="nombre-<?php echo $duda->id_duda?>"><?php echo "{$administrador->nombre} {$administrador->apellidoPaterno} {$administrador->apellidoMaterno}"?></div>
                <div class="respuesta-duda <?php echo $duda->respuesta != null ? "" : "tag-hidden";?>" id="respuesta-<?php echo $duda->id_duda?>"><?php echo $duda->respuesta?></div>
                <form class="tag-hidden form-respuesta" id="form-respuesta-<?php echo $duda->id_duda?>" action="<?php echo URL_CONTROLADORES ?>registrarDuda.php">
                <input type="hidden" name="id_duda" value="<?php echo $duda->id_duda?>">
                    <textarea name="respuesta" id="respuesta" rows="5"></textarea>
                    <button type="submit" class="boton-verde btn-guardar" id-duda="<?php echo $duda->id_duda?>">Guardar</button>
                </form>
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