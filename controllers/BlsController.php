<?php

require_once 'models/Bl.php';

class BlsController
{
    public function index()
    {
        
        if (isset($_SESSION['contenedor_info'])) {
            $datosContenedor = $_SESSION['contenedor_info'];
            $bl = new Bl();
            $bls = $bl->getBlsByContenedorId($datosContenedor['contenedor_id']);
            $numeroContenedor = $datosContenedor['numero_contenedor'];
            $idContenedor = $datosContenedor['contenedor_id'];
            $cantidadBls = $datosContenedor['cantidad_bls'];
            require_once 'views/bls/index.php';
        }else{
            header('Location: ?page=contenedores&error=error_contenedor');
        }

    }
    //crear bl
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contenedor_id = $_POST['contenedor_id'];
            $numero_bl = $_POST['numero_bl'];
            $importador = $_POST['importador'];
            $cantidad = $_POST['cantidad'];
            $peso = $_POST['peso'];
            $bl = new Bl();
            $bl->create($contenedor_id, $numero_bl, $importador, $cantidad, $peso);
            if ($bl) {
                header('Location: ?page=bls');
            } else {
                echo 'Error al crear el bl';
            }
        }
    }
    public function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $bl_id = $_GET['id'];
            $bl = new Bl();
            $bl->eliminar($bl_id);
            header('Location:?page=bls&message=bl_eliminado_correctamente');
        }
    }
}