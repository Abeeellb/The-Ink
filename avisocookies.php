<a?php session_start(); ?>
    <?php
    include "accesobd.php"
        ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aviso de Cookies</title>
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
                color: rgb(124, 124, 124);
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
        

        <main class="container-fluid">

            <h1 class="mt-5 mb-4">Aviso de Cookies</h1>
            <h3>¿Qué son las cookies?</h3>
            <p>Una cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web. Las
                cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los
                hábitos de navegación de un usuario o de su equipo y, dependiendo de la información que contengan y de
                la forma en que utilice su equipo, pueden utilizarse para reconocer al usuario.</p>

            <h3>¿Qué tipos de cookies utiliza esta página web?</h3>
            <p>Esta página web utiliza los siguientes tipos de cookies:</p>

            <p><b>Cookies de análisis:</b> Son aquéllas que bien tratadas por nosotros o por terceros, nos permiten
                cuantificar el número de usuarios y así realizar la medición y análisis estadístico de la utilización
                que hacen los usuarios del servicio ofertado. Para ello se analiza su navegación en nuestra página web
                con el fin de mejorar la oferta de productos o servicios que le ofrecemos.</p>

            <p><b>Cookies técnicas:</b> Son aquellas que permiten al usuario la navegación a través del área restringida
                y la utilización de sus diferentes funciones, como por ejemplo, llevar a cambio el proceso de compra de
                un artículo.</p>

            <p><b>Cookies de personalización:</b> Son aquellas que permiten al usuario acceder al servicio con algunas
                características de carácter general predefinidas en función de una serie de criterios en el terminal del
                usuario como por ejemplo serian el idioma o el tipo de navegador a través del cual se conecta al
                servicio.</p>

            <p><b>Cookies publicitarias:</b> Son aquéllas que, bien tratadas por esta web o por terceros, permiten
                gestionar de la forma más eficaz posible la oferta de los espacios publicitarios que hay en la página
                web, adecuando el contenido del anuncio al contenido del servicio solicitado o al uso que realice de
                nuestra página web. Para ello podemos analizar sus hábitos de navegación en Internet y podemos mostrarle
                publicidad relacionada con su perfil de navegación.</p>

            <p><b>Cookies de publicidad comportamental:</b> Son aquellas que permiten la gestión, de la forma más eficaz
                posible, de los espacios publicitarios que, en su caso, el editor haya incluido en una página web,
                aplicación o plataforma desde la que presta el servicio solicitado. Este tipo de cookies almacenan
                información del comportamiento de los visitantes obtenida a través de la observación continuada de sus
                hábitos de navegación, lo que permite desarrollar un perfil específico para mostrar avisos publicitarios
                en función del mismo.</p>


            <h3>Desactivar las cookies.</h3>
            <p>Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración
                de las opciones del navegador instalado en su ordenador.</p>

            <p>En la mayoría de los navegadores web se ofrece la posibilidad de permitir, bloquear o eliminar las
                cookies instaladas en su equipo.</p>

            <p>A continuación puede acceder a la configuración de los navegadores webs más frecuentes para aceptar,
                instalar o desactivar las cookies:</p>

            <p><a href="https://support.google.com/chrome/answer/95647?hl=es" target="_blank" rel="noopener">Configurar
                    cookies en Google Chrome</a></p>

            <p><a href="http://windows.microsoft.com/es-es/windows7/how-to-manage-cookies-in-internet-explorer-9"
                    target="_blank" rel="noopener">Configurar cookies en Microsoft Internet Explorer</a></p>

            <p><a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias?redirectlocale=es&amp;redirectslug=habilitar-y-deshabilitar-cookies-que-los-sitios-we"
                    target="_blank" rel="noopener">Configurar cookies en Mozilla Firefox</a></p>

            <p><a href="https://support.apple.com/es-es/HT201265" target="_blank" rel="noopener">Configurar cookies en
                    Safari (Apple)</a></p>


            <h3>Cookies de terceros.</h3>

            <p>Esta página web utiliza servicios de terceros para recopilar información con fines estadísticos y de uso
                de la web. Se usan cookies de DoubleClick para mejorar la publicidad que se incluye en el sitio web. Son
                utilizadas para orientar la publicidad según el contenido que es relevante para un usuario, mejorando
                así la calidad de experiencia en el uso del mismo.</p>

            <p>En concreto, usamos los servicios de Google Adsense y de Google Analytics para nuestras estadísticas y
                publicidad. Algunas cookies son esenciales para el funcionamiento del sitio, por ejemplo el buscador
                incorporado.</p>

            <p>Nuestro sitio incluye otras funcionalidades proporcionadas por terceros. Usted puede fácilmente compartir
                el contenido en redes sociales como Facebook, Twitter o Google +, con los botones que hemos incluido a
                tal efecto.</p>


            <h3>Advertencia sobre eliminar cookies.</h3>

            <p>Usted puede eliminar y bloquear todas las cookies de este sitio, pero parte del sitio no funcionará o la
                calidad de la página web puede verse afectada.</p>

            <p>Si tiene cualquier duda acerca de nuestra política de cookies, puede contactar con esta página web a
                través de nuestros canales de Contacto.</p>
        </main>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">

        </script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    </body>

    </html>