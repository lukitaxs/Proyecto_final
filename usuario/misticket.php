<?php

include("../php/conexion.php");

session_start();

$id_usuario = $_SESSION["id_usuario"];

$consulta = "SELECT * FROM ticket WHERE id_usuario = '$id_usuario' ORDER BY id_ticket DESC";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis tickets - Covasg</title>
    <link rel="stylesheet" href="cssusuario/estilomisticket.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="usuario.html">Inicio</a>
        <a href="ticket.html">Crear ticket</a>
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
        <a href="detalleticket.php?id=<?php 
                echo $ticket["id_ticket"]; ?>">Ver</a>    </td>

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