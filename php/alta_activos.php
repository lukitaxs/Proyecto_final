<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipo_dispositivo = $_POST["tipo_dispositivo"];
    $estado_actual = $_POST["estado_actual"];
    $numero_serie = $_POST["numero_serie"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $codigo_inventario = $_POST["codigo_inventario"];
    $ubicacion_fisica = $_POST["ubicacion_fisica"];
    $observaciones = $_POST["observaciones"];

    $consulta = "INSERT INTO activo_tecnologico
    (tipo_dispositivo, estado_actual, numero_serie, marca, modelo, codigo_inventario, ubicacion_fisica, observaciones)
    VALUES
    ('$tipo_dispositivo', '$estado_actual', '$numero_serie', '$marca', '$modelo', '$codigo_inventario', '$ubicacion_fisica', '$observaciones')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/activos/altaactivos.php?mensaje=ok");

    } else {

        header("Location: ../administrador/activos/altaactivos.php?mensaje=error");

    }

} else {

    header("Location: ../administrador/activos/altaactivos.php");

}

?>