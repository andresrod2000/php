<?php
    session_name("juegos01");
    session_start();
    
    // Si el valor de sesión no existe, redirigimos a la primera página
    if (!isset($_SESSION["carta"])) {
        header("location:index.php");
        exit;
    }

    // Funciones auxiliares
    function recoge($var, $m = ""){
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
    
    // Inicializamos "carta_Alta" si no está definida
    if (!isset($_SESSION["carta_Alta"])) {
        $_SESSION["carta_Alta"] = 1; // Inicializamos con el valor mínimo posible
    }

    // Recogemos accion
    $accion = recoge("accion");
    // Si recibimos "nueva", modificamos el número de carta
    if ($accion == "Nueva Carta") {
        $_SESSION["carta"] = rand(1, 10);
        if ($_SESSION["carta"] > $_SESSION["carta_Alta"]) {
            $_SESSION["carta_Alta"] = $_SESSION["carta"];
        }
    }

    if ($accion == "Reiniciar") {
        $_SESSION["carta"] = 1;
        $_SESSION["carta_Alta"] = 1;
    }

    // Volvemos al formulario
    header("location:index.php");
?>
