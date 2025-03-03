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
        <div class="container">
            <div class="row text-center">

                <div class="col-4"></div>
                <div class="col-4 mt-5">
                    <form method="post" action="?page=login&action=login">
                        <div class="card text-center border-top border-primary">
                            <div class="card-header">                                
                                <h1>SIGVA</h1>
                            </div>
                            <div class="card-body">
                                <div class="m-4">
                                    <p>Ingrese sus datos para iniciar sesion</p>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                            <label class="form-check-label" for="inlineFormCheck">
                                                Recordar usuario
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                                <a class="text-center">SIGVA 1.0</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-4"></div>
            </div>
        </div>

    </main>
    <?php require_once 'templates/footer.php'; ?>