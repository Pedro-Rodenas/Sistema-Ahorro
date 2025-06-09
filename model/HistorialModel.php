<?php
require_once __DIR__ . "/../config/database.php";
class HistorialModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conectar();
    }

    public function obtenerMovimientos()
    {
        $sql = "SELECT id, tipo, detalle, monto, fecha FROM movimientos WHERE usuario_id = ? ORDER BY fecha DESC, id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$_SESSION['usuario_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
