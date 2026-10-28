<?php

session_start();

if (!isset($_SESSION["id_rol"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../login/login.php");
    exit;
}

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

            header("Location: ../administrador/bajausuario.php?mensaje=ok");
            exit;

        } else {

            header("Location: ../administrador/bajausuario.php?mensaje=error");
            exit;

        }

    } else {

        header("Location: ../administrador/bajausuario.php?mensaje=noexiste");
        exit;

    }

} else {

    header("Location: ../administrador/bajausuario.php");
    exit;

}

?>