<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login | Sistema de Ahorro</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <div class="auth-container">
        <div class="auth-box login-layout active" id="login-layout">
            <div class="auth-content">
                <div class="auth-left">
                    <img src="assets/img/logo-login.png" alt="Logo" class="logo">
                    <h2>Iniciar Sesión</h2>
                    <form method="POST" action="controller/UsuarioController.php?action=login">
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <button type="submit">Ingresar</button>
                        <p>¿No tienes cuenta? <a id="mostrar-registro">Regístrate aquí</a></p>
                    </form>
                </div>
                <div class="auth-right">
                    <img src="assets/img/portada-login.webp" alt="Imagen derecha">
                </div>
            </div>
        </div>

        <div class="auth-box" id="register-layout">
            <div class="auth-content">
                <div class="auth-right">
                    <img src="assets/img/portada-login.webp" alt="Imagen izquierda">
                </div>

                <div class="auth-left">
                    <img src="assets/img/logo-login.png" alt="Logo" class="logo">
                    <h2>Registro</h2>
                    <form method="POST" action="controller/UsuarioController.php?action=register">
                        <input type="text" name="nombre" placeholder="Nombre completo" autocomplete="off" required>
                        <input type="email" name="email" placeholder="Correo electrónico" autocomplete="off" required>
                        <input type="password" name="password" placeholder="Contraseña" autocomplete="off" required>
                        <button type="submit">Registrarse</button>
                        <p>¿Ya tienes cuenta? <a id="mostrar-login">Inicia sesión</a></p>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="assets/js/index.js"></script>
    <script src="assets/js/validaciones_indes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>