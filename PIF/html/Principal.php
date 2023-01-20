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
    <title>Home</title>
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
    <!-- style="max-width:15%;margin-right: 10%; height: 50%; background-color: #815448; border-radius: 0 10px 10px 0;" -->
    <div class="d-flex fondo-bonico">
    <aside class="col-md-1 col-lg-3" style="height: 50%; background-color: #815448; border-radius: 0 10px 10px 0;" >
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
                                        echo "<p class='fs-5 fw-bold' style='color: #262522'>" . $_SESSION['username'] . "</p>";
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
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="border rounded border-0 p-4" style="background-color: #F2F2F2">
                        <h4 class="fw-bold mb-3"><?php
                                                    if (false) {
                                                        if (isset($_GET['user'])) {
                                                            $nombre = $_GET['user'];
                                                            echo $nombre;
                                                        } else {
                                                            echo "Perfil";
                                                        }
                                                    } else {
                                                        echo $_SESSION['username'];
                                                    }
                                                    ?>, ¿quieres compatir algo?
                        </h4>
                        <form action="../php/publicar.php" class="panel-activity__status" method="post" enctype="multipart/form-data" onsubmit="hayTitulo()">
                            <input type="text" name="titulo" class="form-control" placeholder="Título" maxlength="60" onkeyup="hayTitulo()"><br>
                            <textarea placeholder="Comparte algo..." class="form-control" name="publicacion" onkeyup="hayTitulo()"></textarea><br>
                            <div class="actions">
                                <div class="btn-group">
                                    <label for="imagenes" class="btn btn-primary mb-12 rounded"><img src="../img/resources/SubirImagenBlanco.png" style="width: 20px; height: 20px"> Subir imagen</label>
                                    <input type="file" name="imagenes[]" id="imagenes" multiple="multiple" style="display: none;" onclick="hayTitulo()" accept='image/jpeg, image/png'>
                                </div>
                                <hr>
                                <div class="btn-group"><button class="btn btn-primary" type="submit">Enviar</button>
                                </div>
                                <button class="btn btn-primary mx-sm-1" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section>
                <ul class="list-group">
                    <?php
                    if (isset($_SESSION)) {
                        // Pillar una variable para el numero de posts que se cargan
                        if (!isset($_GET['posts'])) {
                            $_GET['posts'] = 5;
                        } else {
                            $_GET['posts'] = $_GET['posts'] + 5;
                        }
                        if (isset($_SESSION['username'])) {
                            // Pillar el id del usuario por sesion
                            $nombreUsuario = $_SESSION['username'];
                            require ("../php/conexion.php");

                            $consulta = "SELECT id FROM usuario WHERE nickname='$nombreUsuario'";
                            $resultado = mysqli_query($conexion, $consulta);
                            $row = $resultado->fetch_assoc();
                            $idUsuario = $row['id'];
                            mysqli_free_result($resultado);
                            //BUscar en publicaciones de amigos y propias
                            $consulta = "SELECT DISTINCT id_Usuario1, id_Usuario2 FROM amigos WHERE id_usuario1 = $idUsuario OR id_usuario2 = $idUsuario";
                            $resultadoamiwis = mysqli_query($conexion, $consulta);
                            $consulta2 = "SELECT DISTINCT `id`, `id_usuario`, `titulo`, `contenido` FROM publicaciones where id_Usuario = '$idUsuario'";
                            $contadoramiwis = 0;
                            if ($resultadoamiwis) {
                                if (mysqli_num_rows($resultadoamiwis) > 0) {
                                    $consulta2 = $consulta2 . " or ";
                                    while ($filaamiwis = mysqli_fetch_assoc($resultadoamiwis) and $contadoramiwis < mysqli_num_rows($resultadoamiwis)) {
                                        $consulta2 = $consulta2 . "id_Usuario = $filaamiwis[id_Usuario1] or id_Usuario = $filaamiwis[id_Usuario2]";
                                        if ($contadoramiwis < (mysqli_num_rows($resultadoamiwis) - 1)) {
                                            $consulta2 = $consulta2 . " OR ";
                                        }
                                        $contadoramiwis++;
                                    }
                                }
                            }
                            $consulta2 = $consulta2 . " order by id desc limit " . $_GET['posts'] . " ;";
                            $resultado = mysqli_query($conexion, $consulta2);
                            $contador = 0;
                            $contador4 = 0;
                            if ($resultado) {
                                if (mysqli_num_rows($resultado) != 0) {
                                    while ($fila = mysqli_fetch_assoc($resultado) and $contador4 < $_GET['posts']) {
                                        $nombreID = $fila['id_usuario'];
                                        $comando2 = "SELECT Nickname, ImagenDePerfil FROM usuario WHERE id ='$nombreID'";
                                        $resultado2 = mysqli_query($conexion, $comando2);
                                        $row = mysqli_fetch_assoc($resultado2);
                                        $cuenta = $row['Nickname'];
                                        $titulo = $fila['titulo'];
                                        $contenido = $fila['contenido'];
                                        $imagen = $row['ImagenDePerfil'];
                                        $idPublicacion = $fila['id'];
                                        mysqli_free_result($resultado2);
                                        echo "<li class='list-group-item card mt-3 mb-3'>
                                        <a href='../html/perfil.php?profile=$cuenta'>
                                        <img src='../img/usuarios/$imagen' class='rounded-circle mr-2 float-start' width='50' height='50' alt='...' style='margin: 10px;'>
                                        </a>
                                        <p class='card-title'>$cuenta</p>
                                        <h5 class='card-title'>
                                        $titulo
                                        </h5>
                                        <p class='card-body'>
                                        $contenido
                                        </p>";
                                        $consulta = "SELECT `RutaImagen` 
                                        FROM `imagenespublicaciones` WHERE IDPublicacion = $idPublicacion";
                                        $resultado3 = mysqli_query($conexion, $consulta);
                                        if ($resultado3) {
                                            if (mysqli_num_rows($resultado3) != 0) {
                                                echo "<div style='display: flex; justify-content: center'>
                                                <div id='carouselExampleIndicators$contador4' class='carousel slide w-50' data-bs-ride='carousel'>
                                                    <div class='carousel-indicators'>";
                                                $contador2 = 0;
                                                echo "<button type='button' data-bs-target='#carouselExampleIndicators$contador4' data-bs-slide-to='" . $contador2 . "' class='active' aria-current='true' aria-label='Slide " . ($contador2 + 1) . "'></button>";
                                                $contador2++;
                                                while ($contador2 < mysqli_num_rows($resultado3)) {
                                                    echo "<button type='button' data-bs-target='#carouselExampleIndicators$contador4' data-bs-slide-to='" . $contador2 . "' aria-label='Slide " . ($contador2 + 1) . "'></button>";
                                                    $contador2++;
                                                    $contador++;
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
                                                    echo "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators$contador4' data-bs-slide='prev'>
                                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                    <span class='visually-hidden'>Previous</span>
                                                    </button>
                                                    <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators$contador4' data-bs-slide='next'>
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
                                        echo "<hr>";
                                        echo "<div style='display: flex; flex-direction: row-reverse'>";
                                        if (isset($fila['id_usuario'])) {
                                            if ($fila['id_usuario'] == $idUsuario) {
                                                echo "<a href='../php/borrarPublicacion.php?borrar=$idPublicacion' class='btn btn-danger' data-mdb-ripple-color='dark'
                                                style='margin-left: 20px; font-size: 12px'>
                                                Eliminar
                                                </a>";
                                            }
                                        }
                                        $consulta = "SELECT count(*) FROM `comentarios` WHERE IDPublicacion = $idPublicacion";
                                        $resultadoCom = mysqli_query($conexion, $consulta);
                                        $rowCom = mysqli_fetch_assoc($resultadoCom);
                                        $numCom = $rowCom['count(*)'];
                                        echo "$numCom<a href='./publicacion.php?id=$idPublicacion' data-mdb-ripple-color='dark'
                                        style='margin-left: 20px; font-size: 12px'>
                                        <img src='../img/resources/bocadillo-dialogo-clipart.png' style='width: 20px; height: 20px'></a>";
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
                                                echo "$likes<a href='../php/deslike.php?like=$idPublicacion'><img src='../img/resources/heart-rojo.png' style='width: 20px; height: 20px'></a>";
                                            } else {
                                                echo "$likes<a href='../php/like.php?like=$idPublicacion'><img src='../img/resources/heart.png' style='width: 20px; height: 20px'></a>";
                                            }
                                        } else {
                                            echo "$likes<a href='../php/like.php?like=$idPublicacion'><img src='../img/resources/heart.png' style='width: 20px; height: 20px'></a>";
                                        }
                                        echo "</div>";
                                        echo "</li>";
                                        $contador4++;
                                    }
                                    echo "</li>";
                                    echo  "<div style='margin: 40px 50px 15px 15px; display: flex; justify-content: space-between;'>
                                    <a href='Principal.php?posts=" . $_GET["posts"] . "' class='btn btn-success'>Cargar más</a></div>";
                                }
                            } else {
                                echo "<p>No tienes mensajes</p>";
                            }
                        }
                    }
                    ?>
                </ul>
            </section>
        </main>
    </div>
    <a href=" # "></a>
</body>

</html>