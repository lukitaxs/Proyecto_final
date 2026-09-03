<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id_usuario"];

    $consulta = "SELECT * FROM usuario
    WHERE id_usuario = '$id'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

        $eliminar = "DELETE FROM usuario
        WHERE id_usuario = '$id'";

        if (mysqli_query($conexion, $eliminar)) {

            header(
                "Location: ../administrador/bajausuario.php?mensaje=ok"
            );

        } else {

            header(
                "Location: ../administrador/bajausuario.php?mensaje=error"
            );

        }

    } else {

        header(
            "Location: ../administrador/bajausuario.php?mensaje=noexiste"
        );

    }

} else {

    header(
        "Location: ../administrador/bajausuario.php"
    );

}

?>