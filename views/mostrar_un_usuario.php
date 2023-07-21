<div>
        <!-- action envía la información a la ruta por medio del método "POST" -->
        <form action="/crud_users/Controller/controller_usuario.php?metodo=editar_usuario&usuario_id=<?php echo $usuario["usuario_id"] ?>" method="POST">
            <div>
                <label for="">Usuario ID:</label>
                <div>
                    <?php echo $usuario["usuario_id"]; ?>
                </div>

            <div>
                <label for="">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $usuario["nombre"];?>">
            </div>
            <div>
                <label for="">Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $usuario["apellido"];?>">
            </div>
            <div>
                <label for="">Cédula:</label>
                <input type="text" name="cedula" value="<?php echo $usuario["cedula"];?>">
            </div>
            <div>
                <label for="">Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo $usuario["telefono"];?>">
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>


