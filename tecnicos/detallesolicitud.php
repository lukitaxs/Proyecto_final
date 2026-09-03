<?php

include("../php/conexion.php");

$id_solicitud = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nuevo_estado = $_POST["estado"];

    $actualizar = "UPDATE solicitud
                   SET estado = '$nuevo_estado'
                   WHERE id_solicitud = '$id_solicitud'";

    mysqli_query($conexion, $actualizar);
}

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

    <link rel="stylesheet" href="css/estilotecnico.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="tecnicos.php">Inicio</a>
        <a href="tickets.php">Tickets</a>
        <a href="solicitudes.php">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <div class="bienvenida">

        <h2>Detalle de la solicitud</h2>

        <p>Información de la solicitud seleccionada.</p>

    </div>

    <div class="tabla-contenedor">

        <h3>Solicitud #<?php echo $solicitud["id_solicitud"]; ?></h3>

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
            <strong>Estado:</strong>
            <?php echo $solicitud["estado"]; ?>
        </p>

        <p>
            <strong>Fecha de creación:</strong>
            <?php echo $solicitud["fecha_creacion"]; ?>
        </p>

        <br>

        <h3>Cambiar estado</h3>

        <form method="POST">

            <label>Nuevo estado:</label>

            <select name="estado" required>

                <option value="Pendiente">Pendiente</option>

                <option value="En proceso">En proceso</option>

                <option value="Finalizada">Finalizada</option>

            </select>

            <button type="submit">Guardar estado</button>

        </form>

        <br>

        <a href="solicitudes.php">Volver a solicitudes</a>

    </div>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>

</body>

</html>