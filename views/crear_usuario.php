<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIO</title>
</head>
<body>
    <div>
        <!-- action envía la información a la ruta por medio del método "POST" -->
        <form action="/crud_users/controller/controller_usuario.php?metodo=enviar_usuarios" method="POST">
            <div>
                <label for="">Nombre:</label>
                <input type="text" name="nombre">
            </div>
            <div>
                <label for="">Apellido:</label>
                <input type="text" name="apellido">
            </div>
            <div>
                <label for="">Cédula:</label>
                <input type="text" name="cedula">
            </div>
            <div>
                <label for="">Teléfono:</label>
                <input type="text" name="telefono">
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>