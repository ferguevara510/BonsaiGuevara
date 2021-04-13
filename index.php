<?php
session_start();
require 'php/database.php';

if (isset($_SESSION['user_email'])) {
  $resultado = $conn->prepare('SELECT * FROM usuario WHERE e_mail=:email');
  $resultado->bindParam(':email', $_SESSION['user_email']);
  $resultado->execute();

  $registros = $resultado->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($registros) > 0) {
    $user = $registros;
  }
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
  <title>Inicio</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="css/Iniciar-Sesión.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>

  <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.js"></script>
  <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "",
      "url": "index.html",
      "logo": "images/bonsai_karla.png"
    }
  </script>
  <meta property="og:title" content="Inicio">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">
  <link rel="canonical" href="index.html">
  <meta property="og:url" content="index.html">
</head>

<body data-home-page="Iniciar-Sesión.html" data-home-page-title="Iniciar Sesión" class="u-body">
  <header class="u-clearfix u-header u-header" id="sec-e89e">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a href="index.html" class="u-image u-logo u-image-1" data-image-width="299" data-image-height="266">
        <img src="images/bonsai_karla.png" class="u-logo-image u-logo-image-1" data-image-width="64">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg>
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
            </svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                  <rect y="1" width="16" height="2"></rect>
                  <rect y="7" width="16" height="2"></rect>
                  <rect y="13" width="16" height="2"></rect>
                </symbol>
              </defs>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="registrarBonsai.php" style="padding: 10px 20px;">Registrar Bonsais</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="listaBonsais.php" style="padding: 10px 20px;">Ver Bonsais</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cuidados</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Dudas</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Citas</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Empresa</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cliente</a></li>
            <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Iniciar Sesión</a></li>

          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Pedidos</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Compras</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cuidados</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Dudas</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Citas</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Empresa</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cliente</a></li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Iniciar Sesión</a></li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>

  <!--Apartado de Creacion solo si el usuario a ingresado al sistema-->
  <?php if (!empty($user)) : ?>
    <br>Welcome <?= $user['e_mail'] ?>
    <br>Inicio de Sesión Correcto
    <a href="php/logout.php">Salir</a>
    <!--Fin 1er php-->
    
    <section class="-lg -sm -xl -xs u-align-center u-clearfix u-white u-section-1" src="" id="carousel_8155">
      <img class="u-expanded-width u-image u-preserve-proportions u-image-1" src="images/logo.jpg" data-image-width="1366" data-image-height="768" data-animation-name="rotateIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
      <div class="u-clearfix u-gutter-32 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-align-center u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-container-style u-layout-cell u-left-cell u-size-20 u-white u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <img class="u-expanded-width u-image u-image-2" src="images/WhatsAppImage2020-10-26at16.29.53.jpeg" data-image-width="810" data-image-height="1440">
                <h4 class="u-text u-text-custom-color-2 u-text-1">Pino</h4>
              </div>
            </div>
            <div class="u-align-center u-container-style u-layout-cell u-size-20 u-white u-layout-cell-2">
              <div class="u-container-layout u-valign-bottom u-container-layout-2">
                <img class="u-expanded-width u-image u-image-3" src="images/17504330_1848514905387954_3742187222423034704_o.jpg" data-image-width="721" data-image-height="1280">
                <h4 class="u-text u-text-custom-color-2 u-text-2">Bugambilia<br>
                </h4>
              </div>
            </div>
            <div class="u-align-center u-container-style u-layout-cell u-right-cell u-size-20 u-white u-layout-cell-3">
              <div class="u-container-layout u-valign-top u-container-layout-3">
                <img class="u-expanded-width u-image u-image-4" src="images/WhatsAppImage2020-10-26at16.32.03.jpeg" data-image-width="1440" data-image-height="810">
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
  <?php else : ?>
    <h1>Please Login or Signup</h1>
    <a href="login.html">Iniciar Sesión</a> or
    <a href="registrarse.html">Registrarse</a>
  <?php endif ?>
</body>

</html>