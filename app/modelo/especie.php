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
                    $especie->id_especie=$row["id_especie"];
                    $especie->nombreEspecie=$row["nombreEspecie"];
                    $especies[]=$especie;
                }   
            }
            $result->close();
        }
        $mysqli->close();
        return $especies;
    }
    public static function buscarEspecie($id_especie) {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $especie = null;
        $sql = "SELECT * FROM especie WHERE id_especie=?";
        $stmt = $mysqli->prepare($sql);
        if($stmt) {
            $stmt->bind_param("i", $id_especie);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $especie = new Especie();
                    $especie->id_especie=$row["id_especie"];
                    $especie->nombreEspecie=$row["nombreEspecie"];
                }
            }
            $stmt->close();
        } 
        $mysqli->close();
        return $especie;
    }
}







?>
