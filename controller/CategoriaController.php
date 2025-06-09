<?php
require_once __DIR__ . '/../model/CategoriaModel.php';

if (!isset($_GET['tipo'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Tipo no especificado']);
    exit;
}

$tipo = $_GET['tipo'];
$model = new CategoriaModel();
$categorias = $model->obtenerPorTipo($tipo);

header('Content-Type: application/json');
echo json_encode($categorias);
