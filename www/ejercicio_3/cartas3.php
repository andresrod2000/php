<?php
    session_name("juegos01");
    session_start();
    
    if (!isset($_SESSION["carta"])) {
        header("location:index.php");
        exit;
    }


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
    

    $accion = recoge("accion");
    if ($accion == "Nueva Carta") {
        $_SESSION["carta"] = rand(1, 10);
    }

    header("location:index.php");
?>