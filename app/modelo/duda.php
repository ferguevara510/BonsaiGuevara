<?php
class Duda {
    public $id_duda;
    public $correo;
    public $descripcion;
    public $respuesta;
    public $id_cliente;
    public $nombre;

    public function __construct() {
        $this->id_duda = 0;
        $this->correo = '';
        $this->descripcion = '';
        $this->respuesta = '';
        $this->id_cliente = 0;
        $this->nombre = '';
    }

    public function registrarDuda(){
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $sql="INSERT INTO duda (correo, descripcion, id_cliente) values (?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("ssi", $this->correo, $this->descripcion, $this->id_cliente);
            
            if($stmt->execute()){
                $validacion = true;
            }

            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public function responderDuda() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="UPDATE duda SET respuesta=? WHERE id_duda=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("si", $this->respuesta, $this->id_duda);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public static function buscarDuda(){
        require_once "cliente.php";
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $dudas = [];
        $sql = "SELECT * FROM duda";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){ 
                while($row = $result->fetch_array()){
                    $duda = new Duda();
                    $duda->id_duda=$row["id_duda"];
                    $duda->correo=$row["correo"];
                    $duda->descripcion=$row["descripcion"];
                    $duda->respuesta=$row["respuesta"];
                    $duda->id_cliente=$row["id_cliente"];
                    $cliente = Cliente::buscarCliente($row["id_cliente"]);
                    $duda->nombre="{$cliente->nombre} {$cliente->apellidoPaterno} {$cliente->apellidoMaterno}";
                    $dudas[]=$duda;
                }   
            }
            $result->close();
        }
        $mysqli->close();
        return $dudas;
    }

    public static function buscarDudaID($id_duda) {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $duda = null;
        $sql = "SELECT * FROM duda WHERE id_duda=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("i", $id_duda);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $duda = new Duda();
                    $duda->id_duda=$row["id_duda"];
                    $duda->correo=$row["correo"];
                    $duda->descripcion=$row["descripcion"];
                    $duda->respuesta=$row["respuesta"];
                    $duda->id_cliente=$row["id_cliente"];
                }
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $duda;
    }
}