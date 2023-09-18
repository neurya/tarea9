<?php
session_start(); // Iniciar sesión
//$perfil = 2;  // Valor predeterminado para Usuario.
// Código PHP para conectar a la base de datos y procesar el formulario
$host = 'localhost';
$db   = 'biblioteca';
$user = 'root';
$pass = 'RMleon@2909';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Resto del código para la conexión...

$default_profile = 2; // Valor predeterminado para "Usuario".

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['cedula']) && !empty($_POST['cedula']) &&
        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
        isset($_POST['direccion']) && !empty($_POST['direccion'])
    ) {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $profile_id = isset($_POST['profile']) && !empty($_POST['profile']) ? $_POST['profile'] : $default_profile;

        try {
            $stmt = $pdo->prepare('INSERT INTO users (email, password, cedula, telefono, direccion, profile_id) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$email, $password, $cedula, $telefono, $direccion, $profile_id]);

            // Código para manejar el registro exitoso:
            $_SESSION['registro_exitoso'] = true;
            $_SESSION['message'] = "Registro exitoso!";
            header("Location: index.php"); 
            exit();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } // Falta este bloque else para manejar el caso en que no se envíen todos los campos
    else {
        echo "Por favor, completa todos los campos del formulario.";
    }
}  // Esta es la llave de cierre que faltaba para el bloque if principal
?>


<!-- Resto del código HTML -->


