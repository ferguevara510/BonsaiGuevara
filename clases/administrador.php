<?php
class Administrador {
    public $usuario;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $correo;
    public $direccion;
    public $numTelefono;
    public $contrasena;

    public function __constructor() {
        $this->usuario = '';
        $this->nombre = '';
        $this->apellidoPaterno = '';
        $this->apellidoMaterno = '';
        $this->correo = '';
        $this->direccion = '';
        $this->numTelefono = '';
        $this->contrasena = '';
    }
}