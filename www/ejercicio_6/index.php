<?php
session_name("juegoCartas");
session_start();

if (!isset($_SESSION["jugador1"]) || !isset($_SESSION["jugador2"])) {
    reiniciarJuego();
}

function reiniciarJuego() {
    $_SESSION["jugador1"] = [rand(1, 10), rand(1, 10), rand(1, 10)];
    $_SESSION["jugador2"] = [rand(1, 10), rand(1, 10), rand(1, 10)];
    $_SESSION["resultado"] = "Sin determinar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Juego de Cartas</title>
    <style>
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .card-container svg {
            margin: 0 10px;
        }
        .result-container {
            margin-top: 30px;
            text-align: center;
        }
        .btn-custom {
            background-color: #ffc107;
            color: #000;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center my-5">
                    <h1 class="text-warning">Juego de Cartas</h1>
                </div>

                <!-- Jugador 1 -->
                <div class="mb-4">
                    <h2 class="text-center text-info">Jugador 1</h2>
                    <div class="card-container">
                        <svg width="260" height="190" viewBox="-50 -10 260 190">
                            <?php foreach ($_SESSION["jugador1"] as $index => $carta): ?>
                                <image href="img/cartas/c<?php echo htmlspecialchars($carta); ?>.svg" 
                                       x="0" y="0" height="150" transform="rotate(<?php echo -15 + $index * 15; ?>, 0, 150)" />
                            <?php endforeach; ?>
                        </svg>
                    </div>
                </div>

                <!-- Jugador 2 -->
                <div class="mb-4">
                    <h2 class="text-center text-success">Jugador 2</h2>
                    <div class="card-container">
                        <svg width="260" height="190" viewBox="-50 -10 260 190">
                            <?php foreach ($_SESSION["jugador2"] as $index => $carta): ?>
                                <image href="img/cartas/c<?php echo htmlspecialchars($carta); ?>.svg" 
                                       x="0" y="0" height="150" transform="rotate(<?php echo -15 + $index * 15; ?>, 0, 150)" />
                            <?php endforeach; ?>
                        </svg>
                    </div>
                </div>

                <!-- Resultado -->
                <div class="result-container">
                    <h3 class="text-warning">Resultado: <?php echo $_SESSION["resultado"]; ?></h3>
                </div>

                <!-- Botón de Nueva Partida -->
                <div class="text-center my-4">
                    <form action="cartas6.php" method="POST">
                        <button type="submit" name="accion" value="Nueva" class="btn btn-custom px-4 py-2">
                            Nueva Partida
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
