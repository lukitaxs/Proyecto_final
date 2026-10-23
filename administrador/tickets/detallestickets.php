
<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../../login/login.php");
    exit();
}

include("../../php/conexion.php");

$id_ticket = $_GET["id"];

/* Cambiar estado */
if (isset($_POST["estado"])) {

    $estado = $_POST["estado"];

    if ($estado == "Cerrado") {

        $consulta = "UPDATE ticket
                     SET estado = '$estado',
                         fecha_clierre = NOW()
                     WHERE id_ticket = '$id_ticket'";

    } else {

        $consulta = "UPDATE ticket
                     SET estado = '$estado',
                         fecha_clierre = NULL
                     WHERE id_ticket = '$id_ticket'";
    }

    mysqli_query($conexion, $consulta);

    header("Location: detallestickets.php?id=$id_ticket");
    exit();
}

/* Asignar técnico */
if (isset($_POST["id_tecnico"])) {

    $id_tecnico = $_POST["id_tecnico"];

    $consulta = "UPDATE historial_asignacion
                 SET fecha_fin = NOW()
                 WHERE id_ticket = '$id_ticket'
                 AND fecha_fin IS NULL";

    mysqli_query($conexion, $consulta);

    $consulta = "INSERT INTO historial_asignacion
                 (id_ticket, id_tecnico, fecha_inicio, fecha_fin)
                 VALUES
                 ('$id_ticket', '$id_tecnico', NOW(), NULL)";

    mysqli_query($conexion, $consulta);

    header("Location: detallestickets.php?id=$id_ticket");
    exit();
}

/* Buscar ticket */
$consulta = "SELECT ticket.*, usuario.nombre
             FROM ticket
             INNER JOIN usuario
             ON ticket.id_usuario = usuario.id_usuario
             WHERE ticket.id_ticket = '$id_ticket'";

$resultado = mysqli_query($conexion, $consulta);
$ticket = mysqli_fetch_array($resultado);

/* Buscar técnicos */
$consulta = "SELECT tecnico.id_tecnico, usuario.nombre
             FROM tecnico
             INNER JOIN usuario
             ON tecnico.id_usuario = usuario.id_usuario";

$resultado_tecnicos = mysqli_query($conexion, $consulta);

/* Buscar técnico asignado */
$consulta = "SELECT usuario.nombre
             FROM historial_asignacion
             INNER JOIN tecnico
             ON historial_asignacion.id_tecnico = tecnico.id_tecnico
             INNER JOIN usuario
             ON tecnico.id_usuario = usuario.id_usuario
             WHERE historial_asignacion.id_ticket = '$id_ticket'
             AND historial_asignacion.fecha_fin IS NULL";

$resultado_actual = mysqli_query($conexion, $consulta);
$actual = mysqli_fetch_array($resultado_actual);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalle del ticket - Covasg</title>

    <link rel="stylesheet" href="../css/consultausuarios.css">
    <link rel="icon" href="../img/CovasgLogo.png" type="image/png">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div class="icono">🎫</div>

        <div>
            <h2>Detalle del ticket</h2>
            <p>Información del ticket seleccionado.</p>
        </div>

    </section>

    <section class="tabla-contenedor">
        <h3>Ticket #<?php echo $ticket["id_ticket"]; ?></h3>
        <p><strong>Usuario:</strong> <?php echo $ticket["nombre"]; ?></p>
        <p><strong>Título:</strong> <?php echo $ticket["titulo"]; ?></p>
        <p><strong>Descripción:</strong> <?php echo $ticket["descripcion"]; ?></p>
        <p><strong>Prioridad:</strong> <?php echo $ticket["prioridad"]; ?></p>
        <p><strong>Estado:</strong> <?php echo $ticket["estado"]; ?></p>
        <p><strong>Fecha de creación:</strong> <?php echo $ticket["fecha_creacion"]; ?></p>
        <p><strong>Fecha de cierre:</strong> <?php echo $ticket["fecha_clierre"]; ?></p>
        <br>

        <h3>Cambiar estado</h3>

        <form method="POST">

            <label>Nuevo estado:</label>

            <select name="estado" required>
                <option value="Abierto">Abierto</option>
                <option value="En proceso">En proceso</option>
                <option value="Cerrado">Cerrado</option>
            </select>

            <button type="submit">Guardar estado</button>

        </form>

        <br>

        <h3>Asignar técnico</h3>

        <p>
            <strong>Técnico actual:</strong>

            <?php
            if ($actual) {
                echo $actual["nombre"];
            } else {
                echo "Sin técnico asignado";
            }
            ?>
        </p>

        <form method="POST">

            <label>Seleccionar técnico:</label>

            <select name="id_tecnico" required>

                <option value="">Elegir técnico</option>

                <?php while ($tecnico = mysqli_fetch_array($resultado_tecnicos)) { ?>

                    <option value="<?php echo $tecnico["id_tecnico"]; ?>">
                        <?php echo $tecnico["nombre"]; ?>
                    </option>

                <?php } ?>

            </select>

            <button type="submit">Guardar asignación</button>

        </form>

        <br>

        <a href="consultatickets.php">Volver a tickets</a>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>
