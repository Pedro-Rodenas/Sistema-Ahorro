<?php

require_once __DIR__ . "/../config/database.php";

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conectar();
    }

    public function registrar($nombre, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $email, $hash]);
    }
}
