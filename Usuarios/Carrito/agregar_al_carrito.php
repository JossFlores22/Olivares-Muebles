<script>
    function displayMessage() {
        alert('Error: No se encontró el precio del producto.');
        location.replace('../Carrito/carrito.php');
    }
    function displayMessage1() {
        alert('Producto agregado al carrito existosamente');
        location.replace('../Carrito/carrito.php');
    }
    function displayMessage2() {
        alert('Error al agregar al carrito');
        location.replace('../Carrito/carrito.php');
    }
    function displayMessage3() {
        alert('Error: No se recibió la información del producto');
        location.replace('../Carrito/carrito.php');
    }
</script>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto_id"])) {
        $producto_id = $_POST["producto_id"];
        $conexion = new mysqli("localhost", "root", "", "muebleria");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        $query_precio = "SELECT precio FROM productos WHERE codigo = '$producto_id'";
        $resultado_precio = $conexion->query($query_precio);
        if ($resultado_precio->num_rows > 0) {
            $row_precio = $resultado_precio->fetch_assoc();
            $precio = $row_precio['precio'];
        }
        else {
            echo '<script>
            displayMessage()
            </script>';
            exit;
        }
        $sql = "INSERT INTO carrito (productos_id, cantidad) VALUES ('$producto_id', '$precio')";
        if ($conexion->query($sql) === TRUE) {
            echo '<script>
            displayMessage1()
            </script>';
        }
        else {
            echo '<script>
            displayMessage2()
            </script>' . $conexion->error;
        }    
        $conexion->close();
    }
    else {
        echo '<script>
        displayMessage3()
        s</script>';
    }
?>