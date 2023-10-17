<?php
require_once './app/models/equipos.model.php';
require_once './app/views/equipos.view.php';
require_once './app/helpers/auth.helper.php';

class EquiposController {
    private $model;
    private $view;

    public function __construct() {
        // verifico logueado
        AuthHelper::verify();
        
        $this->model = new EquiposModel();
        $this->view = new EquiposView();
        
    }

    public function verJugadores($id_equipo) {
        // Lógica para obtener los jugadores asociados al equipo con el ID $id_equipo
        $jugadoresModel = new JugadoresModel();
        $jugadores = $jugadoresModel->getJugadoresByEquipo($id_equipo);
        
        // Luego, muestra la vista que contiene la lista de jugadores
        $this->view->showJugadores($jugadores, $equipos);
    }
    


    public function showEquipos() {
        $equiposModel = new EquiposModel();
        $equipos = $equiposModel->getEquipos();
        $this->view->showEquipos($equipos);
    }
    

    

    
    public function addEquipos() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica si el formulario se envió mediante POST
            $equipo = $_POST['equipo'];
            $liga = $_POST['liga'];
            $pais = $_POST['pais'];
    
            // Realiza las validaciones
            if (empty($equipo) || empty($liga) || empty($pais)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }
    
            $id = $this->model->insertEquipos($equipo, $liga, $pais);
    
            if ($id) {
                header('Location: ' . BASE_URL . 'equipos');
            } else {
                $this->view->showError("Error al insertar el equipo");
            }
        }
    }
    


    function removeEquipos($id) {
        $this->model->deleteEquipos($id);
        header('Location: ' . BASE_URL . 'equipos');
    }

    public function updateEquipos() {
        var_dump($_POST); // Verifica los datos del formulario

        // Verifica si se ha enviado un formulario POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtén los datos del formulario
            $equipo = $_POST['equipo'];
            $liga = $_POST['liga'];
            $pais = $_POST['pais'];
    
            // Realiza la actualización en el modelo
            $result = $this->model->updateEquipoData($equipo, $liga, $pais);
    
            if ($result) {
                // Redirige de regreso a la lista de jugadores
                header('Location: ' . BASE_URL);
              
            } else {
                $this->view->showError("Error al actualizar el equipo");
            }
        }
    }
    
    
    



    
    

  
    }
    
    
    

   
