
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
    <nav class="navbar bg-dark">
        <div class="container-fluid bg-dark">
          <a class="navbar-brand color-white" style="color:white" href="#">
            <img src="../imagenes/barber-king.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
              Barber-King
          </a>
          <a href="../index.php" class="btn btn-warning"><i class="bi bi-arrow-left-square"></i> Pagina de inicio</a>
        </div>  
    </nav>
    </header>
    <section class="bg-primary-subtle">
          <div class="container txt-center d-flex justify-content-center p-3">👑<strong>Tus cortes de rey agendados</strong>👑</div>
    </section>
        <table class="table table-striped">
            <thead>
              <tr>
                  <th scope="col">Rut</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Fecha </th>
                  <th scope="col">Hora</th>
                  <th scope="col">acciones </th>
              </tr>
            </thead>
            <tbody>
                <?php
                  require("../includes/config.php");
                    $sql = $conexion -> query(
                      "SELECT c.*, cl.rut_cliente, cl.nombre_cliente, cl.apellido_cliente, cl.edad_cliente, cl.telefono_cliente 
                      FROM cita c 
                      LEFT JOIN cliente cl ON c.fk_rut_cliente = cl.rut_cliente" 
                    );
                    while($resultado = $sql->fetch_assoc()){
                    ?>
                        <tr>
                          <th scope="row"><?php echo $resultado["rut_cliente"]?></th>
                          <td><?php echo $resultado["nombre_cliente"]?></td>
                          <td><?php echo $resultado["telefono_cliente"]?></td>
                          <td><?php echo $resultado["fecha_cita"]?></td>
                          <td><?php echo $resultado["hora_cita"]?></td>                          
                          <td>
                            <a href="../includes/CRUD/editarform.php?id=<?php echo $resultado['fk_rut_cliente']?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                            <a href="../includes/CRUD/modificaciones/eliminar.php?id=<?php echo $resultado['fk_rut_cliente']?>" class="btn btn-danger"><i class="bi bi-trash"></i> </a>
                          </td>
                        </tr>
                    <?php  
                    }
                ?>
            </tbody>
          </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
