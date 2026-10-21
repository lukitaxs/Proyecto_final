<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || !isset($_SESSION["id_rol"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../../login/login.php");
    exit();
}

include("../../php/conexion.php");

$consulta = "SELECT ticket.*, usuario.nombre 
             FROM ticket 
             INNER JOIN usuario 
             ON ticket.id_usuario = usuario.id_usuario"; 

$resultado = mysqli_query($conexion, $consulta); 
 
?> 
 
<!DOCTYPE html> 
<html lang="es"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
    <title>Consulta de tickets - Covasg</title> 
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
 
        <div class="icono"> 
            🎫 
        </div> 
 
        <div> 
            <h2>Consulta de tickets</h2> 
 
            <p> 
                Tickets registrados en el sistema. 
            </p> 
        </div> 
 
    </section> 
 
    <section class="tabla-contenedor"> 
 
        <table> 
 
            <thead> 
 
                <tr> 
                    <th>ID</th> 
                    <th>Usuario</th> 
                    <th>Título</th> 
                    <th>Descripción</th> 
                    <th>Prioridad</th> 
                    <th>Estado</th> 
                    <th>Fecha creación</th> 
                    <th>Fecha cierre</th>
                    <th>Acción</th>
                </tr> 
 
            </thead> 
 
            <tbody> 
 
                <?php 
 
                while ($ticket = mysqli_fetch_array($resultado)) { 
 
                ?> 
 
                    <tr> 
 
                        <td> 
                            <?php echo $ticket["id_ticket"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["nombre"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["titulo"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["descripcion"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["prioridad"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["estado"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["fecha_creacion"]; ?> 
                        </td> 
 
                        <td> 
                            <?php echo $ticket["fecha_clierre"]; ?> 
                        </td>

                        <td>
                            <a href="detallestickets.php?id=<?php echo $ticket["id_ticket"]; ?>">
                                Ver
                            </a>
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