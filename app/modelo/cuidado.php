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
 

    public function __construct() {
        $this->id_cuidado = 0;
        $this->id_especie = '0';
        $this->estilo = '';
        $this->cantidadRiego = '';
        $this->lugar = '';
        $this->maceta = '';
        $this->tiempoTrasplante = '';
        $this->tipoCultivo = '';
    }

    public function registrarCuidado(){
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $sql="INSERT INTO cuidado (id_especie , estilo, cantidadriego, lugar, maceta, tiempotransplante, tipocultivo  ) values (?,?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("iisssss",$this->id_especie, $this->estilo, $this->cantidadRiego, $this->lugar, $this->maceta, $this->tiempoTransplante, $this->tipoCultivo);
            
            if($stmt->execute()){
                $validacion = true;
            }

            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }
    public function editarCuidado(){
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $sql="UPDATE cuidado SET id_especie=?, estilo=?, cantidadRiego=?, lugar=?, maceta=?, tiempoTransplante=?, tipoCultivo=? WHERE id_cuidado=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("iisssssi",$this->id_especie, $this->estilo, $this->cantidadRiego, $this->lugar, $this->maceta, $this->tiempoTransplante, $this->tipoCultivo, $this->id_cuidado);
            
            if($stmt->execute()){
                $validacion = true;
            }

            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public static function buscarCuidados(){
        require_once "especie.php";
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $cuidados= [];
        $sql = "SELECT * FROM cuidado";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){ 
                while($row = $result->fetch_array()){
                    $cuidado = new Cuidado();
                    $cuidado->id_especie= Especie::buscarEspecie($row["id_especie"]);
                    $cuidado->id_cuidado=$row["id_cuidado"];
                    $cuidado->estilo=$row["estilo"];
                    $cuidado->cantidadRiego=$row["cantidadRiego"];
                    $cuidado->lugar=$row["lugar"];
                    $cuidado->maceta=$row["maceta"];
                    $cuidado->tiempoTransplante=$row["tiempoTransplante"];
                    $cuidado->tipoCultivo=$row["tipoCultivo"];
                    $cuidados[]=$cuidado;
                }   
            }
            $result->close();
        }
        $mysqli->close();
        return $cuidados;
    }

    public function eliminarCuidado()
    {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = "DELETE FROM cuidado WHERE id_cuidado=?";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $this->id_cuidado);
            if ($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        }
        $mysqli->close();
        return $validacion;
    }

    public static function buscarCuidado($id_cuidado) {
        require_once "especie.php";
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $cuidado = null;
        $sql = "SELECT * FROM cuidado WHERE id_cuidado=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("i", $id_cuidado);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $cuidado = new Cuidado();
                    $cuidado->id_especie= Especie::buscarEspecie($row["id_especie"]);
                    $cuidado->id_cuidado=$row["id_cuidado"];
                    $cuidado->estilo=$row["estilo"];
                    $cuidado->cantidadRiego=$row["cantidadRiego"];
                    $cuidado->lugar=$row["lugar"];
                    $cuidado->maceta=$row["maceta"];
                    $cuidado->tiempoTransplante=$row["tiempoTransplante"];
                    $cuidado->tipoCultivo=$row["tipoCultivo"];
                }
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $cuidado;
    }


}