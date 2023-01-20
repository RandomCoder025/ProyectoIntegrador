function validar_email() {
    var email = document.getElementById('mail').value;
    let regExp = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;

    if (!regExp.test(email)) {
        mostrar_info.innerHTML = "Email válido<br>";
        $('#email_validation').removeClass('invalid').addClass('valid');
        return true;
    } else {
        mostrar_info.innerHTML = "Email no válido<br>";
        $('#email_validation').removeClass('valid').addClass('invalid');
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

        if (noValido.test(p1 || p2)) {
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
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');

    if ($(password1).is(':focus') || $(password2).is(':focus')) {
        $('#infoPsw').show();
    } else {
        $('#infoPsw').hide();
    }

}

function validar() {
    var valido = true;
    if (!validar_email()) {
        valido = false;
    }
    if (!checkPassword()) {
        valido = false;
    }
    if (!noNulos()) {
        valido = false;
    }

    return valido;
}

function noNulos() {
    var valido = true;

    if (document.getElementById('calle').value == "") {
        valido = false;
    }
    if (document.getElementById('numero').value == "") {
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
    if (document.getElementById('apellidos').value == "") {
        valido = false;
    }
    if (document.getElementById('psw').value == "") {
        valido = false;
    }
    if (document.getElementById('cpsw').value == "") {
        valido = false;
    }
    if (document.getElementById('sexo').value == "") {
        valido = false;
    }
    if (document.getElementById('annosExp').value == "") {
        valido = false;
    }
    if (document.getElementById('genero').value == "") {
        valido = false;
    }

    return valido;
}