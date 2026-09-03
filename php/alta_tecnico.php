<?php

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

    } else {

        echo "Error al crear el técnico: " . mysqli_error($conexion);

    }

}

?>