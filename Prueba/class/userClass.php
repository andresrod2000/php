<?php
class userClass
{
/* User Login */
public function userLogin($usernameEmail,$password)
{
try{
$db = getDB();
$hash_password= hash('sha256', $password); //Password encryption 
$stmt = $db->prepare("SELECT uid FROM users WHERE (username=:usernameEmail or email=:usernameEmail) AND password=:hash_password"); 
$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetch(PDO::FETCH_OBJ);
$db = null;
if($count)
{
$_SESSION['uid']=$data->uid; // Storing user session value
return true;
}
else
{
return false;
} 
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}

/* User Registration */
public function userRegistration($username, $password, $email, $name)
{
    try  {
        $db = getDB();
        $st = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email");
        $st->bindParam("username", $username, PDO::PARAM_STR);
        $st->bindParam("email", $email, PDO::PARAM_STR);
        $st->execute();
        $count = $st->rowCount();

        if ($count < 1) {  // es lo que falta pero no se donde ponerlo (isset($_POST["signupSubmit"]))
            $stmt = $db->prepare("SELECT fun_insert_users(?,?,?,?)");
            $hash_password = password_hash($password, PASSWORD_BCRYPT); // Mejor encriptación de contraseñas
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->bindParam(2, $hash_password, PDO::PARAM_STR);
            $stmt->bindParam(3, $email, PDO::PARAM_STR);
            $stmt->bindParam(4, $name, PDO::PARAM_STR);
            $stmt->execute();
            $uid = $db->lastInsertId();
            $db = null;
            $_SESSION['uid'] = $uid;
            return true;
        } else {
            $db = null;
            return false;
        }
    } catch (PDOException $e) {
        // Log de errores y mensaje genérico
        error_log("Error en el registro de usuario: " . $e->getMessage());
        echo '{"error":{"text":"Ocurrió un error, intente nuevamente."}}';
    }
}


/* User Details */
public function userDetails($uid)
{
try{
$db = getDB();
$stmt = $db->prepare("SELECT email,username,name FROM users WHERE uid=:uid"); 
$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
return $data;
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}
}
?>
