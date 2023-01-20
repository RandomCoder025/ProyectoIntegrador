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

    <title>
        <?php
        echo $_SESSION['username'];
        ?>
    </title>
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
                    <li class="nav-item"><a class="nav-link" href="./Principal.php">Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="./busqueda.php">Buscar</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Contact.php">Contact </a></li>
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
            <?php
            if (isset($_GET['profile'])) {
                $nombreUsuario = $_SESSION['username'];
                require("../php/conexion.php");

                $nombre = $_GET['profile'];
                $sql = "SELECT `ID`, `Nickname`, `email`, `Nombre`, `Instrumento`, `Apellido1`, `Apellido2`, `GeneroP`, `Genero`, `Anos de experiencia`, `IdGrupo`, `IdDomicilio`, `Descripcion`, `ImagenDePerfil`
                    FROM `usuario` WHERE nickname = '$nombre'";
                $result = mysqli_query($conexion, $sql);
                $row = mysqli_fetch_assoc($result);
                $idPerfil = $row['ID'];
                $usuario = $row['Nickname'];
                $nombre = $row['Nombre'];
                $apellido1 = $row['Apellido1'];
                $apellido2 = $row['Apellido2'];
                $email = $row['email'];
                $instrumento = $row['Instrumento'];
                $generoM = $row['Genero'];
                $generoP = $row['GeneroP'];
                $experiencia = $row['Anos de experiencia'];
                $descripcion = $row['Descripcion'];
                $imagen = $row['ImagenDePerfil'];
                // Comando para mirar el id del usuario de sesion
                mysqli_free_result($result);
                $sql = "Select `ID` from `usuario` where Nickname ='" . $_SESSION['username'] . "' ;";
                $resultado = mysqli_query($conexion, $sql);
                $row = mysqli_fetch_assoc($resultado);
                $idSesion = $row['ID'];

                mysqli_free_result($resultado);

                //Comando para mirar en la tabla amigos si perfil y sesion son amiwis
                $sql = "Select `id_relacion` from `amigos` where id_relacion= (Select `id_relacion` from `amigos` where id_usuario1='$idSesion' and id_usuario2= '$idPerfil') or id_relacion=(Select `id_relacion` from `amigos` where id_usuario1='$idPerfil' and id_usuario2= '$idSesion')  ";
                $resultado = mysqli_query($conexion, $sql);
                $row = mysqli_fetch_assoc($resultado);

                if (isset($row['id_relacion'])) {
                    $idAmiwis = $row['id_relacion'];
                } else {
                    $idAmiwis = 0;
                }

                //Pasar los ids de los amigos a variables de sesion para pasarlos al pachepe

                $_SESSION['amigo1'] = $idPerfil;
                $_SESSION['amigoSesion'] = $idSesion;

                echo "<section class='h-100' style='background-color: #401519'>
                    <div class='container py-5 h-100'>
                    <div class='row d-flex justify-content-center align-items-center h-100'>
                    <div class='col col-lg-11 col-xl-9'>
                    <div class='card'>
                        <div class='rounded-top text-white d-flex flex-row' style='background-color: #000; height:200px;'>
                            <div class='ms-4 mt-3 d-flex flex-column' style='width: 150px;'>
                                <img src='../img/usuarios/" . $imagen . "'
                                alt='Generic placeholder image' class='img-fluid img-thumbnail mt-4 mb-2'
                                style='width: 150px; z-index: 1'>";
                if ($_SESSION['username'] == $_GET['profile']) {
                    echo "<a href='./editarPerfil.php' type='button' class='btn btn-primary' data-mdb-ripple-color='dark'
                                    style='z-index: 1;'>Editar Perfil</a>";


                    // Mirar en la base de datos si perfil es amigo de sesión, mostrar otro boton
                } else if ($idAmiwis > 0) {

                    echo "<a href='../php/DesSeguir.php' class='btn btn-light ' data-mdb-ripple-color='dark'
                                    style='z-index: 1;' role='button'>
                                            Siguiendo
                                           </a>";


                    // Cambiar el enlace y hacer otro php donde se hagan amiwis
                } else {
                    echo "<a href='../php/HacerAmigos.php' class='btn btn-primary ' data-mdb-ripple-color='dark'
                                    style='z-index: 1;' role='button'>
                                            Seguir
                                           </a>";
                }
                echo "</div>
                            <div class='ms-3' style='margin-top: 30px;'>
                                <h3>" . $usuario . "</h3>
                                <h5>" . $nombre . " " . $apellido1;
                if ($apellido2 != null) {
                    echo " " . $apellido2;
                }
                echo "</h5>
                            </div>
                            </div>
                            <div class='p-4 text-black' style='background-color: #f8f9fa;'>
                            <div class='d-flex justify-content-end text-center py-1'>";
                if ($experiencia != null or $experiencia != 0) {
                    echo "<div style='margin: 5px'>
                                <p class='mb-1 h5'>" . $experiencia . "</p>
                                <p class='small text-muted mb-0'>Años de experiencia </p>
                                </div>";
                }
                if ($generoP != null) {
                    switch ($generoP) {
                        case 'M':
                            echo "<div style='margin: 5px'>
                                            <p class='mb-1 h5'>Masculino</p>
                                            <p class='small text-muted mb-0'>Género</p>
                                            </div>";
                            break;
                        case 'F':
                            echo "<div style='margin: 5px'>
                                            <p class='mb-1 h5'>Femenino</p>
                                            <p class='small text-muted mb-0'>Género</p>
                                            </div>";
                            break;
                        case 'O':
                            echo "<div style='margin: 5px'>
                                            <p class='mb-1 h5'>Otro</p>
                                            <p class='small text-muted mb-0'>Género</p>
                                            </div>";
                            break;
                        default:
                            echo "<div style='margin: 5px'>
                                            <p class='mb-1 h5'>No especificado</p>
                                            <p class='small text-muted mb-0'>Género</p>
                                            </div>";
                            break;
                    }
                }
                echo "</div>
                            </div>
                            <div class='card-body p-4 text-black'>
                            <div class='mb-5'>
                                <p class='lead fw-normal mb-1'>Descripción</p>";
                if ($descripcion != null) {
                    echo "<p>" . $descripcion . "</p>";
                } else {
                    echo "<p>Este usuario no tiene descripción</p>";
                }
                echo "</div>
                            </div>
                            <div class='d-flex justify-content-between align-items-center mb-4'>
                                <p class='lead fw-normal mb-0'>Publicaciones</p>
                            </div>";
                if (isset($_SESSION)) {
                    // Pillar una variable para el numero de posts que se cargan
                    if (!isset($_SESSION['posts'])) {
                        $_SESSION['posts'] = 5;
                    } else {
                        $_SESSION['posts'] = $_SESSION['posts'] + 5;
                    }
                    if (isset($_SESSION['username'])) {
                        // Pillar el id del usuario por sesion
                        $nombreUsuario = $_SESSION['username'];
                        require("../php/conexion.php");

                        $profile = $_GET['profile'];
                        $consulta = "SELECT id FROM usuario WHERE nickname= '$profile'";
                        $resultado = mysqli_query($conexion, $consulta);
                        $row = $resultado->fetch_assoc();
                        $idUsuario = $row['id'];
                        mysqli_free_result($resultado);
                        //BUscar en publicaciones de amigos y propias
                        $consulta2 = "SELECT DISTINCT `id`, `id_usuario`, `titulo`, `contenido` FROM publicaciones where id_Usuario = '$idUsuario'";
                        $resultado = mysqli_query($conexion, $consulta2);
                        $contador = 0;
                        $contador4 = 0;
                        if ($resultado) {
                            if (mysqli_num_rows($resultado) != 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
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
                                    $consulta = "SELECT `RutaImagen` 
                                        FROM `imagenespublicaciones` WHERE IDPublicacion = $idPublicacion";
                                    $resultado3 = mysqli_query($conexion, $consulta);
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
                                            while ($fila = mysqli_fetch_assoc($resultado3)) {
                                                $imagen = $fila['RutaImagen'];
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
                                            echo "$likes<a href='../php/deslike.php?like=$idPublicacion&pantalla=2'><img src='../img/resources/heart-rojo.png' style='width: 20px; height: 20px'></a>";
                                        } else {
                                            echo "$likes<a href='../php/like.php?like=$idPublicacion&pantalla=2'><img src='../img/resources/heart.png' style='width: 20px; height: 20px'></a>";
                                        }
                                    } else {
                                        echo "$likes<a href='../php/like.php?like=$idPublicacion&pantalla=2'><img src='../img/resources/heart.png' style='width: 20px; height: 20px'></a>";
                                    }
                                    echo "</div>";
                                    echo "</li>";
                                    $contador4++;
                                }
                                echo "</li>";
                            }
                        } else {
                            echo "<p>Este usuario no tiene publicaciones</p>";
                        }
                    }
                }
                echo "</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>";
            }
            ?>
            </section>
        </main>
    </div>
    <a href=" # "></a>
</body>

</html>