<?php
include_once("../../config.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$sql = "UPDATE cita
        LEFT JOIN cliente ON cita.fk_rut_cliente = cliente.rut_cliente
        SET cita.fecha_cita = '$fecha', cliente.nombre_cliente = '$nombre', cita.hora_cita ='$hora', cliente.telefono_cliente = '$telefono'
        WHERE cita.fk_rut_cliente = '$id';
";
        
if ($resultado = $conexion->query($sql)) {
    header("location: ../../../admin/admin.php");
} else {
    echo "Error en la actualización: " . $conexion->error;
}
?>


