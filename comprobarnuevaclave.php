<?php
include "accesobd.php";

// Verificar si se ha enviado el formulario para cambiar la contraseña
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $clave = $_POST["clave"];
    $nombre = $_POST["nombre"];

    // Consultar la base de datos para verificar si el nombre de usuario existe
    $consulta = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows > 0) {
        // El nombre de usuario existe, proceder a actualizar la contraseña
        $consulta = "UPDATE usuarios SET clave = '$clave' WHERE nombre = '$nombre'";
        $resultado = $conn->query($consulta);

        // Verificar si se realizó la actualización correctamente
        if ($resultado === TRUE) {
            echo "claveExito";
        } else {
            echo "errorClave";
        }
    } else {
        // El nombre de usuario no existe
        echo "errorUsuario";
    }
}

$conn->close();
