<?php
require_once "../../configuracion/env.php";

//Variables de los inputs
$nombreCi = "";
$nombreCo = "";
$precio = "";
$estilos = "";
$edad = "";
$especies = "";
//Variables para verificar errores
$imgERR = "";
$namCiERR = "";
$namCoERR = "";
$prcERR = "";
$edadErr = "";







//pide el metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validar el nombre de usuario
  if (empty(trim($_POST["nombreCi"]))) {
    $namCiERR = "Por favor ingrese un nombre cientifico para el Bonsai.";
  } else {
    // Busca el nombre del bonsai en la base de datos
    $sql = "SELECT * FROM bonsai WHERE nombreCientifico = ?";

    if ($stmt = $mysqli->prepare($sql)) {

      $stmt->bind_param("s", $param_name);


      $param_name = trim($_POST["nombreCi"]);

      if ($stmt->execute()) {

        $stmt->store_result();

        if ($stmt->num_rows == 1) {
          $namCiERR = "Ya Existe este Bonsai.";
        } else {
          $nombreCi = trim($_POST["nombreCi"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      $stmt->close();
    }
  }




  // Validar el nombre de usuario
  if (empty(trim($_POST["nombreCo"]))) {
    $namCoERR = "Por favor ingrese un nombre comun para el Bonsai.";
  } else {
    // Busca el nombre del bonsai en la base de datos
    $sql = "SELECT * FROM bonsai WHERE nombreComun = ?";

    if ($stmt = $mysqli->prepare($sql)) {

      $stmt->bind_param("s", $param_name);


      $param_name = trim($_POST["nombreCo"]);

      if ($stmt->execute()) {

        $stmt->store_result();

        if ($stmt->num_rows == 1) {
          $namCoERR = "Ya Existe este Bonsai.";
        } else {
          $nombreCo = trim($_POST["nombreCo"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      $stmt->close();
    }
  }











  $estilos = $_POST["estilos"];
  $especies = $_POST["especie"];
  $edad = $_POST["edad"];
  $precio = $_POST['precio'];



  // Validacion de los campos
  if (empty($namCiERR && $namCoERR)) {

    // If upload button is clicked ...
    if (isset($_POST['upload'])) {

      $filename = $_FILES["uploadfile"]["name"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];
      $folder = "../../publico/bonsais/" . $filename;


      //Preparamos el statement para el SQL
      $sql = "INSERT INTO bonsai (id_bonsai,imagenBonsai,id_especie,estilo,nombreCientifico,nombreComun
,edad,precio) values (Null,?,?,?,?,?,?,?)";
      // Modificar 
      if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
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

          // Redirigir a la lista de bonsais
          header("location: ../../app/vista/listaBonsais.php");
        } else {
          echo "Algo Malo paso ,por favor intente de nuevo!!.";
        }

        // Close statement
        $stmt->close();
        move_uploaded_file($tempname, $folder);
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




<body class="u-body">

  <!--NavBar-->
  <?php
    include "../../app/vista/plantilla/menuAdmin.php";
  ?>
  <!--Fin deNavBar-->


  <!--Registro-->



  <div class="registro">
    <form style="position:relative" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <!-- Div de imagen-->
      <div class="image-upload">
        <p style="text-align:Center;">
          <label for="file-input">
            <img src="../../publico/imagenes/upload.gif" width='200' height='200' class="inputImage" />
          </label>

          <input type="file" name="uploadfile" oninput='validity.valid' id="file-input" single accept="image/png, .jpeg, .jpg , .gif,.bmp">
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
        <input name="nombreCi" type="text">
        <!--Error de nombre cientifico-->
        <span class='help-block inputFont'><?php echo $namCiERR; ?></span>
        <br>

        <label class="inputFont" for="nombre">Nombre Comun del bonsái</label>
        <br>
        <input name="nombreCo" type="text">
        <!--Error de nombre comun-->
        <span class='help-block inputFont'><?php echo $namCoERR; ?></span>
        <br>

        <label class="inputFont" for="estilos">Estilos</label>
        <br>
        <select name="estilos">
          <option value="1">FUKINAGASHI - FUSTIGADO PELO VENTO</option>
          <option value="2">KENGAI - CASCADA</option>
          <option value="3">HAN KENGAI - SEMI CASCADA</option>
          <option value="4">MOYOGI - INFORMAL DIREITO</option>
          <option value="5">SHAKAN - INCLINADO</option>
          <option value="6">CHOKKAN - FORMAL DIREITO</option>
          <option value="7">HOKIDACHI - ESTILO VASSQURA</option>
          <option value="8">YOSE-UE - BOSQUE</option>
        </select>
        <br>

        <label class="inputFont" for="especie">Especie</label>
        <br>
        <select name="especie">
          <option value="1">CONIFERA</option>
          <option value="2">FICOS RETUSA</option>
          <option value="3">FICOS NERIFOLIA</option>
          <option value="4">FICOS VARIEGADO</option>
          <option value="5">CAPALES</option>
          <option value="6">BUGAMBILIA ESPECTABILIS</option>
          <option value="7">JUNIPEROS PROCUMBENS</option>
          <option value="8">GINGO BILOBA</option>
          <option value="9">PINO PINEA</option>
          <option value="10">ABIES RELIGIOSA</option>
          <option value="11">ABIES ALBA</option>
          <option value="12">PIRACANTA ANGUSTITULIA AMARILLA</option>
          <option value="13">PIRACANTA ANGUSTITULIA ROJA</option>
          <option value="14">ACACIA PENATULA</option>
          <option value="15">ACER PALMATUM</option>
          <option value="16">JACARANDA MIMOSIDOLIA</option>
          <option value="17">CRIJOTOMENA JAPONICA</option>
          <option value="18">CEIBA PENTANDRA</option>
          <option value="19">RODADEN DRUM INDICUM</option>
          <option value="20">CEDRELLA O DORATA</option>
        </select>
        <br>

        <label class="inputFont" for="precio">Precio</label>
        <br>
        <input type="number" name="precio" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" required="required">
        <span class='help-block inputFont'><?php echo $prcERR; ?></span>
        <br>

        <label class="inputFont" for="cantidad">Edad</label>
        <br>
        <input type="number" name="edad" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" required="required">
        <span class='help-block inputFont'><?php echo $edadErr; ?></span>
        <br>
        <button class="registrar" type="submit" name="upload">Registrar</button>
        <button class="limpiar" type="reset">Limpiar </button>
      </p>

  </div>

  <br>
  <!--Fin Registro-->






</body>


</html>