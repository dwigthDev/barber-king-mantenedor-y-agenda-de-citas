<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = mysqli_real_escape_string($conexion, $_POST['rut']); // Nuevo campo rut
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : null;
    $edad = isset($_POST['edad']) ? mysqli_real_escape_string($conexion, $_POST['edad']) : null;
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);
    $hora = mysqli_real_escape_string($conexion, $_POST['hora']);
    $servicio = mysqli_real_escape_string($conexion, $_POST['servicio']);

    // Verifica si el cliente ya existe en la base de datos
    $query_buscar_cliente = "SELECT rut_cliente FROM cliente WHERE rut_cliente = '$rut'";
    $resultado_cliente = $conexion->query($query_buscar_cliente);

    if ($resultado_cliente->num_rows > 0) {
        // El cliente ya existe, obtén su ID
        $cliente = $resultado_cliente->fetch_assoc();
        $cliente_id = $cliente['id_cliente'];
    } else {
        // El cliente no existe, inserta los datos del cliente
        $query_cliente = "INSERT INTO cliente (nombre_cliente, telefono_cliente, rut_cliente) 
                          VALUES ('$nombre', '$telefono', '$rut')";
        
        if ($conexion->query($query_cliente) === TRUE) {
            $cliente_id = $conexion->insert_id;
        } else {
            // Ocurrió un error al guardar la información del cliente, muestra un mensaje de error
            echo "Error al registrar la información del cliente. Inténtalo de nuevo.";
            exit();
        }
    }

    // Inserta los datos en la tabla "cita" con el valor de fk_rut_cliente
    $query_cita = "INSERT INTO cita (hora_cita, fecha_cita, fecha_emision_cita, fk_rut_cliente, fk_id_sede) 
                    VALUES ('$hora', '$fecha', NOW(), '$rut', NULL)";

    if ($conexion->query($query_cita) === TRUE) {
        // La reserva se ha guardado correctamente, puedes redirigir o mostrar un mensaje de éxito
        echo '<div class="alert alert-warning" role="alert">  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        Se ha agendado tu cita
      </div>';
        header('Location: ../index.php');
        exit();
    } else {
        // Ocurrió un error al guardar la reserva, muestra un mensaje de error
        echo "Error al registrar la cita. Inténtalo de nuevo.";
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Cita - Barbería</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container mt-5 bg-dark ">
        <h2 class="text-center " style="color:white;">Reservar Cita</h2>
        <form method="post" action="reserva.php" class="bg-dark">
            <!-- Tu formulario HTML aquí -->
            <!-- Nombre del cliente -->
            <!-- Nombre del cliente -->
        <div class="form-group">
            <label style="color:white;" for="rut">Rut del cliente:</label>
            <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingresa el rut del cliente" required>
        </div>

            <div class="form-group">
                <label style="color:white;"for="nombre">Nombre del Cliente:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
            </div>  

            <!-- Teléfono del cliente -->
            <div class="form-group">
                <label style="color:white;"for="telefono">Número de Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono" required>
            </div>

            <!-- Fecha de la cita -->
            <div class="form-group">
                <label style="color:white;"for="fecha">Fecha de la Cita:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <!-- Hora de la cita -->
            <div class="form-group">
                <label style="color:white;" for="hora">Hora de la Cita:</label>
                <input type="time" class="form-control" id="hora" name="hora" required>
            </div>

            <!-- Tipo de servicio -->
            <div class="form-group">
                <label style="color:white;" for="servicio">Tipo de Servicio:</label>
                <select class="form-control" id="servicio" name="servicio" required>
                    <option value="">Selecciona un servicio</option>
                    <option value="corte">Corte de pelo adulto</option>
                    <option value="corte_nino">Corte de pelo niño</option>
                    <option value="barba">Recorte de Barba</option>
                </select>
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-warning">Reservar Cita</button>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS (opcional, solo si necesitas funcionalidades de JavaScript de Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
