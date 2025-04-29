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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tomar Fotos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS + iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .preview-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        #cameraInput {
            display: none;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container py-4">
        <h4 class="text-center mb-4">📸 Captura de Fotos</h4>
        <h4 class="text-center mb-4"><?php echo $dataContenedor['numero_contenedor']; ?></h4>

        <!-- Botón personalizado -->
        <div class="text-center mb-4">
            <button class="btn btn-primary btn-lg" onclick="document.getElementById('cameraInput').click()">
                <i class="bi bi-camera me-2"></i> Tomar Foto
            </button>
        </div>

        <!-- Input oculto para la cámara -->
        <input type="file" accept="image/*" capture="environment" id="cameraInput">
        <!-- Campo oculto con ruta de destino -->
        <input type="hidden" id="ruta_destino" value="views/informes/<?php echo $dataContenedor['numero_contenedor']; ?>/">
        <input type="hidden" id="numero_foto" value="<?php echo count(obtenerArchivosEnDirectorio($dataContenedor['numero_contenedor']))+1 ?>">

        <hr>

        <!-- Galería de fotos -->
        <div class="row" id="gallery">
            <!-- Aquí se mostrarán las imágenes capturadas -->
            <?php 
                foreach (obtenerArchivosEnDirectorio($dataContenedor['numero_contenedor']) as $archivo) {
                    $rutaArchivo = "views/informes/" . $dataContenedor['numero_contenedor'] . "/" . $archivo;
                    echo "<div class='col-6 mb-3 shadow-lg rounded-4'>
                            <img src='$rutaArchivo' class='preview-img' alt='Foto'>
                          </div>";
                }
            ?>
        </div>
    </div>

    <script>
    const cameraInput = document.getElementById('cameraInput');
    const gallery = document.getElementById('gallery');
    const rutaDestino = document.getElementById('ruta_destino').value;
    const numeroFoto = document.getElementById('numero_foto');

    cameraInput.addEventListener('change', function () {
        const files = Array.from(this.files);

        files.forEach((file) => {
            // Vista previa local
            const reader = new FileReader();
            reader.onload = function (e) {
                const col = document.createElement('div');
                col.className = 'col-6 mb-3';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'preview-img';

                col.appendChild(img);
                gallery.appendChild(col);
            };
            reader.readAsDataURL(file);

            // Envío al servidor
            const formData = new FormData();
            formData.append('foto', file);
            formData.append('ruta_destino', rutaDestino);
            formData.append('numero_foto', numeroFoto.value);

            fetch('?page=operaciones&action=guardarFoto', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    console.log('📤 Foto subida correctamente:', data.ruta);
                    numeroFoto.value = parseInt(numeroFoto.value) + 1; // Incrementar el número de foto
                } else {
                    console.error('⚠️ Error al subir la foto:', data.mensaje);
                    alert('Error: ' + data.mensaje);
                }
            })
            .catch(err => {
                console.error('❌ Error de red o servidor:', err);
                alert('Error al subir la foto.');
            });
        });

        cameraInput.value = ''; // Permitir volver a tomar otra
    });
</script>


</body>
</html>

