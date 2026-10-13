<?php

include("../php/conexion.php");

$consulta = "SELECT COUNT(*) AS total FROM usuario";
$resultado = mysqli_query($conexion, $consulta);
$usuarios = mysqli_fetch_array($resultado);

$consulta = "SELECT COUNT(*) AS total FROM tecnico";
$resultado = mysqli_query($conexion, $consulta);
$tecnicos = mysqli_fetch_array($resultado);

$consulta = "SELECT COUNT(*) AS total FROM activo_tecnologico";
$resultado = mysqli_query($conexion, $consulta);
$activos = mysqli_fetch_array($resultado);

$consulta = "SELECT COUNT(*) AS total FROM ticket";
$resultado = mysqli_query($conexion, $consulta);
$tickets = mysqli_fetch_array($resultado);

// Tickets 
$sql = "SELECT estado, COUNT(*) AS total FROM ticket GROUP BY estado";
$resultado = mysqli_query($conexion, $sql);

$estadosTickets = [];
$cantidadesTickets = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $estadosTickets[] = $fila["estado"];
    $cantidadesTickets[] = $fila["total"];
}

// Solicitudes 
$sql = "SELECT estado, COUNT(*) AS total FROM solicitud GROUP BY estado";
$resultado = mysqli_query($conexion, $sql);

$estadosSolicitudes = [];
$cantidadesSolicitudes = [];

while ($fila = mysqli_fetch_assoc($resultado)) {
    $estadosSolicitudes[] = $fila["estado"];
    $cantidadesSolicitudes[] = $fila["total"];
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Informes - Covasg</title>
    <link rel="stylesheet" href="css/estiloinformes.css">
        <link rel="icon" href="../img/CovasgLogo.png" type="image/png">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="administrador.php">Inicio</a>
        <a href="usuarios.html">Usuarios</a>
        <a href="activos/consultaactivos.php">Activos</a>
        <a href="tickets/consultatickets.php">Tickets</a>
        <a href="solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="tecnico/consultatecnicos.php">Técnicos</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <div class="titulo">
        <h2>Informes</h2>
        <p>Resumen general del sistema.</p>
    </div>

    <div class="informes">

        <div class="tarjeta">
            <h3>Usuarios</h3>
            <p><?php echo $usuarios["total"]; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Técnicos</h3>
            <p><?php echo $tecnicos["total"]; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Activos</h3>
            <p><?php echo $activos["total"]; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Tickets</h3>
            <p><?php echo $tickets["total"]; ?></p>
        </div>

    </div>

        <div class="seccion">
            <h2>Tickets por estado</h2>
            <div class="contenedor-grafico">
                <canvas id="graficoTickets"></canvas>
            </div>
        </div>

        <div class="seccion">
            <h2>Solicitudes por estado</h2>
            <div class="contenedor-grafico">
                <canvas id="graficoSolicitudes"></canvas>
            </div>
        </div>

            
        <script>
        // Datos de los tickets
        const estadosTickets = <?php echo json_encode($estadosTickets); ?>;
        const cantidadesTickets = <?php echo json_encode($cantidadesTickets); ?>;

        // Gráfico de tickets
        new Chart(document.getElementById("graficoTickets"), {
            type: "bar",
            data: {
                labels: estadosTickets,
                datasets: [{
                    label: "Cantidad de tickets",
                    data: cantidadesTickets,
                    backgroundColor: "#8b5cf6"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        // Datos de las solicitudes
        const estadosSolicitudes = <?php echo json_encode($estadosSolicitudes); ?>;
        const cantidadesSolicitudes = <?php echo json_encode($cantidadesSolicitudes); ?>;

        // Gráfico de solicitudes
        new Chart(document.getElementById("graficoSolicitudes"), {
            type: "pie",
            data: {
                labels: estadosSolicitudes,
                datasets: [{
                    data: cantidadesSolicitudes,
                    backgroundColor: ["#8b5cf6", "#4b006e", "#c084fc", "#a78bfa"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
        </script>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>

</body>
</html>