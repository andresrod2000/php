<?php
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "�OPERACIONES COMPARACIÓN \n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n"; 
$a = 10; $b = 5; $c =15;
$r1=($a==$b) ? 'Si' : 'No';
$r2=($a != $b) ? 'Si' : 'No';
$r3=($a < $b )? 'Si' : 'No';
$r4=($a > $b ) ? 'Si' : 'No';
$r5 = ($a >= $c) ? 'Si' : 'No';
$r6 = ($a <= $c) ? 'Si' : 'No';
echo " a = ".$a." b = ".$b." c = ".$c."\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "¿a y b son iguales?, ". $r1 . "\n";
echo "¿a y b son diferentes?," .$r2."\n";
echo "¿a es menor que b?, " .$r3 . "\n";
echo "¿a es mayor que b?, " .$r4. "\n";
echo "¿a es mayor o que c?, " .$r5. "\n";
echo "¿a es menor o = que c?, ".$r6."\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
?>