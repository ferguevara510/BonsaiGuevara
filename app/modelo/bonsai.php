<?php
class Bonsai {
    public $id_bonsai;
    public $imagenBonsai;
    public $id_especie;
    public $estilo;
    public $nombreCientifico;
    public $nombreComun;
    public $edad;
    public $precio;
    
    public function __construct() {
        $this->id_bonsai = 0;
        $this->imagenBonsai ='';
        $this->id_especie = 0;
        $this->estilo = 0;
        $this->nombreCientifico = '';
        $this->nombreComun = '';
        $this->edad = '';
        $this->precio = 0.0;
    }
}