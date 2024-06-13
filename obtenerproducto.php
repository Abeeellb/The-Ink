<?php
// Incluir el archivo de conexión a la base de datos
include "accesobd.php";

// Configurar el encabezado para devolver una respuesta JSON
header('Content-Type: application/json');

// Verificar si se recibió un ID de producto válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitizar y obtener el ID del producto
    $id = $_GET['id'];

    // Consulta SQL para seleccionar el producto con el ID especificado
    $sql = "SELECT id, nombre, precio, stock, descripcion, img FROM productos WHERE id = $id";

    // Ejecutar la consulta
    $resultado = $conn->query($sql);

    // Verificar si se encontró el producto
    if ($resultado->num_rows > 0) {
        // Obtener los datos del producto
        $producto = $resultado->fetch_assoc();

        // Convertir el BLOB a base64
        $producto['img'] = base64_encode($producto['img']);

        // Devolver los datos del producto en formato JSON
        echo json_encode($producto);
    } else {
        // Si no se encontró el producto, devolver un mensaje de error en formato JSON
        echo json_encode(array("error" => "No se encontró el producto con el ID especificado"));
    }
} else {
    // Si no se proporcionó un ID válido, devolver un mensaje de error en formato JSON
    echo json_encode(array("error" => "ID de producto no válido"));
}

// Cerrar la conexión a la base de datos
$conn->close();
