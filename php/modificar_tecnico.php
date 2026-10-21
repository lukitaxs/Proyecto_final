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

    // Verificar que se hayan recibido todos los datos
    if (
        !isset($_POST["id_tecnico"]) ||
        !isset($_POST["id_usuario"]) ||
        !isset($_POST["rol"]) ||
        !isset($_POST["area"]) ||
        !isset($_POST["especialidad"]) ||
        !is_numeric($_POST["id_tecnico"]) ||
        !is_numeric($_POST["id_usuario"])
    ) {
        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();
    }

    $id_tecnico = $_POST["id_tecnico"];
    $id_usuario = $_POST["id_usuario"];
    $rol = $_POST["rol"];
    $area = $_POST["area"];
    $especialidad = $_POST["especialidad"];

    $consulta = "UPDATE tecnico
                 SET id_usuario = '$id_usuario',
                     rol = '$rol',
                     area = '$area',
                     especialidad = '$especialidad'
                 WHERE id_tecnico = '$id_tecnico'";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();

    } else {

        echo "Error al modificar el técnico: " . mysqli_error($conexion);

    }

} else {

    header("Location: ../administrador/tecnico/consultatecnicos.php");
    exit();

}

?>