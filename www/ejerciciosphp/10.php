<?php
# Manejo de vectores
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "➖  • VECTORES O ARREGLOS •  ➖\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
$vNombre = ["Juan", "Pedro", "Ana", "Petronila", "Diego"]; 
$vEdad = [25,35,18,19,20];
$vEdad [2]=38;
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "➖  • Vector Nombres •  ➖\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
for ($f=0;$f<count($vNombre);$f++){
    echo " | ".$vNombre[$f].". \n";
}
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
echo "➖  •••  Vector Edades  •••  ➖\n";
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
for($f=0;$f<count($vEdad); $f++){
    echo " | ". $vNombre[$f]." Tiene ".$vEdad[$f]." años. \n";
}
echo "➖➖➖➖➖➖➖➖➖➖➖➖➖➖\n";
?>