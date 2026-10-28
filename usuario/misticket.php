<?php

session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../login/login.php");
    exit;
}

include("../php/conexion.php");

$id_usuario = $_SESSION["id_usuario"];

$consulta = "SELECT ticket.*, activo_tecnologico.tipo_dispositivo, activo_tecnologico.codigo_inventario
FROM ticket
LEFT JOIN activo_tecnologico ON ticket.id_activo = activo_tecnologico.id_activo
WHERE ticket.id_usuario = '$id_usuario'
ORDER BY ticket.id_ticket DESC";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis tickets - Covasg</title>
    <link rel="stylesheet" href="cssusuario/estilomisticket.css">
    <link rel="icon" href="../img/CovasgLogo.png" type="image/png">

</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="usuario.php">Inicio</a>
        <a href="ticket.php">Crear ticket</a>
        <a href="misticket.php">Mis tickets</a>
        <a href="crearsolicitud.html">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

<section class="titulo">

    <h2>Mis tickets</h2>

    <p>
        Aquí puede consultar todos los tickets registrados.
    </p>

</section>

<section class="tabla">

<table>

<thead>

<tr>
    <th>ID</th>
    <th>Problema</th>
    <th>Equipo relacionado</th>
    <th>Fecha</th>
    <th>Estado</th>
    <th>Acción</th>
</tr>

</thead>

<tbody>

<?php

while ($ticket = mysqli_fetch_assoc($resultado)) {

?>

<tr>

    <td>
        #<?php echo $ticket["id_ticket"]; ?>
    </td>

    <td>
        <?php echo $ticket["titulo"]; ?>
    </td>

    <td>
        <?php

        if ($ticket["tipo_dispositivo"] != NULL) {
            echo $ticket["tipo_dispositivo"] . " - " . $ticket["codigo_inventario"];
        } else {
            echo "Sin equipo relacionado";
        }

        ?>
    </td>

    <td>
        <?php echo $ticket["fecha_creacion"]; ?>
    </td>

    <td>

        <?php

        if ($ticket["estado"] == "Pendiente") {
            echo '<span class="pendiente">Pendiente</span>';
        }

        if ($ticket["estado"] == "En proceso") {
            echo '<span class="proceso">En proceso</span>';
        }

        if ($ticket["estado"] == "Resuelto") {
            echo '<span class="resuelto">Resuelto</span>';
        }

        ?>

    </td>

    <td>
        <a href="detalleticket.php?id=<?php echo $ticket["id_ticket"]; ?>">Ver</a>
    </td>

</tr>

<?php

}

?>

</tbody>

</table>

</section>

</main>

<footer>

    <p>© 2026 Covasg - Sistema de soporte informático.</p>

</footer>

</body>

</html>