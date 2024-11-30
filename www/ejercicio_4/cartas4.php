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

    // Verificamos que existan las variables de sesión
    if (!isset($_SESSION["carta1"]) || !isset($_SESSION["carta2"]) || !isset($_SESSION["carta3"])) {
        $_SESSION["carta1"] = rand(1, 10);
        $_SESSION["carta2"] = rand(1, 10);
        $_SESSION["carta3"] = rand(1, 10);
    }
    
    $accion = recoge("accion");
    
    if ($accion == "Nueva") {
        // Generamos tres nuevas cartas aleatorias
        $_SESSION["carta1"] = rand(1, 10);
        $_SESSION["carta2"] = rand(1, 10);
        $_SESSION["carta3"] = rand(1, 10);
    }
    
    // Validamos los valores antes de guardar
    foreach (["carta1", "carta2", "carta3"] as $carta) {
        if ($_SESSION[$carta] < 1 || $_SESSION[$carta] > 10) {
            $_SESSION[$carta] = rand(1, 10);
        }
    }
    
    header("Location: index.php");
    exit;
?>

