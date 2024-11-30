<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <title>Manejo de Archivos</title>
        <link rel='stylesheet' href='css/bootstrap.css'>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="bg-success p-2 text-white bg-opacity-75">
        <div class="container">
            <h1 class="text-center">Radique su PQRF</h1>
            <form class="row g-3 needs-validation" method="POST" action="operar.php" novalidate>
                <div class="col-6-md-6">
                    <label for="nombre" class="form-label">Nombre Completo: </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellidos" required>
                    <div class="invalid-feedback">
                    ¡Escriba el Nombre!.
                    </div>                
                </div>
                <div class="col-6-md-6">
                    <label for="edad" class="form-label">Redactar PQRF: </label>
                    <textarea class="form-control" id="comentarios" name="comentarios" rows="5" cols="15" placeholder="Ingrese los comentarios" required></textarea>
                    <div class="invalid-feedback">
                    ¡Escriba la PQRF!.
                    </div>                
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-warning btn-sm" type="submit">Radicar PQRF</button>
                    <a class="btn btn-warning btn-sm" href="leer.php" role="button">Leer</a> 
                </div>
            </form>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/validarform.js"></script>
    </body>
</html>