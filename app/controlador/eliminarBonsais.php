<?php
  require_once "../../configuracion/env.php";
    
// Process delete operation after confirmation
if(isset($_GET["id"]) && !empty($_GET["id"])){
    // Include config file
  
    // Prepare a delete statement
    $sql = "DELETE FROM `bonsai` WHERE `bonsai`.`id_bonsai` = ?";
   
   
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        echo"hola";
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            echo"hola2";
            header("location: ../../app/vista/listaBonsais.php");
            exit();
        } else{
            echo"hola3";
            echo "Oops! algo malo paso,por favor intenta otra vez.";
        }
    }
     
    // Close statement
    $stmt->close();
    
    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>