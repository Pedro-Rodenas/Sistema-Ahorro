<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevos Movimientos</title>
    <link rel="stylesheet" href="../assets/css/registrar_movimientos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <input type="datetime-local" name="fecha" value="<?= date('Y-m-d') ?>" required>

                    <button type="submit">Guardar</button>
                </form>
            </div>
        </section>
    </main>

    <script src="../assets/js/cargarCategorias.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);

            if (params.has('exito')) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Movimiento registrado!',
                    text: 'El movimiento se guardó correctamente.',
                    confirmButtonColor: '#2B2D6E'
                }).then(() => {
                    // Limpiar la URL después de cerrar la alerta
                    window.history.replaceState(null, '', window.location.pathname);
                });
            }

            if (params.has('error')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar',
                    text: 'Hubo un problema al guardar el movimiento.',
                    confirmButtonColor: '#D4AF37'
                }).then(() => {
                    // Limpiar la URL después de cerrar la alerta
                    window.history.replaceState(null, '', window.location.pathname);
                });
            }
        });
    </script>
</body>

</html>