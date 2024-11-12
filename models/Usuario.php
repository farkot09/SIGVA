<?php
require_once 'config/config.php';

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function obtenerUsuarios() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearUsuario($nombre, $email, $cargo, $password) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, email, cargo, password, fecha_creacion) VALUES (:nombre, :email, :cargo, :password, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":cargo", $cargo);
        $stmt->bindParam(":password", $password);
        return $stmt->execute();
    }
    
    public function obtenerUsuarioPorEmail($email) {
        $query = "SELECT * FROM ". $this->table_name. " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizarUsuario($id, $nombre, $email, $cargo) {
        $query = "UPDATE ". $this->table_name. " SET nombre = :nombre, email = :email, cargo = :cargo WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":cargo", $cargo);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    
    public function eliminarUsuario($id) {
        $query = "DELETE FROM ". $this->table_name. " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    //login
    public function login($email, $password) {
        $query = "SELECT * FROM ". $this->table_name. " WHERE email = :email AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

