<?php
session_name("juegos01");
session_start();

function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}


if (!isset($_SESSION["carta1"]) || !isset($_SESSION["carta2"]) || !isset($_SESSION["carta3"])) {
    $_SESSION["carta1"] = rand(1, 10);
    $_SESSION["carta2"] = rand(1, 10);
    $_SESSION["carta3"] = rand(1, 10);
    $_SESSION["jugada"] = "Sin determinar";
    $_SESSION["valor"] = null;
}

$accion = recoge("accion");

if ($accion == "Nueva") {
    
    $_SESSION["carta1"] = rand(1, 10);
    $_SESSION["carta2"] = rand(1, 10);
    $_SESSION["carta3"] = rand(1, 10);
}

foreach (["carta1", "carta2", "carta3"] as $carta) {
    if ($_SESSION[$carta] < 1 || $_SESSION[$carta] > 10) {
        $_SESSION[$carta] = rand(1, 10);
    }
}

// Detectar la jugada conseguida
$cartas = [$_SESSION["carta1"], $_SESSION["carta2"], $_SESSION["carta3"]];
$valores = array_count_values($cartas);

if (in_array(3, $valores)) {
    $_SESSION["jugada"] = "Trío";
    $_SESSION["valor"] = array_search(3, $valores); 
} elseif (in_array(2, $valores)) {
    $_SESSION["jugada"] = "Pareja";
    $_SESSION["valor"] = array_search(2, $valores); 
} else {
    $_SESSION["jugada"] = "Carta más alta";
    $_SESSION["valor"] = max($cartas); 
}


header("Location: index.php");
exit;
