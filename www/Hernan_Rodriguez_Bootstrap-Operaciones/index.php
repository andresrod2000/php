<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Ejercicio de Bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-success p-2 text-white bg-opacity-75">
    <div class="container">
        <h1 class="display-3 text-center">Ejercicio Bootstrap Operaciones</h1>
            <form class="row g-3 needs-validation" method="POST" action="operar.php">
                <div class="container">
                    <div class="col-md-12">
                        <label for="valor1" class="form-label">Valor 1</label>
                        <input type="number" class="form-control" id="valor1" name="valor1" placeholder="Ingrese Número" required>
                        <div class="valid-feedback">Muy Bien!</div>
                        <div class="invalid-feedback">¡Escriba el primer número a operar!</div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <label for="valor2" class="form-label">Valor 2</label>
                        <input type="number" class="form-control" id="valor2" name="valor2" placeholder="Ingrese Número" required>
                        <div class="valid-feedback">Muy Bien!</div>
                        <div class="invalid-feedback">¡Escriba el segundo número!</div>
                    </div>
                </div>
                <div class="container2">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="sumar" name="operar" value="sumar" required>
                        <label class="form-check-label" for="sumar">Sumar</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="restar" name="operar" value="restar" required>
                        <label class="form-check-label" for="restar">Restar</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="multiplicar" name="operar" value="multiplicar" required>
                        <label class="form-check-label" for="multiplicar">Multiplicar</label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="ct">
                    <input type="submit" class="btn btn-primary" value="calcular">
                </div>
            </form>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/validarform.js"></script>
</body>
</html>