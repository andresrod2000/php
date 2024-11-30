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
<h1 class="text-center">Subir Imagen al Servidor</h1>
<form class="row g-3 needs-validation" method="POST" action="subir.php" enctype="multipart/form-data"
novalidate>
<div class="col-6-md-6">
<label for="foto" class="form-label">Seleccionar imagen a subir: </label>
<input type="file" name="foto" class="form-control" accept="image/*" required>
<div class="invalid-feedback">
¡Seleccione la Imagen!.
</div>
</div>
<div class="col-12 text-center">
<button class="btn btn-warning btn-sm mx-2" type="submit">Subir Imagen</button>
</div>
</form>
</div>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/validarform.js"></script>
</body>
</html>