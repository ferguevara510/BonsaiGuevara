<?php
    session_start();
    require_once "../../configuracion/env.php";
    require '../../configuracion/database.php';

    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $resultado = $conn->prepare('SELECT * FROM administrador WHERE usuario=:user');
        $resultado->bindParam(':user', $_POST['user']);
        $resultado->execute();

        $registros = $resultado->fetch(PDO::FETCH_ASSOC);

        $message = '';
        $location = '';

        if(!empty($registros) && count($registros) > 0){
            echo $_POST['pass'];
            echo $registros['contrasena'];
            //password_verify(): Metodo para poder comparar contraseñas con encriptación hash.
            if($_POST['pass'] == $registros['contrasena']){
                $_SESSION['usuario'] = $registros['usuario'];
                header('Location: '.'../../index_admin.php');
            } else{
                $message = 'Error: contraseña incorrecta';
                $location = URL_VISTAS.'login_admin.php';
                alerta($message, $location);
            }
        } else {
            $message = 'Usuario inexistente';
            $location = URL_VISTAS.'login_admin.php';
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