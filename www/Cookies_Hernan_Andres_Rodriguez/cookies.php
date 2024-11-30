<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crear']) == "Crear Cookies") {
        setcookie("PROYECTO","PROYECTO",time()+(60*60*24*365),"/");
    }
    if (isset($_POST['borrar']) == "Borrar Cookies") {
        setcookie("PROYECTO","",time()-1000,"/");
    }
    header("Location: index.php");
}
