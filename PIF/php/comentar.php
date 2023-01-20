<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ../html/login.php");
    }
} else {
    header("Location ../html/login.php");
}

$nombreUsuario = $_SESSION['username'];
require ("./conexion.php");

if (isset($_POST['comentario'])) {
    if ($_POST['comentario'] != "") {
        $comentario = $_POST['comentario'];
        $consulta = "SELECT id FROM usuario WHERE Nickname = '".$_SESSION['username']."'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $idUsuario = $fila['id'];
        $sql = "INSERT INTO comentarios (contenido, IDUsuario, IDPublicacion) VALUES ('$comentario', '$idUsuario', '".$_GET['id_publicacion']."')";
        $result = mysqli_query($conexion, $sql);
        if ($result) {
            header("Location: ../html/publicacion.php?id=".$_GET['id_publicacion']);
        } else {
            echo "Error al comentar";
            header("Location: ../html/publicacion.php?id=".$_GET['id_publicacion']);

        }
    }
}
header("Location: ../html/publicacion.php?id=".$_GET['id_publicacion']);


