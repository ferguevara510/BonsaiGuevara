<?php
require_once "../../configuracion/env.php";
require_once "../../app/modelo/estilo.php";
include URL_CONTROLADORES."carrito.php";
?>

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

    <script language="JavaScript" type="text/javascript">
function confirmationDelete(anchor)
{
   var conf = confirm('Estas Seguro que quieres borrar este Bonsai?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>

<script language="JavaScript" type="text/javascript">
function confirmationEdit(anchor)
{
   var conf = confirm('Estas Seguro que quieres Editar este Bonsai?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>




    <meta property="og:title" content="Inicio">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
    <style>
<?php include '../../publico/css/listaBonsais.css'; ?>
</style>


</head>
<body data-home-page="Iniciar-Sesión.html" data-home-page-title="Iniciar Sesión" class="u-body">
<!--Nav Bar-->
<header style ="background-color: #ffffff;"  class="u-clearfix u-header u-header" id="sec-e89e">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        
          <img src="../../publico/imagenes/bonsai_karla.png" class="u-logo-image u-logo-image-1" data-image-width="64">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Pedidos</a></li>
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Compras</a></li>
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cuidados</a></li>
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Dudas</a></li>
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Citas</a></li>
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Empresa</a></li>
              <li class="u-nav-item navFont"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Iniciar Sesión</a></li>
              <li class="u-nav-item navFont">
                <a 
                  class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" 
                  href="mostrar_carrito.php" 
                  style="padding: 10px 20px;">
                  Carrito (<?php echo (empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']);?>)
                </a>
              </li>

            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-sidenav-overflow">
                <div class="u-menu-close" ></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Pedidos</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Compras</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cuidados</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Dudas</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Citas</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Empresa</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cliente</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Iniciar Sesión</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Carrito</a></li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
      </header>
<!--Fin del NavBar-->

<!--Mensaje para corroborar funcionamiento y boton de limpiar-->
<br>
<?php if($mensaje != "") {?>
<div class="alert alert-success">
    <?php print_r($mensaje);?>
    <a href="<?php echo URL_CONTROLADORES?>limpiar_carrito.php" class="badge badge-success">Limpiar Carrito</a>
</div>
<?php }?>
      
      <div class='contenedor'> <!--container-->
<?php

$sql = "SELECT * FROM bonsai";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){ 
      while($row = $result->fetch_array()){
        //Obtener la especie del los bonsais
        $especieaux=$row['id_especie'];

        $consulta = "SELECT nombreEspecie FROM especie where id_especie = $especieaux";
        $result2=$mysqli2->query($consulta);
        $especie=$result2->fetch_array();
        $estilo = new Estilo();
       
        

                                //Agregar opciones para editar y eliminar

//Fuera del table                      
                                    //Iconos para editar y borrar
                                    


          echo "<div class='bonsaiInformation'>;";
          echo "<img src='".$row['imagenBonsai']."' alt='Not Found' onerror=this.src='../../publico/bonsais/Error.png' width='200' height='120' class='imagenB'>";
          echo"<div class='bonsaiSegment' >";
          echo"<label class='nameFont quantity' for=''>".$row['nombreCientifico']."</label>" ;
          
          echo"<label class='nameFont' for=''>".$row['nombreComun']."</label>" ;

          echo"<div>" ;
          
          echo"<label class='nameFont quantity' for=''> ESPECIE: ".$especie['nombreEspecie']."</label>" ;
          echo"<label class='nameFont' for=''> ESTILO: ".$estilo->obtenerValores($row['estilo']) ."</label>" ;
        
          echo"</div>";

          echo"<div >" ;
          echo"<label class='quantity infoFont''for=''>"."Edad: ".$row['edad'] ."</label>";
          echo"<label class='infoFont quantity' for=''>"."Precio: ".$row['precio'].".00 $</label>" ;

          echo"<i class='fa fa-trash-o  icons' aria-hidden='true'  
          onclick='javascript:confirmationDelete($(this));return false;' href='../../app/controlador/eliminarBonsais.php?id=".$row['id_bonsai']."'></i>" ;
          echo"<i class='fa fa-pencil icons' aria-hidden='true'></i>" ;
          echo"</div>" ;
          echo
          "<form action='' method='post'>
            <input type='hidden' name='id' id='id' value='".$row['id_bonsai']."'>
            <input type='hidden' name='nombre' id='nombre' value='".$row['nombreComun']."'>
            <input type='hidden' name='precio' id='precio' value='".$row['precio']."'>
            <input type='hidden' name='cantidad' id='cantidad' value='1'>
            <button class='btn btn-primary' name='btnAccion' value='Agregar' type='submit'>Agregar al Carrito</button>
           </form>";


          echo"</div>" ;
          echo"</div>" ;
                                     

         }
         echo "</tbody>";                            
         echo "</table>";
          // Free result set
          $result->free();
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


</div><!--container-->





</body>
</html>