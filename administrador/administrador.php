<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../login/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel de administrador - Covasg</title>

<link rel="stylesheet" href="/Proyecto_final/administrador/css/estiloadministrador.css?v=2">
    <link rel="icon" href="../img/CovasgLogo.png" type="image/png">
</head>

<body>

    <header>

        <h1>Covasg</h1>

        <nav>
            <a href="administrador.php" data-traducir="inicio">Inicio</a>
            <a href="usuarios.html" data-traducir="usuarios">Usuarios</a>
            <a href="activos/consultaactivos.php" data-traducir="activos">Activos</a>
            <a href="tickets/consultatickets.php" data-traducir="tickets">Tickets</a>
            <a href="solicitudes/consultasolicitudes.php" data-traducir="solicitudes">Solicitudes</a>
            <a href="../php/cerrarsesion.php" class="cerrar-sesion" data-traducir="cerrarSesion">Cerrar sesión</a>

            <select onchange="cambiarIdioma(this.value)">
                <option value="es">Español</option>
                <option value="en">English</option>
            </select>
        </nav>

    </header>

    <main>

        <section class="bienvenida">

            <h2 data-traducir="panelAdministrador">Panel de administrador</h2>

            <p data-traducir="descripcionPanel">
                Desde este panel puede administrar los usuarios, activos,
                tickets y solicitudes del sistema.
            </p>

        </section>

        <section class="opciones">

            <a href="activos/altaactivos.php" class="tarjeta">

                <div class="icono">➕</div>

                <h3 data-traducir="registrarActivo">Registrar activo</h3>

                <p data-traducir="descripcionRegistrarActivo">
                    Registre un nuevo activo tecnológico en el sistema.
                </p>

                <span data-traducir="agregarActivo">Agregar activo</span>

            </a>

            <a href="usuarios.html" class="tarjeta">

                <div class="icono">👥</div>

                <h3 data-traducir="gestionUsuarios">Gestión de usuarios</h3>

                <p data-traducir="descripcionUsuarios">
                    Registre, consulte y elimine usuarios del sistema.
                </p>

                <span data-traducir="administrarUsuarios">Administrar usuarios</span>

            </a>

            <a href="activos/consultaactivos.php" class="tarjeta">

                <div class="icono">💻</div>

                <h3 data-traducir="gestionActivos">Gestión de activos</h3>

                <p data-traducir="descripcionActivos">
                    Administre computadoras, impresoras y otros equipos.
                </p>

                <span data-traducir="administrarActivos">Administrar activos</span>

            </a>

            <a href="tickets/consultatickets.php" class="tarjeta">

                <div class="icono">🎫</div>

                <h3 data-traducir="todosTickets">Todos los tickets</h3>

                <p data-traducir="descripcionTickets">
                    Consulte los problemas registrados por los usuarios.
                </p>

                <span data-traducir="verTickets">Ver tickets</span>

            </a>

            <a href="solicitudes/consultasolicitudes.php" class="tarjeta">

                <div class="icono">📨</div>

                <h3 data-traducir="solicitudes">Solicitudes</h3>

                <p data-traducir="descripcionSolicitudes">
                    Consulte las solicitudes de servicio realizadas.
                </p>

                <span data-traducir="verSolicitudes">Ver solicitudes</span>

            </a>

            <a href="tecnico/consultatecnicos.php" class="tarjeta">

                <div class="icono">🛠️</div>

                <h3 data-traducir="tecnicos">Técnicos</h3>

                <p data-traducir="descripcionTecnicos">
                    Consulte los técnicos, sus áreas y tickets asignados.
                </p>

                <span data-traducir="administrarTecnicos">Administrar técnicos</span>

            </a>

            <a href="informes.php" class="tarjeta">

                <div class="icono">📊</div>

                <h3 data-traducir="informes">Informes</h3>

                <p data-traducir="descripcionInformes">
                    Consulte estadísticas generales para tomar decisiones.
                </p>

                <span data-traducir="verInformes">Ver informes</span>

            </a>

        </section>

        <section class="resumen">

            <h2 data-traducir="resumenGeneral">Resumen general</h2>

            <div class="estados">

                <div class="estado">
                    <strong>12</strong>
                    <p data-traducir="usuariosRegistrados">Usuarios registrados</p>
                </div>

                <div class="estado">
                    <strong>8</strong>
                    <p data-traducir="activosTecnologicos">Activos tecnológicos</p>
                </div>

                <div class="estado">
                    <strong>3</strong>
                    <p data-traducir="ticketsPendientes">Tickets pendientes</p>
                </div>

                <div class="estado">
                    <strong>2</strong>
                    <p data-traducir="solicitudesPendientes">Solicitudes pendientes</p>
                </div>

            </div>

        </section>

    </main>

    <footer>
        <p data-traducir="piePagina">© 2026 Covasg - Sistema de soporte informático.</p>
    </footer>

    <script src="/Proyecto_final/js/traductor.js"></script>

</body>

</html>
