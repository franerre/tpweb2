<?php

class JugadoresView {
   
    public function showJugadores($jugadores, $equipos) {
        $count = count($jugadores);
        require 'templates/jugadorList.phtml';
    }


    public function showError($error) {
        require 'templates/error.phtml';
    }
    public function showEditForm($jugador) {
        // NOTA: Debes crear un nuevo template para la edición (editJugador.phtml)
        // y dentro de ese archivo, construir el formulario de edición

        // mostrar el template de edición
        require 'templates/editJugador.phtml';
    }
    

}