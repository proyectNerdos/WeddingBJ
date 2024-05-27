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

        .button, .custom-file-upload {
            display: inline-block;
            background-color: #4CAF50;
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
                <p>¡Sube tus fotos de la fiesta para compartirlas con los novios y los invitados! <br> <br> 1- Selecciona una foto de tu galería o toma una foto. <br> 2- Presiona el botón "Subir a Galería!". <br> 3- ¡Listo! Tu foto se subirá a la galería. </p>

                <ul>
                    <li>
                        <form id="upload-form" action="{{ url('/upload') }}" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); uploadImage();">
                            @csrf
                            <label for="image" class="custom-file-upload" style="border: 1px solid #007bff;">
                                <i class="fas fa-cloud-upload-alt"></i>
                                Seleccionar foto de galería!
                            </label>
                            <input type="file" name="image" id="image" style="display:none;">
                            <div class="button-container">
                                <button class="button" type="submit" onclick="uploadImage()">Enviar Foto!</button>
                            </div>
                            <div id="progressBar" style="display: none; width: 100%; background-color: #f3f3f3;">
                                <div id="progressBarInner" style="height: 20px; width: 0%; background-color: #4CAF50;"></div>
                              </div>
                              <br>
                        </form>
                    </li>
                    <li>
                        <a href="{{ url('/galeria') }}" class="button">Visitar Galería</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function uploadImage() {
      var formData = new FormData(document.getElementById('upload-form'));
      var progressBar = document.getElementById('progressBar');
      var progressBarInner = document.getElementById('progressBarInner');

      $.ajax({
        xhr: function() {
          var xhr = new XMLHttpRequest();
          xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
              var percentComplete = (e.loaded / e.total) * 100;
              progressBarInner.style.width = percentComplete + '%';
            }
          }, false);
          return xhr;
        },
        type: 'POST',
        url: '{{ url('/upload') }}',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
          progressBar.style.display = 'block';
        },
        success: function(data) {
          alert('La foto se ha cargado con éxito!');
          location.reload(); // Refresca la página
        },
        error: function(data) {
          alert('Hubo un error al cargar la foto. Por favor, seleccione primero una imagen.');
        },
        complete: function() {
          setTimeout(function() {
            progressBar.style.display = 'none';
            progressBarInner.style.width = '0%';
          }, 2000);
        }
      });
    }
    </script>
</body>
</html>
