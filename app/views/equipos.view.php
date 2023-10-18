<?php

class EquiposView {
    public function showEquipos($equipos) {
        $count = count($equipos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion

        // mostrar el template
        require 'templates/equiposList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showEditForm($equipo) {
        require_once 'templates/header.phtml';
        require_once 'templates/editEquipo.phtml';
        require_once 'templates/footer.phtml';
    }
}
?>
