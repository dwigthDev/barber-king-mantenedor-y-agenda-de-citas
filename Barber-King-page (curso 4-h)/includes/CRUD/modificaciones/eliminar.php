<?php
include_once("../../config.php");

$id = $_GET['id'];

$sql = "DELETE FROM cita WHERE fk_rut_cliente = '$id'";

$query = mysqli_query($conexion,$sql);
if ($query === TRUE) {
    header("location: ../../../admin/admin.php");
} 
?>