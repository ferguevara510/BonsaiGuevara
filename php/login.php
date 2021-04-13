<?php
    session_start();
    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $resultado = $conn->prepare('SELECT * FROM usuario WHERE e_mail=:email');
        $resultado->bindParam(':email', $_POST['email']);
        $resultado->execute();

        $registros = $resultado->fetch(PDO::FETCH_ASSOC);

        $message = '';
        $location = '';

        if(!empty($registros) && count($registros) > 0){
            //password_verify(): Metodo para poder comparar contraseñas con encriptación hash.
            if($_POST['pass'] == $registros['password']){
                $_SESSION['user_email'] = $registros['e_mail'];
                header('Location: ../index.php');
            } else{
                $message = 'Error: contraseña incorrecta';
                $location = '../login.html';
                alerta($message, $location);
            }
        } else {
            $message = 'Usuario inexistente';
            $location = '../login.html';
            alerta($message, $location);
        }
    }

    function alerta($mensaje, $direccion){
        echo "<script type='text/javascript'>
        alert('".$mensaje."');
        window.location.href='".$direccion."';
        </script>";
    }
?>