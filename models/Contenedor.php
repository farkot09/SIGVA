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
                    SELECT c.*, u.nombre AS id_usuario
                    FROM " . $this->table_name . " c
                    LEFT JOIN usuarios u ON c.id_usuario = u.id_usuario
                ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getContenedorById($id)
    {
        $query = "SELECT c.*, u.nombre as id_usuario FROM " . $this->table_name . " c JOIN usuarios u ON c.id_usuario = u.id_usuario WHERE contenedor_id =? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function crearContenedor($datos)
    {
        $query = "INSERT INTO " . $this->table_name . " SET id_usuario =?, numero_contenedor =?, tipo_contenedor =?, capacidad =?, cantidad_bls =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $datos['id_usuario']);
        $stmt->bindParam(2, $datos['numero_contenedor']);
        $stmt->bindParam(3, $datos['tipo_contenedor']);
        $stmt->bindParam(4, $datos['capacidad']);
        $stmt->bindParam(5, $datos['cantidad_bls']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function actualizarContenedor($datos)
    {
        $query = "UPDATE " . $this->table_name . " 
                  SET numero_contenedor = ?, tipo_contenedor = ?, capacidad = ?, cantidad_bls = ?
                  WHERE id = ? AND id_usuario = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $datos['numero_contenedor']);
        $stmt->bindParam(2, $datos['tipo_contenedor']);
        $stmt->bindParam(3, $datos['capacidad']);
        $stmt->bindParam(4, $datos['cantidad_bls']);
        $stmt->bindParam(5, $datos['id']); // ID del contenedor que se va a actualizar
        $stmt->bindParam(6, $datos['id_usuario']); // Por seguridad, también verifica que el usuario sea el dueño

        return $stmt->execute();
    }


    //switch operacion del contenedor
    public function switchContenedor($operacion, $contenedor_id)
    {
        $query = "UPDATE " . $this->table_name . " SET operacion =? WHERE contenedor_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $operacion);
        $stmt->bindParam(2, $contenedor_id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //delete contenedor
    public function deleteContenedor($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE contenedor_id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
