<?php
    include 'db.php';
    $codigo = $_POST['codigo'];
    $nombrep = $_POST['nombrep'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    $ruta_imagen = "../../Contenido/Imagenes/imgproductos/".$imagen;
    move_uploaded_file($imagen_temporal, $ruta_imagen);
    $stock = $_POST['stock'];
    $query = "UPDATE productos SET nombrep='$nombrep', categoria='$categoria', descripcion='$descripcion', precio='$precio', imagen='$ruta_imagen', stock='$stock' WHERE codigo='$codigo'";
    mysqli_query($conn, $query);
    header("Location: producto.php");
?>
