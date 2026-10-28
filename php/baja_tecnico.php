<?php

session_start();

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

    if (!isset($_POST["id_tecnico"]) || !is_numeric($_POST["id_tecnico"])) {
        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();
    }

    $id_tecnico = (int) $_POST["id_tecnico"];

    $consulta = "SELECT id_usuario
                 FROM tecnico
                 WHERE id_tecnico = '$id_tecnico'";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        $tecnico = mysqli_fetch_assoc($resultado);
        $id_usuario = $tecnico["id_usuario"];

        $actualizar = "UPDATE usuario
                       SET estado = 'Inactivo'
                       WHERE id_usuario = '$id_usuario'";

        if (mysqli_query($conexion, $actualizar)) {

            header("Location: ../administrador/tecnico/consultatecnicos.php");
            exit();

        } else {

            echo "No se pudo dar de baja al técnico.";

        }

    } else {

        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();

    }
}

?>
