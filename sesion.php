<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cuenta</title>
        <link rel="stylesheet" type="text/css" href="sesion.css">
    </head>
    <body>
        <form id="form1" action="ingresar.php" method="post" enctype="multipart/form-data">
                <p>Iniciar sesión.</p>
                <label for="nombre">Nombre:</label>
                <input id="nombre" type="text" name="nombre" required />
                <label for="contraseña">Contraseña:</label>
                <input id="contraseña" type="text" name="contraseña" required>
                <input type="submit" value="Enviar" />
        </form>

        <form id="form2" action="registrar.php" method="post" enctype="multipart/form-data">
                <p>Registrate aquí.</p>
                <label for="nombre">Nombre:</label>
                <input id="nombre" type="text" name="nombre" required />
                <label for="contraseña">Contraseña:</label>
                <input id="contraseña" type="text" name="contraseña" required>
                <input type="submit" value="Enviar" />
        </form>
    </body>
</html>