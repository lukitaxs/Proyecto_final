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

    $id_activo = $_POST["id_activo"];
    $id_usuario = $_POST["id_usuario"];
    $observaciones = $_POST["observaciones"];
    $ubicacion_fisica = $_POST["ubicacion_fisica"];
    $fecha_inicio = date("Y-m-d");

    $consulta = "INSERT INTO ubicacion
                 (id_usuario, id_activo, fecha_inicio, fecha_fin, observaciones)
                 VALUES
                 ('$id_usuario', '$id_activo', '$fecha_inicio', NULL, '$observaciones')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
                $actualizar = "UPDATE activo_tecnologico
                    SET estado_actual = 'Asignado',
                        ubicacion_fisica = '$ubicacion_fisica'
                    WHERE id_activo = '$id_activo'";

        mysqli_query($conexion, $actualizar);

        header("Location: ../administrador/activos/consultaactivos.php");
        exit();

    } else {

        echo "Error al guardar la asignación: " . mysqli_error($conexion);

    }

}

?>