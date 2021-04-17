<?php
class Duda {
    public $id_duda;
    public $correo;
    public $descripcion;
    public $respuesta;
    public $id_cliente;

    public function __constructor() {
        $this->id_duda = 0;
        $this->correo = '';
        $this->descripcion = '';
        $this->respuesta = '';
        $this->id_cliente = 0;
    }
}