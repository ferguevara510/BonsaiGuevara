<?php
class Cliente {
    public $id_cliente;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $correo;
    public $contrasena;
    public $numTelefono;
    public $imagenPerfil;

    public function __constructor() {
        $this->id_cliente = 0;
        $this->nombre = '';
        $this->apellidoPaterno = '';
        $this->apellidoMaterno = '';
        $this->correo = '';
        $this->contrasena = '';
        $this->numTelefono = '';
        $this->imagenPerfil = '';
    }
}