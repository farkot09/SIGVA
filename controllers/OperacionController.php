<?php

require_once 'models/Contenedor.php';

class OperacionController
{
    public function verOperaciones()
    {
        $contenedor = new Contenedor();
        $contenedores = $contenedor->getAllContenedores();
        require_once 'views/operaciones/verOperaciones.php';
    }
    public function registroFotografico()
    {
        $contenedor = new Contenedor();
        $id_contenedor = $_GET['id_contenedor'];
        $dataContenedor = $contenedor->getContenedorById($id_contenedor);
        require_once 'views/operaciones/registroFotografico.php';
    }
    public function guardarFoto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
            $foto = $_FILES['foto'];
            $rutaDestino = $_POST['ruta_destino'] ?? 'uploads/';
            $numeroFoto = $_POST['numero_foto'] ?? '1';

            // Validar y crear ruta si no existe
            if (!is_dir($rutaDestino)) {
                mkdir($rutaDestino, 0777, true);
            }

            if ($foto['error'] === UPLOAD_ERR_OK) {
                $nombreArchivo = $numeroFoto . ".jpeg";
                $rutaFinal = rtrim($rutaDestino, '/') . '/' . $nombreArchivo;

                if (move_uploaded_file($foto['tmp_name'], $rutaFinal)) {
                    echo json_encode([
                        'success' => true,
                        'mensaje' => 'Foto cargada con éxito.',
                        'ruta' => $rutaFinal
                    ]);
                } else {
                    echo json_encode(['success' => false, 'mensaje' => 'Error al mover el archivo.']);
                }
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Error al subir el archivo.']);
            }
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'No se recibió ninguna foto.']);
        }
    }
}