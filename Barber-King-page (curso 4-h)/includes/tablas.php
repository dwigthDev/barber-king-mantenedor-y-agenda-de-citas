<?php
include 'config.php';

$consulta = "SELECT c.*, cl.rut_cliente, cl.nombre_cliente, cl.apellido_cliente, cl.edad_cliente, cl.telefono_cliente 
             FROM cita c 
             LEFT JOIN cliente cl ON c.fk_rut_cliente = cl.rut_cliente";

$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    echo "<h2>Datos de Clientes y Citas:</h2>";
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='thead-dark'><tr><th>Rut</th><th>Nombre</th><th>Teléfono</th><th>Fecha de Cita</th><th>Hora de Cita</th></tr></thead>";
    echo "<tbody>";
    
    // Fin del bucle (o cualquier otra lógica para mostrar datos)
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $fila["rut_cliente"] . "</td><td>" . $fila["nombre_cliente"]. "</td><td>" . $fila["telefono_cliente"] . "</td><td>" . $fila["fecha_cita"] . "</td><td>" . $fila["hora_cita"] . "</td></tr>";
    }
    
    echo "</tbody></table>";

} else {
    echo "No hay datos disponibles.";
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>citas Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    
</body>
</html>
