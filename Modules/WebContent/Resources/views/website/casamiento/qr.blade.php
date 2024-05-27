<style>
    /* Estilos para dispositivos móviles */
    @media (max-width: 767px) {
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ajusta la altura según tu diseño */
        }
        .col {
            max-width: 100%;
        }
        .wpo-event-item {
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .wpo-event-img {
            position: relative;
            overflow: hidden;
            border-radius: 10px 10px 0 0;
        }
        .wpo-event-img img {
            width: 100%;
            height: auto;
            display: block;
        }
        .wpo-event-text {
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
        }
        .title h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }
        li {
            margin-bottom: 10px;
            color: #666;
        }
        .custom-file-upload {

            display: block;
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            text-align: center;
            color: #007bff;
        }

.custom-file-upload:hover {
    background-color: #f0f0f0;
}

        .button {
    display: block;
    width: calc(100% - 22px);
    /* max-width: 200px; */ /* Eliminado para permitir que el botón ocupe todo el ancho */
    /* margin: 0 auto; */ /* Eliminado para permitir que el botón ocupe todo el ancho */
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease;
    text-decoration: none;
}

.button:hover {
    background-color: #45a049;
}

        .upload-message {
            margin-top: 10px;
            color: #4CAF50;
            font-style: italic;
        }
    }

    .button-container {
    text-align: center;
    margin-top: 20px; /* Ajusta el margen según sea necesario */
}

.button-container .button {
    margin: 0 10px; /* Ajusta el margen entre botones según sea necesario */
}

</style>

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
                        <a href="{{ url('/galeria') }}" class="button" style="display: block; width: calc(100% - 22px); max-width: 200px; margin: 0 auto; background-color: #4CAF50; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer; text-align: center; transition: background-color 0.3s ease; text-decoration: none;">Ir a Galería</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>



