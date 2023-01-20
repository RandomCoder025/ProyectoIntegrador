<?php
session_start();

if ($_SESSION['amigo1'] == null || $_SESSION['amigoSesion'] == null) {
    header("Location: ../html/LogIn.php");
} else {
    require("./conexion.php");


    $idPerfil = $_SESSION['amigo1'];
    $idSesion = $_SESSION['amigoSesion'];

    //Borrar la relacion de amiwistad
    $sql = "Delete from `amigos` where id_relacion= (Select `id_relacion` from `amigos` where id_usuario1='$idSesion' 
    and id_usuario2= '$idPerfil') or id_relacion=(Select `id_relacion` from `amigos` where id_usuario1='$idPerfil' and id_usuario2= '$idSesion')  ";
    $resultado = mysqli_query($conexion, $sql);

    // buscar de vuelta el nombre y mandarselo al perfil
    $sql = "Select `Nickname` from `usuario` where id='" . $_SESSION['amigo1'] . "';";
    echo "<h1>$sql</h1>";
    $resultado = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $nombre = $row['Nickname'];

    //echo "<a href='../html/Perfil.php'> volver</a> ";
    header("Location: ../html/Perfil.php?profile=$nombre");
}
