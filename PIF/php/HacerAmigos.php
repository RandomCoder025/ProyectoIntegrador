<?php
session_start();

if ($_SESSION['amigo1'] == null || $_SESSION['amigoSesion'] == null) {
    header("Location: ../html/LogIn.php");
} else {
    require("./conexion.php");

    $sql = "Insert into `amigos` (`id_usuario1`, `id_usuario2`) VALUES ('".$_SESSION['amigo1']."','".$_SESSION['amigoSesion']."')";
    $resultado = mysqli_query($conexion, $sql);
    
    $sql= "Select `Nickname` from `usuario` where id='".$_SESSION['amigo1']."';";
    echo "<h1>$sql</h1>";
    $resultado = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($resultado) ;
    $nombre= $row['Nickname'];

    //echo "<a href='../html/Perfil.php'> volver</a> ";
    header("Location: ../html/Perfil.php?profile=$nombre");
}
