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

}