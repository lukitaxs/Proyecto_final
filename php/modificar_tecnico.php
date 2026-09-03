<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    } else {

        echo "Error al modificar el técnico: " . mysqli_error($conexion);

    }

}

?>