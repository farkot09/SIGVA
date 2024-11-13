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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">contenedor_id</th>
                                            <th scope="col">numero_bl</th>
                                            <th scope="col">importador</th>
                                            <th scope="col">cantidad</th>
                                            <th scope="col">peso</th>
                                            <th scope="col">-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bls as $bl): ?>
                                            <tr>

                                                <th scope="row"><?php echo $bl['bl_id']; ?></th>
                                                <td><?php echo $bl['contenedor_id']; ?></td>
                                                <td><?php echo $bl['numero_bl']; ?></td>
                                                <td><?php echo $bl['importador']; ?></td>
                                                <td><?php echo $bl['cantidad']; ?></td>
                                                <td><?php echo $bl['peso']; ?></td>
                                                <td><a href="?page=bls&action=eliminar&id=<?php echo $bl['bl_id'] ?>" type="button" class="btn btn-danger"> <i class="bi bi-trash"></i></a></td>
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