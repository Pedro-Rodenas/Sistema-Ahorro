<?php
require_once __DIR__ . '/../config/database.php';

class MovimientoModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conectar();
    }

    public function registrar($data)
    {
        $sql = "INSERT INTO movimientos (tipo, categoria_id, detalle, monto, fecha, usuario_id) 
                VALUES (:tipo, :categoria_id, :detalle, :monto, :fecha, :usuario_id)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':tipo' => $data['tipo'],
            ':categoria_id' => $data['categoria_id'],
            ':detalle' => $data['detalle'],
            ':monto' => $data['monto'],
            ':fecha' => $data['fecha'],
            ':usuario_id' => $data['usuario_id']
        ]);
    }
}
