<?php
require_once 'controllers/UsuariosController.php';
require_once 'controllers/ContenedoresController.php';
require_once 'controllers/BlsController.php';
require_once 'controllers/OperacionController.php';
session_start();

if (!isset($_SESSION['datos'])) { 
    $page = 'login';
} else {
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
}



switch ($page) {
    case 'login':
        $usuariosController = new UsuariosController();
        if (isset($_GET['action']) && $_GET['action'] == 'login') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($email && $password) {
                $usuariosController->login($email, $password);
            } else {
                echo "";
            }
        }

        include 'views/login.php';
        break;
    case 'usuarios':
        $usuariosController = new UsuariosController();
        if (isset($_GET['action'])) {
            $method = $_GET['action'];
            if (method_exists("UsuariosController", $method)) {
                $usuariosController->{$method}();
            }
        } else {
            $usuariosController->index();
        }
        break;
    case 'contenedores':
        $contenedoresController = new ContenedoresController();
        if (isset($_GET['action'])) {
            $method = $_GET['action'];
            if (method_exists("ContenedoresController", $method)) {
                $contenedoresController->{$method}();
            }
        } else {
            $contenedoresController->index();
        }
        break;
    case 'bls':
        $blsController = new BlsController();
        if (isset($_GET['action'])) {
            $method = $_GET['action'];
            if (method_exists("BlsController", $method)) {
                $blsController->{$method}();
            }
        } else {
            $blsController->index();
        }
        break;
        case 'operaciones':
            $operacionController = new OperacionController();
            if (isset($_GET['action'])) {
                $method = $_GET['action'];
                if (method_exists("OperacionController", $method)) {
                    $operacionController->{$method}();
                }
            } else {
                $operacionController->verOperaciones();
            }
            break;
    default:
        header('Location:?page=login');
        break;
}