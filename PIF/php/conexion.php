<?php

$host = "localhost";
$user = "root";
$clave = "";
$BBDD = "pire";

$conexion = mysqli_connect($host, $user, $clave, $BBDD);

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_select_db($conexion, $BBDD) or die("Base de datos incorrecta .<br>");
mysqli_set_charset($conexion, "UTF8");
