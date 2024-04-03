<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../Estilos/Usuarios/Categorias/Productos/producu.css">
        <link rel="shortcut icon" href="../../../Contenido/Imagenes/iconos/logo.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>
            OLIVARES MUEBLES - COMEDORES
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
                background-color: #ea7629;;
                color: white;
                cursor: pointer;
            }
            .comp:hover {
                opacity: 80%;
            }
        </style>
    </head>
    <body style="background-color: #ea7629;">
        <header>
            <nav>
                <ul>
                    <li>
                        <img src="../../../Contenido/Imagenes/iconos/logo.ico" alt="" width="1.5%" style="position: absolute;">
                    </li>
                    <li style="position: absolute; left:3%">
                        <a href="../../indexu.php">
                            Inicio
                        </a>
                    </li>
                    <li style="position: absolute; left: 6.5%;">
                        <a href="../categoriasu.php">
                            Categorias
                        </a>
                    </li>
                    <li style="position: absolute; left: 12.5%;">
                        <a href="../../contactanosu.php">
                            Contactanos
                        </a>
                    </li>
                    <li style="position: absolute; right:0%">
                        <form action="../../../cerrar.php" method="post">
                            <input type="submit" value="Cerrar sesión" style="background-color: red; color:white;">
                        </form>
                    </li>
                    <li>
                        <a href="../../Carrito/carrito.php" style="position: absolute; right:9%;" >
                            <img src="../../../Contenido/Imagenes/iconos/download.svg" alt="">
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h1 style="color: white;">
                COMEDORES
            </h1>
            <div class="row">
                <?php
                    include 'db.php';
                    $query = "SELECT imagen, nombrep, descripcion, precio, stock, codigo FROM productos WHERE categoria = 'Comedores'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: #ff4000; color:white;">
                        <img src="../<?php echo $row['imagen']; ?>" class="card-img-top" alt="..." width="200" height="200">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombrep']; ?></h5>
                            <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color: #ff4000; color:white;">
                                Precio: <?php echo $row['precio']; ?>
                            </li>
                        </ul>
                        <div class="card-body">
                            <form action="../../Carrito/agregar_al_carrito.php" method="post">
                                <input type="hidden" name="producto_id" value="<?php echo $row['codigo']; ?>">
                                <input type="submit" value="Añadir" class="card-link comp">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
    <footer>
        <div>
            <table>
	            <tr>
		            <th>
                        <p class="pieti" style="color:white;">
                            Sucursal 1
                        </p>
		            </th>
		            <th>
                        <p class="pieti" style="color:white;">
                            Sucursal 2
                        </p>
		            </th>
		            <td>
		            </td>
	            </tr>
	            <tr>
		            <td>
                        <p class="pieti" style="color:white;">
                            Prensa Libre #912
                        </p>
		            </td>
		            <td>
                        <p class="pieti" style="color:white;">
                            Blvd. Mariano Escobedo #4029
                        </p>
		            </td>
		            <td style="width: 450px;">
			            <a href="https://www.facebook.com/OlivaresMuebless" style="margin-left:190px;">
                            <img src="../../../Contenido/Imagenes/iconos/facebook.svg" alt="" width="50px" height="25px">
                        </a>
		            </td>
	            </tr>
	            <tr>
		            <td>
                        <p class="pieti" style="color:white;">
                            Col. Flores Magon
                        </p>
		            </td>
		            <td>
                        <p class="pieti" style="color:white;">
                            Col. San Marcos
                        </p>
		            </td>
		            <td style="width: 450px;">
			            <a href="https://www.instagram.com/olivares_muebles/" style="margin-left:190px;">
                            <img src="../../../Contenido/Imagenes/iconos/instagram.svg" alt="" width="50px" height="25px">
                        </a>
		            </td>
	            </tr>
	            <tr>
		            <td>
                        <p class="pieti" style="color:white;">
                            Tel: 777-00-70
                        </p>
		            </td>
		            <td>
                        <p class="pieti" style="color:white;">
                            Tel: 332-77-88
                        </p>
		            </td>
		            <td>
                        <p class="pieti" style="color:white;">
                            <img src="../../../Contenido/Imagenes/iconos/whatsapp.svg" alt="" style="height:25px;">
                            <br>
                            Sucursal 1 (479-231-6122) | Sucursal 2 (477-349-3957)
                        </p>
                    </td>
	            </tr>   
	            <tr>
		            <td colspan="3">
			            <h1 class="pieti" style="color:white;">
                            <br>
                            <br>
                            &copy; 2024 OLIVARES MUEBLES - Todos los derechos reservados
                        </h1>
		            </td>
	            </tr>
            </table>
        </div>  
    </footer>
</html>