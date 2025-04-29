<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar / Listar Contenedores</title>
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
                        <div class="col-4 d-none" id="columnaOculta">
                            <h1>Agregar Contenedor</h1>
                            <div class="bd-example m-0 border-0">

                                <form method="post" action="?page=contenedores&action=crear">
                                    <div class="mb-3 d-none">
                                        <input name="id_usuario" value="<?php echo $_SESSION['datos']['id_usuario']; ?>"
                                        type="text" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Numero Contenedor</label>
                                        <input name="numero_contenedor" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">tipo_contenedor</label>
                                        <select class="form-select" name="tipo_contenedor">
                                            <option value="High Cube">High Cube</option>
                                            <option value="Dry Van">Dry Van</option>
                                            <option value="Reefer">Reefer</option>
                                            <option value="Open Top">Open Top</option>
                                            <option value="Flat Rack">Flat Rack</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Capacidad</label>
                                        <select class="form-select" name="capacidad">
                                            <option value="20">20</option>
                                            <option value="40">40</option>
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
                                <caption>Lista de Contenedores</caption>                                    
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-hash me-2"></i> ID
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-box-seam me-2"></i> Número
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-tag me-2"></i> Tipo
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-database me-2"></i> Capacidad
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-stack me-2"></i> Bls
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-exclamation-circle me-2"></i> Estado
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-gear me-2"></i> Operación
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person-circle me-2"></i> Usuario
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-calendar-event me-2"></i> Fecha
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-tools me-2"></i> Acciones
                                                </div>
                                            </th>
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
                                                <td><span
                                                        class="<?= $contenedor['estado'] ? 'badge bg-success' : 'badge bg-danger'; ?>"><?= $contenedor['estado'] ? 'Activo' : 'Inactivo'; ?></span>
                                                </td>
                                                <td><span class="<?= $contenedor['operacion'] ? 'badge bg-success' : 'badge bg-warning'; ?>"><?= $contenedor['operacion'] ? 'En operación' : 'Sin operación'; ?></span>
                                                </td>
                                                <td><?= $contenedor['id_usuario']; ?></td>
                                                <td><?= $contenedor['fecha_creacion']; ?></td>
                                                <td><a href="?page=contenedores&action=infoContenedor&id=<?php echo $contenedor['contenedor_id'] ?>"
                                                        type="button" class="btn btn-primary <?= $contenedor['operacion'] ? 'disabled' : ''; ?>"> <i class="bi bi-eye"></i>
                                                    </a> <a
                                                        href="?page=contenedores&action=deleteContenedor&id=<?php echo $contenedor['contenedor_id'] ?>"
                                                        type="button" class="btn btn-danger <?= $contenedor['operacion'] ? 'disabled' : ''; ?>"> <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <button id="mostrarFormulario" class="btn btn-primary mb-3" onclick="toggleCol()">Agregar Contenedor +</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- FIN Contenido a agregar -->
            </div>

            <div>

    </main>
    <script>
  function toggleCol() {
    const col = document.getElementById("columnaOculta");
    const btn = document.getElementById("mostrarFormulario");
    col.classList.toggle("d-none");
    btn.classList.toggle("d-none");
  }
</script>
    <?php require_once 'templates/footer.php'; ?>