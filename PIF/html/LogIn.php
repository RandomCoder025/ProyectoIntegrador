<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="icon" type="image/x-icon" href="../img/resources/favicon.ico">

    <link href="../css/cssFormulario.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script>
        function validar() {
            var usuario = document.forms["form"]["uname"].value;
            var passw = document.forms["form"]["psw"].value;
            var salida = true;
            if (usuario == "") {
                alert("Rellene el campo usuario");
                salida = false;
            } else if (usuario.length < 3) {
                alert("El usuario tiene que tener 4 caracteres como mínimo");
                salida = false;
            }
            if (passw == "") {
                alert("Rellene el campo contraseña");
                salida = false;
            } else if (passw.length < 3) {
                alert("La contraseña tiene que tener 4 caracteres como mínimo");
                salida = false;
            }
            return salida;
        }
    </script>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../img/resources/james-stamler-k3heD_KwH0A-unsplash.jpg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action='../php/ValidarlogIn.php' onsubmit='return validar()' method='post' style="padding: 30px">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Iniciar sesión</p>
                        </div>
                        <hr>
                        <div class="form-outline mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Enter Username" name="uname" id="uname">
                            <label class="form-label" for="uname">Nombre de usuario</label>
                        </div>
                        <?php
                        if (isset($_GET["fallos"])) {
                            $fallos = $_GET["fallos"];
                            switch ($fallos) {
                                case 1:
                                    echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' 
                        crossorigin='anonymous'></script>
                        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'
                        integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                        <div class='alert alert-warning' role='alert'>
                        Usuario correcto, contraseña incorrecta
                        </div>";
                                    break;
                                case 2:
                                    echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' 
                        crossorigin='anonymous'></script>
                        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' 
                        integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                        <div class='alert alert-warning' role='alert'>
                        Usuario y contraseña incorrectos 
                        </div>";
                                    break;
                            }
                        }
                        ?>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="psw" class="form-control form-control-lg" placeholder="Enter password" name="psw" />
                            <label class="form-label" for="form3Example4">Contraseña</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" name="submit" style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #3841F2">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">¿Aún no tienes cuenta? <a href="./Register.php" class="link-danger">Regístrate</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5" style="background-color: #2C33BF;">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                <b>Musigente</b> Copyright © 2020. All rights reserved.
            </div>
        </div>
    </section>
</body>

</html>