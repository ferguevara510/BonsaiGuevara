<?php
class Venta {
    public $folio;
    public $id_carrito;
    public $id_direccion;
    public $id_pago;
    public $estado;

    public function __construct() {
        $this->folio = 0;
        $this->id_carrito = 0;
        $this->id_direccion = 0;
        $this->id_pago = 0;
        $this->estado = '';
    }

    public function registrar() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="INSERT INTO venta (id_carrito, id_direccion, id_pago, estado) values (?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if($stmt){
            $stmt->bind_param("iiis", $this->id_carrito, $this->id_direccion, $this->id_pago, $this->estado);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }


    public function editarDireccion() {
        $validacion = false;
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql="UPDATE venta SET estado=? WHERE folio=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("si", $this->estado, $this->folio);
            if($stmt->execute()) {
                $validacion = true;
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $validacion;
    }
}