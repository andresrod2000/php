
<html lang="es">

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<title>Ejercicio PHP Multipllicar</title>
<link rel="stylesheet" href="css/reset.min.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="pricing-plan">
<h2 class="pricing-header">Tablas de Multipllicar</h2>
<ul class="pricing-features">
<li class="pricing-features-item">
<?php


for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($j * $i < 10) {
            echo "$j ❎ $i ➡ " . "&nbsp;&nbsp;" . ($j * $i) . " ✅ ";
        } else {
            echo "$j ❎ $i ➡ " . ($j * $i) . " ✅ ";
        }
    }
    echo "<br>";
}
echo "<br>";

for ($i = 1; $i <= 9; $i++) {
    for ($j = 6; $j <= 10; $j++) {
        if ($j * $i < 10) {
            echo "$j ❎ $i ➡ " . "&nbsp;&nbsp;" . ($j * $i) . " ✅ ";
        } else {
            echo "$j ❎ $i ➡ " . ($j * $i) . " ✅ ";
        }
    }
    echo "<br>";
}
?>




<span class="pricing-price">Fin</span>
</li>
</ul>




</body>

</html>