<?php
    require_once "funciones.php";
    $correo = $_POST['correo'];
    $nueva_contrasena = generarNuevaContrasena();
    actualizarContrasenaEnBD($correo, $nueva_contrasena);
    enviarCorreoConNuevaContrasena($correo, $nueva_contrasena);
    echo "Se ha enviado un correo electrónico con la nueva contraseña.";
?>
