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
        $this->view->showEditForm($jugador);
    }
    

    /*public function updateJugadores() {
        // Verifica si se ha enviado un formulario POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtén los datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $id_equipo = $_POST['id_equipo'];
    
            // Realiza la actualización en el modelo
            $result = $this->model->updateJugadoresData($id, $nombre, $apellido, $id_equipo);
    
            if ($result) {
                // Redirige de regreso a la lista de jugadores
                header('Location: ' . BASE_URL);
            } else {
                $this->view->showError("Error al actualizar el jugador");
            }
        }
    }
    */
    

  
    }
    
    
    

   
