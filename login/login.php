<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - Covasg</title>

    <link rel="stylesheet" href="../css/estilologin.css">
    <link rel="icon" href="../img/CovasgLogo.png" type="image/png">

</head>

<body>

    <div class="login-container">

        <form class="login-box" action="../php/login.php" method="POST">

            <h1>Covasg</h1>

            <h2>Iniciar sesión</h2>

            <?php

            if (isset($_GET["error"])) {

                if ($_GET["error"] == "contrasenia") {

                    echo "<p class='error'>Contraseña incorrecta</p>";

                }

                if ($_GET["error"] == "usuario") {

                    echo "<p class='error'>Usuario no encontrado</p>";

                }

            }

            ?>

            <div class="input-group">

                <label for="email">Correo electrónico</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingrese su correo"
                    required>

            </div>

            <div class="input-group">

                <label for="password">Contraseña</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingrese su contraseña"
                    required>

            </div>

            <button type="submit">Entrar</button>

            <p class="info">
                Si tiene problemas para ingresar,
                comuníquese con el administrador.
            </p>

            <p class="volver">

                <a href="../html/covasgstudio.html">
                    ← Volver al sitio
                </a>

            </p>

        </form>

    </div>

</body>

</html>