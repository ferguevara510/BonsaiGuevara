<?php

require_once "configDB.php";


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

    <style>
<?php include 'css/listaBonsais.css'; ?>
</style>


</head>
<body>
<!--Nav Bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bonsais Guevara </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     
      <a class="nav-item nav-link" href="/Proyecto Bonsais/registrarBonsai.php">Registrar Bonsais</a>
      <a class="nav-item nav-link" href="/Proyecto Bonsais/listaBonsais.php">Ver Bonsais</a>
      <a class="nav-item nav-link disabled" href="#">xd</a>
      </div>
  </div>
</nav>
<!--Fin del NavBar-->
      
      
      <div class='contenedor'> <!--container-->
<?php
$sql = "SELECT * FROM bonsais";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){ 
      while($row = $result->fetch_array()){
       
                                //Agregar opciones para editar y eliminar

//Fuera del table
                                     echo "<img src='".$row['ImageURL']."' alt='Not Found' onerror=this.src='images/Error.png' width='260' height='145' class='imagenB'>";
                                     echo"<div class='bonsaiSegment' >";
                                     echo"<label for=''>".$row['Nombre']."</label>" ;

                                     echo"<div>" ;
                                     //Agregar Descripcion
                                     echo"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae earum neque dicta similique ipsum assumenda fugiat, minima aliquam reprehenderit modi sunt? Quaerat, fuga repellendus animi earum veritatis excepturi eligendi harum?</p>";
                                     echo"</div>";

                                     echo"<div>" ;
                                     echo"<label class='quantity'for=''>"."Cantidad: ".$row['Quantity'] ."</label>";
                                     echo"<label for=''>"."Precio: ".$row['Price']."</label>" ;
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