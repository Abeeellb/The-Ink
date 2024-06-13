<?php
session_start();

// Definir el descuento
$descuento = 0;

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['nombre_usuario'])) {
    // Aplicar un 10% de descuento
    $descuento = 0.1;
}

include 'stock.php';
$id = 3; // ID del producto que quieres consultar
$stock = getStock($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seal Ring</title>
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
            border: 1px solid black;
            text-decoration: none;
            color: black;
            padding: 6px 10px;
            margin-top: 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
            /* Añadido para ocultar el overflow */
            margin-top: 50px;
        }


        a.button:hover {
            background-color: black;
            color: white;
            border: 1px solid white;
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

        .descripcion {
            align-items: center;
            justify-content: center;
        }

        .buscar input {
            width: 200px;
            height: 40px;
            padding: 0 20px 0 20px;
            font-size: 18px;
            color: black;
            outline: none;
            border: 1px solid silver;
            border-radius: 30px;
            background-color: lightgray;
        }

        .buscar img {
            width: 30px;
            /* Establece el tamaño de los íconos */
            height: auto;
        }

        .buscador {
            margin-right: 20px;
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
                        <a class="nav-link" href="index.php">INICIO</a>
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
                    <a class="nav-link" href="carrito.php"><img src="imgs/carrito.png" alt="carrito"></a>
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
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="bonering.php"><img class="img-buscar" src="imgs/bone ring/Sin título-4.png"
                                    alt="bonering">Anillo
                                Bone Ring | <?php
                                if (isset($_SESSION['nombre_usuario'])) {
                                    $precioConDescuento = 130 * (1 - $descuento);
                                    echo '<b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span>';
                                } else {
                                    echo '<b>' . number_format(130) . '€</b>';
                                }
                                ?></a>

                        </td>
                    </tr>
                    <tr>
                        <td><a href="bracelete.php"><img class="img-buscar" src="imgs/brazalets/Sin título-4.png"
                                    alt="bracelete">Brazalete
                                Bracelete | <?php
                                if (isset($_SESSION['nombre_usuario'])) {
                                    $precioConDescuento = 260 * (1 - $descuento);
                                    echo '<b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span>';
                                } else {
                                    echo '<b>' . number_format(260) . '€</b>';
                                }
                                ?></a>

                        </td>
                    </tr>
                    <tr>
                        <td><a href="earrings.php"><img class="img-buscar" src="imgs/Earings/Sin título-2.png"
                                    alt="earrings">Pendientes
                                Earrings | <?php
                                if (isset($_SESSION['nombre_usuario'])) {
                                    $precioConDescuento = 130 * (1 - $descuento);
                                    echo '<b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span>';
                                } else {
                                    echo '<b>' . number_format(130) . '€</b>';
                                }
                                ?></a>

                        </td>
                    </tr>
                    <tr>
                        <td><a href="sealring.php"><img class="img-buscar" src="imgs/seal ring/Sin título-2.png"
                                    alt="sealring">Anillo
                                Seal Ring | <?php
                                if (isset($_SESSION['nombre_usuario'])) {
                                    $precioConDescuento = 120 * (1 - $descuento);
                                    echo '<b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span>';
                                } else {
                                    echo '<b>' . number_format(120) . '€</b>';
                                }
                                ?></a>

                        </td>
                    </tr>
                    <tr>
                        <td><a href="stonering.php"><img class="img-buscar" src="imgs/Stone ring/Stone ring_1.png"
                                    alt="stonering">Anillo
                                Stone Ring | <?php
                                if (isset($_SESSION['nombre_usuario'])) {
                                    $precioConDescuento = 190 * (1 - $descuento);
                                    echo '<b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span>';
                                } else {
                                    echo '<b>' . number_format(190) . '€</b>';
                                }
                                ?></a>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row top">
                <div class="col-md-6 justify-content-center">
                    <div id="carouselSealRing" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 img-fluid" src="imgs/seal ring/Sin título-2.png"
                                    alt="First slide sr">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="imgs/seal ring/Sin título-3.png"
                                    alt="Second slide sr">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="imgs/seal ring/Sin título-4.png"
                                    alt="Third slide sr">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="imgs/seal ring/Sin título-5.png"
                                    alt="Fourth slide sr">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="imgs/seal ring/Sin título-6.png"
                                    alt="Fith slide sr">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselSealRing" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Atrás</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselSealRing" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                    <h5 class="margin-descripcion">Seal Ring</h5>
                    <?php
                    if (isset($_SESSION['nombre_usuario'])) {
                        $precioConDescuento = 120 * (1 - $descuento);
                        echo '<p><b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span></p>';
                    } else {
                        echo '<p><b>' . number_format(120) . '€</b></p>';
                    }
                    ?>
                </div>

                <div class="col-md-6 justify-content-center descripcion">
                    <div class="row">
                        <div class="col-md-12 justify-content-center">

                            <h1>Anillo Seal Ring</h1>
                            <?php
                            if (isset($_SESSION['nombre_usuario'])) {
                                $precioConDescuento = 120 * (1 - $descuento);
                                echo '<h3><b>' . number_format($precioConDescuento, 2) . '€</b> <span style="color: red; font-size: 12px;">-10%</span></h3>';
                            } else {
                                echo '<h3><b>' . number_format(120) . '€</b></h3>';
                            }
                            ?>
                            <h6>EDICIÓN LIMITADA</h6>
                            <p>Anillo artesanal de plata de ley 925.</p>
                            <p>Hecho a mano bajo pedido en Madrid, España.</p>
                            <p>10-15 días de preparación.</p>
                            <p>Trabajamos cada pieza a mano, valorando cada detalle lo que hacen que esta pieza sea
                                única e
                                irrepetible.</p>
                            <?php
                            echo "<b><p>Stock: " . $stock . "</p></b>";
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 justify-content-center">
                            <form id="comprar">
                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                <button class="button" type="submit">Comprar ya</button>
                            </form>
                            <button class="button" id="carrito">Añadir al carrito</button>
                        </div>
                    </div>

                    <div id="sinStock" hidden class="row">
                        <div class="col-md-12">
                            <p class="text-danger">No hay stock.</p>
                        </div>
                    </div>
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
    <script type="text/javascript">

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
            $('#carrito').click(function () {
                $.ajax({
                    url: 'obtenerproducto.php', // Ruta al script PHP que manejará la solicitud AJAX
                    type: 'GET',
                    data: { id: 3 }, // ID del producto que deseas obtener
                    dataType: 'json',
                    success: function (response) {

                        var imgBase64 = 'data:image/png;base64,' + response.img;

                        // Mostrar la información del producto en el contenedor
                        $('#infoProducto').html('<p>ID: ' + response.id + '</p>' +
                            '<p>Nombre: ' + response.nombre + '</p>' +
                            '<p>Precio: ' + response.precio + '</p>' +
                            '<img src="' + imgBase64 + '" alt="img producto"/>');

                        // Obtener los datos del producto para agregarlo al carrito
                        var id = response.id;
                        var nombre = response.nombre;
                        var precio = response.precio;
                        var img = response.img;

                        // Enviar los datos del producto al script PHP que maneja la adición al carrito
                        $.ajax({
                            url: 'carritoconexion.php', // Ruta al script PHP que manejará la adición al carrito
                            type: 'POST',
                            data: { id: id, nombre: nombre, precio: precio, img: img },
                            success: function (response) {
                                alert('Producto añadido al carrito');
                                // Aquí puedes realizar alguna acción adicional después de agregar el producto al carrito
                            },
                            error: function (xhr, status, error) {
                                console.error('Error al añadir el producto al carrito');
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al cargar el producto');
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#comprar").on("submit", function (e) {
                e.preventDefault(); // Evita que el formulario se envíe automáticamente

                var id = $("#id").val();

                $.ajax({
                    type: "POST",
                    url: "nuevostock.php",
                    data: { id: id },
                    success: function (response) {
                        if (response === "comprado") {
                            // Redireccionar a la página de éxito
                            window.location.href = "comprado.php";
                        } else {
                            $('#sinStock').removeAttr('hidden');
                        }
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