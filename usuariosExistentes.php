<?php

include "accesobd.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Consultar la base de datos para obtener la lista de usuarios existentes
    $consulta = "SELECT nombre FROM usuarios";
    $resultado = $conn->query($consulta);

    $usuarios_existentes = array();

    // Almacenar los nombres de usuario en un array
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios_existentes[] = $fila["nombre"];
    }

    // Enviar la lista de usuarios existentes como respuesta
    echo json_encode($usuarios_existentes);

    // Cerrar la conexión a la base de datos
    $conn->close();
}