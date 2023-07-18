<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "crud_users";

    // Establecer la conexión
    $conexion = new mysqli($host, $username, $password, $database);

    // Verificar si hubo errores en la conexión
    if ($conexion->connect_errno) {
        die("Error al conectar a la base de datos: " . $conexion->connect_error);
    }

    // Cerrar la conexión
    $conexion->close();
?>
