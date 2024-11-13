<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>habilitar Operacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <main>
        <!-- Inicio Barra de MENU -->
        <?php require_once 'templates/menu.php'; ?>
        <!-- FIN de Barra de MENU -->
        <!-- Inicio Contenido a agregar -->
        <div class="container">
            <div class="row">
                <div class="col-8 mt-5">
                    <h1>Habilitar Operaciones</h1>
                    <div class="bd-example">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Numero de Contenedor</th>
                                    <th scope="col">Bls</th>
                                    <th scope="col"> - </th>
                                    <th scope="col">Vaciado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contenedores as $contenedor): ?>
                                    <tr>
                                        <td><?= $contenedor['contenedor_id']; ?></td>
                                        <td><?= $contenedor['numero_contenedor']; ?></td>
                                        <td><?= $contenedor['estado'] ? 'Activo' : 'Inactivo'; ?></td>
                                        <td><a href="?page=contenedores&action=switchOperacion&id=<?= $contenedor['contenedor_id']; ?>"
                                                type="button" class="btn btn-<?= $contenedor['operacion'] ? 'success' : 'warning'; ?>"> <?= $contenedor['operacion'] ? 'Deshabilitar' : 'Habilitar'; ?> </a></td>
                                        <td><?= $contenedor['operacion'] ? 'En operación' : 'No en operación'; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>


                </div>
                <!-- FIN Contenido a agregar -->
            </div>

            <div>

    </main>
    <?php require_once 'templates/footer.php'; ?>