<?php
require dirname(__DIR__) . '/Models/model_usuario.php';

// el controlado se encarga de establecer una conexión entre los modelos y las vistas
class Usuario_controller{
    
    public $modelo_usuario;

    public function __construct(){
        
        $this->modelo_usuario = new Model_usuario();

    }

    // se crea una método que accede a la vista de crear usuarios
    public function crear_usuarios_view(){

        require dirname(__DIR__) . '/Views/crear_usuario.php';

    }

    /* se crea una método llamado "enviar_usuarios" que tiene una variable llamada "$validar" a la que
    se le asigna un objeto llamado "modelo_usuario" que accede al método "crear" de la clase 
    "Model_usuario" del modelos, para enviar los datos capturados en el formulario de la vista 
    "crear_usuarios.php" a la base de datos. La variable llamada "$validar" también comprueba
    dentro de un if si el método "crear" ejecuta correctamente. Si el método se ejecuta correctamente
    se vuelve a retornar a la vista de crear usuarios. */
    public function enviar_usuarios(){ 

        $validar = $this->modelo_usuario->crear();

        if($validar === true){

            // función que retorna a una url
            $targetUrl = "http://localhost/crud_users/Controller/controller_usuario.php?metodo=crear_usuarios_view";
            header("Location: " . $targetUrl);


        }else{

            echo "error al crear usuario";
        }

    }

    /* se crea un método llamado "obtener_usuarios" que tiene una variable llamada "$usuarios" a la
    que se le asigna un objeto llamado "modelo_usuario" que trae el método obtener usuarios de la 
    clase "Model_usuario" del modelos. Este método se encarga de mostrar en la vista 
    "obtener_usuario.php" la lista de usuarios creados. */
    public function obtener_usuarios(){
        
        $usuarios = $this->modelo_usuario->obtener_usuarios();

        // muestra la vista "obtener_usuario.php"
        require dirname(__DIR__) . '/Views/obtener_usuario.php';

    }

    public function mostrar_un_usuario(){

        $usuario = $this->modelo_usuario->mostrar_un_usuario();

        require dirname(__DIR__) . '/Views/mostrar_un_usuario.php';

    }

    public function editar_usuario() {

        $crear = $this->modelo_usuario->editar_usuario();

        $targetUrl = "http://localhost/crud_users/Controller/controller_usuario.php?metodo=obtener_usuarios";
        header("Location: " . $targetUrl);

        
    }

    public function eliminar_usuario(){

        $usuario = $this->modelo_usuario->eliminar_usuario();

        $targetUrl = "http://localhost/crud_users/Controller/controller_usuario.php?metodo=obtener_usuarios";
        header("Location: " . $targetUrl);

    }
}

/*se crea una variable llamada "$metodo" a la cual se le asigna una variable especial "$_GET" que
sirve para almacenar los datos enviados a traves de la URL. Los parámetros y sus valores se obtienen 
como un array asociativo.*/
$metodo = $_GET["metodo"];

/* se crea un objeto de a clase "Usuario_controller" */
$controlador_usuario = new Usuario_controller();

/* se crea una condición que dice que si la variable "$metodo" es igual a "crear_usuarios_view"
acceda al método "crear_usuarios_view" por medio del objeto "$controlador_usuario"
if($metodo === "crear_usuarios_view"){

    $controlador_usuario->crear_usuarios_view();
    
} 

/* se crea una condición que dice que si la variable "$metodo" es igual a "enviar_usuarios"
acceda al método "enviar_usuarios" por medio del objeto "$controlador_usuario"
if($metodo === "enviar_usuarios"){

    $controlador_usuario->enviar_usuarios();
    
} 

/* se crea una condición que dice que si la variable "$metodo" es igual a "obtener_usuarios"
acceda al método "obtener_usuarios" por medio del objeto "$controlador_usuario"
if($metodo === "obtener_usuarios"){

    $controlador_usuario->obtener_usuarios();

} */


switch($metodo){
    case "crear_usuarios_view":
        $controlador_usuario->crear_usuarios_view();
    break;
    case "enviar_usuarios":
        $controlador_usuario->enviar_usuarios();
        break;
    case "obtener_usuarios":
        $controlador_usuario->obtener_usuarios();
        break;
    case "mostrar_un_usuario":
        $controlador_usuario->mostrar_un_usuario();
        break;
    case "editar_usuario":
        $controlador_usuario->editar_usuario();
        break;
    case "eliminar_usuario":
        $controlador_usuario->eliminar_usuario();
        break;
    }
