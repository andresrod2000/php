<?php
class userClass
{
public function userRegistration($username, $password, $email, $name)
{
    try {
        // Conexión a la base de datos usando PDO
        $db = getDB(); // Asegúrate de que esta función esté definida y retorne un objeto PDO

        // Preparar la consulta
        $query = $db->prepare("SELECT fun_insert_users(:username, :password, :email, :name)");

        // Ejecutar la consulta con los parámetros
        $query->execute([
            ':username' => $username,
            ':password' => $password,
            ':email' => $email,
            ':name' => $name
        ]);

        echo 'El cliente fue dado de alta';

    } catch (PDOException $e) {
        // Manejo de errores
        echo 'Error: ' . $e->getMessage();
    }
}
}
?>
