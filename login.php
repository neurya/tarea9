<?php
session_start();
include 'config.php';

// Mostrar errores de PHP (puedes removerlo en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";  // No escapamos la contraseña aquí porque vamos a hashearla.

    if ($email && $password) {  // Comprueba si ambos, email y contraseña, no están vacíos.
        
        $sql = "SELECT id, password FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($row && password_verify($password, $row['password'])) {
                $_SESSION['login_user'] = $email;
                header("location: index.php");
                exit; // Es bueno cerrar el script después de una redirección para asegurar que no sigue ejecutando código después.
            } else {
                $error = "Tu Email o Contraseña es inválida.";
                $_SESSION['login_error'] = $error;
                header("location: login.php");
                exit;
            }
        } else {
            $error = "Error al consultar la base de datos.";
            $_SESSION['login_error'] = $error;
            header("location: login.php");
            exit;
        }
    } else {
        $error = "Por favor, ingrese su Email y Contraseña.";
        $_SESSION['login_error'] = $error;
        header("location: login.php");
        exit;
    }
}
?>
