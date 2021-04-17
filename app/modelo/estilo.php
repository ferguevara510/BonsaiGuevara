<?php
abstract class Estilo {
    const FUKINAGASHI = 1;
    const KENGAI = 2;
    const HAN_KENGAI = 3;
    const MOYOGI = 4;
    const SHAKAN = 5;
    const CHOKKAN = 6;
    const HOKIDACHI = 7;
    const YOSE_UE = 8;

    public static function obtenerValores($estilo) {
        $cadena = '';
        switch ($estilo) {
            case 1:
                $cadena = 'FUKINAGASHI - FUSTIGADO PELO VENTO';
                break;
            case 2:
                $cadena = 'KENGAI - CASCADA';
                break;
            case 3:
                $cadena = 'HAN KENGAI - SEMI CASCADA';
                break;
            case 4:
                $cadena = 'MOYOGI - INFORMAL DIREITO';
                break;
            case 5:
                $cadena = 'SHAKAN - INCLINADO';
                break;
            case 6:
                $cadena = 'CHOKKAN - FORMAL DIREITO';
                break;
            case 7:
                $cadena = 'HOKIDACHI - ESTILO VASSQURA';
                break;
            case 8:
                $cadena = 'YOSE-UE - BOSQUE';
                break;
        }
    }
}