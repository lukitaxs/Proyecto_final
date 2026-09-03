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

    <link rel="stylesheet" href="../administrador/css/estiloadministrador.css">
    <link rel="icon" href="../img/CovasgLogo.png" type="image/png">
</head>

<body>

    <header>

        <h1>Covasg</h1>

        <nav>
            <a href="administrador.html">Inicio</a>
            <a href="usuarios.html">Usuarios</a>
            <a href="activos/consultaactivos.php">Activos</a>
            <a href="tickets/consultatickets.php">Tickets</a>
            <a href="solicitudes/consultasolicitudes.php">Solicitudes</a>
            <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
        </nav>

    </header>

    <main>

        <section class="bienvenida">

            <h2>Panel de administrador</h2>

            <p>
                Desde este panel puede administrar los usuarios, activos,
                tickets y solicitudes del sistema.
            </p>

        </section>

        <section class="opciones">

            <a href="usuarios.html" class="tarjeta">

                <div class="icono">👥</div>

                <h3>Gestión de usuarios</h3>

                <p>
                    Registre, consulte y elimine usuarios del sistema.
                </p>

                <span>Administrar usuarios</span>

            </a>
                <a href="activos/consultaactivos.php" class="tarjeta">

                    <div class="icono">💻</div>

                    <h3>Gestión de activos</h3>

                    <p>
                        Administre computadoras, impresoras y otros equipos.
                    </p>

                    <span>Administrar activos</span>

                </a>

                        <a href="tickets/consultatickets.php" class="tarjeta">

                    <div class="icono">🎫</div>

                    <h3>Todos los tickets</h3>

                    <p>
                        Consulte los problemas registrados por los usuarios.
                    </p>

                    <span>Ver tickets</span>

                </a>

            <a href="solicitudes/consultasolicitudes.php" class="tarjeta">

                <div class="icono">📨</div>

                <h3>Solicitudes</h3>

                <p>
                    Consulte las solicitudes de servicio realizadas.
                </p>

                <span>Ver solicitudes</span>

            </a>

            <a href="tecnico/consultatecnicos.php" class="tarjeta">

                <div class="icono">🛠️</div>

                <h3>Técnicos</h3>

                <p>
                    Consulte los técnicos, sus áreas y tickets asignados.
                </p>

                <span>Administrar técnicos</span>

            </a>

            <a href="informes.php" class="tarjeta">

                <div class="icono">📊</div>

                <h3>Informes</h3>

                <p>
                    Consulte estadísticas generales para tomar decisiones.
                </p>

                <span>Ver informes</span>

            </a>

        </section>

        <section class="resumen">

            <h2>Resumen general</h2>

            <div class="estados">

                <div class="estado">
                    <strong>12</strong>
                    <p>Usuarios registrados</p>
                </div>

                <div class="estado">
                    <strong>8</strong>
                    <p>Activos tecnológicos</p>
                </div>

                <div class="estado">
                    <strong>3</strong>
                    <p>Tickets pendientes</p>
                </div>

                <div class="estado">
                    <strong>2</strong>
                    <p>Solicitudes pendientes</p>
                </div>

            </div>

            <p class="aviso">
                Los números son de ejemplo. Más adelante se cargarán
                automáticamente desde la base de datos.
            </p>

        </section>

    </main>

    <footer>
        <p>© 2026 Covasg - Sistema de soporte informático.</p>
    </footer>

</body>

</html>