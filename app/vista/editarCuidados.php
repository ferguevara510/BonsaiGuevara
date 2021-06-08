<?php
require_once "../../configuracion/env.php";
require_once "../modelo/especie.php";
require_once "../modelo/cuidado.php";
session_start();

if(isset($_GET["id_cuidado"])){
    $especies= Especie::buscarEspecies();
    $cuidado= Cuidado::buscarCuidado($_GET["id_cuidado"]); 
}
?>


<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Editar Cuidados</title>
    <link rel="stylesheet" href="<?php echo URL_CSS?>registrarCliente.css" media="screen">
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
    <script type="text/javascript" src="<?php echo URL_JS?>cliente.js"></script>

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
    include "../../app/vista/plantilla/menuAdmin.php";
    ?>

    <div>
        <section class="u-clearfix u-section-1" id="sec-0b39">
            <div class="u-clearfix u-sheet u-sheet-1">
                <h1 class="u-text u-text-default u-text-1">Editar Cuidados</h1>
                <div class="u-form u-form-1">
                    <form action="<?php echo URL_CONTROLADORES?>editarCuidados.php" method="post" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form"
                        style="padding: 10px" source="custom" name="form" enctype="multipart/form-data">
                        <input type="hidden" name="id_cuidado" value="<?php echo "{$cuidado->id_cuidado}"; ?>" >
                        
                        <div class="u-form-group u-form-group-2">
                            <label for="name-dc48" class="u-form-control-hidden u-label">Cantidad de Riego</label>
                            <input type="text" value="<?php echo "{$cuidado->cantidadRiego}"; ?>" placeholder="Cantidad de riego" id="cantidadriego" name="cantidadriego"
                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">  
                        </div>
                        <div class="u-form-group u-form-name u-form-group-3">
                            <label for="name-8ced" class="u-form-control-hidden u-label">Lugar</label>
                            <input type="text" value="<?php echo "{$cuidado->lugar}";?>"  placeholder="Lugar" id="lugar" name="lugar"
                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                        </div>
                        <div class="u-form-group u-form-name u-form-group-4">
                            <label for="name-998d" class="u-form-control-hidden u-label">Maceta</label>
                            <input type="text" value="<?php echo "{$cuidado->maceta}";?>" placeholder="Maceta" id="maceta" name="maceta"
                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                        </div>
                        <div class="u-form-group u-form-group-5">
                            <label for="text-5cce" class="u-form-control-hidden u-label">Tiempo de Transplante</label>
                            <input type="text" value="<?php echo "{$cuidado->tiempoTransplante}";?>" placeholder="Tiempo de transplante" id="tiempotransplante" name="tiempotransplante"
                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                        </div>
                        <div class="u-form-email u-form-group">
                            <label for="email-dc48" class="u-form-control-hidden u-label">Tipo de Cultivo</label>
                            <input type="text" value="<?php echo "{$cuidado->tipoCultivo}";?>" placeholder="Tipo de Cultivo" id="tipocultivo" name="tipocultivo"
                                class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                        </div>
                        <div class="u-form-email u-form-group">
                        <label for="email-dc48" class="u-form-control-hidden u-label">Estilo</label>

                        <select class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" name="estilo" required="">
                                    <option> Selecciona el Estilo </option>
                                    <option value="1" <?php echo ($cuidado->estilo == 1) ? "selected": "";?> >FUKINAGASHI - FUSTIGADO PELO VENTO</option>
                                    <option value="2" <?php echo ($cuidado->estilo == 2) ? "selected": "";?>>KENGAI - CASCADA</option>
                                    <option value="3" <?php echo ($cuidado->estilo == 3) ? "selected": "";?>>HAN KENGAI - SEMI CASCADA</option>
                                    <option value="4" <?php echo ($cuidado->estilo == 4) ? "selected": "";?>>MOYOGI - INFORMAL DIREITO</option>
                                    <option value="5" <?php echo ($cuidado->estilo == 5) ? "selected": "";?>>SHAKAN - INCLINADO</option>
                                    <option value="6" <?php echo ($cuidado->estilo == 6) ? "selected": "";?>>CHOKKAN - FORMAL DIREITO</option>
                                    <option value="7" <?php echo ($cuidado->estilo == 7) ? "selected": "";?>>HOKIDACHI - ESTILO VASSQURA</option>
                                    <option value="8" <?php echo ($cuidado->estilo == 8) ? "selected": "";?>>YOSE-UE - BOSQUE</option>
                         </select>
                        </div>

                        <div class="u-form-email u-form-group">
                        <label for="email-dc48" class="u-form-control-hidden u-label">Especie</label>
                        <select  class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"name= "especie" required="">
                        <option> Selecciona la Especie </option>
                        <?php $i =0; foreach ($especies as $especie){ ?>
                        <option value="<?php echo $especie->id_especie ?>" <?php echo ($especie->id_especie == $cuidado->id_especie->id_especie) ? "selected": "";?>> <?php echo $especie->nombreEspecie; ?> </option>
                        <?php
                        $i= $i+1;
                        } ?> 
                        </select>
                        </div> 


                       
                        

                        <div class="u-align-right u-form-group u-form-submit">
                        <a href="<?php echo URL_CONTROLADORES?>registrarCuidados.php" class="boton-verde u-btn u-btn-submit u-button-style u-btn-1">ACEPTAR<br>
                        </a>
                        
                        
                        <input type="submit" value="submit" class="u-form-control-hidden">
                        </div>
                        <a class="u-btn-2"></a>
                        <a href="<?php echo URL_VISTAS?>consultarCuidados.php" class="boton-verde u-btn u-btn-1">CANCELAR</a>
                        <div class="u-form-send-message u-form-send-success"> Los cuidados han sido registrados. </div>
                        
                        <div class="u-form-send-error u-form-send-message"> Ha ocurrido un error al guardar los cuidados en la base de datos,intentelo mas tarde. </div>
                        
                        <input type="hidden" value="" name="recaptchaResponse">

                        
                        
                    </form>
        </section>
        
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