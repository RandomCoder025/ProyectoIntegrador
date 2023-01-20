<?php
session_start();
require ("./conexion.php");

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos " . $BBDD . " . PHP_EOL";
echo "<br>Información del host: " . mysqli_get_host_info($conexion) . PHP_EOL;

mysqli_select_db($conexion, $BBDD) or die("Base de datos incorrecta .<br>");
mysqli_set_charset($conexion, "UTF8");

if (isset($_POST['submit'])) {
    if (isset($_POST['uname']) && isset($_POST['psw'])) {
        $username = $_POST['uname'];
        $psw = $_POST['psw'];
        $comparar = "SELECT id FROM usuario WHERE Nickname LIKE BINARY '$username';";
        $resultado = mysqli_query($conexion, $comparar);
        $row = $resultado->fetch_assoc();
        if ((int) $row > 0) {
            # Usuario es correcto
            $fallos = 1;
            $comparar = "SELECT Password FROM usuario WHERE Nickname LIKE BINARY '$username';";
            $resultado = mysqli_query($conexion, $comparar);
            $row = $resultado->fetch_assoc();
            if (hash("snefru", $psw) == $row['Password']) {
                #contraseña correcta
                $_SESSION['username'] = $username;
                header("Location: ../html/Principal.php");
            } else {
                $fallos = 1;
                header("Location: ../html/LogIn.php?fallos=$fallos");
            }
        } else {
            $fallos = 2;
            header("Location: ../html/LogIn.php?fallos=$fallos");
        }
    }
}
