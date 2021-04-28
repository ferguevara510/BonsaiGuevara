<?php
class CarritoVenta {
    public $id_carrito;
    public $id_cliente;
    public $id_bonsai;

    public function __construct() {
        $this->id_carrito = 0;
        $this->id_cliente = 0;
        $this->id_bonsai = 0;
    }
}