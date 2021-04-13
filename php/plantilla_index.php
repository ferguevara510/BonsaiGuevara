<?php
    session_start();
    require 'database.php';

    if(isset($_SESSION['user_email'])){
        $resultado = $conn->prepare('SELECT * FROM usuario WHERE e_mail=:email');
        $resultado->bindParam(':email', $_SESSION['user_email']);
        $resultado->execute();

        $registros = $resultado->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if(count($registros) > 0){
            $user = $registros;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to your app</title>
</head>
<body>
    <?php if(!empty($user)): ?>
        <br>Welcome. <?= $user['e_mail'] ?>
        <br>Inicio de Sesión Correcto
        <a href="logout.php">Salir</a>
    <?php else: ?>
    <h1>Please Login or Signup</h1>

    <a href="../login.html">Login</a> or
    <a href="../registrarse.html">Sigunp</a>
    <?php endif ?>
</body>
</html>