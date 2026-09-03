<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_activo = $_POST["id_activo"];
    $tipo_dispositivo = $_POST["tipo_dispositivo"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $codigo_inventario = $_POST["codigo_inventario"];
    $estado_actual = $_POST["estado_actual"];
    $ubicacion_fisica = $_POST["ubicacion_fisica"];

    $consulta = "UPDATE activo_tecnologico
                 SET tipo_dispositivo = '$tipo_dispositivo',
                     marca = '$marca',
                     modelo = '$modelo',
                     codigo_inventario = '$codigo_inventario',
                     estado_actual = '$estado_actual',
                     ubicacion_fisica = '$ubicacion_fisica'
                 WHERE id_activo = '$id_activo'";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/activos/consultaactivos.php");

    } else {

        echo "Error al modificar el activo: " . mysqli_error($conexion);

    }

}

?>