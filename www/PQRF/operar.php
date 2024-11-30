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
            <h1 class="text-center">Crear Archivo Datospqr.txt</h1>
            <div class="mb-3">
                <label for="perfil" class?="form-label">RESULTADO</label>
                    <?php
                        $ar=fopen("DatosPqr.txt","a") or die("Problemas en la creación");
                        fputs($ar,$_REQUEST['nombre']);
                        fputs($ar,"\r\n");
                        fputs($ar,"-----------------------------------------------------");
                        fputs($ar,"\r\n");
                        fputs($ar,$_REQUEST['comentarios']);
                        fputs($ar,"\r\n");
                        fputs($ar,"-----------------------------------------------------");
                        fputs($ar,"\r\n");
                        fclose($ar);
                        $rpta = "Los Datos Se Cargaron Correctamente";
                    ?>
                    <p class="form-control fw-ligth" id="perfil"><?=$rpta; ?></p>
            </div>
            <div class="col-12">
                <a class="btn btn-warning btn-sm" href="index.php" role="button">Regresar</a>
                <a class="btn btn-warning btn-sm" href="leer.php" role="button">Leer</a> 
            </div>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/validarform.js"></script>
    </body>
</html>