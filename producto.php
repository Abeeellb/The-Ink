<?php
session_start();
include 'accesobd.php';

$descuento = 0;

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['nombre_usuario'])) {
    // Aplicar un 10% de descuento
    $descuento = 0.1;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $producto = mysqli_fetch_assoc($result);

    if ($producto) {
        $nombre = $producto['nombre'];
        $precio = $producto['precio'];
        $descripcion = $producto['descripcion'];
        $stock = $producto['stock'];
        $img = explode(',', $producto['img']);
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "ID de producto no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($nombre); ?></title>
    <link rel="icon" href="imgs/icono3.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @font-face {
            font-family: Abel;
            src: url('fonts/Abel-Regular.ttf') format('truetype');
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
            margin-top: 50px;
        }

        .img-container-2 img {
            width: 100%;
            height: 670px;
            transition: transform 0.3s;
        }

        .img-container-2 img:hover {
            transform: scale(0.9);
        }

        .img-container-2 img:not(:hover) {
            transition: transform 0.3s;
            /* Agregamos la misma transición para suavizar el cambio al quitar el cursor */
            transform: scale(1);
            /* Establece el tamaño original al quitar el cursor */
        }

        a.categorias {
            color: rgb(100, 100, 100);
            text-decoration: none;
        }

        a.categorias:hover {
            color: rgb(124, 124, 124);
            text-decoration: none;
        }

        .margin-descripcion {
            margin-bottom: -5px;
        }

        .carousel-inner[data-ride="carousel"] {
            -webkit-animation: none;
            -moz-animation: none;
            -o-animation: none;
            -ms-animation: none;
            animation: none;
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
            width: 100%;
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 0 10px;
            padding-bottom: 5px;
            max-height: 85%;
            overflow-x: hidden;
            display: none;
            margin-bottom: 50px;
            margin-top: 50px;
        }

        .navegacion img {
            width: 30px;
            /* Establece el tamaño de los íconos */
            height: auto;
        }

        .buscar-table {
            width: 100%;
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

        .dataTables_length,
        .dataTables_filter,
        .dataTables_info,
        .dataTables_paginate {
            display: none;
        }

        button.button {
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
            background-color: white;
            /* Añadido para ocultar el overflow */
        }


        button.button:hover {
            background-color: black;
            color: white;
            border: 1px solid white;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><img src="imgs/logotipo.png" alt="logo_nav" width="70%"
                    height="90%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto margin-r">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">INICIO</a>
                    </li>
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropbtn" href="tienda.php">TIENDA<img class="img-tienda"
                                    src="imgs/caret-down.svg" alt="flecha"></a>
                            <div class="dropdown-content">
                                <a href="anillos.php">Anillos</a>
                                <a href="pendientes.php">Pendientes</a>
                                <a href="brazaletes.php">Brazaletes</a>
                            </div>
                        </li>
                    </ul>
                </ul>

                <div class="icons">
                    <a class="nav-link" href="contacto.php"><img src="imgs/envelope.svg" alt="contacto"></a>
                    <a class="nav-link" href="iniciarsesion.php"><img src="imgs/inicio_sesion.svg"
                            alt="inicio_sesion"></a>

                    <?php
                    if (isset($_SESSION['nombre_usuario'])) {
                        echo '<span class="nav-link">¡Hola, ' . $_SESSION['nombre_usuario'] . '!</span>';
                    }
                    ?>
                    <?php
                    // Comprueba si hay una sesión activa para decidir si mostrar el enlace de cerrar sesión o no
                    if (isset($_SESSION['nombre_usuario'])) {
                        echo '<a class="nav-link categorias" href="cerrarsesion.php">Cerrar Sesión</a>';
                    }
                    ?>

                </div>

                <div class="navegacion">
                    <input class="lupa" type="search" placeholder="Buscar" id="inputBusqueda">
                </div>
            </div>
        </nav>
        <div class="buscar" id="buscar">
            <table class="buscar-table" id="buscarTable">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Obtener productos de la base de datos
                    $sql = "SELECT id, nombre, precio FROM productos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $precioConDescuento = $row['precio'] * (1 - $descuento);
                            echo '<tr>';
                            echo '<td><a href="producto.php?id=' . $row['id'] . '">' . $row['nombre'] . '</a></td>';

                            echo '<td>';
                            if (isset($_SESSION['nombre_usuario'])) {
                                echo '<b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span>';
                            } else {
                                echo '<b>' . number_format($row['precio'], 2) . '€</b>';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">No hay productos disponibles.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row top">
                <div class="col-md-6 justify-content-center">
                    <!-- Mostrar el carrusel de imágenes para este producto -->
                    <div id="carousel_<?php echo $id; ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $active = true;
                            foreach ($img as $img_url) {
                                echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                                echo '<img src="' . htmlspecialchars($img_url) . '" class="card-img-top" alt="Producto">';
                                echo '</div>';
                                $active = false;
                            }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#carousel_<?php echo $id; ?>" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel_<?php echo $id; ?>" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- Cierre del carrusel -->
                    </div>
                </div>

                <div class="col-md-6 justify-content-center descripcion">
                    <h1><?php echo $nombre; ?></h1>
                    <p><?php echo $descripcion; ?></p>
                    <p><b>Stock: <?php echo $stock; ?></b></p>
                    <p>
                        <?php
                        $precioConDescuento = $precio * (1 - $descuento);
                        ?>
                        Precio:
                        <?php
                        echo '<b>' . number_format($precioConDescuento, 2) . '€</b>';
                        if ($descuento > 0) {
                            echo ' <span style="color: red; font-size: 12px;">-10%</span>';
                        }
                        ?>
                    </p>
                    <form id="comprar">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="cantidad">Cantidad (máximo 3): </label>
                        <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="3"><br>
                        <button class="button" type="submit">Comprar ya</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-white">
        <div class="container">
            <div class="row footer-container">
                <div class="col-md-3">
                    <h3>Nosotros</h3>
                    <p><a class="foot" href="quienessomos.php">Quiénes Somos</a></p>
                    <p><a class="foot" href="terminos.php">Términos del Servicio</a></p>
                    <p><a class="foot" href="privacidad.php">Política de Privacidad</a></p>
                    <p><a class="foot" href="avisolegal.php">Aviso Legal</a></p>
                </div>
                <div class="col-md-3">
                    <h3>Empresa</h3>
                    <p><a class="foot" href="envioyentrega.php">Envío y Entrega</a></p>
                    <p><a class="foot" href="cambios.php">Cambios y Devoluciones</a></p>
                </div>
                <div class="col-md-3">
                    <h3>Contacto</h3>
                    <p><a class="foot" href="contacto.php">Información de Contacto</a></p>
                </div>
                <div class="col-md-3">
                    <h3>Síguenos en:</h3>
                    <div class="redes">
                        <a href="https://www.instagram.com/theink.jewellery/"><img class="red" src="imgs/insta.png"
                                alt="insta"></a>
                        <a href="https://www.tiktok.com/@theink.jewellery"><img class="red" src="imgs/tiktok.png"
                                alt="tiktok"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-3">
            <p class="mb-0">Copyright© <a class="foot" href="index.php">THE INK</a></p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var carousels = document.querySelectorAll('.carousel');

            carousels.forEach(function (carousel) {
                carousel.addEventListener('click', function () {
                    $(this).carousel('pause');
                });
            });
        });

        $(document).ready(function () {
            $('#comprar').submit(function (e) {
                e.preventDefault(); // Evitar que el formulario se envíe normalmente

                var id = $('[name="id"]').val();
                var cantidad = $('[name="cantidad"]').val();

                $.ajax({
                    url: 'nuevostock.php',
                    type: 'POST',
                    data: {
                        id: id,
                        cantidad: cantidad
                    },
                    success: function (response) {
                        alert(response);
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function () {
                        alert('Error al procesar la compra');
                    }
                });
            });
        });

        $(document).ready(function () {
            var tablaBusqueda = $("#buscarTable").DataTable({
                "language": {
                    "emptyTable": "No se encontraron productos",
                    "zeroRecords": "No se encontraron productos",
                    "infoEmpty": "No se encontraron productos",
                    // Aquí puedes personalizar más mensajes si lo deseas
                }
            });

            $(document).ready(function () {
                var tablaBusqueda = $("#buscarTable").DataTable();

                $("#inputBusqueda").keyup(function () {
                    var valor = $(this).val();
                    tablaBusqueda.search(valor).draw();

                    if (valor.trim() !== "") {
                        $("#buscar").fadeIn("fast");
                    } else {
                        $("#buscar").fadeOut("fast");
                    }
                });
            });
        });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>