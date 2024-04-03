<?php
    function generarNuevaContrasena() {
        $longitud = 10;
        $caracteres_permitidos = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $nueva_contrasena = '';
        for ($i = 0; $i < $longitud; $i++) {
            $nueva_contrasena .= $caracteres_permitidos[rand(0, strlen($caracteres_permitidos) - 1)];
        }
        return $nueva_contrasena;
    }
    function actualizarContrasenaEnBD($correo, $nueva_contrasena) {   
        $conexion = mysqli_connect("localhost", "root", "", "muebleria");
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
            exit();
        }
        $sql = "UPDATE usuarios SET contrasena = '$nueva_contrasena' WHERE correo = '$correo'";
        if (!mysqli_query($conexion, $sql)) {
            echo "Error al actualizar la contraseña: " . mysqli_error($conexion);
        }
        mysqli_close($conexion);
    }
    function enviarCorreoConNuevaContrasena($correo, $nueva_contrasena) {
        $asunto = 'Recuperación de contraseña';
        $mensaje = "Hemos recibido una solicitud para recuperar la contraseña de su cuenta. Su nueva contraseña es: $nueva_contrasena";
        $cabeceras = 'From: correo@tudominio.com' . "\r\n" .
                 'Reply-To: correo@tudominio.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        if (mail($correo, $asunto, $mensaje, $cabeceras)) {
            echo "Se ha enviado un correo electrónico con la nueva contraseña.";
        }
        else {
            echo "Error al enviar el correo electrónico.";
        }
    }
?>
