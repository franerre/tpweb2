<?php
require_once 'app/models/model.php';
class JugadoresModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todos los jugadores.
     */
    function getJugadores() {
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();

        // $tasks es un arreglo de jugadores
        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }
   

    /**
     * Inserta al jugador en la base de datos
     */
    function insertJugadores($nombre, $apellido, $id_equipo) {
        $query = $this->db->prepare('INSERT INTO jugadores (nombre, apellido, id_equipo) VALUES(?,?,?)');
        $query->execute([$nombre, $apellido, $id_equipo]);

        return $this->db->lastInsertId();
    }
    /**
     * Inserta al equipo en la base de datos
     */

   


    function deleteJugadores($id) {
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id = ?');
        $query->execute([$id]);
    }

   

 
    function getJugadoresById($id) {
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id = ?');
        $query->execute([$id]);

        // $task es un objeto que representa al jugador
        $jugador = $query->fetch(PDO::FETCH_OBJ);

        return $jugador;
    }
    
  
    
    
    function updateJugadoresData($id, $nombre, $apellido, $id_equipo) {
        $query = $this->db->prepare('UPDATE jugadores SET nombre = ?, apellido = ?, id_equipo = ? WHERE id = ?');
        $query->execute([$nombre, $apellido, $id_equipo, $id]);
    
        return $query->rowCount(); // Devuelve el número de filas afectadas por la actualización
    }
    
    
}
