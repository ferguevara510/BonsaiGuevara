<?php
$index = true;
session_start();
require 'configuracion/database.php';
require_once "configuracion/env.php";

if (isset($_SESSION['user_email'])) {
  $resultado = $conn->prepare('SELECT * FROM cliente WHERE correo=:email');
  $resultado->bindParam(':email', $_SESSION['user_email']);
  $resultado->execute();

  $registros = $resultado->fetch(PDO::FETCH_ASSOC);

  $user = null;
  if (count($registros) > 0) {
    $user = $registros;
  }
}
?>
<!--Apartado de Creacion solo si el usuario a ingresado al sistema-->
<!--Inicio IF php-->

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Blooms, For Every Occasion">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Inicio</title>
  <link rel="stylesheet" href="publico/css/nicepage.css" media="screen">
  <link rel="stylesheet" href="publico/css/Iniciar-Sesión.css" media="screen">
  <link rel="stylesheet" type="text/css" href="publico/css/style.css">
  <link rel="stylesheet" type="text/css" href="publico/css/bootstrap.css">
  <script class="u-script" type="text/javascript" src="publico/js/nicepage.js" defer=""></script>

  <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <script type="text/javascript" src="publico/js/jquery.1.11.1.js"></script>
  <script type="text/javascript" src="publico/js/bootstrap.js"></script>
  <script type="text/javascript" src="publico/js/jquery.isotope.js"></script>
  <script type="text/javascript" src="publico/js/jqBootstrapValidation.js"></script>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "",
      "url": "index.html",
      "logo": "publico/imagenes/bonsai_karla.png"
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
    require_once "app/vista/plantilla/menuAdmin.php";
  }else if(isset($_SESSION["user_email"])){
    require_once "app/vista/plantilla/menuCliente.php";
  }else{
    require_once "app/vista/plantilla/menu.php";
  }
?>

  <section class="-lg -sm -xl -xs u-align-center u-clearfix u-white u-section-1" src="" id="carousel_8155">
    <img class="u-expanded-width u-image u-preserve-proportions u-image-1" src="publico/imagenes/logo.jpg" data-image-width="1366" data-image-height="768" data-animation-name="rotateIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-gutter-32 u-layout-wrap u-layout-wrap-1">
      <div class="u-layout">
        <div class="u-layout-row">
          <div class="u-align-center u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-container-style u-layout-cell u-left-cell u-size-20 u-white u-layout-cell-1">
            <div class="u-container-layout u-container-layout-1">
              <img class="u-expanded-width u-image u-image-2" src="publico/imagenes/pino.jpg" data-image-width="810" data-image-height="1440">
              <h4 class="u-text u-text-custom-color-2 u-text-1">Pino</h4>
            </div>
          </div>
          <div class="u-align-center u-container-style u-layout-cell u-size-20 u-white u-layout-cell-2">
            <div class="u-container-layout u-valign-bottom u-container-layout-2">
              <img class="u-expanded-width u-image u-image-3" src="publico/imagenes/bugambilia.jpg" data-image-width="721" data-image-height="1280">
              <h4 class="u-text u-text-custom-color-2 u-text-2">Bugambilia<br>
              </h4>
            </div>
          </div>
          <div class="u-align-center u-container-style u-layout-cell u-right-cell u-size-20 u-white u-layout-cell-3">
            <div class="u-container-layout u-valign-top u-container-layout-3">
              <img class="u-expanded-width u-image u-image-4" src="publico/imagenes/suculentas.jpg" data-image-width="1440" data-image-height="810">
              <h4 class="u-text u-text-custom-color-2 u-text-3">Suculentas</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="u-clearfix u-section-2" id="sec-64ff">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="1440" data-image-height="810" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
              <div class="u-container-layout u-container-layout-1"></div>
            </div>
            <div class="u-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-2">
              <div class="u-container-layout u-valign-middle u-container-layout-2">
                <h2 class="u-custom-font u-font-raleway u-text u-text-1">Lo que me gusta del bonsai es que tiene un comienzo pero no un final. Una yema hoy es una rama mañana, es como la búsqueda del final del arcoiris.&nbsp;</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-712f">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Universidad Veracruzana&nbsp;<br>Desarrollo de Software
      </p>
    </div>
  </footer>
  <!--Fin de Seccion php-->
</body>

</html>