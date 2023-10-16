<?php

class EquiposView {
   
   

    public function showequipos($equipos) {
        $count = count($equipos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/equiposList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
    
    

}