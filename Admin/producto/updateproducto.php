<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Contenido/Imagenes/iconos/logo.ico" />
        <link rel="stylesheet" href="../../Estilos/Admin/producto.css">
        <title>
            EDITAR PRODUCTO
        </title>
        <style>
            .form-container {
                width: 50%;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .form-container input[type="text"],
            .form-container input[type="date"],
            .form-container input[type="number"],
            .form-container input[type="email"],
            .form-container input[type="password"],
            .form-container input[type="submit"]
            .form-container input[type="file"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .form-container input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
            }
            .form-container input[type="submit"]:hover {
                background-color: #45a049;
            }
            .center-content {
                text-align: center;
            }
            .login-link {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .login-link:hover {
                background-color: #45a049;
            }
            .custom-select,
            .file-input {
                display: block;
                font-size: 16px;
                font-family: Arial, sans-serif;
                text-align: center;
                color: #333;
                line-height: 1.3;
                padding: .5em 1em;
                width: 100%;
                box-sizing: border-box;
                margin: 0 auto;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
            }
            .custom-select option {
                font-size: 16px;
                font-family: Arial, sans-serif;
            }
            .custom-select option:checked {
                background-color: #f0f0f0;
            }
            .file-input option {
                font-size: 16px;
                font-family: Arial, sans-serif;
            }
            .file-input option:checked {
                background-color: #f0f0f0;
            }
            .file-input:hover {
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
                    <li style="position: absolute; right:0%">
                        <a href="./producto.php">
                            Regresar
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h1 style="color: white;">
                Editar Producto
            </h1>
            <?php
                include 'db.php';
                $codigo = $_GET['codigo'];
                $query = "SELECT * FROM productos WHERE codigo='$codigo'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
            ?>
            <center>
                <div class="form-container">
                    <form action="editproducto.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
                        <label for="nombrep" style="color:white;">
                            Nombre
                        </label>
                        <br>
                        <input type="text" id="nombrep" name="nombrep" value="<?php echo $row['nombrep']; ?>" required>
                        <br>
                        <label for="categoria" style="color:white;">
                            Categorias
                        </label>
                        <br>
                        <select name="categoria" class="custom-select" required>
                            <option value="" disabled>
                                Selecciona una categoría
                            </option>
                            <option value="Cajoneras" <?php if($row['categoria'] == 'Cajoneras') echo 'selected'; ?>>
                                Cajoneras
                            </option>
                            <option value="Comedores" <?php if($row['categoria'] == 'Comedores') echo 'selected'; ?>>
                                Comedores
                            </option>
                            <option value="Comodas" <?php if($row['categoria'] == 'Comodas') echo 'selected'; ?>>
                                Comodas
                            </option>
                            <option value="Colchones" <?php if($row['categoria'] == 'Colchones') echo 'selected'; ?>>
                                Colchones
                            </option>
                            <option value="Decoracion" <?php if($row['categoria'] == 'Decoracion') echo 'selected'; ?>>
                                Decoracion
                            </option>
                            <option value="Electodomesticos" <?php if($row['categoria'] == 'Electodomesticos') echo 'selected'; ?>>
                                Electodomesticos
                            </option>
                            <option value="Linea blanca" <?php if($row['categoria'] == 'Linea blanca') echo 'selected'; ?>>
                                Linea blanca
                            </option>
                            <option value="Linea infantil" <?php if($row['categoria'] == 'Linea infantil') echo 'selected'; ?>>
                                Linea infantil
                            </option>
                            <option value="Mesas" <?php if($row['categoria'] == 'Mesas') echo 'selected'; ?>>
                                Mesas
                            </option>
                            <option value="Muebles" <?php if($row['categoria'] == 'Muebles') echo 'selected'; ?>>
                                Muebles
                            </option>
                            <option value="Recamaras" <?php if($row['categoria'] == 'Recamaras') echo 'selected'; ?>>
                                Recamaras
                            </option>
                            <option value="Roperos" <?php if($row['categoria'] == 'Roperos') echo 'selected'; ?>>
                                Roperos
                            </option>
                            <option value="Salas" <?php if($row['categoria'] == 'Salas') echo 'selected'; ?>>
                                Salas
                            </option>
                            <option value="Televisiones" <?php if($row['categoria'] == 'Televisiones') echo 'selected'; ?>>
                                Televisiones
                            </option>
                            <option value="Vitrinas" <?php if($row['categoria'] == 'Vitrinas') echo 'selected'; ?>>
                                Vitrinas
                            </option>
                        </select>
                        <br>
                        <label for="descriçion" style="color:white;">
                            Descripción
                        </label>
                        <br>
                        <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" required>
                        <br>
                        <label for="precio" style="color:white;">
                            Precio
                        </label>
                        <br>
                        <input type="number" id="precio" name="precio" value="<?php echo $row['precio']; ?>" required>
                        <br>
                        <label for="imagen" style="color:white;">
                            Imagen
                        </label>
                        <br>
                        <input type="file" id="imagen" name="imagen" value="<?php echo $row['imagen']; ?>" class="file-input" required>
                        <br>
                        <label for="Stock" style="color:white;">
                            Stock
                        </label>
                        <br>
                        <input type="number" id="stock" name="stock" value="<?php echo $row['stock']; ?>" required>
                        <br>
                        <button type="submit" class="btn">
                            Actualizar Producto
                        </button>
                    </form>
                </div>
            </center>
        </div>
    </body>
    <footer style="margin-top: 53.1249px;">
        <div class="pie">
            <h1 class="pieti" style="color: white;">
                &copy; 2024 OLIVARES MUEBLES - Todos los derechos reservados
            </h1>
        </div>  
    </footer>
</html>