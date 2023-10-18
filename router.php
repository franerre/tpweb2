<?php
require_once 'config.php';
require_once './app/controllers/jugadores.controller.php';
require_once './app/controllers/equipos.controller.php';
require_once './app/controllers/home.controller.php';
require_once './app/controllers/about.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         taskController->showTasks();
// agregar   ->         taskController->addTask();
// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();
// login ->             authContoller->showLogin();
// logout ->            authContoller->logout();
// auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    // Muestro el inicio
    case 'home':
        $homeController = new HomeController();
        $homeController->showHome();
        break;
       // Agrega una nueva ruta para ver jugadores por equipo
    case 'verjugadores':
        $controller = new HomeController();
        $controller->showJugadoresEquipo($params[1]);
        break;

        
    case 'jugadores':
        $controller = new JugadoresController();
        $controller->showJugadores();
        break;
    case 'listar':
        $controller = new JugadoresController();
        $controller->showJugadores();
        break;
    case 'agregar':
        $controller = new JugadoresController();
        $controller->addJugadores();
        break;
    case 'eliminar':
        $controller = new JugadoresController();
        $controller->removeJugadores($params[1]);
        break;

    
    case 'listarequipos':
        $controller = new EquiposController();
        $controller->showEquipos();
        break;
    case 'agregarequipos':
        $controller = new EquiposController();
        $controller->addEquipos();
        break;
    case 'eliminarequipo':
        $controller = new EquiposController();
        $controller->removeEquipos($params[1]);
        break;
    case 'equipos':
        $controller = new EquiposController();
        $controller->showEquipos();
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'editar':
        $controller = new JugadoresController();
        $controller->editJugadores($params[1]);
        break;
    case 'actualizar':
        $controller = new JugadoresController();
        $controller->updateJugadores();
        break;
    case 'actualizarequipos':
        $controller = new EquiposController();
        $controller->updateEquipos();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
