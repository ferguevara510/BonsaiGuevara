<?php
require_once "../../configuracion/env.php";
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?php echo URL_CSS?>nicepage.css" media="screen">
    <link rel="stylesheet" href="<?php echo URL_CSS?>Iniciar-Sesión.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_CSS?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo URL_CSS_CALENDARIO?>">
    <link rel="stylesheet" href="<?php echo URL_CSS ?>cita.css" media="screen">


    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script class="u-script" type="text/javascript" src="<?php echo URL_JS?>nicepage.js" defer=""></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jquery.isotope.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="<?php echo URL_JS_CALENDARIO?>"></script>
    <script type="text/javascript" src="<?php echo URL_JS?>calendarioAdmin.js"></script>
    
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

<body data-home-page="Iniciar-Sesión.html" data-home-page-title="Iniciar Sesión" class="u-body">
    
    <?php
        require_once URL_PLANTILLA . "menuAdmin.php";
    ?>
    
    <div id="calendario"></div>

    <div class="modal" tabindex="-1" role="dialog" id="vista">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contenedor">
                        <div id="alerta-editar" class="alert alert-dismissible tag-hidden" role="alert">
                            <h4 class="alert-heading">Notificación</h4>
                            <p class="mensaje"></p>
                        </div>
                        <section class="u-clearfix u-section-1 u-section-cita" id="sec-0b39">
                            <div class="u-clearfix contenedor u-sheet u-sheet-1">
                                <h1 class="u-text u-text-default u-text-1 h1-cita">Cita</h1>
                                <form class="form-cita" action="<?php echo URL_CONTROLADORES ?>editarCita.php" id="form-cita-editar">
                                    <div class="row form-group">
                                        <label for="" class="u-label label-cita col-sm-2">Cliente</label>
                                        <div class="col-sm-10">
                                            <input readonly type="text" id="nombre" name="nombre" class="form-control col-sm-8" required="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="u-label label-cita col-sm-2">Fecha</label>
                                        <div class="col-sm-10">
                                            <input readonly type="date" id="fecha" name="fecha" class="form-control col-sm-8" required="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="u-label label-cita col-sm-2">Hora</label>
                                        <div class="col-sm-10">
                                            <input readonly type="time" min="14:00" max="19:00" id="hora" name="hora" class="form-control col-sm-8" required="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="u-label label-cita col-sm-2">Duracion</label>
                                        <div class="col-sm-10">
                                            <input readonly type="text" class="col-sm-8 form-control" id="duracion" name="duracion" required="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class="u-form-control-hidden u-label">Descripcion</label>
                                        <div class="col-sm-12">
                                            <textarea disabled type="text" placeholder="Descripcion" class="form-control u-border-1 u-border-grey-30 u-input-rectangle u-white col-sm-8" id="descripcion" rows="5" cols="50" name="descripcion" required=""></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="boton-cita" data-dismiss="modal">Salir</button>
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