<?php

class EquiposModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }

  
    function getEquipos() {
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query->execute();

        // $tasks es un arreglo de jugadores
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);

        return $equipos;
    }

   
    /**
     * Inserta al equipo en la base de datos
     */

    function insertEquipos($equipo, $liga, $pais) {
        $query = $this->db->prepare('INSERT INTO equipos (equipo, liga, pais) VALUES(?,?,?)');
        $query->execute([$equipo, $liga, $pais]);

        return $this->db->lastInsertId();
    }


    function deleteEquipos($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id = ?');
        $query->execute([$id]);
    }

 
    
    function getEquiposById($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
        $query->execute([$id]);

        // $task es un objeto que representa al jugador
        $equipo = $query->fetch(PDO::FETCH_OBJ);

        return $equipo;
    }
    
    
   
    
    
}