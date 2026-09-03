<?php

session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $consulta = "SELECT * FROM usuario
                 WHERE correo = '$email'";

    $resultado = mysqli_query($conexion, $consulta);

    $usuario = mysqli_fetch_array($resultado);

    if ($usuario) {

        if (password_verify($password, $usuario["contrasenia"])) {

            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["id_rol"] = $usuario["id_rol"];

            if ($usuario["id_rol"] == 1) {

                header("Location: ../usuario/usuario.php");
            
            } elseif ($usuario["id_rol"] == 2) {

                header("Location: ../tecnicos/tecnicos.php");

            } elseif ($usuario["id_rol"] == 3) {

             header("Location: ../administrador/administrador.php");

            }

            exit();

        } else {

            header("Location: ../login/login.php?error=contrasenia");
            exit();

        }

    } else {

        header("Location: ../login/login.php?error=usuario");
        exit();

    }

} else {

    header("Location: ../login/login.php");
    exit();

}

?>