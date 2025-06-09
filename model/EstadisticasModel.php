<?php
// EstadisticasModel.php

require_once '../config/database.php';

class EstadisticasModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conectar();
    }

    public function obtenerIngresosYEgresosPorMes()
    {
        // Asumo que tienes una tabla 'movimientos' con campos:
        // tipo (ingreso/egreso), monto, fecha (YYYY-MM-DD)
        $sql = "SELECT 
                    DATE_FORMAT(fecha, '%Y-%m') AS mes,
                    tipo,
                    SUM(monto) AS total
                FROM movimientos
                WHERE fecha >= DATE_FORMAT(CURDATE() ,'%Y-%m-01') - INTERVAL 6 MONTH
                GROUP BY mes, tipo
                ORDER BY mes ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach ($data as $row) {
            $mes = $row['mes'];
            $tipo = $row['tipo'];
            $total = (float)$row['total'];

            if (!isset($result[$mes])) {
                $result[$mes] = ['mes' => $mes, 'ingreso' => 0, 'egreso' => 0];
            }

            if ($tipo === 'ingreso') {
                $result[$mes]['ingreso'] = $total;
            } elseif ($tipo === 'egreso') {
                $result[$mes]['egreso'] = $total;
            }
        }

        // Ordenar por mes (ya vienen ordenados)
        return array_values($result);
    }
}
