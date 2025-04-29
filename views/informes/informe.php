<?php
function obtenerArchivosEnDirectorio($ruta) {
    $rutaTotal = "views/informes/" . $ruta . "/";
    if (!is_dir($rutaTotal)) {
        return []; // Si no es un directorio válido, devuelve array vacío
    }

    $archivos = array_diff(scandir($rutaTotal), ['.', '..']);
    return array_values($archivos); // Reindexar el array
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informe de Operacion - <?php echo $contenedores['numero_contenedor']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-8 mt-5">
                    <h1>Informe <?php echo $contenedores['numero_contenedor']; ?></h1>
                    <div class="bd-example">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>CONTENEDOR :<b> <?php echo $contenedores['numero_contenedor']; ?></b></td>
                                </tr>
                                <tr>
                                    <td>TIPO DE CONTENEDOR : <b> <?php echo $contenedores['tipo_contenedor']; ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>CAPACIDAD : <b> <?php echo $contenedores['capacidad']; ?> </b></td>
                                </tr>
                                <tr>
                                    <td>CANTIDAD DE BLS : <b><?php echo $contenedores['cantidad_bls']; ?></b></td>
                                </tr>
                                <tr>
                                    <td>RESPONSABLE VACIADO : <b><?php echo $contenedores['id_usuario']; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="container mt-4">
                            <div class="row">
                                <?php
                                $fotos = obtenerArchivosEnDirectorio($contenedores['numero_contenedor']);

                                foreach ($fotos as $foto):
                                    $ruta = 'views/informes/' . $contenedores['numero_contenedor'] . '/' . $foto;
                                    ?>
                                    <div class="col-md-4 mb-4 shadow-lg rounded-4">
                                        <div class="card shadow-sm">
                                            <a target="_blank" href="<?= $ruta ?>"><img src="<?= $ruta ?>" class="card-img-top img-fluid" alt="Foto"></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- FIN Contenido a agregar -->
            </div>

            <div>

    </main>
    <?php require_once 'templates/footer.php'; ?>