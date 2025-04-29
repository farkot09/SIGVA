<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar BLS</title>
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
                        <div id="columnaOculta" class="col-4 d-none">
                            <h2><?php echo $numeroContenedor ?></h2>
                            <h3>Agregar Bls</h3>
                            <div class="bd-example m-0 border-0">

                                <form method="post" action="?page=bls&action=crear">
                                    <div class="mb-3">
                                        <label class="form-label">Contenedor_id</label>
                                        <input name="contenedor_id" value="<?php echo $idContenedor ?>" readonly
                                            type="text" class="form-control bg-secondary">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">numero_bl</label>
                                        <input name="numero_bl" type="text" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">importador</label>
                                        <input name="importador" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">cantidad</label>
                                        <input name="cantidad" type="number" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">peso (kl)</label>
                                        <input name="peso" type="number" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Añadir Bls</button>
                                </form>

                            </div>

                        </div>
                        <div class="col-8">
                            <div class="bd-example">
                                <?php
                                $bls_array = $bls->fetchAll(PDO::FETCH_ASSOC); // convierte el PDOStatement en array solo una vez
                                ?>
                                <caption>
                                    <span
                                        class="m-2 <?= count($bls_array) == $cantidadBls ? 'badge bg-success' : 'badge bg-danger' ?>">
                                        Cantidad Bls: <?= count($bls_array) ?> de <?= $cantidadBls ?>
                                    </span>
                                </caption>

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
                                                    <i class="bi bi-box-seam me-2"></i> Número BL
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person-circle me-2"></i> Importador
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-123 me-2"></i> Cantidad
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-123 me-2"></i> Peso
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
                                        <?php foreach ($bls_array as $bl): ?>
                                            <tr>

                                                <th scope="row"><?php echo $bl['bl_id']; ?></th>
                                                <td><?php echo $bl['numero_bl']; ?></td>
                                                <td><?php echo $bl['importador']; ?></td>
                                                <td><?php echo $bl['cantidad']; ?></td>
                                                <td><?php echo $bl['peso']; ?></td>
                                                <td><a href="?page=bls&action=eliminar&id=<?php echo $bl['bl_id'] ?>"
                                                        type="button" class="btn btn-danger"> <i
                                                            class="bi bi-trash"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <button id="mostrarFormulario" class="btn btn-primary mb-3 <?= count($bls_array) == $cantidadBls ? 'disabled' : '' ?>" onclick="toggleCol()">Agregar Bls +</button>
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