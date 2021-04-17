<?php
class Venta {
    public $folio;
    public $id_carrito;
    public $id_direccion;
    public $id_pago;

    public function __constructor() {
        $this->folio = 0;
        $this->id_carrito = 0;
        $this->id_direccion = 0;
        $this->id_pago = 0;
    }
}