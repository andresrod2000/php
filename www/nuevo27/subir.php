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
<div class="container d-flex flex-column align-items-center">
<h1 class="display-6 text-center">Imagen a Subir al Servidor</h1>
<?php
$origen =  $_FILES['foto']['tmp_name'];
$destino = "img/".$_FILES['foto'] ['name'];
copy($origen, $destino);
?>
<div class="card mb-3" style="max-width: 540px;">
<div class="row g-0">
<div class="col-md-5">
<img src="<?=$destino;?>" class="img-fluid rounded-start p-3" alt="">
</div>
<div class="col-md-7">
<div class="card-body">
<h5 class="card-title">Imagen Subida</h5>
<p class="card-text"> La imagen fue subida a la carpeta del Servidor en la ruta: ["<?=$destino; ?>"]</p>
<p class="card-text text-end mt-5">
<small class="text-body-secondary">27/11/2024</small>
</p>
</div>
</div>
</div>
</div>
<a href="index.php" class="btn btn-warning btn-sm">Regresar</a>
</div>
</body>
</html>