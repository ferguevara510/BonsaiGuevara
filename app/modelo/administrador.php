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

    public function __construct() {
        $this->usuario = '';
        $this->nombre = '';
        $this->apellidoPaterno = '';
        $this->apellidoMaterno = '';
        $this->correo = '';
        $this->direccion = '';
        $this->numTelefono = '';
        $this->contrasena = '';
    }

    public static function consultarEmpresa(){
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $administrador = null;
        $sql = "SELECT * FROM administrador";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){ 
                if($row = $result->fetch_array()){
                    $administrador = new Administrador();
                    $administrador->nombre=$row["nombre"];
                    $administrador->apellidoPaterno=$row["apellidoPaterno"];
                    $administrador->apellidoMaterno=$row["apellidoMaterno"];
                    $administrador->correo=$row["correo"];
                    $administrador->numTelefono=$row["numTelefono"];
                    $administrador->direccion=$row["direccion"];
                }   
            }
            $result->close();
        }
        $mysqli->close();
        return $administrador;
    }
}