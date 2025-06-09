<?php
session_start();
require_once __DIR__ . '/../model/MovimientoModel.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'No autenticado']);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$modelo = new MovimientoModel();

$saldo = $modelo->obtenerSaldoActual($usuario_id);

echo json_encode(['saldo' => $saldo]);
