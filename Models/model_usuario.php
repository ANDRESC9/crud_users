<?php
/* se referencia la ruta en donde se encuentra el archivo que hace la conexión de PHP con la base de datos
esto se hace mediante la palabra reservada "required" y una función llamada "dirname" que tiene un 
atributo llamado "__DIR__". */
require dirname(__DIR__) . '/database.php';

/* se crea una clase para el modelo de usuario (modelo: representación de la tabla de la 
base de datos en código) */
class Model_usuario{

    // se crea un atributo, este sirve para ser utilizado por todos los métodos
    public $conn;

    // para inicializar una objecto (crear el objeto) se debe hacer mediante un método constructor
    public function __construct(){
        
        /* para llamar un atributo se debe utilizar "$this->" seguido del nombre del parámetro,
        luego se crea un objeto con este atributo utilizando la palabra "new", el nombre de la 
        base de datos y "()" */
        $this->conn = new DB(); 
    }

    /* se crea un método llamada "crear" para enviar la información recolectada de los usuarios a la
    base de datos */
    public function crear(){

        /* se realiza una condición con una variable de PHP llamada "$_SERVER", esta variable es un array,
        esta variable tiene un indice "REQUEST_METHOD" que actúa como clave, la cual se relaciona con
        un valor, en este caso "POST" */
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            
            /* se crean variables relacionadas con las columnas de la base de datos y se igualan a un array
            llamado "$_POST" el cual acceder a la clave */
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $cedula = $_POST["cedula"];
            $telefono = $_POST["telefono"];
            

            /* se crea una variable que se iguala al objeto "conn" que trae el método conectar de la
            clase "BD"*/
            $conector = $this->conn->conectar();

            /* se crea una variable que contiene el código SQL para insertar datos en una tabla, los
            datos que se insertan son las variables creadas anteriormente que contienen el array
            "$_POST"*/
            $query = "INSERT INTO usuario (nombre, apellido, cedula, telefono)
            VALUES ('$nombre', '$apellido', '$cedula', '$telefono')";

            /* se crea una variable llamada "$result" que se iguala a la variable "$conector" y esta
            trae el método "query" y se le asigna el parámetro "$query".
            El método "query" ejecuta la sentencia SQL */
            $result = $conector->query($query);
            
            /* se hace una condicional la cual comprueba si la variable "$result" es verdadera.*/
            if ($result === true) {
               return $result;
           } else {
               echo "Error al agregar los datos: " . $conector->error;
           }
        }
    }   

    /* se crea un método llamada "obtener_usuarios" para obtener la información recolectada de
    la tabla usuario de la base de datos */
    public function obtener_usuarios(){
        
        /* se crea una variable que se iguala al objeto "conn" que trae el método conectar de la
        clase "BD"*/
        $conector = $this->conn->conectar();

        /* se crea una variable llamada "$query" que contiene el código SQL para mostrar los datos de la
         tabla "usuario */
        $query = "SELECT * FROM usuario";

        
        $result = $conector->query($query);

        // se crea una variable llamada "$usuarios" que es un array vació
        $usuarios = [];

        /* se ejecuta una sentencia while que contiene una variable "$fila" que recorre la
        variable "$result" que trae el método "fetch_assoc()" que es utilizado en PHP para obtener una
        fila de resultados de una consulta de base de datos como un array asociativo.
        Esta sentencia cada vez que se recorre agrega una fila a la variable "$usuarios",
        por ultimo se retorna la variable "$usuarios" */
        while ($fila = $result->fetch_assoc()){

            $usuarios[] = $fila;
        }
         
        return $usuarios;

    }

    public function mostrar_un_usuario(){

        if($_SERVER["REQUEST_METHOD"] == 'GET'){

            $usuario_id = $_GET["usuario_id"];

            $conector = $this->conn->conectar();

            $query = "SELECT * FROM usuario WHERE usuario_id = $usuario_id";

            $result = $conector->query($query);

            $usuario = $result->fetch_assoc();

            return $usuario;
        }

        
    }   
    
    public function editar_usuario(){
        if($_SERVER["REQUEST_METHOD"] == 'POST'){

            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $cedula = $_POST["cedula"];
            $telefono = $_POST["telefono"];

            $usuario_id = $_GET["usuario_id"];

            $conector = $this->conn->conectar();
       
            $query = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', cedula = '$cedula', telefono = '$telefono' WHERE usuario_id = $usuario_id";

            $result = $conector->query($query);
        }
    }


    public function eliminar_usuario(){

        if($_SERVER["REQUEST_METHOD"] == 'GET'){

            $usuario_id = $_GET["usuario_id"];

            $conector = $this->conn->conectar();

            $query = "DELETE FROM usuario WHERE usuario_id = $usuario_id";

            $result = $conector->query($query);

        }
    }
}

