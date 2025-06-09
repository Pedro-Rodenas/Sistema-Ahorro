<?php
require_once __DIR__ . '/../model/MovimientoModel.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['usuario_id'] = 1;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'registrar') {
    $tipo = $_POST['tipo'];
    $categoria_id = $_POST['categoria_id'];
    $detalle = trim($_POST['detalle']);
    $monto = floatval($_POST['monto']);
    $fecha = $_POST['fecha'];
    $usuario_id = $_SESSION['usuario_id'] ?? null;


    if (!$usuario_id || !$tipo || !$categoria_id || !$detalle || !$monto || !$fecha) {
        die("Datos incompletos.");
    }

    $modelo = new MovimientoModel();
    $registrado = $modelo->registrar([
        'tipo' => $tipo,
        'categoria_id' => $categoria_id,
        'detalle' => $detalle,
        'monto' => $monto,
        'fecha' => $fecha,
        'usuario_id' => $usuario_id
    ]);

    if ($registrado) {
        header("Location: ../view/registrar_movimientos.php?exito=1");
    } else {
        header("Location: ../view/registrar_movimientos.php?error=1");
    }
    exit;
}
