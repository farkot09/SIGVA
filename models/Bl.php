<?php
require_once 'config/config.php';

class Bl
{
    private $conn;
    private $table_name = "bls";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    //get bls by contenedor_id
    function getBlsByContenedorId($contenedor_id){
        $query = "SELECT * FROM ". $this->table_name. " WHERE contenedor_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $contenedor_id);
        $stmt->execute();
        return $stmt;
    }
    //crear bl
    function create($contenedor_id, $numero_bl, $importador, $cantidad, $peso){
        $query = "INSERT INTO ". $this->table_name. " SET contenedor_id =?, numero_bl =?, importador =?, cantidad =?, peso =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $contenedor_id);
        $stmt->bindParam(2, $numero_bl);
        $stmt->bindParam(3, $importador);
        $stmt->bindParam(4, $cantidad);
        $stmt->bindParam(5, $peso);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    //get all bls
    function getAllBls(){
        $query = "SELECT * FROM ". $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //get bl by id
    function getById($id){
        $query = "SELECT * FROM ". $this->table_name. " WHERE id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}