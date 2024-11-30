<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Ejercicio Crear Archivo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-success p-2 text-white bg-opacity-75">
    <div class="container">
        <h1 class="display-3 text-center">Leer Archivo DatosPqr.txt</h1>
        <div class="mb-3">
            <label for="perfil" class="form-label">RESULTADO</label>
            <?php 
                $ar = fopen("DatosPqr.txt","r") or die("No se pudo abrir el archivo");
                $rpta = "";
                while (!feof($ar)){
                  $linea = fgets($ar);
                  $lineasalto = nl2br($linea);
                  $rpta .= $lineasalto;
                }
                fclose($ar);            ?>
            <p class="form-control fw-light" id="perfil"><?=$rpta; ?></p>
        </div>
        <div class="col-12">
            <a class="btn btn-warning btn-sm" href="index.php" role="button">Regresar</a>                
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>