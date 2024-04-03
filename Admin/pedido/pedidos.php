<?php
    session_start();
    $_SESSION['usuario_id'] = 1 + 1;
    $conexion = new mysqli("localhost", "root", "", "muebleria");
    mysqli_set_charset($conexion, "utf8");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    $usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;
    $usuario = [];
    $fecha_limite = '';
    $referencia_pago = 'xxxxxxxxxxxxxxxxxxx';
    $total = 0;
    if ($usuario_id) {
        $sql_usuario = "SELECT nombreu, correo FROM usuarios WHERE id = $usuario_id";
        $resultado_usuario = $conexion->query($sql_usuario);
        if ($resultado_usuario && $resultado_usuario->num_rows > 0) {
            $usuario = $resultado_usuario->fetch_assoc();
        }
        $referencia_pago = 'xxxxxxxxxxxxxxxxxxx';
        $fecha_limite = date('Y-m-d', strtotime('+1 week'));
        $sql_carrito = "SELECT productos.codigo, productos.imagen, productos.nombrep, productos.precio FROM productos INNER JOIN carrito ON productos.codigo = carrito.productos_id";
        $resultado_carrito = $conexion->query($sql_carrito);
        if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
            while ($row = $resultado_carrito->fetch_assoc()) {
                $carrito[] = $row;
            }
        }
        $sql_total = "SELECT SUM(productos.precio) AS total FROM productos INNER JOIN carrito ON productos.codigo = carrito.productos_id";
        $resultado_total = $conexion->query($sql_total);
        if ($resultado_total && $resultado_total->num_rows > 0) {
            $total = $resultado_total->fetch_assoc()['total'];
        }
    }
    $conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Contenido/Imagenes/iconos/logo.ico" />
        <link rel="stylesheet" href="../../Estilos/Admin/usuarios.css">
        <title>
            OLIVARES MUEBLES - PEDIDOS
        </title>
        <style>
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
        <div class="container" style="color:white;">
            <center>
                <h1>
                    OLIVARES MUEBLES
                </h1>
                <h2>
                    Referencia de Pago
                </h2>
                <div class="user-info">
                    <p>
                        <strong>
                            Nombre del Usuario:
                        </strong>
                        <?php echo isset($usuario['nombreu']) ? $usuario['nombreu'] : ''; ?>
                    </p>
                    <p>
                        <strong>
                            Correo del Usuario:
                        </strong>
                        <?php echo isset($usuario['correo']) ? $usuario['correo'] : ''; ?>
                    </p>
                    <p>
                        <strong>
                            Fecha Límite:
                        </strong>
                        <?php echo $fecha_limite; ?>
                    </p>
                    <p>
                        <strong>
                            Referencia:
                        </strong>
                        <?php echo $referencia_pago; ?></>
                </div>
                <div class="cart-details">
                    <h3>
                        Detalles del Pedido:
                    </h3>
                    <?php if (!empty($carrito)) : ?>
                    <?php foreach ($carrito as $item) : ?>
                    <div class="cart-item">
                        <img src="<?php echo $item['imagen']; ?>" class="card-img-top" alt="..." style="width: 20%;">
                        <p>
                            <strong>
                                Codigo:
                            </strong>
                            <?php echo $item['codigo']; ?>
                        </p>
                        <p>
                            <strong>
                                Nombre:
                            </strong>
                            <?php echo $item['nombrep']; ?>
                        </p>
                        <p>
                            <strong>
                                Precio:
                            </strong> 
                            $<?php echo $item['precio']; ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <p>
                        El carrito está vacío
                    </p>
                    <?php endif; ?>
                </div>
                <p>
                    <strong>
                        Total:
                    </strong>
                    $<?php echo $total; ?>
                </p>
                <form action="../../Usuarios/Carrito/procesar/procesar_imprimir.php" method="post">
                    <input type="submit" value="Imprimir" class="comp">
                </form>
            </center>
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