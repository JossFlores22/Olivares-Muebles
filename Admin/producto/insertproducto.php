<?php
    include 'db.php';
    $nombrep = $_POST['nombrep'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_imagen = "../../Contenido/Imagenes/imgproductos/".$imagen;
    move_uploaded_file($imagen_temporal, $ruta_imagen);
    $stock = $_POST['stock'];
    $query = "INSERT INTO productos (nombrep, categoria, descripcion, precio, imagen, stock) VALUES ('$nombrep', '$categoria', '$descripcion', '$precio', '$ruta_imagen', '$stock')";
    mysqli_query($conn, $query);
    header("Location: producto.php");
?>