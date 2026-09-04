<?php

include("../../php/conexion.php");

$consulta_marcas = "SELECT * FROM Marca";
$resultado_marcas = mysqli_query($conexion, $consulta_marcas);

$consulta_modelos = "SELECT * FROM Modelo";
$resultado_modelos = mysqli_query($conexion, $consulta_modelos);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alta de activo - Covasg</title>

    <link rel="stylesheet" href="../css/altausuario.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div class="icono">
            💻
        </div>

        <div>
            <h2>Alta de activo tecnológico</h2>

            <p>
                Registre un nuevo activo tecnológico en el sistema.
            </p>
        </div>

    </section>

    <?php

    if (isset($_GET["mensaje"])) {

        if ($_GET["mensaje"] == "ok") {
    ?>

        <div class="mensaje correcto">
            Activo registrado correctamente.
        </div>

    <?php
        } elseif ($_GET["mensaje"] == "error") {
    ?>

        <div class="mensaje error">
            No se pudo registrar el activo.
        </div>

    <?php
        }
    }
    ?>

    <section class="formulario-contenedor">

        <h3>Datos del activo</h3>

        <form action="../../php/alta_activos.php" method="POST">

            <div class="campos">

                <div class="campo">

                    <label for="tipo_dispositivo">
                        Tipo de dispositivo
                    </label>

                    <select
                        name="tipo_dispositivo"
                        id="tipo_dispositivo"
                        required
                    >
                        <option value="">
                            Seleccione un tipo
                        </option>

                        <option value="Laptop">
                            Laptop
                        </option>

                        <option value="PC">
                            PC
                        </option>

                        <option value="Monitor">
                            Monitor
                        </option>

                        <option value="Impresora">
                            Impresora
                        </option>

                        <option value="Otro">
                            Otro
                        </option>

                    </select>

                </div>

                <div class="campo">

                    <label for="estado_actual">
                        Estado actual
                    </label>

                    <select
                        name="estado_actual"
                        id="estado_actual"
                        required
                    >

                        <option value="">
                            Seleccione un estado
                        </option>

                        <option value="Disponible">
                            Disponible
                        </option>

                        <option value="En uso">
                            En uso
                        </option>

                        <option value="En reparación">
                            En reparación
                        </option>

                        <option value="Fuera de servicio">
                            Fuera de servicio
                        </option>

                    </select>

                </div>

                <div class="campo">

                    <label for="numero_serie">
                        Número de serie
                    </label>

                    <input
                        type="text"
                        name="numero_serie"
                        id="numero_serie"
                        placeholder="Ej: SN123456"
                    >

                </div>

                <div class="campo">

                    <label for="marca">
                        Marca
                    </label>

                    <select
                        name="marca"
                        id="marca"
                        required
                    >

                        <option value="">
                            Seleccione una marca
                        </option>

                        <?php

                        while ($marca = mysqli_fetch_array($resultado_marcas)) {

                        ?>

                            <option value="<?php echo $marca["nombre_marca"]; ?>">

                                <?php echo $marca["nombre_marca"]; ?>

                            </option>

                        <?php

                        }

                        ?>

                    </select>

                </div>

                <div class="campo">

                    <label for="modelo">
                        Modelo
                    </label>

                    <select
                        name="modelo"
                        id="modelo"
                        required
                    >

                        <option value="">
                            Seleccione un modelo
                        </option>

                        <?php

                        while ($modelo = mysqli_fetch_array($resultado_modelos)) {

                        ?>

                            <option value="<?php echo $modelo["nombre_modelo"]; ?>">

                                <?php echo $modelo["nombre_modelo"]; ?>

                            </option>

                        <?php

                        }

                        ?>

                    </select>

                </div>

                <div class="campo">

                    <label for="codigo_inventario">
                        Código de inventario
                    </label>

                    <input
                        type="text"
                        name="codigo_inventario"
                        id="codigo_inventario"
                        placeholder="Ej: IT-001"
                    >

                </div>

                <div class="campo">

                    <label for="ubicacion_fisica">
                        Ubicación física
                    </label>

                    <input
                        type="text"
                        name="ubicacion_fisica"
                        id="ubicacion_fisica"
                        placeholder="Ej: Oficina 2"
                    >

                </div>

                <div class="campo">

                    <label for="observaciones">
                        Observaciones
                    </label>

                    <input
                        type="text"
                        name="observaciones"
                        id="observaciones"
                        placeholder="Observaciones del activo"
                    >

                </div>

            </div>

            <div class="informacion-rol">

                <strong>Información:</strong>

                <p>
                    Complete los datos correspondientes al nuevo
                    activo tecnológico.
                </p>

            </div>

            <div class="botones">

                <a
                    href="consultaactivos.php"
                    class="boton cancelar"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="boton guardar"
                >
                    Registrar activo
                </button>

            </div>

        </form>

    </section>

</main>

<footer>

    <p>
        © 2026 Covasg - Sistema de soporte informático.
    </p>

</footer>

</body>
</html>