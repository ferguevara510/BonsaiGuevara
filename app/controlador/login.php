<?php
    session_start();
    require_once "../../configuracion/env.php";
    require '../../configuracion/database.php';

    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $resultado = $conn->prepare('SELECT * FROM cliente WHERE correo=:email');
        $resultado->bindParam(':email', $_POST['email']);
        $resultado->execute();

        $registros = $resultado->fetch(PDO::FETCH_ASSOC);

        $message = '';
        $location = '';

        if(!empty($registros) && count($registros) > 0){
            //password_verify(): Metodo para poder comparar contraseñas con encriptación hash.
            if(md5($_POST['pass']) == $registros['contrasena']){
                $_SESSION['user_email'] = $registros['correo'];
                $_SESSION['id_cliente'] = $registros['id_cliente'];
                header('Location: '.'../../index.php');
            } else{
                $message = 'Error: contraseña incorrecta';
                $location = URL_VISTAS.'login.php';
                alerta($message, $location);
            }
        } else {
            $message = 'Cliente inexistente';
            $location = URL_VISTAS.'login.php';
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