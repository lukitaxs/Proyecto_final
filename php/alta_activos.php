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

    // Verificar que se hayan recibido los datos
    if (
        !isset($_POST["tipo_dispositivo"]) ||
        !isset($_POST["estado_actual"]) ||
        !isset($_POST["numero_serie"]) ||
        !isset($_POST["marca"]) ||
        !isset($_POST["modelo"]) ||
        !isset($_POST["codigo_inventario"]) ||
        !isset($_POST["ubicacion_fisica"]) ||
        !isset($_POST["observaciones"])
    ) {
        header("Location: ../administrador/activos/altaactivos.php?mensaje=error");
        exit();
    }

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
        exit();

    } else {

        header("Location: ../administrador/activos/altaactivos.php?mensaje=error");
        exit();
    }

} else {

    header("Location: ../administrador/activos/altaactivos.php");
    exit();

}

?>