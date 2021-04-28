<?php
class Pago {
    public $id_pago;
    public $fecha;
    public $monto;

    public function __construct() {
        $this->id_pago = 0;
        $this->fecha = 00-00-0000;
        $this->monto = 0.00;
    }
}