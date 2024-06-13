<?php
session_start();
include "accesobd.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];

    // Consultar la base de datos para obtener la información del usuario
    $consulta = "SELECT * FROM usuarios WHERE nombre = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $clave_almacenada = $usuario['clave'];

        // Verificar la contraseña sin hashear
        if ($clave === $clave_almacenada) {
            // Iniciar sesión
            $_SESSION['nombre_usuario'] = $nombre;
            header("Location: index.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: iniciarsesion.php?error=1");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: iniciarsesion.php?error=1");
        exit();
    }
}

$conn->close();
