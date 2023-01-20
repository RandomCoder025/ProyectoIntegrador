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
    <title>Editar Perfil</title>
    <link rel="icon" type="image/x-icon" href="../img/resources/favicon.ico">

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
        function validar_email() {
            var email = document.getElementById('email').value;
            let regExp = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
            if (regExp.test(email)) {
                document.querySelector('#emailErrorMsg').style.display = 'none';
                return true;
            } else {
                document.querySelector('#emailErrorMsg').style.display = 'block';
                return false;
            }
        }

        function checkPassword() {
            var password = document.getElementById('password1').value;
            var p1 = document.getElementById("password1").value;
            var p2 = document.getElementById("password2").value;
            var longitud = true;
            var mayuscula = true;
            var letras = true;
            var numero = true;
            var coinciden = true;
            var noEspacios = true;
            //validar longitud contraseña
            if (password.length < 8) {
                longitud = false;
            } else {
                longitud = true;
            }
            //validar letra
            if (password.match(/[A-z]/)) {
                letras = true;
            } else {
                letras = false;
            }
            //validar letra mayúscula
            if (password.match(/[A-Z]/)) {
                mayuscula = true;
            } else {
                mayuscula = false;
            }
            //validar numero
            if (password.match(/\d/)) {
                numero = true;
            } else {
                numero = false;
            }
            if (p1 != "" && p2 != "") {
                if (p1 != p2) {
                    coinciden = false;
                } else {
                    coinciden = true;
                }
                if (p1.indexOf(" ") != -1 || p2.indexOf(" ") != -1) {
                    noEspacios = false;
                } else {
                    noEspacios = true;
                }
            } else {
                coinciden = false;
                noEspacios = false;
            }

            if (longitud && letras && mayuscula && numero && coinciden && noEspacios) {
                document.querySelector('#passwordErrorMsg').style.display = 'none';
            } else {
                document.querySelector('#passwordErrorMsg').style.display = 'block';
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
                                        $conexion = mysqli_connect("localhost", "root", "");
                                        $db = mysqli_select_db($conexion, "pire");
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
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Perfil</h3>
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">User Settings</p>
                        </div>
                        <div class="card-body">
                            <form onsubmit="validar()" action="../php/actualizarPerfil.php" method="post" enctype="multipart/form-data">
                                <div class="row" style="margin-bottom: 25px;text-align: left;">
                                    <?php
                                    if (isset($_SESSION)) {
                                        if (isset($_SESSION['username'])) {
                                            $nombreUsuario = $_SESSION['username'];
                                            $conexion = mysqli_connect("localhost", "root", "");
                                            $db = mysqli_select_db($conexion, "pire") or die;
                                            $consulta = "SELECT `Nickname`, `email`, `Nombre`, `Instrumento`, `Apellido1`, `Apellido2`, `GeneroP`, `Genero`, 
                                `Anos de experiencia`, `IdGrupo`, `IdDomicilio`, `Descripcion`, `ImagenDePerfil` 
                                FROM usuario WHERE Nickname = '$nombreUsuario'";
                                            $resultado = mysqli_query($conexion, $consulta);
                                            $fila = mysqli_fetch_array($resultado);
                                            mysqli_free_result($resultado);
                                            $consulta = "SELECT `Calle`, `NumeroPortal`, `Piso`, `Puerta`, `codigoPostal`, `ciudad` FROM `domicilio` WHERE `ID` = $fila[IdDomicilio]";
                                            $resultado = mysqli_query($conexion, $consulta);
                                            $filaDom = mysqli_fetch_array($resultado);
                                            echo "<div class='col-sm-4 col-md-4 col-lg-3 col-xl-2 col-xxl-2' style='display: inline;text-align: 
                                        center;margin-bottom: 25px;'><img class='rounded-circle mb-3 img-fluid mr-2' src='../img/usuarios/" . $fila['ImagenDePerfil'] . "' style='display: inline;max-height: 110px;'/><br/>
                                        <label for='ImagenDePerfil' class='btn btn-primary'>Change Photo</label>
                                        <input type='file' id='ImagenDePerfil' name='ImagenDePerfil' style='display: none' accept='image/jpeg, image/png'>
                                        </div>
                                            <div class='col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xxl-10 align-self-center'>
                                                <div class='row'>
                                                    <div class='col-md-12 text-start'>
                                                        <div class='mb-3'>
                                                            <label class='form-label' for='email'>
                                                                <strong>Dirección email</strong>
                                                            </label>
                                                            <input id='email' class='form-control' type='email' placeholder='" . $fila['email'] . "' name='email' onkeyup='validar_email()'/>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-12 text-start'>
                                                        <div class='mb-3'>
                                                            <label class='form-label' for='username'>
                                                                <strong>Nombre de usuario</strong>
                                                            </label>
                                                            <input class='form-control' type='text' placeholder='" . $fila['Nickname'] . "' name='username'/>
                                                        </div>
                                                    </div>
                                                </div>";
                                            if (isset($_GET["error"])) {
                                                $fallos = $_GET["error"];
                                                if ($fallos == 1) {
                                                    echo "<div class='alert alert-warning'>
                                                            Este usuario ya existe, por favor elija otro
                                                            </div>";
                                                }
                                            }
                                            echo "</div>
                                            <div class='col-md-12 text-start'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='nombre'>
                                                        <strong>Descripción</strong>
                                                    </label>
                                                    <textarea class='form-control' id='descripcion' name='descripcion' rows='3'>" . $fila['Descripcion'] . "</textarea>
                                                </div>
                                            </div>
                                            <div class='col-md-6 text-start'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='username'>
                                                        <strong>Contraseña</strong>
                                                    </label>
                                                    <input id='password1' class='form-control' type='password' placeholder='Password' onkeyup='checkPassword()'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6 text-start'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='username'>
                                                        <strong>Confirmar contraseña</strong>
                                                    </label>
                                                    <input id='password2' class='form-control' type='password' placeholder='Password' onkeyup='checkPassword()'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='nombre'>
                                                        <strong>Nombre</strong>
                                                    </label>
                                                    <input class='form-control' type='text' placeholder='" . $fila['Nombre'] . "'name='nombre'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='apellidos'>
                                                        <strong>Apellidos</strong>
                                                    </label>
                                                    <input class='form-control' type='text' placeholder='" . $fila['Apellido1'] . " " . $fila['Apellido2'] . "' name='apellidos'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='instrumento'>
                                                        <strong>Instrumento</strong>
                                                    </label>
                                                <input class='form-control' list='instrumentos' name='instrumento' id='instrumento' value='" . $fila['Instrumento'] . "'>
                                                <datalist id='instrumentos'>
                                                    <option value='Acordeón'>
                                                    <option value='Agogo'>
                                                    <option value='Ajaeng'>
                                                    <option value='Albogue'>
                                                    <option value='Almirez'>
                                                    <option value='Angklung'>
                                                    <option value='Antara'>
                                                    <option value='Arco de Diddley'>
                                                    <option value='Arco percutor'>
                                                    <option value='Ardín'>
                                                    <option value='Armónica'>
                                                    <option value='Armonio'>
                                                    <option value='Armonio de fuelle manual'>
                                                    <option value='Arpa'>
                                                    <option value='Arpa Jarocha'>
                                                    <option value='Arpa llanera'>
                                                    <option value='Arpa paraguaya'>
                                                    <option value='Arrabel'>
                                                    <option value='Ashiko'>
                                                    <option value='Asor'>
                                                    <option value='Atabaque'>
                                                    <option value='Avotl'>
                                                    <option value='Azusayumi'>
                                                    <option value='Bachi'>
                                                    <option value='Baglama'>
                                                    <option value='Baglamás'>
                                                    <option value='Bajo'>
                                                    <option value='Bajo sexto'>
                                                    <option value='Balafón'>
                                                    <option value='Balalaika'>
                                                    <option value='Bamboula'>
                                                    <option value='Bandola'>
                                                    <option value='Bandola andina colombiana'>
                                                    <option value='Bandolín tachirense'>
                                                    <option value='Bandolóm'>
                                                    <option value='Bandura'>
                                                    <option value='Bandurria'>
                                                    <option value='Banja'>
                                                    <option value='Bansuri'>
                                                    <option value='Banyo'>
                                                    <option value='Barril de bomba'>
                                                    <option value='Batá'>
                                                    <option value='Batería'>
                                                    <option value='Begena'>
                                                    <option value='Bendir'>
                                                    <option value='Berimáu'>
                                                    <option value='Bianqing'>
                                                    <option value='Bianzhong'>
                                                    <option value='Binzasara'>
                                                    <option value='Birimbao'>
                                                    <option value='Binioù'>
                                                    <option value='Biwa'>
                                                    <option value='Bodhrán'>
                                                    <option value='Bolón'>
                                                    <option value='Bombo'>
                                                    <option value='Bongo'>
                                                    <option value='Baugarabou'>
                                                    <option value='Buk'>
                                                    <option value='Bulbul tarang'>
                                                    <option value='Buzuk'>
                                                    <option value='Buzuki'>
                                                    <option value='Cacalachtli'>
                                                    <option value='Caja'>
                                                    <option value='Cajón'>
                                                    <option value='Campana'>
                                                    <option value='Campanas tubulares'>
                                                    <option value='Cantaro'>
                                                    <option value='Canto'>
                                                    <option value='Calabash'>
                                                    <option value='Capador'>
                                                    <option value='Carcabas'>
                                                    <option value='Carillón'>
                                                    <option value='Carraca'>
                                                    <option value='Cartonal'>
                                                    <option value='Castañuelas'>
                                                    <option value='Cataquí'>
                                                    <option value='Cavaquiño'>
                                                    <option value='Celesta'>
                                                    <option value='Cencerro'>
                                                    <option value='Chande'>
                                                    <option value='Chapareque'>
                                                    <option value='Charango'>
                                                    <option value='Checo'>
                                                    <option value='Chequeré'>
                                                    <option value='Chenda'>
                                                    <option value='Clarín'>
                                                    <option value='Clarinete'>
                                                    <option value='Clave (claves)'>
                                                    <option value='Cítara'>
                                                    <option value='Clarín'>
                                                    <option value='Clarinete'>
                                                    <option value='Clave'>
                                                    <option value='Clavecín'>
                                                    <option value='Clavicordio'>
                                                    <option value='Coga'>
                                                    <option value='Corneta'>
                                                    <option value='Corno Inglés'>
                                                    <option value='Cítara'>
                                                    <option value='Contrabajo'>
                                                    <option value='Corneta china'>
                                                    <option value='Corno'>
                                                    <option value='Crótalos'>
                                                    <option value='Cuatro puertoriqueño'>
                                                    <option value='Cuatro venezolano'>
                                                    <option value='Cucharas'>
                                                    <option value='Cuica'>
                                                    <option value='Cumbús'>
                                                    <option value='Dabakan'>
                                                    <option value='Daegeum'>
                                                    <option value='Daf'>
                                                    <option value='Damaru'>
                                                    <option value='Danso'>
                                                    <option value='Darbuka o derbake'>
                                                    <option value='Dayereh'>
                                                    <option value='Den-den daiko'>
                                                    <option value='Dhantal'>
                                                    <option value='Didyeridú o diyeridú (didgeridoo)'>
                                                    <option value='Di mo'>
                                                    <option value='Dhol'>
                                                    <option value='Dholak'>
                                                    <option value='Dinarra'>
                                                    <option value='Dohol'>
                                                    <option value='Dolio'>
                                                    <option value='Dombra'>
                                                    <option value='Dotara'>
                                                    <option value='Duduk'>
                                                    <option value='Duggi'>
                                                    <option value='Dulcémele'>
                                                    <option value='Dulzaina'>
                                                    <option value='Dutar'>
                                                    <option value='Dunun o dundun, doundoun, o djun djun'>
                                                    <option value='Dutar'>
                                                    <option value='Đàn môi'>
                                                    <option value='Ek tara'>
                                                    <option value='Ekwe'>
                                                    <option value='Erhu'>
                                                    <option value='Erke'>
                                                    <option value='Erkencho'>
                                                    <option value='Fagot'>
                                                    <option value='Flauta'>
                                                    <option value='Flauta dulce'>
                                                    <option value='Flauta travesera'>
                                                    <option value='Flautín'>
                                                    <option value='Fou'>
                                                    <option value='Fue'>
                                                    <option value='Gaita cabreiresa'>
                                                    <option value='Gaita colombiana'>
                                                    <option value='Gaita de huelva'>
                                                    <option value='Gaita gastereña'>
                                                    <option value='Gamelán'>
                                                    <option value='Gangsa'>
                                                    <option value='Garrahand'>
                                                    <option value='Gatam'>
                                                    <option value='Gbofe'>
                                                    <option value='Geger'>
                                                    <option value='Geomungo'>
                                                    <option value='Ghatam'>
                                                    <option value='Ghumot'>
                                                    <option value='Gogona'>
                                                    <option value='Gong'>
                                                    <option value='Guacharaca'>
                                                    <option value='Guache'>
                                                    <option value='Guan'>
                                                    <option value='Guataca'>
                                                    <option value='Güira'>
                                                    <option value='Güiro'>
                                                    <option value='Guitarra'>
                                                    <option value='Guitarra de acero'>
                                                    <option value='Guitarra de golpe'>
                                                    <option value='Guitarra huapanguera'>
                                                    <option value='Guitarra panzona'>
                                                    <option value='Guitarra portuguesa'>
                                                    <option value='Guitarra séptima'>
                                                    <option value='Guitarró'>
                                                    <option value='Guitarron argentino'>
                                                    <option value='Guitarron chileno'>
                                                    <option value='Guitarrón mexicano'>
                                                    <option value='Guitarrón uruguayo'>
                                                    <option value='Gumbri'>
                                                    <option value='Guqin'>
                                                    <option value='Guzheng'>
                                                    <option value='Halam'>
                                                    <option value='Horagai'>
                                                    <option value='Hosho'>
                                                    <option value='Huéhuetl'>
                                                    <option value='Huiringua'>
                                                    <option value='Huqin'>
                                                    <option value='Ilimba'>
                                                    <option value='Jal tarang'>
                                                    <option value='Janggu'>
                                                    <option value='Jarana huasteca'>
                                                    <option value='Jarana jarocha'>
                                                    <option value='Jing'>
                                                    <option value='Kakaki'>
                                                    <option value='Kalimba'>
                                                    <option value='Kamanché'>
                                                    <option value='Kanjira'>
                                                    <option value='Kántele'>
                                                    <option value='Kanún'>
                                                    <option value='Kanyira'>
                                                    <option value='Kártalas'>
                                                    <option value='Kashaka'>
                                                    <option value='Kayagum'>
                                                    <option value='Kazú'>
                                                    <option value='Kebero'>
                                                    <option value='Kèn bầu'>
                                                    <option value='Kèn đám ma'>
                                                    <option value='Khartal'>
                                                    <option value='Kinnor'>
                                                    <option value='Kitag'>
                                                    <option value='Kkwaenggwari'>
                                                    <option value='Kobza'>
                                                    <option value='Kokiriko'>
                                                    <option value='Komuz'>
                                                    <option value='Kora'>
                                                    <option value='Koto'>
                                                    <option value='Krar'>
                                                    <option value='Langeleik'>
                                                    <option value='Laúd'>
                                                    <option value='Laúd arabe'>
                                                    <option value='Laúd español'>
                                                    <option value='Leona'>
                                                    <option value='Lira póntica'>
                                                    <option value='Litófono'>
                                                    <option value='Liuqin'>
                                                    <option value='Loh tarang'>
                                                    <option value='Maracas'>
                                                    <option value='Marimba'>
                                                    <option value='Metalófono'>
                                                    <option value='Oboe'>
                                                    <option value='Ocarina'>
                                                    <option value='Octabajo'>
                                                    <option value='Órgano'>
                                                    <option value='Organillo'>
                                                    <option value='Pandereta'>
                                                    <option value='Piano'>
                                                    <option value='Rabel'>
                                                    <option value='Saxofón'>
                                                    <option value='Shekere'>
                                                    <option value='Siringa'>
                                                    <option value='Tambor'>
                                                    <option value='Triángulo'>
                                                    <option value='Trompeta'>
                                                    <option value='Trombón'>
                                                    <option value='Tuba'>
                                                    <option value='Trompa'>
                                                    <option value='Tololoche'>
                                                    <option value='Vibráfono'>
                                                    <option value='Viola'>
                                                    <option value='Violín'>
                                                    <option value='Violonchelo'>
                                                    <option value='Xilófono'>
                                                    <option value='Zambomba'>
                                                    <option value='Zanfoña'>
                                                </datalist>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                <div class='form-check'>
                                                <label for='GeneroP'><strong>Género</strong></label><br>";
                                            switch ($fila['GeneroP']) {
                                                case 'M':
                                                    echo "<input type='radio' class='form-check-input' id='masculino' name='sexo' value='M' checked='checked'>
                                                    <label class='form-check-label' for='masculino' class='form-check-label'>Masculino</label>
                                                    <br>
                                                    <input type='radio' class='form-check-input' id='femenino' name='sexo' value='F'>
                                                    <label class='form-check-label' for='femenino'>Femenino</label>
                                                    <br>
                                                    <input type='radio' class='form-check-input' id='otro' name='sexo' value='O'>
                                                    <label class='form-check-label' for='otro'>Otro</label>
                                                    <br>
                                                    <input type='radio' class='form-check-input' id='noDicho' name='sexo' value='ND'>
                                                    <label class='form-check-label' for='noDicho'>Prefiero no decirlo</label>
                                                </div>";
                                                    break;
                                                case 'F':
                                                    echo "<input type='radio' class='form-check-input' id='masculino' name='sexo' value='M'>
                                                    <label class='form-check-label' for='masculino'>Masculino</label>
                                                    <br>
                                                    <input type='radio' class='form-check-input' id='femenino' name='sexo' value='F' checked='checked'>
                                                    <label class='form-check-label' for='femenino'>Femenino</label>
                                                    <br>
                                                    <input type='radio' class='form-check-input' id='otro' name='sexo' value='O'>
                                                    <label class='form-check-label' for='otro'>Otro</label>
                                                    <br>
                                                    <input type='radio' class='form-check-input' id='noDicho' name='sexo' value='ND'>
                                                    <label class='form-check-label' for='noDicho'>Prefiero no decirlo</label>
                                                </div>";
                                                    break;
                                                case 'O':
                                                    echo "<input type='radio' class='form-check-input' id='masculino' name='sexo' value='M'>
                                                        <label class='form-check-label' for='masculino'>Masculino</label>
                                                        <br>
                                                        <input type='radio' class='form-check-input' id='femenino' name='sexo' value='F'>
                                                        <label class='form-check-label' for='femenino'>Femenino</label>
                                                        <br>
                                                        <input type='radio' class='form-check-input' id='otro' name='sexo' value='O' checked='checked'>
                                                        <label class='form-check-label' for='otro'>Otro</label>
                                                        <br>
                                                        <input type='radio' class='form-check-input' id='noDicho' name='sexo' value='ND'>
                                                        <label class='form-check-label' for='noDicho'>Prefiero no decirlo</label>
                                                    </div>";
                                                    break;
                                                default:
                                                    echo "<input type='radio' class='form-check-input' id='masculino' name='sexo' value='M'>
                                                <label class='form-check-label' for='masculino'>Masculino</label>
                                                <br>
                                                <input type='radio' class='form-check-input' id='femenino' name='sexo' value='F'>
                                                <label class='form-check-label' for='femenino'>Femenino</label>
                                                <br>
                                                <input type='radio' class='form-check-input' id='otro' name='sexo' value='O'>
                                                <label class='form-check-label' for='otro'>Otro</label>
                                                <br>
                                                <input type='radio' class='form-check-input' id='noDicho' name='sexo' value='ND' checked='checked'>
                                                <label class='form-check-label' for='noDicho'>Prefiero no decirlo</label>
                                            </div>";
                                                    break;
                                            }
                                            echo "</div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='generoMusical'>
                                                        <strong>Género musical</strong>
                                                    </label>
                                                    <input type='text' class='form-control' id='generoMusical' name='generoMusical' placeholder='$fila[Genero]'>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='anosExperiencia'>
                                                        <strong>Años de experiencia</strong>
                                                    </label>
                                                    <input id='anosExperiencia' class='form-control' type='number' name='anosExperiencia' value='" . $fila[8] . "'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='calle'>
                                                        <strong>Calle</strong>
                                                    </label>
                                                    <input class='form-control' type='text' placeholder='" . $filaDom['Calle'] . "' name='calle' id='calle'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='numPortal'>
                                                        <strong>Numero de portal</strong>
                                                    </label>
                                                    <input class='form-control' type='number' value='" . $filaDom['NumeroPortal'] . "' name='numPortal' id='numPortal'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='piso'>
                                                        <strong>Piso</strong>
                                                    </label>
                                                    <input class='form-control' type='number' value='" . $filaDom['Piso'] . "' name='piso' id='piso'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='puerta'>
                                                        <strong>Puerta</strong>
                                                    </label>
                                                    <input class='form-control' type='text' placeholder='" . $filaDom['Puerta'] . "' name='puerta' id='puerta' maxlength='3'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='cp'>
                                                        <strong>Código postal</strong>
                                                    </label>
                                                    <input class='form-control' type='number' value='" . $filaDom['codigoPostal'] . "' name='cp' id='cp'/>
                                                </div>
                                            </div>
                                            <div class='col-md-6'>
                                                <div class='mb-3'>
                                                    <label class='form-label' for='ciudad'>
                                                        <strong>Ciudad</strong>
                                                    </label>
                                                    <input class='form-control' list='ciudades' name='ciudad' id='ciudad' value='" . $filaDom['ciudad'] . "'>
                                                        <datalist id='ciudades'>
                                                            <option value='Adra (Almería)'>
                                                            <option value='Aguadulce (Almería)'>
                                                            <option value='Albacete'>
                                                            <option value='Alba de Tormes (Salamanca)'>
                                                            <option value='Alberca (Salamanca)'>
                                                            <option value='Albir (Alicante)'>
                                                            <option value='(La) Albufeira (Valencia)'>
                                                            <option value='Alcalá de Henares (Madrid)'>
                                                            <option value='Alhama (Granada)'>
                                                            <option value='Alicante'>
                                                            <option value='Allora (Málaga)'>
                                                            <option value='Almería'>
                                                            <option value='Almerimar (Almería)'>
                                                            <option value='Almodovar (Córdoba)'>
                                                            <option value='Almuñecar (Granada)'>
                                                            <option value='(La) Alpujarra (Granada)'>
                                                            <option value='Altamira (La Cueva de Altamira)'>
                                                            <option value='Altea (Alicante)'>
                                                            <option value='Antequera (Málaga)'>
                                                            <option value='(La) Antilla (Huelva)'>
                                                            <option value='Aranjuez (Madrid)'>
                                                            <option value='Arenys de Mar (Barcelona)'>
                                                            <option value='Ávila'>
                                                            <option value='Avilés'>
                                                            <option value='Badalona (Barcelona)'>
                                                            <option value='Baelo Claudia (Cádiz)'>
                                                            <option value='Baena (Córdoba)'>
                                                            <option value='Barcelona'>
                                                            <option value='Barciense (Toledo)'>
                                                            <option value='(Las) Batuecas (Salamanca)'>
                                                            <option value='Baza (Granada)'>
                                                            <option value='Bejar (Salamanca)'>
                                                            <option value='Belagua (Pamplona)'>
                                                            <option value='Belorado (Burgos)'>
                                                            <option value='Benalmádena (Málaga)'>
                                                            <option value='Benidorm (Alicante)'>
                                                            <option value='Bilbao (Vizcaya)'>
                                                            <option value='Bolonia (Cádiz)'>
                                                            <option value='Borja (Zaragoza)'>
                                                            <option value='Briviesca (Burgos)'>
                                                            <option value='Bubión (Granada)'>
                                                            <option value='Burgos'>
                                                            <option value='Burjasot (Valencia)'>
                                                            <option value='Cabra (Córdoba)'>
                                                            <option value='Cabrera'>
                                                            <option value='Cáceres'>
                                                            <option value='Cádiz'>
                                                            <option value='Calahonda (Granada)'>
                                                            <option value='(La) Calahorra (Granada)'>
                                                            <option value='Calpe (Alicante)'>
                                                            <option value='(El) Campello (Alicante)'>
                                                            <option value='Candelario (Salamanca)'>
                                                            <option value='Capileira (Granada)'>
                                                            <option value='Carihuela (Málaga)'>
                                                            <option value='Cariñena (Zaragoza)'>
                                                            <option value='Carmona (Sevilla)'>
                                                            <option value='Carratraca (Málaga)'>
                                                            <option value='Cartagena (Murcia)'>
                                                            <option value='Casarabonela (Málaga)'>
                                                            <option value='Casares (Málaga)'>
                                                            <option value='Caspe (Zaragoza)'>
                                                            <option value='Castell de Ferro (Granada)'>
                                                            <option value='Castellón'>
                                                            <option value='Castillejo (Granada)'>
                                                            <option value='Castillo de Javier (Pamplona)'>
                                                            <option value='Castrojeriz (Burgos)'>
                                                            <option value='Catalayud (Zaragoza)'>
                                                            <option value='Chiclana (Cádiz)'>
                                                            <option value='Chinchón (Madrid)'>
                                                            <option value='Ciudad Real'>
                                                            <option value='Ciudad Rodrigo (Salamanca)'>
                                                            <option value='Conil de La Frontera (Cádiz)'>
                                                            <option value='Consuegra (Toledo)'>
                                                            <option value='Córdoba'>
                                                            <option value='(A) Coruña'>
                                                            <option value='Costa (de) Almería'>
                                                            <option value='Costa (del) Azahar'>
                                                            <option value='Costa Ballena (Cádiz)'>
                                                            <option value='Costa Blanca'>
                                                            <option value='Costa Brava'>
                                                            <option value='Costa Cálida'>
                                                            <option value='Costa de la Luz'>
                                                            <option value='Costa del Sol'>
                                                            <option value='Costa Dorada'>
                                                            <option value='Costa Vasca'>
                                                            <option value='Costa Verde'>
                                                            <option value='Covarrubias (Burgos)'>
                                                            <option value='Cuenca'>
                                                            <option value='Cugat (Barcelona)'>
                                                            <option value='Daroca (Zaragoza)'>
                                                            <option value='Denia (Alicante)'>
                                                            <option value='Doñana (Parque Nacional)'>
                                                            <option value='Écija (Sevilla)'>
                                                            <option value='Ejea de los Caballeros (Zaragoza)'>
                                                            <option value='Escalona (Toledo)'>
                                                            <option value='Escatrón (Zaragoza)'>
                                                            <option value='(El) Escorial (Madrid)'>
                                                            <option value='Espejo (Córdoba)'>
                                                            <option value='Espinosa de los Monteros (Burgos)'>
                                                            <option value='Esquivias (Toledo)'>
                                                            <option value='Estella (Pamplona)'>
                                                            <option value='Estepona (Málaga)'>
                                                            <option value='Figueres (Gerona)'>
                                                            <option value='Finestrat (Alicante)'>
                                                            <option value='Formentera'>
                                                            <option value='Frías (Burgos)'>
                                                            <option value='Fuengirola (Málaga)'>
                                                            <option value='Fuerteventura'>
                                                            <option value='Fuentetodos (Zaragoza)'>
                                                            <option value='Gijón'>
                                                            <option value='Gerona'>
                                                            <option value='La Gomera'>
                                                            <option value='Granada'>
                                                            <option value='Gran Canaria'>
                                                            <option value='Guadalajara'>
                                                            <option value='Guadalupe(Cáceres)'>
                                                            <option value='Guadamur (Toledo)'>
                                                            <option value='Guadix (Granada)'>
                                                            <option value='Guardamar del Segura (Alicante)'>
                                                            <option value='(La) Herradura (Granada)'>
                                                            <option value='El Hierro'>
                                                            <option value='Huelva'>
                                                            <option value='Huesca'>
                                                            <option value='Huéscar (Granada)'>
                                                            <option value='Ibiza'>
                                                            <option value='Illanoz (Granada)'>
                                                            <option value='Illescas (Toledo)'>
                                                            <option value='Illora (Granada)'>
                                                            <option value='Isla Canela (Huelva)'>
                                                            <option value='Isla Cristina (Huelva)'>
                                                            <option value='Islantilla (Huelva)'>
                                                            <option value='Itálica (Sevilla)'>
                                                            <option value='Isaba (Pamplona)'>
                                                            <option value='Itero (Burgos)'>
                                                            <option value='Jaén'>
                                                            <option value='Játiva (Valencia)'>
                                                            <option value='Jávea (Alicante)'>
                                                            <option value='Jerez de la Frontera(Cádiz)'>
                                                            <option value='Lagartera (Toledo)'>
                                                            <option value='Lanjarón (Granada)'>
                                                            <option value='Lanzarote'>
                                                            <option value='León'>
                                                            <option value='Lérida'>
                                                            <option value='Lerma (Burgos)'>
                                                            <option value='Lloret de Mar (Gerona)'>
                                                            <option value='Logroño'>
                                                            <option value='Loja (Granada)'>
                                                            <option value='Lugo'>
                                                            <option value='Madrid'>
                                                            <option value='Málaga'>
                                                            <option value='Mallorca'>
                                                            <option value='(La) Manga (Murcia)'>
                                                            <option value='Maqueda (Toledo)'>
                                                            <option value='Marbella (Málaga)'>
                                                            <option value='Mataró (Barcelona)'>
                                                            <option value='Matalascañas (Huelva)'>
                                                            <option value='Mazarrón (Murcia)'>
                                                            <option value='Mecina (Granada)'>
                                                            <option value='Medina Azahara (Córdoba)'>
                                                            <option value='Medina de Pomar (Burgos)'>
                                                            <option value='Menorca'>
                                                            <option value='Mérida (Badajoz)'>
                                                            <option value='Mijas (Málaga)'>
                                                            <option value='Miranda del Castañar (Salamanca)'>
                                                            <option value='Mogarraz (Salamanca)'>
                                                            <option value='Montefrío (Granada)'>
                                                            <option value='Montilla (Córdoba)'>
                                                            <option value='Montoro (Córdoba)'>
                                                            <option value='Montserrat (Barcelona)'>
                                                            <option value='Moradillo de Sedano (Burgos)'>
                                                            <option value='Morella (Castellón)'>
                                                            <option value='Moriles (Córdoba)'>
                                                            <option value='Murcia'>
                                                            <option value='Nerja (Málaga)'>
                                                            <option value='Nuevalos (Zaragoza)'>
                                                            <option value='Nuevo Portil (Huelva)'>
                                                            <option value='Ocaña (Toledo)'>
                                                            <option value='Ochagavía (Pamplona)'>
                                                            <option value='Ojén (Málaga)'>
                                                            <option value='Olite (Pamplona)'>
                                                            <option value='Olmillos (Burgos)'>
                                                            <option value='Ourense'>
                                                            <option value='Orgaz (Toledo)'>
                                                            <option value='Oropesa (Castellón)'>
                                                            <option value='Oropesa (Toledo)'>
                                                            <option value='Orvija (Granada)'>
                                                            <option value='Osuna (Sevilla)'>
                                                            <option value='Oviedo'>
                                                            <option value='Palencia'>
                                                            <option value='(La) Palma'>
                                                            <option value='Palmar (Valencia)'>
                                                            <option value='Palos de la Frontera (Huelva)'>
                                                            <option value='Pampaneira (Granada)'>
                                                            <option value='Pamplona'>
                                                            <option value='Penedés (Barcelona)'>
                                                            <option value='Peñaranda del Duero (Burgos)'>
                                                            <option value='Peñíscola (Castellón)'>
                                                            <option value='Picos de Europa (Parque Nacional)'>
                                                            <option value='Pilar de Horadada (Alicante)'>
                                                            <option value='Pinos Puente (Granada)'>
                                                            <option value='Pizarra (Málaga)'>
                                                            <option value='Plasencia (Cáceres)'>
                                                            <option value='Pontevedra'>
                                                            <option value='Priego (Córdoba)'>
                                                            <option value='Puentearenas (Burgos)'>
                                                            <option value='Puente del Arzobispo (Toledo)'>
                                                            <option value='Puente la Reina (Pamplona)'>
                                                            <option value='Puerto Banús (Málaga)'>
                                                            <option value='(El) Puerto de Santa María (Cádiz)'>
                                                            <option value='Punta Umbría (Huelva)'>
                                                            <option value='Quintanar de la Orden (Toledo)'>
                                                            <option value='Quintanilla de las Viñas (Burgos)'>
                                                            <option value='(La) Rábida (Huelva)'>
                                                            <option value='Rebolledo de la Torre (Burgos)'>
                                                            <option value='Redecilla del Camino (Burgos)'>
                                                            <option value='Rincón de la Victoria (Málaga)'>
                                                            <option value='Roquetas de Mar (Almería)'>
                                                            <option value='(El) Rompido (Huelva)'>
                                                            <option value='Roncal (Pamplona)'>
                                                            <option value='Roncesvalles (Pamplona)'>
                                                            <option value='Ronda (Málaga)'>
                                                            <option value='Rota (Cádiz)'>
                                                            <option value='Sabadell (Barcelona)'>
                                                            <option value='Sagunto (Valencia)'>
                                                            <option value='San José del Monte (Salamanca)'>
                                                            <option value='San Juan de Ortega (Burgos)'>
                                                            <option value='Salamanca'>
                                                            <option value='Salas de los Infantes (Burgos)'>
                                                            <option value='Salobreña (Granada)'>
                                                            <option value='Sangüesa (Pamplona)'>
                                                            <option value='San Pedro de Alcántara (Málaga)'>
                                                            <option value='San Salvador de Leyre (Pamplona)'>
                                                            <option value='San Sebastián (Guipuzcoa)'>
                                                            <option value='Santa Fe (Granada)'>
                                                            <option value='Santa Pola (Alicante)'>
                                                            <option value='Santander'>
                                                            <option value='Santiago de Compostela (A Coruña)'>
                                                            <option value='Santillana del Mar (Santander)'>
                                                            <option value='Santiponce (Sevilla)'>
                                                            <option value='Sant Pere de Ribes (Barcelona)'>
                                                            <option value='Sant Sadurní d'Anoia (Barcelona)'>
                                                            <option value='Sedano (Burgos)'>
                                                            <option value='Segovia'>
                                                            <option value='Sequeros (Salamanca)'>
                                                            <option value='Sevilla'>
                                                            <option value='Sigüenza (Guadalajara)'>
                                                            <option value='Sierra Nevada (Granada)'>
                                                            <option value='Silos (Burgos)'>
                                                            <option value='Sitges (Barcelona)'>
                                                            <option value='Soportuja (Granada)'>
                                                            <option value='Soria'>
                                                            <option value='Sos del Rey Católico (Zaragoza)'>
                                                            <option value='Tabarca (Alicante)'>
                                                            <option value='Tafalla (Pamplona)'>
                                                            <option value='Talavera de la Reina (Toledo)'>
                                                            <option value='Tarazona (Zaragoza)'>
                                                            <option value='Tarifa (Cádiz)'>
                                                            <option value='Tarragona'>
                                                            <option value='Tauste (Zaragoza)'>
                                                            <option value='Tembleque (Toledo)'>
                                                            <option value='Tenerife'>
                                                            <option value='Terrasa (Barcelona)'>
                                                            <option value='Teruel'>
                                                            <option value='(El) Toboso (Toledo)'>
                                                            <option value='Toledo'>
                                                            <option value='Torcal de Antequera (Málaga)'>
                                                            <option value='Torremolinos (Málaga)'>
                                                            <option value='Torrenueva (Granada)'>
                                                            <option value='Torrevieja (Alicante)'>
                                                            <option value='Torrijos (Toledo)'>
                                                            <option value='Tossa de Mar (Gerona)'>
                                                            <option value='(El) Toyo (Almería)'>
                                                            <option value='Trévelez (Granada)'>
                                                            <option value='Trujillo (Cáceres)'>
                                                            <option value='Tudela (Pamplona)'>
                                                            <option value='Ujue (Pamplona)'>
                                                            <option value='Uncastillo (Zaragoza)'>
                                                            <option value='Valencia'>
                                                            <option value='Valladolid'>
                                                            <option value='Valor (Granada)'>
                                                            <option value='Vélez (Málaga)'>
                                                            <option value='Vera (Almería)'>
                                                            <option value='Viana (Pamplona)'>
                                                            <option value='Vigo (Pontevedra)'>
                                                            <option value='Vilafranca (Barcelona)'>
                                                            <option value='Villafranca (Burgos)'>
                                                            <option value='Vitoria-Gasteiz (Álava)'>
                                                            <option value='Yesa (Pamplona)'>
                                                            <option value='Yesa (Zaragoza)'>
                                                            <option value='Zahara de Los Atunes (Cádiz)'>
                                                            <option value='Zamora'>
                                                            <option value='Zaragoza'>
                                                        </datalist>
                                                    </div>
                                                </div>
                                        <div class='col'>
                                            <p id='emailErrorMsg' class='text-danger' style='display: none;'>Email no válido</p>
                                            <p id='passwordErrorMsg' class='text-danger' style='display: none;'>Contraseña no válida</p>
                                        </div>
                                        <div ass=ol-md-12' style='text-align: right;margin-top: 5px;'>
                                            <button id='submitBtn' class='btn btn-primary btn-sm' id='submit' type='submit'>Save
                                            settings</button>
                                        </div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>