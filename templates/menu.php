<?php
$datos = !empty($_SESSION['datos']) ? $_SESSION['datos'] : '';
?>
<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS Bootstrap (bundle incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar mb-5" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <div class="logo-container d-none d-lg-block">
            <img src="./img/logo.png" alt="Logo" class="logo">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08"
            aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav fs-5">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="?page=contenedores&action=habilitarOperacion"> <i
                            class="bi bi-house-door-fill"></i> Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <i
                            class="bi bi-newspaper"></i> Contenedores</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=contenedores">Crear Contenedor</a></li>
                        <li><a class="dropdown-item" href="?page=bls">Agregar BLS/Clientes</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="?page=contenedores&action=habilitarOperacion"><i
                            class="bi bi-newspaper"></i> Operaciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="?page=contenedores&action=informes" ><i
                            class="bi bi-newspaper"></i> Informes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="?page=usuarios"><i class="bi bi-person-fill"></i> Administrar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=usuarios&action=logout">
                        <i class="bi bi-person-circle"></i>
                        <?php echo !empty($datos['nombre']) ? $datos['nombre'] : ''; ?>
                        <i class="bi bi-box-arrow-left"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>