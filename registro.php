<?php
include 'accesobd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    // Validar y sanitizar entrada
    $nombre = trim($nombre);
    $clave = trim($clave);

    if (empty($nombre) || empty($clave)) {
        echo "ErrorRegistro";
        exit();
    }

    // Verifica si el nombre de usuario ya existe
    $consulta = "SELECT * FROM usuarios WHERE nombre = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "UsuarioExiste";
        exit();
    }

    // Insertar el nuevo usuario en la base de datos con la contraseña en texto plano
    $consulta_insertar = "INSERT INTO usuarios (nombre, clave) VALUES (?, ?)";
    $stmt = $conn->prepare($consulta_insertar);
    $stmt->bind_param("ss", $nombre, $clave);

    if ($stmt->execute()) {
        echo "RegistroExitoso";
    } else {
        echo "ErrorRegistro";
    }
}
