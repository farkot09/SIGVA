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
        <div class="container">
            <div class="row">
                <div class="col-8 mt-5">
                    <h1>Informe <?php echo $contenedores['numero_contenedor']; ?></h1>
                    <div class="bd-example">
                        <table class="table">
                            <tbody>
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
                                <tr>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/1.jpeg" alt="imagen1"></td>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/2.jpeg" alt="imagen2"></td>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/3.jpeg" alt="imagen3"></td>
                                </tr>
                                <tr>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/4.jpeg" alt="imagen4"></td>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/5.jpeg" alt="imagen5"></td>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/6.jpeg" alt="imagen6"></td>
                                </tr>
                                <tr>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/7.jpeg" alt="imagen7"></td>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/8.jpeg" alt="imagen8"></td>
                                    <td><img  width="300" height="300" loading="lazy" src="views/informes/HLBU1218286/9.jpeg" alt="imagen9"></td>
                                </tr>
                                
                            </tbody>
                            </tbody>
                        </table>  
                    </div>
                </div>
                <!-- FIN Contenido a agregar -->
            </div>

            <div>

    </main>
    <?php require_once 'templates/footer.php'; ?>