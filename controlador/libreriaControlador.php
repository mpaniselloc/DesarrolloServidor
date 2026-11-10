<?php
require_once 'model/libreriaModel.php';
class libreriaControlador {
    private $libreria;
    public function __construct() {
        $this->libreria = new libreriaModel();
     }
     public function listadoLibros(){
        $libros = $this->libreria->mostrarLibreria();
        include 'vista/userVista.php';
     }

}

?>