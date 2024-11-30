<?php

require_once"conectpdo.php";

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];

$consulta = $pdo->prepare("SELECT fun_insert_users(wusername,wpassword,wemail,wname)
VALUES(:usarname,:email,:password,:name)");

$consulta->bindParam(':usermane',$username);
$consulta->bindParam(':email',$email);
$consulta->bindParam(':password',$password);
$consulta->bindParam(':name',$name);

if($consulta ->execute()){
    echo "Datos guardados :b";
}else {
    echo" No se guardaron datos :c";
}
?>



<?php
// este es lo principal si esto de verdad funciona
if (isset($_POST['name'])&& isset($_POST['username'])&& isset($_POST['email'])&& isset($_POST['password'])) 
    
require_once"conectpdo.php"

?>