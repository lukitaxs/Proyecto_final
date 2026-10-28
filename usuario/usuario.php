<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_rol"] != 1) {

    header("Location: ../login/login.php");
    exit();

}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de usuario - Covasg</title>
    <link rel="stylesheet" href="../usuario/cssusuario/usuario.css">
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

        <section class="bienvenida">

            <h2>Bienvenido</h2>

            <p>
                Desde este panel puede informar un problema, realizar una solicitud
                o consultar el estado de sus tickets.
            </p>

        </section>

        <section class="opciones">

            <a href="ticket.php" class="tarjeta">

                <div class="icono">🎫</div>

                <h3>Crear ticket</h3>

                <p>
                    Informe un problema con un equipo, programa o servicio.
                </p>

                <span>Crear ticket</span>

            </a>

            <a href="misticket.php" class="tarjeta">

                <div class="icono">📋</div>

                <h3>Mis tickets</h3>

                <p>
                    Consulte sus problemas registrados y vea su estado.
                </p>

                <span>Ver tickets</span>

            </a>

            <a href="crearsolicitud.html" class="tarjeta">

                <div class="icono">📨</div>

                <h3>Nueva solicitud</h3>

                <p>
                    Solicite una instalación, configuración o ayuda técnica.
                </p>

                <span>Crear solicitud</span>

            </a>

        </section>

        <section class="resumen">

            <h2>Resumen de tickets</h2>

            <div class="estados">

                <div class="estado">
                    <strong>2</strong>
                    <p>Pendientes</p>
                </div>

                <div class="estado">
                    <strong>1</strong>
                    <p>En proceso</p>
                </div>

                <div class="estado">
                    <strong>4</strong>
                    <p>Resueltos</p>
                </div>

            </div>

            <p class="aviso">
                Estos números son de ejemplo. Más adelante se cargarán desde la base
                de datos.
            </p>

        </section>

    </main>

    <footer>
        <p>© 2026 Covasg - Sistema de soporte informático.</p>
    </footer>

</body>

</html>