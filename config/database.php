<?php

class Database
{
    private $host = "localhost";
    private $dbname = "system_ahorro";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function conectar()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->user,
                $this->pass
            );

            $this->conn->exec("set name utf8");
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}
