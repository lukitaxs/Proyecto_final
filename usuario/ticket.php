<?php

include("../php/conexion.php");

$consulta = "SELECT id_activo, tipo_dispositivo, codigo_inventario, ubicacion_fisica FROM activo_tecnologico";
$resultado = mysqli_query($conexion, $consulta);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear ticket - Covasg</title>
    <link rel="stylesheet" href="../usuario/cssusuario/estiloticket.css">
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

            <h2>Crear ticket</h2>

            <p>
                Complete el formulario para informar un problema.
            </p>

        </section>

        <section class="formulario-contenedor">

            <form action="../php/crear_ticket.php" method="POST" enctype="multipart/form-data">

                <div class="grupo">

                    <label for="titulo">Título del problema</label>

                    <input
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Ejemplo: La computadora no enciende"
                        required
                    >

                </div>

                <div class="grupo">

                    <label for="equipo">Equipo relacionado</label>

                    <select id="equipo" name="id_activo" required>

                        <option value="">Seleccione un equipo</option>

                        <?php
                        while ($activo = mysqli_fetch_assoc($resultado)) {
                        ?>

                            <option value="<?php echo $activo['id_activo']; ?>">
                                <?php echo $activo['tipo_dispositivo'] . " - " . $activo['codigo_inventario'] . " - " . $activo['ubicacion_fisica']; ?>
                            </option>

                        <?php
                        }
                        ?>

                    </select>

                </div>

                <div class="grupo">

                    <label for="prioridad">Prioridad</label>

                    <select id="prioridad" name="prioridad" required>

                        <option value="">Seleccione una opción</option>
                        <option value="baja">Baja</option>
                        <option value="media">Media</option>
                        <option value="alta">Alta</option>

                    </select>

                </div>

                <div class="grupo">

                    <label for="descripcion">Descripción del problema</label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Explique de forma simple qué problema tiene."
                        required
                    ></textarea>

                </div>

                <div class="grupo">

                    <label for="archivo">Agregar una imagen</label>

                    <input
                        type="file"
                        id="archivo"
                        name="archivo"
                        accept="image/*"
                    >

                    <small>
                        Este campo es opcional.
                    </small>

                </div>

                <div class="botones">

                    <a href="usuario.html" class="boton cancelar">Cancelar</a>

                    <button type="submit" class="boton enviar">
                        Enviar ticket
                    </button>

                </div>

            </form>

        </section>

    </main>

    <footer>
        <p>© 2026 Covasg - Sistema de soporte informático.</p>
    </footer>

</body>

</html>