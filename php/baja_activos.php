<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_activo = $_POST["id_activo"];

    $consulta = "SELECT * FROM activo_tecnologico
                 WHERE id_activo = '$id_activo'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

        $eliminar = "DELETE FROM activo_tecnologico
                     WHERE id_activo = '$id_activo'";

        $resultadoEliminar = mysqli_query($conexion, $eliminar);

        if ($resultadoEliminar) {

            header("Location: ../administrador/activos/bajaactivos.php?mensaje=ok");

        } else {

            header("Location: ../administrador/activos/bajaactivos.php?mensaje=error");

        }

    } else {

        header("Location: ../administrador/activos/bajaactivos.php?mensaje=error");

    }

} else {

    header("Location: ../administrador/activos/bajaactivos.php");

}

?>