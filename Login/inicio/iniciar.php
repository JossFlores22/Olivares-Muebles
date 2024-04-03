<script>
    function displayMessage() {
        alert('Correo o contraseña incorrectos');
        location.replace('login.php');
    }
</script>
<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "muebleria");
    if (mysqli_connect_errno()) {
        echo "Error al conectar a MySQL: " . mysqli_connect_error();
        exit();
    }
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['correo'] = $usuario['correo'];
        if ($correo == 'jofl6230@gmail.com' && $contrasena == 'jadjsf226') {
            header('Location: ../../Admin/producto/producto.php');
        }
        else {
            header('Location: ../../Usuarios/indexu.php');
        }
    }
    else {
        echo '<script>
        displayMessage()
        </script>';
    }
    mysqli_close($conexion);
?>