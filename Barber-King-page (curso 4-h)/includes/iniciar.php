<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM usuario WHERE gmail_usuario = '$usuario' AND contraseña_usuario = '$contrasena'";
    $result = $conexion->query($query);
    
    if ($usuario == "cainAdmin" && $contrasena == "admin123") {
      // Iniciar la sesión
      session_start();

      // Establecer una variable de sesión para indicar que el usuario está conectado
      $_SESSION['logged_in'] = true;
      
      header("Location: ../admin/admin.php"); // Redirige a la página de administrador si las credenciales son correctas
      exit();
  }
    if ($result->num_rows > 0) {
                  // Iniciar la sesión
                  session_start();

                  // Establecer una variable de sesión para indicar que el usuario está conectado
                  $_SESSION['logged_in'] = true;
      
      header("Location: ../index.php"); // si el login funciona, te redirige a la pagina principal 
      exit();
    } else {
      echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>
 <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="css/registro.css">
  </head>
  <body>
    <section class="vh-100  d-flex align-items-center bg-dark">
      <div class="container h-custom bg-dark">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="oculto col-md-9 col-lg-6 col-xl-5 d-flex justify-content-center">
            <img src="../imagenes/barber-king.png"
              class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            
          <form method="post" action="iniciar.php"> 
            <h1 style="color:white; border-bottom: solid 2px white;">Inicia sesion:</h1>
        <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3" style="color:white ">Ingresa tu correo electrónico</label>
            <input type="text" name="usuario" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your email address" required />
        </div>

        <div class="form-outline mb-3">
           <label class="form-label" for="form3Example4" style="color:white ">Ingresa tu contraseña</label>
            <input type="password" name="contrasena" id="form3Example4" class="form-control form-control-lg" placeholder="Enter your password" required />
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3" style="color:white">Recordar</label>
            </div>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
            <button class="btn btn-warning" type="submit" >Iniciar Sesión</button>
            <p class="small fw-bold mt-2 pt-1 mb-0" style="color:white ">¿No tienes cuenta? <a href="registro.php" class="link-warning">Registrarme</a></p>
        </div>
    </form>
          </div>
        </div>
      </div>
    </section>
      <script src="js/validar_registro.js"></script>
  </body>
  </html>
