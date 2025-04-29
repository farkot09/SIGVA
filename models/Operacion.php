<?php
require_once 'config/config.php';

class Contenedor
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}