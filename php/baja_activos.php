<?php

session_start();

// Verificar que haya iniciado sesión como administrador
if (!isset($_SESSION["id_usuario"]) || !isset($_SESSION["id_rol"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../login/login.php");
    exit();
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["id_activo"]) || !is_numeric($_POST["id_activo"])) {
        header("Location: ../administrador/activos/bajaactivos.php?mensaje=error");
        exit();
    }

    $id_activo = (int) $_POST["id_activo"];

    $consulta = "SELECT * FROM activo_tecnologico
                 WHERE id_activo = '$id_activo'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

        $eliminar = "DELETE FROM activo_tecnologico
                     WHERE id_activo = '$id_activo'";

        $resultadoEliminar = mysqli_query($conexion, $eliminar);

        if ($resultadoEliminar) {

            header("Location: ../administrador/activos/bajaactivos.php?mensaje=ok");
            exit();

        } else {

            header("Location: ../administrador/activos/bajaactivos.php?mensaje=error");
            exit();

        }

    } else {

        header("Location: ../administrador/activos/bajaactivos.php?mensaje=error");
        exit();

    }

} else {

    header("Location: ../administrador/activos/bajaactivos.php");
    exit();

}

?>