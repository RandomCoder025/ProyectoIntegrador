<?php

require ("./conexion.php");

login($conexion);
function login($conexion) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $comparar = "SELECT password FROM usuarios WHERE username = '$username'";
        $resultado = mysqli_query($conexion, $comparar);
        if ($password == $resultado) {
            echo "Bienvenido $username";
        } else {
            echo "Contraseña incorrecta";
            echo "../html/principal.html";
        }
    }
}