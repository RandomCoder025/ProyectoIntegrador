<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ../html/login.php");
    }
} else {
    header("Location ../html/login.php");
}
$nombreUsuario = $_SESSION['username'];
require ("./conexion.php");

if (isset($_POST['nombre'])) {
    if ($_POST['nombre'] != "") {
        $consulta = "UPDATE `usuario` SET `Nombre`='" . $_POST['nombre'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['password'])) {
    if ($_POST['password'] != "") {
        $password = hash("md5", $_POST['password']);
        $consulta = "UPDATE `usuario` SET `Password`='" . $password . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['email'])) {
    if ($_POST['email'] != "") {
        $consulta = "UPDATE `usuario` SET `email`='" . $_POST['email'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['instrumento'])) {
    if ($_POST['instrumento'] != "") {
        $consulta = "UPDATE `usuario` SET `Instrumento`='" . $_POST['instrumento'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['sexo'])) {
    $consulta = "UPDATE `usuario` SET `GeneroP`='" . $_POST['sexo'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
    mysqli_query($conexion, $consulta);
}

if (isset($_POST['generoMusical'])) {
    if ($_POST['generoMusical'] != "") {
        $consulta = "UPDATE `usuario` SET `Genero`='" . $_POST['generoMusical'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['anosExperiencia'])) {
    echo "aqui entra";
    if ($_POST['anosExperiencia'] != 0) {
        echo "aqui tambien";
        $consulta = "UPDATE `usuario` SET `Anos de experiencia`='" . $_POST['anosExperiencia'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_SESSION)) {
    if (isset($_SESSION['username'])) {
        $consulta = "SELECT IdDomicilio FROM `usuario` WHERE Nickname='" . $_SESSION['username'] . "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $id = $fila['IdDomicilio'];
    }
}

if (isset($_POST['calle'])) {
    if ($_POST['calle'] != "") {
        $calle = $_POST['calle'];
    } else {
        $consulta = "SELECT Calle FROM `domicilio` WHERE Id ='" . $id . "'";
        echo $consulta;
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_assoc($resultado);
        $calle = $fila['Calle'];
    }
}

if (isset($_POST['numPortal'])) {
    if ($_POST['numPortal'] != 0) {
        $numero = $_POST['numPortal'];
    } else {
        $consulta = "SELECT NumeroPortal FROM `domicilio` WHERE Id ='" . $id . "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $numero = $fila['NumeroPortal'];
    }
}

if (isset($_POST['piso'])) {
    if ($_POST['piso'] != 0) {
        $piso = $_POST["piso"];
    } else {
        $consulta = "SELECT Piso FROM `domicilio` WHERE Id ='" . $id . "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $piso = $fila['Piso'];
    }
}

if (isset($_POST['puerta'])) {
    if ($_POST['puerta'] != "") {
        $puerta = $_POST['puerta'];
    } else {
        $consulta = "SELECT Puerta FROM `domicilio` WHERE Id ='" . $id . "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $puerta = $fila['Puerta'];
    }
}

if (isset($_POST['cp'])) {
    if ($_POST['cp'] != 0) {
        $codigoPostal = $_POST['cp'];
    } else {
        $consulta = "SELECT CodigoPostal FROM `domicilio` WHERE Id ='" . $id . "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $codigoPostal = $fila['CodigoPostal'];
    }
}

if (isset($_POST['ciudad'])) {
    if ($_POST['ciudad'] != "") {
        $ciudad = $_POST['ciudad'];
    } else {
        $consulta = "SELECT ciudad FROM `domicilio` WHERE Id ='" . $id . "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        $ciudad = $fila['ciudad'];
    }
}

$consulta_SQL = "SELECT * FROM domicilio where Calle = '" . $calle . "' and NumeroPortal = '" . $numero . "' and Piso = '" . $piso . "'  and codigoPostal = '" . $codigoPostal . "' and puerta = '" . $puerta . "' and ciudad = '" . $ciudad . "'";
echo "<br>" . $consulta_SQL;
$resultado = mysqli_query($conexion, $consulta_SQL);
//echo "<h2> $consulta_SQL : comando G de BUSCAR el domichilio </h2><hr>";

$instruccion_SQL = "INSERT INTO `domicilio`(`Calle`, `NumeroPortal`, `Piso`, `Puerta`, `codigoPostal`, `ciudad`) VALUES ('$calle','$numero','$piso','$puerta','$codigoPostal','$ciudad')";
if (isset($resultado)) {
    echo 'pillo el domicilio ';
    //while ($row = mysqli_fetch_assoc($resultado)) {
    //echo ("<h2>reslt</h2>");
    //echo ("
    //<ul><li> ID: " . $idlaz = $row["ID"] . ", " . "</li><li> Calle: " . $row["Calle"] . ", " . "</li><li> NumeroPortal: " . $row["NumeroPortal"] .
    //    ", " . "</li><li>Piso: " . $row["Piso"] . "</li>" . "<li>Puerta: " . $row["Puerta"] . "</li>" . "<li> Codigo postl: " .
    //    $row["codigoPostal"] . " </li><li>Ciudad: " . $row["ciudad"] . "</li>");
    //}

    if ($resultado->num_rows >= 1) {
        // tiene contenido
        echo 'Hay un domicilio en la bbdd';
        $comando = "SELECT id FROM domicilio where calle = '" . $calle . "' and NumeroPortal = 
                '" . $numero . "' and codigoPostal = '" . $codigoPostal . "' and puerta = '" . $puerta . "' and ciudad = '" . $ciudad . "' and piso = '" . $piso . "'";
                echo "<br>".$comando."</br>";
        $resultado2 = mysqli_query($conexion, $comando);
        $row = $resultado2->fetch_assoc();
        $idDomicilio = $row['id'];
        $comando = "UPDATE `usuario` SET `IdDomicilio` = '" . $idDomicilio . "' WHERE `Nickname` = '" . $_SESSION['username'] . "'";
        echo "<br>" . $comando . "<br>";
        $resultado2 = mysqli_query($conexion, $comando);
    } else {
        echo 'no hay domicilio en la bdd';
        // si no está el domicilio en la bbdd
        mysqli_query($conexion, $instruccion_SQL);
        //echo "<h2> $instruccion_SQL : comando G de meter el domichilio </h2>";
        $resultado2 = mysqli_query($conexion, "SELECT id FROM domicilio where calle = '" . $calle . "' and NumeroPortal = 
        '" . $numero . "' and codigoPostal = '" . $codigoPostal . "' and puerta = '" . $puerta . "' and ciudad = '" . $ciudad . "' and piso = '" . $piso . "'");
        $row = $resultado2->fetch_assoc();
        $idDomicilio = $row['id'];
        echo "<br>" . $idDomicilio . "<br>";
        $comando = "UPDATE `usuario` SET `IdDomicilio` = '" . $idDomicilio . "' WHERE `Nickname` = '" . $_SESSION['username'] . "'";
        echo "<br>" . $comando . "<br>";
        $resultado2 = mysqli_query($conexion, $comando);
    }
}

if (isset($_POST['apellidos'])) {
    if ($_POST['apellidos'] != "") {
        $apelidos = explode(" ", $_POST['apellidos']);
        $consulta = "UPDATE `usuario` SET `Apellido1`='" . $apelidos[0] . "',`Apellido2`='" . $apelidos[1] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['descripcion'])) {
    if ($_POST['descripcion'] != "") {
        $consulta = "UPDATE `usuario` SET `Descripcion`='" . $_POST['descripcion'] . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

if (isset($_POST['username'])) {
    if ($_POST['username'] != "") {
        $username = $_POST['username'];
        $comparar = "SELECT Nickname FROM usuario 
        WHERE Nickname LIKE BINARY '$username';";
        echo "<br>" . $comparar;
        $resultado = mysqli_query($conexion, $comparar);
        $row = $resultado->fetch_assoc();
        echo "<br>" . $row['Nickname'];
        if (isset($row['Nickname'])) {
            echo "<br>" . $row['Nickname'] . " Si, de nuevo";
            if (strtolower($username) == strtolower($row['Nickname'])) {
                #el usuario es el mizmo, manda de vuelta a la página
                echo 'el usuario es el mismo, mando de vuelta';
                $Error = 1;
                header("Location: ../html/EditarPerfil.php?error=$Error");
            }
        } else {
            $consulta = "UPDATE `usuario` SET `Nickname`='" . $_POST['username'] . "'
                WHERE Nickname='" . $_SESSION['username'] . "'";
            echo "<br>" . $consulta;
            mysqli_query($conexion, $consulta);
            $_SESSION['username'] = $_POST['username'];
        }
    }
}

if (isset($_FILES['ImagenDePerfil'])) {
    if ($_FILES['ImagenDePerfil']['name'] != null || $_FILES['ImagenDePerfil']['name '] != "") {
        $imagen = $_FILES['ImagenDePerfil'];
        $target_dir = "../img/usuarios/";
        $target_dir = $target_dir . basename($_FILES["ImagenDePerfil"]["name"]);
        $guardar = $_FILES['ImagenDePerfil']['tmp_name'];
        $imageFileType = strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
        if (!file_exists('../img/usuarios')) {
            mkdir('../img/usuarios', 0777, true);
            if (file_exists('../img/usuarios')) {
                if (move_uploaded_file($guardar, $target_dir . $imageFileType)) {
                    echo "La imagen se ha subido con éxito";
                } else {
                    echo "Cagaste manin";
                }
            }
        } else {
            if (move_uploaded_file($guardar, $target_dir)) {
                echo "La imagen se ha subido con éxito";
            } else {
                echo "Cagaste manin";
            }
        }
        $consulta = "UPDATE `usuario` SET `ImagenDePerfil`='" . basename($_FILES["ImagenDePerfil"]["name"]) . "'
        WHERE Nickname='" . $_SESSION['username'] . "'";
        mysqli_query($conexion, $consulta);
    }
}

header("Location: ../html/EditarPerfil.php");
