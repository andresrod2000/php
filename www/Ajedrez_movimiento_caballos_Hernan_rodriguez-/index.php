<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <title>Ejercicio Caballo Ajedrez</title>
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
            }
            .form-container {
                text-align: center;
                margin-top: 20px;
            }
        </style>
    </head>
    <body class="bg-black p-2 text-white bg-opacity-75">
        <div class="container mt-5 p-4 bg-black rounded shadow">
            <h1 class="text-center text-primary mb-4">POSICIÓN INICIAL DEL CABALLO</h1>
            <form class="needs-validation" action="operar.php" method="POST">
                <div class="mb-3">
                        <label for="fila">Fila (0-7):</label>
                        <input type="number" class="form-control" name="fila" min="0" max="7" required>
                </div>
                <div class="mb-3">       
                        <label for="columna">Columna (0-7):</label>
                        <input type="number" class="form-control" name="columna" min="0" max="7" required>
                        
                
                </div>
                <button class="btn btn-primary w-100" type="submit">Mostrar movimientos</button>
            </form>
        </div>
    </body>
</html>


