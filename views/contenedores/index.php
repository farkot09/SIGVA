<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plantilla</title>
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
                <div class="col-12 mt-5">
                    <!-- Inicio Contenido a agregar -->
                    <div class="row">
                        <div class="col-4">
                            <h1>Agregar Contenedor</h1>
                            <div class="bd-example m-0 border-0">

                                <form method="post" action="?page=contenedores&action=crear">
                                    <div class="mb-3">
                                        <input name="usuario_id" value="1" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Numero Contenedor</label>
                                        <input name="numero_contenedor" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">tipo_contenedor</label>
                                        <select class="form-select" name="tipo_contenedor">
                                            <option value="20ft">20ft</option>
                                            <option value="40ft">40ft</option>
                                            <option value="Reefer">Reefer</option>
                                            <option value="Open Top">Open Top</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Capacidad</label>
                                        <select class="form-select" name="capacidad">
                                            <option value="Baja">Baja</option>
                                            <option value="Media">Media</option>
                                            <option value="Alta">Alta</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cantidad de Bls</label>
                                        <input name="cantidad_bls" type="number" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Añadir Contenedor</button>
                                </form>

                            </div>

                        </div>
                        <div class="col-8">
                            <div class="bd-example">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">numero_contenedor</th>
                                            <th scope="col">tipo_contenedor</th>
                                            <th scope="col">capacidad</th>
                                            <th scope="col">cantidad_bls</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Operacion</th>
                                            <th scope="col">Usuario Responsable</th>
                                            <th scope="col">Fecha de Creacion</th>
                                            <th scope="col">-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contenedores as $contenedor): ?>
                                            <tr>
                                                <td><?= $contenedor['contenedor_id']; ?></td>
                                                <td><?= $contenedor['numero_contenedor']; ?></td>
                                                <td><?= $contenedor['tipo_contenedor']; ?></td>
                                                <td><?= $contenedor['capacidad']; ?></td>
                                                <td><?= $contenedor['cantidad_bls']; ?></td>
                                                <td><?= $contenedor['estado'] ? 'Activo' : 'Inactivo'; ?></td>
                                                <td><?= $contenedor['operacion'] ? 'En operación' : 'No en operación'; ?>
                                                </td>
                                                <td><?= $contenedor['usuario_id']; ?></td>
                                                <td><?= $contenedor['fecha_creacion']; ?></td>
                                                <td><a href="?page=contenedores&action=infoContenedor&id=<?php echo $contenedor['contenedor_id'] ?>" type="button" class="btn btn-primary"> <i class="bi bi-eye"></i>
                                                    </a> <button type="button" class="btn btn-danger"> <i
                                                            class="bi bi-trash"></i> </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- FIN Contenido a agregar -->
            </div>

            <div>

    </main>
    <?php require_once 'templates/footer.php'; ?>