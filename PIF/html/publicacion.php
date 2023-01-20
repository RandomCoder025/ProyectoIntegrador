<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }
} else {
    header("Location ./login.php");
}
?>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link rel="icon" type="image/x-icon" href="../img/resources/favicon.ico">

    <title>Publicación</title>
    <style>
        #chat4 .form-control {
            border-color: transparent;
        }

        #chat4 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .fondo-bonico {
            background-color: #262522;
            margin: 0 10% 0 10%;
            opacity: 0.98;
        }

        main {
            opacity: 1;
        }

        body {
            background-image: url("../img/resources/john-matychuk-gUK3lA3K7Yo-unsplash.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .content-input input,
        .content-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .content-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .content-select select::-ms-expand {
            display: none;
        }

        .content-select {
            max-width: 250px;
            position: relative;
        }

        .content-select select {
            display: inline-block;
            width: 100%;
            cursor: pointer;
            padding: 7px 10px;
            height: 42px;
            outline: 0;
            border: 0;
            border-radius: 0;
            background: #262522;
            color: #7b7b7b;
            font-size: 1em;
            color: #999;
            font-family:
                'Quicksand', sans-serif;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            position: relative;
            transition: all 0.25s ease;
        }

        .content-select i {
            position: absolute;
            right: 20px;
            top: calc(50% - 13px);
            width: 16px;
            height: 16px;
            display: block;
            border-left: 4px solid #2AC176;
            border-bottom: 4px solid #2AC176;
            transform: rotate(-45deg);
            transition: all 0.25s ease;
        }

        .content-select:hover i {
            margin-top: 3px;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function hayTitulo() {
            var titulo = document.getElementById("titulo");
            var descripcion = document.getElementById("publicacion");
            var imagen = document.getElementById("imagenes");
            if (titulo != null && (descripcion != null || imagen != null)) {
                if (titulo.value == "" && (descripcion.value != "" || (imagen.value != "" || imagen.value != null))) {
                    document.getElementById("titulo").style.backgroundColor = "red";
                    return false;
                } else if (titulo.value == "" && (descripcion.value == "" && (imagen.value == null || imagen.value == ""))) {
                    return false;
                } else {
                    document.getElementById("titulo").style.backgroundColor = "green";
                    return true;
                }
            } else {
                return false;
            }
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-xl navbar-fixed-top navigation-clean-button" style="background-color:#F2F2F2;border-radius: 20;border-top-left-radius: 20; padding-top: 20px; padding-bottom: 10px;">
        <div class="container"><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div style="font-weight: bold;"><a class="navbar-brand" href="#"><span style="font-size: larger">Musigente</span></a></div>
            <div id="navcol-2" class="collapse navbar-collapse" style="color: rgb(255,255,255); justify-content: space-between">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="./Principal.php">Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="./busqueda.php">Buscar</a></li>
                    <li><a class="nav-link" href="./faq.php">FAQ</a></li>
                    <li><a class="nav-link" href="./Contact.php">Contact </a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0" action="./busqueda.php">
                            <div class="input-group mb-3">
                                <input type="text" id="valor" name="valor" class="form-control rounded mx-sm-1" placeholder="Buscar...">
                                <div class="content-select mx-sm-2">
                                    <select id="campo" name="campo">
                                        <option value="Nickname">Nombre de usuario</option>
                                        <option value="email">Email</option>
                                        <option value="Nombre">Nombre</option>
                                        <option value="Apellido1">Apellido1</option>
                                        <option value="Apellido2">Apellido2</option>
                                        <option value="Instrumento">Instrumento</option>
                                        <option value="Genero">Género Musical</option>
                                        <option value="Anos de experiencia">Años de experiencia mínimos</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary my-2 my-sm-0 rounded" type="submit">Search</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <div class="d-flex fondo-bonico">
        <aside class="col-md-1 col-lg-3" style="height: 50%; background-color: #815448; border-radius: 0 10px 10px 0;">
            <nav class="navbar navbar-light navbar-expand-md d-flex d-xl-flex flex-column flex-grow-0 justify-content-start justify-content-xl-start align-items-xl-start">
                <div class="container-fluid">
                    <ul class="navbar-nav flex-column">
                        <div id="navcol-3" class="collapse navbar-collapse " style="color: black">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <p class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <?php
                                        require("../php/conexion.php");

                                        $consulta = "SELECT ImagenDePerfil FROM usuario WHERE Nickname = '" . $_SESSION['username'] . "'";
                                        $resultado = mysqli_query($conexion, $consulta);
                                        $fila = mysqli_fetch_array($resultado);
                                        $imagen = $fila['ImagenDePerfil'];
                                        echo "<img class='img img-responsive rounded-circle' src='../img/usuarios/$imagen' alt='Imagen de perfil' style='width: 70px; height: 70px; margin-right: 20px; background-color: white'>";
                                        echo "<p class='fs-5 fw-bold me-1' style='color: #262522'>" . $_SESSION['username'] . "</p>";
                                        ?>
                                    </div>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <!--<li class="nav-item"><a class="nav-link" href="./Chat/chat.php">Chat</a></li>-->
                        <?php
                        echo "<li class='nav-item'><a class='nav-link' href='./perfil.php?profile=" . $_SESSION['username'] . "''>Perfil</a></li>"
                        ?>
                        <li class="nav-item"><a class="nav-link" href="./EditarPerfil.php">EditarPerfil</a></li>
                        <hr>
                        <li class="nav-item"><a class="nav-link" href="../php/LogOut.php">Logout</a></li>
                    </ul>
                    <a class="navbar-brand" href="#"></a>
                    <div id="navcol-1" class="collapse navbar-collapse d-flex d-xl-flex flex-column flex-grow-0 align-items-xl-start">
                    </div>
                </div>
            </nav>
        </aside>
        <main style="width: 60%;">
            <section style="background-color: #F2F2F2; border-radius: 10px; padding: 20px;">
                <?php
                if (isset($_SESSION)) {
                    if (isset($_SESSION['username'])) {
                        // Pillar el id del usuario por sesion
                        $nombreUsuario = $_SESSION['username'];
                        require("../php/conexion.php");

                        $consulta = "SELECT id FROM usuario WHERE Nickname = '" . $nombreUsuario . "'";
                        $resultado = mysqli_query($conexion, $consulta);
                        $fila = mysqli_fetch_array($resultado);
                        $idUsuario = $fila['id'];
                        $consulta = "SELECT id_usuario, titulo, contenido FROM publicaciones WHERE id = '" . $_GET['id'] . "'";
                        $idPublicacion = $_GET['id'];
                        $resultado = mysqli_query($conexion, $consulta);
                        $fila = mysqli_fetch_array($resultado);
                        $id_usuario = $fila['id_usuario'];
                        $titulo = $fila['titulo'];
                        $contenido = $fila['contenido'];
                        $consulta = "SELECT Nickname, ImagenDePerfil FROM usuario WHERE id = '$id_usuario'";
                        $resultado = mysqli_query($conexion, $consulta);
                        $fila = mysqli_fetch_array($resultado);
                        $nickname = $fila['Nickname'];
                        $imagen = $fila['ImagenDePerfil'];
                        echo "<div class='container-fluid'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='card'>
                                            <div class='card-header'>
                                                <div class='row'>
                                                    <div class='col-md-1'>
                                                        <img class='rounded-circle' src='../img/usuarios/$imagen' alt='Imagen de perfil' 
                                                        style='width: 70px; height: 70px; margin-right: 5px; background-color: white'>
                                                    </div>
                                                    <div class='col-md-10 ms-4'>
                                                        <h4 style='color: #262522'>" . $nickname . "</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='card-body'>
                                                <h5 class='card-title'>" . $titulo . "</h5>
                                                <p class='card-text'>" . $contenido . "</p>";
                        $consulta = "SELECT `RutaImagen` FROM `imagenespublicaciones` WHERE IDPublicacion = $idPublicacion";
                        $resultado3 = mysqli_query($conexion, $consulta);
                        if ($resultado3) {
                            if (mysqli_num_rows($resultado3) != 0) {
                                echo "<div style='display: flex; justify-content: center'>
                                                <div id='carouselExampleIndicators' class='carousel slide w-50' data-bs-ride='carousel'>
                                                    <div class='carousel-indicators'>";
                                $contador2 = 0;
                                echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='" . $contador2 . "' class='active' aria-current='true' aria-label='Slide " . ($contador2 + 1) . "'></button>";
                                $contador2++;
                                while ($contador2 < mysqli_num_rows($resultado3)) {
                                    echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='" . $contador2 . "' aria-label='Slide " . ($contador2 + 1) . "'></button>";
                                    $contador2++;
                                }
                                echo "</div>";
                                echo "<div class='carousel-inner'>";
                                $contador3 = 0;
                                while ($filaImagen = mysqli_fetch_assoc($resultado3)) {
                                    $imagen = $filaImagen['RutaImagen'];
                                    if ($contador3 == 0) {
                                        echo "<div class='carousel-item active'>";
                                    } else {
                                        echo "<div class='carousel-item'>";
                                    }
                                    echo "<img src='../img/imagenesPublicaciones/$imagen' class='d-block w-100' alt='...' style='max-height=300px; width=auto;'>
                                                                </div>";
                                    $contador3++;
                                }
                                echo "</div>";
                                if (mysqli_num_rows($resultado3) > 1) {
                                    echo "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
                                                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                        <span class='visually-hidden'>Previous</span>
                                                        </button>
                                                        <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
                                                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                        <span class='visually-hidden'>Next</span>
                                                        </button>
                                                        </div>
                                                        </div>";
                                } else {
                                    echo "</div>
                                    </div>";
                                }
                            }
                        }
                        echo "<hr><div style='display: flex; flex-direction: row-reverse'>";
                        // Mirar los likes de cada publicacion
                        $sql = "Select count('id') as num from `likes` where id_publicacion='$idPublicacion' ;";
                        $result = mysqli_query($conexion, $sql);
                        $seleccion = mysqli_fetch_assoc($result);
                        $likes = $seleccion['num'];
                        mysqli_free_result($result);
                        //mirar si el usuario de la sesion le ha dado like y mostrar otra imagen
                        $sql = "Select `id_publicacion` from `likes` where id_usuario=$idUsuario and id_publicacion=$idPublicacion";
                        $result = mysqli_query($conexion, $sql);
                        $seleccion = mysqli_fetch_assoc($result);
                        $_SESSION['idUserLike'] = $idUsuario;
                        if (isset($seleccion)) {
                            # code...
                            $likeado = $seleccion['id_publicacion'];
                            if ($idPublicacion == $likeado) {
                                echo "$likes<a href='../php/deslike.php?like=$idPublicacion&pantalla=1'><img src='../img/resources/heart-rojo.png' style='width: 20px; height: 20px'></a>";
                            } else {
                                echo "$likes<a href='../php/like.php?like=$idPublicacion&pantalla=1'><img src='../img/resources/heart.png' style='width: 20px; height: 20px'></a>";
                            }
                        } else {
                            echo "$likes<a href='../php/like.php?like=$idPublicacion&pantalla=1'><img src='../img/resources/heart.png' style='width: 20px; height: 20px'></a>";
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        $consulta = "SELECT id, IDUsuario, contenido FROM comentarios WHERE IDPublicacion = $idPublicacion" . " ORDER BY ID DESC";
                        $resultado = mysqli_query($conexion, $consulta);

                        echo "<div class='container-fluid' style='margin-top: 40px;'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='card'>
                                        <div class='card-header'>
                                            <h4>Comentarios</h4>
                                            <form id='comentarios' action='../php/comentar.php?id_publicacion=" . $_GET['id'] . "' method='POST'>
                                                <div class='form-group'>
                                                    <textarea class='form-control' id='comentario' name='comentario' rows='3' placeholder='Escribe un comentario...'></textarea>
                                                    <input type='submit' value='Comentar' class='btn btn-primary' style='margin: 10px'>
                                                </div>
                                            </form>
                                        </div>";
                        if ($resultado) {
                            if (mysqli_num_rows($resultado) != 0) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $id_usuario = $fila['IDUsuario'];
                                    $contenido = $fila['contenido'];
                                    $consulta = "SELECT Nickname, ImagenDePerfil FROM usuario WHERE id = '$id_usuario'";
                                    $resultado2 = mysqli_query($conexion, $consulta);
                                    $fila2 = mysqli_fetch_array($resultado2);
                                    $nickname = $fila2['Nickname'];
                                    $imagen = $fila2['ImagenDePerfil'];
                                    echo "<div class='card-body'>
                                        <div class='row'>
                                            <div class='col-md-2'>
                                                <img src='../img/usuarios/$imagen' class='rounded-circle' style='width: 50px; height: 50px;'>
                                            </div>
                                            <div class='col-md-10'>
                                                <h5 class='card-title'>" . $nickname . "</h5>
                                                <p class='card-text'>" . $contenido . "</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div style='display: flex; flex-direction: row-reverse'>";
                                    if (isset($fila['IDUsuario'])) {
                                        if ($fila['IDUsuario'] == $idUsuario) {
                                            echo "<a href='../php/borrarComentario.php?borrar=" . $fila['id'] . "&id_publicacion=" . $_GET['id'] . "' class='btn btn-danger' data-mdb-ripple-color='dark'
                                                style='margin-left: 20px; font-size: 12px'>
                                                Eliminar
                                                </a>";
                                        }
                                    }
                                    echo "</div>";
                                    echo "<hr>";
                                }
                            }
                        }
                        echo "</div>
                            </div>
                        </div>
                    </div>";
                    }
                }
                ?>
        </main>
    </div>
    <a href=" # "></a>
</body>

</html>