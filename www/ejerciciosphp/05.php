<?php
    $dia[0] = "Domingo";
    $dia[1] = "Lunes";
    $dia[2] = "Martes";
    $dia[3] = "Miercoles";
    $dia[4] = "Jueves";
    $dia[5] = "Viernes";
    $dia[6] = "Sabado";
    echo  "Restaurante Don Pacho\n";
    echo "------------------\n";
    echo " Servicio de : ".$dia[1]. "a" .$dia[5]."\n";
    echo "En El Horario de 5:00 AM a 12:00 PM\n";
    echo "En El Horario de 2:00 PM a 6:00 PM\n";
    $frutas = array("Mango", "Pera", "Uvas", "Melocotón", "Papaya", "Sandia");
    echo "\n Menú Desayunos de la Semana\n";
    echo "------------------\n";
    for ($i=1; $i < 6; $i++){
        echo "°".$dia[$i]. " Comer ".$frutas[rand(0,5)]. "\n";
    }
?>