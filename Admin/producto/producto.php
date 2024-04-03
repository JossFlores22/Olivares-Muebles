<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Contenido/Imagenes/iconos/logo.ico" />
        <link rel="stylesheet" href="../../Estilos/Admin/producto.css">
        <title>
            OLIVARES MUEBLES - PRODUCTOS
        </title>
        <style>
            table {
                width: 70%;
                margin-left: 15%;
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
                Lista de Productos
            </h1>
            <a href="createproducto.php" class="btn">
                Agregar Producto
            </a>
            <table>
                <tr>
                    <th>
                        <center>
                            Código
                        </center>
                    </th>
                    <th>
                        <center>
                            Nombre
                        </center>
                    </th>
                    <th>
                        <center>
                            Categoría
                        </center>
                    </th>
                    <th>
                        <center>
                            Descripción
                        </center>
                    </th>
                    <th>
                        <center>
                            Precio
                        </center>
                    </th>
                    <th>
                        <center>
                            Imagen
                        </center>
                    </th>
                    <th>
                        <center>
                            Stock
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
                    $query = "SELECT * FROM productos";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td><center>".$row['codigo']."</center></td>";
                        echo "<td><center>".$row['nombrep']."</center></td>";
                        echo "<td><center>".$row['categoria']."</center></td>";
                        echo "<td><center>".$row['descripcion']."</center></td>";
                        echo "<td><center>".$row['precio']."</center></td>";
                        echo "<td><center><img src='".$row['imagen']."' width='50'></center></td>";
                        echo "<td><center>".$row['stock']."</center></td>";
                        echo "<td><center><a href='updateproducto.php?codigo=".$row['codigo']."' style='text-decoration:none; color:white;'>Editar</a><br><br>
                        <a href='deleteproducto.php?codigo=".$row['codigo']."' style='text-decoration:none; color:white;'>Eliminar</a></center></td>";
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