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

    <title data-traducir="detalleSolicitud">Detalle de solicitud - Covasg</title>

    <link rel="stylesheet" href="css/estilotecnico.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="tecnicos.php" data-traducir="inicio">Inicio</a>
        <a href="tickets.php" data-traducir="tickets">Tickets</a>
        <a href="solicitudes.php" data-traducir="solicitudes">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion" data-traducir="cerrarSesion">Cerrar sesión</a>

        <select onchange="cambiarIdioma(this.value)">
            <option value="es">Español</option>
            <option value="en">English</option>
        </select>
    </nav>

</header>

<main>

    <div class="bienvenida">

        <h2 data-traducir="detalleSolicitud">Detalle de la solicitud</h2>

        <p data-traducir="informacionSolicitud">Información de la solicitud seleccionada.</p>

    </div>

    <div class="tabla-contenedor">

        <h3>
            <span data-traducir="solicitud">Solicitud</span>
            #<?php echo $solicitud["id_solicitud"]; ?>
        </h3>
        <p>
            <strong data-traducir="usuario">Usuario:</strong>
            <?php echo $solicitud["nombre"]; ?>
        </p>
        <p>
            <strong data-traducir="titulo">Título:</strong>
            <?php echo $solicitud["titulo"]; ?>
        </p>
        <p>
            <strong data-traducir="tipo">Tipo:</strong>
            <?php echo $solicitud["tipo"]; ?>
        </p>
        <p>
            <strong data-traducir="prioridad">Prioridad:</strong>
            <?php echo $solicitud["prioridad"]; ?>
        </p>
        <p>
            <strong data-traducir="descripcion">Descripción:</strong>
            <?php echo $solicitud["descripcion"]; ?>
        </p>
        <p>
            <strong data-traducir="estado">Estado:</strong>
            <?php echo $solicitud["estado"]; ?>
        </p>
        <p>
            <strong data-traducir="fechaCreacion">Fecha de creación:</strong>
            <?php echo $solicitud["fecha_creacion"]; ?>
        </p>
        <br>
        <h3 data-traducir="cambiarEstado">Cambiar estado</h3>
        <form method="POST">
            <label data-traducir="nuevoEstado">Nuevo estado:</label>
            <select name="estado" required>
                <option value="Pendiente" data-traducir="pendiente">Pendiente</option>
                <option value="En proceso" data-traducir="enProceso">En proceso</option>
                <option value="Finalizada" data-traducir="finalizada">Finalizada</option>
            </select>
            <button type="submit" data-traducir="guardarEstado">Guardar estado</button>
        </form>
        <br>
        <a href="solicitudes.php" data-traducir="volverSolicitudes">Volver a solicitudes</a>
    </div>
</main>
<footer>
    <p data-traducir="pieTecnico">© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>
<script src="/Proyecto_final/js/traductor.js"></script>
</body>

</html>
