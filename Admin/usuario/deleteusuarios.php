<?php
    include 'db.php';
    $codigo = $_GET['id'];
    $query = "DELETE FROM usuarios WHERE id='$codigo'";
    mysqli_query($conn, $query);
    header("Location: usuarios.php");
?>
