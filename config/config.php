<?php
class Database {
    private $host = "193.203.166.106"; // 👉 Usa el nombre del servicio en Docker
    private $db_name = "u418732272_sigva_db";
    private $username = "u418732272_root";
    private $password = "BarceloNA26..";
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


