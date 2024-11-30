<?php
session_name("juegos01");
session_start();

// Inicializamos las tres cartas si no existen
if (!isset($_SESSION["carta1"]) || !isset($_SESSION["carta2"]) || !isset($_SESSION["carta3"])) {
    $_SESSION["carta1"] = rand(1, 10);
    $_SESSION["carta2"] = rand(1, 10);
    $_SESSION["carta3"] = rand(1, 10);
    $_SESSION["jugada"] = "Sin determinar";
    $_SESSION["valor"] = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Tres Cartas de Corazones</title>
    <link rel='stylesheet' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items text-white">
                        <h3>JUEGO DE TRES CARTAS</h3>
                        <p>Tres cartas de corazones aleatorias</p>
                        <form class="requires-validation" action="cartas5.php" method="POST" novalidate>
                            <div class="col-md-12 mb-3">
                                <div class="text-center">
                                    <!-- Contenedor SVG para las tres cartas -->
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="260" height="190" viewBox="-50 -10 260 190">
                                        <image href="img/cartas/c<?php echo htmlspecialchars($_SESSION["carta1"]); ?>.svg" 
                                               x="0" y="0" height="150" transform="rotate(-15, 0, 150)" />
                                        <image href="img/cartas/c<?php echo htmlspecialchars($_SESSION["carta2"]); ?>.svg" 
                                               x="0" y="0" height="150" transform="rotate(0, 0, 150)" />
                                        <image href="img/cartas/c<?php echo htmlspecialchars($_SESSION["carta3"]); ?>.svg" 
                                               x="0" y="0" height="150" transform="rotate(15, 0, 150)" />
                                    </svg>
                                </div>
                                
                                <!-- Mostrar la jugada conseguida -->
                                <p class="mt-3">Jugada conseguida: 
                                    <strong><?php echo isset($_SESSION["jugada"]) ? $_SESSION["jugada"] : "Sin determinar"; ?></strong>
                                    <?php if (isset($_SESSION["valor"])): ?>
                                        (<?php echo $_SESSION["valor"]; ?>)
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="form-button mt-3 text-center">
                                <button type="submit" class="btn btn-warning mx-2" name="accion" value="Nueva">Nuevas Cartas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




