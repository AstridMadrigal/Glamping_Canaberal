<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fondo Degradado Vertical con Bootstrap 5</title>
    <!-- Incluyendo Bootstrap CSS desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Estilo personalizado para el fondo degradado vertical */
        .bg-gradient-vertical {
            background-image: linear-gradient(to bottom, #000000, #686767);
            height: 100vh; /* Ajusta la altura al 100% de la ventana */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="bg-gradient-vertical">
    <div style="z-index:-1;position: absolute;height: 80vh;width:100%;background-image: url(imagenfondo.jpg);opacity: 0.5;background-repeat: no-repeat;background-position: center;filter: grayscale(100%);margin-top: 13vh;">
    </div>
    <div class="container text-center text-white">
        <h1 class="mb-4">¡Bienvenido a la Página con Fondo Degradado Vertical!</h1>
        <p class="lead">Esta es una demostración de un fondo en degradado vertical usando Bootstrap 5.</p>

        <input type="text" />
    </div>
    <!-- Incluyendo Bootstrap JS y Popper.js desde el CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
