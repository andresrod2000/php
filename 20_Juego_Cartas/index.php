<?php
    session_name("juegos01");
    session_start();

    // Si el valor de sesión no existe, ponemos el valor de la carta a uno
    if (!isset($_SESSION["carta"])) {
        $_SESSION["carta"] = 1;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Plantilla Juego de Carta</title>
    <link rel='stylesheet' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items text-white">
                        <h3>JUEGO DE CARTAS</h3>
                        <p>Generar una Carta de la Baraja</p>
                        <form class="requires-validation" action="cartas1.php" method="POST">
                            <div class="col-md-12 mb-3">
                                <p class="text-justify">
                                <?php
                                    // Mostramos la carta, guardada en la sesión
                                    print "<p class='text-center'><img src='img/cartas/p$_SESSION[carta].svg' title='$_SESSION[carta] de corazones' height='300'></p>";
                                ?>
                                </p>
                            </div>
                            <div class="form-button mt-3">
                                <button type="submit" class="btn btn-warning" id="submit" name="accion" value="Nueva Carta">Generar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>