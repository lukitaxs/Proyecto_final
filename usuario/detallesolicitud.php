<?php

include("../php/conexion.php");

$id_solicitud = $_GET["id"];

$consulta = "SELECT * FROM solicitud
             WHERE id_solicitud = '$id_solicitud'";

$resultado = mysqli_query($conexion, $consulta);

$solicitud = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalle de solicitud - Covasg</title>

    <link rel="stylesheet" href="cssusuario/estilodetallesolicitud.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="usuario.php">Inicio</a>
        <a href="ticket.html">Crear ticket</a>
        <a href="misticket.php">Mis tickets</a>
        <a href="crearsolicitud.html">Crear solicitud</a>
        <a href="missolicitudes.php">Mis solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>

    </nav>

</header>

<main>

    <section class="titulo">

        <div>
            <h2>
                Solicitud #<?php echo $solicitud["id_solicitud"]; ?>
            </h2>

            <p>
                Consulte toda la información de la solicitud realizada.
            </p>
        </div>

        <span class="estado">
            <?php echo $solicitud["estado"]; ?>
        </span>

    </section>

    <section class="detalle">

        <h3>Información de la solicitud</h3>

        <div class="datos">

            <div class="dato">
                <strong>Título</strong>
                <p><?php echo $solicitud["titulo"]; ?></p>
            </div>

            <div class="dato">
                <strong>Tipo de servicio</strong>
                <p><?php echo $solicitud["tipo"]; ?></p>
            </div>

            <div class="dato">
                <strong>Fecha</strong>
                <p><?php echo $solicitud["fecha_creacion"]; ?></p>
            </div>

            <div class="dato">
                <strong>Prioridad</strong>
                <p><?php echo $solicitud["prioridad"]; ?></p>
            </div>

            <div class="dato">
                <strong>Estado</strong>
                <p><?php echo $solicitud["estado"]; ?></p>
            </div>

        </div>

        <div class="descripcion">

            <strong>Descripción</strong>

            <p>
                <?php echo $solicitud["descripcion"]; ?>
            </p>

        </div>

    </section>

    <section class="acciones">

        <a href="missolicitudes.php" class="boton volver">
            Volver a mis solicitudes
        </a>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>