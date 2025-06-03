<?php
session_start();

require_once __DIR__ . "/../model/UsuarioModel.php";

class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuarioModel();
    }

    public function login()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $usuario = $this->model->login($_POST['email'], $_POST['password']);
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header("Location: ../view/dashboard.php");
                exit;
            } else {
                header("Location: ../index.php?msg=login_error");
                exit;
            }
        } else {
            header("Location: ../index.php");
            exit;
        }
    }

    public function registro()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $registroExitoso = $this->model->registrar($_POST['nombre'], $_POST['email'], $_POST['password']);
            if ($registroExitoso) {
                header("Location: ../index.php?msg=registro_ok");
                exit;
            } else {
                header("Location: ../index.php?msg=registro_error");
                exit;
            }
        } else {
            header("Location: ../index.php?msg=registro_incompleto");
            exit;
        }
    }
}

if (isset($_GET['action'])) {
    $controller = new UsuarioController();
    if ($_GET['action'] === 'login') {
        $controller->login();
    } elseif ($_GET['action'] === 'register') {
        $controller->registro();
    }
}
