<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ../html/login.php");
    }
} else {
    header("Location ../html/login.php");
}
if ($_GET['like'] == null || $_SESSION['idUserLike'] == null) {
    header("Location: ../html/LogIn.php");
} else {
    require("./conexion.php");
    $sql = "Insert into `likes` (`id_publicacion`, `Id_Usuario`) VALUES ('" . $_GET['like'] . "','" . $_SESSION['idUserLike'] . "')";
    echo "<h1>$sql</h1>";
    $resultado = mysqli_query($conexion, $sql);

    //echo "<a href=' ../html/Principal.php'> vlover</a> ";
    if (!isset($_GET['pantalla'])) {
        header("Location: ../html/Principal.php");
    } elseif ($_GET['pantalla'] == 1) {
        header("Location: ../html/Publicacion.php?id=" . $_GET['like']);
    } elseif ($_GET['pantalla'] == 2) {
        $sql = "Select Nickname from usuario where id=(Select id_usuario from publicaciones where id=" . $_GET['like'] . ")";
        $resultado = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($resultado);
        $perfil = $row['Nickname'];

        header("Location: ../html/Perfil.php?profile=$perfil");
    }
}
