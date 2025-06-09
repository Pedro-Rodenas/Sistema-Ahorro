<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevos Movimientos</title>
    <link rel="stylesheet" href="../assets/css/registrar_movimientos.css">
</head>

<body>
    <?php
    include '../template/header.php';
    ?>
    <main>
        <div class="form-container">
            <h2>Registrar Movimiento</h2>
            <form action="../controller/MovimientoController.php" method="POST">
                <input type="hidden" name="action" value="registrar">

                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" required>
                    <option value="ingreso">Ingreso</option>
                    <option value="egreso">Egreso</option>
                </select>

                <label for="monto">Monto (S/):</label>
                <input type="number" name="monto" step="0.01" required>

                <label for="detalle">Detalle:</label>
                <input type="text" name="detalle" maxlength="255" required>

                <label for="categoria">Categoría:</label>
                <select name="categoria_id" id="categoria" required>
                    <!-- Categorias por ingreso o egreso -->
                </select>

                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" value="<?= date('Y-m-d') ?>" required>

                <button type="submit">Guardar</button>
            </form>
        </div>
    </main>
    <script src="../assets/js/cargarCategorias.js"></script>
</body>

</html>