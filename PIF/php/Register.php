<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        .invalid {
            color: red;
        }

        .valid {
            color: green;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        function validar_email() {
            var email = document.getElementById('mail').value;
            var mostrar_info = document.getElementById('email_validation');
            let regExp = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;

            if (regExp.test(email)) {
                mostrar_info.innerHTML = "Email válido<br>";
                $('#email_validation').removeClass('invalid').addClass('valid');
                return true;
            } else {
                mostrar_info.innerHTML = "Email no válido<br>";
                $('#email_validation').removeClass('valid').addClass('invalid');
                document.querySelector('#email_validation').style.display = 'block';
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
                $('#length').removeClass('valid').addClass('invalid');
                longitud = false;
            } else {
                $('#length').removeClass('invalid').addClass('valid');
                longitud = true;
            }
            //validar letra
            if (password.match(/[A-z]/)) {
                $('#letter').removeClass('invalid').addClass('valid');
                letras = true;
            } else {
                $('#letter').removeClass('valid').addClass('invalid');
                letras = false;
            }

            //validar letra mayúscula
            if (password.match(/[A-Z]/)) {
                $('#capital').removeClass('invalid').addClass('valid');
                mayuscula = true;
            } else {
                $('#capital').removeClass('valid').addClass('invalid');
                mayuscula = false;
            }

            //validar numero
            if (password.match(/\d/)) {
                $('#number').removeClass('invalid').addClass('valid');
                numero = true;
            } else {
                $('#number').removeClass('valid').addClass('invalid');
                numero = false;
            }

            if (p1 != "" && p2 != "") {

                if (p1.length == 0 || p2.length == 0) {
                    $('#null').removeClass('valid').addClass('invalid');
                } else {
                    $('#null').removeClass('invalid').addClass('valid');
                }

                if (p1 != p2) {
                    $('#match').removeClass('valid').addClass('invalid');
                    coinciden = false;
                } else {
                    $('#match').removeClass('invalid').addClass('valid');
                    coinciden = true;
                }

                if (p1.indexOf(" ") != -1 || p2.indexOf(" ") != -1) {
                    $('#blank').removeClass('valid').addClass('invalid');
                    noEspacios = false;
                } else {
                    $('#blank').removeClass('invalid').addClass('valid');
                    noEspacios = true;
                }
            }

            if (longitud && letras && mayuscula && numero && coinciden && noEspacios) {
                return true;
            } else {
                return false;
            }
        }

        function mostrarInfoPsw() {
            var password1 = document.querySelector('#password1');
            var password2 = document.querySelector('#password2');
            console.log(password1);
            if (password1 === document.activeElement || password2 === document.activeElement) {
                console.log("algo");
                document.querySelector('#infoPsw').style.display = 'block';
            } else {
                document.querySelector('#infoPsw').style.display = 'none';
            }
            console.log(document.activeElement);
            console.log(document.querySelector('#infoPsw').style.display);
        }

        function validar() {
            var valido = true;
            if (!validar_email()) {
                valido = false;
            }
            if (!checkPassword()) {
                console.log(checkPassword());
                valido = false;
            }
            if (!noNulos()) {
                console.log(noNulos());
                valido = false;
            }

            if (!valido) {
                console.log("no valido");
                document.querySelector('#submit').disabled = true;
            } else {
                document.querySelector('#submit').disabled = false;
            }
        }

        function noNulos() {
            var valido = true;
            if (document.getElementById('calle') != null) {
                if (document.getElementById('calle').value == "") {
                    valido = false;
                }
            } else {
                valido = false;
            }
            if (document.getElementById('numero') != null) {
                if (document.getElementById('numero').value == "") {
                    valido = false;
                }
            } else {
                valido = false;
            }
            if (document.getElementById('piso').value == "") {
                valido = false;
            }
            if (document.getElementById('puerta').value == "") {
                valido = false;
            }
            if (document.getElementById('codigoPostal').value == "") {
                valido = false;
            }
            if (document.getElementById('ciudad').value == "") {
                valido = false;
            }
            if (document.getElementById('instrumento').value == "") {
                valido = false;
            }
            if (document.getElementById('uname').value == "") {
                valido = false;
            }
            if (document.getElementById('nombre').value == "") {
                valido = false;
            }
            if (document.getElementById('apellido1').value == "") {
                valido = false;
            }
            if (document.getElementById('apellido2').value == "") {
                valido = false;
            }
            if (document.getElementById('password1').value == "") {
                valido = false;
            }
            if (document.getElementById('password2').value == "") {
                valido = false;
            }
            if (document.getElementById('annosExp').value == "") {
                valido = false;
            }
            return valido;
        }
    </script>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('../img/resources/james-stamler-k3heD_KwH0A-unsplash.jpg');
        height: 300px;
        "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Regístrate</h2>
                        <form action="../php/phpRegistro.php" method="post" onsubmit="validar()">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <h3>Datos personales</h3>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="text" placeholder="Nombre" id="nombre" name="nombre" required>
                                        <label class="form-label" for="nombre">Nombre*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="text" placeholder="Primer apellido" id="apellido1" name="apellido1" required>
                                        <label class="form-label" for="apellido1">Primer apellido*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="text" placeholder="Segundo apellido" id="apellido2" name="apellido2" required>
                                        <label class="form-label" for="apellido2">Segundo apellido*</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    Sexo:
                                    <div class="form-outline">
                                        <input onfocus="mostrarInfoPsw()" class="form-check-input" type="radio" id="masculino" name="sexo" value="M">
                                        <label class="form-label" for="masculino">Masculino</label>
                                        <br>
                                        <input onfocus="mostrarInfoPsw()" class="form-check-input" type="radio" id="femenino" name="sexo" value="F">
                                        <label class="form-label" for="femenino">Femenino</label>
                                        <br>
                                        <input onfocus="mostrarInfoPsw()" class="form-check-input" type="radio" id="otro" name="sexo" value="O">
                                        <label class="form-label" for="otro">Otro</label>
                                        <br>
                                        <input onfocus="mostrarInfoPsw()" class="form-check-input" type="radio" id="noDicho" name="sexo" value="ND" checked>
                                        <label class="form-label" for="noDicho">Prefiero no decirlo</label>
                                    </div>
                                </div>
                                <hr>
                                <h3>Dirección</h3>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="text" placeholder="Calle" name="calle" id="calle">
                                        <label class="form-label" for="calle">Calle</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="number" name="numero" min="1" id="numero">
                                        <label class="form-label" for="numero">Número de portal</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="number" id="piso" name="piso" min="1">
                                        <label class="form-label" for="piso">Piso</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="text" maxlength="3" id="puerta" name="puerta"><br>
                                        <label class="form-label" for="puerta">Puerta</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="number" id="codigoPostal" name="codigoPostal" pattern="[0-9]{5}">
                                        <label class="form-label" for="codigoPostal">Código postal</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" list="ciudades" name="ciudad" id="ciudad">
                                        <datalist id="ciudades">
                                            <option value="Adra (Almería)">
                                            <option value="Aguadulce (Almería)">
                                            <option value="Albacete">
                                            <option value="Alba de Tormes (Salamanca)">
                                            <option value="Alberca (Salamanca)">
                                            <option value="Albir (Alicante)">
                                            <option value="(La) Albufeira (Valencia)">
                                            <option value="Alcalá de Henares (Madrid)">
                                            <option value="Alhama (Granada)">
                                            <option value="Alicante">
                                            <option value="Allora (Málaga)">
                                            <option value="Almería">
                                            <option value="Almerimar (Almería)">
                                            <option value="Almodovar (Córdoba)">
                                            <option value="Almuñecar (Granada)">
                                            <option value="(La) Alpujarra (Granada)">
                                            <option value="Altamira (La Cueva de Altamira)">
                                            <option value="Altea (Alicante)">
                                            <option value="Antequera (Málaga)">
                                            <option value="(La) Antilla (Huelva)">
                                            <option value="Aranjuez (Madrid)">
                                            <option value="Arenys de Mar (Barcelona)">
                                            <option value="Ávila">
                                            <option value="Avilés">
                                            <option value="Badalona (Barcelona)">
                                            <option value="Baelo Claudia (Cádiz)">
                                            <option value="Baena (Córdoba)">
                                            <option value="Barcelona">
                                            <option value="Barciense (Toledo)">
                                            <option value="(Las) Batuecas (Salamanca)">
                                            <option value="Baza (Granada)">
                                            <option value="Bejar (Salamanca)">
                                            <option value="Belagua (Pamplona)">
                                            <option value="Belorado (Burgos)">
                                            <option value="Benalmádena (Málaga)">
                                            <option value="Benidorm (Alicante)">
                                            <option value="Bilbao (Vizcaya)">
                                            <option value="Bolonia (Cádiz)">
                                            <option value="Borja (Zaragoza)">
                                            <option value="Briviesca (Burgos)">
                                            <option value="Bubión (Granada)">
                                            <option value="Burgos">
                                            <option value="Burjasot (Valencia)">
                                            <option value="Cabra (Córdoba)">
                                            <option value="Cabrera">
                                            <option value="Cáceres">
                                            <option value="Cádiz">
                                            <option value="Calahonda (Granada)">
                                            <option value="(La) Calahorra (Granada)">
                                            <option value="Calpe (Alicante)">
                                            <option value="(El) Campello (Alicante)">
                                            <option value="Candelario (Salamanca)">
                                            <option value="Capileira (Granada)">
                                            <option value="Carihuela (Málaga)">
                                            <option value="Cariñena (Zaragoza)">
                                            <option value="Carmona (Sevilla)">
                                            <option value="Carratraca (Málaga)">
                                            <option value="Cartagena (Murcia)">
                                            <option value="Casarabonela (Málaga)">
                                            <option value="Casares (Málaga)">
                                            <option value="Caspe (Zaragoza)">
                                            <option value="Castell de Ferro (Granada)">
                                            <option value="Castellón">
                                            <option value="Castillejo (Granada)">
                                            <option value="Castillo de Javier (Pamplona)">
                                            <option value="Castrojeriz (Burgos)">
                                            <option value="Catalayud (Zaragoza)">
                                            <option value="Chiclana (Cádiz)">
                                            <option value="Chinchón (Madrid)">
                                            <option value="Ciudad Real">
                                            <option value="Ciudad Rodrigo (Salamanca)">
                                            <option value="Conil de La Frontera (Cádiz)">
                                            <option value="Consuegra (Toledo)">
                                            <option value="Córdoba">
                                            <option value="(A) Coruña">
                                            <option value="Costa (de) Almería">
                                            <option value="Costa (del) Azahar">
                                            <option value="Costa Ballena (Cádiz)">
                                            <option value="Costa Blanca">
                                            <option value="Costa Brava">
                                            <option value="Costa Cálida">
                                            <option value="Costa de la Luz">
                                            <option value="Costa del Sol">
                                            <option value="Costa Dorada">
                                            <option value="Costa Vasca">
                                            <option value="Costa Verde">
                                            <option value="Covarrubias (Burgos)">
                                            <option value="Cuenca">
                                            <option value="Cugat (Barcelona)">
                                            <option value="Daroca (Zaragoza)">
                                            <option value="Denia (Alicante)">
                                            <option value="Doñana (Parque Nacional)">
                                            <option value="Écija (Sevilla)">
                                            <option value="Ejea de los Caballeros (Zaragoza)">
                                            <option value="Escalona (Toledo)">
                                            <option value="Escatrón (Zaragoza)">
                                            <option value="(El) Escorial (Madrid)">
                                            <option value="Espejo (Córdoba)">
                                            <option value="Espinosa de los Monteros (Burgos)">
                                            <option value="Esquivias (Toledo)">
                                            <option value="Estella (Pamplona)">
                                            <option value="Estepona (Málaga)">
                                            <option value="Figueres (Gerona)">
                                            <option value="Finestrat (Alicante)">
                                            <option value="Formentera">
                                            <option value="Frías (Burgos)">
                                            <option value="Fuengirola (Málaga)">
                                            <option value="Fuerteventura">
                                            <option value="Fuentetodos (Zaragoza)">
                                            <option value="Gijón">
                                            <option value="Gerona">
                                            <option value="La Gomera">
                                            <option value="Granada">
                                            <option value="Gran Canaria">
                                            <option value="Guadalajara">
                                            <option value="Guadalupe(Cáceres)">
                                            <option value="Guadamur (Toledo)">
                                            <option value="Guadix (Granada)">
                                            <option value="Guardamar del Segura (Alicante)">
                                            <option value="(La) Herradura (Granada)">
                                            <option value="El Hierro">
                                            <option value="Huelva">
                                            <option value="Huesca">
                                            <option value="Huéscar (Granada)">
                                            <option value="Ibiza">
                                            <option value="Illanoz (Granada)">
                                            <option value="Illescas (Toledo)">
                                            <option value="Illora (Granada)">
                                            <option value="Isla Canela (Huelva)">
                                            <option value="Isla Cristina (Huelva)">
                                            <option value="Islantilla (Huelva)">
                                            <option value="Itálica (Sevilla)">
                                            <option value="Isaba (Pamplona)">
                                            <option value="Itero (Burgos)">
                                            <option value="Jaén">
                                            <option value="Játiva (Valencia)">
                                            <option value="Jávea (Alicante)">
                                            <option value="Jerez de la Frontera(Cádiz)">
                                            <option value="Lagartera (Toledo)">
                                            <option value="Lanjarón (Granada)">
                                            <option value="Lanzarote">
                                            <option value="León">
                                            <option value="Lérida">
                                            <option value="Lerma (Burgos)">
                                            <option value="Lloret de Mar (Gerona)">
                                            <option value="Logroño">
                                            <option value="Loja (Granada)">
                                            <option value="Lugo">
                                            <option value="Madrid">
                                            <option value="Málaga">
                                            <option value="Mallorca">
                                            <option value="(La) Manga (Murcia)">
                                            <option value="Maqueda (Toledo)">
                                            <option value="Marbella (Málaga)">
                                            <option value="Mataró (Barcelona)">
                                            <option value="Matalascañas (Huelva)">
                                            <option value="Mazarrón (Murcia)">
                                            <option value="Mecina (Granada)">
                                            <option value="Medina Azahara (Córdoba)">
                                            <option value="Medina de Pomar (Burgos)">
                                            <option value="Menorca">
                                            <option value="Mérida (Badajoz)">
                                            <option value="Mijas (Málaga)">
                                            <option value="Miranda del Castañar (Salamanca)">
                                            <option value="Mogarraz (Salamanca)">
                                            <option value="Montefrío (Granada)">
                                            <option value="Montilla (Córdoba)">
                                            <option value="Montoro (Córdoba)">
                                            <option value="Montserrat (Barcelona)">
                                            <option value="Moradillo de Sedano (Burgos)">
                                            <option value="Morella (Castellón)">
                                            <option value="Moriles (Córdoba)">
                                            <option value="Murcia">
                                            <option value="Nerja (Málaga)">
                                            <option value="Nuevalos (Zaragoza)">
                                            <option value="Nuevo Portil (Huelva)">
                                            <option value="Ocaña (Toledo)">
                                            <option value="Ochagavía (Pamplona)">
                                            <option value="Ojén (Málaga)">
                                            <option value="Olite (Pamplona)">
                                            <option value="Olmillos (Burgos)">
                                            <option value="Ourense">
                                            <option value="Orgaz (Toledo)">
                                            <option value="Oropesa (Castellón)">
                                            <option value="Oropesa (Toledo)">
                                            <option value="Orvija (Granada)">
                                            <option value="Osuna (Sevilla)">
                                            <option value="Oviedo">
                                            <option value="Palencia">
                                            <option value="(La) Palma">
                                            <option value="Palmar (Valencia)">
                                            <option value="Palos de la Frontera (Huelva)">
                                            <option value="Pampaneira (Granada)">
                                            <option value="Pamplona">
                                            <option value="Penedés (Barcelona)">
                                            <option value="Peñaranda del Duero (Burgos)">
                                            <option value="Peñíscola (Castellón)">
                                            <option value="Picos de Europa (Parque Nacional)">
                                            <option value="Pilar de Horadada (Alicante)">
                                            <option value="Pinos Puente (Granada)">
                                            <option value="Pizarra (Málaga)">
                                            <option value="Plasencia (Cáceres)">
                                            <option value="Pontevedra">
                                            <option value="Priego (Córdoba)">
                                            <option value="Puentearenas (Burgos)">
                                            <option value="Puente del Arzobispo (Toledo)">
                                            <option value="Puente la Reina (Pamplona)">
                                            <option value="Puerto Banús (Málaga)">
                                            <option value="(El) Puerto de Santa María (Cádiz)">
                                            <option value="Punta Umbría (Huelva)">
                                            <option value="Quintanar de la Orden (Toledo)">
                                            <option value="Quintanilla de las Viñas (Burgos)">
                                            <option value="(La) Rábida (Huelva)">
                                            <option value="Rebolledo de la Torre (Burgos)">
                                            <option value="Redecilla del Camino (Burgos)">
                                            <option value="Rincón de la Victoria (Málaga)">
                                            <option value="Roquetas de Mar (Almería)">
                                            <option value="(El) Rompido (Huelva)">
                                            <option value="Roncal (Pamplona)">
                                            <option value="Roncesvalles (Pamplona)">
                                            <option value="Ronda (Málaga)">
                                            <option value="Rota (Cádiz)">
                                            <option value="Sabadell (Barcelona)">
                                            <option value="Sagunto (Valencia)">
                                            <option value="San José del Monte (Salamanca)">
                                            <option value="San Juan de Ortega (Burgos)">
                                            <option value="Salamanca">
                                            <option value="Salas de los Infantes (Burgos)">
                                            <option value="Salobreña (Granada)">
                                            <option value="Sangüesa (Pamplona)">
                                            <option value="San Pedro de Alcántara (Málaga)">
                                            <option value="San Salvador de Leyre (Pamplona)">
                                            <option value="San Sebastián (Guipuzcoa)">
                                            <option value="Santa Fe (Granada)">
                                            <option value="Santa Pola (Alicante)">
                                            <option value="Santander">
                                            <option value="Santiago de Compostela (A Coruña)">
                                            <option value="Santillana del Mar (Santander)">
                                            <option value="Santiponce (Sevilla)">
                                            <option value="Sant Pere de Ribes (Barcelona)">
                                            <option value="Sant Sadurní d'Anoia (Barcelona)">
                                            <option value="Sedano (Burgos)">
                                            <option value="Segovia">
                                            <option value="Sequeros (Salamanca)">
                                            <option value="Sevilla">
                                            <option value="Sigüenza (Guadalajara)">
                                            <option value="Sierra Nevada (Granada)">
                                            <option value="Silos (Burgos)">
                                            <option value="Sitges (Barcelona)">
                                            <option value="Soportuja (Granada)">
                                            <option value="Soria">
                                            <option value="Sos del Rey Católico (Zaragoza)">
                                            <option value="Tabarca (Alicante)">
                                            <option value="Tafalla (Pamplona)">
                                            <option value="Talavera de la Reina (Toledo)">
                                            <option value="Tarazona (Zaragoza)">
                                            <option value="Tarifa (Cádiz)">
                                            <option value="Tarragona">
                                            <option value="Tauste (Zaragoza)">
                                            <option value="Tembleque (Toledo)">
                                            <option value="Tenerife">
                                            <option value="Terrasa (Barcelona)">
                                            <option value="Teruel">
                                            <option value="(El) Toboso (Toledo)">
                                            <option value="Toledo">
                                            <option value="Torcal de Antequera (Málaga)">
                                            <option value="Torremolinos (Málaga)">
                                            <option value="Torrenueva (Granada)">
                                            <option value="Torrevieja (Alicante)">
                                            <option value="Torrijos (Toledo)">
                                            <option value="Tossa de Mar (Gerona)">
                                            <option value="(El) Toyo (Almería)">
                                            <option value="Trévelez (Granada)">
                                            <option value="Trujillo (Cáceres)">
                                            <option value="Tudela (Pamplona)">
                                            <option value="Ujue (Pamplona)">
                                            <option value="Uncastillo (Zaragoza)">
                                            <option value="Valencia">
                                            <option value="Valladolid">
                                            <option value="Valor (Granada)">
                                            <option value="Vélez (Málaga)">
                                            <option value="Vera (Almería)">
                                            <option value="Viana (Pamplona)">
                                            <option value="Vigo (Pontevedra)">
                                            <option value="Vilafranca (Barcelona)">
                                            <option value="Villafranca (Burgos)">
                                            <option value="Vitoria-Gasteiz (Álava)">
                                            <option value="Yesa (Pamplona)">
                                            <option value="Yesa (Zaragoza)">
                                            <option value="Zahara de Los Atunes (Cádiz)">
                                            <option value="Zamora">
                                            <option value="Zaragoza">
                                            <option value="Zarzuela (Zaragoza)">
                                            <option value="Zuera (Zaragoza)">
                                            <option value="(La) Zarzuela (Zaragoza)">
                                            <option value="Zuquena (Zaragoza)">
                                            <option value="Móstoles">
                                        </datalist>
                                        <label class="form-label" for="ciudad">Ciudad</label>
                                    </div>
                                </div>
                                <hr>
                                <h3>Datos musicales</h3>
                                <div class="form-outline">
                                    <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" class="form-control" list="instrumentos" name="instrumento" id="instrumento">
                                    <datalist id="instrumentos">
                                        <option value="Acordeón">
                                        <option value="Agogo">
                                        <option value="Ajaeng">
                                        <option value="Albogue">
                                        <option value="Almirez">
                                        <option value="Angklung">
                                        <option value="Antara">
                                        <option value="Arco de Diddley">
                                        <option value="Arco percutor">
                                        <option value="Ardín">
                                        <option value="Armónica">
                                        <option value="Armonio">
                                        <option value="Armonio de fuelle manual">
                                        <option value="Arpa">
                                        <option value="Arpa Jarocha">
                                        <option value="Arpa llanera">
                                        <option value="Arpa paraguaya">
                                        <option value="Arrabel">
                                        <option value="Ashiko">
                                        <option value="Asor">
                                        <option value="Atabaque">
                                        <option value="Avotl">
                                        <option value="Azusayumi">
                                        <option value="Bachi">
                                        <option value="Baglama">
                                        <option value="Baglamás">
                                        <option value="Bajo">
                                        <option value="Bajo sexto">
                                        <option value="Balafón">
                                        <option value="Balalaika">
                                        <option value="Bamboula">
                                        <option value="Bandola">
                                        <option value="Bandola andina colombiana">
                                        <option value="Bandolín tachirense">
                                        <option value="Bandolóm">
                                        <option value="Bandura">
                                        <option value="Bandurria">
                                        <option value="Banja">
                                        <option value="Bansuri">
                                        <option value="Banyo">
                                        <option value="Barril de bomba">
                                        <option value="Batá">
                                        <option value="Batería">
                                        <option value="Begena">
                                        <option value="Bendir">
                                        <option value="Berimáu">
                                        <option value="Bianqing">
                                        <option value="Bianzhong">
                                        <option value="Binzasara">
                                        <option value="Birimbao">
                                        <option value="Binioù">
                                        <option value="Biwa">
                                        <option value="Bodhrán">
                                        <option value="Bolón">
                                        <option value="Bombo">
                                        <option value="Bongo">
                                        <option value="Baugarabou">
                                        <option value="Buk">
                                        <option value="Bulbul tarang">
                                        <option value="Buzuk">
                                        <option value="Buzuki">
                                        <option value="Cacalachtli">
                                        <option value="Caja">
                                        <option value="Cajón">
                                        <option value="Campana">
                                        <option value="Campanas tubulares">
                                        <option value="Cantaro">
                                        <option value="Canto">
                                        <option value="Calabash">
                                        <option value="Capador">
                                        <option value="Carcabas">
                                        <option value="Carillón">
                                        <option value="Carraca">
                                        <option value="Cartonal">
                                        <option value="Castañuelas">
                                        <option value="Cataquí">
                                        <option value="Cavaquiño">
                                        <option value="Celesta">
                                        <option value="Cencerro">
                                        <option value="Chande">
                                        <option value="Chapareque">
                                        <option value="Charango">
                                        <option value="Checo">
                                        <option value="Chequeré">
                                        <option value="Chenda">
                                        <option value="Clarín">
                                        <option value="Clarinete">
                                        <option value="Clave (claves)">
                                        <option value="Cítara">
                                        <option value="Clarín">
                                        <option value="Clarinete">
                                        <option value="Clave">
                                        <option value="Clavecín">
                                        <option value="Clavicordio">
                                        <option value="Coga">
                                        <option value="Corneta">
                                        <option value="Corno Inglés">
                                        <option value="Cítara">
                                        <option value="Contrabajo">
                                        <option value="Corneta china">
                                        <option value="Corno">
                                        <option value="Crótalos">
                                        <option value="Cuatro puertoriqueño">
                                        <option value="Cuatro venezolano">
                                        <option value="Cucharas">
                                        <option value="Cuica">
                                        <option value="Cumbús">
                                        <option value="Dabakan">
                                        <option value="Daegeum">
                                        <option value="Daf">
                                        <option value="Damaru">
                                        <option value="Danso">
                                        <option value="Darbuka o derbake">
                                        <option value="Dayereh">
                                        <option value="Den-den daiko">
                                        <option value="Dhantal">
                                        <option value="Didyeridú o diyeridú (didgeridoo)">
                                        <option value="Di mo">
                                        <option value="Dhol">
                                        <option value="Dholak">
                                        <option value="Dinarra">
                                        <option value="Dohol">
                                        <option value="Dolio">
                                        <option value="Dombra">
                                        <option value="Dotara">
                                        <option value="Duduk">
                                        <option value="Duggi">
                                        <option value="Dulcémele">
                                        <option value="Dulzaina">
                                        <option value="Dutar">
                                        <option value="Dunun o dundun, doundoun, o djun djun">
                                        <option value="Dutar">
                                        <option value="Đàn môi">
                                        <option value="Ek tara">
                                        <option value="Ekwe">
                                        <option value="Erhu">
                                        <option value="Erke">
                                        <option value="Erkencho">
                                        <option value="Fagot">
                                        <option value="Flauta">
                                        <option value="Flauta dulce">
                                        <option value="Flauta travesera">
                                        <option value="Flautín">
                                        <option value="Fou">
                                        <option value="Fue">
                                        <option value="Gaita cabreiresa">
                                        <option value="Gaita colombiana">
                                        <option value="Gaita de huelva">
                                        <option value="Gaita gastereña">
                                        <option value="Gamelán">
                                        <option value="Gangsa">
                                        <option value="Garrahand">
                                        <option value="Gatam">
                                        <option value="Gbofe">
                                        <option value="Geger">
                                        <option value="Geomungo">
                                        <option value="Ghatam">
                                        <option value="Ghumot">
                                        <option value="Gogona">
                                        <option value="Gong">
                                        <option value="Guacharaca">
                                        <option value="Guache">
                                        <option value="Guan">
                                        <option value="Guataca">
                                        <option value="Güira">
                                        <option value="Güiro">
                                        <option value="Guitarra">
                                        <option value="Guitarra de acero">
                                        <option value="Guitarra de golpe">
                                        <option value="Guitarra huapanguera">
                                        <option value="Guitarra panzona">
                                        <option value="Guitarra portuguesa">
                                        <option value="Guitarra séptima">
                                        <option value="Guitarró">
                                        <option value="Guitarron argentino">
                                        <option value="Guitarron chileno">
                                        <option value="Guitarrón mexicano">
                                        <option value="Guitarrón uruguayo">
                                        <option value="Gumbri">
                                        <option value="Guqin">
                                        <option value="Guzheng">
                                        <option value="Halam">
                                        <option value="Horagai">
                                        <option value="Hosho">
                                        <option value="Huéhuetl">
                                        <option value="Huiringua">
                                        <option value="Huqin">
                                        <option value="Ilimba">
                                        <option value="Jal tarang">
                                        <option value="Janggu">
                                        <option value="Jarana huasteca">
                                        <option value="Jarana jarocha">
                                        <option value="Jing">
                                        <option value="Kakaki">
                                        <option value="Kalimba">
                                        <option value="Kamanché">
                                        <option value="Kanjira">
                                        <option value="Kántele">
                                        <option value="Kanún">
                                        <option value="Kanyira">
                                        <option value="Kártalas">
                                        <option value="Kashaka">
                                        <option value="Kayagum">
                                        <option value="Kazú">
                                        <option value="Kebero">
                                        <option value="Kèn bầu">
                                        <option value="Kèn đám ma">
                                        <option value="Khartal">
                                        <option value="Kinnor">
                                        <option value="Kitag">
                                        <option value="Kkwaenggwari">
                                        <option value="Kobza">
                                        <option value="Kokiriko">
                                        <option value="Komuz">
                                        <option value="Kora">
                                        <option value="Koto">
                                        <option value="Krar">
                                        <option value="Langeleik">
                                        <option value="Laúd">
                                        <option value="Laúd arabe">
                                        <option value="Laúd español">
                                        <option value="Leona">
                                        <option value="Lira póntica">
                                        <option value="Litófono">
                                        <option value="Liuqin">
                                        <option value="Loh tarang">
                                        <option value="Maracas">
                                        <option value="Marimba">
                                        <option value="Metalófono">
                                        <option value="Oboe">
                                        <option value="Ocarina">
                                        <option value="Octabajo">
                                        <option value="Órgano">
                                        <option value="Organillo">
                                        <option value="Pandereta">
                                        <option value="Piano">
                                        <option value="Rabel">
                                        <option value="Saxofón">
                                        <option value="Shekere">
                                        <option value="Siringa">
                                        <option value="Tambor">
                                        <option value="Triángulo">
                                        <option value="Trompeta">
                                        <option value="Trombón">
                                        <option value="Tuba">
                                        <option value="Trompa">
                                        <option value="Tololoche">
                                        <option value="Vibráfono">
                                        <option value="Viola">
                                        <option value="Violín">
                                        <option value="Violonchelo">
                                        <option value="Xilófono">
                                        <option value="Zambomba">
                                        <option value="Zanfoña">
                                    </datalist>
                                    <label class="form-label" class="form-label" for="instrumento">Instrumento</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="number" name="annosExp" id="annosExp" min="1" required>
                                    <label class="form-label" for="annosExp">Años de experiencia</label>
                                </div>
                                <hr>
                                <h3>Datos finales</h3>
                                <div class="form-outline mb-4">
                                    <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" type="text" placeholder="Enter Username" id="uname" name="uname" class="form-control" required>
                                    <label for="uname" class="form-label">Nickname*</label>
                                    <?php
                                    if (isset($_GET["error"])) {
                                        $fallos = $_GET["error"];
                                        if ($fallos == 1) {
                                            echo "<div class='alert alert-warning'>
                                                            Este usuario ya existe, por favor elija otro
                                                            </div>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" class="form-control" type="text" placeholder="Enter Email" name="email" id="mail" onkeyup="validar_email()" required>
                                    <label class="form-label" for="email">Email*</label>
                                    <p id="email_validation" class="invalid" style="display: none;">Email invalido</p>
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" type="password" name="password1" id="password1" placeholder="Ingresa tu contraseña" onkeyup="checkPassword()" onfocus="mostrarInfoPsw()" class="form-control" required>
                                    <label for="password" class="form-label">Contraseña*</label>
                                    <input onkeyup="validar()" onclick="validar()" onfocus="mostrarInfoPsw()" type="password" name="password-confirm" id="password2" aria-describedby="emailHelp" placeholder="Confirma tu contraseña" class="form-control" onfocus="mostrarInfoPsw()" onkeyup="checkPassword()" required>
                                    <label for="password-confirm" class="form-label">Confirmar contraseña</label>
                                    <div id="infoPsw" style="display: none">
                                        <h4>La contraseña debe cumplir los siguientes requerimientos:</h4>
                                        <ul>
                                            <li id="letter" class="invalid">Al menos <strong>una letra</strong></li>
                                            <li id="capital" class="invalid">Al menos <strong>una letra mayúscula</strong></li>
                                            <li id="number" class="invalid">Al menos <strong>un número</strong></li>
                                            <li id="length" class="invalid">Al menos <strong>8 carácteres</strong></li>
                                            <li id="null" class="invalid">Debe <strong>confirmar la contraseña</strong></li>
                                            <li id="match" class="invalid">Las contraseñas <strong>deben coincidir</strong></li>
                                            <li id="blank" class="invalid">Las contraseñas <strong>no deben tener espacios</strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary btn-block mb-4" disabled>
                                    Sign up
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>