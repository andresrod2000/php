<?php
session_name("juegoCartas");
session_start();

// Función para calcular el resultado
function calcularResultado($jugador1, $jugador2) {
    $valor1 = evaluarMano($jugador1);
    $valor2 = evaluarMano($jugador2);

    if ($valor1['tipo'] > $valor2['tipo']) {
        return "Ganó el Jugador 1 con un " . $valor1['nombre'];
    } elseif ($valor2['tipo'] > $valor1['tipo']) {
        return "Ganó el Jugador 2 con un " . $valor2['nombre'];
    } elseif ($valor1['valor'] > $valor2['valor']) {
        return "Ganó el Jugador 1 con un " . $valor1['nombre'];
    } elseif ($valor2['valor'] > $valor1['valor']) {
        return "Ganó el Jugador 2 con un " . $valor2['nombre'];
    } else {
        return "Empate con " . $valor1['nombre'];
    }
}

// Función para evaluar la mano
function evaluarMano($mano) {
    $valores = array_count_values($mano);
    if (in_array(3, $valores)) {
        return ['tipo' => 3, 'valor' => array_search(3, $valores), 'nombre' => 'Trío'];
    } elseif (in_array(2, $valores)) {
        return ['tipo' => 2, 'valor' => array_search(2, $valores), 'nombre' => 'Pareja'];
    } else {
        return ['tipo' => 1, 'valor' => max($mano), 'nombre' => 'Carta más alta'];
    }
}

// Procesamos la acción del formulario
if ($_POST['accion'] === 'Nueva') {
    $_SESSION["jugador1"] = [rand(1, 10), rand(1, 10), rand(1, 10)];
    $_SESSION["jugador2"] = [rand(1, 10), rand(1, 10), rand(1, 10)];
    $_SESSION["resultado"] = calcularResultado($_SESSION["jugador1"], $_SESSION["jugador2"]);
}

header("Location: index.php");
exit;
?>
