<?php
$contenedores_operacion = array_filter($contenedores, function ($c) {
    return $c['operacion'] == 1;
});
function verificarArchivoExiste($rutaArchivo)
{
    if(file_exists($rutaArchivo)) {
        return "btn-success";
    } else {
        return "btn-primary";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones Habilitadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-3">
        <h1 class="mb-3 text-center text-primary">📦 Operaciones Activas</h1>

        <?php if (empty($contenedores_operacion)): ?>
            <div class="alert alert-warning text-center">No hay contenedores en operación.</div>
        <?php else: ?>
            <?php foreach ($contenedores_operacion as $contenedor): ?>
                <div class="card mb-3 shadow-sm rounded-4">
                    <div class="card-body">
                        <h5 class="card-title mb-2"><?= $contenedor['numero_contenedor'] ?></h5>
                        <p class="card-text mb-1"><strong>Usuario:</strong> <?= $contenedor['id_usuario'] ?></p>
                        <p class="card-text mb-1"><strong>Tipo:</strong> <?= $contenedor['tipo_contenedor'] ?></p>
                        <p class="card-text mb-1"><strong>Capacidad:</strong> <?= $contenedor['capacidad'] ?> pies</p>
                        <p class="card-text mb-1"><strong>Cantidad BLs:</strong> <?= $contenedor['cantidad_bls'] ?></p>
                        <p class="card-text text-muted small">Creado:
                            <?= date("d/m/Y H:i", strtotime($contenedor['fecha_creacion'])) ?></p>
                        <a href="?page=operaciones&action=registroFotografico&id_contenedor=<?= $contenedor['contenedor_id'] ?>" class="btn mt-3 <?= verificarArchivoExiste("views/informes/{$contenedor['numero_contenedor']}/1.jpeg") ?>">📸 Tomar Fotos</a> <!-- Botón de acción -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>