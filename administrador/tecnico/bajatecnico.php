<?php

include("../../php/conexion.php");

$id_tecnico = $_GET["id"];

$consulta = "SELECT tecnico.*, usuario.nombre
             FROM tecnico
             INNER JOIN usuario
             ON tecnico.id_usuario = usuario.id_usuario
             WHERE tecnico.id_tecnico = '$id_tecnico'";

$resultado = mysqli_query($conexion, $consulta);

$tecnico = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Baja de técnico - Covasg</title>

    <link rel="stylesheet" href="../css/estilotecnicos.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="consultatecnicos.php">Técnicos</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div>
            <h2>Eliminar técnico</h2>
            <p>Confirmar la baja del técnico.</p>
        </div>

    </section>

    <section class="formulario-contenedor">

        <h3>¿Desea eliminar este técnico?</h3>

        <p>
            <strong>Usuario:</strong>
            <?php echo $tecnico["nombre"]; ?>
        </p>

        <p>
            <strong>Rol:</strong>
            <?php echo $tecnico["rol"]; ?>
        </p>

        <p>
            <strong>Área:</strong>
            <?php echo $tecnico["area"]; ?>
        </p>

        <p>
            <strong>Especialidad:</strong>
            <?php echo $tecnico["especialidad"]; ?>
        </p>

        <form action="../../php/baja_tecnico.php" method="POST">

            <input
                type="hidden"
                name="id_tecnico"
                value="<?php echo $tecnico["id_tecnico"]; ?>"
            >

            <div class="botones">

                <button type="submit" class="boton guardar">
                    Eliminar técnico
                </button>

                <a href="consultatecnicos.php" class="boton cancelar">
                    Cancelar
                </a>

            </div>

        </form>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>