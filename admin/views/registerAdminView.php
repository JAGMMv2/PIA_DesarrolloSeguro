<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login FNG</title>
    <link rel="preload" href="<?php echo RUTA;?>resource/css/normalize.css" as="style">
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/normalize.css">
    <link rel="preload" href="<?php echo RUTA;?>resource/css/login.css" as="style">
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/login.css">
</head>
<body class="centar-contendio bg-color">
    <div class="contenedor" id="contenedor">

        <div class="contenedor__imagen"></div>

        <form class="contenedor__formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="login">
            <div class="bienvenida">
                <h1 class="no-margin">Registar nuevo usuario</h1>
                <p class="no-margin">Cree una cuenta para los nuevos usuarios</p>
            </div>
            <div class="usuario">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario">
            </div>
            <div class="contraseña">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
            </div>
            <div class="contraseña">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Confirmar contraseña">
            </div>
            <div class="input-check">
                <input type="checkbox" name="checkbox-admin" id="checkbox-admin">
                <label for="checkbox-admin">Administrador</label>
            </div>

            <?php if (!empty($errores)) : ?>
                <div class="error-box">
                    <p class="no-margin"><?php echo $errores; ?></p>
                </div>
            <?php else : ?>
                <div class="error-box error-box--hide">
                    <p class="no-margin"><?php echo $errores; ?></p>
                </div>
            <?php endif; ?>

            <?php if ($confirmacion) : ?>
                <div class="mensaje-confirmacion">
                    <p class="no-margin">Usuario registrado con exito!</p>
                </div>
            <?php else : ?>
                <div class="mensaje-confirmacion mensaje-confirmacion--hide">
                    <p class="no-margin">Usuario registrado con exito!</p>
                </div>
            <?php endif; ?>


            <input type="button" value="Registrar" class="boton-login" onclick="login.submit()" id="btn_enviar">

            <div class="boton-cerrarSesion">
                <a href="../php/cerrarSesionAdmin.php">Cerrar Sesion</a>
            </div>

        </form>
    </div>
</body>
</html>