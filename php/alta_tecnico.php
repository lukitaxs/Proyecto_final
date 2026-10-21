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

    $id_usuario = $_POST["id_usuario"];
    $rol = $_POST["rol"];
    $area = $_POST["area"];
    $especialidad = $_POST["especialidad"];

    $consulta = "INSERT INTO tecnico
                 (id_usuario, rol, area, especialidad)
                 VALUES
                 ('$id_usuario', '$rol', '$area', '$especialidad')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();

    } else {

        echo "Error al crear el técnico: " . mysqli_error($conexion);

    }

}

?>