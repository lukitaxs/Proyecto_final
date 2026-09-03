<?php

include("../../php/conexion.php");

$id_solicitud = $_GET["id"];

/* Cambiar estado de la solicitud */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nuevo_estado = $_POST["estado"];

    $actualizar = "UPDATE solicitud
                   SET estado = '$nuevo_estado'
                   WHERE id_solicitud = '$id_solicitud'";

    mysqli_query($conexion, $actualizar);
}

/* Buscar la solicitud */
$consulta = "SELECT solicitud.*, usuario.nombre
             FROM solicitud
             INNER JOIN usuario
             ON solicitud.id_usuario = usuario.id_usuario
             WHERE solicitud.id_solicitud = '$id_solicitud'";

$resultado = mysqli_query($conexion, $consulta);

$solicitud = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalle de solicitud - Covasg</title>

<link rel="stylesheet" href="../css/estilodetallessolicitudes.css">

</head>

<body>

<header>

    <h1>Covasg - Administrador</h1>

    <nav>
        <a href="../administrador.html">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="consultasolicitudes.php">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <h2>
            Solicitud #<?php echo $solicitud["id_solicitud"]; ?>
        </h2>

        <p>
            Información completa de la solicitud.
        </p>

    </section>

    <section class="detalle">

        <h3>Datos de la solicitud</h3>

        <p>
            <strong>Usuario:</strong>
            <?php echo $solicitud["nombre"]; ?>
        </p>

        <p>
            <strong>Título:</strong>
            <?php echo $solicitud["titulo"]; ?>
        </p>

        <p>
            <strong>Tipo:</strong>
            <?php echo $solicitud["tipo"]; ?>
        </p>

        <p>
            <strong>Prioridad:</strong>
            <?php echo $solicitud["prioridad"]; ?>
        </p>

        <p>
            <strong>Descripción:</strong>
            <?php echo $solicitud["descripcion"]; ?>
        </p>

        <p>
            <strong>Fecha:</strong>
            <?php echo $solicitud["fecha_creacion"]; ?>
        </p>

        <p>
            <strong>Estado actual:</strong>
            <?php echo $solicitud["estado"]; ?>
        </p>

        <h3>Cambiar estado</h3>

        <form method="POST">

            <select name="estado" required>

                <option value="Pendiente">
                    Pendiente
                </option>

                <option value="En proceso">
                    En proceso
                </option>

                <option value="Finalizada">
                    Finalizada
                </option>

            </select>

            <button type="submit">
                Guardar estado
            </button>

        </form>

        <br>

        <a href="consultasolicitudes.php">
            Volver a solicitudes
        </a>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>