<?php
require_once 'config/config.php';

class Contenedor
{
    private $conn;
    private $table_name = "contenedores";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllContenedores()
    {
        $query = "
                    SELECT c.*, u.nombre AS usuario_id
                    FROM " . $this->table_name . " c
                    LEFT JOIN usuarios u ON c.usuario_id = u.usuario_id
                ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getContenedorById($id){
        $query = "SELECT * FROM ". $this->table_name. " WHERE contenedor_id =? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function crearContenedor($datos){
        $query = "INSERT INTO ". $this->table_name. " SET usuario_id =?, numero_contenedor =?, tipo_contenedor =?, capacidad =?, cantidad_bls =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $datos['usuario_id']);
        $stmt->bindParam(2, $datos['numero_contenedor']);
        $stmt->bindParam(3, $datos['tipo_contenedor']);
        $stmt->bindParam(4, $datos['capacidad']);
        $stmt->bindParam(5, $datos['cantidad_bls']);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    //switch operacion del contenedor
    public function switchContenedor($datos){
        $query = "UPDATE ". $this->table_name. " SET operacion =? WHERE contenedor_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $datos['operacion']);
        $stmt->bindParam(2, $datos['contenedor_id']);
        if($stmt->execute()){
            return true;
        } else{
            return false;
        }
    }
}
