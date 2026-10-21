<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../login/login.php");
    exit();
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["id_tecnico"]) || !is_numeric($_POST["id_tecnico"])) {
        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();
    }

    $id_tecnico = (int) $_POST["id_tecnico"];

    $consulta = "DELETE FROM tecnico
                 WHERE id_tecnico = '$id_tecnico'";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();

    } else {

        echo "Error al eliminar el técnico: " . mysqli_error($conexion);

    }
}

?>