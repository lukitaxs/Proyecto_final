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

    if (
        !isset($_POST["tipo_dispositivo"]) ||
        !isset($_POST["estado_actual"]) ||
        !isset($_POST["id_marca"]) ||
        !isset($_POST["id_modelo"]) ||
        !isset($_POST["numero_serie"]) ||
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
    $id_marca = $_POST["id_marca"];
    $id_modelo = $_POST["id_modelo"];
    $codigo_inventario = $_POST["codigo_inventario"];
    $ubicacion_fisica = $_POST["ubicacion_fisica"];
    $observaciones = $_POST["observaciones"];

    $consulta = "SELECT marca.nombre_marca, modelo.nombre_modelo
                 FROM modelo
                 INNER JOIN marca
                 ON modelo.id_marca = marca.id_marca
                 WHERE modelo.id_modelo = '$id_modelo'
                 AND marca.id_marca = '$id_marca'";

    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado || mysqli_num_rows($resultado) == 0) {
        echo "La marca y el modelo no coinciden o hubo un error en la consulta.";
        exit();
    }

    $datos = mysqli_fetch_assoc($resultado);

    $marca = $datos["nombre_marca"];
    $modelo = $datos["nombre_modelo"];

    $consulta = "INSERT INTO activo_tecnologico
    (tipo_dispositivo, estado_actual, numero_serie, marca, modelo,
     id_marca, id_modelo, codigo_inventario, ubicacion_fisica, observaciones)
    VALUES
    ('$tipo_dispositivo', '$estado_actual', '$numero_serie', '$marca',
     '$modelo', '$id_marca', '$id_modelo', '$codigo_inventario',
     '$ubicacion_fisica', '$observaciones')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/activos/altaactivos.php?mensaje=ok");
        exit();

    } else {

        echo "Error al registrar el activo: " . mysqli_error($conexion);
        exit();

    }

} else {

    header("Location: ../administrador/activos/altaactivos.php");
    exit();

}

?>
