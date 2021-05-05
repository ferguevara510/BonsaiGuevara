<?php
    require_once "../../configuracion/env.php";

    session_start();
    session_unset();
    session_destroy();

    header('Location: '.URL_VISTAS.'login.php');
?>