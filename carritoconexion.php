<?php
session_start();
include 'db_connection.php'; // Incluye tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    // Obtener la información del producto desde la base de datos
    $query = $conn->prepare("SELECT nombre, precio, img FROM productos WHERE id = ?");
    $query->bind_param("i", $productId);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        
        // Aplicar descuento si el usuario ha iniciado sesión
        $descuento = isset($_SESSION['nombre_usuario']) ? 0.1 : 0;
        $precioConDescuento = $producto['precio'] * (1 - $descuento);

        // Verificar si el carrito ya está en la sesión
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Agregar el producto al carrito
        $_SESSION['carrito'][] = [
            'id' => $id,
            'nombre' => $producto['nombre'],
            'precio' => $precioConDescuento,
            'descuento' => $descuento,
            'img' => $producto['img'],
            'cantidad' => $cantidad
        ];

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Producto no encontrado']);
    }
}
