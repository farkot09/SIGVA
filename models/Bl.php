<?php
require_once 'config/config.php';
require_once 'Contenedor.php'; //

class Bl
{
    private $conn;
    private $table_name = "bls";
    private $ClassContenedor;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->ClassContenedor = new Contenedor();
    }
    //get bls by contenedor_id
    function getBlsByContenedorId($contenedor_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE contenedor_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $contenedor_id);
        $stmt->execute();
        return $stmt;
    }
    //crear bl
    function create($contenedor_id, $numero_bl, $importador, $cantidad, $peso)
    {
        $query = "INSERT INTO " . $this->table_name . " SET contenedor_id =?, numero_bl =?, importador =?, cantidad =?, peso =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $contenedor_id);
        $stmt->bindParam(2, $numero_bl);
        $stmt->bindParam(3, $importador);
        $stmt->bindParam(4, $cantidad);
        $stmt->bindParam(5, $peso);
        if ($stmt->execute()) {
            $cantidad_bls = $this->ClassContenedor->getContenedorById($contenedor_id)['cantidad_bls'];
            $bls_registrados = $this->getBlsByContenedorId($contenedor_id)->rowCount();
            //Si la cantidad de bls registrados es igual a la cantidad de bls que se pueden registrar, se cambia el estado del contenedor a 1 (completo)
            //esto es para que no se pueda registrar mas bls en el contenedor
            if ($bls_registrados == $cantidad_bls) {
                $query = "UPDATE contenedores SET estado = 1 WHERE contenedor_id = ?";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $contenedor_id);
                $stmt->execute();
            }
            return true;
        } else {
            return false;
        }
    }
    //get all bls
    function getAllBls()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //get bl by id
    function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE bl_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //delete bl
    function eliminar($id)
    {
        $contenedor_id = $this->getById($id)['contenedor_id'];
        $query = "DELETE FROM " . $this->table_name . " WHERE bl_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            //si se elimina el bl, se cambia el estado del contenedor a 0 (disponible) si la cantidad de bls registrados es menor a la cantidad de bls que se pueden registrar
            $query = "UPDATE contenedores SET estado = 0 WHERE contenedor_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $contenedor_id);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }
}