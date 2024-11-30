<?php
include("./src/config.php");
try{
$db = getDB();
echo'SI conecta la base de datos XD';
}
catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
?>