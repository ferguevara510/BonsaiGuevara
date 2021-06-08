<?php

require_once "../../configuracion/env.php";

//Variables de los inputs
$nombreCi = $nombreCo = $precio = $estilos = $edad = $especies = "";
//Variables para verificar errores
$imgERR = $namCiERR = $namCoERR = $prcERR = $edadErr = "";


if (isset($_POST["id"]) && !empty($_POST["id"])) {
  // Get hidden input value
  $id = $_POST["id"];


  //Validaciones
  // Validar el nombre de usuario
  if (empty(trim($_POST["nombreCi"]))) {
    $namCiERR = "Por favor ingrese un nombre cientifico para el Bonsai.";
  } else {
    $nombreCi = $_POST["nombreCi"];
  }




  // Validar el nombre de usuario
  if (empty(trim($_POST["nombreCo"]))) {
    $namCoERR = "Por favor ingrese un nombre comun para el Bonsai.";
  } else {
    $nombreCo = $_POST["nombreCo"];
  }


  $estilos = $_POST["estilos"];
  $especies = $_POST["especie"];
  $edad = $_POST["edad"];
  $precio = $_POST['precio'];



  // Validacion de los campos
  if (empty($namCiERR || $namCoERR)) {

    // If upload button is clicked ...
    if (isset($_POST['upload'])) {

      $filename = $_FILES["uploadfile"]["name"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];
      $folder = "../../publico/bonsais/" . $filename;

      $uploadFile = false;
      //Preparamos el statement para el SQL
      if (isset($_FILES["uploadfile"]) && file_exists($_FILES['uploadfile']['tmp_name'])){
        $uploadFile = true;
        $sql = "UPDATE bonsai SET  imagenBonsai = ?, id_especie = ?, estilo = ?, nombreCientifico = ?, nombreComun = ?, edad = ?, precio = ? WHERE `bonsai`.`id_bonsai` =  $id";
      }else{
        $sql = "UPDATE bonsai SET  id_especie = ?, estilo = ?, nombreCientifico = ?, nombreComun = ?, edad = ?, precio = ? WHERE `bonsai`.`id_bonsai` =  $id";
      }
      
      // Modificar 
      if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        if($uploadFile){
          $stmt->bind_param(
            "siissii",
            $param_imgURL,
            $param_id_especie,
            $param_estilo,
            $param_nombreCi,
            $param_nombreCo,
            $param_edad,
            $param_precio
          );
        }else{
          $stmt->bind_param(
            "iissii",
            $param_id_especie,
            $param_estilo,
            $param_nombreCi,
            $param_nombreCo,
            $param_edad,
            $param_precio
          );
        }
        

        // Set parameters


        $param_imgURL = $folder;
        $param_id_especie = $especies;
        $param_estilo = $estilos;
        $param_nombreCi = $nombreCi;
        $param_nombreCo = $nombreCo;
        $param_precio = $precio;
        $param_edad = $edad;

        // Ejecuta el statement
        if ($stmt->execute()) {
          move_uploaded_file($tempname, $folder);
          // Redirigir a la lista de bonsais
          header("location: ../../app/vista/listaBonsais.php");

          exit();
        } else {
          echo "Algo Malo paso ,por favor intente de nuevo!!.";
        }

        // Close statement
        $stmt->close();
        
      }
    }
  } //Fin de validaciones

  // Close connection
  $mysqli->close();
} else {

  // Check existence of id parameter before processing further
  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Get URL parameter
    $id =  trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM bonsai WHERE id_bonsai = ?";
    if ($stmt = $mysqli->prepare($sql)) {
      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("i", $param_id);

      // Set parameters
      $param_id = $id;

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
          /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
          $row = $result->fetch_array(MYSQLI_ASSOC);

          // Retrieve individual field value
          $imagen = $row ["imagenBonsai"];
          $nombreCi = $row["nombreCientifico"];
          $nombreCo = $row["nombreComun"];
          $precio = $row["precio"];
          $estilos = $row["estilo"];
          $edad = $row["edad"];
          $especies = $row["id_especie"];
        } else {
          // URL doesn't contain valid id. Redirect to error page
          header("location: error.php");
          exit();
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();
  } else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: ../../app/controlador/error.php");
    exit();
  }
}


?>

