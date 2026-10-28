<?php

session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
    exit;
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $prioridad = $_POST["prioridad"];
    $id_activo = $_POST["id_activo"];

    $id_usuario = $_SESSION["id_usuario"];
    $estado = "Pendiente";

    $consulta = "INSERT INTO ticket
    (id_usuario, id_activo, titulo, descripcion, prioridad, estado, fecha_creacion)
    VALUES
    ('$id_usuario', '$id_activo', '$titulo', '$descripcion', '$prioridad', '$estado', NOW())";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../usuario/misticket.php");
        exit;

    } else {

        echo "Error al crear el ticket: " . mysqli_error($conexion);

    }

}

?>