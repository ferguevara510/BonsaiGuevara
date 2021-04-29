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
        $this->id_cliente = 1;
    }

    public function registrarCita() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="INSERT INTO cita (fecha, hora, duracion, descripcion, id_cliente) values (?,?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("ssisi", $this->fecha, $this->hora, $this->duracion, $this->descripcion, $this->id_cliente);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public function editarCita() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="UPDATE cita SET fecha=?, hora=?, duracion=?, descripcion=? WHERE folio=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("ssisi", $this->fecha, $this->hora, $this->duracion, $this->descripcion, $this->folio);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public function eliminarCita() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="DELETE FROM cita WHERE folio=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("i", $this->folio);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }

    public static function buscarCitasDia($fecha) {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $citas = [];
        $sql = "SELECT * FROM cita WHERE CAST(fecha AS DATE)=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("s", $fecha);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                if($result->num_rows > 0) { 
                    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $cita = new Cita();
                        $cita->fecha=$row["fecha"];
                        $cita->hora=$row["hora"];
                        $cita->duracion=$row["duracion"];
                        $cita->descripcion=$row["descripcion"];
                        $cita->id_cliente=$row["id_cliente"];
                        $citas[]=$cita;
                    }   
                }
                $stmt->close();
            }
        }
        $mysqli->close();
        return $citas;
    }

    public static function buscarCitaCliente($id_cliente) {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $cita = null;
        $sql = "SELECT * FROM cita WHERE id_cliente=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("i", $id_cliente);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $cita = new Cita();
                    $cita->fecha=$row["fecha"];
                    $cita->hora=$row["hora"];
                    $cita->duracion=$row["duracion"];
                    $cita->descripcion=$row["descripcion"];
                    $cita->id_cliente=$row["id_cliente"];
                }
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $cita;
    }

    public static function obtenerFechasCitas($citas) {
        foreach($citas as $cita) {
            
        }
    }
}