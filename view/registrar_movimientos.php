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
        <section class="form-section">
            <div class="form-container">
                <h2>Registrar Movimiento</h2>
                <form action="../controller/MovimientoController.php" method="POST">
                    <input type="hidden" name="action" value="registrar">

                    <div class="c-group-inputs">
                        <div>
                            <label for="tipo">Tipo:</label>
                            <select name="tipo" id="tipo" required>
                                <option value="ingreso">Ingreso</option>
                                <option value="egreso">Egreso</option>
                            </select>
                        </div>

                        <div>
                            <label for="categoria">Categoría:</label>
                            <select name="categoria_id" id="categoria" required></select>
                        </div>
                    </div>

                    <div class="c-group-inputs">
                        <div>
                            <label for="detalle">Detalle:</label>
                            <input type="text" name="detalle" maxlength="255" required>
                        </div>

                        <div>
                            <label for="monto">Monto (S/):</label>
                            <input type="number" name="monto" step="0.01" required>
                        </div>
                    </div>

                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" value="<?= date('Y-m-d') ?>" required>

                    <button type="submit">Guardar</button>
                </form>
            </div>
        </section>
    </main>

    <script src="../assets/js/cargarCategorias.js"></script>
</body>

</html>