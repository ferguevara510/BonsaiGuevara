<?php
  session_start();
  require 'configuracion/database.php';
  include 'templates/menu.php';

    if(isset($_SESSION['usuario'])){
      $resultado = $conn->prepare('SELECT * FROM administrador WHERE usuario=:user');
      $resultado->bindParam(':user', $_SESSION['usuario']);
      $resultado->execute();

      $registros = $resultado->fetch(PDO::FETCH_ASSOC);

      $user = null;
      if (count($registros) > 0) {
        $user = $registros;
      }
  }
?>
<!--Apartado de Creacion solo si el usuario a ingresado al sistema-->
  <?php if ($user['usuario'] != null) { ?>
  <br>Welcome <?php echo $user['usuario']?>
  <br>Inicio de Sesión Correcto
  <!--Inicio IF php-->
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

<?php } else { ?>
  <div class="text-center">
    <h1 style="color: red;">|ERROR|</h1> <h1> Debes de ingresar con tu usuario.</h1>
    <a href="app/vista/login.php">Iniciar Sesión</a> o
    <a href="app/vista/registrarCliente.php">Regístrate</a>
  </div>
<?php } ?>

</body>
</html>  