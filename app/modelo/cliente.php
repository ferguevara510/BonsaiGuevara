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

    public function __construct() {
        $this->id_cliente = 0;
        $this->nombre = '';
        $this->apellidoPaterno = '';
        $this->apellidoMaterno = '';
        $this->correo = '';
        $this->contrasena = '';
        $this->numTelefono = '';
        $this->imagenPerfil = 'image.png';
    }

    public function registrarCliente(){
        $this->encriptarContrasena();
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $sql="INSERT INTO cliente (nombre, apellidoMaterno, apellidoPaterno, correo, contrasena, numTelefono, imagenPerfil) values (?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("sssssss", $this->nombre, $this->apellidoMaterno, $this->apellidoPaterno, $this->correo, $this->contrasena, $this->numTelefono,$this->imagenPerfil);
            
            if($stmt->execute()){
                $validacion = true;
            }

            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public function encriptarContrasena(){
        $this->contrasena = md5($this->contrasena);
    }

    public static function buscarTodosClientes(){
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $clientes = [];
        $sql = "SELECT * FROM cliente";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){ 
                while($row = $result->fetch_array()){
                    $cliente = new Cliente();
                    $cliente->nombre=$row["nombre"];
                    $cliente->apellidoPaterno=$row["apellidoPaterno"];
                    $cliente->apellidoMaterno=$row["apellidoMaterno"];
                    $cliente->correo=$row["correo"];
                    $cliente->numTelefono=$row["numTelefono"];
                    $cliente->imagenPerfil=$row["imagenPerfil"];
                    $clientes[]=$cliente;
                }   
            }
            $result->close();
        }
        $mysqli->close();
        return $clientes;
    }
}