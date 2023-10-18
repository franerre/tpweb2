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
            if (empty($equipo) || empty($liga) || empty($pais )) {
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

   
    
    
    



    
    

  
    }
    
    
    

   
