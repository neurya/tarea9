<?php
session_start();
include 'config.php';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    // Obtener datos del usuario.
    $userID = $_SESSION['userID'];
    $query = "SELECT * FROM users WHERE id = '$userID'";
    $result = mysqli_query($conn, $query);
    $userData = mysqli_fetch_assoc($result);
    $nombre = $userData['nombre'];
    $apellido = $userData['apellido'];
}else{
    header('Location: index.php'); // si el usuario no está logueado, redirigirlo al inicio.
}

if(isset($_POST['update'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    
    // Actualizar en la base de datos.
    $updateQuery = "UPDATE users SET nombre = '$nombre', apellido = '$apellido' WHERE id = '$userID'";
    if(mysqli_query($conn, $updateQuery)){
        echo "Perfil actualizado con éxito.";
    }else{
        echo "Error al actualizar el perfil.";
    }
}
?>

<form method="post">
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>">
    Apellido: <input type="text" name="apellido" value="<?php echo $apellido; ?>">
    <input type="submit" name="update" value="Actualizar">
</form>
<form method="post" action="change_password.php">
    Contraseña actual: <input type="password" name="current_pwd">
    Nueva contraseña: <input type="password" name="new_pwd">
    Confirmar contraseña: <input type="password" name="confirm_pwd">
    <input type="submit" name="change" value="Cambiar contraseña">
</form>
