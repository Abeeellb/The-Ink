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
    <title>Términos del Servicio</title>
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
            max-height: 100%;
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

        .copyright {
            justify-content: center;
            text-align: center;
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
        <h1 class="mt-5 mb-4">Términos del Servicio</h1>
        <p>The Ink gestiona este sitio web. En todo el sitio, los términos "nosotros", "nos" y "nuestro" se refieren en
            lo sucesivo a The Ink .The Ink ofrece esta página web, incluida toda la información, las herramientas y los
            servicios que se ponen en este sitio a disposición suya, el usuario, siempre y cuando acepte la totalidad de
            los términos, condiciones, políticas y avisos contemplados aquí.</p>
        <p>Al visitar nuestro sitio y/o comprarnos algo, usted interactúa con nuestro "Servicio" y reconoce como
            vinculantes los siguientes términos y condiciones (denominados en lo sucesivo "Términos del servicio",
            "Términos"), incluidos aquellos términos y condiciones adicionales y las políticas que se mencionan aquí y/o
            disponibles por medio de hipervínculo. Estos Términos del servicio se aplican a todos los usuarios del
            sitio, incluyendo de manera enunciativa mas no limitativa los usuarios que son navegadores, proveedores,
            clientes, comerciantes y/o que aporten contenido.</p>
        <p>Lea estos Términos del servicio detenidamente antes de acceder o utilizar nuestra página web. Al acceder o
            utilizar cualquier parte del sitio, usted acepta estos Términos del servicio. Si no acepta la totalidad de
            los términos y condiciones de este acuerdo, no podrá acceder al sitio web ni utilizar ningún servicio. Si
            estos Términos del servicio se considerasen una oferta, la aceptación se limita expresamente a los presentes
            Términos del servicio.</p>
        <p>Las nuevas funciones o herramientas que se agreguen a la tienda actual también estarán sujetas a los Términos
            del servicio. Puede revisar la versión más reciente de los Términos del servicio en cualquier momento en
            esta página. Nos reservamos el derecho de actualizar, cambiar o reemplazar cualquier parte de los presentes
            Términos del servicio mediante la publicación de actualizaciones o cambios en nuestra página web. Es su
            responsabilidad revisar esta página periódicamente para ver los cambios. Su uso de la página web o el acceso
            a ella de forma continuada después de la publicación de cualquier cambio constituye la aceptación de dichos
            cambios.</p>
        <p>Nuestra tienda está alojada en Shopify Inc. Nos proporcionan la plataforma de comercio electrónico en línea
            que nos permite venderle nuestros productos y servicios.</p>
        <h2>SECCIÓN 1: TÉRMINOS DE LA TIENDA ONLINE</h2>
        <p>Al aceptar los presentes Términos del servicio, usted declara que tiene la mayoría de edad en su estado o
            provincia de residencia, o que es mayor de edad en su estado o provincia de residencia y que nos ha dado su
            consentimiento para permitir que cualquiera de las personas menores que dependen de usted utilice este
            sitio.</p>
        <p>No puede utilizar nuestros productos para ningún fin ilegal o no autorizado ni puede, al hacer uso del
            Servicio, infringir las leyes de su jurisdicción (incluyendo de manera enunciativa más no limitativa, las
            leyes de derechos de autor).</p>
        <p>No transmitirá ningún gusano o virus informáticos ni ningún código de naturaleza destructiva.</p>
        <p>El incumplimiento o violación de cualquiera de los Términos dará como resultado la rescisión inmediata de sus
            Servicios.</p>

        <h2>SECCIÓN 2: CONDICIONES GENERALES</h2>
        <p>Nos reservamos el derecho de rechazar el servicio a cualquier persona, por cualquier motivo, en cualquier
            momento.</p>
        <p>Usted comprende que su contenido (sin incluir la información de la tarjeta de crédito) puede transferirse sin
            cifrar e implicar (a) transmisiones en varias redes; y (b) cambios para adaptarse a los requisitos técnicos
            de conexión de redes o dispositivos y cumplir con ellos. La información de la tarjeta de crédito siempre se
            cifra durante la transferencia a través de las redes.</p>
        <p>Usted acepta no reproducir, duplicar, copiar, vender, revender ni aprovechar ninguna parte del Servicio, uso
            del Servicio o acceso al Servicio o cualquier contacto en el sitio web a través de la cual se presta el
            servicio, sin nuestro permiso expreso por escrito.</p>
        <p>Los encabezados utilizados en este acuerdo se incluyen solo para facilitar la lectura y no limitarán ni
            afectarán los presentes Términos.</p>

        <h2>SECCIÓN 3: EXACTITUD, TOTALIDAD Y CRONOLOGÍA DE LA INFORMACIÓN</h2>
        <p>No nos responsabilizamos si la información disponible en este sitio no es precisa, completa o actualizada. El
            material presentado en este sitio se proporciona solo para información general y no se debe confiar en él ni
            utilizarlo como la única base para tomar decisiones sin consultar fuentes de información principales, más
            precisas, más completas o más recientes. Al confiar en cualquier material de este sitio lo hace por su
            cuenta y riesgo.</p>
        <p>Este sitio puede contener cierta información histórica. La información histórica, inevitablemente, no es
            actual y se proporciona únicamente como referencia. Nos reservamos el derecho de modificar el contenido de
            este sitio en cualquier momento, pero no tenemos la obligación de actualizar ninguna información en nuestro
            sitio. Usted acepta que es su responsabilidad controlar los cambios en nuestro sitio.</p>

        <h2>SECCIÓN 4: MODIFICACIONES AL SERVICIO Y PRECIOS</h2>
        <p>Los precios de nuestros productos están sujetos a cambios sin previo aviso.</p>
        <p>Nos reservamos el derecho de modificar o discontinuar el Servicio (o cualquier parte o contenido del mismo)
            sin previo aviso en cualquier momento.</p>
        <p>No seremos responsables ante usted ni ante ningún tercero por ninguna modificación, cambio de precio,
            suspensión o interrupción del Servicio.</p>

        <h2>SECCIÓN 5: PRODUCTOS O SERVICIOS</h2>
        <p>Ciertos productos o servicios pueden estar disponibles exclusivamente online a través del sitio web. Estos
            productos o servicios pueden tener cantidades limitadas y están sujetos a devolución o cambio solo de
            acuerdo con nuestra Política de devolución.</p>
        <p>Hemos hecho todo lo viable para mostrar con la mayor precisión posible los colores y las imágenes de nuestros
            productos que aparecen en la tienda. No podemos garantizar que la visualización de cualquier color en el
            monitor de su computadora sea precisa.
            Nos reservamos el derecho, pero no estamos obligados, de limitar las ventas de nuestros productos o
            servicios a cualquier persona, región geográfica o jurisdicción. Podemos ejercer este derecho caso por caso.
            Nos reservamos el derecho de limitar las cantidades de cualquier producto o servicio que ofrecemos. Todas
            las descripciones de los productos o los precios de los productos están sujetos a cambios en cualquier
            momento y sin previo aviso, a nuestra entera discreción. Nos reservamos el derecho de discontinuar cualquier
            producto en cualquier momento. Cualquier oferta de cualquier producto o servicio que se realice en este
            sitio no tiene validez donde dicho producto o servicio esté prohibido.</p>
        <p>No garantizamos que la calidad de cualquier producto, servicio, información u otro material que usted haya
            comprado u obtenido cumplirá con sus expectativas, o que cualquier error en el Servicio se corregirá.</p>

        <h2>SECCIÓN 6: EXACTITUD DE LA FACTURACIÓN Y DE LA INFORMACIÓN DE LA CUENTA</h2>
        <p>Nos reservamos el derecho de rechazar cualquier pedido que realice en nuestra tienda. Podemos, a nuestro
            exclusivo criterio, limitar o cancelar las cantidades compradas por persona, por hogar o por pedido. Estas
            restricciones pueden incluir pedidos realizados con la misma cuenta de cliente, la misma tarjeta de crédito
            o pedidos que usen la misma dirección de facturación o de envío. En el caso de que realicemos un cambio o
            cancelemos un pedido, intentaremos notificarle vía correo electrónico o la dirección de facturación / número
            de teléfono proporcionados en el momento en que se realizó el pedido. Nos reservamos el derecho de limitar o
            prohibir los pedidos que, a nuestra entera discreción, parezcan haber sido realizados por comerciantes,
            revendedores o distribuidores.</p>
        <p>Usted acepta suministrar información completa y precisa de la compra y cuenta actual, para todas las compras
            realizadas en nuestra tienda. Usted acepta actualizar rápidamente su cuenta y demás informaciones, entre
            ellas, su dirección de correo electrónico, los números de tarjeta de crédito y las fechas de vencimiento,
            para que podamos completar sus transacciones y contactarlo según sea necesario.</p>

        <p>Para obtener más información, consulte nuestra <a href="cambios.php">Política de Cambios y Devoluciones.</a>
        </p>

        <h2>SECCIÓN 7: HERRAMIENTAS OPCIONALES</h2>
        <p>Podemos proporcionarle acceso a herramientas de terceros que no supervisamos, ni tenemos ningún control sobre
            ellas, ni tampoco contribuimos.</p>
        <p>Usted reconoce y acepta que brindamos acceso a dichas herramientas "tal como se encuentran" y "según
            disponibilidad" sin garantías, representaciones ni condiciones de ningún tipo y sin ningún tipo de respaldo.
            No tendremos ninguna responsabilidad como consecuencia del uso que haga de herramientas opcionales de
            terceros o en relación a ellas.</p>
        <p>Cualquier uso que haga de las herramientas opcionales ofrecidas a través del sitio es por su cuenta y riesgo,
            y debe asegurarse de estar familiarizado con los términos según los cuales los proveedores externos
            relevantes suministran dichas herramientas y aprobarlos.</p>
        <p>También podemos, en el futuro, ofrecer nuevos servicios o funciones a través del sitio web (incluido el
            lanzamiento de nuevas herramientas y recursos). Estas nuevas funciones o servicios también estarán sujetos a
            los presentes Términos de servicio.</p>

        <h2>SECCIÓN 8: ENLACES DE TERCEROS</h2>
        <p>Algunos contenidos, productos y servicios disponibles a través de nuestro Servicio pueden incluir recursos de
            terceros.</p>
        <p>Los enlaces de terceros en este sitio pueden dirigirlo a páginas web de terceros que no están afiliados a
            nosotros. No somos responsables de examinar o evaluar el contenido o la exactitud, ni garantizamos ni
            asumiremos ninguna obligación ni responsabilidad por los recursos o páginas web de terceros, ni por ningún
            otro material, producto o servicio de terceros.</p>
        <p>No somos responsables de ningún daño o perjuicio relacionado con la compra o el uso de bienes, servicios,
            recursos, contenido o cualquier otra transacción realizada en conexión con sitios web de terceros. Revise
            cuidadosamente las políticas y prácticas de terceros, y asegúrese de comprenderlas antes de participar en
            cualquier transacción. Las quejas, reclamos, inquietudes o preguntas referentes a productos de terceros
            deben dirigirse a estos.</p>

        <h2>SECCIÓN 9: COMENTARIOS DE LOS USUARIOS, OPINIONES Y OTRAS COMUNICACIONES</h2>
        <p>Si, a petición nuestra, usted envía ciertas comunicaciones específicas (por ejemplo, participaciones en un
            concurso) o, sin una solicitud nuestra, envía ideas creativas, sugerencias, propuestas, planes u otros
            materiales, ya sea online, por correo electrónico, por correo postal, o de otro modo (denominado en lo
            sucesivo y de manera colectiva, 'comentarios'), usted acepta que podemos, en cualquier momento, sin
            restricción: editar, copiar, publicar, distribuir, traducir y usar en cualquier medio cualquier comentario
            que usted nos envíe. No tenemos ni tendremos ninguna obligación (1) de mantener ningún comentario de manera
            confidencial; (2) pagar alguna compensación por cualquier comentario; o (3) responder a cualquier
            comentario.</p>
        <p>Podemos, pero no tenemos la obligación de monitorear, editar o eliminar contenido que a nuestra entera
            discreción determinemos que es ilegal, ofensivo, amenazante, calumnioso, difamatorio, pornográfico, obsceno
            u objetable, o que infrinja la propiedad intelectual de cualquiera de las partes o de los presentes Términos
            del servicio.</p>
        <p>Usted acepta que sus comentarios no infringirán ningún derecho de terceros, incluidos los derechos de autor,
            marca registrada, privacidad, personalidad u otro derecho personal o de propiedad. Además, acepta que sus
            comentarios no contendrán material difamatorio, ilegítimo, abusivo u obsceno, ni contendrán ningún virus
            informático ni otro software dañino que pueda afectar de cualquier manera el funcionamiento del Servicio o
            de cualquier sitio web relacionado. No puede utilizar una dirección de correo electrónico falsa, simular ser
            otra persona o engañarnos o engañar a terceros sobre el origen de los comentarios. Usted es el único
            responsable de los comentarios que realice y de su exactitud. No asumimos ninguna responsabilidad ni ninguna
            obligación por los comentarios publicados por usted o por un tercero.</p>

        <h2>SECCIÓN 10: INFORMACIÓN PERSONAL</h2>
        <p>El envío de la información personal que haga a través de la tienda se rige por nuestra <a
                href="privacidad.php">Política de
                Privacidad.</a> Para ver nuestra <a href="privacidad.php">Política de Privacidad.</a></p>

        <h2>SECCIÓN 11: ERRORES, INEXACTITUDES Y OMISIONES</h2>
        <p>Puede haber información en nuestro sitio o en el Servicio que, ocasionalmente, contenga errores tipográficos,
            inexactitudes u omisiones que puedan relacionarse con descripciones de productos, precios, promociones,
            ofertas, cargos por envío de productos, tiempos de tránsito y disponibilidad. Nos reservamos el derecho de
            corregir cualquier error, inexactitud u omisión, de cambiar o actualizar información, o cancelar pedidos si
            alguna información en el Servicio o en cualquier página web relacionada es inexacta en cualquier momento sin
            previo aviso (incluso después de haber enviado su pedido).</p>
        <p>No asumimos ninguna obligación de actualizar, modificar o aclarar la información en el Servicio o en
            cualquier sitio web relacionado, incluyendo de manera enunciativa pero no limitativa, la información de
            precios, excepto cuando lo exija la ley. Ninguna actualización especificada o fecha de actualización
            aplicada en el Servicio o en cualquier sitio web relacionado debe tomarse para indicar que toda la
            información en el Servicio o en cualquier sitio web relacionado se modificó o actualizó.</p>

        <h2>SECCIÓN 12: USOS PROHIBIDOS</h2>
        <p>Además de las prohibiciones establecidas en los Términos del servicio, se le prohíbe utilizar el sitio o su
            contenido (a) para cualquier propósito ilegal; (b) para solicitar a otros que realicen o participen en
            cualquier acto ilegal; (c) para infringir cualquier reglamento, norma, ley u ordenanza local internacional,
            federal, provincial o estatal; (d) para infringir o violar nuestros derechos de propiedad intelectual o los
            derechos de propiedad intelectual de otros; (e) acosar, abusar, insultar, dañar, difamar, calumniar,
            denigrar, intimidar o discriminar por motivos de género, orientación sexual, religión, etnia, raza, edad,
            nacionalidad o discapacidad; (f) enviar información falsa o engañosa;
            (g) cargar o transmitir virus o cualquier otro tipo de código dañino que afecte o pueda afectar a la
            funcionalidad o el funcionamiento del Servicio o de cualquier sitio web relacionado, de otros sitios web o
            de Internet; (h) recopilar o rastrear la información personal de otros; (i) enviar correo no deseado,
            phishing, pharm, pretexto, spider, rastrear o extraer; (j) para cualquier propósito obsceno o inmoral; o (k)
            para interferir o eludir las funciones de seguridad del Servicio o de cualquier sitio web relacionado, o de
            otros sitios web o de Internet. Nos reservamos el derecho de dar por terminado su uso del Servicio o de
            cualquier sitio web relacionado por infringir cualquiera de los usos prohibidos.</p>

        <h2>SECCIÓN 13: DESCARGO DE RESPONSABILIDAD DE GARANTÍAS; LIMITACIÓN DE RESPONSABILIDAD</h2>
        <p>No garantizamos, representamos ni aseguramos que el uso que haga de nuestro servicio será sin interrupciones,
            oportuno, seguro o sin errores.</p>
        <p>No garantizamos que los resultados que se puedan obtener del uso del servicio sean exactos o confiables.</p>
        <p>Usted acepta que periódicamente, podamos eliminar el servicio por lapsos de tiempo indefinidos o cancelar el
            servicio en cualquier momento, sin notificarle.</p>
        <p>Usted acepta expresamente que su uso del servicio o la imposibilidad de utilizarlo corre por su riesgo. El
            servicio y todos los productos y servicios que se le entregan a través del servicio (salvo que así lo
            especifiquemos nosotros) se ofrecen "tal como están" y "según disponibilidad" para su uso, sin ninguna
            representación, garantía o condición de ningún tipo, ya sea expresa o implícita, entre las que se incluyen
            todas las garantías implícitas o condiciones de comerciabilidad, calidad comercial, idoneidad para un
            propósito particular, durabilidad, título y no violación.</p>
        <p>En ningún caso The Ink , nuestros directores, funcionarios, empleados, afiliados, agentes, contratistas,
            pasantes, proveedores, proveedores de servicios o licenciantes serán responsables de cualquier lesión,
            pérdida, reclamo o cualquier daño directo, indirecto, incidental, punitivo, especial o consecuente de
            cualquier tipo, incluyendo de manera enunciativa más no limitativa; la pérdida de beneficios, pérdida de
            ingresos, pérdida de ahorros, pérdida de datos, costos de reemplazo o daños similares, ya sea por contrato,
            perjuicio (incluida la negligencia), responsabilidad estricta o de otro tipo, que surjan del uso que haga de
            cualquiera de los servicios o de cualquier producto adquirido por medio del servicio, o para cualquier otro
            reclamo relacionado de alguna manera con su uso del servicio o de cualquier producto, incluidos, entre
            otros, cualquier error u omisión en cualquier contenido, o cualquier pérdida o daño de cualquier tipo en el
            que se haya incurrido como resultado del uso del servicio o de cualquier contenido (o producto) publicado,
            transmitido o puesto a disposición a través del servicio, incluso si se informa de su posibilidad.
            Debido a que algunos estados o jurisdicciones no permiten la exclusión o la limitación de la responsabilidad
            por daños consecuentes o incidentales, en dichos estados o jurisdicciones, nuestra responsabilidad se
            limitará a la extensión máxima de lo permitido por la ley.</p>

        <h2>SECCIÓN 14: INDEMNIZACIÓN</h2>
        <p>Usted acepta indemnizar, defender y mantener indemne a <a href="index.php">The Ink</a> y a nuestra empresa
            matriz, subsidiarias,
            afiliadas, asociados, funcionarios, directores, agentes, contratistas, licenciantes, proveedores de
            servicios, subcontratistas, proveedores, pasantes y empleados, de cualquier reclamo o demanda, incluidos los
            honorarios razonables de abogados, en los que un tercero haya incurrido debido a su incumplimiento de los
            presentes Términos del servicio o de los documentos que incorporan como referencia o que surjan por su
            incumplimiento de los mismos, o por la violación de cualquier ley o derechos de un tercero que haga.</p>

        <h2>SECCIÓN 15: DIVISIBILIDAD</h2>
        <p>En caso de que se determine que alguna disposición de los presentes Términos del servicio sea ilegal, nula o
            inaplicable, dicha disposición será, no obstante, ejecutable en la medida en que lo permita la legislación
            aplicable, y la parte inaplicable se considerará separada de los presentes Términos del servicio, sin que
            dicha determinación afecte a la validez y aplicabilidad de las demás disposiciones.</p>

        <h2>SECCIÓN 16: RESCISIÓN</h2>
        <p>Las obligaciones y responsabilidades de las partes incurridas antes de la fecha de rescisión seguirán
            vigentes después de la rescisión de este contrato a todos los efectos.</p>
        <p>Estos Términos del servicio se encuentran vigentes a menos que usted o nosotros los rescindamos. Puede
            rescindir los presentes Términos del servicio en cualquier momento al notificarnos que ya no desea utilizar
            nuestros Servicios o cuando cese de utilizar nuestro sitio.</p>
        <p>Si a nuestro juicio usted incumple, o sospechamos que ha incumplido con cualquier término o disposición de
            los presentes Términos del servicio, podemos rescindir igualmente este acuerdo en cualquier momento sin
            previo aviso y usted seguirá siendo responsable de todos los importes adeudados, hasta la fecha de rescisión
            inclusive; y/o en consecuencia podemos denegarle el acceso a nuestros Servicios (o a parte de ellos).</p>

        <h2>SECCIÓN 17: ACUERDO COMPLETO</h2>
        <p>El hecho de que no ejerzamos o hagamos valer algún derecho o disposición de los presentes Términos del
            Servicio no constituirá una renuncia a dicho derecho o disposición.</p>
        <p>Estos Términos de servicio y cualquier política o regla de funcionamiento que hayamos publicado en este sitio
            o con respecto al Servicio constituye el acuerdo y el entendimiento completo entre usted y nosotros, y rigen
            su uso del Servicio, sustituyendo a cualquier acuerdo, comunicación o propuesta anterior o contemporánea, ya
            sea oral o escrita, entre usted y nosotros (incluyendo de manera enunciativa más no limitativa, las
            versiones anteriores de los Términos del servicio).</p>
        <p>Cualquier ambigüedad en la interpretación de los presentes Términos del servicio no se interpretará en
            contra de la parte redactora.</p>

        <h2>SECCIÓN 18: LEY APLICABLE</h2>
        <p>Los presentes Términos del servicio y cualquier acuerdo por separado por el cual le proporcionemos Servicios
            se regirán e interpretarán de acuerdo con las leyes de Calle Playa de Castilla, 13 Chalet8, Madrid, M,
            28669, España.</p>

        <h2>SECCIÓN 19: CAMBIOS EN LOS TÉRMINOS DEL SERVICIO</h2>
        <p>Puede revisar la versión más reciente de los Términos del servicio en cualquier momento en esta página.</p>
        <p>Nos reservamos el derecho, a nuestra entera discreción, de actualizar, cambiar o sustituir cualquier parte de
            los presentes Términos del servicio mediante la publicación de actualizaciones y cambios en nuestro sitio
            web. Es su responsabilidad consultar nuestro sitio web periódicamente para ver los cambios. El uso que haga
            de nuestra página web o del Servicio o su acceso a cualquiera de estos de forma continua después de la
            publicación de cualquier cambio en los presentes Términos del servicio, constituye la aceptación de dichos
            cambios.</p>

        <h2>SECTION 20: INFORMACIÓN DE CONTACTO</h2>
        <p>Las preguntas sobre los Términos del servicio se deben enviar a theink.jewellery@gmail.com.</p>
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