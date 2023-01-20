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
    $sql = "delete from `publicaciones` where id='$idBorrar' ";
    $resultado= mysqli_query($conexion,$sql);
    header("Location: ../html/Principal.php");
} else {
    header("Location: ../html/Principal.php");
}
