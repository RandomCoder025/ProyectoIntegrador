<?php
require ("./conexion.php");

// validar desde un ajax que un usuario no exista
$nickname = $_POST['uname'];
$consulta_SQL = "SELECT * FROM usuario where nickname = '" . $nickname . "'";
$resultado = mysqli_query($conexion, $consulta_SQL);