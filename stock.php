<?php
include 'accesobd.php';

function getStock($id) {
    global $conn;
    $id = intval($id); // Asegurarse de que sea un entero
    $sql = "SELECT stock FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['stock'];
    } else {
        return "Stock no disponible";
    }
}
