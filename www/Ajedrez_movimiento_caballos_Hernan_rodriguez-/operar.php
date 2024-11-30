<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
            .chess-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 90vh;
            }
            td {
                width: 80px;
                height: 80px;
                text-align: center;
                vertical-align: middle;
            }
        </style>
        <title>Movimientos del Caballo</title>
    </head>
    <body class="bg-black p-2 text-white bg-opacity-75">
        <div class="container">
            <h1 class="text-center text-primary mb-4 ">Movimientos del Caballo</h1>
        </div>
        <div class="chess-container">
            <?php
            function CrearTableroConCaballo($posFila, $posColumna): void {
                $movimientos = [
                    [-2, -1], [-2, 1], [2, -1], [2, 1],
                    [-1, -2], [-1, 2], [1, -2], [1, 2]
                ];

                echo "<table border='1'>";
                for ($fila = 0; $fila < 8; $fila++) {
                    echo "<tr>";
                    for ($columna = 0; $columna < 8; $columna++) {
                        $color = (($fila + $columna) % 2 == 0) ? "white" : "black";
                        $contenido = "";

                        // Posición inicial del caballo
                        if ($fila == $posFila && $columna == $posColumna) {
                            $contenido = "<img src='img/caballo1.jpeg' alt='Caballo' width='40'>";
                        } else {
                            // Mostrar posibles movimientos
                            foreach ($movimientos as $mov) {
                                $movFila = $posFila + $mov[0];
                                $movColumna = $posColumna + $mov[1];
                                if ($fila == $movFila && $columna == $movColumna) {
                                    $contenido = "<img src='img/caballo2.jpeg' alt='Movimiento' width='40'>";
                                    break;
                                }
                            }
                        }

                        echo "<td style='background-color: $color;'>$contenido</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }

            // Validar entrada
            if (isset($_POST['fila']) && isset($_POST['columna'])) {
                $fila = intval($_POST['fila']);
                $columna = intval($_POST['columna']);

                if ($fila >= 0 && $fila <= 7 && $columna >= 0 && $columna <= 7) {
                    CrearTableroConCaballo($fila, $columna);
                } else {
                    echo "<h2 class='text-center text-danger'>Coordenadas inválidas. Inténtalo nuevamente.</h2>";
                }
            } else {
                echo "<h2 class='text-center text-danger'>No se recibieron coordenadas.</h2>";
            }
            ?>
        </div>
    </body>
</html>

