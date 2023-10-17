<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class jugadoresView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showListaEquipos($jugadores,$equipos) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($jugadores)); 
        $this->smarty->assign('equipos', $jugadores);
        $this->smarty->assign('categorias', $equipos);

        // mostrar el tpl
        $this->smarty->display('jugadores.phtml');
    }

    function filtrarEquipo($jugadores){
        $this->smarty->assign("jugadores", $jugadores);
        $this->smarty->display("equiposFilter.tpl");
    }
}