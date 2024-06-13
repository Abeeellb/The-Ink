<?php
include 'accesobd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']); // Obtener la cantidad de productos que se quieren comprar

    // Obtener el stock actual
    $sql = "SELECT stock FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_stock = $row['stock'];

        // Verificar si hay suficiente stock
        if ($current_stock >= $cantidad && $cantidad <= 3) {
            // Actualizar el stock restando la cantidad seleccionada
            $new_stock = $current_stock - $cantidad;
            $update_sql = "UPDATE productos SET stock = $new_stock WHERE id = $id";

            if ($conn->query($update_sql) === TRUE) {
                echo "Producto(s) comprado(s) correctamente.";
            } else {
                echo "Error al actualizar el stock: " . $conn->error;
            }
        } else {
            echo "No hay suficiente stock.";
        }
    } else {
        echo "Producto no encontrado.";
    }
}
$conn->close();
