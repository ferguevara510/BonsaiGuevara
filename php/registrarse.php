<?php 
    require 'database.php';

    $message = '';
    $location = '';

    if (!empty($_POST['email']) && !empty($_POST['pass'] && !empty($_POST['confirm']))) {
        if ($_POST['pass'] == $_POST['confirm']) {
            $sql = "INSERT INTO usuario (e_mail, password) VALUES (:email, :pass)";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':email', $_POST['email']);
            /*Opcion para encriptar contraseña, cambiar pass por encrypt
            $encrypt = password_hash($_POST['pass'], PASSWORD_BCRYPT);*/
            $stm->bindParam(':pass', $_POST['pass']);
    
            if ($stm->execute()) {
                $message = 'Usuario creado correctamente';
                $location = '../login.html';
            } else {
                $message = 'Lo sentimos, ha ocurrido eun error';
                $location = '../registrarse.html';
            }
    
            alerta($message, $location);
        } else {
            $message = 'Error: Las contraseñas no coinciden';
            $location = '../registrarse.html';
            alerta($message, $location);
        }
    } else{
        $message = 'Error: Campos vacíos.';
        $location = '../registrarse.html';
        alerta($message, $location);
    }

    function alerta($mensaje, $direccion){
        echo "<script type='text/javascript'>
        alert('".$mensaje."');
        window.location.href='".$direccion."';
        </script>";
    }
?>