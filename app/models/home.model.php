<?php
require_once 'app/models/model.php';
class HomeModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de equipos completa.
     */
    public function getAllEquipos() {

        // 2. ejecuto la sentencia (2 subpasos)
        $consulta = $this->db->prepare("SELECT * FROM equipos");
        $consulta->execute();

        // 3. obtengo los resultados
        $equipos = $consulta->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $equipos;
    }

    public function getAlljugadores() {

        // 2. ejecuto la sentencia (2 subpasos)
        $consulta = $this->db->prepare("SELECT * FROM jugadores");
        $consulta->execute();

        // 3. obtengo los resultados
        $jugadores = $consulta->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $jugadores;
    }

    public function getJugadoresByEquipo($id_equipo) {
        // 1. Preparar la consulta SQL para obtener jugadores de un equipo específico.
        $sql = "SELECT * FROM jugadores WHERE id_equipo = :id_equipo";
    
        // 2. Ejecutar la consulta utilizando parámetros.
        $consulta = $this->db->prepare($sql);
        $consulta->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $consulta->execute();
    
        // 3. Obtener los resultados.
        $jugadores = $consulta->fetchAll(PDO::FETCH_OBJ);
    
        return $jugadores;
    }
    


}