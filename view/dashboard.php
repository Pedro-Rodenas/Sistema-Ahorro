<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Estadísticas</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>
    <?php include_once __DIR__ . '/../template/header.php'; ?>
    <main>
        <div id="saldo-container" class="dashboard-saldo">
            <h2>Saldo Disponible</h2>
            <p id="saldo-valor">Cargando...</p>
        </div>
    </main>
    <script src="../assets/js/saldoDashboard.js"></script>
</body>

</html>