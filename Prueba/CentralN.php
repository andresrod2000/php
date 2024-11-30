<?php
include("./src/config.php");
include('./class/NewuserClass.php');
$userClass = new userClass();

$errorMsgReg = '';
$errorMsgLogin = '';

/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
    $usernameEmail=$_POST['usernameEmail'];
    $password=$_POST['password'];
    if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
    {
        $uid=$userClass->userLogin($usernameEmail,$password);
        if($uid)
        {
            $url=BASE_URL.'..\CentralN\menu.html';
            header("Location: $url"); // Page redirecting to home.php 
        }
        else
        {
            $errorMsgLogin="No tiene acceso. Por favor, consulte con el Administrador";
        }
    }
}

/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordConfirm = trim($_POST['passwordConfirm']);
    $name=$_POST['name'];


/* Regular expression check */
    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if($username_check && $email_check && $password_check && strlen(trim($name))>0 && $password === $passwordConfirm) 
    {
        $uid=$userClass->userRegistration($username,$password,$email,$name);
        if($uid)
        {
            $url=BASE_URL.'..\CentralN\menu.html';
            header("Location: $url"); // Page redirecting to home.php
        }
        else
        {
        $errorMsgReg="Usuario ya existe.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body style="background: url('images/background1.jpg') no-repeat center center fixed; background-size: cover; font-family: Arial, sans-serif; color: white;">
    <!-- Importación de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Ingreso/Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="./css/login.css"> <!-- Asegúrate de que este archivo CSS exista -->
</head>
<body>
    <section class="forms-section">
        <h2>Bienvenido a Central Nexus!!</h2>
        <div class="forms">
            <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login ">
                    Ingresar
                    <span class="underline"></span>
                </button>
                <form method="post" action="" name="login" class="form form-login">
                    <fieldset>
                        <legend>Por favor, ingrese su correo y clave para iniciar sesión.</legend>
                        <div class="input-block">
                            <label>E-mail</label>
                            <input id="login-email" type="text" name="usernameEmail" required autocomplete="off" />
                        </div>
                        <div class="input-block">
                            <label>Contraseña</label>
                            <input id="login-password" type="password" name="password" required autocomplete="off" />
                        </div>
                        <div class="errorMsg"><?php echo htmlspecialchars($errorMsgLogin); ?></div>
                        <button type="submit" class="btn" name="loginSubmit">Ingresar</button>
                    </fieldset>
                </form>
            </div>

            <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                    Registrarse
                    <span class="underline"></span>
                </button>
                <form method="post" action="" name="signup" class="form form-signup">
                    <fieldset>
                        <legend>Por favor, ingrese su nombre de usuario, correo, clave y confirmación de clave para registrarse.</legend>
                        <div class="input-block">
                        <div class="input-block">
                            <label>Nombre completo</label>
                            <input type="text" name="name" required autocomplete="off" />
                        <div class="input-block">
                        </div>
                            <label>E-mail</label>
                            <input type="email" name="email" required autocomplete="off" />
                        
                        </div>
                            <label>Usuario</label>
                            <input type="text" name="username" required autocomplete="off" />
                        </div>
                        <div class="input-block">
                            <label>Contraseña</label>
                            <input type="password" name="password" required autocomplete="off" />
                        </div>
                        <div class="input-block">
                            <label for="signup-password-confirm">Confirmar contraseña</label>
                            <input id="signup-password-confirm" type="password" name="passwordConfirm" required autocomplete="off" />
                        </div>
                        <div class="errorMsg"><?php echo htmlspecialchars($errorMsgReg); ?></div>
                        <button type="submit" class="btn" name="signupSubmit">Continuar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <script src="./js/main.js"></script> <!-- Asegúrate de que este archivo JS exista -->
</body>
</html>