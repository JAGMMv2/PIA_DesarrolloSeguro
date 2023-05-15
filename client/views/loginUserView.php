<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login FNG</title>
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/normalize.css">
    <link rel="stylesheet" href="<?php echo RUTA;?>resource/css/login.css">
</head>
<body class="centar-contendio bg-color">
    <div class="contenedor" id="contenedor">

        <div class="contenedor__imagen"></div>

        <form class="contenedor__formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="login">
            <div class="bienvenida">
                <h1 class="no-margin">Bienvenido de nuevo</h1>
                <p class="no-margin">Inica sesión con tu cuenta</p>
            </div>
            <div class="usuario">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario">
            </div>
            <div class="contraseña">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
            </div>
            <?php if (!empty($errores)) : ?>
                <div class="error-box">
                    <p class="no-margin">Datos incorrectos, intentalo de nuevo</p>
                </div>
            <?php endif; ?>
            <input type="button" value="Iniciar Sesion" class="boton-login" onclick="login.submit()" id="btn_enviar">
        </form>
    </div>
</body>
</html>