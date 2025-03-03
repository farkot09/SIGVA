<?php
class Database {
    private $host = "mysql"; // 👉 Usa el nombre del servicio en Docker
    private $db_name = "sigva_db";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error en la conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}


