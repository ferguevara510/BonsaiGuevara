<?php
    class Carrito{
        public $id_carrito;
        public $id_cliente;
        public $id_bonsai;

        public function __construct() {
            $this->id_carrito = '';
            $this->id_cliente = '';
            $this->id_bonsai = '';
        }
    
        public function registrar() {
            $validacion = false;
            $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            $sql="INSERT INTO carritoventa (id_carrito, id_cliente, id_bonsai) values (?,?,?)";
            $stmt = $mysqli->prepare($sql);
            if($stmt){
                $stmt->bind_param("iii", $this->id_carrito, $this->id_cliente, $this->id_bonsai);
                if($stmt->execute()) {
                    $validacion = true;
                }
                $stmt->close();
            } 
            $mysqli->close();
            return $validacion;
        }

        public function toString(){
            return "ID:".$this->id_carrito."|CLIENTE:".$this->id_cliente."|BONSAI:".$this->id_bonsai;
        }
    }
?>