<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Contenido/Imagenes/iconos/logo.ico" />
        <link rel="stylesheet" href="../../Estilos/Usuarios/Carrito/carrito.css">
        <title>
            OLIVARES MUEBLES - CARRITO DE COMPRAS
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
                background-color: #ff4000;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .buy-button:hover {
                opacity: 80%;
            }
            .comp {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .comp {
                background-color: #ff4000;
                color: white;
                cursor: pointer;
            }
            .comp:hover {
                opacity: 80%;
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
                        <a href=".././indexu.php">
                            Inicio
                        </a>
                    </li>
                    <li style="position: absolute; left:6.5%;">
                        <a href="../Categorias/categoriasu.php">
                            Categorias
                        </a>
                    </li>
                    <li style="position: absolute; left:12.5%;">
                        <a href="../contactanosu.php">
                            Contactanos
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
        <h2 class="titulo">
            CARRITO DE COMPRAS
        </h2>
        <section class="seccion1" style="color:white;">
                <table>
                    <tr>
                        <th>
                            <center>
                                Imagen
                            <center>                                
                        </th>
                        <th>
                            <center>
                                Nombre
                            </center>
                        </th>
                        <th>
                            <center>
                                Precio
                            </center>
                        </th>
                        <th>
                            <center>
                                Accion
                            </center>
                        </th>
                    </tr>
                    <?php
                        $conexion = new mysqli("localhost", "root", "", "muebleria");
                        if ($conexion->connect_error) {
                            die("Error de conexión: " . $conexion->connect_error);
                        }
                        $sql = "SELECT carrito.id, productos.imagen, productos.nombrep, productos.precio FROM productos INNER JOIN carrito ON productos.codigo = carrito.productos_id";
                        $result = $conexion->query($sql);
                        $total = 0;
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><center><img src='" . $row['imagen'] . "' alt='" . $row['nombrep'] . "' width='50'></center></td>";
                                echo "<td><center>" . $row['nombrep'] . "</center></td>";
                                echo "<td><center>$" . $row['precio'] . "</center></td>";
                                echo "<td><center><a href='eliminar_del_carrito.php?id=".$row['id']."'>Eliminar</a></center></td>";
                                echo "</tr>";
                                $total += $row['precio'];
                            }
                        } else {
                            echo "<tr><td colspan='4' class='empty.cart'>El carrito está vacío</td></tr>";
                        }
                        $conexion->close();
                    ?>
                    <tr class="total-row">
                        <td colspan="2">
                            <strong>
                                Total:
                            </strong>
                        </td>
                        <td >
                            $
                            <?php echo $total; ?>
                        </td>
                        <td></td>
                    </tr>
                </table>
                <center>
                    <form action="procesar/procesar_compra.php" method="post">
                        <input type="submit" value="Comprar" class="buy-button comp">
                    </form>
                </center>
        </section>
    </body>
    <footer>
        <div> 
            <h1 class="pieti">
                &copy; 2024 OLIVARES MUEBLES - Todos los derechos reservados
            </h1>
        </div>  
    </footer>
</html>