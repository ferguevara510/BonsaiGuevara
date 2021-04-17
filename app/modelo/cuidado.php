<?php
class Cuidado {
    public $id_cuidado;
    public $id_especie;
    public $estilo;
    public $cantidadRiego;
    public $lugar;
    public $maceta;
    public $tiempoTransplante;
    public $tipoCultivo;

    public function __constructor() {
        $this->id_cuidado = 0;
        $this->id_especie = 0;
        $this->estilo = 0;
        $this->cantidadRiego = '';
        $this->lugar = '';
        $this->maceta = '';
        $this->tiempoTrasplante = '';
        $this->tipoCultivo = '';
    }
}