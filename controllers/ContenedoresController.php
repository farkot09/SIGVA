<?php

require_once 'models/Contenedor.php';

class ContenedoresController
{
    public function index()
    {
        $contenedor = new Contenedor();
        $contenedores = $contenedor->getAllContenedores();
        require_once 'views/contenedores/index.php';
    }
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario_id = $_POST['usuario_id'];
            $numero_contenedor = $_POST['numero_contenedor'];
            $tipo_contenedor = $_POST['tipo_contenedor'];
            $capacidad = $_POST['capacidad'];
            $cantidad_bls = $_POST['cantidad_bls'];
            $contenedor = new Contenedor();
            $datos = array(
                'usuario_id' => $usuario_id,
                'numero_contenedor' => $numero_contenedor,
                'tipo_contenedor' => $tipo_contenedor,
                'capacidad' => $capacidad,
                'cantidad_bls' => $cantidad_bls
            );
            $contenedor->crearContenedor($datos);
            if ($contenedor) {
                header('Location: ?page=contenedores');
            } else {
                echo "Error al crear el contenedor";
            }

        }
        ;
    }
    //get contenedor by id
    public function getContenedorById($id)
    {        
        $contenedor = new Contenedor();
        $contenedor = $contenedor->getContenedorById($id);
        return $contenedor;
    }
    // contenedor info to SESSION 

    public function infoContenedor()
    {
        $id = $_GET['id'];
        $contenedor = $this->getContenedorById($id);
        $_SESSION['contenedor_info'] = $contenedor;
        header('Location:?page=bls');
    }
    //switch operacion del contenedor
    public function switchOperacion(){
        $id = $_GET['id'];
        $contenedor = $this->getContenedorById($id);
        if($contenedor['operacion'] == 1){
            $contenedor['operacion'] = 0;
        }else{
            $contenedor['operacion'] = 1;
        }
        $contenedor->actualizarOperacion($contenedor);
        header('Location:?page=contenedores');
    }

}