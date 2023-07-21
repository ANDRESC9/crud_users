<table>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cédula</th>
        <th>Teléfono</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario["nombre"]; ?></td>
            <td><?php echo $usuario["apellido"]; ?></td>
            <td><?php echo $usuario["cedula"]; ?></td>
            <td><?php echo $usuario["telefono"]; ?></td>
            <td><a href="/crud_users/Controller/controller_usuario.php?metodo=mostrar_un_usuario&usuario_id=<?php echo $usuario["usuario_id"] ?>">Editar</a></td>
            <td><a href="/crud_users/Controller/controller_usuario.php?metodo=eliminar_usuario&usuario_id=<?php echo $usuario["usuario_id"] ?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
</table>

