<?php
require_once 'models/Usuario.php';

class UsuariosController
{
    public function index()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerUsuarios();
        require 'views/usuarios/index.php';
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $cargo = $_POST['cargo'];
            $password = $_POST['password'];

            $usuario = new Usuario();
            $usuario->crearUsuario($nombre, $email, $cargo, $password);

            header("Location: ?page=usuarios");
        } else {
            require 'views/usuarios/index.php';
        }
    }

    public function editar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $cargo = $_POST['cargo'];
            $password = $_POST['password'];

            $usuario = new Usuario();
            $usuario->actualizarUsuario($id, $nombre, $email, $cargo);
        }
    }

    public function eliminar($id)
    {
        $usuario = new Usuario();
        $usuario->eliminarUsuario($id);
        header("Location:?page=usuarios");
    }
    //login
    public function login($email, $password){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usuario = new Usuario();
            $datos = $usuario->login($email, $password);
            if($datos){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }                
                $_SESSION['datos'] = $datos;
                header("Location:?page=contenedores");
            }else{
                header("Location:?page=login&error=true");
            }
        }
    }
    public function logout(){
        session_start();
        session_destroy();
        header("Location:?page=login");
    }
    
}

