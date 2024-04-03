<script>
    function displayMessage1() {
        alert('Registro exitoso');
        location.replace('../inicio/login.php');
    } 
    function displayMessage2() {
        alert('Error al registrar usuario');
        location.replace('registro.php');
    }
</script>
<?php
    $conexion = mysqli_connect("localhost", "root", "", "muebleria");
    if (mysqli_connect_errno()) {
        echo "Error al conectar a MySQL: " . mysqli_connect_error();
        exit();
    }
    $nombreu = $_POST['nombreu'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $sql = "INSERT INTO usuarios (nombreu, fechanacimiento, calle, numero, colonia, telefono, correo, contrasena) VALUES ('$nombreu', '$fechanacimiento', '$calle', '$numero', '$colonia', '$telefono', '$correo', '$contrasena')";
    if (mysqli_query($conexion, $sql)) {
        echo '<script>
        displayMessage1()
        </script>';
    }
    else {
        echo '<script>
        displayMessage2()
        </script>'. mysqli_error($conexion);
    }
    mysqli_close($conexion);
?>
