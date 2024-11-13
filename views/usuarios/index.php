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
              <h1>Agregar Usuario</h1>
              <div class="bd-example m-0 border-0">

                <form method="post" action="?page=usuarios&action=crear" >
                  <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="text" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <select class="form-select" name="cargo">
                      <option value="Administrador">Administrador</option>
                      <option value="Operador">Operador</option>
                      <option value="Supervisor">Supervisor</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Añadir Usuario</button>
                </form>

              </div>

            </div>
            <div class="col-8">
              <div class="bd-example">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Cargo</th>
                      <th scope="col">Fecha de Creacion</th>
                      <th scope="col">-</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                      <tr>
                        <td><?php echo $usuario['usuario_id']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo $usuario['cargo']; ?></td>
                        <td><?php echo $usuario['fecha_creacion']; ?></td>
                        <td><button type="button" class="btn btn-primary"> <i class="bi bi-pen"></i> </button> <button
                            type="button" class="btn btn-danger"> <i class="bi bi-trash"></i> </button>
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