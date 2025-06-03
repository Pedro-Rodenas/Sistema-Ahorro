<?php

require_once __DIR__ . "/../config/database.php";

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conectar();
    }

    /* Registrar nuevo usuario */
    public function registrar($nombre, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $email, $hash]);
    }

    /* Verificar si el usuario existe */
    public function login($email, $password)
    {
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);

        if ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $usuario['password'])) {
                return $usuario;
            }
        }
        return false;
    }
}
