<?php
include 'config.php';
session_start(); // Inicia la sesión

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página principal o a donde desees
header("Location: index.php"); // Cambia "index.php" a la página a la que deseas redirigir al usuario
exit();
?>