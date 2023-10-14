<?php

class TaskModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todos los jugadores.
     */
    function getTasks() {
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();

        // $tasks es un arreglo de jugadores
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    /**
     * Inserta al jugador en la base de datos
     */
    function insertTask($nombre, $apellido, $id_equipo) {
        $query = $this->db->prepare('INSERT INTO jugadores (nombre, apellido, id_equipo) VALUES(?,?,?)');
        $query->execute([$nombre, $apellido, $id_equipo]);


        return $this->db->lastInsertId();
    }

    
function deleteTask($id) {
    $query = $this->db->prepare('DELETE FROM jugadores WHERE id = ?');
    $query->execute([$id]);
}

function updateTask($id) {    
    $query = $this->db->prepare('UPDATE jugadores SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);

    

    
}
}