<?php
class Cita {
    public $folio;
    public $fecha;
    public $hora;
    public $duracion;
    public $descripcion;
    public $id_cliente;

    public function __construct() {
        $this->folio = 0;
        $this->fecha = "00-00-0000";
        $this->hora = "00:00:00";
        $this->duracion = 0;
        $this->descripcion ='';
        $this->id_cliente = 0;
    }
}