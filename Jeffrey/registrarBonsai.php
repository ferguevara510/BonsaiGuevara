<?php
require_once "configDB.php";

//Variables de los inputs
$nombre="";
$precio="";
$cantidad="";
//Variables para verificar errores
$imgERR="";
$namERR="";
$prcERR="";
$cantERR="";







//pide el metodo post
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validar el nombre de usuario
  if(empty(trim($_POST["nombre"]))){
    $namERR = "Porfavor ingrese un nombre para el Bonsai.";
} else{
    // Busca el nombre del bonsai en la base de datos
    $sql = "SELECT * FROM bonsais WHERE Nombre = ?";
    
    if($stmt = $mysqli->prepare($sql)){
     
        $stmt->bind_param("s", $param_name);
        
  
        $param_name = trim($_POST["nombre"]);
        
        if($stmt->execute()){
            
            $stmt->store_result();
            
            if($stmt->num_rows == 1){
              $namERR = "Ya Existe este Bonsai.";
            } else{
                $nombre = trim($_POST["nombre"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

  }




  

 // If upload button is clicked ...

 
  $cantidad=$_POST["cantidad"];
  $precio=$_POST['precio'];



// Validacion de los campos
if (empty($namERR)){

 
  if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "images/".$filename;
      

//Preparamos el statement para el SQL
$sql="INSERT INTO bonsais (id,ImageURL,Nombre,Price,Quantity) values (Null,?,?,?,?)";

if($stmt = $mysqli->prepare($sql)){
  // Bind variables to the prepared statement as parameters
  $stmt->bind_param("ssii", $param_imgURL, $param_name,$param_precio,$param_cantidad);
  
  // Set parameters
  echo "LLEga aqui?";
 
  $param_imgURL = $folder;
  $param_name = $nombre;
  $param_precio=$precio;
  $param_cantidad=$cantidad;

  // Ejecuta el statement
  if($stmt->execute()){

      // Redirigir a la lista de bonsais
      header("location: listaBonsais.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Bonsais</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bonsais Guevara </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     
      <a class="nav-item nav-link" href="/Proyecto Bonsais/listaBonsais.php">Ver Bonsais</a>
      <a class="nav-item nav-link disabled" href="#">xd</a>
    </div>
  </div>
</nav>
<!--Fin deNavBar-->

<div>


  <input type="file" name="uploadfile" single accept="image/png, .jpeg, .jpg , .gif,.bmp">
  <span class="help-block"><?php echo $imgERR;?></span>
  <br>
  <label for="nombre">Nombre</label>
<input name="nombre" type="text">
<span class="help-block"><?php echo $namERR;?></span>
<br>
<label for="precio">Precio</label>
<input type="number" name="precio" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" 
 required="required">
 <span class="help-block"><?php echo $prcERR;?></span>
<br>
<label for="cantidad">Cantidad</label>
<input type="number" name="cantidad" id="campoEdad" min="0" max="999999" oninput="validity.valid||(value='');" 
 required="required">
 <span class="help-block"><?php echo $cantERR;?></span>
<br>
<input type="submit" name="upload" value="Registrar">
<input type="reset" value="Limpiar">

</div>








</body>
</html>