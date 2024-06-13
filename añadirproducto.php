<?php
session_start();
if ($_SESSION['rol'] != 'admin') {
    header("Location: tienda.php");
    exit();
}
include 'accesobd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Inserta el producto en la base de datos
    $query = "INSERT INTO productos (nombre, precio, stock) VALUES ('$nombre', '$precio', '$stock')";
    if (mysqli_query($conn, $query)) {
        $product_id = mysqli_insert_id($conn); // Obtiene el ID del producto insertado

        // Maneja la subida de múltiples imágenes
        foreach ($_FILES['images']['name'] as $key => $image) {
            $target = "imgs/" . basename($image);
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target)) {
                // Inserta cada imagen en la base de datos
                $query = "INSERT INTO imgs (product_id, image) VALUES ('$product_id', '$image')";
                mysqli_query($conn, $query);
            }
        }
        echo "Producto añadido correctamente";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
</head>

<body>
    <h1>Añadir Producto</h1>
    <form action="añadirproducto.php" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="price">Precio:</label>
        <input type="text" name="precio" required>
        <br>
        <label for="stock">Stock:</label>
        <input type="text" name="stock" required>
        <br>
        <label for="images">Imágenes:</label>
        <input type="file" name="images[]" multiple required>
        <br>
        <button type="submit">Añadir Producto</button>
    </form>
</body>

</html>