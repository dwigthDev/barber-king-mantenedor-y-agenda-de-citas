:<?php
    include("../config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="bg-dark">
<section class="vh-100  d-flex align-items-center bg-dark">
      <div class="container h-custom bg-dark">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="oculto col-md-9 col-lg-6 col-xl-5 d-flex justify-content-center">
            <img src="../../imagenes/barber-king.png"
              class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            
          <form method="post" action="modificaciones/editarDatos.php" > 
            <?php 
                include_once('../config.php');
                $id= $_REQUEST['id'];
                $sql = "SELECT cita.*, cliente.nombre_cliente, cliente.telefono_cliente
                FROM cita
                LEFT JOIN cliente ON cita.fk_rut_cliente = cliente.rut_cliente
                WHERE cita.fk_rut_cliente = '$id';
                " ;
                $resultado = $conexion->query($sql); 

                $row = $resultado->fetch_assoc();
            ?>

            <input type="hidden"  name="id" value="<?php echo $row['fk_rut_cliente']; ?>" class="form-control form-control-lg" />

            <h1 style="color:white; border-bottom: solid 2px white;">Edita los datos</h1>
            <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4" style="color:white ">nombre del cliente</label>
                <input type="text"  name="nombre" value="<?php echo $row['nombre_cliente']; ?>" class="form-control form-control-lg" />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4" style="color:white ">Telefono del cliente</label>
                <input type="text"  name="telefono" value="<?php echo $row['telefono_cliente']; ?>" class="form-control form-control-lg" />
            </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3" style="color:white ">Ingresa tu nueva fecha</label>
            <input type="date"  name="fecha" value="<?php echo $row['fecha_cita']; ?>" name="fecha" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your email address"  />
        </div>

        <div class="form-outline mb-3">
           <label class="form-label" for="form3Example4" style="color:white ">Ingresa tu nueva hora</label>
            <input type="time" name="hora" value="<?php echo $row['hora_cita']; ?>" name="hora" id="form3Example4" class="form-control form-control-lg" placeholder="Enter your password"  />
        </div>


        <div class="text-center text-lg-start mt-4 pt-2">
            <a href="modificaciones/editarDatos.php"><button type="submit" class="btn btn-warning"> Enviar</button></a>
            <a href="../../admin/admin.php" class="btn btn-warning">regresar</a>
        </div>
    </form>
          </div>
        </div>
      </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>