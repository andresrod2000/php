
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

<div class="pricing-plan">
<h2 class="pricing-header">Tabla de Multipllicar del 7</h2>
<ul class="pricing-features">
<li class="pricing-features-item">
<?php
$numero = 9;
// Este codigo realiza la tabla del 7
for($i=1;$i<10;$i++){
if($j*$i < 10) {
echo "$j ❎ ".$i."->"."&nbsp;".($j*$i)." ☑ <br>";
}else{
echo "$j ❎ ".$i."->".($j*$i)."☑ <br>";
}
}
?>
<span class="pricing-price">Fin</span>
</li>
</ul>



</body>

</html>