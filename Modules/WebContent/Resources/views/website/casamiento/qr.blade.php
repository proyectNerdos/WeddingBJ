<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparte tus Fotografías</title>
    <style>
        /* Estilos para dispositivos móviles */
        @media only screen and (max-width: 600px) {
            .container {
                padding: 20px; /* Aumenta el espacio alrededor del contenedor en dispositivos móviles */
            }

            .wpo-event-item {
                max-width: 100%; /* Ajusta el ancho máximo del contenedor al 100% en dispositivos móviles */
            }

            .button, .custom-file-upload {
                padding: 20px 40px; /* Aumenta el padding de los botones en dispositivos móviles */
                font-size: 18px; /* Aumenta el tamaño de fuente de los botones en dispositivos móviles */
            }
        }

        /* Estilos generales */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wpo-event-item {
            text-align: center;
        }

        .wpo-event-text {
            margin-top: 20px;
        }

        .button, .custom-file-upload {
            display: block; /* Cambiado a display block para que ocupen toda la anchura disponible */
            width: 100%; /* Ocupa todo el ancho disponible */
            background-color: #4CAF50;
            color: white;
            padding: 20px 40px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px; /* Espacio entre los botones */
        }

        .button:last-child {
            margin-bottom: 0; /* Elimina el espacio inferior del último botón */
        }

        .button:hover, .custom-file-upload:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center; /* Centra los botones dentro del contenedor */
        }
    </style>
</head>
<body>

<section class="container">
    <div class="col col-lg-4 col-md-6 col-12">
        <div class="wpo-event-item wow fadeInUp" data-wow-duration="1400ms">
            <div class="wpo-event-img">
                <img src="{{ asset('theme-front/casamiento/images/event/party.png') }}" alt="Fotografías de la fiesta">
            </div>
            <div class="wpo-event-text">
                <div class="title">
                    <h2>Comparte tus Fotografías</h2>
                </div>

                <div class="icon" style="text-align: center;">
                    <i class="fas fa-hand-point-down"></i>
                </div>
                <p>¡Sube tus fotos de la fiesta para compartirlas con los novios y los invitados! <br> <br> 1- Selecciona una foto de tu galería o toma una foto. <br> 2- Presiona el botón "Subir a Galería!". <br> 3- ¡Listo! Tu foto se subirá a la galería. </p>

                <ul>
                    <li>
                        <form action="{{ url('/upload') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            @csrf
                            <label for="image" class="custom-file-upload" style="border: 1px solid #007bff;">
                                <i class="fas fa-cloud-upload-alt"></i>
                                Elegir foto de galería o tomar una foto
                            </label>
                            <input type="file" name="image" id="image" style="display:none;">
                            <div class="button-container">

                                <button class="button" type="submit" onclick="return showSuccessMessage()">Subir a Galería!</button>
                            </div>
                        </form>
                    </li>
                    <li>
                        <br>
                        <a href="{{ url('/galeria') }}" class="button">Ir a Galería</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    // Función para mostrar la alerta de éxito solo si se ha seleccionado una foto
    function showSuccessMessage() {
        // Obtener el input de tipo archivo
        var inputFile = document.getElementById('image');
        // Verificar si se ha seleccionado una foto
        if (inputFile.files.length > 0) {
            // Mostrar la alerta de éxito
            alert("¡Foto cargada exitosamente!");
        }
        // Permitir que el formulario se envíe independientemente de si se muestra la alerta o no
        return true;
    }
</script>

</body>
</html>






