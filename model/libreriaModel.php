<?php
class libreriaModel {
    private $xmlFile = 'model/datos/libreria.xml';
    public function mostrarLibreria(){
        if (file_exists($this->xmlFile)) {
            $libreria = simplexml_load_file($this->xmlFile);//convierte el fichero xml en un objeto
            return $libreria;
        } else {
            exit('Error al abrir el archivo XML.');
        }
    }
}

?>