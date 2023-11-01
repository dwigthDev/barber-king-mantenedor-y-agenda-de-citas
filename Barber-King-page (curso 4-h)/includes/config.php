<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "barberia";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
