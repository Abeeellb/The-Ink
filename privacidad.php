<?php
session_start();

include "accesobd.php";

$descuento = 0;

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['nombre_usuario'])) {
    // Aplicar un 10% de descuento
    $descuento = 0.1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad</title>
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

        a {
            text-decoration: none;
            color: black;
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
            color: rgb(124, 124, 124);
        }

        a:hover {
            color: rgb(100, 100, 100);
            text-decoration: none;
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

        main {
            padding-top: 30px;
            padding-bottom: 60px;
            justify-content: center;
            align-items: center;
            margin: auto;
            max-width: 1000px;
        }

        video {
            max-width: 100%;
            height: 600px;
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

        .container_footer_c {
            margin-right: 150px;
            margin-left: 150px;
        }

        .container_footer_e {
            margin-left: 150px;
        }

        .footer-container {
            display: flex;
            justify-content: center;
            text-align: center;
            padding-top: 40px;
        }

        .main-title {
            display: inline-block;
            position: relative;
            color: rgb(76, 76, 76);
            text-align: center;
        }

        .main-title::before,
        .main-title::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 50px;
            /* Ancho de las líneas decorativas */
            height: 1px;
            /* Altura de las líneas decorativas */
            background-color: lightgray;
        }

        .main-title::before {
            left: -60px;
            /* Distancia de la línea decorativa izquierda */
        }

        .main-title::after {
            right: -60px;
            /* Distancia de la línea decorativa derecha */
        }

        .container-main {
            display: flex;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .copyright {
            justify-content: center;
            text-align: center;
        }

        a.categorias {
            color: rgb(100, 100, 100);
            text-decoration: none;
        }

        a.categorias:hover {
            color: rgb(124, 124, 124);
            text-decoration: none;
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

    <main class="container-fluid">
        <h1 class="mt-5 mb-4">Política de Privacidad</h1>
        <p>Esta Política de privacidad describe cómo se recopila, utiliza y comparte su información personal cuando
            visita o hace una compra en theink.es (denominado en lo sucesivo el “Sitio”).</p>

        <h2>INFORMACIÓN PERSONAL QUE RECOPILAMOS</h2>
        <p>Cuando visita The Ink recopilamos automáticamente cierta información sobre su dispositivo, incluida
            información sobre su navegador web, dirección IP, zona horaria y algunas de las cookies que están instaladas
            en su dispositivo. Además, a medida que navega por el Sitio, recopilamos información sobre las páginas web
            individuales o los productos que ve, las páginas web o los términos de búsqueda que lo remitieron al Sitio e
            información sobre cómo interactúa usted con el Sitio. Nos referimos a esta información recopilada
            automáticamente como “Información del dispositivo”.</p>


        <h2>COOKIES</h2>
        <p>Aquí tienes una lista de cookies que utilizamos. Las enlistamos para que puedas elegir si quieres optar por
            quitarlas o no.</p>
        <p>_session_id, unique token, sessional, Allows Shopify to store information about your session (referrer,
            landing page, etc).</p>
        <p>_shopify_visit, no data held, Persistent for 30 minutes from the last visit, Used by our website provider’s
            internal stats tracker to record the number of visits</p>
        <p>_shopify_uniq, no data held, expires midnight (relative to the visitor) of the next day, Counts the number of
            visits to a store by a single customer.</p>
        <p>cart, unique token, persistent for 2 weeks, Stores information about the contents of your cart.</p>
        <p>_secure_session_id, unique token, sessional</p>
        <p>storefront_digest, unique token, indefinite If the shop has a password, this is used to determine if the
            current visitor has access.</p>
        <p>Los “Archivos de registro” rastrean las acciones que ocurren en el Sitio y recopilan datos, incluyendo su
            dirección IP, tipo de navegador, proveedor de servicio de Internet, páginas de referencia/salida y marcas de
            fecha/horario.</p>
        <p>Las “balizas web”, las “etiquetas” y los “píxeles” son archivos electrónicos utilizados para registrar
            información sobre cómo navega usted por el Sitio.</p>
        <p>Además, cuando hace una compra o intenta hacer una compra a través del Sitio, recopilamos cierta información
            de usted, entre la que se incluye su nombre, dirección de facturación, dirección de envío, información de
            pago (incluidos los números de la tarjeta de crédito, dirección de correo electrónico y número de teléfono).
            Nos referimos a esta información como “Información del pedido”</p>
        <p>Cuando hablamos de “Información personal” en la presente Política de privacidad, nos referimos tanto a la
            Información del dispositivo como a la Información del pedido.</p>

        <h2>¿CÓMO UTILIZAMOS SU INFORMACIÓN PERSONAL?</h2>
        <p>Usamos la Información del pedido que recopilamos en general para preparar los pedidos realizados a través del
            Sitio (incluido el procesamiento de su información de pago, la organización de los envíos y la entrega de
            facturas y/o confirmaciones de pedido). Además, utilizamos esta Información del pedido para: comunicarnos
            con usted;</p>
        <p>examinar nuestros pedidos en busca de fraudes o riesgos potenciales; y cuando de acuerdo con las preferencias
            que usted compartió con nosotros, le proporcionamos información o publicidad relacionada con nuestros
            productos o servicios.</p>
        <p>Utilizamos la Información del dispositivo que recopilamos para ayudarnos a detectar posibles riesgos y
            fraudes (en particular, su dirección IP) y, en general, para mejorar y optimizar nuestro Sitio (por ejemplo,
            al generar informes y estadísticas sobre cómo nuestros clientes navegan e interactúan con el Sitio y para
            evaluar el éxito de nuestras campañas publicitarias y de marketing).</p>
        <p>Compartimos su Información personal con terceros para que nos ayuden a utilizar su Información personal, tal
            como se describió anteriormente. Por ejemplo, utilizamos la tecnología de Shopify en nuestra tienda online.
            Puede obtener más información sobre cómo Shopify utiliza su Información personal aquí:
            <a href="https://www.shopify.com/legal/privacy">https://www.shopify.com/legal/privacy.</a>
        </p>
        <p>También utilizamos Google Analytics para ayudarnos a comprender cómo usan nuestros clientes el Sitio.</p>
        <p>Puede obtener más información sobre cómo Google utiliza su Información personal aquí:
            <a
                href="https://www.google.com/intl/es/policies/privacy/">https://www.google.com/intl/es/policies/privacy/.</a>
        </p>
        <p>Puede darse de baja de Google Analytics aquí: <a
                href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout.</a></p>
        <p>Si tiene alguna duda, comentario o desea ejercer algún derecho respecto a sus datos personales, por favor
            póngase en contacto con nosotros a través de nuestro correo electrónico: theink.jewellery.es</p>

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

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>