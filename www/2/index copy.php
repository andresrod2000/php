
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
function teorema($a,$b){
    $h = sqrt(($a*$a+$b*$b));
    return $h;
}
$a=40; $b=30;
echo "<hr>";
echo "EJERCICIO FUNCIONES 4 <br>";
echo "Teorema de pitagoras<br>";
echo "<hr>";
echo  "Hipotenusa de : <br> a = ".$a." , b= ".$b."<br>";



?>

<textarea rows="5" cols="35"><?= $rpta; ?></textarea>

</body>

</html>