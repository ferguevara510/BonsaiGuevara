<?php
    class Direccion{
        public $id_direccion;
        public $calle;
        public $numExt;
        public $numInt;
        public $colonia;
        public $codigo_postal;
        public $ciudad;
        public $estado;

        public function __construct() {
            $this->id_direccion = null;
            $this->calle = '';
            $this->numExt = '';
            $this->numInt = '';
            $this->colonia = '';
            $this->codigo_postal = '';
            $this->ciudad = '';
            $this->estado = '';
        }
    
        public function registrar() {
            $validacion = false;
            $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            $sql="INSERT INTO direccion (calle, numExt, numInt, colonia, codigoPostal, ciudad, estado) values (?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($sql);
            if($stmt){
                $stmt->bind_param("sssssss", $this->calle, $this->numExt, $this->numInt, $this->colonia, $this->codigo_postal, $this->ciudad, $this->estado);
                if($stmt->execute()) {
                    $validacion = true;
                }
                $stmt->close();
            } 
            $mysqli->close();
            return $validacion;
        }

        public function getLastIndex() {
            $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            $index = null;
            $sql = "SELECT id_direccion FROM direccion ORDER BY id_direccion DESC LIMIT 1 ";
            $stmt = $mysqli->prepare($sql);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $index = $row['id_direccion'];
                }
            }
            $stmt->close();
            $mysqli->close();
            return $index;
        }

        public static function getDireccion($id_direccion) {
            $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            $direccion = null;
            $sql = "SELECT * FROM direccion WHERE id_direccion=?";
            $stmt = $mysqli->prepare($sql);
            if($stmt) {
                $stmt->bind_param("i", $id_direccion);
                if($stmt->execute()) {
                    $result = $stmt->get_result();
                    if($result->num_rows == 1) {
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $direccion = new Direccion();

                        $direccion->id_direccion = $row["id_direccion"];
                        $direccion->calle = $row["calle"];
                        $direccion->numExt = $row["numExt"];
                        $direccion->numInt = $row["numInt"];
                        $direccion->colonia = $row["colonia"];
                        $direccion->codigo_postal = $row["codigoPostal"];
                        $direccion->ciudad = $row["ciudad"];
                        $direccion->estado = $row["estado"];
                    }
                }
                $stmt->close();
            } 
            $mysqli->close();
            return $direccion;
        }

        public function editarDireccion() {
            $validacion = false;
            $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            $sql="UPDATE direccion SET calle=?, numExt=?, numInt=?, colonia=?, codigoPostal=?, ciudad=?, estado=? WHERE id_direccion=?";
            $stmt = $mysqli->prepare($sql);
            if($stmt) {
                $stmt->bind_param("sssssssi", $this->calle, $this->numExt, $this->numInt, $this->colonia, $this->codigo_postal, $this->ciudad, $this->estado, $this->id_direccion);
                if($stmt->execute()) {
                    $validacion = true;
                }
                $stmt->close();
            } 
            $mysqli->close();
            return $validacion;
        }
    }
?>