<?php
    $conexion = new mysqli("localhost", "root", "", "muebleria");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    $sql = "SELECT * FROM productos";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        echo "<h2>Productos Disponibles</h2>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>" . $row['nombrep'] . "</strong> - $" . $row['precio'];
            echo "<form action='agregar_al_carrito.php' method='post'>";
            echo "<input type='hidden' name='productos_id' value='" . $row['codigo'] . "'>";
            echo "<input type='submit' value='Agregar al Carrito'>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    }
    else {
        echo "No hay productos disponibles";
    }
    $conexion->close();
?>
