<?php
session_start();

// Verifica si el usuario ha iniciado sesión como administrador
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

// Incluye el archivo de conexión a la base de datos
include "accesobd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        // Añadir producto
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];

        if (!empty($_FILES['img']['name'][0])) {
            $img_names = $_FILES['img']['name'];
            $img_tmp_names = $_FILES['img']['tmp_name'];
            $img_urls = [];

            // Directorio donde se guardarán las imágenes
            $img_folder = 'imgs/';

            // Verifica si $img_names es un array antes de usar count()
            if (is_array($img_names)) {
                // Procesa cada archivo subido
                for ($i = 0; $i < count($img_names); $i++) {
                    $img_name = basename($img_names[$i]);
                    $img_tmp_name = $img_tmp_names[$i];

                    // Genera un nombre único para cada imagen
                    $unique_img_name = time() . "_" . $img_name;
                    $img_dest_name = $img_folder . $unique_img_name;

                    // Mueve el archivo temporal al directorio de imágenes
                    if (move_uploaded_file($img_tmp_name, $img_dest_name)) {
                        // Guarda la URL de la imagen en el array
                        $img_urls[] = 'imgs/' . $unique_img_name;
                    } else {
                        echo "Error al subir la imagen: " . $img_name;
                    }
                }

                // Convierte el array de URLs a una cadena separada por comas
                $img_urls_str = implode(',', $img_urls);

                // Guarda las URLs de las imágenes en la base de datos
                $sql = "INSERT INTO productos (nombre, precio, stock, descripcion, img, categoria) VALUES ('$nombre', '$precio', '$stock', '$descripcion', '$img_urls_str', '$categoria')";
                if ($conn->query($sql) === TRUE) {
                    echo "Producto añadido con éxito.";
                } else {
                    echo "Error al añadir el producto: " . $conn->error;
                }
            } else {
                echo "No se han subido archivos de imagen.";
            }
        }
    } elseif (isset($_POST['delete_product'])) {
        // Eliminar producto
        $id = $_POST['id'];

        $sql = "DELETE FROM productos WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Producto eliminado con éxito.";
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        @font-face {
            font-family: Abel;
            src: url('fonts/Abel-Regular.ttf') format('truetype');
        }

        @media (max-width: 768px) {
            .text-container-2 {
                padding-top: 100px;
                /* Ajusta el espacio superior */
                padding-bottom: 100px;
                /* Ajusta el espacio inferior */
            }

            .container-2 img {
                max-width: 100%;
                /* La imagen ocupa todo el ancho */
                height: auto;
                /* Se mantiene la proporción de aspecto */
            }

            .button2 {
                display: block;
                /* Cambia a bloque para centrarlo */
                margin: 0 auto;
                /* Centra horizontalmente */
                width: 200px;
                /* Ancho fijo del botón */
                margin-top: 20px;
                /* Espacio superior */
            }
        }

        body {
            font-family: Abel, Arial, sans-serif;
            font-size: 16px;
            margin: 0;
            padding: 0;
            position: relative;
            /* Agregado para que el footer quede abajo */
        }

        header {
            width: 100%;
            z-index: 1000;
            /* Asegura que el header esté siempre visible */
        }

        nav {
            background-color: rgb(230, 230, 230);
            display: flex;
            justify-content: space-between;
            /* Alinea los elementos a lo largo del eje principal */
            align-items: center;
            /* Centra verticalmente los elementos */
            padding: 10px;
        }

        ul {
            display: flex;
            list-style-type: none;
            /* Elimina los puntos de lista */
            margin: 0;
            /* Elimina el margen predeterminado */
            padding: 0;
            /* Elimina el relleno predeterminado */
            margin-right: 50px;
        }

        li {
            font-family: Abel, Arial, sans-serif;
            margin: 0 10px;
            /* Espaciado entre elementos de lista */
        }

        .marcado:hover {
            color: rgb(85, 85, 85);
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }

        .marcado {
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }

        a.naveg {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: rgb(85, 85, 85);
        }

        .logo {
            margin-right: auto;
            margin-left: 50px;
            /* Mueve el logo a la izquierda */
        }

        .icons {
            display: flex;
            align-items: center;
            /* Centra verticalmente los íconos */
        }

        .icons img:hover {
            width: 35px;
            height: auto;
            margin-left: 25px;
            transition: 0.3s;
        }

        .icons img {
            width: 30px;
            /* Establece el tamaño de los íconos */
            height: auto;
            /* Mantiene la relación de aspecto */
            margin-left: 30px;
            /* Espaciado entre los íconos */
            transition: transform 0.3s;
        }

        .icons img:hover {
            transform: scale(1.1);
        }

        .icons img:not(:hover) {
            transition: transform 0.3s;
            /* Agregamos la misma transición para suavizar el cambio al quitar el cursor */
            transform: scale(1);
            /* Establece el tamaño original al quitar el cursor */
        }

        .icons {
            margin-right: 50px;
        }

        .container-1 {
            background-image: url('imgs/banner.png');
            background-repeat: no-repeat;
            /*Centramos el fondo al centro*/
            background-position: center;
            /*Y le decimos que siempre ocupe el ancho y el alto con esto*/
            background-size: cover;
            height: 400px;
        }

        .container-2 {
            background-image: url('imgs/banner2.jpg');
            background-repeat: no-repeat;
            margin-top: 50px;
            background-position: center;
            height: 600px;
            align-items: center;
        }

        .text-container-2 {
            width: 500px;
            font-size: 75px;
            text-align: center;
            color: white;
            margin: auto;
            padding-top: 85px;
        }

        .container-3 {
            margin-top: 75px;
            padding-left: 50px;
            padding-right: 50px;
        }

        video {
            max-width: 100%;
            max-height: auto;
            /* Ajusta el video para que quepa completamente en el contenedor */
        }

        footer {
            background-color: rgb(0, 0, 0);
            color: white;
            justify-content: center;
            width: 100%;
            padding-bottom: 20px;
            padding-top: 20px;
            font-size: 15px;
        }

        a.foot {
            color: white;
            text-decoration: none;

        }

        .redes {
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
            padding-left: 10px;
        }

        img.red {
            width: 20px;
            /* Establece el tamaño de los íconos */
            height: auto;
            /* Mantiene la relación de aspecto */
            margin-right: 30px;
            /* Espaciado entre los íconos */
        }

        main {
            margin-bottom: 75px;
        }

        .footer-container {
            display: flex;
            justify-content: center;
            text-align: center;
            padding-top: 40px;
        }

        .copyright {
            justify-content: center;
            text-align: center;
        }

        .texto-main {
            color: white;
            text-align: center;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 100px;
        }

        a.ver-productos {
            color: white;
            text-decoration: none;

        }

        a.button {
            display: inline-block;
            /* Cambiado a inline-block */
            width: 200px;
            border: 1px solid white;
            text-decoration: none;
            color: white;
            padding: 6px 10px;
            margin-top: 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
            /* Añadido para ocultar el overflow */
            margin-left: 50px;
            margin-top: 350px;
        }


        a.button:hover {
            background-color: white;
            color: black;
            border: 1px solid black;
        }

        a.button2 {
            display: inline-block;
            /* Cambiado a inline-block */
            width: 200px;
            border: 1px solid black;
            text-decoration: none;
            color: black;
            padding: 6px 10px;
            margin-top: 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
            /* Añadido para ocultar el overflow */
            margin-top: 85px;
        }


        a.button2:hover {
            background-color: black;
            color: white;
            border: 1px solid black;
        }

        a.button-2 {
            display: inline-block;
            /* Cambiado a inline-block */
            width: 200px;
            border: 1px solid black;
            background-color: white;
            text-decoration: none;
            color: black;
            padding: 6px 10px;
            margin-top: 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
            /* Añadido para ocultar el overflow */
            margin-left: 50px;
            margin-top: 350px;
        }


        a.button-2:hover {
            background-color: black;
            color: white;
            border: 1px solid white;
        }

        .top {
            margin-top: 25px;
        }

        .img-container-3 img {
            width: 100%;
            height: 670px;
            transition: transform 0.3s;
        }

        .img-container-3 img:hover {
            transform: scale(0.9);
        }

        .img-container-3 img:not(:hover) {
            transition: transform 0.3s;
            /* Agregamos la misma transición para suavizar el cambio al quitar el cursor */
            transform: scale(1);
            /* Establece el tamaño original al quitar el cursor */
        }

        a.categorias {
            color: rgb(100, 100, 100);
            text-decoration: none;
            text-align: center;
        }

        a.categorias:hover {
            color: rgb(124, 124, 124);
            text-decoration: none;
        }

        .navegacion {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            padding: 12px 0;
        }

        input[type="search"] {
            width: 200px;
            height: 40px;
            padding: 0 20px 0 20px;
            font-size: 18px;
            color: black;
            outline: none;
            border: 1px solid silver;
            border-radius: 30px;
            background-color: white;
        }

        .buscar {
            width: 500px;
            margin: auto;
            /* Centra el contenedor horizontalmente */
            background: #fff;
            padding: 0 10px;
            padding-bottom: 5px;
            max-height: 85%;
            overflow-x: hidden;
            display: none;
        }

        .navegacion img {
            width: 30px;
            /* Establece el tamaño de los íconos */
            height: auto;
        }

        .buscar-table {
            width: 75%;
        }

        .buscar-table tbody tr td {
            white-space: nowrap;
            /* Evita que el texto se envuelva */
        }


        tbody tr td {
            width: 150px;
        }

        tbody tr td a {
            text-decoration: none;
            font-size: 18px;
            color: #737373;
            display: block;
            width: 100%;
            height: 100%;
            padding-left: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .buscar::-webkit-scrollbar {
            background: rgba(0, 0, 0, 0);
        }

        .buscar::-webkit-scrollbar-button {
            background: #C1C1C1;
        }

        .buscar::-webkit-scrollbar-thumb {
            background: #C1C1C1;
        }

        .margin-r {
            margin-right: 500px;
        }

        .dataTables_length,
        .dataTables_filter,
        .dataTables_info,
        .dataTables_paginate {
            display: none;
        }

        .img-buscar {
            width: 100px;
            margin: 10px;
        }

        .aviso-cookies {
            display: none;
            background: #fff;
            padding: 20px;
            width: calc(100% - 40px);
            max-width: 300px;
            line-height: 150%;
            border-radius: 10px;
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 100;
            padding-top: 60px;
            box-shadow: 0px 2px 20px 10px rgba(222, 222, 222, .25);
            text-align: center;
        }

        .aviso-cookies.activo {
            display: block;
        }

        .aviso-cookies .galleta {
            max-width: 100px;
            position: absolute;
            top: -50px;
            left: calc(50% - 50px);
        }

        .aviso-cookies .titulo,
        .aviso-cookies .parrafo {
            margin-bottom: 15px;
        }

        .aviso-cookies .boton {
            width: 100%;
            background: #595959;
            border: none;
            color: #fff;
            font-family: Abel, sans-serif;
            text-align: center;
            padding: 15px 20px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s ease all;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .aviso-cookies .boton:hover {
            background: #000;
        }

        .aviso-cookies .enlace {
            color: #4DBFFF;
            text-decoration: none;
            font-size: 14px;
        }

        .aviso-cookies .enlace:hover {
            text-decoration: underline;
        }

        .fondo-aviso-cookies {
            display: none;
            background: rgba(0, 0, 0, .20);
            position: fixed;
            z-index: 99;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
        }

        .fondo-aviso-cookies.activo {
            display: block;
        }

        .img-tienda {
            margin-left: 8px;
            /* Espacio entre el texto y la imagen */
            transition: transform 0.3s ease;
        }

        .dropbtn:hover .img-tienda,
        .nav-item:hover .img-tienda {
            transform: rotate(180deg);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropbtn {
            display: flex;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <h1>Administración de Productos</h1>

            <h2>Añadir Producto</h2>
            <form method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <br>
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" name="precio" required>
                <br>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" required>
                <br>
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" required></textarea>
                <br>
                <label for="categoria">Categoría:</label>
                <select name="categoria" required>
                    <option value="anillo">Anillo</option>
                    <option value="brazalete">Brazalete</option>
                    <option value="pendientes">Pendientes</option>
                </select>
                <br>
                <label for="img">Imagen:</label>
                <input type="file" name="img[]" accept="image/*" multiple required>
                <br>
                <button type="submit" name="add_product">Añadir Producto</button>
            </form>

            <h2>Eliminar Producto</h2>
            <form method="POST">
                <label for="id">ID del Producto:</label>
                <input type="number" name="id" required>
                <br>
                <button type="submit" name="delete_product">Eliminar Producto</button>
            </form>

            <h2>Editar Producto</h2>
            <ul>
                <?php
                // Consulta para obtener todos los productos
                $sql = "SELECT id, nombre FROM productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>";
                        echo "<a href='editarproducto.php?id=" . $row['id'] . "'>" . $row['nombre'] . "</a>";
                        echo "</li>";
                    }
                }
                ?>
            </ul>
            </form>

            <a href="cerrarsesion.php">Cerrar Sesión</a>
        </div>
    </main>
</body>

</html>