<?php
    require_once "../../configuracion/env.php";

    session_start();
    unset($_SESSION['Carrito']);

    header('Location: '.URL_VISTAS.'listaBonsaisCliente.php');
?>