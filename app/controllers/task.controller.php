<?php
require_once './app/models/task.model.php';
require_once './app/views/task.view.php';
require_once './app/helpers/auth.helper.php';

class TaskController {
    private $model;
    private $view;

    public function __construct() {
        // verifico logueado
        AuthHelper::verify();
        
        $this->model = new TaskModel();
        $this->view = new TaskView();
        
    }

    public function showTasks() {
        // obtengo jugadores del controlador
        $tasks = $this->model->getTasks();
        
        // muestro los jugadores desde la vista
        $this->view->showTasks($tasks);
    }

    public function addTask() {

        // obtengo los datos del usuario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_equipo = $_POST['id_equipo'];
        
        

        // validaciones
        if (empty($nombre)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertTask($nombre, $apellido, $id_equipo);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar el jugador");
        }
    }

    function removeTask($id) {
        $this->model->deleteTask($id);
        header('Location: ' . BASE_URL);
    }
    
    function finishTask($id) {
        $this->model->updateTask($id);
        header('Location: ' . BASE_URL);
    }

   
}