<!-----------------------------------------Codigo Html----------------------------------->

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

  <!--NavBar-->
  <?php
    include "../../app/vista/plantilla/menuAdmin.php";
  ?>
  <!--Fin deNavBar-->


  <!--Registro-->



  <div class="registro">
    <form style="position:relative" enctype="multipart/form-data" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
      <!-- Div de imagen-->
      <div class="image-upload">
        <p style="text-align:Center;">
          <label for="file-input">
            <img src="../../publico/imagenes/upload.gif" width='200' height='200' class="inputImage" />
          </label>

          <input type="file" name="uploadfile" oninput='validity.valid' id="file-input" single accept="image/png, .jpeg, .jpg , .gif,.bmp" value= "<?php $imagen?>">
          <!--Si la imagen esta puesta manda el siguiente mensaje-->
          <!--Arreglar esta onda-->
          <?php
          if (empty($_FILES)) {
            echo "<span class='help-block inputFont' >Seleccione una imagen</span>";
          }



          ?>
          <!--Error de imagen-->
          <span class='help-block inputFont'><?php echo $imgERR; ?></span>
        </p>
      </div>
      <!-- Fin de div de imagen-->

      <p style="text-align:Center;">


        <br>

        <label class="inputFont" for="nombre">Nombre Cientifico del bonsái</label>
        <br>
        <input name="nombreCi" type="text" value="<?php echo $nombreCi ?>">
        <!--Error de nombre cientifico-->
        <span class='help-block inputFont'><?php echo $namCiERR; ?></span>
        <br>

        <label class="inputFont" for="nombre">Nombre Comun del bonsái</label>
        <br>
        <input name="nombreCo" type="text" value="<?php echo $nombreCo ?>">
        <!--Error de nombre comun-->
        <span class='help-block inputFont'><?php echo $namCoERR; ?></span>
        <br>

        <label class="inputFont" for="estilos">Estilos</label>
        <br>
        <select name="estilos">
          <option value="1" <?php if ($estilos == '1') echo ' selected="selected"'; ?>>FUKINAGASHI - FUSTIGADO PELO VENTO</option>
          <option value="2" <?php if ($estilos == '2') echo ' selected="selected"'; ?>>KENGAI - CASCADA</option>
          <option value="3" <?php if ($estilos == '3') echo ' selected="selected"'; ?>>HAN KENGAI - SEMI CASCADA</option>
          <option value="4" <?php if ($estilos == '4') echo ' selected="selected"'; ?>>MOYOGI - INFORMAL DIREITO</option>
          <option value="5" <?php if ($estilos == '5') echo ' selected="selected"'; ?>>SHAKAN - INCLINADO</option>
          <option value="6" <?php if ($estilos == '6') echo ' selected="selected"'; ?>>CHOKKAN - FORMAL DIREITO</option>
          <option value="7" <?php if ($estilos == '7') echo ' selected="selected"'; ?>>HOKIDACHI - ESTILO VASSQURA</option>
          <option value="8" <?php if ($estilos == '8') echo ' selected="selected"'; ?>>YOSE-UE - BOSQUE</option>
        </select>
        <br>

        <label class="inputFont" for="especie">Especie</label>
        <br>
        <select name="especie">
          <option value="1" <?php if ($especies == '1') echo ' selected="selected"'; ?>>CONIFERA</option>
          <option value="2" <?php if ($especies == '2') echo ' selected="selected"'; ?>>FICOS RETUSA</option>
          <option value="3" <?php if ($especies == '3') echo ' selected="selected"'; ?>>FICOS NERIFOLIA</option>
          <option value="4" <?php if ($especies == '4') echo ' selected="selected"'; ?>>FICOS VARIEGADO</option>
          <option value="5" <?php if ($especies == '5') echo ' selected="selected"'; ?>>CAPALES</option>
          <option value="6" <?php if ($especies == '6') echo ' selected="selected"'; ?>>BUGAMBILIA ESPECTABILIS</option>
          <option value="7" <?php if ($especies == '7') echo ' selected="selected"'; ?>>JUNIPEROS PROCUMBENS</option>
          <option value="8" <?php if ($especies == '8') echo ' selected="selected"'; ?>>GINGO BILOBA</option>
          <option value="9" <?php if ($especies == '9') echo ' selected="selected"'; ?>>PINO PINEA</option>
          <option value="10" <?php if ($especies == '10') echo ' selected="selected"'; ?>>ABIES RELIGIOSA</option>
          <option value="11" <?php if ($especies == '11') echo ' selected="selected"'; ?>>ABIES ALBA</option>
          <option value="12" <?php if ($especies == '12') echo ' selected="selected"'; ?>>PIRACANTA ANGUSTITULIA AMARILLA</option>
          <option value="13" <?php if ($especies == '13') echo ' selected="selected"'; ?>>PIRACANTA ANGUSTITULIA ROJA</option>
          <option value="14" <?php if ($especies == '14') echo ' selected="selected"'; ?>>ACACIA PENATULA</option>
          <option value="15" <?php if ($especies == '15') echo ' selected="selected"'; ?>>ACER PALMATUM</option>
          <option value="16" <?php if ($especies == '16') echo ' selected="selected"'; ?>>JACARANDA MIMOSIDOLIA</option>
          <option value="17" <?php if ($especies == '17') echo ' selected="selected"'; ?>>CRIJOTOMENA JAPONICA</option>
          <option value="18" <?php if ($especies == '18') echo ' selected="selected"'; ?>>CEIBA PENTANDRA</option>
          <option value="19" <?php if ($especies == '19') echo ' selected="selected"'; ?>>RODADEN DRUM INDICUM</option>
          <option value="20" <?php if ($especies == '20') echo ' selected="selected"'; ?>>CEDRELLA O DORATA</option>
        </select>
        <br>

        <label class="inputFont" for="precio">Precio</label>
        <br>
        <input type="number" name="precio" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" required="required" value="<?php echo $precio ?>">
        <span class='help-block inputFont'><?php echo $prcERR; ?></span>
        <br>

        <label class="inputFont" for="cantidad">Edad</label>
        <br>
        <input type="number" name="edad" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" required="required" value="<?php echo $edad ?>">
        <span class='help-block inputFont'><?php echo $edadErr; ?></span>
        <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button class="registrar" type="submit" name="upload">Actualizar</button>
        <button class="limpiar" type="reset">Limpiar </button>
      </p>

  </div>

  <br>
  <!--Fin Registro-->






</body>


</html>