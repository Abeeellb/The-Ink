<?php
include "accesobd.php";

// Verificar si se ha enviado el formulario para recuperar la clave
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el nombre de usuario del formulario
    $nombre = $_POST["nombre"];

    // Consultar la base de datos para verificar si el nombre de usuario existe
    $consulta = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows > 0) {
        // El nombre de usuario existe, devolver respuesta positiva al cliente
        echo "existe";
    } else {
        // El nombre de usuario no existe, devolver respuesta negativa al cliente
        echo "noExiste";
    }
}

$conn->close();
