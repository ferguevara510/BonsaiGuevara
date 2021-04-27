<?php
require_once "../../configuracion/env.php";

//Variables de los inputs
$nombreCi="";
$nombreCo="";
$precio="";
$edad="";
//Variables para verificar errores
$imgERR="";
$namCiERR="";
$namCoERR="";
$prcERR="";
$edadErr="";







//pide el metodo post
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validar el nombre de usuario
  if(empty(trim($_POST["nombre"]))){
    $namCiERR = "Porfavor ingrese un nombre cientifico para el Bonsai.";
} else{
    // Busca el nombre del bonsai en la base de datos
    $sql = "SELECT * FROM bonsai WHERE nombreCientifico = ?";
    
    if($stmt = $mysqli->prepare($sql)){
     
        $stmt->bind_param("s", $param_name);
        
  
        $param_name = trim($_POST["nombreCi"]);
        
        if($stmt->execute()){
            
            $stmt->store_result();
            
            if($stmt->num_rows == 1){
              $namCiERR = "Ya Existe este Bonsai.";
            } else{
                $nombreCi = trim($_POST["nombreCi"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

  }




 // Validar el nombre de usuario
 if(empty(trim($_POST["nombre"]))){
  $namCoERR = "Porfavor ingrese un nombre cientifico para el Bonsai.";
} else{
  // Busca el nombre del bonsai en la base de datos
  $sql = "SELECT * FROM bonsai WHERE nombreComun = ?";
  
  if($stmt = $mysqli->prepare($sql)){
   
      $stmt->bind_param("s", $param_name);
      

      $param_name = trim($_POST["nombreCo"]);
      
      if($stmt->execute()){
          
          $stmt->store_result();
          
          if($stmt->num_rows == 1){
            $namCoERR = "Ya Existe este Bonsai.";
          } else{
              $nombreCo = trim($_POST["nombreCo"]);
          }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      $stmt->close();
  }

}







  

 

 
  $edad=$_POST["edad"];
  $precio=$_POST['precio'];



// Validacion de los campos
if (empty($namERR)){

 // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "../../publico/bonsais/".$filename;
      

//Preparamos el statement para el SQL
$sql="INSERT INTO bonsai (id_bonsai,imagenBonsai,id_especie,estilo,nombreCientifico,nombreComun
,edad,precio) values (Null,?,?,?,?,?,?,?)";
// Modificar 
if($stmt = $mysqli->prepare($sql)){
  // Bind variables to the prepared statement as parameters
  $stmt->bind_param("ssii", $param_imgURL, $param_name,$param_precio,$param_cantidad);
  
  // Set parameters

 
  $param_imgURL = $folder;
  $param_name = $nombre;
  $param_precio=$precio;
  $param_cantidad=$cantidad;

  // Ejecuta el statement
  if($stmt->execute()){

      // Redirigir a la lista de bonsais
      header("location: php/listaBonsais.php");
  } else{
      echo "Algo Malo paso ,por favor intente de nuevo!!.";
  }

  // Close statement
  $stmt->close();
  move_uploaded_file($tempname,$folder);
}

 }

} //Fin de validacion empty

}


?>

<!---------------------------------------- Seccion de HTML------------------------------------------------>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Blooms, For Every Occasion">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../publico/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="../../publico/css/Iniciar-Sesión.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../../publico/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../publico/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
     <!--Bootstrap CSS-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script class="u-script" type="text/javascript" src="../../publico/js/nicepage.js" defer=""></script>

    <style>
<?php include '../../publico/css/registroBonsais.css'; ?>
</style>

    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script type="text/javascript" src="../../publico/js/jquery.1.11.1.js"></script> 
    <script type="text/javascript" src="../../publico/js/bootstrap.js"></script> 
    <script type="text/javascript" src="../../publico/js/jquery.isotope.js"></script> 
    <script type="text/javascript" src="../../publico/js/jqBootstrapValidation.js"></script>
    
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

<!--NavBar-->
<header style ="background-color: #ffffff;"class="u-clearfix u-header u-header" id="sec-e89e">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">

  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="index.html" class="u-image u-logo u-image-1" data-image-width="299" data-image-height="266">
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
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Pedidos</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Compras</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cuidados</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Dudas</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Citas</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Empresa</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cliente</a></li>
              <li class="navFont u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Iniciar Sesión</a></li>

            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <!--Href de todo el navbar-->
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Pedidos</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Compras</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cuidados</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Dudas</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Citas</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Empresa</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Cliente</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Iniciar-Sesión.html" style="padding: 10px 20px;">Iniciar Sesión</a></li>
                   <!--fin del Href de todo el navbar-->
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
      </header>
<!--Fin deNavBar-->


<!--Registro-->



<div class="registro">
<form  style="position:relative" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!-- Div de imagen-->
<div class="image-upload" >
<p style="text-align:Center;">
  <label for="file-input">
    <img src="../../publico/imagenes/upload.gif" width='200' height='200' class="inputImage"/>
  </label>

  <input type="file" name="uploadfile" oninput='validity.valid' id="file-input" single accept="image/png, .jpeg, .jpg , .gif,.bmp">
  <!--Si la imagen esta puesta manda el siguiente mensaje-->
  <!--Arreglar esta onda-->
  <?php 
  if ( empty($_FILES)) {
    echo "<span class='help-block inputFont' >Seleccione una imagen</span>";

  }
  
  
  
  ?>
  <!--Error de imagen-->
  <span class='help-block inputFont'><?php echo $imgERR;?></span>
</p>
  </div> 
  <!-- Fin de div de imagen-->
  
  <p style="text-align:Center;">

  
  <br>

  <label class="inputFont" for="nombre">Nombre Cientifico del bonsái</label>
  <br>
<input name="nombreCi" type="text" >
<!--Error de nombre cientifico-->
<span class='help-block inputFont'><?php echo $namCiERR;?></span>
<br>

<label class="inputFont" for="nombre">Nombre Comun del bonsái</label>
  <br>
<input name="nombreCo" type="text" >
<!--Error de nombre comun-->
<span class='help-block inputFont'><?php echo $namCoERR;?></span>
<br>

<label class="inputFont" for="nombre">Estilos</label>
  <br>
<select>
<option value="value1">FUKINAGASHI - FUSTIGADO PELO VENTO</option>
<option value="value1">KENGAI - CASCADA</option>
<option value="value1">HAN KENGAI - SEMI CASCADA</option>
<option value="value1">MOYOGI - INFORMAL DIREITO</option>
<option value="value1">SHAKAN - INCLINADO</option>
<option value="value1">CHOKKAN - FORMAL DIREITO</option>
<option value="value1">HOKIDACHI - ESTILO VASSQURA</option>
<option value="value1">YOSE-UE - BOSQUE</option>
   </select>
   <br>
<label class="inputFont"for="precio">Precio</label>
<br>
<input type="number" name="precio" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" 
 required="required">
 <span class='help-block inputFont'><?php echo $prcERR;?></span>
<br>

<label class="inputFont" for="cantidad">Edad</label>
<br>
<input type="number" name="edad" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" 
 required="required">
 <span class='help-block inputFont'><?php echo $edadErr;?></span>
<br>
<button class="registrar" type="submit" name="upload" >Registrar</button>
<button class="limpiar" type="reset" >Limpiar </button>
</p>

</div>

<br>
<!--Fin Registro-->






</body>


</html>