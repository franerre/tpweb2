<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';
require_once './app/helpers/auth.helper.php';

class JugadoresController {
    private $model;
    private $view;

    public function __construct() {
        // verifico logueado
        AuthHelper::verify();
        
        $this->model = new JugadoresModel();
        $this->view = new JugadoresView();
        
    }

    
    public function showJugadores() {
        $jugadoresModel = new JugadoresModel();
        $equiposModel = new EquiposModel();
        $jugadores = $jugadoresModel->getJugadores();
        $equipos = $equiposModel->getEquipos();
        $this->view->showJugadores($jugadores, $equipos); 
        
    }
    
    public function addJugadores() {

        // obtengo los datos del usuario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_equipo = $_POST['id_equipo'];
        
        // validaciones
        if (empty($nombre)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertJugadores($nombre, $apellido, $id_equipo);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar el jugador");
        }
    }

    


    function removeJugadores($id) {
        $this->model->deleteJugadores($id);
        header('Location: ' . BASE_URL);
    }
   

    public function editJugadores($id) {
        $jugador = $this->model->getJugadoresById($id);
        $equiposModel = new EquiposModel();
        $equipos = $equiposModel->getEquipos();
        $this->view->showEditForm($jugador, $equipos);
    }
    
    public function updateJugadores($id) {
        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['id_equipo'])) {
            if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['id_equipo'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $id_equipo = $_POST['id_equipo'];
    
                $this->model->updateJugadoresData($id, $nombre, $apellido, $id_equipo);
    
                header("Location: " . BASE_URL . "jugadores");
            }
        }
    }
    
    

  
    }
    
    
    

   
