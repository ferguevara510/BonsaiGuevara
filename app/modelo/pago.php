<?php
class Pago {
    public $id_pago;
    public $fecha;
    public $monto;
    public $tipo;

    public function __construct() {
        $this->id_pago = 0;
        $this->fecha = '';
        $this->monto = 0.00;
        $this->tipo = '';
    }

    public function registrar() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="INSERT INTO pago (id_pago, fecha, monto, tipo) values (?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("isis", $this->id_pago, $this->fecha, $this->monto, $this->tipo);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }
}