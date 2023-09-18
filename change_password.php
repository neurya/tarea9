<?php
session_start();
include 'config.php';

if(isset($_POST['change'])){
    $currentPwd = $_POST['current_pwd'];
    $newPwd = $_POST['new_pwd'];
    $confirmPwd = $_POST['confirm_pwd'];

    if(md5($currentPwd) == $userData['password'] && $newPwd == $confirmPwd){
        $updatePwdQuery = "UPDATE users SET password = '".md5($newPwd)."' WHERE id = '$userID'";
        if(mysqli_query($conn, $updatePwdQuery)){
            echo "Contraseña actualizada con éxito.";
        }else{
            echo "Error al actualizar la contraseña.";
        }
    }else{
        echo "Contraseña actual incorrecta o las contraseñas no coinciden.";
    }
}
?>
