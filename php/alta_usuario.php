<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];
    $id_rol = $_POST["id_rol"];

    if (
        $nombre == "" ||
        $correo == "" ||
        $contrasenia == "" ||
        $id_rol == ""
    ) {

        header(
            "Location: ../administrador/altausuario.php?mensaje=vacio"
        );

        exit();
    }

    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

    $consulta = "INSERT INTO usuario
    (nombre, correo, contrasenia, id_rol)
    VALUES
    ('$nombre', '$correo', '$contrasenia', '$id_rol')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header(
            "Location: ../administrador/altausuario.php?mensaje=ok"
        );

    } else {

        header(
            "Location: ../administrador/altausuario.php?mensaje=error"
        );

    }

} else {

    header(
        "Location: ../administrador/altausuario.php"
    );

}

?>