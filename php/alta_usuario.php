<?php

session_start();

// Verificar que haya iniciado sesión como administrador
if (
    !isset($_SESSION["id_usuario"]) ||
    !isset($_SESSION["id_rol"]) ||
    $_SESSION["id_rol"] != 3
) {
    header("Location: ../login/login.php");
    exit();
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        !isset($_POST["nombre"]) ||
        !isset($_POST["correo"]) ||
        !isset($_POST["contrasenia"]) ||
        !isset($_POST["id_rol"])
    ) {
        header("Location: ../administrador/altausuario.php?mensaje=vacio");
        exit();
    }

    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $contrasenia = $_POST["contrasenia"];
    $id_rol = $_POST["id_rol"];

    if (
        $nombre == "" ||
        $correo == "" ||
        $contrasenia == "" ||
        $id_rol == ""
    ) {
        header("Location: ../administrador/altausuario.php?mensaje=vacio");
        exit();
    }

    // Encriptar la contraseña
    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

    // Crear el usuario
    $consulta = "INSERT INTO usuario
                 (nombre, correo, contrasenia, id_rol)
                 VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $nombre,
        $correo,
        $contrasenia,
        $id_rol
    );

    if (mysqli_stmt_execute($stmt)) {

        // Obtener el ID del usuario recién creado
        $id_usuario = mysqli_insert_id($conexion);

        // Si es técnico, crear también su ficha
        if ($id_rol == 2) {

            $rol_tecnico = "Técnico";
            $area = "Soporte";
            $especialidad = "Soporte a usuarios";

            $consulta_tecnico = "INSERT INTO tecnico
                                 (id_usuario, rol, area, especialidad)
                                 VALUES (?, ?, ?, ?)";

            $stmt_tecnico = mysqli_prepare($conexion, $consulta_tecnico);

            mysqli_stmt_bind_param(
                $stmt_tecnico,
                "isss",
                $id_usuario,
                $rol_tecnico,
                $area,
                $especialidad
            );

            if (!mysqli_stmt_execute($stmt_tecnico)) {
                // Avisar si no se pudo crear la ficha del técnico
                echo "El usuario se creó, pero hubo un error al crear su ficha técnica: "
                     . mysqli_error($conexion);
                exit();
            }

            mysqli_stmt_close($stmt_tecnico);
        }

        mysqli_stmt_close($stmt);

        header("Location: ../administrador/altausuario.php?mensaje=ok");
        exit();

    } else {

        mysqli_stmt_close($stmt);
        header("Location: ../administrador/altausuario.php?mensaje=error");
        exit();
    }

} else {

    header("Location: ../administrador/altausuario.php");
    exit();
}

?>