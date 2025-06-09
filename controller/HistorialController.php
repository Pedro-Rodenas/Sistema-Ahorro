<?php
require_once __DIR__ . '/../model/HistorialModel.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$modelo = new HistorialModel();
$movimientos = $modelo->obtenerMovimientos();

header('Content-Type: application/json');
echo json_encode($movimientos);
