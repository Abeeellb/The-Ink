<?php
session_start();

// Verifica si el usuario ha iniciado sesión como administrador
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Incluye el archivo de conexión a la base de datos
include "accesobd.php";

// Verifica si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    // Actualizar los datos del producto en la base de datos
    $sql = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock', descripcion='$descripcion', categoria='$categoria' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado con éxito.";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
}

// Mostrar el formulario para editar el producto
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Consultar los detalles del producto seleccionado
    $sql = "SELECT * FROM productos WHERE id = '$producto_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mostrar el formulario para editar el producto
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Editar Producto</title>
            <style>
                /* Estilos CSS pueden ir aquí si es necesario */
            </style>
        </head>
        <body>
            <h1>Editar Producto</h1>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                <br>
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>" required>
                <br>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" value="<?php echo $row['stock']; ?>" required>
                <br>
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
                <br>
                <label for="categoria">Categoría:</label>
                <select name="categoria" required>
                    <option value="anillo" <?php if ($row['categoria'] == 'anillo') echo 'selected'; ?>>Anillo</option>
                    <option value="brazalete" <?php if ($row['categoria'] == 'brazalete') echo 'selected'; ?>>Brazalete</option>
                    <option value="pendientes" <?php if ($row['categoria'] == 'pendientes') echo 'selected'; ?>>Pendientes</option>
                </select>
                <br>
                <button type="submit" name="update_product">Actualizar Producto</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró el producto seleccionado.";
    }
}
?>
