<?php
# Ejemplo de operaciones lógicas en PHP
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo " OPERACIONES -°- LÓGICAS \n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
$a = 8; $b = 3; $c = 3;
$r1 = ($a == $b && $c > $b) ? 'Si' : 'No';
$r2 = ($a == $b || $b == $c)? 'Si' : 'No';
$r3 = !($b <= $c) ? 'Si' : 'No';
echo " a = " .$a." | | b = ".$b." | c = ".$c."\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "(a = b && c > b) → ".$r1."\n";
echo "(a = b || b = c) c) → ".$r2."\n";
echo "!(b <= c) ".$r3."\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
?>