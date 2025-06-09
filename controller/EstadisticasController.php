<?php
// EstadisticasController.php

header('Content-Type: application/json');

// Suponiendo que tienes una clase Modelo con método para conexión y consulta
require_once '../model/EstadisticasModel.php';

$model = new EstadisticasModel();

// Obtener datos agregados por mes y tipo (ingreso, egreso)
$result = $model->obtenerIngresosYEgresosPorMes();

echo json_encode($result);
