<?php 
include "config.php";

if (isset($_POST['register'])) {
    $rutCliente = mysqli_real_escape_string($conexion, $_POST["rut_cliente"]);
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre_cliente"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido_cliente"]);
    $telefono = mysqli_real_escape_string($conexion, $_POST["telefono_cliente"]);
    $edad = mysqli_real_escape_string($conexion, $_POST["edad_cliente"]);
    $correo = mysqli_real_escape_string($conexion, $_POST["correo"]);
    $contraseña = mysqli_real_escape_string($conexion, $_POST["contraseña"]);

    if (strlen($rutCliente) >= 1 &&
        strlen($nombre) >= 1 &&
        strlen($telefono) >= 1 &&
        strlen($apellido) >= 1 &&
        strlen($edad) >= 1 &&
        strlen($correo) >= 1 &&
        strlen($contraseña) >= 1) {

        $consultaUno = "INSERT INTO usuario (gmail_usuario, contraseña_usuario) VALUES ('$correo', '$contraseña')";
        $resultadoUno = mysqli_query($conexion, $consultaUno);

        $consultaDos = "INSERT INTO cliente (rut_cliente, nombre_cliente, apellido_cliente, edad_cliente, telefono_cliente) VALUES ('$rutCliente', '$nombre', '$apellido', '$edad','$telefono')";
        $resultadoDos = mysqli_query($conexion, $consultaDos);

        if ($resultadoUno && $resultadoDos) {
            // Iniciar la sesión
            session_start();

            // Establecer una variable de sesión para indicar que el usuario está conectado
            $_SESSION['logged_in'] = true;

            // Redirigir a la página principal
            header("Location: ../index.php");
            exit();
        } else {
            echo "<h1>El registro no fue exitoso. Error: " . mysqli_error($conexion) . "</h1>";
        }
    } else {
        echo "<h1>DEBE INGRESAR TODOS LOS DATOS</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body class="bg-dark">
<div class="container"> 
            <div class="container d-flex justify-content-center">
                 <h1 class="txt-center" style="color:white">Ingresa tus datos</h1>
            </div>
            <form method="post" action="registro.php">
                <div class="form-outline ">
                    <label class="form-label" for="rut_cliente" style="color:white; " >RUT:</label>
                    <input class="form-control form-control-lg" type="text" id="rut_cliente" name="rut_cliente" placeholder="ingresa tu rut"><br>
                </div>

                <div class="form-outline ">
                    <label for="nombre" style="color:white">Nombre:</label>
                    <input  class="form-control form-control-lg"type="text" id="nombre" name="nombre_cliente" placeholder="ingresa tu nombre"><br>
                </div>
                <div class="form-outline ">
                    <label for="apellido" style="color:white">Apellido:</label>
                    <input  class="form-control form-control-lg"type="text" id="apellido" name="apellido_cliente" placeholder="ingresa tu apellido"><br>
                </div>
                <div class="form-outline ">
                    <label for="telefono" style="color:white">Numero telefonico:</label>
                    <input  class="form-control form-control-lg"type="tel" id="telefono" name="telefono_cliente" placeholder="ingresa tu numero"><br>
                </div>
                <div class="form-outline ">
                    <label for="edad" style="color:white">Edad:</label>
                    <input  class="form-control form-control-lg"type="number" id="edad" name="edad_cliente" placeholder="ingresa tu edad"><br>
                </div>
                <div class="form-outline ">
                    <label for="correo" style="color:white">Correo:</label>
                    <input class="form-control form-control-lg" type="email" id="correo" name="correo" placeholder="ingresa tu correo"><br>
                </div>
                
                <label for="contraseña" style="color:white">Contraseña:</label>
                <input  class="form-control form-control-lg"type="password" id="contraseña" name="contraseña" placeholder="ingresa tu contraseña"><br>

                <input  class="btn btn-warning m-3" type="submit" name="register" value="Enviar">
            </form>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
