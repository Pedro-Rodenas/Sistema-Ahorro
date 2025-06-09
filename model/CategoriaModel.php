<?php

require_once __DIR__ . '/../config/database.php';

class CategoriaModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conectar();
    }

    public function obtenerPorTipo($tipo)
    {
        $query = "SELECT * FROM categorias WHERE tipo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$tipo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
