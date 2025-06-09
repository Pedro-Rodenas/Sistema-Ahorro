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

    public function obtenerSaldoActual($usuario_id)
    {
        $sql = "SELECT 
                SUM(CASE WHEN tipo = 'ingreso' THEN monto ELSE 0 END) - 
                SUM(CASE WHEN tipo = 'egreso' THEN monto ELSE 0 END) AS saldo_actual
            FROM movimientos
            WHERE usuario_id = :usuario_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return floatval($resultado['saldo_actual'] ?? 0);
    }
}
