<?php

session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_SESSION["id_usuario"];

    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $prioridad = $_POST["prioridad"];
    $descripcion = $_POST["descripcion"];

    $consulta = "INSERT INTO solicitud 
                 (id_usuario, titulo, tipo, prioridad, descripcion, estado)
                 VALUES 
                 ('$id_usuario', '$titulo', '$tipo', '$prioridad', '$descripcion', 'Pendiente')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../usuario/missolicitudes.php");
        exit();

    } else {

        echo "Error al crear la solicitud: " . mysqli_error($conexion);

    }

}

?>