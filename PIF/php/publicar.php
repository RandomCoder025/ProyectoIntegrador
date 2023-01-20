<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ../html/login.php");
    }
} else {
    header("Location ../html/login.php");
}
require ("./conexion.php");



if (isset($_POST['titulo'])) {
    if ($_POST['titulo'] != "") {
        $publicar = $_POST['publicacion'];
        $titulo = $_POST['titulo'];
        $consulta_SQL = "SELECT ID FROM usuario WHERE nickname = '" . $_SESSION['username'] . "'";
        $resultado = mysqli_query($conexion, $consulta_SQL);
        $idUsuario = mysqli_fetch_array($resultado)['ID'];
        $consulta_SQL = "INSERT INTO `publicaciones`(`id_usuario`, `titulo`, `contenido`) VALUES ('$idUsuario','$titulo','$publicar')";
        mysqli_query($conexion, $consulta_SQL);
        $consulta_SQL = "SELECT MAX(id) FROM publicaciones WHERE id_usuario = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta_SQL);
        $idPublicacion = mysqli_fetch_array($resultado)['MAX(id)'];
        if (isset($_FILES['imagenes'])) {
            foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['imagenes']['name'][$key]) {
                    $filename = $_FILES['imagenes']['name'][$key];
                    $source = $_FILES['imagenes']['tmp_name'][$key];
                    $target = "../img/imagenesPublicaciones/" . $filename;
                    if (!file_exists('../img/imagenesPublicaciones')) {
                        mkdir('../img/imagenesPublicaciones', 0777, true);
                        if (file_exists('../img/imagenesPublicaciones')) {
                            if (move_uploaded_file($source, $target)) {
                                $consulta_SQL = "INSERT INTO `imagenespublicaciones`(`IDPublicacion`, `RutaImagen`) VALUES ('$idPublicacion','$filename')";
                                mysqli_query($conexion, $consulta_SQL);
                            } else {
                                echo "Cagaste manin";
                            }
                        }
                    } else {
                        if (move_uploaded_file($source, $target)) {
                            $consulta_SQL = "INSERT INTO `imagenespublicaciones`(`IDPublicacion`, `RutaImagen`) VALUES ('$idPublicacion','$filename')";
                            mysqli_query($conexion, $consulta_SQL);
                        } else {
                            echo "Cagaste manin";
                        }
                    }
                }
            }
        }
    }
}

header("Location: ../html/Principal.php");
// Y en teoría funciona hasta el comunismo
