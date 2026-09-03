<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_POST["id_usuario"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];
    $id_rol = $_POST["id_rol"];

    /* Si no se escribió una nueva contraseña */
    if ($contrasenia == "") {

        $consulta = "UPDATE usuario
                     SET nombre = '$nombre',
                         correo = '$correo',
                         id_rol = '$id_rol'
                     WHERE id_usuario = '$id_usuario'";

    } else {

        /* Si se escribió una nueva contraseña */
        $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

        $consulta = "UPDATE usuario
                     SET nombre = '$nombre',
                         correo = '$correo',
                         contrasenia = '$contrasenia',
                         id_rol = '$id_rol'
                     WHERE id_usuario = '$id_usuario'";

    }

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/consultausuario.php");
        exit();

    } else {

        echo "Error al modificar el usuario: " . mysqli_error($conexion);

    }

}

?>