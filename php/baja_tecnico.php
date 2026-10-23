
<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../login/login.php");
    exit();
}

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["id_tecnico"]) || !is_numeric($_POST["id_tecnico"])) {
        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();
    }

    $id_tecnico = (int) $_POST["id_tecnico"];

    $consulta = "SELECT id_usuario FROM tecnico
                 WHERE id_tecnico = '$id_tecnico'";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        $tecnico = mysqli_fetch_assoc($resultado);
        $id_usuario = $tecnico["id_usuario"];

        mysqli_begin_transaction($conexion);

        $eliminar_tecnico = "DELETE FROM tecnico
                             WHERE id_tecnico = '$id_tecnico'";

        $resultado_tecnico = mysqli_query($conexion, $eliminar_tecnico);

        if ($resultado_tecnico) {

            $eliminar_usuario = "DELETE FROM usuario
                                 WHERE id_usuario = '$id_usuario'";

            $resultado_usuario = mysqli_query($conexion, $eliminar_usuario);

            if ($resultado_usuario) {

                mysqli_commit($conexion);

                header("Location: ../administrador/tecnico/consultatecnicos.php");
                exit();

            } else {

                mysqli_rollback($conexion);
                echo "No se pudo eliminar el usuario. Puede tener registros relacionados.";

            }

        } else {

            mysqli_rollback($conexion);
            echo "No se pudo eliminar el técnico. Puede tener registros relacionados.";

        }

    } else {

        header("Location: ../administrador/tecnico/consultatecnicos.php");
        exit();

    }
}

?>
