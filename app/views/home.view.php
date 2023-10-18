<?php



class HomeView {
    
    public function showHome($equipos, $jugadores) {
        $count = count($equipos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/categoria_equipos.phtml';
        require 'templates/producto_jugadores.phtml';
      
    }
    public function showJugadoresEquipo($jugadores) {
        $count = count($jugadores);
        require 'templates/jugadores.phtml';
    }
    

}