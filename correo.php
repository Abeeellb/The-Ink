<?php
// Varios destinatarios
$para = 'abellopezbonet@gmail.com' . ', '; // atención a la coma

// título
$título = 'Restablecer Contraseña';
$codigo = rand(1000, 9999);

// mensaje
$mensaje = '
        <h1>Restablecer Contraseña</h1>
            <h3>Código de verificación:</h3>
            <p>' . $codigo . '</p>

';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);
