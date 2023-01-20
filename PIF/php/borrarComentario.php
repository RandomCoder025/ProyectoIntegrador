<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ../html/login.php");
    }
} else {
    header("Location ../html/login.php");
}
if ($_SESSION['username'] == null) {
    header("Location: ../html/LogIn.php");
} else if (isset($_GET['borrar'])) {
    require ("./conexion.php");

    $idBorrar =  $_GET['borrar'];
    $sql = "delete from `comentarios` where id='$idBorrar'";
    echo $sql;
    $resultado= mysqli_query($conexion,$sql);
    header("Location: ../html/publicacion.php?id=".$_GET['id_publicacion']);
} else {
    header("Location: ../html/publicacion.php?id=".$_GET['id_publicacion']);
}
