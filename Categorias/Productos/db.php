<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "muebleria";
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }
?>
