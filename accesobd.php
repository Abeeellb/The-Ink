<?php
$host = 'localhost';
$user = 'root';
$passwd = '';
$db_name = 'theink';

$conn = mysqli_connect($host, $user, $passwd, $db_name);

if (mysqli_connect_errno()) {
    echo "Error al conectarse" . mysqli_connect_error();
}
