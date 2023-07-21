<?php
// se crea una clase, en este caso llamada "DB" para realizar la conexión de PHP con el servidor 
class DB{
    // se crea un método la clase, en este caso llamado "conectar" para realizar la conexión de PHP
    // con el
    public function conectar(){
        // se crea una variable llamada "$conexion" en donde se le asigna una función de una clase
        // llamada "mysqli", función tiene los atributos de dirección del servidor, nombre de usuario,
        // contraseña y nombre del servidor
        $conexion = mysqli_connect('localhost', 'root', '', 'crud');
        
        // se crea una condicional en donde se verifica si la conexión tiene un error
        // se comprueba llamando el atributo""connect_errno" desde la variable de función "$conexion" 
        if ($conexion->connect_errno){
            echo "Error de conexión";
        }
        // se hace el retorno de la variable de función
        return $conexion;
    }
}
?>    