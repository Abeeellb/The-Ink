<?php
session_start();

// Asegurarse de que la variable de sesión 'carrito' es un array
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Obtener el carrito de la sesión
$carrito = $_SESSION['carrito'];

$total = 0;
$descuentoTotal = 0;

if (!empty($carrito)) {
    foreach ($carrito as $item) {
        // Asegurarse de que $item es un array antes de acceder a sus elementos
        if (is_array($item)) {
            $total += $item['precio'] * $item['cantidad'];
            if ($item['descuento'] > 0) {
                $descuentoTotal += ($item['precio'] * ($item['descuento'] / 100)) * $item['cantidad'];
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="icon" href="imgs/icono3.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

        .margin-t {
            margin-top: 50px;
        }

        .title {
            margin-top: 50px;
            margin-bottom: 50px;
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

        .img-buscar {
            width: 100px;
            margin: 10px;
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
                                    alt="sealring">Anillo
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
        </nav>
    </header>

    <main>
        <h1>Carrito de compras</h1>
        <?php if (empty($carrito)): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($item['img']); ?>" alt="Producto" width="50"></td>
                            <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                            <td><?php echo number_format($item['precio'], 2); ?>€</td>
                            <td><?php echo htmlspecialchars($item['cantidad']); ?></td>
                            <td><?php echo number_format($item['precio'] * $item['cantidad'], 2); ?>€</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><b>Total: <?php echo number_format($total, 2); ?>€</b></p>
            <?php if ($descuentoTotal > 0): ?>
                <p><b>Descuento aplicado: <?php echo number_format($descuentoTotal, 2); ?>€</b></p>
                <p><b>Total con descuento: <?php echo number_format($total - $descuentoTotal, 2); ?>€</b></p>
            <?php endif; ?>
        <?php endif; ?>
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


        $(document).ready(function () {
            $("#comprar").on("submit", function (e) {
                e.preventDefault(); // Evita que el formulario se envíe automáticamente

                var id = $("#id").val();

                $.ajax({
                    type: "POST",
                    url: "nuevostock.php", // Nombre del archivo PHP que contiene el script para actualizar el stock
                    data: { id: id },
                    success: function (response) {
                        if (response === "comprado") {
                            // Redireccionar a la página de éxito
                            window.location.href = "comprado.php";
                        } else {
                            // Manejar cualquier error que pueda ocurrir
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