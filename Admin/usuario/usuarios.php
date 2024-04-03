<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Contenido/Imagenes/iconos/logo.ico" />
        <link rel="stylesheet" href="../../Estilos/Admin/usuarios.css">
        <title>
            OLIVARES MUEBLES - USUARIOS
        </title>
        <style>
            table {
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #ff4000;
            }
            img {
                max-width: 50px;
            }
            .total-row td {
                text-align: right;
                font-weight: bold;
            }
            .empty-cart {
                font-style: italic;
                color: #888;
            }
            .buy-button {
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .buy-button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <img src="../../Contenido/Imagenes/iconos/logo.ico" alt="" width="1.5%" style="position: absolute;">
                    </li>
                    <li style="position: absolute; left:3%;">
                        <a href="../producto/producto.php">
                            Productos
                        </a>
                    </li>
                    <li style="position: absolute; left:8.5%;">
                        <a href="../usuario/usuarios.php">
                            Usuarios
                        </a>
                    </li>
                    <li style="position: absolute; left:13.5%;">
                        <a href="../pedido/pedidos.php">
                            Pedidos
                        </a>
                    </li>
                    <li style="position: absolute; right:0%">
                        <form action="../../cerrar.php" method="post">
                            <input type="submit" value="Cerrar sesión" style="background-color: red; color:white;">
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h1 style="color: white;">
                <center>
                    Lista de Usuarios
                </center>
            </h1>
            <table>
                <tr>
                    <th>
                        <center>
                            ID
                        </center>
                    </th>
                    <th>
                        <center>
                            Nombre
                        </center>
                    </th>
                    <th>
                        <center>
                            Fecha De Nacimiento
                        </center>
                    </th>
                    <th>
                        <center>
                            Calle
                        </center>
                    </th>
                    <th>
                        <center>
                            Número
                        </center>
                    </th>
                    <th>
                        <center>
                            Colonia
                        </center>
                    </th>
                    <th>
                        <center>
                            Telefóno
                        </center>
                    </th>
                    <th>
                        <center>
                            Correo
                        </center>
                    </th>
                    <th>
                        <center>
                            Contraseña
                        </center>
                    </th>
                    <th>
                        <center>
                            Acciones
                        </center>
                    </th>
                </tr>
                <?php
                    include 'db.php';
                    $query = "SELECT * FROM usuarios";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td><center>".$row['id']."</center></td>";
                        echo "<td><center>".$row['nombreu']."</center></td>";
                        echo "<td><center>".$row['fechanacimiento']."</center></td>";
                        echo "<td><center>".$row['calle']."</center></td>";
                        echo "<td><center>".$row['numero']."</center></td>";
                        echo "<td><center>".$row['colonia']."</center></td>";
                        echo "<td><center>".$row['telefono']."</center></td>";
                        echo "<td><center>".$row['correo']."</center></td>";
                        echo "<td><center>".$row['contrasena']."</center></td>";
                        echo "<td><center><a href='deleteusuarios.php?id=".$row['id']."'>Eliminar</a></center></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
    <footer>
        <div class="pie">
            <h1 class="pieti" style="color:white;">
                &copy; 2024 OLIVARES MUEBLES - Todos los derechos reservados
            </h1>
        </div>  
    </footer>
</html>