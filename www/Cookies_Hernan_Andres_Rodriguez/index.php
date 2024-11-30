<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Manejo de Cookies</title>
    <link rel='stylesheet' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-body text-center">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3 class="text-center">Crear o Borrar Cookies en Sesion</h3>
                        <p class="text-center">
                            <?php
                            if (isset($_COOKIE['PROYECTO'])) {
                                echo "Cookie creada: <span class='text-warning'>" . $_COOKIE['PROYECTO'] . "</span>";
                            } else {
                                echo "Cookie Borrada.";
                            }

                            if (isset($_POST['borrar'])) {
                                echo "<span>Cookie borrada correctamente.</span>";
                            }
                            ?>
                        </p>
                        <form class="row g-3 needs-validation text-center d-flex flex-column align-items-center" action="cookies.php" method="POST" novalidate>
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-warning mx-3" name="crear" value="Crear Cookies">
                                <input type="submit" class="btn btn-warning mx-3" name="borrar" value="Borrar Cookies">
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/validarform.js"></script>
</body>
</html>
