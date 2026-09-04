<?php

include("../php/conexion.php");

$consultaRoles = "SELECT * FROM rol";
$resultadoRoles = mysqli_query($conexion, $consultaRoles);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Alta de usuario - Covasg</title>

    <link rel="stylesheet" href="css/altausuario.css">
        <link rel="icon" href="../img/CovasgLogo.png" type="image/png">

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
            <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
        </nav>

    </header>

    <main>

        <section class="titulo">

            <div class="icono">
                ➕
            </div>

            <div>

                <h2>Alta de usuario</h2>

                <p>
                    Complete el formulario para registrar un nuevo
                    usuario en el sistema.
                </p>

            </div>

        </section>

        <?php

        if (isset($_GET["mensaje"])) {

            if ($_GET["mensaje"] == "ok") {

        ?>

                <div class="mensaje correcto">
                    Usuario agregado correctamente.
                </div>

        <?php

            } elseif ($_GET["mensaje"] == "error") {

        ?>

                <div class="mensaje error">
                    No se pudo agregar el usuario.
                </div>

        <?php

            } elseif ($_GET["mensaje"] == "vacio") {

        ?>

                <div class="mensaje error">
                    Debe completar todos los campos.
                </div>

        <?php

            }

        }

        ?>

        <section class="formulario-contenedor">

            <h3>Información del usuario</h3>

            <form action="../php/alta_usuario.php" method="POST">

                <div class="campos">

                    <div class="campo">

                        <label for="nombre">
                            Nombre completo
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Ingrese el nombre completo"
                            required
                        >

                    </div>

                    <div class="campo">

                        <label for="correo">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            id="correo"
                            name="correo"
                            placeholder="ejemplo@correo.com"
                            required
                        >

                    </div>

                    <div class="campo">

                        <label for="contrasenia">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            id="contrasenia"
                            name="contrasenia"
                            placeholder="Ingrese una contraseña"
                            required
                        >

                    </div>

                    <div class="campo">

                        <label for="id_rol">
                            Rol del usuario
                        </label>

                        <select
                            id="id_rol"
                            name="id_rol"
                            required
                        >

                            <option value="">
                                Seleccione un rol
                            </option>

                            <?php

                            while (
                                $rol = mysqli_fetch_array($resultadoRoles)
                            ) {

                            ?>

                                <option
                                    value="<?php echo $rol["id_rol"]; ?>"
                                >
                                    <?php echo $rol["nombre"]; ?>
                                </option>

                            <?php

                            }

                            ?>

                        </select>

                    </div>

                </div>

                <div class="informacion-rol">

                    <strong>Importante:</strong>

                    <p>
                        El rol determina las funciones a las que
                        tendrá acceso el usuario.
                    </p>

                </div>

                <div class="botones">

                    <a
                        href="usuarios.html"
                        class="boton cancelar"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="boton guardar"
                    >
                        Guardar usuario
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