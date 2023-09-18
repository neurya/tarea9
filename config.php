<?php
$host = 'localhost'; // generalmente es 'localhost'
$user = 'root'; 
$password = 'RMleon@2909'; 
$dbname = 'biblioteca'; 

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
