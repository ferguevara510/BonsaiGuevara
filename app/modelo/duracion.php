<?php
abstract class Duracion {
    const MIN_15 = 1;
    const MIN_30 = 2;
    const MIN_45 = 3;
    const MIN_60 = 4;
    const MIN_75 = 5;
    const MIN_90 = 6;
    const MIN_105 = 7;
    const MIN_120 = 8;

    public static function obtenerValores($minutos) {
        $cadena = '';
        switch ($minutos) {
            case 1:
                $cadena = '15 MIN';
                break;
            case 2:
                $cadena = '30 MIN';
                break;
            case 3:
                $cadena = '45 MIN';
                break;
            case 4:
                $cadena = '60 MIN';
                break;
            case 5:
                $cadena = '75 MIN';
                break;
            case 6:
                $cadena = '90 MIN';
                break;
            case 7:
                $cadena = '105 MIN';
                break;
            case 8:
                $cadena = '120 MIN';
                break;
        }
    }
}