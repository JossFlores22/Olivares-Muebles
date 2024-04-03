<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../Contenido/Imagenes/iconos/logo.ico" />
        <link rel="stylesheet" href="../../Estilos/Login/login.css">
        <title>
            OLIVARES MUEBLES - LOGIN
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
            .form-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .form-container input[type="submit"] {
                background-color: #ff4000;
                color: white;
                cursor: pointer;
            }
            .form-container input[type="submit"]:hover {
                opacity: 80%;
            }
            .center-content {
                text-align: center;
            }
            .login-link {
                display: inline-block;
                padding: 10px 20px;
                background-color: #ff4000;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .login-link:hover {
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
                        <a href="../../index.php">
                            Inicio
                        </a>
                    </li>
                    <li style="position: absolute; left:6.5%;">
                        <a href="../../Categorias/categorias.php">
                            Categorias
                        </a>
                    </li>
                    <li style="position: absolute; left:12.5%;">
                        <a href="../../contactanos.php">
                            Contactanos
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <h1 style="color:  white;">
            LOGIN
        </h1>
        <center>
            <div class="form-container">
                <form action="iniciar.php" method="post">
                    <label for="correo" style="color:white">
                        Correo: 
                    </label>
                    <br>
                    <input type="email" id="correo" name="correo" required>
                    <br>
                    <label for="contrasena" style="color:white; ">
                        Contraseña: 
                    </label>
                    <input type="password" id="contrasena" name="contrasena" required>
                    <br>
                    <input type="submit" value="Iniciar sesión">            
                    <div class="center-content" style="color: white;">
                        <a href="../registro/registro.php" class="login-link">
                            Registro
                        </a>
                    </div>
                </form>
            </div>
            <br>
        </center>
    </body>
    <br>
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
			            <a href="https://www.facebook.com/OlivaresMuebless"1 style="margin-left:200px;">
                            <img src="../../Contenido/Imagenes/iconos/facebook.svg" alt="" width="50px" height="25px">
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
			            <a href="https://www.instagram.com/olivares_muebles/" style="margin-left:200px;">
                            <img src="../../Contenido/Imagenes/iconos/instagram.svg" alt="" width="50px" height="25px">
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
                            <img src="../../Contenido/Imagenes/iconos/whatsapp.svg" alt="" style="height:25px;">
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