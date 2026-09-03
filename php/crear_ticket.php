<?php

session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $prioridad = $_POST["prioridad"];

    $id_usuario = $_SESSION["id_usuario"];
    $estado = "Pendiente";

    $consulta = "INSERT INTO ticket 
    (id_usuario, titulo, descripcion, prioridad, estado, fecha_creacion)
    VALUES 
    ('$id_usuario', '$titulo', '$descripcion', '$prioridad', '$estado', NOW())";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../usuario/misticket.php");
        exit();

    } else {

        echo "Error al crear el ticket: " . mysqli_error($conexion);

    }

}

?>