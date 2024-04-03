<?php
    include 'db.php';
    $codigo = $_GET['codigo'];
    $query_carrito = "DELETE FROM carrito WHERE productos_id='$codigo'";
    mysqli_query($conn, $query_carrito);
    $query_producto = "DELETE FROM productos WHERE codigo='$codigo'";
    mysqli_query($conn, $query_producto);
    header("Location: producto.php");
?>
