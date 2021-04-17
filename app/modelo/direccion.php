<?php
class Direccion {
    public $id_direccion;
    public $calle;
    public $numExt;
    public $numInt;
    public $colonia;
    public $codigoPostal;
    public $ciudad;
    public $estado;

    public function __constructor() {
        $this->id_direccion = 0;
        $this->calle = '';
        $this->numExt = '';
        $this->numInt = '';
        $this->colonia = '';
        $this->codigoPostal = '';
        $this->ciudad = '';
        $this->estado = '';
    }
}