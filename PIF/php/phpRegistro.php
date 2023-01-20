<?php
session_start();
require ("./conexion.php");


$Error = 0;
if (isset($_POST['uname'])) {
    echo 'pillo el usuario';
    $username = $_POST['uname'];
    $comparar = "Select Nickname from usuario where Nickname = '$username';";
    echo "<h3>$comparar</h3>";
    $resultado = mysqli_query($conexion, $comparar);
    $row = $resultado->fetch_assoc();
    echo "<h3>".  
    strtolower($row['Nickname'])."</h3>";
    if (isset($row['Nickname'])) {
        if (strtolower($username) == strtolower($row['Nickname'])) {
            #el usuario es el mizmo, manda de vuelta a la página
            echo 'el usuario es el mismo, mando de vuelta';
            $Error = 1;
            header("Location: ../html/Register.php?error=$Error");
        }else{
            echo 'no funke';
        }
    } else {

        // Mete el usuario en la base de datos
        echo 'el usuario no es el mismo';
        $calle = $_POST["calle"];
        $numero = $_POST["numero"];
        $piso = $_POST["piso"];
        $puerta = $_POST["puerta"];
        $codigoPostal = $_POST["codigoPostal"];
        $ciudad = $_POST["ciudad"];

        $consulta_SQL = "SELECT * FROM domicilio where Calle = '" . $calle . "' and NumeroPortal = '" . $numero . "' and Piso = '" . $piso . "'  and codigoPostal = '" . $codigoPostal . "' and puerta = '" . $puerta . "' and ciudad = '" . $ciudad . "'";
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
                $comando = "SELECT id FROM domicilio WHERE id = (SELECT id FROM domicilio where calle = '" . $calle . "' and NumeroPortal = 
                '" . $numero . "' and codigoPostal = '" . $codigoPostal . "' and puerta = '" . $puerta . "' and ciudad = '" . $ciudad . "')";
                $resultado2 = mysqli_query($conexion, $comando);
                $row = $resultado2->fetch_assoc();
                $idDomicilio = $row['id'];
            } else {
                echo 'no hay domicilio en la bdd';
                // si no está el domicilio en la bbdd
                mysqli_query($conexion, $instruccion_SQL);
                //echo "<h2> $instruccion_SQL : comando G de meter el domichilio </h2>";
                $resultado2 = mysqli_query($conexion, "SELECT MAX(id) FROM domicilio");
                $row = $resultado2->fetch_assoc();
                $idDomicilio = $row['MAX(id)'];
                
            }
        }

        $instrumento = $_POST["instrumento"];
        $nickname = $_POST['uname'];
        $nombre = $_POST['nombre'];
        $apellido1=$_POST['apellido1'];
        $apellido2=$_POST['apellido2'];
        // Easter egg por que EXPLODES
        // $apellidos = $_POST['apellidos'];
        // $email = $_POST['email'];

        // $apellidos = explode(" ", $apellidos);
        // $apellido1 = $apellidos[0];
        // if (isset($apellidos[1])) {
        //     # Hay contenido en apellido 2
        //     $apellido2 = $apellidos[1];
        // } else {
        //     $apellido2 = null;
        // }


        $password = $_POST['psw'];
        $sexo = $_POST['sexo'];
        $annosExp = $_POST['annosExp'];
        $genero = $_POST['genero'];
        $hash = hash("snefru", $password);

        function annadirUsuario($conexion, $nickname, $hash, $nombre, $instrumento, $apellido1, $apellido2, $email, $sexo, $genero, $annosExp, $idDomicilio)
        {

            // Method that adds to the database a new entry with the given nickname, password and confirmation password
            $consulta = "INSERT INTO `usuario`(`Nickname`,`email`, `Password`, `Nombre`, `Instrumento`, `Apellido1`, `Apellido2`, `GeneroP`, `Genero`, `Anos de experiencia`, `IdGrupo`, `IdDomicilio`)
            VALUES ('$nickname', '$email', '$hash', '$nombre', '$instrumento', '$apellido1', '$apellido2', '$sexo', '$genero', '$annosExp', null, '$idDomicilio')";
            echo "<h2>$consulta : Comando meter usuario </h2>";

            $resultado = mysqli_query($conexion, $consulta);
        }


        annadirUsuario($conexion, $nickname, $hash, $nombre, $instrumento, $apellido1, $apellido2, $email, $sexo, $genero, $annosExp, $idDomicilio);

        //echo "<h2><a href=' ../html/Principal.php?user=$nickname'> volver</a></h2> ";
        $_SESSION['username'] = $nickname;
        // header("Location: ../html/Principal.php?user=$nickname");
        header("Location: ../html/Principal.php");
    }
}
