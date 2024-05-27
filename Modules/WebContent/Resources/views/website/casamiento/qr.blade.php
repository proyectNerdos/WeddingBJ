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
                padding: 15px 30px; /* Aumenta el padding de los botones en dispositivos móviles */
                font-size: 16px; /* Aumenta el tamaño de fuente de los botones en dispositivos móviles */
            }
        }

        /* Estilos generales */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            max-width: 600px; /* Establece un ancho máximo para el contenedor */
            margin: 0 auto; /* Centra el contenedor horizontalmente */
        }

        .wpo-event-item {
            text-align: center;
        }

        .wpo-event-text {
            margin-top: 20px;
        }

        #submitButton {
    background-color: #45a049; /* Verde */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 12px;
}

#submitButton:disabled {
    background-color: #808080; /* Gris */
    color: white;
}

#submitButton:hover:not(:disabled) {
    background-color: #45a049;
}


        .button, .custom-file-upload {
            display: inline-block;
            background-color: #45a049;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            margin-right: 10px;
        }

        .button:last-child {
            margin-right: 0;
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

        /* Estilos del cartel de éxito */
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            display: none; /* Oculta el cartel inicialmente */
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
                <p>¡Sube tus fotos de la fiesta para compartirlas con los novios y los invitados! <br> <br> 1- Selecciona una foto de tu galería o toma una foto. <br> 2- Presiona el botón "Enviar Foto!". <br> 3- ¡Listo! Tu foto se subirá a la galería. </p>

                <ul>
                    <li>
                        <form id="upload-form" action="{{ url('/upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="image" class="custom-file-upload" style="border: 1px solid #007bff;">
                                <i class="fas fa-cloud-upload-alt"></i>
                                Seleccionar foto de galería!
                            </label>
                            <input type="file" name="image" id="image" style="display:none;">
                            <div id="progressBar" style="display: none; width: 100%; background-color: #f3f3f3;">
                                <div id="progressBarInner" style="height: 20px; width: 0%; background-color: #4CAF50;">
                                    <span id="progressText" style="color: white;"></span>
                            </div>

                            </div>
                            <br>
                            <div class="button-container">
                                <button  type="submit" id="submitButton">Enviar foto!</button>
                            </div>

                            </div>
                            <br>
                        </form>
                    </li>
                    <li style="list-style-type: none;">
                        <a href="{{ url('/galeria') }}" target="_blank" class="button">Visitar Galería</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    // Cuando se envía el formulario, deshabilita el botón de envío y muestra un mensaje de éxito
$('#upload-form').submit(function(e) {
    e.preventDefault();
    $('#submitButton').prop('disabled', true);
    $('#submitButton').css('background-color', '#808080'); // Cambia el color a gris

    // Muestra un popup de éxito
    swal({
        title: "¡Buen trabajo!",
        text: "La foto se cargó correctamente",
        icon: "success",
    }).then((value) => {
        // Envía el formulario manualmente
        this.submit();
    });
});

    // Deshabilita el botón de envío al cargar la página
    $(document).ready(function() {
        $('#submitButton').prop('disabled', true);
        $('#submitButton').css('background-color', '#808080'); // Cambia el color a gris
    });

    // Cuando se selecciona una imagen
    $('#image').change(function() {
        var progressBar = $('#progressBar');
        var progressBarInner = $('#progressBarInner');
        var progressText = $('#progressText');
        var submitButton = $('#submitButton');

        // Muestra la barra de progreso
        progressBar.show();

        // Simula el progreso de la carga
        var progress = 0;
        var interval = setInterval(function() {
            progress += 10;
            progressBarInner.width(progress + '%');
            progressText.text(progress + '%');

            // Cuando la carga llega al 100%, oculta la barra de progreso y habilita el botón de envío
            if (progress >= 100) {
                clearInterval(interval);
                setTimeout(function() {
                    progressBar.hide();
                    progressBarInner.width('0%');
                    progressText.text('');
                    submitButton.prop('disabled', false);
                    submitButton.css('background-color', '#008000'); // Cambia el color a verde oscuro
                }, 2000);
            }
        }, 500);
    });

    // Cuando se envía el formulario, deshabilita el botón de envío
    $('#upload-form').submit(function() {
        $('#submitButton').prop('disabled', true);
        $('#submitButton').css('background-color', '#808080'); // Cambia el color a gris
    });
</script>

<script>
    // Deshabilita el botón de envío al cargar la página
    document.querySelector('button[type="submit"]').disabled = true;
</script>

</body>
</html>
