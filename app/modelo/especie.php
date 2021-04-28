<?php
require_once "../../configuracion/env.php";

class Especie {
    public $id_especie;
    public $nombreEspecie;

    public function __construct() {
        $this->id_especie = 0;
        $this->nombreEspecie = '';
    }

    public static function buscarEspecies(){
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $especies = [];
        $sql = "SELECT * FROM especie";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){ 
                while($row = $result->fetch_array()){
                    $especie = new Especie();
                    $especie->id_especie=$row["idespecie"];
                    $especie->nombreEspecie=$row["nombreespecie"];
                    $especies[]=$especie;
                }   
            }
            $result->close();
        }
        $mysqli->close();
        return $especies;
    }
}







?>
