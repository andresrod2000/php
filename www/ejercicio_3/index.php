<?php
    session_name("juegos01");
    session_start();

    // Inicializamos las variables de sesión si no existen
    if (!isset($_SESSION["carta"])) {
        $_SESSION["carta"] = 1;
        $_SESSION["max_carta"] = 0;
        $_SESSION["intentos"] = 0;
    }

    // Procesamos las acciones enviadas desde el formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["accion"])) {
        $accion = $_POST["accion"];

        if ($accion === "Nueva Carta") {
            // Generamos una nueva carta al azar entre 1 y 10
            $nueva_carta = rand(1, 10);
            $_SESSION["carta"] = $nueva_carta;
            $_SESSION["intentos"]++;

            // Actualizamos la carta más alta
            if ($nueva_carta > $_SESSION["max_carta"]) {
                $_SESSION["max_carta"] = $nueva_carta;
            }

            // Si se obtiene un 10, se detiene automáticamente
            if ($nueva_carta == 10) {
                // Aquí podrías agregar una lógica para deshabilitar el botón si lo deseas
            }
        } elseif ($accion === "Reiniciar") {
            // Reiniciamos el juego
            $_SESSION["carta"] = 1;
            $_SESSION["max_carta"] = 0;
            $_SESSION["intentos"] = 0;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Juego de Cartas</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items text-white">
                        <h3>Juego de Cartas</h3>
                        <p>Generar una Carta de la Baraja</p>

                        <p>
                            
                            <img src="img/cartas/d<?php echo $_SESSION['carta']; ?>.svg" alt="Carta actual" height="150">
                        </p>
                        <p>Carta más alta obtenida: <strong><?php echo $_SESSION["max_carta"]; ?></strong></p>
                        <p>Intentos hasta conseguir un 10: <strong><?php echo $_SESSION["intentos"]; ?></strong></p>
                        
                        <form action="" method="POST">
                            <div class="form-button mt-3">
                                <button type="submit" class="btn btn-warning" name="accion" value="Nueva Carta"> Nueva Carta</button>
                                <button type="submit" class="btn btn-danger" name="accion" value="Reiniciar">Reiniciar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
