
<html lang="es">

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<title>Ejercicio PHP 04</title>
<link rel="stylesheet" href="css/reset.min.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

$Nom = "Jota Jota";

$Ape = "Lizcano";

$rpta = " Hola ".$Nom." ".$Ape.PHP_EOL." Bienvenidos al Mundo de la programación en PHP";

?>

<textarea rows="5" cols="35"><?= $rpta; ?></textarea>

</body>

</html>