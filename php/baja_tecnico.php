<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_tecnico = $_POST["id_tecnico"];

    $consulta = "DELETE FROM tecnico
                 WHERE id_tecnico = '$id_tecnico'";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {

        header("Location: ../administrador/tecnico/consultatecnicos.php");

    } else {

        echo "Error al eliminar el técnico: " . mysqli_error($conexion);

    }

}

?>