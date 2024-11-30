<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Ejercicio de  Bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-success p-2 text-white bg-opacity-75">
    <div class="container">
        <h1 class="display-3 text-center">Resultado de la Operacion</h1>
            <?php
                if(isset($_REQUEST['ct'])){
                    $v1 = $_REQUEST['valor1'];
                    $v2 = $_REQUEST['valor2']; 
                    $sum = number_format($v1+$v2, 0, ',', '.');
                    $res = number_format($v1-$v2, 0, ',', '.');
                    $mul = number_format($v1*$v2, 0, ',', '.');
                    if($_REQUEST['operar'] == "sumar")
                        echo "Suma = ".$sum;
                    else
                        if ($_REQUEST['operar'] == "restar")
                            echo "Resta = ".$res;
                        else
                            echo "Multiplicacion = ".$mul;
                }else{
                    echo "Debe Ingresar Los Datos Para Operar";
                }
            ?><hr><a href="index.php" class="btn btn-primary">Regresar</a>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>