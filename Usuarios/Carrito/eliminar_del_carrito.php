<script>
    function displayMessage() {
        alert('Producto eliminado del carrito existosamente');
        location.replace('../Carrito/carrito.php');
    }
    function displayMessage1() {
        alert('Error al eliminar producto del carrito');
        location.replace('../Carrito/carrito.php');
    }
    function displayMessage2() {
        alert('Error: No se recibió la información del producto a eliminar');
        location.replace('../Carrito/carrito.php');
    }
</script>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $conexion = new mysqli("localhost", "root", "", "muebleria");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        $pro_id = $_GET["id"];
        $sql = "DELETE FROM carrito WHERE id = '$pro_id'";
        if ($conexion->query($sql) === TRUE) {
            echo '<script>
            displayMessage()
            </script>';
        }
        else {
            echo '<script>
            displayMessage1()
            </script>' . $conexion->error;
        }
        $conexion->close();
    }
    else {
        echo '<script>
        displayMessage2()
        </script>';
    }
?>